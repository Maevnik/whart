<?php
session_start();
header('charset: utf-8');
ini_set('display_errors','On');	
require (__DIR__.'/core/router.php');
$user=new UserModel();
$user->Get(3);
require (__DIR__.'/Smarty/libs/Smarty.class.php');
$smarty = new Smarty();
$smarty->template_dir = __DIR__.'/Smarty/templates/';
$smarty->cache_dir = __DIR__.'/Smarty/cache/';
$smarty->config_dir = __DIR__.'/Smarty/configs/';
$smarty->compile_dir=__DIR__.'/Smarty/templates_c/';
$smarty->assign('login',$user->login);
$smarty->assign('user_id',$user->user_id);
$smarty->display('index.tpl');
//echo $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
//Route::start();
?>