# Regression checks

Run from the repository root with PHP CLI:

```sh
php audit/security-tests.php
php audit/game-url-tests.php
```

These checks do not require a database. They cover security behavior and URL generation for root installations, subdirectories and nested endpoints.

`pweb-route-tests.ps1` checks the real map-form POST and the resulting battle page. Run it only against a disposable test installation with a prepared trainer and an existing credentials JSON file containing `username` and `password`:

```powershell
./audit/pweb-route-tests.ps1 -BaseUri <game-url> -CredentialFile <local-credentials-json>
```

The trainer fixture ID is `900001`. The trainer must be in Kanto, have a living Pokemon and have no active battle. This test starts a battle and changes test data. Credentials, database snapshots, logs and local screenshots are intentionally excluded from the repository.
