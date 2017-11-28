<?php
/**
 * Model do Controller Clientes
 * O objetivo desta classe щ conectar O Controller com o seu Modelo de Abstraчуo
 * Que por sua vez conectarс o Controller com a base de dados (Vide Classe Database)
 * @author Linea Comunicaчуo com Design - http://www.lineacom.com.br
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