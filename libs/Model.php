<?php  

class Model
{
	
	public $link; 

	function __construct()
	{
		$this->link = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

		if ($this->link->connect_error) {
		    //die('<p style="color: #f00">'.mysqli_connect_error().'-'.mysqli_connect_error() .'</p>'); 
		    die('<p style="color: #f00">'.$this->link->connect_error.'</p>'); 
		}
	}



}