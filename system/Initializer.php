<?php
/**
 * Classe Inicializadora do Sistema
 * @author Arilson Gonçalves da Rosa
 *
 */
class Initializer {
	
	private $_controller = null; //Representa o Controller solicitado pelo cliente 
	private $_action = null;     //Representa a Action solicitada pelo cliente
	private $_params = null;     //São os parâmetros recebidos via GET pelo HTACCESS	
	
	   /**
	    * Construtor da Classe
	    */
	   public function Initializer(){
	   	  //Inicia o sistema
	   	  $this->run(); 
	   }       
	
        /**
   	    * Executa o Sistema
   	    */
   	   private function run(){

   	   	   //1° Passo - Criamos o htaccess e recebemos o resultado em uma variável(Array)
   	   	   $retorno_htaccess = Htaccess::Create();
   	   	   //2° Passo - Passamos os dados do htaccess para esta classe
   	   	   $this->_controller = $retorno_htaccess['controller'];
   	   	   $this->_action     = $retorno_htaccess['action'];
   	   	   $this->_params     = $retorno_htaccess['params'];        	       
   	       
	   	   //Ultimo Passo - Inicializa o Controller passando o Nome do mesmo, a Action e os parâmetros GET
		   $app = new ControllerInit($this->_controller,$this->_action,$this->_params);
   	   }
}
?>