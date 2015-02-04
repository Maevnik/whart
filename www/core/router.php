<?php
    function __autoload($classname)
    {
        include __DIR__.'/model/'.$classname.'.php';
    }
    class Route
{
    static function start()
    {
        $controller_name = 'Main';
        $action_name = 'index';
        $routes = explode('/', $_SERVER['REQUEST_URI']);
        if ( !empty($routes[1]) )
        {	
            $controller_name = $routes[1];
        }
        if ( !empty($routes[2]) )
        {
            $action_name = $routes[2];
        }
        $controller_name = $controller_name.'Controller';
        $action_name = $action_name.'Action';
        echo $controller_name.'</br>';
        echo $action_name.'</br>';
        if (file_exists(__DIR__.'/controller/'.$controller_name.'.php'))
        {
            include (__DIR__.'/controller/'.$controller_name.'.php');
            $controller = new $controller_name;
            if(method_exists($controller, $action_name))
            {
                echo 'METHOD EX';
                // вызываем действие контроллера
                $controller->$action_name();
            }
                else
                    {
                    echo 'METHOD IND';
                        $controller->index;
                    }
        }
        else
        {
            echo ''.__DIR__.'/controller/'.$controller_name.'.php';
            echo '</br>FILE NOT EX</br>';
            Route::ErrorPage404();
        }
    }
       
    function ErrorPage404()
    {
        ECHO '404</br>';
    }
}