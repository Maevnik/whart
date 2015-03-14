<?php
	 //Загружает девайндеры и др. настройки
	class Router
	{
		public $controller;
		public $action;
		
		public function __construct()//Загружает файлы
					     //главных модели и контроллера
					     //и задает значение по умолчанию
		{
			$this->controller="index";
			$this->action="show";
			include_once(CTR_DIR."/GC.php");
			include_once(MDL_DIR."/GM.php");
		}
		public function Start() //Парсит URL в поисках "/контроллер/действие/"
					//и загружает
					//соответствующий элемент
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
			if (file_exists(CTR_DIR.$this->controller.".php"))
			{
				include_once(CTR_DIR.$this->controller.".php");
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