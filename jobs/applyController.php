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
				'users_id' 			=> '"'.$_POST['users_id'].'"',
				'jobs_id' 			=> '"'.$_POST['jobs_id'].'"',
				'created'			=> '"'.date('Y-m-d H:i:s').'"',
				);

foreach($fields as $col_name => $post_val) {
	$columns[] = $col_name;
	$postData[] = $post_val;
}

if(!mysqli_select_db($conn,'tpo')) {
	die('Could not select tpo');
}

$sql = "INSERT INTO user_jobs_map (".implode(',',$columns).") VALUES (".implode(',',$postData).")";

$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

mysqli_close($conn);


include "../FlashMessage.php";
session_start();
FlashMessage::add('Congratulations, you have successfully applied for Job with title: '.$_POST['job_title'].'. Best of Luck!!');

header("Location: /tpo/jobs/apply.php?id=".$_POST['jobs_id']);
die();

?>