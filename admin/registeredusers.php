<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Welcome Admin</title></head>

<body>
 
	  <h1>Registered Users</h1>
	  <?php
	  include('../included/db_con.php');
	  $sql="select * from users ORDER BY name asc";
	  $row=mysql_query($sql) or die (mysql_error($con));
	 
	  ?><table border="1">
	  <tr>
	  <th>ID</th>
	  <th>Name</th>
	  <th>Username</th>
	  <th>Email</th>
	  </tr>
	  <?php
	  
	  while($data=mysql_fetch_array($row))
	  {
	  ?>
	  <tr>
	  <td><?php echo $data[id]; ?></td>
	  <td><?php echo $data[name]; ?></td>
	  <td><?php echo $data[username]; ?></td>
	  <td><?php echo $data[email]; ?></td>
	  

	  <td><a href="update.php?id=<?php echo $data[id]; ?>">edit</a></td>
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
