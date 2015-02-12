<?php
session_start();
header('charset: utf-8');
ini_set('display_errors','On');	
include __DIR__.'/core/router.php';
Route::start();

echo $_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
?>