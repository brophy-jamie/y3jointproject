<!-- Jamie Brophy -->
<!-- Date: 01.03.21 -->

<?php
include "db.inc.php";//database connection

$sql = "SELECT PatientID, firstname, surname, DateOfBirth, Practitioner, MedCard, covidq1, covidq2, covidq3, covidq4, covidq5 FROM patientrecords";

if (!$result = mysqli_query($con, $sql))
{
	die( 'Error in querying the database' . mysqli_error($con));
}

echo "<br><select name = 'listbox' id = 'listbox' onclick = 'populate()'>";

while ($row = mysqli_fetch_array($result))
{
	$id = $row['PatientID'];
	$sname = $row['surname'];
	$fname = $row['firstname'];
	$dob = date_create ($row['DateOfBirth']);
	$dob = date_format ($dob, "Y-m-d");
	$practitioner = $row['Practitioner'];
	$medcard = $row['MedCard'];
	$covidq1 = $row['covidq1'];
	$covidq2 = $row['covidq2'];
	$covidq3 = $row['covidq3'];
	$covidq4 = $row['covidq4'];
	$covidq5 = $row['covidq5'];
	$allText = "$id,$sname,$fname,$dob,$practitioner,$medcard,$covidq1,$covidq2,$covidq3,$covidq4,$covidq5";
	echo "<option value = '$allText'>$fname $sname</option>";
}
echo "<br></select><br>";
mysqli_close($con);

?>