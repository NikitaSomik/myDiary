<?php  


class View
{

	static function render($path, $data)
	{

		include'views/header.php';
		include'views/'.$path.'.php';
		include'views/footer.php';
	}
}