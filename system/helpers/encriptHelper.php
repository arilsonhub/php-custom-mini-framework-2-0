<?
Class encriptHelper
{
	const key="l1n34-c0m";    // chave da criptografia max 24 caracteres

	//criptografar
	public function encode($str)
	{
		$input = $str;
		$rnd=rand(10000000,99999999);
		$td = mcrypt_module_open('tripledes', '', 'ecb', '');
		mcrypt_generic_init($td, self::key, $rnd);
		$encrypted_data = mcrypt_generic($td, $input);
		mcrypt_generic_deinit($td);
		mcrypt_module_close($td);
		return base64_encode($encrypted_data);
	}
	
	//descriptografar
	public function decode($str)
	{
		$input = base64_decode($str);
		return mcrypt_decrypt ( "tripledes" , self::key , $input , "ecb" );
	}
}
?>