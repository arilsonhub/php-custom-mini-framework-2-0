<?php
Abstract class ModelDelegator implements Businessdelegator {
	
	/**
	 * Delega Tarefas para um Determinado Model	 
	 * @param String $ClassName
	 * @param Array $parametros - Posicao 0 -> Nome do Controller(Obrigat�rio) 1 -> A��o(Obrigat�rio) 2 -> Par�metros(Opcional)
	 */
	public static function delegate($ClassName=null,$parametros=null){
		  //Valida os par�metros - evitando erros de indexa��o pois a posicao 2 n�o � obrigat�ria
		  if(!isset($parametros[2])){ $parametros[2] = null; } 
	      //Fabrica o Model
	      $Model = ModelFactory::getInstance($ClassName,$parametros,null);
	      
	      //Verifica se o Model foi Fabricado com Sucesso
	      if($Model != False){	      
		      //Delega a a��o que o Model deve Executar e Retornar
		      return $Model->$parametros[1]($parametros[2]);
	      }else{
              //Problema ao fabricar o Model, ent�o retornamos falso	      	
	      }	  return false;
	}	
}
?>