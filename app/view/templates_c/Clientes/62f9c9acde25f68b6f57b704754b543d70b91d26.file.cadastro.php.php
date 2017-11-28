<?php /* Smarty version Smarty-3.1.1, created on 2016-06-01 07:56:30
         compiled from "app/view/templates\Clientes\cadastro.php" */ ?>
<?php /*%%SmartyHeaderCode:18910574e790eb5b346-58943371%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '62f9c9acde25f68b6f57b704754b543d70b91d26' => 
    array (
      0 => 'app/view/templates\\Clientes\\cadastro.php',
      1 => 1464758784,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18910574e790eb5b346-58943371',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'URL_DEFAULT' => 0,
    'cliente' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_574e790ebb8f5',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574e790ebb8f5')) {function content_574e790ebb8f5($_smarty_tpl) {?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['HEAD']->value;?>
<?php $_tmp1=ob_get_clean();?><?php echo $_smarty_tpl->getSubTemplate ($_tmp1, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<h1>Cadastro de clientes</h1>
<a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
clientes">Listar clientes cadastrados</a>
<br/><br/>

<form action="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
clientes/cadastrar" method="post">
	<?php if (isset($_smarty_tpl->tpl_vars['cliente']->value)){?>
		<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['cliente']->value['id'];?>
" />
   <?php }?>
   Nome:<input type="text" name="nome" maxlength="255" value="<?php if (isset($_smarty_tpl->tpl_vars['cliente']->value)){?><?php echo $_smarty_tpl->tpl_vars['cliente']->value['nome'];?>
<?php }?>" /><br /><br />
   Idade:<input type="text" name="idade" maxlength="3" value="<?php if (isset($_smarty_tpl->tpl_vars['cliente']->value)){?><?php echo $_smarty_tpl->tpl_vars['cliente']->value['idade'];?>
<?php }?>" /><br /><br/>
   <input type="submit" value="Enviar" />
</form>
	
<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['FOOTER']->value;?>
<?php $_tmp2=ob_get_clean();?><?php echo $_smarty_tpl->getSubTemplate ($_tmp2, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>