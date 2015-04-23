<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title></head>

<body>
<?php
include('../included/db_con.php');

if(isset($_GET['id']))
{
$id=$_GET['id'];
$sql="delete from bookingdetail where id='".$id."'";
mysql_query($sql) or die (mysql_error($con));

header("location:adminpanal.php");
}
?>
</body>
</html>
