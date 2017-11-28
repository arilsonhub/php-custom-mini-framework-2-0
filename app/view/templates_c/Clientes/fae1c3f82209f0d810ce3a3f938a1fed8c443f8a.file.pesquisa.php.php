<?php /* Smarty version Smarty-3.1.1, created on 2012-07-26 00:38:27
         compiled from "app/view/templates\Clientes\pesquisa.php" */ ?>
<?php /*%%SmartyHeaderCode:133025010bbb3347886-55751556%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fae1c3f82209f0d810ce3a3f938a1fed8c443f8a' => 
    array (
      0 => 'app/view/templates\\Clientes\\pesquisa.php',
      1 => 1343273663,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '133025010bbb3347886-55751556',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'JS_CONTROLLER' => 0,
    'CONTROLLER_ATUAL' => 0,
    'msg_alert' => 0,
    'error' => 0,
    'URL_DEFAULT' => 0,
    'ClienteDados' => 0,
    'cliente' => 0,
    'Helper' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_5010bbb35e187',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5010bbb35e187')) {function content_5010bbb35e187($_smarty_tpl) {?><html>

 <head> 
    <title>Pesquisa de Clientes</title> 
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['JS_CONTROLLER']->value;?>
<?php echo $_smarty_tpl->tpl_vars['CONTROLLER_ATUAL']->value;?>
/Clientes.js"></script>
 </head>
 
 <body>
 
 <?php if (isset($_smarty_tpl->tpl_vars['msg_alert']->value)){?> 
    <script type="text/javascript">alert("<?php echo $_smarty_tpl->tpl_vars['msg_alert']->value;?>
");</script> 
 <?php }?>
 
     <?php if (isset($_smarty_tpl->tpl_vars['error']->value)){?>
	 
	    <?php if (isset($_smarty_tpl->tpl_vars['error']->value['criterio'])){?>
		    <?php echo $_smarty_tpl->tpl_vars['error']->value['criterio']['mensagem'];?>

			
			<?php }else{ ?>			    
				<?php echo $_smarty_tpl->tpl_vars['error']->value['criterioErro']['mensagem'];?>
				
				
        <?php }?> 		
		 
	 <?php }?>
     <br />
	 <br />
 
     <form action="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
clientes/pesquisar" method="post">
		 <div>Selecione o critério de pesquisa:</div>
		 
		 <div>Nome<input type="radio" name="criterio" value="criterioNome"  onclick="selecioneCriterio('nome')" /></div>
		 <div id="divNome" style="display:none;"><input type="text" name="nome" /></div>
		 
		 <div>Idade<input type="radio" name="criterio" value="criterioIdade" onclick="selecioneCriterio('idade')" /></div>
		 <div id="divIdade" style="display:none;"><input type="text" name="idade" /></div>
		 
		 <div>Sexo<input type="radio" name="criterio" value="criterioSexo"  onclick="selecioneCriterio('sexo')" /></div>
		 <div id="divSexo" style="display:none;">
			Masculino<input type="radio" name="sexo" value="m" />
			Feminino<input type="radio" name="sexo" value="f" />
		 </div>
		 <div>Todos<input type="radio" name="criterio" value="criterioTodos" /></div>
		 
		 <div><input type="button" value="Cadastrar" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
Clientes/cadastrar');" /></div>
		 <div><input type="submit" value="Pesquisar" /></div>		 
		 <br />
		 <br />	 
	 </form>
        	 
	 <?php if (isset($_smarty_tpl->tpl_vars['ClienteDados']->value)){?>
	   		
  		<?php if (count($_smarty_tpl->tpl_vars['ClienteDados']->value)>0){?>
		
		 <table border="1">
		 
		   <tr> 
			 <td>Nome</td>
			 <td>Idade</td>
			 <td>Sexo</td>
			 <td>Cidade</td>
			 <td>Estado</td>
			 <td>Data do Cadastro</td>
		   </tr>
   			
	     <?php  $_smarty_tpl->tpl_vars['cliente'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cliente']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ClienteDados']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cliente']->key => $_smarty_tpl->tpl_vars['cliente']->value){
$_smarty_tpl->tpl_vars['cliente']->_loop = true;
?>		
		  
		  <tr>	 
			 <td><?php echo $_smarty_tpl->tpl_vars['cliente']->value['nome'];?>
</td>
			 <td><?php echo $_smarty_tpl->tpl_vars['cliente']->value['idade'];?>
</td>
			 <td><?php if ($_smarty_tpl->tpl_vars['cliente']->value['sexo']=='m'){?> Masculino <?php }else{ ?> Feminino <?php }?></td>
			 <td><?php echo $_smarty_tpl->tpl_vars['cliente']->value['cidade'];?>
</td>
			 <td><?php echo $_smarty_tpl->tpl_vars['cliente']->value['estado'];?>
</td>
			 <td><?php echo $_smarty_tpl->tpl_vars['Helper']->value->formataData($_smarty_tpl->tpl_vars['cliente']->value['data_cadastro'],'br');?>
</td>
			 <td><input type="button" value="Editar" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
Clientes/editar/id/<?php echo $_smarty_tpl->tpl_vars['cliente']->value['id'];?>
');" /></td>
			 <td><input type="button" value="Remover" onclick="document.location.replace('<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
Clientes/remover/id/<?php echo $_smarty_tpl->tpl_vars['cliente']->value['id'];?>
');" /></td>
		  </tr>	
		  
         <?php } ?>		  
			
		 </table>
	     
		 <?php }else{ ?> 
		 
		    <h4>Nenhum registro encontrado!!!</h4>
		
         <?php }?>		
		 
	 <?php }?>
 
 </body>

</html><?php }} ?>