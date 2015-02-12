<?php
class ClientModel extends DataBaseModel
{
	public $clientid;
	public $clientchepuha;
	private $clientkey;
	private $very_hide_value='utka';
	public function __construct()
	{
		parent::__construct();
		
		try
		{
			$query=$this->DBH->prepare('ЗДЕСЬ СОСТАВЛЯЕМ ЗАПРОС ДЛЯ ОПРЕДЕЛЕНИЯ ЕСТЬ ЛИ СЕССИЯ В БД С ТЕКУЩИМ ИД');
			$query->bindParam(':');
			$this->Registry('Checking session for client',1);
			//А ещё надо сделать проверка, есть ли сессия
			//Совпадает ли содержание куки и сессии поля ИД и ЧЕПУХА
			//Если да - далее проверить, есть ли пользователь с этой сессией
			//Если есть - загрузить модель пользователя
			//Если нет... то умереть:D
		}
		catch (PDOException $e)
		{
			
		}
		
		$this->clientid=$this->Chepuha();
		$this->clientkey=>$this->Randomer();
	}
	public function ClientCheck()
	{
	}
	private function Randomer()
	{
		$length=7;
		$chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
		$numChars = strlen($chars);
		$string = '';
		for ($i = 0; $i < $length; $i++) 
		{
			$string .= substr($chars, rand(1, $numChars) - 1, 1);
		}
		$clientkey=$string;
	}		
	
	public function Chepuha()
	{
		return md5($this->Randomer().md5($sessionid.md5($very_hide_value)));
	}
	
}
?>