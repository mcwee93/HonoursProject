<?php
include_once '../include/functions.php';

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Welcome Admin</title></head>


<body>
<?php 
if($_POST){
    try{
        $query = "update users
                    set id  = :id, name = :name, username = :username, email = :email, password  = :password
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
            <form method="POST" action="#"  id="register_form" name="reg">

                  <h1>
                <?php echo $username;  ?>'s profile</h1>
                  <table>
				   <tr>
                      <td>id</td>
                    </tr>
                <tr>
                      <td><input type='text' name='name' value='<?php echo $id;  ?>' /></td>
                    </tr>
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
                      <td><input type='hidden' name='id' value='<?php echo $id ?>' />
                        <input type='submit' value='Edit' /></td>
                    </tr>
              </table>
                 
                  <br>
                  <br>
                  <div><a href="registeredusers.php">Back</a></div>
                </form>

              <br>
          
</body>
</html>