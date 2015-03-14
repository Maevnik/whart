<?php
class MainController
{
private $Router;
	function __constuct()
		{
			require '../init.class.php';
			$Router = new Route();
			$Router::Start();
		}
	function indexAction()
		{
			echo 'IndexAction of '.__CLASS__;
		}
	function __autoload($modelname)
	{
		if (file_exists('../model/'.$modelname))
			{
				include_once $modelname;
			}
				else
			{
				Router::ErrorPage404;
			}
	function WhereAmIAction()
		{
			echo __DIR__;
		}
	}
}