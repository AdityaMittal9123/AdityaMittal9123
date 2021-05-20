<?php
class Router{
	protected $routes=[];
	public static function load($file){
		$router = new static;
		require $file;
		return $router;
	}
	public function define($routes){
		$this->routes=$routes;
	}	
	public function direct($uri){
		try{
			if(array_key_exists($uri,$this->routes)){
				return $this->routes[$uri];
			}
			throw new Exception("<div class='bg-light h-100 container-fluid '>
				<div class='h-100 d-flex justify-content-center w-100'><h1 class='my-auto'>Page Not Found!</h1>
				 	</div></div><footer class='d-flex align-content-end row justify-content-center font-weight-bold '><div class='border-top container-fluid p-2'><</div></footer>");
		}
		catch (Exception $e){
			die($e->getMessage()); 
		}
	}
}

?>