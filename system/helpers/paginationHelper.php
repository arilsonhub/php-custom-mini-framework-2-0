<?php
/**
 * Helper para auxiliar na constru��o de pagina��es
 * @author Linea Comunica��o com Design - http://www.lineacom.com.br
 *
 */
class paginationHelper {
	
	/**
	 * Resultado da Pagina��o em Array
	 * @var Array
	 */
	private $PaginationArrayResult = null;
	
	/**
	 * Total de p�ginas
	 * @var Integer
	 */
	private $total_pages = null;
	
	/**
	 * Instancia da Classe de Pagina��o / Permite acesso externo a classe de Pagina��o
	 * @var Zebra_Pagination
	 */
	private $PaginationInstance = null;
	
			/**
			 * Construtor da Classe
			 * @param $params -> Indices: 0 = registrosPorPagina 1 = Array de dados 2 = Pagina Atual
			 */
			public function paginationHelper(Array $params){		
				
				//Paginando por Array
				$this->paginateFromArray($params[0], $params[1],$params[2]);
			}
			
			/**
			 * Gera a pagina��o
			 * @param $links_url -> URL Padr�o dos links de pagina��o
			 */
			public function render($links_url){
				
				
				
				//Array de links
				$pagination_links = array();
				
				//Renderiza a pagina��o
				for($i = 0; $i < $this->total_pages;$i++){
					
					//Coloca a p�gina do link e a URL padr�o do mesmo
					$pagination_links[] = array('page' => $i+1,'url' => DEFAULT_URL.$links_url.'pagina/'.($i+1));
				}
				
				//Retorna os links da pagina��o
				return $pagination_links;
			}
			
			/**
			 * Cria uma pagina��o baseada em um Array de resultados
			 * @param Integer $records_per_page
			 * @param Integer $TotalOfRecords
			 */
			private function paginateFromArray($records_per_page,$recordset,$page){		
				
					    //Verifica se � um array
						if(!is_array($recordset)){
						
							//Converte para Array
							$this->PaginationArrayResult = $recordset->toArray();											
						}else{
							
							//Recebe o Array com os dados
							$this->PaginationArrayResult = $recordset;
						}
						
						//Instancia a Biblioteca de Pagina��o
						$this->PaginationInstance = LibFactory::getInstance('Zebra_Pagination',null,'Pagination/Pagination.php');
						
						//Trata o valor da p�gina
						$page = ($page !== false ? $page : 1);
						
						//Total de registros
						$total_records = count($this->PaginationArrayResult);
						
						//Total de p�ginas
						$this->total_pages = ceil($total_records / $records_per_page); 
						
						// Numero total de registros
						$this->PaginationInstance->records($total_records);
						
						// Registros por p�gina
						$this->PaginationInstance->records_per_page($records_per_page);
						
						// Busca a parte que corresponde a p�gina atual
						$this->PaginationArrayResult = array_slice(
						    $this->PaginationArrayResult,
						    (($page - 1) * $records_per_page),
						    $records_per_page,true
						);
			}	

			/**
			 * Retorna a pagina��o em Array
			 */
			public function getPagination(){
				
				//Verifica se h� elementos a retornar
				if(count($this->PaginationArrayResult) > 0){
					
					//Retorna o Array Paginado
					return $this->PaginationArrayResult;
					
				}else{

					//Nada a retornar, retorna falso
					return false;
				}				
			}
			
		
	   /**
	    * Verifica os parametros informados e retorna a url padr�o da pagina��o
	    * @param String $url_padrao
	    * @param array $parametros
	    * @param array $ArrayData
	    */
	   public function getURLPaginacao($url_padrao,Array $parametros,$ArrayData){

	   			//URL de par�metros
	   			$url_parameters = "";   			
	   	
	   					//Verifica se ArrayData � um Array
	   					if(is_array($ArrayData)){
	   									   			
						   			//Percorre o array de par�metros
						   			foreach($ArrayData as $chave => $valor){
						   				
						   					//Verifica se a chave existe nos parametros inforamdos E se a mesma possui um valor
						   					if(array_search($chave, $parametros) !== false && strlen(trim($valor)) > 0){
						   							   						
						   						//Adiciona o par�metro na URL
						   						$url_parameters .= $chave."/".$valor."/"; 						 
						   					}	  
						   					
						   					//Verifica se ha valores a procurar nos parametros informados
						   					if(next($parametros) === false){
						   						
						   						//Interrompe o la�o foreach indicando que acabou a busca de par�metros
						   						break;
						   					}
						   			}
			   			
	   					}
	   								   			
	   			//Monta a URL FINAL e retorna
	   			return $url_padrao."/".$url_parameters;
	   }
}
?>