<?php

error_reporting(-1);

if (!class_exists('Phalcon\Loader')) {
    throw new Exception('Phalcon library not found!');
}

if (!is_readable(__DIR__ . '/../app/bootstrap.php')) {
    throw new Exception('Can not read bootstrap settings!');
}

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');
define('CORE_PATH', BASE_PATH . '/core');
define('ROUTER_PATH', BASE_PATH . '/routes');
define('STORAGE_PATH', BASE_PATH . '/storage');
define('UPLOADED_PATH', STORAGE_PATH . '/uploaded');
define('VENDOR_PATH', BASE_PATH . '/vendor');
define('VIEW_DIR', BASE_PATH . '/views');

// $config = require_once APP_PATH . '/config/config.ini';
// require_once VENDOR_PATH . '/autoload.php';
require_once APP_PATH . '/bootstrap.php';
