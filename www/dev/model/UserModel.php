<?php
include_once('MainModel.php');
Class UserModel Extends MainModel
{
	public $user_id;
	public $login;
	public $password;
	function Create()
	{	//ÏÐÎÂÅÐÈÒÜ ÅÑÒÜ ËÈ ÄÐÓÃÎÉ ÏÎËÜÇÎÂÀÒÅËÜ Ñ ÒÀÊÈÌ ÆÅ ËÎÃÈÍÎÌ
		mysql_query("INSERT INTO `users` (`user_id`,`login`,`password`) VALUES (NULL, '".$this->login."', '".$this->password."');");	
		return true;
	}
	function Get_by_ID($id)
	{
		$query=mysql_query('SELECT COUNT(*) FROM users');
		$query=mysql_result($query,0);
		if ($id<=$query) //////ÑÄÅËÀÒÜ ÁËÅÀÒÜ ÎÒÁÐÎÑ ÌÀÊÑÈÌÓÌÀ
		$query=(mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE user_id=".$id)));
		else
		{
			echo 'Error: ID overrflow';
		}
		$this->user_id=$query['user_id'];
		$this->login=$query['login'];
		$this->password=$query['password'];
	}
	function Save()
	{
		$query=mysql_query("UPDATE `users` SET `login`='".$login."', `password`='".$password."' WHERE id=".$user_id.";");
	}
}