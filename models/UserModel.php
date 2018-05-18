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
		$search = $this->link->query("SELECT id FROM `role` WHERE `name_role`='".$search."' ");
		$role_id =(int)$search->fetch_assoc()['id'];
		return $role_id;
	}


	public function authUser($authUser)
	{
		//$valid = true;
		$result_query =  $this->link->query("SELECT * FROM `users` WHERE `name`='".$authUser['name']."' ");

		foreach ($result_query->fetch_assoc() as $key => $value) {
			if ($key == 'password') {
				$password = $value;
			}
		}
		$authpwd = md5($authUser['password']);

		if ($authpwd !== $password) {
			Session::setMessage('danger', 'The password is incorrect');
			return false;
		}
		return true;	
	}
}