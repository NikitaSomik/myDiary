<?php 

class Session 
{
	static function init()
	{
		session_start();
	}

	static function destroy()
	{
		session_destroy();
	}

	static function set($key, $value)
	{
		$_SESSION[$key] = $value;
	}

	static function get($key)
	{
		if (isset($_SESSION[$key]))
		 	return $_SESSION[$key];
		else { 
			return false;
		}
	}

	static function setMessage($type, $message)
	{
		self::set('message', [$type, $message]);
	}

	static function showMessage()
	{
		$m = self::get('message');
		//echo '<pre>', print_r($m), '</pre>';
		if ($m) {
			echo "<div class='alert alert-".$m[0]." '>";

			if (is_array($m[1])) {
				echo '<ul style="margin-bottom: 0rem!important"><li>'.implode('</li><li>', $m[1]).'</li></ul>'; 
			}	else{
				echo $m[1];
			}
			echo "</div>"; 
		}
		self::unsetSession('message');
	}

	static function unsetSession($key){
		if (isset($_SESSION[$key]))
			unset($_SESSION[$key]);
		}
}