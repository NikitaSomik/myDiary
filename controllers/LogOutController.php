<?php  


class LogOutController extends Controller
{

	//public  function index();
	public function index()
	{

		session::destroy();
		header('Location: /');
	}

}