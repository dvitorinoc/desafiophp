<?php

    if(!function_exists('setMessage')) {
        function setMessage($message) {
            if(!isset($_SESSION['messages'])) {
                $_SESSION['messages'] = [];
            }
            array_push($_SESSION['messages'], $message);
        }
    }

    
    if(!function_exists('useMessage')) {
        function useMessage($message) {
            if(!isset($_SESSION['messages'])) {
                return false;
            }
            $index = array_search($message, $_SESSION['messages']);
            if($index === false) {
                return false;
            }
            unset($_SESSION['messages'][$index]);
            return true;
        }
    }

    if(!function_exists('convertDate')) {
        function convertDate($date) {
            return date('Y-m-d', strtotime(str_replace('/','-', $date)));
        }
    }