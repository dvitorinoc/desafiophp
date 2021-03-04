<?php
namespace Core;


/**
 * @author Douglas Carvalho Santos
 */
class Router
{
    private $_routes = [];

    /**
     * Default constructor
     */
    public function __construct()
    {
        // ...
    }

    /**
     * @param  $route 
     * @param  $callback
     */
    public function add($route,  $callback)
    {
        if($route != NULL && !is_array($route)) {
            $route = str_replace('/','\/', $route);
            $routeData = [
                'route' => '/' . $route . '\/*(.*)\/*/',
                'callback' => $callback
            ];
            array_push($this->_routes, $routeData);
        }
    }

    public function doCallback($routePattern) {
        global $app;

        foreach($this->_routes as $route) {
            preg_match($route['route'], $routePattern, $matches);
            if(count($matches) > 0) {
                $c = explode('::', $route['callback']);
                $controller = '\\Controllers\\' . $c[0];
                $action = $c[1];
                $controller = new $controller();

                $params = explode('/', $matches[1]);

                call_user_func_array(array($controller, $action), $params);
                return;
            }
        }
        \Core\ErrorPages::notFound();
    }

}
