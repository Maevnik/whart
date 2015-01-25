<?php
function __autoload($class_name) 
    {
        if (file_exists(__DIR__.'/controller/'.$class_name.'.php'))
            {
                include __DIR__.'/controller/'.$class_name.'.php';
            }
            else 
                if (file_exists(__DIR__.'/model/'.$class_name.'.php'))
                {
                    include __DIR__.'/model/'.$class_name.'.php';
                }
                else
                {
                   echo "404";    
                }
    }