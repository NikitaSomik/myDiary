<?php 

class Route
{

	function __construct()
	{
		$url = isset($_GET['url'])?$_GET['url']:'Register';
		$url = explode('/', $url);
		//var_dump($url);

		$contr = $url[0].'Controller';
		if (file_exists('controllers/'.$contr.'.php')) {
			
			require_once('controllers/'.$contr.'.php');
			$controller = new $contr();	

			$method = (isset($url[1])?$url[1]:'index');
			//var_dump($url);
			//var_dump($method);
			if (method_exists($controller, $method)) {
				if (isset($url[2])) {
					$controller->$method($url[2]);
				} else {
					$controller->$method(); 

				}
				
			} else {
				echo '<h1>Page not found!</h1>';
				//var_dump($url);
				//var_dump($method);
			}
		} else 	{
			echo '<h1>Page not found!</h1>';
			//var_dump($url);
			//var_dump($method);
		}
	}

}