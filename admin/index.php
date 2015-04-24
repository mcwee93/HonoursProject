<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Welcome Admin</title></head>
<body>
	
	<?php 
	include('../included/db_con.php');
	session_start();
		if (isset($_POST['username'],$_POST['password']))
			   {
                $username=$_POST['username'];
                $password=$_POST['password'];
  
                   if (empty($username) || empty($password))
                   {
                      $error = 'All fields are required! Please fill out any missing areas';
                    }
                     
					 else {  
					 $login="select * from admin where user_name='".$username."' and user_password ='".$password."'";
					 $result=mysql_query($login);
					 print_r($result);
				
					 
					if(mysql_fetch_array($result)){
				 $_SESSION['logged_in']='true';
				 $_SESSION['username']=$username;
					 header('Location:adminpanel.php');
					 exit();
					 } else {
					 $error='Incorrect details !!';
					 }
					       }
		}
  
  ?>
	<form action="index.php" method="POST">
	<h2 align="center" id="h"><u><i>Welcome Admin</i></u></h2>
        <table align="center">
		<tr> <?php  if (isset($error)) {?>
           <small style="color:#aa0000;"><?php echo $error; ?>
            <br /> <br />
           <?php } ?> </tr>
          <tr>
            <td width="113">Email:</td>
            <td width="215">
              <input name="username" type="text"  size="40" /></td>
          </tr>
          <tr>
            <td>Password:</td>
            <td>
              <input name="password" type="password"  size="40" /></td>
          </tr>
          <tr>
            <td colspan="2" align="center">
			<input type="submit" name="sub" value="Login" /></td>
            </tr>
			
       </table>
		</form>
	
</body>
</html>