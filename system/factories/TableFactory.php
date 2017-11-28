<?php
/**
 * Fabrica Instancias de Tabelas do Banco de Dados (Modelos de Abstraчуo)
 * @author Connect System
 *
 */
Abstract class TableFactory implements factory {
	
	/**
	 * Retorna a instancia da Tabela Solicitada	 
	 * @param String $class_name
	 */
	public static function getInstance ($ClassName=null,$parametros=null,$path=null){
				
		   //Caminho do Model
		   $path = MODELS.$ClassName.".php";
		   
		   //Verifica se o arquivo do Model Existe
		   if(is_file($path)){
		   			   
			   //Requisita o Model
			   include_once($path);
			   
		   }else{

		   	   die("O arquivo da Tabela solicitada nуo existe.");
		   }
		   		   
   	   	   //Retorna o Model Instanciado
   	       return new $ClassName();	
	}   
}
?>