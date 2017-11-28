<?php
    /**
	 * Atribui valores para os campos desta tabela
	 * @param Object $Objetotabela
	 * @param Array $values
	 * @param Boolean $update
	 */
	function getTableValues($Objetotabela,$values,$update=false){
		
	    //Inserindo		
		if(!$update){
		
			    //Busca os campos da tabela
			    $tabela = $Objetotabela->getTable()->getColumnNames();	   
			    
		        foreach($tabela as $campo){
		        
				    //Verifica se o campo existe no Array
				    if(isset($values[$campo])){
				
				        //Recebe o valor e tira os espaços em branco das arestas
				        $valor = trim($values[$campo]);
					 
						//Só Salva se tiver conteudo 
						if(strlen($valor) > 0){
							
							//Pega os dados do Array e joga nos atributos da tabela
							$Objetotabela->$campo = $valor;
						}    
                    }    	        	
		        }	 
		}
		    //Atualizando
			else{
				
					//Percorre os atributos da tabela
					foreach($Objetotabela as $chave => $valor){
						
                        //Verifica se o campo existe no Array
				        if(isset($values[$chave])){
						
						    //Recebe o valor e tira os espaços em branco das arestas
						    $valor = trim($values[$chave]);
						
							//Só Salva se tiver conteudo 
							if(strlen($valor) > 0){
							
								//Pega os dados do Array e joga nos atributos da tabela
								$Objetotabela->$chave = $valor;
			
							}
						}
					}
			}  
			
		//Retorna o objeto com os dados
		return $Objetotabela;	 
	}
	
	/**
	 * Cria e retorna um novo Objeto do tipo Standard Class
	 * @return stdClass
	 */
	function CreateObject(){
			
		return new stdClass();
	}
	
	/**
	 * Retorna um componente da Entidade Acessada no momento
	 * @param String $pathToClass
	 * @param String $Classname
	 * @param Multitype $params
	 */
	function getComponent($pathToClass,$Classname=null,$params=null){
		
		//Caminho da Classe
		$pathToClass = CONTROLLERS.CONTROLLER_ATUAL."/models/".$pathToClass.".php";
		
		//Verifica se o Arquivo Existe
		if(is_file($pathToClass)){
			
			    //Inclui o arquivo
			    include_once($pathToClass);
			    
			    //Verifica se o parâmetro Classname é nulo
			    if(!is_null($Classname)){
			    
					    //Verifica se a classe existe
					    if(class_exists($Classname)){			    
						    //Instancia a Classe
						    return new $Classname;
						    			    
					    }else{
					    	
					    	die("A classe solicitada não existe na entidade");
					    }
			    }			
		}else{
			die("O arquivo da classe solicitada não existe na entidade");
		}		
	}
?>