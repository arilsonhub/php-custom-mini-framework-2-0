<?php /* Smarty version Smarty-3.1.1, created on 2016-06-01 07:49:10
         compiled from "app/view/templates\Clientes\sucesso.php" */ ?>
<?php /*%%SmartyHeaderCode:26152574e775604a442-58453949%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f0778dcaadcfade8259691d20669916709348102' => 
    array (
      0 => 'app/view/templates\\Clientes\\sucesso.php',
      1 => 1464759862,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26152574e775604a442-58453949',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'message' => 0,
    'URL_DEFAULT' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_574e775607d0c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574e775607d0c')) {function content_574e775607d0c($_smarty_tpl) {?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['HEAD']->value;?>
<?php $_tmp1=ob_get_clean();?><?php echo $_smarty_tpl->getSubTemplate ($_tmp1, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<h1><?php echo $_smarty_tpl->tpl_vars['message']->value;?>
</h1>
<a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
clientes">Listar clientes cadastrados</a>
	
<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['FOOTER']->value;?>
<?php $_tmp2=ob_get_clean();?><?php echo $_smarty_tpl->getSubTemplate ($_tmp2, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>