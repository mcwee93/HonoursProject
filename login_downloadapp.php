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
  </script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
    $( "#dialog" ).dialog();
  });
  </script>
  </head>
  <body>
<div id="dialog" title="Scan the code to download">
    <p>To download the android app use your phone to scan the QR code today!</p>
    <img src="images/chart.png" /> </div>

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
					
					
					echo "<a href='football.php'>View More</a>";
					
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
					
					
					echo "<a href='badminton.php'>View More</a>";
					
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
					
					
					echo "<a href='swimming.php'>View More</a>";
					
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
					
					
					echo "<a href='zoomba.php'>View More</a>";
					
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
					
					
					echo "<a href='meta.php'>View More</a>";
					
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
        <form class="honours-login-form" method="POST" action="register.php"  id="register_form" name="reg">
            <div id="honours-index-list-container">
            <h4>Hello
                <?php $user->get_fullname($_SESSION['id']);?>
              </h4>
            <li class="honours-index-li"><a href="profile.php">
              <div id="honours-index-list-links">Profile</div>
              </a></li>
            <li class="honours-index-li"><a href="staff.php">
              <div id="honours-index-list-links">Staff</div>
              </a></li>
            <li class="honours-index-li"><a href="booking.php">
              <div id="honours-index-list-links">Book a Facility</div>
              </a></li>
            <li class="honours-index-li"><a href="contact.php">
              <div id="honours-index-list-links">Contact Us</div>
              </a></li>
            <li class="honours-index-li"><a href="login_downloadapp.php">
              <div id="honours-index-list-links">Downlaod App</div>
              </a></li>
          </div>
          </form>
        <div id="honours-register-button"><a href="?user=logout">log out</a></div>
      </div>
      </div>
  </div>
  </div>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
