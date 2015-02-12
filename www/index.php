<?php
session_start();
header('charset: utf-8');
ini_set('display_errors','On');	
require (__DIR__.'/core/router.php');
$user = new UserModel();
$user->CreateNewUser('admin12345','admin1','Bomzh','Vasek');
$user->SetUser();
//Route::start();
//echo $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
?>