<?php
session_start();
include_once 'include/functions.php';
$user = new GymUser();
$id = $_SESSION['id'];

if($_SESSION['id'] < 1){
	header('location:index.php');
}

if(isset($_GET['user']) && ($_GET['user']=='logout')){
	session_destroy();
	header('location:index.php');
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
    <div id="bar_7" class="eight columns">
          <div id="bar_inside3">
        <div id="inside_bar3">
        <h1><?php $user->get_username($id);?> profile</h1>
						
						<?php
	$query = "SELECT id, name, username, email, password FROM users WHERE id = ($id)";
	$stmt = $connection->prepare( $query );
	$stmt->execute();
	$num = $stmt->rowCount();
	if($num>0){
		echo "<table border='2'>";
			echo "<tr>";
				echo "<th>Name</th>";
				echo "<th>Username</th>";
				echo "<th>Email</th>";
				echo "<th></th>";
			echo "</tr>";
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
				extract($row);
				echo "<tr>";
					echo "<td>{$name}</td>";
					echo "<td>{$username}</td>";
					echo "<td>{$email}</td>";
				echo "<td>";
                    //we will use this links on next part of this post
                    echo "<a href='edit.php?id={$id}'>Edit</a>";
            echo "</tr>";
        }
  
    //end table
    echo "</table>";
  
}
  
//if no records found
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
					<form class="honours-login-form" method="POST" action="register.php"  id="register_form" name="reg">
					<div id="honours-index-list-container">
						<h4>Hello <?php $user->get_fullname($_SESSION['id']);?></h4>
						<li class="honours-index-li"><a href="login.php"><div id="honours-index-list-links">Home</div></a></li>
						<li class="honours-index-li"><a href="test.php"><div id="honours-index-list-links">Profile</div></a></li>
						<li class="honours-index-li"><a href="staff.php"><div id="honours-index-list-links">Staff</div></a></li>
						<li class="honours-index-li"><a href="booking.php"><div id="honours-index-list-links">Book a Facility</div></a></li>
					</div>
					</form>
					<br>
					<div id="honours-register-button"><a href="?user=logout">log out</a></div>
  
     
              
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
