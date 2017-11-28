<?php /* Smarty version Smarty-3.1.1, created on 2012-07-26 00:38:05
         compiled from "app/view/templates\Clientes\editar.php" */ ?>
<?php /*%%SmartyHeaderCode:286935010bb9d7f7b99-73809356%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '748b128f4da563f9922ea9cca686003fd85054fb' => 
    array (
      0 => 'app/view/templates\\Clientes\\editar.php',
      1 => 1343273278,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '286935010bb9d7f7b99-73809356',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'msg_alert' => 0,
    'URL_DEFAULT' => 0,
    'dados' => 0,
    'erros' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_5010bb9da9d8b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5010bb9da9d8b')) {function content_5010bb9da9d8b($_smarty_tpl) {?><html>
  <head>
     <title>Cadastro de Clientes</title>
  </head> 
  
<body>

<?php if (isset($_smarty_tpl->tpl_vars['msg_alert']->value)){?>
	<h3><?php echo $_smarty_tpl->tpl_vars['msg_alert']->value;?>
</h3>
<?php }?>

<form action="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
clientes/editar/id/<?php echo $_smarty_tpl->tpl_vars['dados']->value['id'];?>
" method="post">

Nome:<input type="text" name="nome" id="txt_nome" value="<?php echo $_smarty_tpl->tpl_vars['dados']->value['nome'];?>
" /><?php if (isset($_smarty_tpl->tpl_vars['erros']->value['nome'])){?> <?php echo $_smarty_tpl->tpl_vars['erros']->value['nome']['mensagem'];?>
 <?php }?><br />
Idade:<input type="text" name="idade" id="txt_idade" value="<?php echo $_smarty_tpl->tpl_vars['dados']->value['idade'];?>
" /><?php if (isset($_smarty_tpl->tpl_vars['erros']->value['idade'])){?> <?php echo $_smarty_tpl->tpl_vars['erros']->value['idade']['mensagem'];?>
 <?php }?><br />
Sexo:<input type="radio" name="sexo" value="m" <?php if ($_smarty_tpl->tpl_vars['dados']->value['sexo']=='m'){?> checked="checked" <?php }?> />Masculino
<input type="radio" name="sexo" value="f" <?php if ($_smarty_tpl->tpl_vars['dados']->value['sexo']=='f'){?> checked="checked" <?php }?> />Feminino<?php if (isset($_smarty_tpl->tpl_vars['erros']->value['sexo'])){?> <?php echo $_smarty_tpl->tpl_vars['erros']->value['sexo']['mensagem'];?>
 <?php }?><br />
Endereço:<input type="text" name="endereco" id="txt_endereco" value="<?php echo $_smarty_tpl->tpl_vars['dados']->value['endereco'];?>
" /><?php if (isset($_smarty_tpl->tpl_vars['erros']->value['endereco'])){?> <?php echo $_smarty_tpl->tpl_vars['erros']->value['endereco']['mensagem'];?>
 <?php }?><br />
Bairro:<input type="text" name="bairro" id="txt_bairro" value="<?php echo $_smarty_tpl->tpl_vars['dados']->value['bairro'];?>
" /><?php if (isset($_smarty_tpl->tpl_vars['erros']->value['bairro'])){?> <?php echo $_smarty_tpl->tpl_vars['erros']->value['bairro']['mensagem'];?>
 <?php }?><br />
Cidade:<input type="text" name="cidade" id="txt_cidade" value="<?php echo $_smarty_tpl->tpl_vars['dados']->value['cidade'];?>
" /><?php if (isset($_smarty_tpl->tpl_vars['erros']->value['cidade'])){?> <?php echo $_smarty_tpl->tpl_vars['erros']->value['cidade']['mensagem'];?>
 <?php }?><br />
Estado:<select name="estado">
<option value="">--Selecione--</option>
<option value="RS" <?php if ($_smarty_tpl->tpl_vars['dados']->value['estado']=='RS'){?> selected="selected" <?php }?>>Rio Grande do Sul</option>
<option value="SC" <?php if ($_smarty_tpl->tpl_vars['dados']->value['estado']=='SC'){?> selected="selected" <?php }?>>Santa Catarina</option>
<option value="PR" <?php if ($_smarty_tpl->tpl_vars['dados']->value['estado']=='PR'){?> selected="selected" <?php }?>>Paraná</option>
</select><?php if (isset($_smarty_tpl->tpl_vars['erros']->value['estado'])){?> <?php echo $_smarty_tpl->tpl_vars['erros']->value['estado']['mensagem'];?>
 <?php }?><br />
<input type="submit" value="Enviar" />
<input type="button" value="Voltar" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
Clientes/pesquisar');" />
<input type="hidden" name="data_cadastro" value="<?php echo $_smarty_tpl->tpl_vars['dados']->value['data_cadastro'];?>
" />
<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['dados']->value['id'];?>
" />

</form>

</body>
  
</html><?php }} ?>