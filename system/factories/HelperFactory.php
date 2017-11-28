<?php
Abstract class HelperFactory implements factory {
	
	         /**
              * Retorna uma instancia de um helper especificado, se nenhum for informado então retorna o Helper Principal
              * @param String $helper
              * @param Array $parametros
              * @return Ambiguous
              */
             public static function getInstance ($ClassName=null,$parametros=null,$path=null){
             	
                        //Valida o Helper
                        $helper = ($ClassName != null ? $ClassName.'Helper' : 'Helper');
                        
                        //Caminho do Helper
                        $CaminhoHelper = HELPERS.$helper.".php";
                        
                        //Verifica se o arquivo do Helper Existe
                        if(is_file($CaminhoHelper)){
                        	
                        	include_once($CaminhoHelper);
                        }else{
                        	
                        	die("O helper solicitado não foi encontrado!");
                        }
                        
                        //Retorna o Helper instanciado  
                        if(!is_null($parametros)){
                                   return new $helper($parametros);
                        }else{
                                   return new $helper();
                        }
             }
}
?>