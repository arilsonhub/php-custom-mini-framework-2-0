<?php
//Requisita  a Biblioteca
LibFactory::getInstance(null,null,'phpmailer/class.phpmailer.php');

/**
 * @author Linea Comunicação com Design - http://www.lineacom.com.br
 *
 */
class mailHelper extends PHPMailer
{
	public function setHost($host)
	{
		// Seu servidor smtp
		$this->Host = $host;
	}

	public function setSMTPAuth($flag)
	{
		// habilita smtp autenticado
		$this->SMTPAuth = $flag;
	}
	
	public function setSMTPSecure($sMTPSecure)
	{
		//seta a segurança
		$this->sMTPSecure = $sMTPSecure;
	}

	public function setUserName($username)
	{
		// usuário deste servidor smtp
		$this->Username = $username;
	}

	public function setPassword($password)
	{
		//Seta a senha
		$this->Password = $password;
	}

	public function setFromName($fromName)
	{
		//pode ser o mesmo de username
		$this->FromName = $fromName;
	  
	}

	public function setFrom($from)
	{
		//email utilizado para o envio
		$this->From = $from;
	}

	public function setIdioma($idioma,$pasta_idioma)
	{
		//Setando o idioma
		$this->SetLanguage($idioma,$pasta_idioma);
	}

	public function setAddress($email)
	{
		//Endereço a ser enviado a mensagem
		$this->AddAddress($email);
	}

	public function setWrap($wrap)
	{
		//wrap seta o tamanho do texto por linha
		$this->WordWrap = $wrap;
	}

	public function setIsHtml($flag)
	{
		//enviar em HTML
		$this->IsHTML($flag);
	}

	public function setSubject($subject)
	{
		//Seta o assunto
		$this->Subject = $subject;
	}

	public function setBody($body)
	{
		//Seta a mensagem
		$this->Body = $body;
	}
	
	public function setPort($port)
	{
		//Seta a porta
		$this->Port = $port;
	}
	
	public function setMailer($mailler)
	{
		//Seta o formato de envio
		$this->Mailer = $mailler;
	}

	public function sendEmail()
	{
		//DEFINE O METODO DE ENVIO(PROTOCOLO SMTP)
		$this->SmtpSend();
			
		//*********************Enviando o E-mail**********************
		if($this->Send()){
			return true;
		}else{
			return false;
		}
	}
}