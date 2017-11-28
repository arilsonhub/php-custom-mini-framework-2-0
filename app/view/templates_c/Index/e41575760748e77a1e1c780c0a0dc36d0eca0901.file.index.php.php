<?php /* Smarty version Smarty-3.1.1, created on 2016-06-01 07:56:11
         compiled from "app/view/templates\Index\index.php" */ ?>
<?php /*%%SmartyHeaderCode:4642574e78fbb3e9d2-36462160%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e41575760748e77a1e1c780c0a0dc36d0eca0901' => 
    array (
      0 => 'app/view/templates\\Index\\index.php',
      1 => 1464760556,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4642574e78fbb3e9d2-36462160',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'URL_DEFAULT' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_574e78fbb754e',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574e78fbb754e')) {function content_574e78fbb754e($_smarty_tpl) {?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['HEAD']->value;?>
<?php $_tmp1=ob_get_clean();?><?php echo $_smarty_tpl->getSubTemplate ($_tmp1, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<h1>Bem-vindo ao framework 2.0</h1>
<a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
clientes">Clique aqui para ir ao CRUD de teste.</a>
	
<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['FOOTER']->value;?>
<?php $_tmp2=ob_get_clean();?><?php echo $_smarty_tpl->getSubTemplate ($_tmp2, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>