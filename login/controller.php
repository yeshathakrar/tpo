<?php 

//DB Connection
$servername 	= "localhost";
$username 		= "root";
$password 		= "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if(!mysqli_select_db($conn,'tpo')) {
	die('Could not select tpo');
}

$sql = "SELECT * FROM users WHERE email = '".$_POST['login_username']."' AND password = '".$_POST['login_password']."' AND status = 1";

$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

mysqli_close($conn);


session_start();
$_SESSION['user_data'] = $row;

if(isset($_POST['jobs_id'])) {
	header("Location: /tpo/jobs/job_details.php?id=".$_POST['jobs_id']);	
}else {
	header("Location: /tpo/index.php");
}
die();

?>