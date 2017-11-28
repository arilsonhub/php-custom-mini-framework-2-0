<?php
/** Author Arilson Gonçalves da Rosa
 * Classe Para validação de Dados
 * @version 1.0
 */
class Validation {

    /**
     * Atributo que receberá os valores dos dados da validação
     * e o nome do campo
     * @var ARRAY $dados
     */
    private $dados;
    /**
     * Atributo que receberá as mensagens de erro
     * @var ARRAY $erro
     */
    private $erro = array();
    
    /**
     * Caso deseje que as mensagens sejam codificadas para utf-8 então este atributo deverá ser true
     * @var Boolean
     */
    public $encode = false;

    /**
     * Método que recebe os valores de validação e nome do campo
     * @param STRING $valor - Valor Digitado pelo Usuário
     * @param STRING $mensagem  - Mensagem (Mensagem de erro que aparecerá para o usuário)
     * @param STRING $field_name - Atributo Name do campo no input HTML
     * @param STRING $html_id_element - Id do element html que deverá receber a mensagem de erro (usado para JSON)  
     * caso seja preciso exibir a mensagem de erro em um elemento HTML neste parâmetro($html_id_element) pode ser passado o id do elemento
     * @return $this (retorna o próprio objeto)
     */
    public function set($valor, $mensagem,$field_name,$html_id_element=null) {
        $this->dados = array("valor" => trim($valor), "mensagem" => $mensagem, "field_name" => $field_name ,"html_id_element" => $html_id_element);
        return $this;
    }

    /**
     *  Método que verifica se é o valor é obrigatório
     *  @return $this (retorna o próprio objeto)
     */
    public function obrigatorio() {
        if (empty($this->dados['valor'])) {
        	
        	$mensagem = ($this->encode == true ? utf8_encode($this->dados['mensagem']) : $this->dados['mensagem']);
            
        	$this->erro[$this->dados['field_name']]['mensagem'] = $mensagem;
            
        	//Verifica se o elemento html foi informado
            if(!is_null($this->dados['html_id_element'])) $this->erro[$this->dados['field_name']]['id_element'] = $this->dados['html_id_element'];            
        }
        return $this;
    }
    
     /**
     *  Método que verifica se o valor é numérico
     *  @return $this (retorna o próprio objeto)
     */
    public function numerico() {
        if (!is_numeric($this->dados['valor'])) {
        	
        	$mensagem = ($this->encode == true ? utf8_encode($this->dados['mensagem']) : $this->dados['mensagem']);
            
        	$this->erro[$this->dados['field_name']]['mensagem'] = $mensagem;
            
        	//Verifica se o elemento html foi informado
            if(!is_null($this->dados['html_id_element'])) $this->erro[$this->dados['field_name']]['id_element'] = $this->dados['html_id_element'];
        }
        return $this;
    }

     /**
     *  Método que Valida o CPF
     *  @return $this (retorna o próprio objeto)
     */
	public function cpf(){	
		
			//Verifica se existe valor a ser validado
			if(strlen(trim($this->dados['valor'])) > 0){
		
				    //Removendo pontos e hifen
				    $array_search = array(".","-");
				    $array_replace = array("","");
				    $this->dados['valor'] = str_replace($array_search,$array_replace,$this->dados['valor']);
				
					// Verifiva se o número digitado contém todos os digitos
				    $this->dados['valor'] = str_pad(ereg_replace('[^0-9]', '', $this->dados['valor']), 11, '0', STR_PAD_LEFT);
					
					// Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
				    if (strlen($this->dados['valor']) != 11 || $this->dados['valor'] == '00000000000' || $this->dados['valor'] == '11111111111' || $this->dados['valor'] == '22222222222' || $this->dados['valor'] == '33333333333' || $this->dados['valor'] == '44444444444' || $this->dados['valor'] == '55555555555' || $this->dados['valor'] == '66666666666' || $this->dados['valor'] == '77777777777' || $this->dados['valor'] == '88888888888' || $this->dados['valor'] == '99999999999')
					{
						//Mensagem de Erro 
						$mensagem = ($this->encode == true ? utf8_encode($this->dados['mensagem']) : $this->dados['mensagem']);
						
						//Grava no array de erros
		                $this->erro[$this->dados['field_name']]['mensagem'] = $mensagem;            
		        		
		                //Verifica se o elemento html foi informado
		            	if(!is_null($this->dados['html_id_element'])) $this->erro[$this->dados['field_name']]['id_element'] = $this->dados['html_id_element'];
		                
		            	//Retorna o objeto
		                return $this;
				    }
					else
					{   // Calcula os números para verificar se o CPF é verdadeiro
				        for ($t = 9; $t < 11; $t++) {
				            for ($d = 0, $c = 0; $c < $t; $c++) {
				                $d += $this->dados['valor']{$c} * (($t + 1) - $c);
				            }
				
				            $d = ((10 * $d) % 11) % 10;
				
				            if ($this->dados['valor']{$c} != $d) {
				                //Mensagem de Erro 
								$mensagem = ($this->encode == true ? utf8_encode($this->dados['mensagem']) : $this->dados['mensagem']);
								$this->erro[$this->dados['field_name']]['mensagem'] = $mensagem;
		            
		        				//Verifica se o elemento html foi informado
		            			if(!is_null($this->dados['html_id_element'])) $this->erro[$this->dados['field_name']]['id_element'] = $this->dados['html_id_element'];
				                //Retorna o objeto
		                        return $this;
				            }
				        }
				        
				        //Retorna o objeto
				        return $this;
				    }
		}
	}
	
	/**
	 * Método que valida o CNPJ
	 * @return Validation
	 */
	public function cnpj(){
		
		//Recebe o cnpj
		$cnpj = trim($this->dados['valor']);
		
		//Verifica se sua verifica é obrigatória
		if(isset($cnpj[0])){
			
			//Etapa 1: Cria um array com apenas os digitos numéricos, isso permite receber o cnpj em diferentes formatos como "00.000.000/0000-00", "00000000000000", "00 000 000 0000 00" etc...
			$j=0;
			for($i=0; $i<(strlen($cnpj)); $i++)
				{
					if(is_numeric($cnpj[$i]))
						{
							$num[$j]=$cnpj[$i];
							$j++;
						}
				}
			//Etapa 2: Conta os dígitos, um Cnpj válido possui 14 dígitos numéricos.
			if(count($num)!=14)
				{
					$isCnpjValid=false;
				}
			//Etapa 3: O número 00000000000 embora não seja um cnpj real resultaria um cnpj válido após o calculo dos dígitos verificares e por isso precisa ser filtradas nesta etapa.
			if ($num[0]==0 && $num[1]==0 && $num[2]==0 && $num[3]==0 && $num[4]==0 && $num[5]==0 && $num[6]==0 && $num[7]==0 && $num[8]==0 && $num[9]==0 && $num[10]==0 && $num[11]==0)
				{
					$isCnpjValid=false;
				}
			//Etapa 4: Calcula e compara o primeiro dígito verificador.
			else
				{
					$j=5;
					for($i=0; $i<4; $i++)
						{
							$multiplica[$i]=$num[$i]*$j;
							$j--;
						}
					$soma = array_sum($multiplica);
					$j=9;
					for($i=4; $i<12; $i++)
						{
							$multiplica[$i]=$num[$i]*$j;
							$j--;
						}
					$soma = array_sum($multiplica);	
					$resto = $soma%11;			
					if($resto<2)
						{
							$dg=0;
						}
					else
						{
							$dg=11-$resto;
						}
					if($dg!=$num[12])
						{
							$isCnpjValid=false;
						} 
				}
			//Etapa 5: Calcula e compara o segundo dígito verificador.
			if(!isset($isCnpjValid))
				{
					$j=6;
					for($i=0; $i<5; $i++)
						{
							$multiplica[$i]=$num[$i]*$j;
							$j--;
						}
					$soma = array_sum($multiplica);
					$j=9;
					for($i=5; $i<13; $i++)
						{
							$multiplica[$i]=$num[$i]*$j;
							$j--;
						}
					$soma = array_sum($multiplica);	
					$resto = $soma%11;			
					if($resto<2)
						{
							$dg=0;
						}
					else
						{
							$dg=11-$resto;
						}
					if($dg!=$num[13])
						{
							$isCnpjValid=false;
						}
					else
						{
							$isCnpjValid=true;
						}
				}
			
			//Verifica se é válido	
			if($isCnpjValid === false){
				
				    //Recebe a mensagem de erro
				    $mensagem = ($this->encode == true ? utf8_encode($this->dados['mensagem']) : $this->dados['mensagem']);
		            
				    //Atribui ao Array de erros
		        	$this->erro[$this->dados['field_name']]['mensagem'] = $mensagem;
		            
		        	//Verifica se o elemento html foi informado
		            if(!is_null($this->dados['html_id_element'])) $this->erro[$this->dados['field_name']]['id_element'] = $this->dados['html_id_element'];
			}			
		}
		
		//Retorna o objeto
		return $this;
	}

    /**
     * Método que verifica se o email é válido
     * @return $this (retorna o próprio objeto)
     */
    public function email() {
    	
    	//Recebe o email tratado
    	$email = trim($this->dados['valor']);
    	
    	//Verifica se a verificação de email é obrigatória
    	if(isset($email[0])){    	
    		    
    		    //Valida o email
		        if (!filter_var($this->dados['valor'], FILTER_VALIDATE_EMAIL)) {
		        	
		        	$mensagem = ($this->encode == true ? utf8_encode($this->dados['mensagem']) : $this->dados['mensagem']);
		            
		        	$this->erro[$this->dados['field_name']]['mensagem'] = $mensagem;
		            
		        	//Verifica se o elemento html foi informado
		            if(!is_null($this->dados['html_id_element'])) $this->erro[$this->dados['field_name']]['id_element'] = $this->dados['html_id_element'];
		        }        
    	}
    	
    	//Retorna o objeto
        return $this;
    }

    /**
     * Método que verifica se a data esta no formato dd/mm/YYYY
     * @return $this (retorna o próprio objeto)
     */
    public function data() {
    	
    	//Verifica se há valor para validar
    	if(strlen(trim($this->dados['valor'])) > 0){
    	
		        //99/99/9999
		        if (!preg_match("/^[0-9]{2}\/[0-9]{2}\/[0-9]{4}$/", $this->dados['valor']) || !HelperFactory::getInstance()->ChecarData($this->dados['valor'],'br')) {
		        	
		        	$mensagem = ($this->encode == true ? utf8_encode($this->dados['mensagem']) : $this->dados['mensagem']);
		            
		        	$this->erro[$this->dados['field_name']]['mensagem'] = $mensagem;
		            
		        	//Verifica se o elemento html foi informado
		            if(!is_null($this->dados['html_id_element'])) $this->erro[$this->dados['field_name']]['id_element'] = $this->dados['html_id_element'];
		        }        
    	}
        
        return $this;
    }
    
    /**
     * Enter description here ...
     * @return $this (retorna o próprio objeto)
     */
    public function datahora(){

    	  //Verifica se há valor para validar
    	if(strlen(trim($this->dados['valor'])) > 0){
    		
    		   //Comparações
    		   $validar_formato_data_hora = !preg_match("/^([0-9]{2}\/[0-9]{2}\/[0-9]{4}) ([01][0-9]|2[0-3]):([0-5][0-9])$/", $this->dados['valor']);    		   
    		   $validar_data_hora = !HelperFactory::getInstance()->ChecarDataHora($this->dados['valor']);
    		   
		        //Valida o timestamp
		        if ($validar_formato_data_hora || $validar_data_hora) {
		        	
		        	$mensagem = ($this->encode == true ? utf8_encode($this->dados['mensagem']) : $this->dados['mensagem']);
		            
		        	$this->erro[$this->dados['field_name']]['mensagem'] = $mensagem;
		            
		        	//Verifica se o elemento html foi informado
		            if(!is_null($this->dados['html_id_element'])) $this->erro[$this->dados['field_name']]['id_element'] = $this->dados['html_id_element'];
		        }        
    	}
        
        return $this;    	    	
    }

    /**
     * Método que verifica se o telefone está no formato (99)9999-9999
     * @return $this (retorna o próprio objeto)
     */
    public function telefone() {
    	
    	//Verifica se há valor para validar
    	if(strlen(trim($this->dados['valor'])) > 0){
    	
		       //Removemos os espaços em branco da String	
		       $this->dados['valor'] = str_replace(" ","",$this->dados['valor']);
		    	//Validando no Formato (99)9999-9999
		        if (!preg_match("/^\([0-9]{2}\)[0-9]{4}\-[0-9]{4}$/", $this->dados['valor'])) {
		        	
		        	$mensagem = ($this->encode == true ? utf8_encode($this->dados['mensagem']) : $this->dados['mensagem']);
		            
		        	$this->erro[$this->dados['field_name']]['mensagem'] = $mensagem;
		            
		        	//Verifica se o elemento html foi informado
		            if(!is_null($this->dados['html_id_element'])) $this->erro[$this->dados['field_name']]['id_element'] = $this->dados['html_id_element'];
		        }        
    	}
        
        return $this;
    }
    
    /**
     * Valida um Captcha
     * @param String $session_value -> Valor gerado na sessão     
     */
    public function captcha($session_value){
    	
    	 //Verifica se existe valor para comparar
    	 if(strlen(trim($this->dados['valor'])) > 0){
    	 	    	
		    	 //Valida o Captcha
		         if(!(strcmp($session_value,$this->dados['valor']) == 0)){
		         	 
		         	$mensagem = ($this->encode == true ? utf8_encode($this->dados['mensagem']) : $this->dados['mensagem']);
			   	   	 
		         	 $this->erro[$this->dados['field_name']]['mensagem'] = $mensagem;
		            
		        	//Verifica se o elemento html foi informado
		            if(!is_null($this->dados['html_id_element'])) $this->erro[$this->dados['field_name']]['id_element'] = $this->dados['html_id_element'];
			   	 }
    	 }
	   	return $this; 
    }
    
	
    /**
     * Compara duas senhas
     * @param Array $parametros
     * @return $this (Retorna o próprio objeto)
     */
    public function CompararSenha($primeira_senha,$segunda_senha)
	{
		//Verifica se ambas as senhas foram informadas
		if(strlen(trim($primeira_senha)) > 0 && strlen(trim($segunda_senha)) > 0){

				//Compara as senhas
				if(!strcmp($primeira_senha, $segunda_senha) == 0)
				{
					$mensagem = ($this->encode == true ? utf8_encode($this->dados['mensagem']) : $this->dados['mensagem']);
			   	   	
					$this->erro[$this->dados['field_name']]['mensagem'] = $mensagem;
		            
		        	//Verifica se o elemento html foi informado
		            if(!is_null($this->dados['html_id_element'])) $this->erro[$this->dados['field_name']]['id_element'] = $this->dados['html_id_element'];			
				}		
		}
		
		//Retorna o próprio objeto
		return $this;
	}
	
	/**
	 * Método que verifica se o valor é menor que o numero informado
	 * @param int $numero
	 * @return $this (retorna o próprio objeto)
	 */
	public function menor($numero)
	{
		//Verifica se existe valor para comparar
		if(strlen($this->dados['valor']) > 0){
		
				if(strlen($this->dados['valor']) < $numero)
				{
					$mensagem = ($this->encode == true ? utf8_encode($this->dados['mensagem']) : $this->dados['mensagem']);
					
					$this->erro[$this->dados['field_name']]['mensagem'] = $mensagem;
		
					//Verifica se o elemento html foi informado
					if(!is_null($this->dados['html_id_element'])) $this->erro[$this->dados['field_name']]['id_element'] = $this->dados['html_id_element'];
				}
		
		}
		return $this;
	}
	
	/**
	 * Acrescenta um erro personalizado na validação
	 * @param String $field_name
	 * @param String $mensagem
	 * @param String $html_id_element
	 * returns void
	 */
	public function setNewError($field_name,$mensagem,$html_id_element=null){
		
		//Traduz os caracteres caso seja preciso
		$mensagem = ($this->encode == true ? utf8_encode($mensagem) : $mensagem);
		
		//Mensagem do erro
		$this->erro[$field_name]['mensagem'] = $mensagem;
		
		//Verifica se o elemento html foi informado
		if(!is_null($html_id_element)) $this->erro[$field_name]['id_element'] = $html_id_element;
	}

    /**
     * Método que verifica se teve alguma mensagem de erro
     * @return BOOLEANO (true/false) 
     */
    public function validar() {
        if (count($this->erro) > 0) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Método que retorna os erros encontrados
     * @return ARRAY $erro
     */
    public function getErrors() {
        return $this->erro;
    }
}
?>