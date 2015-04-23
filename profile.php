<?php
session_start();
include_once 'include/functions.php';
$user = new GymUser();
$id = $_SESSION['id'];

if($_SESSION['id'] < 1){
	header('location:login.php');
}
if(isset($_GET['user']) && ($_GET['user']=='logout')){
	session_destroy();
	header('location:login.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
		<link rel="stylesheet" type="text/css" href="honours_style.css">
        <title>Profile</title>
    </head>
    <body>
	
	
	 <div id="honours-container">
            <div id="honours-main-body">
					<form class="honours-login-form" method="POST" action="register.php"  id="register_form" name="reg">
					<div id="honours-index-list-container">
						<h1><?php $user->get_fullname($id);?> Profile</h1>
						
						<?php
	$query = "SELECT id, name, username, email, password FROM users WHERE id = ($id)";
	$stmt = $connection->prepare( $query );
	$stmt->execute();
	$num = $stmt->rowCount();
	if($num>0){
		echo "<table border='1'>";
			echo "<tr>";
				echo "<th>Name</th>";
				echo "<th>Username</th>";
				echo "<th>Email</th>";
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
					</form>
					<br>
					<div id="honours-register-button"><a href="index.php">Home</a></div><br>
					
					
					<div id="honours-register-button"><a href="?user=logout">log out</a></div>
  
     
              
            </div>
            <div id="footer"></div>
        </div>
    </body>
</html>
