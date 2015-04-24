<?php
include_once 'database.php';
class GymUser {
public function __construct() 
{
        $db = new DB_Class();
}
public function register_user($name, $username, $password, $email, $value) 
{
        $password = md5($password);		
		$sql = mysql_query("SELECT id from users WHERE username = '$username' or email = '$email'");
        $no_rows = mysql_num_rows($sql);
		if ($no_rows == 0) 
		{
        $result = mysql_query("INSERT INTO users(username, password, name, email, value) values ('$username', '$password','$name','$email','$value')") or die(mysql_error());
        return $result;
		}
		else
		{
		return FALSE;
		}
    }
	public function register_admin($role, $user_name, $user_password) 
{
        $user_password = md5($user_password);		
		$sql_ = mysql_query("SELECT id from admin WHERE role = '$role' or user_name = '$user_name'");
        $no_rows = mysql_num_rows($sql_);
		if ($no_rows == 0) 
		{
        $result = mysql_query("INSERT INTO admin(role, user_name, user_password) values ('$role','$user_name','$user_password')") or die(mysql_error());
        return $result;
		}
		else
		{
		return FALSE;
		}
    }
   public function check_login($emailusername, $password) 
	{
        $password = md5($password);	
        $result = mysql_query("SELECT id from users WHERE email = '$emailusername' and password = '$password'");
        $user_data = mysql_fetch_array($result);
        $no_rows = mysql_num_rows($result);
        if ($no_rows == 1) 
		{
            $_SESSION['login'] = true;
            $_SESSION['id'] = $user_data['id'];
            return TRUE;
        }
        else
		{
		    return FALSE;
		}
    }
    public function get_fullname($id) 
	{
        $result = mysql_query("SELECT name FROM users WHERE id = $id");
        $user_data = mysql_fetch_array($result);
        echo $user_data['name'];
    }
	public function get_username($id) 
	{
        $result = mysql_query("SELECT username FROM users WHERE id = $id");
        $user_data = mysql_fetch_array($result);
        echo $user_data['username'];
    }
	public function get_email($id) 
	{
        $result = mysql_query("SELECT email FROM users WHERE id = $id");
        $user_data = mysql_fetch_array($result);
        echo $user_data['email'];
    }
	public function get_staffname() 
	{
        $result = mysql_query("SELECT name FROM staff");
        $user_data = mysql_fetch_array($result);
        echo $user_data['name'];
    }
	public function get_staffrole() 
	{
        $result = mysql_query("SELECT role FROM staff");
        $user_data = mysql_fetch_array($result);
        echo $user_data['role'];
    }
	public function get_staffemail()
	{
        $result = mysql_query("SELECT email FROM staff");
        $user_data = mysql_fetch_array($result);
        echo $user_data['email'];
    }

    public function get_session() 
	{   
        if (isset($_SESSION['login']));
    }
    public function user_logout() {
        $_SESSION['login'] = FALSE;
        session_destroy();
    }
}
?>