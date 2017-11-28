<?php
/**
 * Model do Controller Clientes
 * O objetivo desta classe � conectar O Controller com o seu Modelo de Abstra��o
 * Que por sua vez conectar� o Controller com a base de dados (Vide Classe Database)
 * @author Linea Comunica��o com Design - http://www.lineacom.com.br
 *
 */
class ConcreteClientes
{	
	public function cadastrar($data){
		if(isset($data['id'])){
			return TableFactory::getInstance("Cliente")->update($data);
		}else{
			return TableFactory::getInstance("Cliente")->insert($data);
		}
	}
	
	public function getCliente($data){
		return TableFactory::getInstance("Cliente")->getCliente($data['id']);
	}
	
	public function remove($data){
		return TableFactory::getInstance("Cliente")->remove($data['id']);
	}
	
	public function getClientes(){
		return TableFactory::getInstance("Cliente")->getAll();
	}
}
?>