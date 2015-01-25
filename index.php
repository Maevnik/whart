<?php
session_start();
header('charset: utf-8');
ini_set('display_errors','On');	
echo 'INDEX</br>';
include __DIR__.'/core/router.php';
$CM = new BaseController();
$CM->View('RECORDS');
?>