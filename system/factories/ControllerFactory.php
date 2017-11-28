<?php
Abstract class ControllerFactory implements factory {

	/**
	 * Retorna a instancia do controller solicitado
	 * @param String $path
	 * @param String $ClassName
	 * @param Array $parametros posicao 0 -> Action 1 -> Par�metros da URL
	 */
	public static function getInstance ($ClassName=null,$parametros=null,$path=null){

		//1� Passo - Tratamos o nome do Controller e da Action
		 
		//Coloca o nome do controller em caixa baixa e remove o hifen da URL Amig�vel
		$ClassName = strtolower(str_replace("-","",$ClassName));

		//Pasta do Controller
		$Controller_folder = ucfirst($ClassName);

		//Nome do Controller
		$ControllerName = ucfirst($ClassName);

		//Coloca a primeira letra em maiusculo - Adiciona o sufixo Controller
		$ClassName = ucfirst($ClassName)."Controller";

		//Tirando a Action -> Removendo o hifen(-) proveniente da URL Amig�vel
		$parametros[0] = str_replace("-","",$parametros[0]);
		 
		//2� Passo - Caminho do Controller
		$controller_path = CONTROLLERS . $Controller_folder ."/".$ClassName.'.php';

		//3� Passo - Verifica se o arquivo do Controller Existe
		if(!file_exists($controller_path)){
			
			//Envia um erro 404 para o usu�rio
			HelperFactory::getInstance()->send404Error();
		}

		//4� Passo - Requisita o arquivo do Controller
		include_once($controller_path);

		//5� Passo - Verifica se a classe do Controller Existe
		if(!class_exists($ClassName)){
			
			//Envia um erro 404 para o usu�rio
			HelperFactory::getInstance()->send404Error();
		}
		 
		//6� Passo - Verifica se a A��o Existe
		if(!method_exists($ClassName,$parametros[0])){
		
			//Envia um erro 404 para o usu�rio
			HelperFactory::getInstance()->send404Error();
		}

		//7� Passo - Retorna a instancia da classe
		return new $ClassName($ControllerName,$parametros[0],$parametros[1]);
	}
}
?>