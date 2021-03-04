<!db.inc.php>
<!-- Jamie Brophy -->
<!-- Date: 09.02.21 -->


<?php	
$hostname = 'localhost'; //name of host or ip address
$username = 'root';			//MySQL username
$password = '';			//MySQL password
$dbname = "doctorsdb";			//database name

$con = new mysqli($hostname, $username, $password, $dbname);

$cipher = 'AES-128-CBC';
$key = 'thebestsecretkey';

if (!$con)
{
	die ("Failed to connect to MySQL: " .mysqli_connect_error());
}
?>
