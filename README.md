# Pokémon World Legends

A fan-made Pokémon browser MMO game.

## Requirements

- PHP 8.0+ (8.3 recommended)
- MySQL / MariaDB
- Apache with `mod_rewrite` enabled
- `mysqli` PHP extension
- `gd` PHP extension
- `mbstring` PHP extension (recommended)

## Installation

Two ways to install the game.

### Option 1: Web installer (recommended)

1. Upload the repository to your web server and make sure the document root points to the repository root.
2. Open `install.php` in your browser.
3. Follow the assistant to create your `.env` file, connect to the database and import the included schema.
4. After installation, delete `install.php` and `install.lock` for security.

### Option 2: Manual

1. Clone the repository:
   ```bash
   git clone https://github.com/StateDev08/Pokemon-World-Legends.git
   ```

2. Copy the environment example and fill in your credentials:
   ```bash
   cp .env.example .env
   ```
   Edit `.env` and set the database and SMTP details.

3. Import the database schema from `app/includes/install/WorldLegends_Database.sql`.

4. Make sure the document root points to the repository root.

5. Ensure `.env` is not accessible from the web:
   - Apache: `.htaccess` already blocks `.env` files.
   - Nginx: add a rule to deny `.env` files.

## Languages

The game now supports six interface languages:

- Portuguese (`pt`) – default
- German (`de`)
- English (`en`)
- Polish (`pl`)
- Russian (`ru`)
- Chinese (`zh`)

Switch languages by adding `?language=XX` to the URL, or by setting the `pa_language` cookie.

## Security notes

- Never commit `.env` to version control.
- Keep your database password and SMTP credentials secret.
- The `checkwp/` directory is a separate WordPress installation and should be updated independently.
- After installing, delete `install.php` and `install.lock` from the document root.

## Support

If you would like to support the project, consider [donating via PayPal](https://www.paypal.com/donate/?hosted_button_id=6UWWHPT9532B2).

## Disclaimer

Pokémon is a registered trademark of Nintendo. This project is a fan game and is not affiliated with Nintendo, The Pokémon Company, or Game Freak.
