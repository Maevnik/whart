<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-02-06 19:05:20
         compiled from "W:\home\whart.maevnik.ru\www\Smarty\templates\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3175254d4d5abe031f3-42243684%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '851b9790e2f3447e92c1268694adf94064dec209' => 
    array (
      0 => 'W:\\home\\whart.maevnik.ru\\www\\Smarty\\templates\\header.tpl',
      1 => 1423235118,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3175254d4d5abe031f3-42243684',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54d4d5abe29fd4_63486798',
  'variables' => 
  array (
    'login' => 0,
    'user_id' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d4d5abe29fd4_63486798')) {function content_54d4d5abe29fd4_63486798($_smarty_tpl) {?><HTML>
<HEAD>
    <TITLE>Whart - <?php echo $_smarty_tpl->tpl_vars['login']->value;?>
</TITLE>
	<link rel="stylesheet" href="Smarty/templates/css/bootstrap.min.css">
</HEAD>

<BODY bgcolor="#ffffff">
<?php echo '<script'; ?>
 src="Smarty/templates/js/bootstrap.min.js"><?php echo '</script'; ?>
>
<div class="page-header">
  <h1><?php echo $_smarty_tpl->tpl_vars['login']->value;?>
<small>#<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
</small></h1>
</div><?php }} ?>
