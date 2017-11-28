<?php
     /**
     * Plugin para Trabalhar com Sessѕes
	 * @author Linea Comunicaчуo com Design - http://www.lineacom.com.br
     *
     */
    class sessionHelper{
    
        public function createSession($name,$value){
              $_SESSION[$name] = $value;
              return $this;   
        }
    
        public function selectSession($name){
            return $_SESSION[$name];            
        }
        
        public function removeKey($name){

        	unset($_SESSION[$name]);
        	return $this;
        }
        
        public function PutObjectOnSessionKey($object,$keyName,$SessionName){
        
		        //Coloca na sessуo
				foreach($object as $valor){									
							
				     $_SESSION[$SessionName][$valor[$keyName]] = $valor[$keyName];
				}        	
				return $this;
        }
    
        public function deleteSession(){
            unset($_SESSION);
            session_destroy();
            return $this;
        }
        
        public function checkSession($name){
            return isset($_SESSION[$name]);
        }
    
    }