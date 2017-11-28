<?php
   class ControllerInit {
   	   	
   	  /**
   	   * Construtor da Classe   	   
   	   * @param String $controller
   	   * @param String $action
   	   */
   	  public function ControllerInit($controller,$action,Array $urlparams){   	  	   
   	  	   //Fabricamos e Inicializamos o Controller Solicitado pelo Cliente
   	  	   $controller = $this->FabricaController($controller,$action,$urlparams);
   	  }

   	  /**
   	   * Instancia o Controller Especificado
   	   * @param String $controller
   	   * @return Object
   	   */
   	  private function FabricaController($controller,$action,$urlparams){

   	  	   //Recebe o controller
   	  	   $controller = ControllerFactory::getInstance($controller,array($action,$urlparams),null);
   	       //Retorna a instancia do Controller
   	       return $controller;
   	  }
   }