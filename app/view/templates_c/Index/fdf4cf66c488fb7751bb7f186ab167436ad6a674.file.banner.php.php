<?php /* Smarty version Smarty-3.1.1, created on 2016-05-21 15:39:38
         compiled from "include\banner.php" */ ?>
<?php /*%%SmartyHeaderCode:30235740651ac18ae1-31593370%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fdf4cf66c488fb7751bb7f186ab167436ad6a674' => 
    array (
      0 => 'include\\banner.php',
      1 => 1346116615,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30235740651ac18ae1-31593370',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'URL_DEFAULT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_5740651ac2633',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5740651ac2633')) {function content_5740651ac2633($_smarty_tpl) {?>	<div id="banner" class="nivoSlider theme-default">
		    	<img src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/img/banner.jpg" alt="banner teste da instituição"/>
		    	<img src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/img/banner2.jpg" alt="banner teste da instituição"/>
		    	<img src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/img/banner3.jpg" alt="banner teste da instituição"/>
	</div><!-- Fim banner --><?php }} ?>