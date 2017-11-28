<?php
/**
 * @author Arilson Gonçalves da Rosa
 * Classe de representação do Front Controller(Esta classe é responsável por fornecer o suporte aos controllers para executar suas operações
 * 											   bem como manter um único local para Armazenar as informações default do sistema)
 */
Abstract class ControllerBase {

	//Atributos da Classe
	private $controller = null;
	private $view = null;
	private $action = null;
	private $_params = null;

	/**
	 * Construtor da Classe
	 */
	public function ControllerBase($controller,$action,$params){
			
		//********* Inicializa os atributos da classe ***********
		$this->controller = $controller;
		$this->action = $action;
		$this->_params = $params;
		//*******************************************************

 	     //Inicializa o Controller
  	     $this->init();		
		//********************************************************************
	}
	
	/**
	 * Inicializa os parâmetros do Controller
	 */
	private function init(){
			
			//******* Setando os parâmetros default do framework *********	
			
			//Define as constantes do Framework
			$this->setFrameworkConstants();
			
			//Define as constantes do Template Engine
			$this->setTemplateConstants();		
			
			//Define as constantes do Cabeçalho
			$this->defineHeaderConstants();
			
			//Define as constantes do Rodapé
			$this->defineFooterConstants();		
			//*******************************************
	}

	/**
	 * Retorna o Controller( Nome do Controller )
	 */
	protected function Controller(){
		return $this->controller;
	}

	/**
	 * Retorna a Instancia da View
	 */
	protected function View(){
		return $this->view;
	}

	/**
	 * Retorna a Action
	 */
	protected function Action(){
		return $this->action;
	}

	/**
	 * Delega uma função para um determinado Model e retorna o resultado da tarefa
	 * @param String $DelegateClass - Classe que cuidará da tarefa
	 * @param String $action - Método que esta Classe deverá executar
	 * @param Array/stdClass $parameters - Parâmetros que esta Classe deverá Receber
	 * @return Ambiguous - Tipo de Retorno Depende da Classe
	 */
	protected function Delegator($DelegateClass,$action,$parameters=null){

		//Verifica se os parâmetros são um Array ou Objeto
		if( (!is_array($parameters) && !is_object($parameters)) && !is_null($parameters) ) die("Delegator -> Parâmetro inválido");

		//Requisita o Arquivo do Model Delegator
		include_once("system/delegators/ModelDelegator.php");
		//Delegamos a tarefa para a classe responsabilizada
		$resultado_tarefa = ModelDelegator::delegate($DelegateClass,array($this->controller,$action,$parameters));
			
		//Retornamos o resultado da tarefa
		return $resultado_tarefa;
	}

	/**
	 * Retorna um parâmetro da URL(VIA GET)
	 * @param String $name
	 * @return boolean|multitype:
	 */
	protected function getParam($name = null){
		if($name != null){
			if(array_key_exists($name,$this->_params)){
				return $this->_params[$name];
			}else{
				return false;
			}
		}else{
			return $this->_params;
		}
	}

	/**
	 * Modifica ou cria uma chave no Array da Requisição POST atual
	 * @param String $key
	 * @param String $value
	 */
	protected function setPost($key,$value){
		$_POST[$key] = $value;
	}

	/**
	 * Retorna o valor de uma determinada chave do Array POST, se nenhuma chave for informada então todo Array POST será Retornado
	 * @param String $name
	 * @return Ambiguous
	 */
	protected function getPost($name=null){
		if($name != null){
			if(array_key_exists($name,$_POST)){
				return $_POST[$name];
			}else{
				return false;
			}
		}else{
			return $_POST;
		}
	}

	/**
	 * Recebe um parâmetro de GET ou POST
	 * @param String $name -> nome do parâmetro a ser recebido
	 * @return
	 */
	protected function getRequestParam($name=null){
		//Verifica se existe em GET
		if($this->getParam($name) != FALSE){
			//Retorna via GET
			return $this->getParam($name);
		}
		//Verifica se existe em POST
		else if($this->getPost($name) != FALSE){
			//Retorna via POST
			return $this->getPost($name);
		}
		//Retorn falso pois o parâmetro não foi encontrado em GET/POST
		else{
			return false;
		}
	}
		
	/**
	 * Configura as constantes do Rodapé 
	 */
	private function defineFooterConstants(){
		
		
	}
	
	/**
	 * Configura as constantes do cabecalho 
	*/ 
	private function defineHeaderConstants(){
		
		
	}		
	
	/**
	 * Configura os parâmetros do framework(Constantes)
	 */
	private function setFrameworkConstants(){
	
		//****************** Constantes para o FRAMEWORK  *************************************************			
		//Define uma constante informando o Controller acessado atualmente no framework
		define('CONTROLLER_ATUAL', $this->controller);
		//Define uma constante informando a Action acessado atualmente no framework
		define('ACTION_ATUAL', $this->action);			
		//*******************************************************************************************
	}

	/**
	 * Configura os parâmetros do Template Engine(Constantes)
	 */
	private function setTemplateConstants()
	{				
		
		//******* Setando o Template Engine *********
			$this->view = new Smarty($this->controller);
			//Setando o delimitador esquerdo
			$this->view->left_delimiter = '{view}';
			//Setando o delimitador direito
			$this->view->right_delimiter = '{/view}';
			//desativa a checagem de compilação
			$this->view->compile_check = false; 
			//Modo Debug desligado
			$this->view->debugging = false;
			//Ativando Caching
			$this->view->caching = false;
			//Força a compilação(desativando cache)
			$this->view->force_compile = true;
			//Tempo de vida do Cache
			$this->view->cache_lifetime = 0;		
		//*******************************************
		
		//*************************** Constantes do Smarty ******************************************
		//CONTROLLER_ATUAL
		$this->view->assign("CONTROLLER_ATUAL",$this->controller);
		//ACTION_ATUAL
		$this->view->assign("ACTION_ATUAL",$this->action);
		//URL DEFAULT
		$this->view->assign("URL_DEFAULT",DEFAULT_URL);
		//Caminho das Imagens
		$this->view->assign("IMG",DEFAULT_URL."web_files/img/");
		//Caminho dos Arquivos CSS
		$this->view->assign("CSS",DEFAULT_URL.'web_files/css/');
		//Caminho dos Arquivos JS
		$this->view->assign("JS",DEFAULT_URL.'web_files/js/');				
		//Caminho dos Arquivos JS DOS CONTROLLERS
		$this->view->assign("JS_CONTROLLER",DEFAULT_URL.'web_files/js/controllers/');
		//Caminho do Cabeçalho
		$this->view->assign("HEAD",VIEWS.'templates/Header/index.php');
		//Caminho do Rodape
		$this->view->assign("FOOTER",VIEWS.'templates/Footer/index.php');		
		//*******************************************************************************************
	}
}
?>