<?php
	session_start();
	include_once('./core/router.php');
	$route=new Router();
	$route->start();