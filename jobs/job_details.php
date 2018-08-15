<?php include "../header.php"; ?>		
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

	$sql = "SELECT * FROM jobs WHERE id = ".$_GET['id'];

	$result = mysqli_query($conn,$sql);
	
	$row = mysqli_fetch_assoc($result);
	
	mysqli_close($conn);

	$job_type = array('1' => 'FULL TIME','0' => 'PART TIME');
?>
         <!-- Page Title -->
		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Job Details</h1>
					</div>
				</div>
			</div>
		</div>
        
        <div class="section">
	    	<div class="container">
				<div class="row">
					<div class="col-md-12">
						<?php if(is_array($row) && count($row) > 0) { ?>
							<!-- Job Description -->
							<div class="job-details-wrapper">
								<h3><?php echo $row['job_title'].', '.$row['company_name']; ?></h3>
								<p>
									<?php echo $row['job_description']; ?>
								</p>
								<h4>Min Aggregate Required: <?php echo $row['min_agg'].'%'; ?></h4>
								<h4>How to apply?</h4>
								<p>
									<td class="job-type">
										<?php if(isset($_SESSION['user_data']['id'])) { ?>
		    								<a class="btn" href="/tpo/jobs/apply.php?id=<?php echo $row['id']; ?>">Apply</a>
		    							<?php }else { ?>
		    								<a class="btn" href="/tpo/login/login.php?id=<?php echo $row['id']; ?>">Apply</a>	
		    							<?php } ?>										
									</td>
								</p>
							</div>
							<!-- End Job Description -->
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
<?php include "../footer.php"; ?>