<?php

# Adjuste these values according to your needs

define('DEBUG', true);
define('TITLE', 'Your Page Title');

define('DB_HOST', 'localhost');
define('DB_NAME', 'your_db');
define('DB_USER', 'your_db_user');
define('DB_PASS', 'your_db_password');

define('BASE_URL', 'your_url');
define('BASE_PATH', dirname(__FILE__));

define('TOP_LOGO', BASE_URL . '/img/logo.png');

define('CACHE_DIR', 'cache');
define('CACHE_URL', BASE_URL . '/cache');
define('CACHE_PATH', BASE_PATH . '/cache');

define('IMG_NAME_FONT', BASE_PATH . '/font/arialbd.ttf');
define('IMG_NAME_TOP', 310);
define('IMG_NAME_SIZE', 30);

define('IMG_DATA_FONT', BASE_PATH . '/font/arialbd.ttf');
define('IMG_DATA_TOP', 468);
define('IMG_DATA_SIZE', 26);

global $db;

require('functions.php');

?>
