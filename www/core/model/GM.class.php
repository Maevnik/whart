<?php
	class GM
	{
		private $dsn;
		private $pdo;
		private $opt = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
		
		public function __construct()
		{
			try
			{
			$this->dsn = "mysql:host=$host;dbname=$db;charset=$charset";
			$this->pdo = new PDO($this->dsn, $user, $pass, $this->opt);
			echo "GENERAL MODEL LOADED";
			}
			catch (PDOException $e)
			{
				echo "Can't create connection to DB, aborting, </br>".$e->getMessage();
			}
		}
	}