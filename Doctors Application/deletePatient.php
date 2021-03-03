<?php	session_start();
include 'db.inc.php';

//to delete the record


$result = $con->query($sql);

$id = $row['firstname'];
$iv = hex2bin($row['firstname']);
$content = hex2bin($row['firstname']);
$unencrypted_content = openssl_decrypt($content, $cipher, $key, OPENSSL_RAW_DATA, $iv);
	
echo "<tr><td>$id</td><td>$unencrypted_content</td></tr>";


//Set session variables

$unencrypted_content = $_POST["delfirstname"];
$sql = "delete from patientrecords where firstname = '$_POST[delfirstname]'";

if (! mysqli_query($con,$sql))
{
	echo "Error ".mysqli_error($con);
}
mysqli_close($con);
?>

<script>

window.location = "deletePatient.html.php"

</script>