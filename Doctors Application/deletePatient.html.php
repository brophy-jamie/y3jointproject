<!delete html>
<!-- Jamie Brophy -->
<!-- Date: 01.03.21 -->

<?php session_start();

?>

<html>

<head>
<head>
</head>
</head>
<body>

<?php

?>
<h1>Delete Patient</h1>
<h4>Please select a patient and then click the delete button</h4>

<?php include 'listbox.php'; 

?>
<script>

function populate()
{
	var sel = document.getElementById("listbox");
	var result;
	result = sel.options[sel.selectedIndex].value;
	var personDetails = result.split(',');
	document.getElementById("delid").value = personDetails[0];
	document.getElementById("delfirstname").value = personDetails[1];
	document.getElementById("dellastname").value = personDetails[2];
	document.getElementById("delDOB").value = personDetails[3];
	document.getElementById("delpractitioner").value = personDetails[4];
	document.getElementById("delmedicalcard").value = personDetails[5];
	document.getElementById("delcovidq1").value = personDetails[6];
	document.getElementById("delcovidq2").value = personDetails[7];
	document.getElementById("delcovidq3").value = personDetails[8];
	document.getElementById("delcovidq4").value = personDetails[9];
	document.getElementById("delcovidq5").value = personDetails[10];
}

function confirmCheck()
{
	var response;
	response = confirm('Are you sure you want to delete this patient?');
	if(response)
	{
		document.getElementById("delid").disabled = false;
		document.getElementById("delfirstname").diabled = false;
		document.getElementById("dellastname").disabled = false;
		document.getElementById("delDOB").disabled = false;
		document.getElementById("delpractitioner").disabled = false;
		document.getElementById("delmedicalcard").disabled = false;
		document.getElementById("delcovidq1").disabled = false;
		document.getElementById("delcovidq2").disabled = false;
		document.getElementById("delcovidq3").disabled = false;
		document.getElementById("delcovidq4").disabled = false;
		document.getElementById("delcovidq5").disabled = false;
		return true;
	}
	else
	{
		populate();
		return false;
	}
}
</script>

<p id = "display"></p>

<form name = "deleteForm" action = "deletePatient.php" onsubmit = "return confirmCheck()" method = "post">
<div class = "box1">
<p><label for "delid">Patient ID</label>
<input type = "text" name = "delid" id = "delid" disabled>
</p>

<p><label for "dellastname">First Name</label>
<input type = "text" name = "dellastname" id = "dellastname" disabled>
</p>

<p><label for "delfirstname">Surname</label>
<input type = "text" name = "delfirstname" id = "delfirstname" disabled>
</p>

<p><label for "deladdress">Date Of Birth</label>
<input type = "text" name = "delDOB" id = "delDOB" title = "format is dd-mm-yyyy" disabled>
</p>

<p><label for "deljob">Practitioner</label>
<input type = "text" name = "delpractitioner" id = "delpractitioner" disabled>
</p>

<p><label for "dellogin">Medical Card</label>
<input type = "text" name = "delmedicalcard" id = "delmedicalcard" disabled>
</p>

<p><label for "deljob">Covid Q1</label>
<input type = "text" name = "delcovidq1" id = "delcovidq1" disabled>
</p>

<p><label for "deljob">Covid Q2</label>
<input type = "text" name = "delcovidq2" id = "delcovidq2" disabled>
</p>

<p><label for "deljob">Covid Q3</label>
<input type = "text" name = "delcovidq3" id = "delcovidq3" disabled>
</p>

<p><label for "deljob">Covid Q4</label>
<input type = "text" name = "delcovidq4" id = "delcovidq4" disabled>
</p>

<p><label for "deljob">Covid Q5</label>
<input type = "text" name = "delcovidq5" id = "delcovidq5" disabled>
</p>

<br><br>
<input type = "submit" value = "Delete the record">

<?php
	if (ISSET($_SESSION["PatientID"])) {echo "<h1 class='myMessage'>Record Deleted for ".$_SESSION["firstname"]." ".$_SESSION["surname"]. "</h1>" ;}
	session_destroy();

?>
</div>
</form>
</body>
</html>
