<?php
session_start();
header('charset: utf-8');
ini_set('display_errors','On');	
require (__DIR__.'/core/router.php');
$user = new UserModel();
$user->Get(1);
echo $user->GetUserInfo().'</br>';
$user->login='liza';
echo $user->GetUserInfo().'</br>';
$user->Set();
$user->Get(1);
echo $user->GetUserInfo().'</br>';
//Route::start();
//echo $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
?>