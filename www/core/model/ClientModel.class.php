<?php
	abstract class ClientModel extends GM
	{
		private $client_ip;
		private $client_firsttime;
		private $client_lasttime;
		private $client_rand;
		static private $instance;
		
	
		private function __construct()
			{
			}  // Защищаем от создания через new Singleton
		private function __clone()    
			{ 
			}  // Защищаем от создания через клонирование
		private function __wakeup()   
			{ 
			}  // Защищаем от создания через unserialize
		public static function getInstance() 
			{  
				if ( empty(self::$instance) ) 
					{
						self::$instance = new self();
					}
				return self::$instance;
			}
		public function ClientGet()
			{
				//подключение к бд и 
				return self::$instance;
			}
	}