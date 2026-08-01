# Changelog

All notable changes to this project are documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/), and this project does not yet follow strict semantic versioning. Prior release history is not available in this repository (no version-control history was preserved), so the entries below start with the current maintenance state.

---

## [1.0.0] - 2026-07-31

### Added
- This changelog and a detailed project `README.md`.
- End-to-end verification of the complete battle → experience → level-up → evolution flow on PHP 8.2 (Charmander level 16 → Charmeleon, new ability assigned, stats recomputed, evolution event recorded, session state cleared).

### Fixed
#### Localization of the region map page (`attack/attack_map.php`)
The map page's NPC greeting ("Mapa de …", "Olá, treinador! Seja bem vindo ao MAPA …") and the fishing-rod/cave-suit hint bar were hardcoded in Portuguese. Both now read `$txt` keys (`map_title`, `map_npc_text` with a `%s` placeholder for the region name, `map_shop_hint`), added to the `attack/attack_map` block of all six `language-pages-*.php` files.

#### Localization of the wait page (`app/includes/resources/wait.php`)
The PokéCenter treatment timer (`pokecenter` type) and the travel timer (`travel` type) rendered hardcoded Portuguese text ("Tratamento em andamento" / "Viajando") regardless of the selected language. Both timer pages now read their title, body text and "end of …:" label from `$txt` keys (`wait_pokecenter_title/text/end`, `wait_travel_title/text/end`) added to the `app/includes/resources/wait` block of all six `language-pages-*.php` files; the travel text uses a `%s` placeholder (resolved via `sprintf`) for the destination world. Also fixed the stray `</b>.` typo in the original travel text.

#### PHP 8.x by-reference array functions (`array_push` / `array_pop`)
PHP 8 throws a fatal `Error: array_push(): Argument #1 ($array) cannot be passed by reference` (and the same for `array_pop()`) when the array argument is a function call or an expression. The following spots were rewritten to use `$array[] = ...` / direct variable references:
- `attack/attack.inc.php:102` — `pokemon_grow()`: `array_push($array, $value)` expression replaced (this fatal previously produced an HTTP 500 on `wild-finish.php`).
- `attack/wild/wild-finish.php` — `array_push(($_SESSION['used'] ?? ''), ...)` replaced with `$_SESSION['used'][] = ...` (fixed the HTTP 500 that aborted battle end-screens).
- `app/includes/resources/poke-evolve.php` — `array_push()`/`array_pop()` expression usages replaced.
- `app/includes/resources/poke-newattack.php` — `array_push()`/`array_pop()` expression usages replaced.
- `daycare.php` — `array_push()`/`array_pop()` expression usages replaced.

#### Evolution silently aborting (critical)
- `app/includes/resources/poke-evolve.php` — the ability selection was written as a single self-referential expression:
  ```php
  $ability = explode(',', $update['ability'])[rand(0, (sizeof($ability) - 1))];
  ```
  `$ability` was used inside the array index before being assigned, so `sizeof($ability)` evaluated to `0` and `rand(0, -1)` threw a PHP 8 `ValueError`. Because the file runs with `error_reporting(0)`, the fatal was never logged. The script died mid-POST — before the Pokémon update query, before clearing `$_SESSION['evolueren']`, and before inserting the evolution event — leaving the Pokémon unevolved even though the EVOLUIR request returned HTTP 200.
  - **Fix:** split into two statements so `sizeof()` operates on the already-defined array:
    ```php
    $ability = explode(',', $update['ability']);
    $ability = $ability[rand(0, (sizeof($ability) - 1))];
    ```

#### Battle AJAX robustness
- Added error-suppression guards to the wild, trainer and duel battle AJAX endpoints. Battle responses are pipe-delimited and parsed client-side with `msg.split(" | ")`; any PHP warning/notice output before the payload shifts the array indices and freezes the battle UI. Suppressing notices on these endpoints prevents stray output from corrupting the payload.

#### Timer refactors
- `attack/wild/wild-attack.php` and `attack/trainer/trainer-attack.php` — replaced `setTimeout("function()", ...)` string arguments with closures (string arguments are not allowed in stricter JavaScript environments and caused timer failures).

#### Pokémon Center heal never applying (drag & drop)
- `public/javascripts/pokecenter.js` — the slot's `receive` handler started with `var sender = ui.sender.context.id;`. Under jQuery 3.7 + jQuery UI 1.12.1, `ui.sender` is `undefined` in this handler, so the line threw `TypeError: Cannot read properties of undefined (reading 'id')` and **aborted the handler before the hidden `input[name="pokemon[]"]` checkbox could be checked**. The form then submitted without any `pokemon[]` value, the server-side heal block (`pokemoncenter.php`) was skipped entirely, and the page just reloaded with the Pokémon still injured — no error message, and (during the failed drag) an uncaught TypeError in the console.
  - **Fix:** read the dropped element's id directly from `ui.item` instead of `ui.sender`/`sortable("serialize")` string parsing, and guard `ui.sender.sortable("cancel")` behind an existence check in both the hand and slot `receive` handlers. Verified in a real headless-browser (Chrome CDP) drag-drop simulation: checkbox now checked, no JS errors; double-click path still works.

### Notes
- Tested against PHP 8.2.12 (ZTS, Windows), Apache 2.4.58, MySQL (local XAMPP stack).
- The session cookie name is derived from a hash of the client IP and User-Agent (`app/includes/resources/config.php`); when reproducing requests programmatically, the correct cookie name must be computed for the same UA/IP combination.

---

## [Unreleased]

### Fixed
#### Hardcoded secrets removed / installer creates admin + team passwords
- `app/includes/resources/ingame.inc.php` — the hardcoded password salt `$keyzitapass = "SENHAENCRYPTSIMBOLSPASSWORD2016"` (used by the `password()` hash for every account) was removed from the source. It is now read from the environment: `$keyzitapass = (string) Env::get('KEYZITAPASS', '');`. The `KEYZITAPASS` value is generated randomly and stored in `.env` during installation.
- `app/includes/resources/pages/equipe-check.php` — the hardcoded team security password `$senha = "egvwl2018"` (and the commented-out legacy passwords) was removed. The page now reads the shared staff password from the environment: `$senha = (string) Env::get('TEAM_PASSWORD', '');`. Without a matching `TEAM_PASSWORD` in `.env`, admins cannot pass the team security check.
- `install.php` — the installer now has a new **Admin account** step (username / email / admin password / repeat) plus an optional **team password** field between the database settings and the installation itself. It validates the input, generates a random 32-char `KEYZITAPASS`, accepts or generates the `TEAM_PASSWORD`, writes both to `.env`, computes the admin password hash with the same `password()` algorithm (`hash('sha1', crypt($pw, md5(strrev($keyzitapass))))`), and upserts the account (`rekeningen` acc_id=1) plus the first trainer character (`gebruikers` user_id=1) — now with full admin rights (`admin=3`). The success screen shows the admin credentials and the generated/selected team password.
  - **Migration note:** existing installations must add `KEYZITAPASS=<old salt value>` to their `.env` (or the old value to a new installation) to keep existing account passwords working, and set `TEAM_PASSWORD` to the staff password they want to use for the team area.
- `app/includes/resources/login.php:88` — the stored session id was written as `$_COOKIE['PHPSESSID']`, which never exists because the app uses a dynamic session cookie name (`config.php`); the `session` column was always stored empty, producing PHP 8 warnings on login. Now written via `session_id()` and `ban_cookie` is guarded with `?? ''`. The same `$_COOKIE['PHPSESSID']` bug was fixed in `my_characters.php` (character select) and `index.php` (session validation now compares against `session_id()`), so the stored session id is now real and the PHP 8 warnings on login / character select are gone. Verified end-to-end: login → `my_characters` → character select → `home` renders the logged-in trainer with zero warnings and no logout loop.
- `app/includes/resources/ingame.inc.php:698` — `$premium` was echoed on the character-select info box without initialization, emitting an `Undefined variable` warning whenever the account had no active premium; now initialized to `''` before the conditional.
#### PHP 8 `undefined variable` / `undefined array key` warnings on game pages
- `bank.php` — `$bericht_send` was only defined inside the POST handler, so a plain page load (GET) emitted `Undefined variable $bericht_send` at the message echo; also fixed a typo (`$bericht` → `$bericht_send`) that made the "unknown amount" error message never display. The variable is now initialized before the POST block.
- `moves.php` — `$sucesso` was only set inside POST branches; a GET request emitted `Undefined variable $sucesso` at the view switch. Now initialized to `false` after the security check.
- `market.php` (items shop) — the "already owned" checks read `$gebruiker[$select['naam']]` even though the `gebruikers` table has **no item columns** (items live in `gebruikers_item`), producing `Undefined array key "Yellow box"` etc. and, on GET, cascading `Undefined variable $itemgegevens` / null-offset warnings. The ownership checks now read the user's `gebruikers_item` row (`$itemgegevens_user[$select['naam']] ?? 0`), `$type[1]` and `$bag_allowed` accesses are guarded with `?? ''`, and `$itemgegevens` / `$welingevoerd` / `$niksingevoerd` / `$itemboxvol` are initialized up front. The "Pokedex chip" gate and money checks use the `gebruikers_item` values. Display and purchase flows verified locally (GET + empty/bogus/valid POST): zero warnings, owned items correctly hidden, purchase works.
#### Localization of the messenger classes (`app/classes/*.php`)
The chat / message classes emitted hardcoded Portuguese user-facing strings. They now read `$txt` keys (added to the global section of all six `language-pages-*.php` files, 33 keys) and use `global $txt;` / `sprintf` where values are interpolated:
- `app/classes/League.php` — `erro_duelo()` error messages (opponent/self offline, region mismatch with `%s` placeholder, fewer than 6 Pokémon, all fainted, level / shiny / legendary / mega limits) → `league_err_*`.
- `app/classes/Messages.php` — page title, "You:" bubble prefix, empty-inbox text, bulk-delete UI + JS confirm, duplicate-conversation / self-message / unknown-user / deletion-count / block messages → `msg_*`.
- `app/classes/Official_messages.php` — title, "Posted on: %s", empty list → `om_*`.
- `app/classes/Friends.php` — friend-request game event text (two `%s` placeholders for the requester) → `friends_request_event`.
- `official-messages.php` (page template) — NPC box, security warning and sidebar labels now reuse the existing `inbox_*` keys; `inbox.php`'s last remaining hardcoded title ("Nova Conversa") now uses `$txt['inbox_new_conv']`. Verified: inbox / official-messages / inbox-send render with zero warnings in de/en/pt and no residual Portuguese.
#### Localization of the gym page (`attack/gyms.php`)
The gym carousel page rendered hardcoded Portuguese (NPC box, rank-required notice, region header, badge/description texts, blocked-gym notices, challenge button and all JS button texts). All now read 18 new `gym_*` keys in the existing `attack/gyms` block of all six `language-pages-*.php` files (region/elite-member/challenge/fought texts use `%s` placeholders; JS strings are pre-rendered via `addslashes(sprintf(...))` with a `{T}` placeholder). Also fixed a real bug: `$txt[$info['bericht']]` referenced an undefined `$info` (PHP 8 warning, error message never shown) — now `$info5`. Verified: page renders with zero warnings in de/en and no residual Portuguese.
#### Localization of the casino pages (`slots.php`, `kluis.php`, `who-is-it-quiz.php`, `wheel-of-fortune.php`)
The four casino minigames rendered hardcoded Portuguese user-facing text. They now read 35 new keys added to their respective `slots` / `kluis` / `who-is-it-quiz` / `wheel-of-fortune` blocks of all six `language-pages-*.php` files:
- `slots.php` — NPC box, insufficient-tickets notice, win/loss messages (`slots_won` uses a `%s` ticket-count placeholder), ticket inventory label, table title, play button, combination table headers + JS collapse/expand toggle texts and the "play again" button → `slots_*` (13 keys).
- `kluis.php` — NPC box, insufficient-tickets notice, win message with `%s` jackpot placeholder, loss message, current-jackpot label, per-column code header (`kluis_code_label` with `%s` for the 1–3 code position) and submit button → `kluis_*` (9 keys).
- `who-is-it-quiz.php` — NPC box, table title, guess submit button → `quiz_*` (4 keys).
- `wheel-of-fortune.php` — NPC box, win message (`wof_won_tickets` with `%s` placeholder), page title and all six wheel segment labels (100/250 TICKETS, POKÉBALL, SPECIAL ITEM, EVOLUTION STONE, TM) → `wof_*` (9 keys).
- The shared ticket-inventory label `tickets_inventory` was added to each of the four blocks (each block is loaded exclusively per page).
Verified: all four pages render with zero warnings in all six languages and no residual Portuguese in de/en. `pt` keeps the original Portuguese strings.
#### Localization of the Safari zones, trainer battle and tournament pages
The two Safari zones (`safari.php` and the event version `app/includes/resources/events/pages/safari.php`, mounted by `eventos.php`), the trainer battle page (`attack/trainer/trainer-attack.php`), the tournament pages (`attack/tour_fight.php`, `tour.php`) and the tournament-ready endpoint rendered hardcoded Portuguese user-facing text. They now read 37 new keys (`safari_*`, `tour_*` for `tour_fight`, `trainer_*`) plus two `liga_*`/`tour_*` reuse fixes:
- `safari.php` — NPC box, all-fainted / not-found / wrong-level notices, JS strings (wait, "You found a %s!", "Level: %s", attack/see-trainer/duel/battle buttons via pre-rendered `addslashes(sprintf(...))` with a `{T}` placeholder), map header ("Map - %s"), trainers-in-the-area counter, "You" sprite tooltip, all nine map shortcuts, movement hint and the closed-notice → `safari_*` (27 keys).
- `app/includes/resources/events/pages/safari.php` — same `safari_*` keys (event NPC text uses `safari_event_npc_text`). Because this file is mounted via `eventos.php` under `$page = 'eventos'`, a new `eventos` language block (same 27 keys) was added to all six `language-pages-*.php` files; both the new `safari` and `eventos` blocks also set `$txt['pagetitle']`.
- `attack/trainer/trainer-attack.php` — "Battling against %s", "Willing", "Defeated" (HTML + JS tooltip) and "Choose the Pokémon that will receive %s:" → `trainer_*` (4 keys, added to the existing `attack/trainer/trainer-attack` block of all six files).
- `attack/tour_fight.php` — no-battleable-pokémon notice, wait status, opponent-did-not-respond message, loading text, tournament-started header and battle button → `tour_*` (6 keys, new `attack/tour_fight` block in all six files). The battle button and started-header are inside a single-quoted `echo '…'`, so they are interpolated via string concatenation.
- `tour.php` — "VIP" badge text and the stray `" lv N"` price suffix now reuse the existing `liga_currency_vip` / `liga_level` keys.
- `attack/tour_ready.php` — checked, returns only numeric status codes, no text to localize.
Verified: `safari` and `attack/tour_fight` render with zero warnings in de/en and no residual Portuguese; `eventos&actual=safari` redirects to `home` when no Safari event is active (the page itself shares the validated `safari_*` keys). `pt` keeps the original Portuguese strings. All six language files remain UTF-8 without BOM.
#### Localization of the donate, events, clans, travel, home news, house seller, meta description, pokedex and captcha pages
The last batch of hardcoded Portuguese user-facing strings was moved into `$txt` keys (43 new keys) across the relevant blocks of all six `language-pages-*.php` files, plus the `site_description` key in all six `language-general-*.php` files:
- `donate.php` — banner/featured-package title, "chosen packages" label, confirm-purchase prompt, buy button, "no featured packages" notice, page title, transfers table (title, package, price, date, status) and all transfer status values (pending / under analysis / paid / available / dispute / refunded / cancelled) plus the empty-transfers notice → `donate_*` (15 keys).
- `events.php` — NPC box, VIP/premium texts, "no notifications" notice and page title → `events_*` (5 keys).
- `clans.php` — minimum-rank notice → `clans_rank_min`.
- `travel.php` — the seven region names used in the worldmap JavaScript → `travel_region_0..6` (pre-rendered via `addslashes($txt[...])`).
- `home.php` — the news line ("[date] - <b>%s</b> RELEASED! …") → `home_news_text` (uses `sprintf` for the version placeholder).
- `house-seller.php` — NPC box title and the buy button → `house_seller_npc_title`, `house_seller_buy_btn`.
- `site_names.php` (meta description) — the hardcoded description is now overridden in `index.php` after the language files load: `$site_description = $txt['site_description'] ?? $site_description;`, with the new `site_description` key added to all six `language-general-*.php` files (the original text stays as fallback).
- `pokedex.php` — fixed the `Undefined variable $selected` warning at the Pokémon dropdown (the "owned/not owned" state variable was only set in the POST branch) and removed the hardcoded Portuguese "Lendário" label from the rarity dropdown (the values are DB-driven and out of scope for localization).
- `captcha.php` — fixed the `Undefined variable $front1..$front5` warnings (the front/back image-prefix variables were only set when their random roll differed from 1; they are now initialized to `''`) and localized the six hardcoded strings (security-check NPC box title/text, incorrect/correct answers, not-premium notice, "click on %s" prompt) → `captcha_*` keys.
Verified: donate, captcha, events, clans, travel, house-seller, home, pokedex render with zero warnings in de/en and no residual Portuguese; the captcha gate (`index.php` forces `page=captcha` when `captcha_time` is stale) no longer blocks the donate render in the test session. `pt` keeps the original Portuguese strings.
#### Localization of the Pokémon HUD popups and the box page
The three HUD popup renderers in `app/includes/resources/ingame.inc.php` (`pokemon_popup`, `pokedex_popup` and `pokemonei`, used for the team panel and box hover-tips on every page) rendered hardcoded Portuguese ("Inicial", "Ver Perfil do Pokémon", "(Nv. …)", "Ataque/Defesa/Esp. Ataque/Esp. Defesa/Speed", "Apelido:", "Humor:", "Negociavel: …", "Poder total:", "O ovo chocará em:", "Chance de captura:", "Ability:", "Este pokémon é <u>…</u>", "Top 3 Pokémon" medal). They now read 19 `popup_*` keys, added to the existing `popup_*` blocks of all six `language-general-*.php` **and** `language-pages-*.php` files — both are required because the HUD is rendered (inside `index.php`) after `language-general.php` loads but before `language-pages.php` is included. `pokemonei`'s `lvl_hook` uses `popup_level` and the egg countdown now renders via `pokemonei_egg`, which was previously still untranslated Dutch ("Nog %s tot het ei uitkomt.") and is now translated in all six general files ("Das Ei schlüpft in %s." / "The egg will hatch in %s." / …). `app/ajax/pokemon_info.php`'s `attack_to_defender_advance()` also gained `global $txt;` so the `pokemon_info` AJAX endpoint resolves the localized keys.
- `box.php` — the house summary box ("Pokémons Nv.100: ", "Pokémons TOP 3: ", the trailing "Pokémons." word) and the Top-3 medal tooltips ("Tops 3 Pokémons" / "Tops 2 Pokémons" / "Tops 1 Pokémons") → 6 new `box_*` keys (`box_lv100`, `box_top3`, `box_pokemons_word`, `box_medal_top1/2/3`) in the `box` block of all six `language-pages-*.php` files.
Verified: pokedex, box, statistics and home render with zero warnings in de/en and no residual Portuguese (a CLI harness additionally confirms the German `pokedex_popup` / `pokemonei` output, including the egg countdown). `pt` keeps the original Portuguese strings. All six language files remain UTF-8 without BOM.

### Changed
#### Game header rebuilt (`index.php`)
The in-game header (rendered inside `#header`, which sits at `margin-top:-146px` so its top edge is off-screen) previously stacked the whole HUD in a single horizontal hub: the Pokémon World Legends logo was horizontally centered (which looked wrong against the background), the character-info bar already sat top-right, and the flags / silver / gold / inbox / profile row and the events row fell below the fold. The header is now split into three explicit hubs:
- **Hub 1 (top row):** the logo link (`./`) + `#logo` (401×200, randomized `logo_1..logo_5` background) on the **left** (`width:45%`), and the character-info bar (520×93 `player.png` bar with name/clan/world/rank/Pokedex progress) on the **right**; both aligned `vertical-align:top` with `padding-top:150px` so they sit in the visible strip of the header graphic.
- **Hub 2:** unchanged language-flag row (left) and silver / gold / inbox / profile menu (right) — now fully visible.
- **Hub 3:** the events / daily-quests / bonus row (`padding-top:10px`).
The old `<div class="hub" style="margin-top:-165px">` that floated the character bars was removed.
Verified via headless Chrome (CDP, viewport 1268×900, `home` and `town`): logo at left 139–540 / top 34–234, character bar right edge at 1129 / top 34–127, flags + silver row visible (top ~286 / 266), events row visible — both pages identical. All affected pages still render with zero warnings in de/en.

### Notes
- Planned / open items (tracked during maintenance):

- **Ability edge case:** if a Pokémon's `ability` column is empty, `explode(',', '')` yields a single empty string and the ability is stored empty. Consider a fallback when the ability list is blank.
- **`wild-start.php` / `trainer-start.php`:** notices about undefined `effect` array keys are observed during battle setup; the guards prevent output corruption, but the underlying data source should be audited.
- **Captcha behavior:** captcha sessions variables (`pkmon`, `emqual`) persist in the session after the captcha page renders; harmless but worth cleaning up.
- Consider removing the now-unused `install.php`/`install.lock` guidance after production deployment and auditing `hack_exp_uid.log` / `liga.log` for bot-detection noise.
