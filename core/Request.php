<?php
Class Request{
	public static function uri(){
		$uri=trim($_SERVER['REQUEST_URI'],'/');
		$uri=(stripos($uri,'?')>0)?substr($uri,0,stripos($uri,'?')):$uri;
		return ($uri);
	}
}
?>
