<?php

namespace Core;


/**
 * @author Douglas Carvalho Santos
 */
class Requests
{


    /**
     * Default constructor
     */
    public function __construct()
    {
        // ...
    }

    /**
     * 
     */
    public function getGet($name)
    {
        if(isset($_GET[$name])) {
            return $_GET[$name];
        }
        return NULL;
    }

    /**
     * 
     */
    public function getPost($name)
    {
        if(isset($_POST[$name])) {
            return $_POST[$name];
        }
        return NULL;
    }

}
