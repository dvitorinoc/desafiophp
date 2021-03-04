<?php

namespace Core;


/**
 * @author Douglas Carvalho Santos
 */
class App
{
    private $_requests;
    public $router;
    public $helpersList;
    public $url;

    /**
     * Default constructor
     */
    public function __construct()
    {
        $this->_requests = new \Core\Requests();
        $this->router = new \Core\Router();
    }

    /**
     * 
     */
    public function start()
    {
        $url = $this->_requests->getGet('url');
        $this->router->doCallback($url);
    }
    /**
     * 
     */
    public function helpers($helperList = [])
    {
        if(is_array($helperList)) {
            $this->helpersList = $helperList;
        }
    }
    /**
     * 
     */
    public function baseUrl($url)
    {
        if(!is_array($url)) {
            $this->url = $url;
        }
    }

}
