<?php 


class Validator 
{

public static function validation($post)
{

	$error = [];
	$valid = true;

	foreach ($post as $key => $v) {
		if ($key == 'name') {
			if (ucfirst($v) !== $v) {
				$error[] = 'The first letter '.$key.' must be the capital';
				$valid = false;
			}	elseif (strlen($v) < 3) {
				 	$error[] = 'The '.$key.' must be at least 3 characters';
				 	$valid = false;
			}	elseif (strlen($v) > 25) {
					$error[] = 'The '.$key.' must be no more than 25 characters';
					$valid = false;
			}	
		}	elseif ($key == 'password') {
			if (strlen($v) < 5) {
				$error[] = 'The '.$key.' must be at least 5 characters'; 
				$valid = false;
					
			} elseif (strlen($v) > 25) {
				$error[] = 'The '.$key.'  must be no more than 25 characters';
				$valid = false;
			} 
		}
	}
	
	if(!empty($error)) {
		Session::setMessage('danger', $error);
	}
	//Session::setMessage('success', $succes);
	return $valid;
	}


	public function validTask($post)
	{
		$error = [];
		$valid = true;

		foreach ($post as $key => $val) {
			if ($key == 'task') {
				if (ucfirst($val) !== $val) {
				$error[] = 'The first letter '.$key.' must be the capital';
				$valid = false;
				}	elseif (strlen($val) < 3) {
				 	$error[] = 'The '.$key.' must be at least 3 characters';
				 	$valid = false;
				}	elseif (strlen($val) > 200) {
					$error[] = 'The '.$key.' must be no more than 200 characters';
					$valid = false;
				}
			}	elseif ($key == 'describe') {
				if (strlen($val) < 3) {
					$error[] = 'The '.$key.' must be at least 3 characters'; 
					$valid = false;
					
				}	elseif (strlen($val) > 500) {
					$error[] = 'The '.$key.'  must be no more than 500 characters';
					$valid = false;
				} 
			}		
		}

		if(!empty($error)) {
		Session::setMessage('danger', $error);
		}
		//Session::setMessage('success', $succes);
		return $valid;
	}
}





