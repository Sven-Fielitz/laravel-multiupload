## Projekt: Laravel Multiuplaod

<br>

## Systemvoraussetzungen

Testumgebung:
- Windows 10
- [Laravel 9](https://laravel.com/docs/9.x/deployment#server-requirements)
- PHP 8.0.19
- Apache 2.4.53
- MariaDB 10.4.24

## Installation

- `composer install`
- <b>.env.example</b> Umbenennen/kopieren nach  <b>.env</b> und Datenbank konfigurieren
- `php artisan key:generate`
- `php artisan storage:link`
- `php artisan migrate`

## Genutzte Drittanbietersoftware / Lizenzen

Server:
- PHP ([Lizenz: The PHP License](https://www.php.net/license/3_01.txt)) 
- Apache 2.4.53
  ([Lizenz: APACHE LICENSE](https://www.apache.org/licenses/LICENSE-2.0))
- mariaDB ([Lizenz: GPL](https://mariadb.com/kb/en/mariadb-licenses/#the-gpl-license)) 

PHP: 
- Laravel ([Lizenz: MIT](https://github.com/laravel/framework/blob/9.x/LICENSE.md)) 

JavaScript:
- DataTables ([Lizenz: MIT](https://datatables.net/license/mit#MIT-license))
- Dropzone.js ([Lizenz: MIT](https://github.com/dropzone/dropzone/blob/main/LICENSE))

CSS: 
- Bootstrap ([Lizenz: MIT](https://github.com/twbs/bootstrap/blob/main/LICENSE))