<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("honours",$con) or die(mysql_error($con));
error_reporting(E_ALL ^ E_NOTICE);
?>