<?php
/**
 * Plugin para a Geraзгo de Captcha
 * @author Linea Comunicaзгo com Design - http://www.lineacom.com.br
 *
 */
class captchaHelper
{
	//Captcha.png - bellerose.ttf
	public function CreateCaptcha($imageFile, $fontname, $totalCaracter, $tamanhoFonte, $angulo)
	{
		// Inicializa os dados da session
		session_start();
			 
		// Definir o header como image/png para indicar que esta pбgina contйm dados
		// do tipo image->PNG
		header("Content-type: image/png");

		// Criar um novo recurso de imagem a partir de um arquivo
		$imagemCaptcha = imagecreatefrompng($imageFile)
		or die("Nгo foi possнvel inicializar uma nova imagem");

		// Criar o texto para o captcha
		$textoCaptcha = substr(md5(uniqid('')),-$totalCaracter,$totalCaracter);		

		// Guardar o texto numa variбvel session
		$_SESSION['captcha'] = $textoCaptcha;

		// Indicar a cor para o texto
		$corCaptcha = imagecolorallocate($imagemCaptcha,0,0,0);
		
		//Coloca o texto na imagem (imagem, tamanho, angulo, x, y, cor, fonte, texto)
		imagettftext($imagemCaptcha, $tamanhoFonte, $angulo, 50, 35, $corCaptcha, $fontname,$textoCaptcha);
		
		// Mostrar a imagem captha no formato PNG.
		// Outros formatos podem ser usados com imagejpeg, imagegif, imagewbmp, etc.
		imagepng($imagemCaptcha);
			 
		// Liberar memуria
		imagedestroy($imagemCaptcha);
	}
}
?>