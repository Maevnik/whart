<?php
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
        
        // получаем имя экшена
        if ( !empty($routes[2]) )
        {
            $action_name = $routes[2];
        }
        $controller_name = $controller_name.'Controller';
        $action_name = $action_name.'Action';

        if (file_exists(__DIR__.'/controller/'.$controller_name.'.php'))
        {
            include __DIR__.'/controller/'.$controller_name.'.php';
            $controller = new $controller_name;
            if (method_exists($controller,$action_name))
			{
				$controller->$action_name();
			}
			else
			{
				Route::ErrorPage404();
			}
		}
		else
        {
            Route::ErrorPage404();
        }
    }
       
    
    function ErrorPage404()
    {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
		echo 'ErrorPage404';
        //header('Location:'.$host.'404');
    }
}