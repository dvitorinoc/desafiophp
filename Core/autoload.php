<?php
spl_autoload_register(function ($class_name) {
    if(file_exists(ROOT . DS . $class_name . '.php')) {
        include ROOT . DS . $class_name . '.php';
    }
});