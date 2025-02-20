<?php
$con = new mysqli("localhost", "root", "", "digitalnbnew_db");


if (isset($_POST['username'])){
        // removes backslashes
	$username = $_REQUEST['username'];
	$password = $_REQUEST['password'];
	//Checking is user existing in the database or not
        $query = "SELECT * FROM `admin_tab` WHERE uname='$username' and upass='$password'";
	$result = mysqli_query($con,$query) or die(mysqli_error());
	$rows = mysqli_num_rows($result);
	$record1 = mysqli_fetch_array($result);

    if($rows==1){
	if ($record1['utype'] == 1)
	{
		
	    header("Location: adminpanel/index.php");

	}

	else if($record1['utype'] == 2)
	{
		header("Location: coordinatorpanel/index.php?user=$username");
	}

   } else {
	echo "<div class='form'>
<h3>Username/password is incorrect.</h3>
<br/>Click here to <a href='index.php'>Login</a></div>";
	}
}
?>