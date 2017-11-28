{view}include file={view}$HEAD{/view}{/view}

<h1>Cadastro de clientes</h1>
<a href="{view}$URL_DEFAULT{/view}clientes">Listar clientes cadastrados</a>
<br/><br/>

<form action="{view}$URL_DEFAULT{/view}clientes/cadastrar" method="post">
	{view}if isset($cliente){/view}
		<input type="hidden" name="id" value="{view}$cliente.id{/view}" />
   {view}/if{/view}
   Nome:<input type="text" name="nome" maxlength="255" value="{view}if isset($cliente){/view}{view}$cliente.nome{/view}{view}/if{/view}" /><br /><br />
   Idade:<input type="text" name="idade" maxlength="3" value="{view}if isset($cliente){/view}{view}$cliente.idade{/view}{view}/if{/view}" /><br /><br/>
   <input type="submit" value="Enviar" />
</form>
	
{view}include file={view}$FOOTER{/view}{/view}