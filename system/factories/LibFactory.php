<?php
Abstract class LibFactory implements factory {
	
             /**
              * Requisita o arquivo de determinada biblioteca
              * @param String $path
              * @param String $ClassName
              * @param Array $parametros
              */
             public static function getInstance ($ClassName=null,$parametros=null,$path=null){
			       
             	   //Verifica se a biblioteca existe
                   if(is_file(LIB.$path)){
                  	
	                  //Requisita o arquivo da classe
	                  include_once(LIB.$path);
	                          
                  }else{
                  	      	
                  	  die("Biblioteca n�o existe");
                  }  
             	
                  //Se o usuario passou o nome da classe ent�o � retornado uma instancia da mesma
                  //Normalmente ocorre quando vamos usar uma instancia da classe
                  if(!is_null($ClassName)){
                          
                          //Retorna a instancia da classe
                          if(!is_null($parametros)){
                                  return new $ClassName($parametros);
                          }else{
                                  return new $ClassName();
                          }
                           
                  }else{
                          //Caso Contr�rio Apenas Requisita o Arquivo da Classe - Isso ocorre normalmente para classes onde vamos usar m�todos staticos
                          //Neste caso normalmente n�o precisamos instanciar a classe, bastando apenas incluir o arquivo da mesma                          
                      return include_once(LIB.$path);
                  }
             }
}
?>