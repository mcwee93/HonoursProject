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
          <form action="customer_insert.php" method="post">
            <table id="table_reg">
              <tr>
                <td> Your Name: </td>
                <td><input type="text" name="name" value="<?php $user->get_fullname($_SESSION['id']);?>"/></td>
              </tr>
              <tr>
                <td> Your Phone No: </td>
                <td><input type="text" name="num"/></td>
              </tr>
              <tr>
                <td> Your E-mail: </td>
                <td><input type="text" name="email" value="<?php $user->get_email($_SESSION['id']);?>"/></td>
              </tr>
              <tr>
                <td> Your Message: </td>
                <td><textarea name="message" placeholder="..."></textarea></td>
              </tr>
              <tr>
                <td></td>
                <td><input class="send" type="submit" value="Send"></td>
              </tr>
            </table>
            <div><a href="index.php">Home</a></div>
            <br>
            <div><a href="?user=logout">log out</a></div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
