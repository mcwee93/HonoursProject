<?php
include_once '../include/functions.php';

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Welcome Admin</title>
<script language="javascript" type="text/javascript"> 
            function submitregistration() {
                var form = document.login;
if(form.emailusername.value == "")
{
alert( "Please enter email or username." );
return false;
}
else if(form.password.value == "")
{
alert( "Please enter password." );
return false;
}
}
	</script>
	<script language="javascript" type="text/javascript"> 
            function submitregistration() {
                var form = document.reg;
if(form.name.value == "")
{
alert( "Enter role." );
return false;
}
else if(form.username.value == "")
{
alert( "Enter username." );
return false;
}
else if(form.password.value == "")
{
alert( "Enter password." );
return false;
}
}
}
	</script>
	</head>
	<body>
	<h1>Register an Admin</h1>
		<table>
        <form method="POST" action="addadmin.php"  id="register_form" name="reg">
		<tr>
            <td> <input type="text" name="role" placeholder="Role" required></td>
        </tr>
		<tr>
            <td><input type="text" name="user_name" placeholder="Username" id="username" required></td>
        </tr>
		<tr>
            <td><input type="password" name="user_password" placeholder="Password" required></td>
        </tr>
		<tr>
            <td><button type="submit" name="register_btn" onclick="return( submitregistration());" value="Register">Register</button></td>
        </tr>
	

            </form>
		</table>
			<br>
                  <br>
                  <div><a href="adminpanel.php">Back</a></div>
        <br>
        <?php
				include_once '../include/functions.php';
				$admin = new GymUser();
				// Checking for user logged in or not
				//if (!$user->get_session())
				//{
				//   header("location:login.php");
				//}
				if ($_SERVER["REQUEST_METHOD"] == "POST") 
				{
					$register = $admin->register_admin($_POST['role'], $_POST['user_name'], $_POST['user_password']);
					if ($register) {
						// Registration Success
						echo 'Registration  successful';
					} else {
						// Registration Failed
						echo 'Registration failed';
					}
				}
				?>

</body>
</html>