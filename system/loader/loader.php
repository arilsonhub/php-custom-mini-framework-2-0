<?php
/**
 * Classe de Carregamento Din�mico
 * Respons�vel por Carregar as classes que ainda n�o foram incluidas no contexto da aplica��o
 * @author Arilson G.Rosa
 *
 */
class ClassAutoloader {
        public function __construct() {
            spl_autoload_register(array($this, 'FactoryLoader'));
            spl_autoload_register(array($this, 'ModelLoader'));
            spl_autoload_register(array($this, 'SystemLoader'));
            spl_autoload_register(array($this, 'DelegatorLoader'));
            spl_autoload_register(array($this, 'SmartyLoader'));
        }
        
        private function LoadClass($filename){
        	
        	//Adiciona a extens�o .php
        	$filename = $filename.".php";
        	
        	if(is_file($filename)){
        		include($filename);
        	}        	
        }
        
        //Factory
        private function FactoryLoader($className) {            
            
        	
        	$this->LoadClass(FACTORIES.$className);
        	
        }
        
        //Doctrine Model
		private function ModelLoader($className) {            
            
			$this->LoadClass(MODELS.$className);
        }
        
        //System
        private function SystemLoader($className){
        	$className = ucfirst($className);
        	$this->LoadClass(SYSTEM.$className);
        }
        
		//Delegators
        private function DelegatorLoader($className){
        	
        	$this->LoadClass(SYSTEM."delegators/".$className);
        }
        
		//SmartyLoader
        private function SmartyLoader($className){
        	
        	$this->LoadClass(VIEWS."libs/".$className.".class");
        }
    }    
?>