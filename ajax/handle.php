<?php
include '../config/functions.php';

if(!function_exists('check_char')){
	function check_char($char='')
	{
		return get_jp_word($arr, $char);
	}
}

$_FUNC = $_GET['function'];
if(!empty($_FUNC)){
	switch ($_FUNC) {
		case 'check-char':
			$char = $_GET['char'];
			$filename = date('Ymd');
			get_jp_word(file_to_array(base_path("/data/katakana/{$filename}.txt")), $char);
			break;
		
		default:
			break;
	}
}

