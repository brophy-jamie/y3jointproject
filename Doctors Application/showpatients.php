<!-- Jamie Brophy (C00123354)-->
<!-- Date: 09.02.21 -->

<html>
<body>

<?php
include 'db.inc.php';

$cipher = 'aes-128-ctr';
$key = 'thebestsecretkey';

$sql = "SELECT iv, firstname, surname, DateOfBirth, Practitioner, MedCard FROM patientrecords";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  echo '<table><tr><th>First Name</th><th>Surname</th><th>Date Of Birth</th><th>Practitioner</th><th>Medical Card</th></tr>';
  while($row = $result->fetch_assoc()) {
    $iv = hex2bin($row['iv']);
	$content = hex2bin($row['firstname']);
	$content1 = hex2bin($row['surname']);
	$content2 = hex2bin($row['DateOfBirth']);
	$content3 = hex2bin($row['Practitioner']);
	$content4 = hex2bin($row['MedCard']);
    $unencrypted_content = openssl_decrypt($content, $cipher, $key, OPENSSL_RAW_DATA, $iv);
	$unencrypted_content1 = openssl_decrypt($content1, $cipher, $key, OPENSSL_RAW_DATA, $iv);
	$unencrypted_content2 = openssl_decrypt($content2, $cipher, $key, OPENSSL_RAW_DATA, $iv);
	$unencrypted_content3 = openssl_decrypt($content3, $cipher, $key, OPENSSL_RAW_DATA, $iv);
	$unencrypted_content4 = openssl_decrypt($content4, $cipher, $key, OPENSSL_RAW_DATA, $iv);
    echo "<tr><td>$unencrypted_content</td><td>$unencrypted_content1</td><td>$unencrypted_content2</td><td>$unencrypted_content3</td><td>$unencrypted_content4</td></tr>";
  }
  echo '</table>';
} else {
  echo '<p>There are no records!</p>';
}
?>

<h3>Delete Everything</h3>

<form method="post">
  <button type="submit" name="delete-everything">Delete Everything!</button>
</form>
</body>
</html>