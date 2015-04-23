<?php
error_reporting(E_ALL ^ E_DEPRECATED);
?>
<?php
$host = "mysql.hostinger.co.uk";
$db_name = "u272711457_hpsm";
$username = "u272711457_hpsm";
$password = "Strathaven5";
  
try {
    $connection = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
}
  
// to handle connection error
catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
}
?>
<?php
define('DB_SERVER', 'mysql.hostinger.co.uk');
define('DB_USERNAME', 'u272711457_hpsm');
define('DB_PASSWORD', 'Strathaven5');
define('DB_DATABASE', 'u272711457_hpsm');
class DB_Class {
    function __construct() {
        $connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die('There has been an issue connecting to the database -> ' . mysql_error());
        mysql_select_db(DB_DATABASE, $connection) or die('Database error -> ' . mysql_error());
    }
}
?>