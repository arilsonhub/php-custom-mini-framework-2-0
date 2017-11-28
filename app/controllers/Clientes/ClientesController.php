<?php
   /**
    * Controller Index
	* @author Linea Comunicação com Design - http://www.lineacom.com.br
    *
    */
   class ClientesController extends ControllerBase{
   	
        /* Método Construtor do Controller(Obrigatório Conter em Todos os Controllers)
		 * Params String Action -> Ação a ser Executada Pelo Controller	 	
		 * Atenção Demais Métodos do Controller Devem ser Privados 
		*/
		public function ClientesController($controller,$action,$urlparams){
			 //Inicializa os parâmetros da SuperClasse
			 parent::ControllerBase($controller, $action,$urlparams);			 
			 //Envia o Controller para a action solicitada
			 $this->$action();           
		}
		
		public function index_action(){
			
			$clienteList = $this->Delegator("ConcreteClientes","getClientes");			
			$this->View()->assign('clienteList',$clienteList);
			$this->View()->display('index.php');
		}
		
		public function cadastro(){
			
			if($this->getParam('id') != null && is_numeric($this->getParam('id'))){
				$cliente = $this->Delegator("ConcreteClientes","getCliente",$this->getParam());
				$this->View()->assign('cliente',$cliente);
			}
			
			$this->View()->display('cadastro.php');
		}
		
		public function cadastrar(){
			
			if($_SERVER['REQUEST_METHOD'] == "POST"){
				$retorno = $this->Delegator("ConcreteClientes","cadastrar",$this->getPost());
				if($retorno == true){
					$this->View()->assign('message','Cliente cadastrado com sucesso!!!');
					$this->View()->display('sucesso.php');
				}else{
					echo "Erro no cadastro";
					exit();
				}
			}
		}
		
		public function remover(){
			
			if($this->getParam('id') != null && is_numeric($this->getParam('id'))){
				$removido = $this->Delegator("ConcreteClientes","remove",$this->getParam());
				if($removido == true) 
					$this->View()->assign('message','Cliente removido com sucesso!!!');
				else
					$this->View()->assign('message','Erro ao remover cliente');	
				
				$this->View()->display('sucesso.php');
			}
		}
}
?>