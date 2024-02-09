#

Setup

- Fork this repo
- Clone to your local server
- run composer install
- Create a vhost pointing to the /public directory
- Import the table schema from .docker/mysql
- Rename /config/autoload/db.local.php.dist to db.local.php
- Edit db.local.php for your mysql/maria connection
- Run composer development-enable
- Load your local site in a browser
