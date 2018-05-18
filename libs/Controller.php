<?php  

abstract class Controller
{

	public abstract function index();

	function dump($m){
		echo '<pre>'.print_r($m, true).'</pre>';
	}	
}