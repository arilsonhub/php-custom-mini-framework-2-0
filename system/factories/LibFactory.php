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
                  	      	
                  	  die("Biblioteca não existe");
                  }  
             	
                  //Se o usuario passou o nome da classe então é retornado uma instancia da mesma
                  //Normalmente ocorre quando vamos usar uma instancia da classe
                  if(!is_null($ClassName)){
                          
                          //Retorna a instancia da classe
                          if(!is_null($parametros)){
                                  return new $ClassName($parametros);
                          }else{
                                  return new $ClassName();
                          }
                           
                  }else{
                          //Caso Contrário Apenas Requisita o Arquivo da Classe - Isso ocorre normalmente para classes onde vamos usar métodos staticos
                          //Neste caso normalmente não precisamos instanciar a classe, bastando apenas incluir o arquivo da mesma                          
                      return include_once(LIB.$path);
                  }
             }
}
?>