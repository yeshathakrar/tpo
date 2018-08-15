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

	$sql = "SELECT * FROM jobs WHERE status = 1 ORDER BY created DESC";

	$result = mysqli_query($conn,$sql);
	$jobs = array();
	while ($row = mysqli_fetch_assoc($result)) {
		$jobs[] = $row;
	}
	
	mysqli_close($conn);

	$job_type = array('1' => 'FULL TIME','0' => 'PART TIME');
?>
        <!-- Page Title -->
		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Jobs List</h1>
					</div>
				</div>
			</div>
		</div>
        
        <div class="section">
	    	<div class="container">
	    		<div class="row">
	    			<!-- Open Vacancies List -->	    			
	    			<div class="col-md-12">
	    				<?php if(is_array($jobs) && count($jobs) > 0) { ?>
	    					<table class="jobs-list">
	    						<tr>
		    						<th>Position</th>
		    						<th>Company</th>
		    						<th>Location</th>
		    						<th>Type</th>
		    						<th>Action</th>
		    					</tr>
		    					<?php foreach($jobs as $val) { ?>
		    						<tr>
			    						<!-- Position -->
			    						<td class="job-position">
			    							<a href="/tpo/jobs/job_details.php?id=<?php echo $val['id']; ?>"><?php echo $val['job_title']; ?></a>
			    						</td>
			    						<td class="job-location">
			    							<?php echo $val['company_name']; ?>
			    						</td>
			    						<!-- Location -->
			    						<td class="job-location">
			    							<div class="job-country"><?php echo $val['job_location']; ?></div>
			    						</td>
			    						<!-- Job Type -->
			    						<td class="job-type hidden-phone"><?php echo $job_type[$val['job_type']]; ?></td>
			    						<td class="job-type">
			    							<?php if(isset($_SESSION['user_data']['id'])) { ?>
			    								<a class="btn" href="/tpo/jobs/apply.php?id=<?php echo $val['id']; ?>">Apply</a>	
			    							<?php }else { ?>
			    								<a class="btn" href="/tpo/login/login.php?id=<?php echo $val['id']; ?>">Apply</a>	
			    							<?php } ?>
			    						</td>
			    					</tr>
		    					<?php } ?>	
	    					</table>
	    				<?php } ?>
	    			</div>
	    			<!-- End Open Vacancies List -->
	    			
	    		</div>
			</div>
		</div>
<?php include "../footer.php"; ?>