  <?php 
$server = "localhost";
$user = "root";
$pass = "";
$db = "store_management_system";

$conn = mysqli_connect($server, $user, $pass, $db);

if(!$conn)
{
    die("Connection failed!" . mysqli_connect_error());
}

?>
