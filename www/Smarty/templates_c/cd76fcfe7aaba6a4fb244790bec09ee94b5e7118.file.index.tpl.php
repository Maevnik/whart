<?php /* Smarty version Smarty-3.1.21-dev, created on 2015-02-06 19:04:29
         compiled from "W:\home\whart.maevnik.ru\www\Smarty\templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2807554d4d5abcca544-90090847%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd76fcfe7aaba6a4fb244790bec09ee94b5e7118' => 
    array (
      0 => 'W:\\home\\whart.maevnik.ru\\www\\Smarty\\templates\\index.tpl',
      1 => 1423235048,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2807554d4d5abcca544-90090847',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_54d4d5abd6a7e9_41654196',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_54d4d5abd6a7e9_41654196')) {function content_54d4d5abd6a7e9_41654196($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config("test.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars("setup", 'local'); ?>
<?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('title'=>'foo'), 0);?>

<div class="jumbotron">
  <h1></h1>
  <p>...</p>
  <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>
</div>
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php }} ?>
