<?php 
require_once('models/UserModel.php');

class RegisterController extends Controller
{
	public $model;

	public function __construct()
	{
		$this->model = new User();
	}

	public function index()
	{
		//echo __METHOD__;
		$data['title'] = 'Main Page';
		$data['content'] = 'Enter your text!';


		if (!empty($_POST) && isset($_POST['butReg'])) {
			if (empty($_POST['name']) && empty($_POST['password']) && empty($_POST['selectRole'])) {
		 		Session::setMessage('danger', 'Filds is required');
			}	else {
				$name =	$this->testInput($_POST["name"]);
				$pwd = $this->testInput($_POST["password"]);
				$selectRole = $this->testInput($_POST["selectRole"]);
				$arr = [
					'name' => $name,
					'password' => $pwd,  
					'selectRole' => $selectRole  
				];

				if (Validator::validation($arr)) {
					if ($this->model->addUser($arr)) {
						Session::set('name', $_POST['name']);
						//Session::set('password', $_POST['password']);
						Session::set('success', 'Добро пожаловать'.Session::get('name'));
						header('Location: /diary');
					}
					
				}	else {
						
				}
			}
		}

		if (!empty($_POST) && isset($_POST['butLogin'])) {
			if (empty($_POST['name']) && empty($_POST['password'])) {
		 		Session::setMessage('danger', 'Filds is required');
			}	else {
				$name =	$this->testInput($_POST["name"]);
				$pwd = $this->testInput($_POST["password"]);
				$arr = [
					'name' => $name,
					'password' => $pwd  
				];

				if (Validator::validation($arr)) {
					if ($this->model->authUser($arr)) {
						Session::set('name', $_POST['name']);
						//Session::set('password', $_POST['password']);
						Session::set('success', 'Добро пожаловать'.Session::get('name'));
						header('Location: /diary');
					}
				}	
			}
		}

		if (isset($_SESSION['name'])) {
    		header('Location: /diary');
  		}	else {
 			View::render('auth/index', compact("data"));
 		}
	 }

	public function testInput($data) 
	{
  		$data = trim($data);
  		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
	}


	public function logout() 
	{
		session::destroy();

	}
}









































