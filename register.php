<!DOCTYPE html>
<html lang="en">
	<head>

	<!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<meta charset="utf-8">
	<title>Leisure Centre</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

	<!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="css/skeleton.css">
	<link rel="stylesheet" href="css/honours_project.css">

	<!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
	<link rel="icon" type="image/png" href="images/favicon.png">
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
alert( "Enter name." );
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
else if(form.email.value == "")
{
alert( "Enter email." );
return false;
}
}
	</script>
	</head>
	<body>

<!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
<div class="container">
      <div class="row">
    <div id="header_bar" class="twelve columns"></div>
  </div>
    </div>
<div class="container">
<div class="row">
      <div id="bar_7" class="12 columns">
    <div id="bar_inside2">
          <div id="inside_bar2">
        <form class="honours-login-form" method="POST" action="register.php"  id="register_form" name="reg">
              <div id="honours-register-form-container">
            <input type="text" name="name" placeholder="Full Name" required>
            <br>
            <input type="text" name="username" placeholder="Username" required>
            <br>
            <input type="text" name="email" placeholder="Email" id="email" required>
            <br>
            <input type="password" name="password" placeholder="Password" required>
            <br>
            <input type="hidden" name="value" value="m">
            <br>
            <br>
            <button type="submit" name="register_btn" onclick="return( submitregistration());" value="Register">Register</button>
          </div>
              <div id=""><a href="login.php">Already registered? Login here</a></div>
            </form>
        <br>
        <?php
				include_once 'include/functions.php';
				$user = new GymUser();
				// Checking for user logged in or not
				//if (!$user->get_session())
				//{
				//   header("location:login.php");
				//}
				if ($_SERVER["REQUEST_METHOD"] == "POST") 
				{
					$register = $user->register_user($_POST['name'], $_POST['username'], $_POST['password'], $_POST['email'], $_POST['value']);
					if ($register) {
						// Registration Success
						echo 'Registration  successful <a href="login.php">Click here</a> to login';
					} else {
						// Registration Failed
						echo 'Registration failed. Email or Username already exits please try again';
					}
				}
				?>
      </div>
        </div>
  </div>
    </div>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
