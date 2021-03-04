<?php

namespace Core;


/**
 * @author Douglas Carvalho Santos
 */
class View
{


    /**
     * Default constructor
     */
    public function __construct()
    {
        // ...
    }

    /**
     * @param  $viewFile
     */
    public function load($viewFile, $data = NULL)
    {
        if(is_array($data)) {
            extract($data);
        }
        include(ROOT . DS . 'Views' . DS . $viewFile . '.php');
    }

}
