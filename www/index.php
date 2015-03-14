<?php
/**
 * Example Application
 *
 * @package Example-application
 *//* 
require './Smarty/libs/Smarty.class.php';
require './dev/init.class.php'; */
include_once("./dev/model/UserModel.php");
include_once("./dev/model/MainModel.php");

$user = new UserModel();
$user ->Get_by_ID(114); 
echo $user->login;