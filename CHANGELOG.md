# Changelog

All notable changes to this project are documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/), and this project does not yet follow strict semantic versioning. Prior release history is not available in this repository (no version-control history was preserved), so the entries below start with the current maintenance state.

---

## [1.0.0] - 2026-07-31

### Added
- This changelog and a detailed project `README.md`.
- End-to-end verification of the complete battle → experience → level-up → evolution flow on PHP 8.2 (Charmander level 16 → Charmeleon, new ability assigned, stats recomputed, evolution event recorded, session state cleared).

### Fixed
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
#### PHP 8 `undefined variable` / `undefined array key` warnings on game pages
- `bank.php` — `$bericht_send` was only defined inside the POST handler, so a plain page load (GET) emitted `Undefined variable $bericht_send` at the message echo; also fixed a typo (`$bericht` → `$bericht_send`) that made the "unknown amount" error message never display. The variable is now initialized before the POST block.
- `moves.php` — `$sucesso` was only set inside POST branches; a GET request emitted `Undefined variable $sucesso` at the view switch. Now initialized to `false` after the security check.
- `market.php` (items shop) — the "already owned" checks read `$gebruiker[$select['naam']]` even though the `gebruikers` table has **no item columns** (items live in `gebruikers_item`), producing `Undefined array key "Yellow box"` etc. and, on GET, cascading `Undefined variable $itemgegevens` / null-offset warnings. The ownership checks now read the user's `gebruikers_item` row (`$itemgegevens_user[$select['naam']] ?? 0`), `$type[1]` and `$bag_allowed` accesses are guarded with `?? ''`, and `$itemgegevens` / `$welingevoerd` / `$niksingevoerd` / `$itemboxvol` are initialized up front. The "Pokedex chip" gate and money checks use the `gebruikers_item` values. Display and purchase flows verified locally (GET + empty/bogus/valid POST): zero warnings, owned items correctly hidden, purchase works.

### Notes
- Planned / open items (tracked during maintenance):

- **Ability edge case:** if a Pokémon's `ability` column is empty, `explode(',', '')` yields a single empty string and the ability is stored empty. Consider a fallback when the ability list is blank.
- **`wild-start.php` / `trainer-start.php`:** notices about undefined `effect` array keys are observed during battle setup; the guards prevent output corruption, but the underlying data source should be audited.
- **Session validation:** `index.php` compares `gebruikers.session` against `$_COOKIE['PHPSESSID']`, while the application actually uses a dynamic session cookie name; accounts may be logged out unexpectedly when the stored session id and the legacy cookie name check disagree.
- **Captcha behavior:** captcha sessions variables (`pkmon`, `emqual`) persist in the session after the captcha page renders; harmless but worth cleaning up.
- Consider removing the now-unused `install.php`/`install.lock` guidance after production deployment and auditing `hack_exp_uid.log` / `liga.log` for bot-detection noise.
