<?php /* Smarty version Smarty-3.1.1, created on 2016-05-21 15:39:38
         compiled from "include\topo.php" */ ?>
<?php /*%%SmartyHeaderCode:215505740651abf2a34-52201043%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b3ebfd6d2c700a6b00636492716a55e4cec68093' => 
    array (
      0 => 'include\\topo.php',
      1 => 1346116593,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '215505740651abf2a34-52201043',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'URL_DEFAULT' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_5740651ac0940',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5740651ac0940')) {function content_5740651ac0940($_smarty_tpl) {?><div id="topo">
	<div id="topo_logo">
		<a href="index.php" title="Página inicial">
			<h1>
				<strong>Newpoint escolas Profissionalizantes</strong>
			</h1>
		</a>
	</div>
	<div id="topo_menu">
		<ul>
			<li><a href="aescola.php" title="Link para texto sobre a instituição">A ESCOLA</a></li>
			<li><a href="cursos.php" title="Link para os cursos">CURSOS</a></li>
			<li><a href="unidades.php" title="Link para saber qual a unidade é mais perto de você">UNIDADES</a></li>
			<li><a href="sac.php" title="Link para o SAC, Sistema de Atendimento ao Cliente" class="vermelho">SAC</a></li>
		</ul>
	</div>
	<div id="topo_pesquisa">
		<form>
			<input type="text" name="pesquisa" id="pesquisa" class="pesquisa"/>
			<input type="image" src="<?php echo $_smarty_tpl->tpl_vars['URL_DEFAULT']->value;?>
web_files/img/btn_pesquisar.png" value="Enviar" id="enviar" class="enviar" alt="Botão para enviar a pesquisa no site." />
		</form>
	</div>
	<div id="topo_social">
		<div id="topo_social_links">
			<a href="http://twitter.com/escolasnewpoint" target="_blank" id="linkTwitter" title="Link externo para o Twitter"></a>
			<a href="http://www.facebook.com/escolanewpoint" target="_blank" id="linkFacebook" title="Link externo para o Facebook"></a>
			<a href="http://www.orkut.com.br/Main#Profile?uid=17071241321707761386" target="_blank" id="linkOrkut" title="Link externo para o Orkut"></a>
			<a href="http://www.youtube.com/user/EscolasNewPoint" target="_blank" id="linkYoutube" title="Link externo para o Youtube"></a>
		</div>
	</div>
	<div class="clear"></div>
</div><?php }} ?>