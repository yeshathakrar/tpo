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

$fields = array(
				'job_title' 			=> '"'.$_POST['job_title'].'"',
				'job_location' 			=> '"'.$_POST['job_location'].'"',
				'company_name' 			=> '"'.$_POST['company_name'].'"',
				'job_type' 				=> $_POST['job_type'],
				'min_agg' 				=> '"'.$_POST['min_agg'].'"',
				'job_description'		=> '"'.$_POST['job_description'].'"',
				'status'				=> 1,
				'created'				=> '"'.date('Y-m-d H:i:s').'"',
				);

foreach($fields as $col_name => $post_val) {
	$columns[] = $col_name;
	$postData[] = $post_val;
}

if(!mysqli_select_db($conn,'tpo')) {
	die('Could not select tpo');
}

$sql = "INSERT INTO jobs (".implode(',',$columns).") VALUES (".implode(',',$postData).")";

$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

mysqli_close($conn);


include "../FlashMessage.php";
session_start();
FlashMessage::add('Job with title: '.$_POST['job_title'].' is posted successfully!!');

header("Location: /tpo/jobs/addjobs.php");
die();

?>