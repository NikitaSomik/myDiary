<?php 
require_once('models/UserModel.php');

class DiaryController extends Controller
{

	public $model;

	public function __construct()
	{
		$this->model = new User();
	}

	public function index()
	{
		$data['title'] = 'Diary';

		if (!empty($_POST) && isset($_POST['addTask'])) {
			if (empty($_POST['task']) && empty($_POST['describe'])) {
				Session::setMessage('danger', 'Filds is required');
			}	else {
				$task =	$this->testInput($_POST["task"]);
				$describe = $this->testInput($_POST["describe"]);

				$arr = [
					'task' => $task,
					'describe' => $describe, 
					'ltime' =>	$_POST['ltime']
				];
				if (Validator::validTask($arr)) {
					if ($this->model->addTask($arr)) {
						
					}
				}
			}	
		}

		if (!empty($_POST) && isset($_POST['btnAssignedUser'])) {
			$assignedUser =	$this->testInput($_POST["assignedUser"]);
			$idTask = $this->testInput($_POST["idTask"]);

			$arr = [
				'assignedUser' => $assignedUser, 
				'idTask' =>	$idTask
			];

			$updateAssignedUser = $this->model->updateAssignedUser($arr);
			
		}

		if (!empty($_POST) && isset($_POST['btnStatus'])) {
			$checkboxVal =	$this->testInput($_POST["checkboxVal"]);
			$taskId = $this->testInput($_POST["taskId"]);
			$arrCheckbox = [
				'checkboxVal' => $checkboxVal, 
				'taskId' =>	$taskId
			];
			$checkboxStatus = $this->model->checkboxStatus($arrCheckbox);
		
		}

		$allTasks = $this->model->getAllTasks();
		$allUsers = $this->model->getAllUsers();
		$searchUserId = $this->model->searchUserId($_SESSION['name']);

		if (isset($_SESSION['name'])) {
			View::render('diary', compact("data", "allTasks", "allUsers", "searchUserId"));
		}	else {
			header('Location: /');
		}
	}



	public function testInput($data) 
	{
  		$data = trim($data);
  		$data = stripslashes($data);
  		$data = htmlspecialchars($data);
  		return $data;
	}

}