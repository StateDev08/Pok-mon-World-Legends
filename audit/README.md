# Regression checks

Run from the repository root with PHP CLI:

```sh
php audit/security-tests.php
php audit/game-url-tests.php
php audit/translation-tests.php
php audit/locale-tests.php
```

These checks do not require a database. They cover security behavior and URL generation for root installations, subdirectories and nested endpoints.

`locale-tests.php` checks all 48 locale files for assignment coverage, format arguments, dynamic variables, known foreign-language leaks, encoding damage and broken HTML paths. It also exercises account-setting titles, avatar text, sales icons, rank labels and table translations across all six languages. These are structural regression checks, not a certification of every sentence's linguistic quality.

`pweb-locale-tests.ps1 -BaseUri <game-url> -CredentialFile <local-credentials-json>` loads 15 existing game views and the table language file in each locale. Use a disposable test installation and trainer `900001`, with no active battle. The test signs in and persists each selected language, ending on German; it does not submit purchases, messages or account-setting forms.

`pweb-route-tests.ps1` checks the real map-form POST and the resulting battle page. Run it only against a disposable test installation with a prepared trainer and an existing credentials JSON file containing `username` and `password`:

```powershell
./audit/pweb-route-tests.ps1 -BaseUri <game-url> -CredentialFile <local-credentials-json>
```

The trainer fixture ID is `900001`. The trainer must be in Kanto, have a living Pokemon and have no active battle. This test starts a battle and changes test data. Credentials, database snapshots, logs and local screenshots are intentionally excluded from the repository.
