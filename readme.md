## Cobalt CMS
Project created as a way of learning Laravel 4. It is in very early development and may be broken. You're using it on your own risk.

## Requirements
- Laravel 4.1.x
- PHP 5.4+
- MySQL 5.x
- Composer

## Installation
To install Cobalt CMS you'll need archive with CMS files itself and Composer. Follow those rules:
1. Unpack archive into proper location on the server
2. Run `composer update` from the inside of this directory
3. Fill in `app/config/database.php` with correct connection data
4. Open `http://domain.tld/install` to run web installer. Currently you cannot configure anything here, so account `admin:admin` will be created.