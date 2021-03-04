<?php

    if(!function_exists('toBRLFormat')) {
        function toBRLFormat($value) {
            $value = number_format($value, 2);
            $value = str_replace('.',',',$value);
            return 'R$ ' . $value;
        }
    }