<?php
// Get home url of website
if (!function_exists('home_url')) {
	function home_url($isSsl = false)
	{
		$http = isset($_SERVER['HTTPS']) ? 'https' : 'http';
		$port = $_SERVER['SERVER_PORT'] != 80 ?  ':'.$_SERVER['SERVER_PORT'] : '';
		$path = str_replace('/index.php', '', $_SERVER['PHP_SELF']);
		$pathSlash = !preg_match('/^\//', $path) && !empty($path)? '/'.$path : $path;

		return $http.'://'.$_SERVER['SERVER_NAME'].$port.$pathSlash;
	}
}


// Get path of file to include
if (!function_exists('base_path')) {
	function base_path($pathFile = '')
	{
		$path = str_replace('/index.php', '', $_SERVER['PHP_SELF']);
		$pathSlash = !preg_match('/^\//', $path) && !empty($path)? '/'.$path : $path;

		if(!empty($pathFile))
			return !preg_match('/^\//', $pathFile) ? $_SERVER['DOCUMENT_ROOT'].$pathSlash.'/'.$pathFile : $_SERVER['DOCUMENT_ROOT'].$pathSlash.$pathFile ;
		return $_SERVER['DOCUMENT_ROOT'].$pathSlash;
	}
}

// Create file katakana
if (!function_exists('create_katakana_file')) {
	function create_katakana_file($path = '')
	{
		$file = fopen($path, 'w');
		$arr = [
			"あ,a",
			"い,i",
			"う,u",
			"え,e",
			"お,o",
			"か,ka",
			"き,ki",
			"く,ku",
			"け,ke",
			"こ,ko",
			"が,ga",
			"ぎ,gi",
			"ぐ,gu",
			"げ,ge",
			"ご,go"
		];
		for ($i=0; $i < count($arr); $i++) {
			if($i == count($arr) - 1)
				fwrite($file, $arr[$i]);
			else
				fwrite($file, $arr[$i]."\n");
		}
		fclose($file);
	}
}

// Create file katakana
if (!function_exists('file_to_array')) {
	function file_to_array($path = '')
	{
		$arr = [];
		$file = fopen($path, 'r');
		if($file){
			while (!feof($file)) {
				$arr[] = _BR(fgets($file));
			}
		}
		fclose($file);

		return $arr;
	}
}

// Create file katakana
if (!function_exists('get_rand_word')) {
	function get_rand_word($arr = '')
	{
		
		$word = [
			'jp' => '',
			'en' => ''
		];
		$rand_word = explode(',', _BR($arr[array_rand($arr)]));
		
		if (count($rand_word) > 1 ) {
			$word = [
				'jp' => $rand_word[0],
				'en' => _BR($rand_word[1])
			];
		}

		return $word;
	}
}

// Create file katakana
if (!function_exists('get_jp_word')) {
	function get_jp_word($arr = [], $en = '')
	{
		$jp = '';
		foreach ($arr as $line) {
			$word = explode(',', $line);
			if(count($word) > 1 &&  _BR($word[1]) == $en){
				return $word[0];
			}
		}

		return $jp;
	}
}

// Create file katakana
if (!function_exists('_BR')) {
	function _BR($char = '')
	{
		return str_replace(["\n", "\r"], '', $char);
	}
}

