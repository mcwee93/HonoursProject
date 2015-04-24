<?php
session_start();
include_once '../include/functions.php';
$user = new GymUser();

if(isset($_GET['user']) && ($_GET['user']=='logout')){
	session_destroy();
	header('location:index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Welcome Admin</title></head>
<body>
<h1>Welcome Admin</h1>
<li><a href="userbooking.php">User Booking List</a></li>
<li><a href="registeredusers.php">Registered Users</a></li>
<li><a href="addadmin.php">Add an Admin</a></li>
<li><a href="facilities.php">Facilities</a></li>
<li><a href="?user=logout">Log Out</a></li>

</body>
</html>