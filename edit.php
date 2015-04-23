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
		<?php 
if($_POST){
    try{
        $query = "update users
                    set name = :name, username = :username, email = :email, password  = :password
                    where id = :id";
        $honours = $connection->prepare($query);

        $honours->bindParam(':name', $_POST['name']);
        $honours->bindParam(':username', $_POST['username']);
        $honours->bindParam(':email', $_POST['email']);
        $honours->bindParam(':password', $_POST['password']);
        $honours->bindParam(':id', $_POST['id']);

        if($honours->execute()){
            echo "Record was updated.";
        }else{
            die('Unable to update record.');
        }
  
    }catch(PDOException $exception){
        echo "Error: " . $exception->getMessage();
    }
}
try {
  
    $query = "select id, name, username, email, password from users where id = ? limit 0,1";
    $honours = $connection->prepare( $query );
    $honours->bindParam(1, $_REQUEST['id']);
    $honours->execute();
 
    $row = $honours->fetch(PDO::FETCH_ASSOC);
    $id = $row['id'];
    $name = $row['name'];
    $username = $row['username'];
    $email = $row['email'];
    $password = $row['password'];
  
}catch(PDOException $exception){ 
    echo "Error: " . $exception->getMessage();
}
$action = isset($_GET['action']) ? $_GET['action'] : "";
if($action=='deleted'){
    echo "<div>Record was deleted.</div>";
}
?>
<div id="honours-container">
            <div id="honours-main-body">
					<form class="honours-login-form" method="POST" action="#"  id="register_form" name="reg">
					<div id="honours-index-list-container">
						<h1><?php $user->get_username($id);?> profile</h1>
    <table>
        <tr>
            <td>name</td>
		</tr>
        <tr>	
            <td><input type='text' name='name' value='<?php echo $name;  ?>' /></td>
        </tr>
        <tr>
            <td>username</td>
		</tr>
        <tr>	
            <td><input type='text' name='username' value='<?php echo $username;  ?>' /></td>
        </tr>
        <tr>
            <td>email</td>
		</tr>
        <tr>	
            <td><input type='text' name='email'  value='<?php echo $email;  ?>' /></td>
        </tr>
        <tr>
            <td>Password</td>
		</tr>
        <tr>	
            <td><input type='password' name='password'  value='<?php echo $password;  ?>' /></td>
        </td>
		<tr>
            <td>

                <input type='hidden' name='id' value='<?php echo $id ?>' /> 
 
                <input type='submit' value='Edit' />
            </td>
        </tr>
    </table>
	<div><a href="index.php">Home</a></div><br>
<div><a href="?user=logout">log out</a></div>  
</form>

            </div><br>
<br>

            <div id="footer"></div>
				
				
				
            </div>
      </div>
        </div>

    
    </div>
</div>
<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
