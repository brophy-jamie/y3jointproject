<!-- Jamie Brophy (C00123354)-->
<!-- Date: 12.02.21 -->

<html>
<head>

</head>
<body>
<?php include 'db.inc.php';
//loginScreen.php
session_start();
if (isset($_POST['loginid']) && isset($_POST['password']))
{

	$attempts = $_SESSION['attempts'];
	
	$sql = "INSERT INTO patientlogin (loginid, password) VALUES ('$_POST[loginid]', '$_POST[password]')";
	
	$password = '$_POST[password]';
	$hash = password_hash($password, PASSWORD_DEFAULT);
	$info = password_get_info($hash);
	$hashed_password = bin2hex($hash);
	$sql1 = "UPDATE patientlogin SET password = '$hashed_password' WHERE loginid = '$_POST[loginid]'";
	
	if ($con->query($sql) === TRUE) {
	echo " 
			<h2>Login Successful!</h2>
			<h2>Welcome to the Patients Database</h2>
			<h3>Proceed to the Patient Entry Screen</h3>
			
			<input type = 'button' value = 'Patient Entry Page' onclick = 'window.location = \"insertdetails.html\"'>";
			
			}
	else
	{
		if (mysqli_affected_rows($con) == 0)
		{
			$attempts++;
			
			if ($attempts <=3)
			{
				$_SESSION['attempts'] = $attempts;
				buildPage($attempts);
				
				echo "<div class='errorstyle'>No record found with this login name and password combination - Please try again.</div>";
			}
			else
			{
				echo "<div class='errorstyle'>Sorry - You have used all 3 attempts<br> Shutting down...</div>";
			}
		}
		else
		{
			echo "Error in query ". mysqli_error($con);
		}
	}
	
	if ($con->query($sql1) === TRUE) {
	echo " ";
			}
	else
	{
		if (mysqli_affected_rows($con) == 0)
		{
			$attempts++;
			
			if ($attempts <=3)
			{
				$_SESSION['attempts'] = $attempts;
				buildPage($attempts);
				
				echo "<div class='errorstyle'>No record found with this login name and password combination - Please try again.</div>";
			}
			else
			{
				echo "<div class='errorstyle'>Sorry - You have used all 3 attempts<br> Shutting down...</div>";
			}
		}
		else
		{
			echo "Error in query ". mysqli_error($con);
		}
	}
	
	
}
else
{
	//building page for initial display
	$attempts = 1;	//Screen will be displayed for first attempts
	$_SESSION['attempts'] = $attempts; //set session variables so that the number of attempts can be counted
	buildPage($attempts); //parameter passed so that a heading can display the number of attempts
};

function buildPage($att)
{
	echo "
		<form action = 'loginscreen.php' method = 'post'>
		<h1>Patient Database</h1>
		<label for= 'loginid'>Login ID</label>
		<input type = 'text' name = 'loginid' id = 'loginid' autocomplete = 'off'/><br><br>
		<label for='password'>Password</label>
		<input type = 'password' name = 'password' id = 'password'><br><br>
		<input type = 'submit' value = 'Submit'>
		</form>";
}

mysqli_close($con);
?>
</div>
</body>
</html>