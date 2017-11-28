<?php
/**
 * Classe para gerenciar o Htaccess
 * @author Arilson Gonçalves da Rosa
 *
 */
Abstract class Htaccess {
	
	   //Atributos da Classe   	   
   	   private static $_url;
   	   private static $_explode;
   	   private static $_controller;   	   
   	   private static $_action;
   	   private static $_params;
	
       
       /**
   	    * Inicializa os atributos da Classe
   	    */
   	   public static function Create(){   	   	
   	   		self::setUrl();
   	   		self::setExplode();
   	   		self::setController();
   	   		self::setAction();  
   	   		self::setParams(); 

   	   		//Retorna os dados do htaccess
   	   		return array("controller" => self::$_controller,"action" => self::$_action,"params" => self::$_params);
   	   }
   	   
       
       /**
   	    * Setar a URL
   	    */
   	   private static function setUrl(){
   	      $_GET['url'] = (isset($_GET['url']) ? $_GET['url'] : "index/index_action");
   	      self::$_url = $_GET['url'];   	   	
   	   }
	
       
       /**
   	    * Separa os parâmetros da URL
   	    */
   	   private static function setExplode(){
   	   	  self::$_explode = explode('/',self::$_url);
   	   } 
   	   
       /**
   	    * Seta o controller atual
   	    */
   	   private static function setController(){   	   	
   	   	  self::$_controller = self::$_explode[0];   	   	
   	   }
   	   
       /**
   	    * Seta a Action atual
   	    */
   	   private static function setAction(){
   	   	  $action = (!isset(self::$_explode[1]) || self::$_explode[1] == null || self::$_explode[1] == "index" ? "index_action" : self::$_explode[1]);  
   	   	  self::$_action = $action;
   	   }
   	   
       /**
   	    * Configura os parâmetros da URL
   	    */
   	   private static function setParams(){
   	      unset(self::$_explode[0],self::$_explode[1]);
          
	   	      //Verifica se o ultimo indice do array é nulo
	   	      if(end(self::$_explode) == null){
	          	  array_pop(self::$_explode);
	          } 
   	      
          $i = 0;
          if(!empty(self::$_explode)){
          	
          	foreach(self::$_explode as $val){          	
          	   if($i % 2 == 0){
          	   	  $ind[] = $val; 
          	   }else{
          	      $value[] = $val;
          	   }	
          	   $i++;            		
          	}
	      }   else{          
	              $ind = array();
	              $value = array();
	          }
          
		   	      if(count($ind) == count($value) && !empty($ind) && !empty($value)){   	      
		   	          self::$_params = array_combine($ind,$value);   	      
			   	  }   
			   	      else{
			   	      	 self::$_params = array();
			   	      }
   	   }
}
?>