# Pokémon World Legends

A fan-made Pokémon browser MMO (massively multiplayer online) game built with PHP, MySQL and jQuery. Trainers catch, raise and battle Pokémon against wild Pokémon, NPC trainers and other players in a persistent world with a real economy.

> **Disclaimer:** Pokémon is a registered trademark of Nintendo, Creatures Inc. and GAME FREAK Inc. This project is a non-commercial fan game and is **not** affiliated with Nintendo, The Pokémon Company or Game Freak.

---

## Table of Contents

- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
  - [Option 1: Web installer](#option-1-web-installer-recommended)
  - [Option 2: Manual setup](#option-2-manual-setup)
- [Configuration](#configuration)
- [Architecture & Request Flow](#architecture--request-flow)
- [Directory Structure](#directory-structure)
- [Game Systems](#game-systems)
- [Languages](#languages)
- [Cron Jobs](#cron-jobs)
- [Admin Panel](#admin-panel)
- [Security Notes](#security-notes)
- [Troubleshooting](#troubleshooting)
- [Support](#support)
- [Changelog](#changelog)

---

## Features

- **Battle system** — turn-based battles against wild Pokémon, NPC trainers and duels against other players.
- **Leveling & evolution** — Pokémon gain experience after battle, learn new attacks and evolve according to the `levelen` table.
- **Persistent world** — an attack map, towns, NPCs, gyms and tournaments.
- **Economy** — gold, items, player-to-player market, auctions, gold market and a bank.
- **Side activities** — day care, safari zones, fishing, casinos, slot machines, wheel of fortune, daily quests and special events.
- **League** — a player league with rankings and battles.
- **Clans** — clan creation, membership and clan management.
- **Social features** — friends, private messages, official messages and an inbox.
- **Shiny Pokémon** — alternate sprite handling built into the sprite layer.
- **i18n** — six interface languages (see [Languages](#languages)).
- **Admin panel** — full administration suite under `/admin`.

---

## Requirements

- **PHP** 8.0+ (tested on PHP 8.2.x). The codebase originally targeted PHP 5/7; PHP 8.x incompatibilities have been patched (see [Changelog](CHANGELOG.md)).
- **Apache 2.4+** with `mod_rewrite` enabled.
- **MySQL 5.7+ / MariaDB 10.x**.
- PHP extensions:
  - `mysqli` (required)
  - `gd` (required for image generation/verification)
  - `mbstring` (recommended)
  - `curl` (recommended for external integrations)

---

## Installation

Two ways to install the game.

### Option 1: Web installer (recommended)

1. Upload the repository to your web server and point the document root to the repository root.
2. Open `install.php` in your browser.
3. Follow the assistant: it creates your `.env` file, connects to the database, imports the bundled schema, creates the **admin account** (username, e-mail and password you choose, with full admin rights) and generates the random **team password** (`KEYZITAPASS` password-salt and the `TEAM_PASSWORD` staff security password).
4. After installation, **delete `install.php` and `install.lock`** from the document root for security.

### Option 2: Manual setup

1. Clone the repository:
   ```bash
   git clone https://github.com/StateDev08/Pokemon-World-Legends.git
   ```
2. Copy the environment template and fill in your credentials:
   ```bash
   cp .env.example .env
   ```
   Edit `.env` and set the database and SMTP details (see [Configuration](#configuration)).
3. Import the database schema:
   ```bash
   mysql -u <user> -p <database> < app/includes/install/WorldLegends_Database.sql
   ```
   The schema contains **107 tables** covering users, Pokémon, battles, items, the economy, leagues, clans and more.
4. Make sure the document root points to the repository root and that Apache rewrites are active.
5. Ensure `.env` is not accessible from the web:
   - **Apache**: the shipped `.htaccess` already blocks `.env` files.
   - **Nginx**: add a rule that denies requests to `.env`.

---

## Configuration

All environment-specific settings live in `.env` (the template is `.env.example`). Never commit `.env` to version control.

| Variable        | Description                                    | Example                |
|-----------------|------------------------------------------------|------------------------|
| `DB_HOST`       | Database host                                  | `localhost`            |
| `DB_USER`       | Database user                                  | `root`                 |
| `DB_PASSWORD`   | Database password                              |                        |
| `DB_NAME`       | Database name                                  | `worldlegends`         |
| `SMTP_HOST`     | SMTP server for outgoing mail                  | `smtp.yourhost.com`    |
| `SMTP_PORT`     | SMTP port                                      | `587`                  |
| `SMTP_MAIL`     | "From" address for system e-mails              | `noreply@yourdomain.com` |
| `SMTP_PASS`     | SMTP password                                  |                        |
| `KEYZITAPASS`   | Password-hash salt (auto-generated on install) | auto-generated         |
| `TEAM_PASSWORD` | Shared staff security password (team area)     | auto-generated         |

The `.env` file is loaded by `app/includes/Env.php`. `KEYZITAPASS` is the salt for the `password()` hash; `TEAM_PASSWORD` is the shared security password for the team area (`equipe-check`). The web installer generates both on install (the team password can also be chosen in the installer form). Existing installations must keep their original `KEYZITAPASS`, otherwise stored account passwords no longer match. The schema also ships a number of in-code feature toggles (e.g. weekend triple XP, double silver days, seasonal shops) in `app/includes/resources/config.php`.

---

## Architecture & Request Flow

The game uses a **front-controller** pattern:

1. Apache rewrites every non-file, non-directory request to `index.php?page=...` via `.htaccess`:
   ```
   RewriteRule ^([^\.]*)$ index.php?page=$1 [L]
   ```
2. `index.php` sanitizes the `page` parameter (character whitelist, `..` removal) and validates it with `isAllowedPage()` — a whitelist that blocks access to internal directories (`app/`, `language/`, `checkwp/`, `public/`) except for a few intentional routes such as `poke-evolve` and `poke-newattack`.
3. `config.php` boots the session. **The session cookie name is derived from a hash of the client IP + User-Agent** (`'__' . sha1(md5('secure' . IP . UA))`), so every browser/UA combination uses a distinct cookie name for the same session id.
4. A routing chain resolves the final page based on session state, captcha expiry, pending battle state, a newly learned attack (`aanvalnieuw`) or a pending evolution (`evolueren`), duels, etc.
5. The layout template renders and includes `$page . '.php'`.

### Captcha gate

Pages such as `attack/attack_map`, gyms and the trainer hub require a captcha every **600 seconds** (extended to **1200 seconds** for premium accounts, tracked via `gebruikers.captcha_time`). When expired, the router redirects the request to `captcha.php`.

### Battle data exchange

Battle views poll the server via AJAX. Responses are **pipe-delimited** strings parsed on the client with `msg.split(" | ")`. This is why PHP warnings/notices are suppressed on the battle endpoints: any stray output before the payload shifts the array indices and freezes the battle UI.

### Evolution & move learning

Leveling is driven by the `levelen` table: rows with `wat = 'evo'` define evolutions (e.g. Charmander at level 16 → Charmeleon via `nieuw_id`), rows with `wat = 'att'` define moves learned. After a battle, `pokemon_grow()` (in `attack/attack.inc.php`) sets either `$_SESSION['evolueren']` (base64-encoded `pokemonid/nieuw_id`) or `$_SESSION['aanvalnieuw']`; `index.php` then routes the player to `poke-evolve.php` or `poke-newattack.php` respectively.

---

## Directory Structure

```
├── .env / .env.example     # Environment configuration
├── .htaccess               # mod_rewrite routing + .env / SVG protection
├── index.php               # Front controller and router
├── install.php             # Web installer
├── install.lock            # Marker created by the installer
├── app/
│   ├── ajax/               # AJAX endpoints (box, market, potions, stats, ...)
│   ├── cache/              # Cache storage
│   ├── classes/            # Clans, Friends, League, Messages, Utils, ...
│   ├── cron/               # Scheduled maintenance scripts (see Cron Jobs)
│   └── includes/
│       ├── DB/             # Database layer (DB::exQuery, DB::real_escape_string)
│       ├── Env.php         # .env loader
│       ├── install/        # WorldLegends_Database.sql (107 tables)
│       ├── PHPMailer/      # Bundled PHPMailer library
│       └── resources/      # config.php, ingame.inc.php, login.php,
│                           # poke-evolve.php, poke-newattack.php, ...
├── attack/                 # Battle system
│   ├── attack_map.php      # Overworld attack map (anti-bot guard on battles)
│   ├── attack.inc.php      # Shared battle logic (pokemon_grow(), ...)
│   ├── wild/               # Wild battles (start / attack / do_attack / finish)
│   ├── trainer/            # Trainer NPC battles
│   └── duel/               # Player-versus-player duels
├── admin/                  # Admin panel (give Pokémon, mass mail, bans, ...)
├── language/               # i18n packs (general, pages, box, mail, events)
├── public/                 # Static assets (CSS, JS, images, sprites)
├── tools/                  # Translation helpers (translate.py)
└── *.php                   # Game pages (box, market, town, casino, ...)
```

---

## Game Systems

| Area            | Location                | Description                                        |
|-----------------|-------------------------|----------------------------------------------------|
| Wild battles    | `attack/wild/`          | Random encounters, catching with Poké Balls, XP.    |
| Trainer battles | `attack/trainer/`       | NPC trainer battles with rewards.                   |
| Duels           | `attack/duel/`          | Player-vs-player battles.                           |
| Attack map      | `attack/attack_map.php` | Overworld map; battle spots are POST-guarded against bots. |
| Evolution       | `app/includes/resources/poke-evolve.php` | Confirms evolutions, recomputes stats and abilities. |
| Move learning   | `app/includes/resources/poke-newattack.php` | Slot selection for newly learned attacks. |
| Box / trading   | `box.php`, `transferlist.php`, `market.php` | Store, trade and sell Pokémon. |
| Economy         | `gold-market.php`, `bank.php`, `casino*.php`, `slots.php` | Gold market, bank, casinos. |
| Activities      | `daycare.php`, `safari.php`, `fishing.php`, `fountain.php` | Side content. |
| Social          | `friends*.php`, `inbox.php`, `clans.php` | Friends, mail, clans. |
| Competitive     | `league*.php`, `inc_league.php`, `tour*` | League and tournaments. |

---

## Languages

Six interface languages are available:

- Portuguese (`pt`) — **default**
- German (`de`)
- English (`en`)
- Polish (`pl`)
- Russian (`ru`)
- Chinese (`zh`)

Language packs live under `language/` (e.g. `language/general/language-general-en.php`). Switch languages with `?language=XX`, or by setting the `pa_language` cookie. The extraction helpers in `tools/` (`translate.py`, `translate_extract.php`) regenerate translation templates from the source files.

---

## Cron Jobs

`app/cron/` contains the scheduled maintenance scripts. Wire them to your system cron / task scheduler; timings are conventions and should be chosen to match the game's balance:

| Script             | Purpose                                      |
|--------------------|----------------------------------------------|
| `cron_day.php`     | Daily resets (bonuses, quests, activities).  |
| `cron_week.php`    | Weekly resets.                               |
| `cron_daycare.php` | Day-care growth ticks.                       |
| `cron_market.php`  | Market/auction maintenance.                  |
| `cron_auction.php` | Auction house resolution.                    |
| `cron_traders.php` | Trader restock.                              |
| `cron_quests.php`  | Quest availability.                          |
| `cron_rankings.php`| Rank recalculation.                          |
| `cron_league.php`  | League maintenance.                          |
| `cron_tour.php`    | Tournament lifecycle.                        |
| `cron_backup.php`  | Database backups.                            |
| `attpokesrank.php` | Attack-rank bookkeeping.                     |

---

## Admin Panel

The `admin/` directory contains the complete administration suite, protected by the in-game rank system (`gebruiker.admin`). It includes:

- Pokémon management: give, create, release, transfer, eggs, promo distributions (`addpoke.php`, `give-pokemon.php`, `give-egg.php`, `promo.php`, `transfer-pokemon.php`).
- Economy tools: mass gold, mass premium, donations, silver (`massa-gold.php`, `massa-premium.php`, `silver.php`).
- Moderation: account/character/IP bans (`ban-char.php`, `ban-conta.php`, `ban-ip.php`), wrong-login monitor (`wrong-login.php`), mass mail (`mass-mail.php`), official messages (`official-message.php`).
- Configuration: homepage headline (`change-headline.php`, `change-homepage.php`), tournaments (`tournament.php`), league (`league.php`).

---

## Security Notes

- **Never commit `.env`** to version control — it contains database and SMTP credentials.
- After installation, **delete `install.php` and `install.lock`**.
- The shipped `.htaccess` blocks `.env`/`.lock` files and only permits SVG uploads. If you use Nginx, replicate those rules.
- Battle start requests on the attack map are validated against a per-session unique id; mismatches are logged and bounced (anti-bot measure).
- The session cookie name is derived from the client IP and User-Agent, which makes cross-device session reuse harder (note: changing UA or IP produces a new cookie name for the same session id).
- `isAllowedPage()` in `index.php` restricts which internal files can be routed as pages (path traversal / arbitrary-include protection).

---

## Troubleshooting

- **"Argument #1 ($array) cannot be passed by reference"** — PHP 8.x removed the by-reference expression behavior of `array_push()`/`array_pop()`. The codebase has been patched; if you hit this in a third-party script, replace `array_push($arr, $x)` with `$arr[] = $x` and avoid using `array_pop()` directly in expressions.
- **Battle UI freezes after an attack** — battle AJAX payloads are pipe-delimited and parsed with `msg.split(" | ")`. Any PHP warning/notice echoed before the payload shifts the indices. Look for stray output or warnings in the requested endpoint.
- **Evolution does not complete after clicking EVOLUIR** — a PHP 8 `rand(0, -1)` `ValueError` used to abort `poke-evolve.php` silently (the file runs with `error_reporting(0)`). Verify `poke-evolve.php` splits the ability selection into two statements; see the [Changelog](CHANGELOG.md).
- **Unexpected captcha prompts** — the captcha re-triggers 600 s (premium: 1200 s) after `captcha_time`. Browsing the map/trainer pages repeatedly will eventually hit this gate.
- **`page=notfound` on clean URLs** — confirm `mod_rewrite` is enabled and the `.htaccess` rules are active; the router rejects routes that do not map to a real `.php` file.

---

## Support

If you would like to support the project, consider [donating via PayPal](https://www.paypal.com/donate/?hosted_button_id=6UWWHPT9532B2).

---

## Changelog

See [CHANGELOG.md](CHANGELOG.md) for a full record of notable changes and bug fixes.

---

## License / Disclaimer

Pokémon is a registered trademark of Nintendo, Creatures Inc. and GAME FREAK Inc. This project is a fan game and is not affiliated with or endorsed by Nintendo, The Pokémon Company, or Game Freak.
