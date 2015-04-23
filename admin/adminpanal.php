<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title></head>

<body>
 
	  <h1>welcome admin</h1>
	  Choose option from Below to take action!!!!
	  Create new Booking click <a href="../booking.php"> Here</a>
	  <?php
	  include('../included/db_con.php');
	  $sql="select * from bookingdetail";
	  $row=mysql_query($sql) or die (mysql_error($con));
	 
	  ?><table border="1">
	  <tr>
	  <th>ID</th>
	  <th>Email</th>
	  <th>Username</th>
	  <th>Booking Date</th>
	  <th>Facility</th>
	  <th>Spaces Booked</th>
	  <th>Price</th>
	  </tr>
	  <?php
	  
	  while($data=mysql_fetch_array($row))
	  {
	  ?>
	  <tr>
	  <td><?php echo $data[id]; ?></td>
	  <td><?php echo $data[username]; ?></td>
	  <td><?php echo $data[name]; ?></td>
	  <td><?php echo $data[booking_date]; ?></td>
	  <td><?php echo $data[booking_price]; ?></td>
	  <td><?php echo $data[no_of_bookings]; ?></td>
	  <td><?php echo $data[amount]; ?></td>
	  <td><a href="delete.php?id=<?php echo $data[id]; ?>">delete</a></td>
	  </tr>
	  <?php
	  }
	  
	  
	  ?>
	  </table>
	  
	  </div>
</body>
</html>
