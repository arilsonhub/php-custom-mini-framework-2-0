<?php /* Smarty version Smarty-3.1.1, created on 2016-06-01 07:56:31
         compiled from "app/view/templates\Clientes\index.php" */ ?>
<?php /*%%SmartyHeaderCode:4466574e790f8c33f3-79323179%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'df1cbae9594a556b6cd5b0ecd5c89e59e61bf8f5' => 
    array (
      0 => 'app/view/templates\\Clientes\\index.php',
      1 => 1464758543,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4466574e790f8c33f3-79323179',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'HEAD' => 0,
    'URL_DEFAULT' => 0,
    'clienteList' => 0,
    'cliente' => 0,
    'FOOTER' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_574e790f91930',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_574e790f91930')) {function content_574e790f91930($_smarty_tpl) {?><?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['HEAD']->value;?>
<?php $_tmp1=ob_get_clean();?><?php echo $_smarty_tpl->getSubTemplate ($_tmp1, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<h1>Listagem de clientes</h1>
<a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
clientes/cadastro">Inserir novo cliente</a>
<br/><br/>

<?php if ($_smarty_tpl->tpl_vars['clienteList']->value!=null){?>
	<table border="1" style="width:600px; border-collapse: collapse;">
		<tr>
			<td align="center">Nome</td>
			<td align="center">Idade</td>			
			<td colspan="2" align="center">Ações</td>			
		</tr>
		<?php  $_smarty_tpl->tpl_vars['cliente'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cliente']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['clienteList']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cliente']->key => $_smarty_tpl->tpl_vars['cliente']->value){
$_smarty_tpl->tpl_vars['cliente']->_loop = true;
?>
			<tr>
				<td align="center"><?php echo $_smarty_tpl->tpl_vars['cliente']->value['nome'];?>
</td>
				<td align="center"><?php echo $_smarty_tpl->tpl_vars['cliente']->value['idade'];?>
</td>
				<td align="center"><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
clientes/cadastro/id/<?php echo $_smarty_tpl->tpl_vars['cliente']->value['id'];?>
">Editar</a></td>
				<td align="center"><a href="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
clientes/remover/id/<?php echo $_smarty_tpl->tpl_vars['cliente']->value['id'];?>
">Remover</a></td>
			</tr>
		<?php } ?>
	</table>
<?php }else{ ?>
	<div style="color:red; font-size:14px;">Nenhum registro encontrado.</div>
<?php }?>

<?php ob_start();?><?php echo $_smarty_tpl->tpl_vars['FOOTER']->value;?>
<?php $_tmp2=ob_get_clean();?><?php echo $_smarty_tpl->getSubTemplate ($_tmp2, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>