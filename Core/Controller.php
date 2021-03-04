<?php

namespace Core;


/**
 * @author Douglas Carvalho Santos
 */
class Controller
{
    private $_attrs = [];
    private $_view;
    public $request;
    /**
     * Default constructor
     */
    public function __construct()
    {
        $this->_view = new \Core\View();
        $this->request = new \Core\Requests();
    }

    public function __get($name) {
        if(isset($this->_attrs[$name])) {
            return $this->_attrs[$name];
        }
    }

    /**
     * @param  $model
     */
    public function loadModel($model)
    {
        if($model != NULL && !is_array($model)) {
            $modelObject = '\\Models\\' . $model;
            $this->_attrs[$model] = new $modelObject();
        }
    }

    /**
     * @param  $viewFile
     */
    public function loadView($viewFile, $vars = NULL)
    {
        $this->_view->load($viewFile, $vars);
    }

}
