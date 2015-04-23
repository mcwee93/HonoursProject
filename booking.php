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
          <div id="bar_inside2">
        <div id="inside_bar2">
<?php
include('included/db_con.php');
if(isset($_POST['sub']))
{
$user=$_POST['user'];
$name=$_POST['name'];
$bookingprice=$_POST['booking_price'];
$bookingdate= $_POST['bookingdate'];
$bookingdate3= $_POST['bookingdate3'];
$bookingnos=$_POST['booking_nos'];
$amount=$_POST['pricetopay'];

?>
<?php 
$s1="INSERT INTO bookingdetail (username,name,booking_date,booking_price,no_of_bookings,amount)VALUES('".$user."','".$name."','".$bookingdate3."','".$bookingprice."','".$bookingnos."','".$amount."')";
mysql_query($s1) or die (mysql_error($con));
header("location:success.php");
}

?>

<div id="contenar">

	<div id="r">
	<form action="booking.php" method="POST">
	<h3> Lets book a facility</h3>
        <table >
		
          <tr>
            <td width="114">Booking Date</td>
            <td width="216">
              <input name="booking1"  id="bookingdate1" type="date" min="<?php echo date('Y-m-d'); ?>" required  value="<?php if(isset($_POST['bookingdate1'])){ echo $_POST['bookingdate1']; }?>"  onchange="getdate()" /></td>
			  <input name="bookingdate" type="hidden" value=" <?php if(isset($_POST['bookingdate1'])){ echo $_POST['bookingdate1']; }?> " />
              <input name="name" type="hidden" value=" <?php $user->get_fullname($id);?> " />
              <input name="user" type="hidden" value=" <?php $user->get_email($id);?> " />
          </tr>
		  <tr>
            <td>Facility Type </td>
            <td>
              <select class="text_select" id="booking_price" name="booking_price">  
<?php
	  $sql="select * from facilities ";
	  $row=mysql_query($sql) or die (mysql_error($con));
	 
	  ?>
	  <?php
	  
	  while($data=mysql_fetch_array($row))
	  {
	  ?>
  
<option id="<?php echo $data[price]; ?>" value="<?php echo $data[name]; ?>">- <?php echo $data[name]; ?> -</option>   
<?php
	  }
	  
	  
	  ?> 

           </select></td>
          </tr>
		  <tr>
            <td>Booking Price</td>
            <td>
             &#163; <span id="a1" ></span>
           </td>
          </tr>
		   <tr>
            <td>No. of Players</td>
            <td>
              <input name="guest" type="text " size="10" required/></td>
          </tr>
		  <tr>
            <td>No. of Bookings </td>
            <td>
              <input name="booking_nos" id="booking_nos" type="text " size="10" onChange="gettotal1()" required/></td>
          </tr>
		  <tr>
            <td>Amount due on Arrival</td>
            <td>
             <input type="text" name="pricetopay" id="total1"  size="10px" readonly="" />
           </td>
            <td>
             <input type="hidden" name="bookingdate3" id="bookingdate3"  size="10px" readonly="" />
           </td>
          </tr>
		  
          <tr>
            <td colspan="2" align="center">
			<input type="submit" name="sub" value="Pay & Book" /></td>
            </tr>
			
       </table>
		</form>
		
		<script language="javascript" type="text/javascript">
function notEmpty(){

var e = document.getElementById("booking_price");
var strUser = e.options[e.selectedIndex].id;
 var strUser=document.getElementById('a1').innerHTML=strUser;




}
notEmpty()
    
    document.getElementById("booking_price").onchange = notEmpty;


   function gettotal1(){
      var gender1=document.getElementById('a1').innerHTML;
      var gender2=document.getElementById('booking_nos').value;
      var gender3=parseFloat(gender1)* parseFloat(gender2);
			
      document.getElementById('total1').value=gender3;
	
   }
   
   function getdate(){
   var entry1=document.getElementById('bookingdate1').value;
   
   document.getElementById('bookingdate3').value=entry1;
   
   }
   
			</script>
 
		
	</div>
</div>	</div>
</div>	</div>
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
