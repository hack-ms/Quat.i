<?php

namespace App\Utils;

class Common{
	
	public static $array;
	public static $links_css;
	public static $links_js;
	
	private function __construct(){
		
	}
	
	public static function link($saida, $return = false) {
	
		if ($return === true){
			return $saida;
		}else{
			echo $saida;
		}
	}
	
	/**
	 * Print da saída
	 * @access public
	 * @param $saida a ser impressa
	 * @return void
	 */
	
	public static function outPut($saida) {
		echo '<pre>' . print_r($saida, 1) . '</pre>';
        die();
	}
	
	public static function out($saida, $return = false, $htmlspecialchars = false) {
	
		$out = ($htmlspecialchars === true) ? htmlspecialchars($saida) : $saida;
	
		if ($return === true) {
            return $out;
        }
	
        echo $out;
	}

    /**
     * @param string $message
     * @param int $code
     * @throws \Exception
     */
    public static function setError($message = "", $code = 0)
    {
        throw new \Exception($message, $code);
    }
	
	public static function toJson($array) {
	
		return json_encode($array);
	}
	
	public static function toArray($json) {
	
		return json_decode($json, true);
	}
	
	public static function value($array, $indice, $return = false, $converter = false) {
	
		$aux = '';
	
		if (isset($array[$indice])) {
	
			$aux = $array[$indice];
		}
	
		if ($converter !== false && $aux != '') {
	
			switch ($converter) {
	
				case 'data':
	
					$aux = Dates::dateFormat('d/m/Y', $aux);
					break;
	
				default:
					break;
			}
		}
	
		if ($return === true)
	
			return $aux;
	
			echo $aux;
	}
	
	public static function redir($url = "") {
	
		header('location: ' . SITE_URL . $url);
		exit;
	}
	
	public static function isAjax() {
	
		if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] !== strtolower('XMLHttpRequest'))
	
			return true;
	
			return false;
	}
}