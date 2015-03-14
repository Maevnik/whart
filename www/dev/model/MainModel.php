<?php
class MainModel
{
	public $db;
	private $db_user;
	private $db_password;
	private $db_host;
	private $db_base;

	function __construct()
	{
	$db_user = 'root';
	$db_password = '';
	$db_host = 'localhost';
	$db_base='host1354893_whar';
	$db = mysql_connect($db_host, $db_user, $db_password) or die('Error Incorrect Connection Data');
	mysql_select_db($db_base);
	}
	
}