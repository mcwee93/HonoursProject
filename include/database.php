<?php
$host = "localhost";
$db_name = "honours";
$username = "root";
$password = "";
  
try {
    $connection = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
}
  
// to handle connection error
catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
}
?>
<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'honours');
class DB_Class {
    function __construct() {
        $connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die('There has been an issue connecting to the database -> ' . mysql_error());
        mysql_select_db(DB_DATABASE, $connection) or die('Database error -> ' . mysql_error());
    }
}
?>