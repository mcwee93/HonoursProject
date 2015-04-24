<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Welcome Admin</title></head>

<body>
 
	  <h1>Facilities</h1>
	  <?php
	  include('../included/db_con.php');
	  $sql="select * from facilities WHERE id > 1";
	  $row=mysql_query($sql) or die (mysql_error($con));
	 
	  ?><table border="1">
	  <tr>
	  <th>ID</th>
	  <th>Facility</th>
	  <th>Staff Member</th>
	  <th>Price</th>
	  </tr>
	  <?php
	  
	  while($data=mysql_fetch_array($row))
	  {
	  ?>
	  <tr>
	  <td><?php echo $data[id]; ?></td>
	  <td><?php echo $data[name]; ?></td>
	  <td><?php echo $data[staffMember]; ?></td>
	  <td><?php echo $data[price]; ?></td>
	  

	  <td><a href="updatefacilities.php?id=<?php echo $data[id]; ?>">edit</a></td>
	  </tr>
	  <?php
	  }
	  
	  
	  ?>
	  </table>
	  <br>
                  <br>
                  <div><a href="adminpanel.php">Back</a></div>
	  
	  </div>
</body>
</html>
