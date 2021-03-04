<!-- Jamie Brophy (C00123354)-->
<!-- Date: 09.02.21 -->

<?php
include 'db.inc.php';
$cipher = 'aes-128-ctr';
$key = 'thebestsecretkey';
date_default_timezone_set("UTC");
echo "The details entered are: <br>";

echo "First Name is :" . $_POST['firstname'] . "<br>";
echo "Surname is :" . $_POST['surname'] . "<br>";

$date=date_create($_POST['date']);

echo "Date of Birth is :" . date_format($date,"d/m/Y") . "<br>";
echo "Practitioner is :" . $_POST['Practitioner'] . "<br>";
echo "Medical Card? :" . $_POST['MedCard'] . "<br>";
echo "Covid Q1 :" . $_POST['covidq1'] . "<br>";
echo "Covid Q2 :" . $_POST['covidq2'] . "<br>";
echo "Covid Q3 :" . $_POST['covidq3'] . "<br>";
echo "Covid Q4 :" . $_POST['covidq4'] . "<br>";
echo "Covid Q5 :" . $_POST['covidq5'] . "<br>";

if ($_POST['covidq1'] == 'yes')
{
echo "<b>******IMPORTANT NOTICE**********</b>","<br>";
echo "<b>******PLEASE DO NOT ENTER THE BUILDING**********</b>","<br>";
echo "<b>AS YOU HAVE SELECTED YES FOR ONE OF THE OPTIONS PLEASE ENSURE TO IMMEDIATELY SELF-ISOLATE</b>","<br>";
}
		
	$iv = random_bytes(16);
	$escaped_content = $con -> real_escape_string('$_POST[firstname]');
	$escaped_content1 = $con -> real_escape_string('$_POST[surname]');
	$escaped_content2 = $con -> real_escape_string('$_POST[date]');
	$escaped_content3 = $con -> real_escape_string('$_POST[Practitioner]');
	$escaped_content4 = $con -> real_escape_string('$_POST[MedCard]');
	$escaped_content5 = $con -> real_escape_string('$_POST[covidq1]');
	$escaped_content6 = $con -> real_escape_string('$_POST[covidq2]');
	$escaped_content7 = $con -> real_escape_string('$_POST[covidq3]');
	$escaped_content8 = $con -> real_escape_string('$_POST[covidq4]');
	$escaped_content9 = $con -> real_escape_string('$_POST[covidq5]');
	$encrypted_content = openssl_encrypt($escaped_content, $cipher, $key, OPENSSL_RAW_DATA, $iv);
	$encrypted_content1 = openssl_encrypt($escaped_content1, $cipher, $key, OPENSSL_RAW_DATA, $iv);
	$encrypted_content2 = openssl_encrypt($escaped_content2, $cipher, $key, OPENSSL_RAW_DATA, $iv);
	$encrypted_content3 = openssl_encrypt($escaped_content3, $cipher, $key, OPENSSL_RAW_DATA, $iv);
	$encrypted_content4 = openssl_encrypt($escaped_content4, $cipher, $key, OPENSSL_RAW_DATA, $iv);
	$encrypted_content5 = openssl_encrypt($escaped_content5, $cipher, $key, OPENSSL_RAW_DATA, $iv);
	$encrypted_content6 = openssl_encrypt($escaped_content6, $cipher, $key, OPENSSL_RAW_DATA, $iv);
	$encrypted_content7 = openssl_encrypt($escaped_content7, $cipher, $key, OPENSSL_RAW_DATA, $iv);
	$encrypted_content8 = openssl_encrypt($escaped_content8, $cipher, $key, OPENSSL_RAW_DATA, $iv);
	$encrypted_content9 = openssl_encrypt($escaped_content9, $cipher, $key, OPENSSL_RAW_DATA, $iv);
	$content_hex = bin2hex($encrypted_content);
	$content_hex1 = bin2hex($encrypted_content1);
	$content_hex2 = bin2hex($encrypted_content2);
	$content_hex3 = bin2hex($encrypted_content3);
	$content_hex4 = bin2hex($encrypted_content4);
	$content_hex5 = bin2hex($encrypted_content5);
	$content_hex6 = bin2hex($encrypted_content6);
	$content_hex7 = bin2hex($encrypted_content7);
	$content_hex8 = bin2hex($encrypted_content8);
	$content_hex9 = bin2hex($encrypted_content9);
	$iv_hex = bin2hex($iv);
	$sql = "INSERT INTO patientrecords (firstName,surname,DateOfBirth,Practitioner,MedCard,covidq1,covidq2,covidq3,covidq4,covidq5,iv) VALUES ('$content_hex', '$content_hex1', '$content_hex2', '$content_hex3', '$content_hex4', '$content_hex5', '$content_hex6', '$content_hex7', '$content_hex8', '$content_hex9', '$iv_hex')";

	if ($con->query($sql) === TRUE) {
    echo "<br>Patient " . $_POST['firstname'] . " " . $_POST['surname'] . " has been added to the system.";
  } else {
    die('Error creating record: ' . $con->error);
  }
//}

mysqli_close($con);

?>
<form action = "http://localhost/Doctors Application/home.html"  method = "POST">
<br>
	<input type = "submit" value = "Return to Home Page"/>
	
</form>
