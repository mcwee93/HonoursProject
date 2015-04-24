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
        $query = "update facilities
                    set id  = :id, name = :name, description = :description, lrg_description = :lrg_description, staffMember  = :staffMember, price  = :price
                    where id = :id";
        $honours = $connection->prepare($query);

        $honours->bindParam(':name', $_POST['name']);
        $honours->bindParam(':description', $_POST['description']);
        $honours->bindParam(':lrg_description', $_POST['lrg_description']);
        $honours->bindParam(':staffMember', $_POST['staffMember']);
        $honours->bindParam(':price', $_POST['price']);
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
  
    $query = "select id, name, description, lrg_description, staffMember, price from facilities where id = ? limit 0,1";
    $honours = $connection->prepare( $query );
    $honours->bindParam(1, $_REQUEST['id']);
    $honours->execute();
 
    $row = $honours->fetch(PDO::FETCH_ASSOC);
    $id = $row['id'];
    $name = $row['name'];
    $description = $row['description'];
    $lrg_description = $row['lrg_description'];
    $staffMember = $row['staffMember'];
    $price= $row['price'];
  
}catch(PDOException $exception){ 
    echo "Error: " . $exception->getMessage();
}
$action = isset($_GET['action']) ? $_GET['action'] : "";
if($action=='deleted'){
    echo "<div>Record was deleted.</div>";
}
?>
            <form method="POST" action="#"  id="register_form" name="reg">

                 
                  <table>
				   <tr>
                      <td>id</td>
                    </tr>
                <tr>
                      <td><input type='text' name='id' value='<?php echo $id;  ?>' /></td>
                    </tr>
                <tr>
                      <td>name</td>
                    </tr>
                <tr>
                      <td><input type='text' name='name' value='<?php echo $name;  ?>' /></td>
                    </tr>
                <tr>
                      <td>description</td>
                    </tr>
                <tr>
                      <td><textarea name='description' value='' /><?php echo $description;  ?></textarea></td>
                    </tr>
                <tr>
                      <td>large description</td>
                    </tr>
                <tr>
                      <td><textarea name='lrg_description'  value='' /><?php echo $lrg_description;  ?></textarea></td>
                    </tr>
                <tr>
                      <td>staff member</td>
                    </tr>
                <tr>
                      <td><input type='text' name='staffMember'  value='<?php echo $staffMember;  ?>' /></td>
                        </td>
                    </tr>
				<tr>
				<td>staff member</td>
				</tr>
				<tr>
                      <td><input type='text' name='price'  value='<?php echo $price;  ?>' /></td>
                        </td>
				</tr>
						<tr>
                        <td><input type='submit' value='Edit' /></td>
                    </tr>
              </table>
                 
                  <br>
                  <br>
                  <div><a href="facilities.php">Back</a></div>
                </form>

              <br>
          
</body>
</html>