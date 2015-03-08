<?php
	class Router
	{
		public $controller;
		public $action;
		
		public function __construct()
		{
			$this->controller="index";
			$this->action="show";
			include_once("./core/controller/GC.php");
			include_once("./core/model/GM.php");
		}
		public function Start()
		{
			$routes = explode('/', $_SERVER['REQUEST_URI']);
			
			if (!empty($routes[1]))
				{	
					$this->controller = $routes[1];
				}
				
			if (!empty($routes[2]))
				{
					$this->action = $routes[2];
				}
			if (file_exists("./core/controller/".$this->controller.".php"))
			{
				include_once("./core/controller/".$this->controller.".php");
				if (class_exists($this->controller))
				{
					$CTRL=new $this->controller();
					if (method_exists($CTRL,$this->action."Action"))
					{
						$ACT=$this->action."Action";
						$CTRL->$ACT();
					}
					else
					{
						//ERRORS
						echo "Error #1: undefined action";
					}
				}
				else
					{
						//ERRORS
						echo "Error #1: undefined class";
					}
			}
			else
			{
				//ERRORS
				echo "Error #1: undefined controller - ".$this->controller;
			}
		}
	}