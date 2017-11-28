<?php
     /**
     * Plugin para Trabalhar com Redirecionamento de P�gina
	 * @author Linea Comunica��o com Design - http://www.lineacom.com.br
     *
     */
   class redirectorHelper {
   	
   	   private $parameters = array();
   	
   	protected function go($data){       
   		
   		header("Location: ".DEFAULT_URL.$data); 
   	}
   	
   	public function setUrlParameter($name,$value){
   	      $this->parameters[$name] = $value;
   	      return $this;
   	}
   	
   	protected function getUrlParameters(){

   	   //Verifica o tamanho do Array de par�metros e se o atributo realmente � um Array(por seguran�a)	
       if(count($this->parameters) > 0 && is_array($this->parameters)){
   		  //Parametros adicionados
   		  $params = "";
   		  //Percorremos os par�metros   		
	   	      foreach($this->parameters as $name => $value){
	   	      	  $params .= $name.'/'.$value.'/';   	      	
	   	      }
	   	  return $params;
       }    
   	}
   
    public function goToController($controller){
        $this->go($controller. '/index/'.$this->getUrlParameters());           	
    }
      
   	public function goToAction($action){
          $this->go($this->getCurrentController() . '/' . $action .'/'.$this->getUrlParameters());
    }
      
   	public function goToControllerAction($controller,$action){   		
        $this->go($controller . '/' . $action .'/'.$this->getUrlParameters());  
    }
      
  	 public function goToIndex(){
          $this->go('index');
      }
   
     public function goToUrl($url){
           header("Location: ".$url);
     }
   } 