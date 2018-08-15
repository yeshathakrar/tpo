<?php include "header.php"; ?>

		<div class="section section-white">
	    	<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h3>We are leading company</h3>
						<p>
							Donec elementum mi vitae enim fermentum lobortis. In hac habitasse platea dictumst. Ut pellentesque, orci sed mattis consequat, libero ante lacinia arcu, ac porta lacus urna in lorem. Praesent consectetur tristique augue, eget elementum diam suscipit id.
						</p>
						<h3>Wide range of services</h3>
						<p>
							Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam condimentum laoreet sagittis. Duis quis ullamcorper leo. Suspendisse potenti.
						</p>
					</div>
					<div class="col-md-6">
						<div class="cap-imgs">
              <div class="row">
                <div class="col-sm-5">
                  <!-- Product -->
                  <div class="shop-item">
                    <!-- Product Image -->
                    <div class="image">
                      <i class="fa fa-book fa-5x" style="color:#4f8db3;"></i>
                    </div>
                    <!-- Product Title -->
                    <div class="title">
                      <h3><a href="page-product-details.html">Study Hard.</a></h3>
                    </div>
                  </div>
                  <!-- End Product -->
                </div>
                <div class="col-sm-5">
                  <!-- Product -->
                  <div class="shop-item">
                    <!-- Product Image -->
                    <div class="image">
                      <i class="fa fa-briefcase fa-5x" style="color:#4f8db3;"></i>
                    </div>
                    <!-- Product Title -->
                    <div class="title">
                      <h3><a href="page-product-details.html">Work at better places.</a></h3>
                    </div>
                  </div>
                  <!-- End Product -->
                </div>
              </div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="section">
	    	<div class="container">
	    		<h2>How This Works</h2>
          <div class="row">
            <div class="col-md-4 col-sm-6">
              <div class="service-wrapper">
                <i class="fa fa-pencil fa-5x" style="color:#76777c;"></i>
                <h3>Step 1: Job is posted</h3>
                <p>Keep visiting here, and look if any new job is posted.</p>
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
              <div class="service-wrapper">
                <i class="fa fa-eye fa-5x" style="color:#76777c;"></i>
                <h3>Step 2: View Job Details</h3>
                <p>View the detailed description about the jobs posted.</p>
              </div>
            </div>
            <div class="col-md-4 col-sm-6">
              <div class="service-wrapper">
                <i class="fa fa-check-circle-o fa-5x" style="color:#76777c;"></i>
                <h3>Step 3: Register</h3>
                <p>Register for the jobs, you are eligible for and start preparing!!</p>
              </div>
            </div>
            
          </div>
        </div>
		</div>

		<!-- Recent Jobs -->
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

			$sql = "SELECT * FROM jobs WHERE status = 1 ORDER BY created DESC LIMIT 5";

			$result = mysqli_query($conn,$sql);
			$jobs = array();
			while ($row = mysqli_fetch_assoc($result)) {
				$jobs[] = $row;
			}
			
			mysqli_close($conn);

			$job_type = array('1' => 'FULL TIME','0' => 'PART TIME');
		?>
	    <div class="section">
	    	<div class="container">
	    		<h2>Recent Jobs Posted</h2>
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
	    <!-- End Recent Jobs -->
<?php include "footer.php"; ?>