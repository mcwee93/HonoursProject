<?php
session_start();
include_once 'include/functions.php';
$user = new GymUser();

if ($user->get_session())
{
   header("location:index1.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {    
    $login = $user->check_login($_POST['emailusername'], $_POST['password']);
    if ($login) {
        // Registration Success
       header('location:login.php');
    } else {
        // Registration Failed
        echo 'Username / password wrong';
    }
}
?>
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
    <div id="bar_1" class="four columns">
          <div id="bar_inside">
        <div id="inside_bar">
              <?php
		$query = "SELECT id, name, description, staffMember FROM facilities WHERE id = 2";
		$honours = $connection->prepare( $query );
		$honours->execute();
		$num = $honours->rowCount();
		if($num>0){
			while ($row = $honours->fetch(PDO::FETCH_ASSOC)){
				extract($row);
				
					echo "<h4>{$name}</h4>";
					echo "<p>{$description}</p>";
					
			}
	}
	else{
		echo "No records found.";
	}
?>
            </div>
      </div>
        </div>
    <div id="bar_2" class="four columns">
          <div id="bar_inside">
        <div id="inside_bar">
              <?php
		$query = "SELECT id, name, description, staffMember FROM facilities WHERE id = 3";
		$honours = $connection->prepare( $query );
		$honours->execute();
		$num = $honours->rowCount();
		if($num>0){
			while ($row = $honours->fetch(PDO::FETCH_ASSOC)){
				extract($row);
				
					echo "<h4>{$name}</h4>";
					echo "<p>{$description}</p>";
					
			}
	}
	else{
		echo "No records found.";
	}
?>
            </div>
      </div>
        </div>
    <div id="bar_3" class="four columns">
          <div id="bar_inside">
        <div id="inside_bar">
              <?php
		$query = "SELECT id, name, description, staffMember FROM facilities WHERE id = 4";
		$honours = $connection->prepare( $query );
		$honours->execute();
		$num = $honours->rowCount();
		if($num>0){
			while ($row = $honours->fetch(PDO::FETCH_ASSOC)){
				extract($row);
				
					echo "<h4>{$name}</h4>";
					echo "<p>{$description}</p>";
					
			}
	}
	else{
		echo "No records found.";
	}
?>
            </div>
      </div>
        </div>
  </div>
    </div>
<div class="container">
      <div class="row">
    <div id="bar_4" class="four columns">
          <div id="bar_inside">
        <div id="inside_bar">
              <?php
		$query = "SELECT id, name, description, staffMember FROM facilities WHERE id = 5";
		$honours = $connection->prepare( $query );
		$honours->execute();
		$num = $honours->rowCount();
		if($num>0){
			while ($row = $honours->fetch(PDO::FETCH_ASSOC)){
				extract($row);
				
					echo "<h4>{$name}</h4>";
					echo "<p>{$description}</p>";
					
			}
	}
	else{
		echo "No records found.";
	}
?>
            </div>
      </div>
        </div>
    <div id="bar_5" class="four columns">
    <div id="bar_inside">
        <div id="inside_bar">
              <?php
		$query = "SELECT id, name, description, staffMember FROM facilities WHERE id = 6";
		$honours = $connection->prepare( $query );
		$honours->execute();
		$num = $honours->rowCount();
		if($num>0){
			while ($row = $honours->fetch(PDO::FETCH_ASSOC)){
				extract($row);
				
					echo "<h4>{$name}</h4>";
					echo "<p>{$description}</p>";
					
			}
	}
	else{
		echo "No records found.";
	}
?>
            </div>
      </div>
    </div>
    <div id="bar_6" class="four columns">
          <div id="bar_inside">
        <div id="inside_bar">
              <div id="honours-container">
            <div id="honours-main-body">
                  <form class="honours-login-form" method="POST" action=""  id="login_form" name="login">
                <div id="honours-form-container">
                      <input type="text" style="width:100%;" name="emailusername" placeholder="Email" required>
                      <input type="password" style="width:100%;" name="password" placeholder="Password" id="password" required>
                      <input type="hidden" name="flag" value="login"/>
                      <input type="submit"  style="width:100%;" name="login_btn" onclick="return( submitregistration());" value="Sign In"/>
                    </div>
              </form>
                  <div id="honours-register-button"><a href="register.php">Register new user</a></div>
                </div>
          </div>
            </div>
      </div>
        </div>
  </div>
    </div>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
