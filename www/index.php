<?php
	session_start();
   	include("./core/settings.php"); //Загружает девайндеры и др. настройки

	include_once('./core/Router.class.php');
	$route=new Router();
	$route->start();