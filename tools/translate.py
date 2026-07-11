#!/usr/bin/env python3
"""
Translate the strings extracted by translate_extract.php into all target languages.

Usage:
    python3 tools/translate.py

Requires:
    pip install googletrans mtranslate

Output:
    language/{de,en,pl,ru,zh}/{file}-{lang}.php
"""

import asyncio
import json
import os
import re
import sys
from pathlib import Path

# googletrans v4 is async. Fall back to mtranslate for individual strings if a batch fails.
try:
    from googletrans import Translator
    HAVE_GOOGLETRANS = True
except Exception:
    HAVE_GOOGLETRANS = False

try:
    from mtranslate import translate as mtranslate_sync
    HAVE_MTRANSLATE = True
except Exception:
    HAVE_MTRANSLATE = False

BATCH_SIZE = 200
SOURCE_LANG = 'pt'
TARGET_LANGS = {
    'de': 'de',
    'en': 'en',
    'pl': 'pl',
    'ru': 'ru',
    'zh': 'zh-CN',
}

HTML_ENTITY_RE = re.compile(r'&[a-zA-Z0-9]+;')


def protect_entities(text):
    """Replace HTML entities with placeholders so the translator doesn't touch them."""
    tokens = {}

    def repl(m):
        idx = len(tokens)
        key = f'__ENT_{idx}__'
        tokens[key] = m.group(0)
        return key

    return HTML_ENTITY_RE.sub(repl, text), tokens


def restore_entities(text, tokens):
    for k, v in tokens.items():
        text = text.replace(k, v)
    return text


def quote_value(value, quote):
    if quote == "'":
        return "'" + addcslashes(value, "'\\") + "'"
    return '"' + addcslashes(value, '"\\$') + '"'


def addcslashes(s, chars):
    out = []
    for c in s:
        if c in chars:
            out.append('\\')
        out.append(c)
    return ''.join(out)


def translate_mtranslate(text, dest):
    if not HAVE_MTRANSLATE:
        return text
    try:
        return mtranslate_sync(text, dest, SOURCE_LANG)
    except Exception:
        return text


def translate_with_google(translator, texts, dest):
    """Translate a list of texts. Returns a list of strings."""
    if not HAVE_GOOGLETRANS:
        return [translate_mtranslate(t, dest) for t in texts]

    async def run_batch(batch):
        for attempt in range(3):
            try:
                results = await translator.translate(batch, src=SOURCE_LANG, dest=dest)
                return [r.text if r and r.text else batch[i] for i, r in enumerate(results)]
            except Exception as e:
                if attempt == 2:
                    print(f'  googletrans batch failed: {e}', file=sys.stderr)
                    return batch
                await asyncio.sleep(2)

    loop = asyncio.get_event_loop()
    out = []
    for i in range(0, len(texts), BATCH_SIZE):
        batch = texts[i:i + BATCH_SIZE]
        res = loop.run_until_complete(run_batch(batch))
        out.extend(res)
    return out


def translate_all(translator, strings, dest):
    """Translate a list of string values, preserving HTML entities and quote type."""
    protected = []
    for s in strings:
        p, tokens = protect_entities(s)
        protected.append((p, tokens))

    texts = [p for p, _ in protected]
    translated = translate_with_google(translator, texts, dest)

    out = []
    for (p, tokens), t in zip(protected, translated):
        if t is None:
            t = p
        t = restore_entities(t, tokens)
        out.append(t)
    return out


def main():
    root = Path(__file__).resolve().parent.parent
    input_path = root / 'tools' / 'translation_input.json'
    if not input_path.exists():
        print(f'Input file not found: {input_path}')
        sys.exit(1)

    with open(input_path, 'r', encoding='utf-8') as f:
        data = json.load(f)

    translator = Translator() if HAVE_GOOGLETRANS else None

    for lang_code, google_dest in TARGET_LANGS.items():
        print(f'Translating to {lang_code} ({google_dest})...')
        for file_info in data['files']:
            source = file_info['source']
            source_bytes = source.encode('utf-8')
            strings = file_info['strings']
            if not strings:
                new_source = source
            else:
                values = [s['value'] for s in strings]
                translated = translate_all(translator, values, google_dest)

                # Replace from end to start so earlier offsets stay valid.
                # start/end are PHP byte offsets, so work on the UTF-8 encoded source.
                parts = []
                last = len(source_bytes)
                for s, t in reversed(list(zip(strings, translated))):
                    end = s['end']
                    start = s['start']
                    parts.append(source_bytes[end:last])
                    parts.append(quote_value(t, s['quote']).encode('utf-8'))
                    last = start
                parts.append(source_bytes[0:last])
                new_source_bytes = b''.join(reversed(parts))
                new_source = new_source_bytes.decode('utf-8')

            # Determine output path: language/general/language-general-pt.php -> language/general/language-general-{lang}.php
            pt_path = Path(file_info['path'])
            new_name = pt_path.stem.replace('-pt', f'-{lang_code}') + pt_path.suffix
            out_path = root / pt_path.parent / new_name
            out_path.parent.mkdir(parents=True, exist_ok=True)
            out_path.write_text(new_source, encoding='utf-8')
            print(f'  wrote {out_path.relative_to(root)}')

    print('Done.')


if __name__ == '__main__':
    main()
