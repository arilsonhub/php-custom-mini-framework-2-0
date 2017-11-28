{view}include file={view}$HEAD{/view}{/view}

<h1>Listagem de clientes</h1>
<a href="{view}$URL_DEFAULT{/view}clientes/cadastro">Inserir novo cliente</a>
<br/><br/>

{view}if $clienteList != null{/view}
	<table border="1" style="width:600px; border-collapse: collapse;">
		<tr>
			<td align="center">Nome</td>
			<td align="center">Idade</td>			
			<td colspan="2" align="center">Ações</td>			
		</tr>
		{view}foreach from=$clienteList item=cliente{/view}
			<tr>
				<td align="center">{view}$cliente.nome{/view}</td>
				<td align="center">{view}$cliente.idade{/view}</td>
				<td align="center"><a href="{view}$URL_DEFAULT{/view}clientes/cadastro/id/{view}$cliente.id{/view}">Editar</a></td>
				<td align="center"><a href="{view}$URL_DEFAULT{/view}clientes/remover/id/{view}$cliente.id{/view}">Remover</a></td>
			</tr>
		{view}/foreach{/view}
	</table>
{view}else{/view}
	<div style="color:red; font-size:14px;">Nenhum registro encontrado.</div>
{view}/if{/view}

{view}include file={view}$FOOTER{/view}{/view}