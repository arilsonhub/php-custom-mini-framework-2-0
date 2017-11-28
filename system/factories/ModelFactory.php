<?php
Abstract class ModelFactory implements factory {
	
	/**
	 * Retorna a instancia do Model Solicitado	 
	 * @param String $class_name
	 */
	public static function getInstance ($ClassName=null,$parametros=null,$path=null){
           
		   //*********** Realizamos as verifica��es necess�rias ******************
		   
		   //Verificamos se o Controller foi informado
		   if(is_null($parametros[0])){ return false; }
		   
	       //Verificamos se a a��o a ser executada no model foi informada
		   if(is_null($parametros[1])){ return false; }
		   
	       //Verificamos se parametros foi setado e se � um Array/Objeto
		   if(!is_null($parametros[2]) && ( !is_array($parametros[2]) && !is_object($parametros[2]) ) ){ return false; }
		   		   
		   //Coloca a primeira letra maiuscula
   	   	   $ClassName = ucfirst($ClassName);
		
		   //Caminho do Model
		   $path = CONTROLLERS.$parametros[0]."/models/".$ClassName.".model.php";
		   
		   //Verifica se o arquivo do Model Existe
		   if(is_file($path)){
		   			   
			   //Requisita o Model
			   include_once($path);
			   
		   }else{

		   	   die("O arquivo da classe Modelo solicitada n�o existe.");
		   }

		   //Verifica se a a��o solicitada existe no Model
		   if(!method_exists($ClassName,$parametros[1])){
		   	  die("A a��o solicitada n�o existe.");
		   }
		   
   	   	   //Retorna o Model Instanciado
   	       return new $ClassName();	
	}   
}
?>