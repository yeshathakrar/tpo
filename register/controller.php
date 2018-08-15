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

//Fields Array
$user_role = 'S';
$fields = array(
				'first_name' 	=> '"'.$_POST['register_fname'].'"',
				'last_name' 	=> '"'.$_POST['register_lname'].'"',
				'email' 		=> '"'.$_POST['register_username'].'"',
				'pid' 			=> $_POST['register_pid'],
				'password' 		=> '"'.$_POST['register_password'].'"',
				'user_role'		=> '"'.$user_role.'"',
				'status'		=> 1,
				'created'		=> '"'.date('Y-m-d H:i:s').'"',
				);

foreach($fields as $col_name => $post_val) {
	$coulumns[] = $col_name;
	$postData[] = $post_val;
}

if(!mysqli_select_db($conn,'tpo')) {
	die('Could not select tpo');
}

$sql = "INSERT INTO users (".implode(',',$coulumns).") VALUES (".implode(',',$postData).")";

if(!mysqli_query($conn,$sql)) {
	die('Error: '.mysqli_error($conn));
}

mysqli_close($conn);

include "../FlashMessage.php";
session_start();
FlashMessage::add('User '.$_POST['register_fname'].' '.$_POST['register_lname'].' with PID: '.$_POST['register_pid'].' registered successfully!!');

header("Location: /tpo/register/register.php");
die();

?>