<?php
/**
 * Plugin para Trabalhar com Autentica��o de Usu�rio
 * @author Linea Comunica��o com Design - http://www.lineacom.com.br
 *
 */
class authHelper
{
	private $sessionHelper,$redirectorHelper,$tableName,
	$user,$pass,$loginController = 'index',$loginAction = 'index',
	$logoutController = 'index', $logoutAction = 'index',
	$defaultUsersession = 'User',$defaultUserIdsession = 'UserId',
	$defaultUserFlag = 'UserSession',$defaultPerfilSession = 'UserPerfil';	

	public function __construct()
	{
		$this->sessionHelper = HelperFactory::getInstance('session');
		$this->redirectorHelper = HelperFactory::getInstance('redirector');		
		return $this;
	}

	public function setTableName($table)
	{
		$this->tableName = $table;
		return $this;
	}
		
	public function setUser($user)
	{
		$this->user = $user;
		return $this;
	}

	public function setPass($pass)
	{
		$this->pass = $pass;
		return $this;
	}

	public function setLoginControllerAction ($controller,$action)
	{
		$this->loginController = $controller;
		$this->loginAction = $action;
		return $this;
	}

	public function setLogoutControllerAction ($controller,$action)
	{
		$this->logoutController = $controller;
		$this->logoutAction = $action;
		return $this;
	}
	
	/**
	 * Valida os campos do login
	 * @param $usuario: string
	 * @param $senha: string
	 */
	public function validacao()
	{
		$Validation = LibFactory::getInstance('Validation',null,'validation/Validation.class.php');
		
		$Validation	->set($this->user, "Informe o login",'txt_login','msg_erro_login')->obrigatorio()
					->set($this->pass, "Informe a senha",'txt_senha','msg_erro_senha')->obrigatorio();
	  
		//Retorna o array de erros
		return $Validation->getErrors();
	}

	/**
	 * Efetua o login do usu�rio
	 * @return boolean|multitype:string 
	 */
	public function login()
	{
		//Valida o login/senha
		$resultado_validacao = $this->validacao();
		
		//Verifica o resultado da valida��o
		if(count($resultado_validacao) == 0){

			//Recebe o resultado da valida��o do login
			$dados_usuario = TableFactory::getInstance($this->tableName)->validarUsuario($this->user,$this->pass);
									
			//Verifica o resultado da valida��o do login
			if($dados_usuario !== false){	 
				
				 //Cria a sess�o do usu�rio
				 $this->sessionHelper->createSession($this->defaultUsersession,$dados_usuario['txt_nome']);
				 $this->sessionHelper->createSession($this->defaultUserIdsession,$dados_usuario['id']);
				 $this->sessionHelper->createSession($this->defaultPerfilSession,$dados_usuario['idperfil']);
				 $this->sessionHelper->createSession($this->defaultUserFlag,true);				 
				 				 
				 //Redireciona o usu�rio				 
				 $this->redirectorHelper->goToControllerAction($this->loginController,$this->loginAction);
				
				 //Encerra o script
				 exit();
				 				
			}else{
				
				 return false;
			}			
			
		}else{
		
			//Retorna os erros da valida��o
			return $resultado_validacao;
		}		
	}

	/**
	 * Elimina a sess�o do usu�rio
	 */
	public function logout($redirect=false)
	{	
		//Verifica se a sess�o existe
		if($this->sessionHelper->checkSession('UserSession')){
			
			//Destr�i a sess�o
			$this->sessionHelper->deleteSession();
			
			//Verifica se o redirecionamento � necess�rio
			if($redirect)
				$this->redirectorHelper->goToControllerAction($this->logoutController,$this->logoutAction);
		}
	}
}