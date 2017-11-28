<?php
Abstract class ModelDelegator implements Businessdelegator {
	
	/**
	 * Delega Tarefas para um Determinado Model	 
	 * @param String $ClassName
	 * @param Array $parametros - Posicao 0 -> Nome do Controller(Obrigatуrio) 1 -> Aзгo(Obrigatуrio) 2 -> Parвmetros(Opcional)
	 */
	public static function delegate($ClassName=null,$parametros=null){
		  //Valida os parвmetros - evitando erros de indexaзгo pois a posicao 2 nгo й obrigatуria
		  if(!isset($parametros[2])){ $parametros[2] = null; } 
	      //Fabrica o Model
	      $Model = ModelFactory::getInstance($ClassName,$parametros,null);
	      
	      //Verifica se o Model foi Fabricado com Sucesso
	      if($Model != False){	      
		      //Delega a aзгo que o Model deve Executar e Retornar
		      return $Model->$parametros[1]($parametros[2]);
	      }else{
              //Problema ao fabricar o Model, entгo retornamos falso	      	
	      }	  return false;
	}	
}
?>