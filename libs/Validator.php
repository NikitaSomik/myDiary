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
}





