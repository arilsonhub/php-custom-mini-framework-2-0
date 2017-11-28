<?php
/**
 * Classe para fornecer informa��es para a p�gina html(VIEW)
 * @author Arilson Gon�alves da Rosa
 *
 */
class Pageinfo {
	
       /**
   	    * Pega as informa��es do banco referentes ao sistema
   	    * @return multitype:
   	    */
   	   public  function getWebSiteInfo(){
   	   	  
   	   	  //Instancia a WebsiteInfo
   	   	  $tabela_website = TableFactory::getInstance('WebsiteInfo');
   	   	  //Recebe as informa��es do Sistema
   	   	  $recordset = $tabela_website->getWebSiteInfo();
   	   	  
   	   	  //Retorna o resultado
   	   	  return $recordset;   	   	  
   	   }
   	   
       /**
        * Enter description here ...
        * @return unknown
        */
       public  function getPageInfo(){
       	   	   	
   	        //Busca na URL o peda�o da String que corresponde ao Controller e a Action
   	        $request = substr($_SERVER['REQUEST_URI'],URL_OFFSET);
   	          	        
   	        //Divide a String resgatada da URL
   	        $array_string = explode("/", $request, 2);
   	        
   	        //Verifica se a action existe e se a mesma possui um valor
   	        if(isset($array_string[1]) && strlen($array_string[1]) > 0){
   	        	   	        
		   	        //Pega a posicao final da Action
		   	        $posicao_final_action = (substr_count($array_string[1], "/") >= 1 ? strpos($array_string[1], "/") : strlen($array_string[1]));
   	        }else{
   	        	
   	        	//Se cair aqui ent�o a action n�o foi informada, logo posicao da action � Zero
   	        	$posicao_final_action = 0;
   	        }
   	        
   	        //Valor da Action
   	        $Action = ($posicao_final_action != 0 ? "/".substr($array_string[1], 0, $posicao_final_action) : "");
   	           	        
   	        //Valor do Controller
   	        $Controller = (strlen(trim($array_string[0])) > 0 ? $array_string[0] : "index");
   	        
   	        //Pega a posicao da String   	          
	   	    $request = $Controller.$Action;	   	    	   	    
	   	       	        
   	        //Instancia a Tabela WebsitePages
   	        $tabela_website = TableFactory::getInstance('WebsitePages');
   	        
   	        //Busca as informa��es da p�gina
   	        $recordset = $tabela_website->getPageInfo($request);
   	           	           	        
	   	        //Verifica se houve resultado
	   	        if(count($recordset) == 0){
	   	        	
		   	        	//Se cair aqui ent�o mandamos as informa��es DEFAULT
		   	        	$recordset = $this->getWebSiteInfo();
		   	        	
		   	        	//Atribui as informa��es
		   	        	$array_default = array();	   	        	
		   	        	$array_default['txt_title'] = $recordset['txt_default_title'];
		   	        	$array_default['txt_keywords'] = $recordset['txt_default_key'];
		   	        	$array_default['txt_description'] = $recordset['txt_default_desc'];
		   	        	
		   	        	//Retornamos as informa��es DEFAULT do sistema
		   	        	return $array_default;
	   	        }else{
		   	            //Retornamos as informa��es da p�gina
	   	                return $recordset[0];    	
	   	        }        
   	   }
}
?>