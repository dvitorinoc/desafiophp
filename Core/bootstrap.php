<?php
    session_start();

    require_once(ROOT . DS . 'Config' . DS . 'Config.php');
    require_once(ROOT . DS . 'Config' . DS . 'Routes.php');

    foreach($app->helpersList as $helper) {
        $file = ROOT. DS . 'Helpers' . DS . $helper . '.php';
        if(file_exists($file)) {
            include($file);
        }
    }

    function baseUrl() {
        global $app;
        return $app->url;
    }

    function redirect($url) {
        header('Location: ' . $url, 301);
        exit();
    }