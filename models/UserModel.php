<?php 

class User extends Model
{

	public function addUser($add)
	{
		
		$search = $add['selectRole'];
		$role_id = $this->search_role_id($search);
		
		$add['password'] = md5($add['password']);
		$result = $this->link->query("INSERT INTO users(name, password, role_id) VALUES('{$add['name']}', '{$add['password']}', '{$role_id}')"); 

		return true;
	}

	public function search_role_id($search)
	{
		$search = $this->link->query("SELECT id FROM `roles` WHERE `name_role`='".$search."' ");
		$role_id =(int)$search->fetch_assoc()['id'];

		return $role_id;
	}

	public function authUser($authUser)
	{
		$arr = [''];

		$result_query = $this->link->query("SELECT * FROM `users` JOIN `roles` ON `roles`.`id` = `users`.`role_id` WHERE `users`.`name` = '".$authUser['name']."' ");

		foreach ($result_query->fetch_array() as $key => $value) {
			$arr[$key] = $value;

			if ($key == 'password') {
				$password = $value;
			}
		}
		$authpwd = md5($authUser['password']);

		if ($authpwd !== $password) {
			Session::setMessage('danger', 'The password is incorrect');

			return false;
		}

		return $arr;	
	}

	public function addTask($data)
	{
		$res = $this->link->query("INSERT INTO tasks (`task`, `describeTask`, `user_id`, `end`) VALUES ('{$data['task']}', '{$data['describe']}', 0, '{$data['ltime']}' ) ");
	}

	public function getAllTasks()
	{
		$res = $this->link->query("SELECT * FROM `tasks` ORDER BY id DESC");
		$arr = $res->fetch_all();

		return $arr;
	}

	public function getAllUsers()
	{
		$res = $this->link->query("SELECT * FROM `users`");
		$arr = $res->fetch_all();

		return $arr;
	} 

	public function updateAssignedUser($data)
	{
		$search = $this->searchUserId($data['assignedUser']);

		if ($search) {
			$userId = $search[0][0];
		 	$res = $this->link->query("UPDATE `tasks` SET `user_id`= $userId WHERE `id` = '".$data['idTask']."' ");
		}
	}

	public function searchUserId($data)
	{
		$res =	$this->link->query("SELECT `id` FROM `users` WHERE `name`='".$data."' ");
		$res = $res->fetch_all()[0][0];

		return $res;
	}

	public function checkboxStatus($data)
	{
		$res = $this->link->query("UPDATE `tasks` SET `status_task`= '".$data['checkboxVal']."' WHERE `id` = '".$data['taskId']."' ");
	}
}