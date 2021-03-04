<?php


define('ROOT', dirname(__DIR__ ) . DIRECTORY_SEPARATOR);
define('DS', DIRECTORY_SEPARATOR);
chdir(__DIR__);

require_once(ROOT . 'Core' . DS . 'autoload.php');
require_once(ROOT . DS . 'Config' . DS . 'Database.php');

$app = new \Core\App();

require_once(ROOT . DS . 'Core' . DS .'bootstrap.php');

$app->start();