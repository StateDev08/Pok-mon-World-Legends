# Pokémon World Legends

A fan-made Pokémon browser MMO game.

## Requirements

- PHP 8.0+ (8.3 recommended)
- MySQL / MariaDB
- Apache with `mod_rewrite` enabled
- `mysqli` PHP extension

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/StateDev08/Pokemon-World-Legends.git
   ```

2. Copy the environment example and fill in your credentials:
   ```bash
   cp .env.example .env
   ```
   Edit `.env` and set the database and SMTP details.

3. Import the database schema (not included in this repo; use your existing `*.sql` dump).

4. Make sure the document root points to the repository root.

5. Ensure `.env` is not accessible from the web:
   - Apache: `.htaccess` already blocks `.env` files.
   - Nginx: add a rule to deny `.env` files.

## Security notes

- Never commit `.env` to version control.
- Keep your database password and SMTP credentials secret.
- The `checkwp/` directory is a separate WordPress installation and should be updated independently.

## Support

If you would like to support the project, consider [donating via PayPal](https://www.paypal.com/donate/?hosted_button_id=6UWWHPT9532B2).

## Disclaimer

Pokémon is a registered trademark of Nintendo. This project is a fan game and is not affiliated with Nintendo, The Pokémon Company, or Game Freak.
