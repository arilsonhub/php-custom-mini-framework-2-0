<?php /* Smarty version Smarty-3.1.1, created on 2012-07-26 00:20:29
         compiled from "app/view/templates\Clientes\cadastrar.php" */ ?>
<?php /*%%SmartyHeaderCode:172685010b77ddfe8d3-11171360%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ecc9f443bbea4f98b792fa1c7f6e105060326251' => 
    array (
      0 => 'app/view/templates\\Clientes\\cadastrar.php',
      1 => 1343272796,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '172685010b77ddfe8d3-11171360',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'flag_ok' => 0,
    'URL_DEFAULT' => 0,
    'dados' => 0,
    'erros' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_5010b77e21fde',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5010b77e21fde')) {function content_5010b77e21fde($_smarty_tpl) {?><html>
  <head>
     <title>Cadastro de Clientes</title>
  </head> 
  
<body>

<?php if (isset($_smarty_tpl->tpl_vars['flag_ok']->value)){?>
	<h3><?php echo $_smarty_tpl->tpl_vars['flag_ok']->value;?>
</h3>
<?php }?>

<form action="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
clientes/cadastrar" method="post">

Nome:<input type="text" name="nome" id="txt_nome" value="<?php if (isset($_smarty_tpl->tpl_vars['dados']->value)){?><?php echo $_smarty_tpl->tpl_vars['dados']->value['nome'];?>
<?php }?>" /><?php if (isset($_smarty_tpl->tpl_vars['erros']->value['nome'])){?> <?php echo $_smarty_tpl->tpl_vars['erros']->value['nome']['mensagem'];?>
 <?php }?><br />
Idade:<input type="text" name="idade" id="txt_idade" value="<?php if (isset($_smarty_tpl->tpl_vars['dados']->value)){?><?php echo $_smarty_tpl->tpl_vars['dados']->value['idade'];?>
<?php }?>" /><?php if (isset($_smarty_tpl->tpl_vars['erros']->value['idade'])){?> <?php echo $_smarty_tpl->tpl_vars['erros']->value['idade']['mensagem'];?>
 <?php }?><br />
Sexo:<input type="radio" name="sexo" value="m" <?php if (isset($_smarty_tpl->tpl_vars['dados']->value['sexo'])){?> <?php if ($_smarty_tpl->tpl_vars['dados']->value['sexo']=='m'){?> checked="checked" <?php }?> <?php }?> />Masculino
<input type="radio" name="sexo" value="f" <?php if (isset($_smarty_tpl->tpl_vars['dados']->value['sexo'])){?> <?php if ($_smarty_tpl->tpl_vars['dados']->value['sexo']=='f'){?> checked="checked" <?php }?> <?php }?> />Feminino<?php if (isset($_smarty_tpl->tpl_vars['erros']->value['sexo'])){?> <?php echo $_smarty_tpl->tpl_vars['erros']->value['sexo']['mensagem'];?>
 <?php }?><br />
Endereço:<input type="text" name="endereco" id="txt_endereco" value="<?php if (isset($_smarty_tpl->tpl_vars['dados']->value)){?><?php echo $_smarty_tpl->tpl_vars['dados']->value['endereco'];?>
<?php }?>" /><?php if (isset($_smarty_tpl->tpl_vars['erros']->value['endereco'])){?> <?php echo $_smarty_tpl->tpl_vars['erros']->value['endereco']['mensagem'];?>
 <?php }?><br />
Bairro:<input type="text" name="bairro" id="txt_bairro" value="<?php if (isset($_smarty_tpl->tpl_vars['dados']->value)){?><?php echo $_smarty_tpl->tpl_vars['dados']->value['bairro'];?>
<?php }?>" /><?php if (isset($_smarty_tpl->tpl_vars['erros']->value['bairro'])){?> <?php echo $_smarty_tpl->tpl_vars['erros']->value['bairro']['mensagem'];?>
 <?php }?><br />
Cidade:<input type="text" name="cidade" id="txt_cidade" value="<?php if (isset($_smarty_tpl->tpl_vars['dados']->value)){?><?php echo $_smarty_tpl->tpl_vars['dados']->value['cidade'];?>
<?php }?>" /><?php if (isset($_smarty_tpl->tpl_vars['erros']->value['cidade'])){?> <?php echo $_smarty_tpl->tpl_vars['erros']->value['cidade']['mensagem'];?>
 <?php }?><br />
Estado:<select name="estado">
<option value="">--Selecione--</option>
<option value="RS" <?php if (isset($_smarty_tpl->tpl_vars['dados']->value)){?> <?php if ($_smarty_tpl->tpl_vars['dados']->value['estado']=='RS'){?> selected="selected" <?php }?> <?php }?>>Rio Grande do Sul</option>
<option value="SC" <?php if (isset($_smarty_tpl->tpl_vars['dados']->value)){?> <?php if ($_smarty_tpl->tpl_vars['dados']->value['estado']=='SC'){?> selected="selected" <?php }?> <?php }?>>Santa Catarina</option>
<option value="PR" <?php if (isset($_smarty_tpl->tpl_vars['dados']->value)){?> <?php if ($_smarty_tpl->tpl_vars['dados']->value['estado']=='PR'){?> selected="selected" <?php }?> <?php }?>>Paraná</option>
</select><?php if (isset($_smarty_tpl->tpl_vars['erros']->value['estado'])){?> <?php echo $_smarty_tpl->tpl_vars['erros']->value['estado']['mensagem'];?>
 <?php }?><br />
<input type="submit" value="Enviar" />
<input type="button" value="Voltar" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
Clientes/pesquisar');" />
</form>

</body>
  
</html><?php }} ?>