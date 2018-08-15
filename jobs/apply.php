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
						<h1>Apply for Job - <?php echo $row['job_title'].', '.$row['company_name']; ?></h1>
					</div>
				</div>
			</div>
		</div>
        
        <div class="section">
	    	<div class="container">
				<div class="row">					
					<div class="col-sm-12">
						<?php 
							include "../FlashMessage.php";
							$msg = FlashMessage::render();
							if($msg != '') {
						?>
						<div class="label alert-success">
							<?php echo $msg; ?>	
						</div>
						<?php } ?>
						<div class="basic-login">
							<form role="form" id="register_form" method="POST" action="/tpo/jobs/applyController.php">
								<div class="form-group">
		        				 	<label for="register-username" style="width:230px;"><i class="icon-user"></i> <b>Name</b></label>
		        				 	<?php echo $_SESSION['user_data']['first_name'].' '.$_SESSION['user_data']['last_name']; ?>
								</div>
								<div class="form-group">
		        				 	<label for="register-username" style="width:230px;"><i class="icon-user"></i> <b>Job Title</b></label>
		        				 	<?php echo $row['job_title']; ?>
								</div>
								<div class="form-group">
		        				 	<label for="register-username" style="width:230px;"><i class="icon-user"></i> <b>Job Location</b></label>
									<?php echo $row['job_location']; ?>
								</div>								
								<div class="form-group">
		        				 	<label for="register-username" style="width:230px;"><i class="icon-user"></i> <b>Company Name</b></label>
									<?php echo $row['company_name']; ?>
								</div>
								<div class="form-group">
		        				 	<label for="register-username" style="width:230px;"><i class="icon-user"></i> <b>Job Type</b></label>
									<?php echo $job_type[$row['job_type']]; ?>
								</div>
								<div class="form-group">
		        				 	<label for="register-password" style="width:230px;"><i class="icon-lock"></i> <b>Your Current Agg in (%)</b></label>
									<input class="form-control" id="min_agg" name="min_agg" type="text" placeholder="">
									<span style="color:#ff0000;" class="hide">Your Current Agg is Required!</span>
								</div>
								<div class="form-group">
		        				 	<label for="register-password2" style="width:230px;"><i class="icon-lock"></i> <b>Job Description</b></label>
									<?php echo $row['job_description']; ?>
								</div>
								<input type="hidden" name="users_id" value="<?php echo $_SESSION['user_data']['id']; ?>" />
								<input type="hidden" name="jobs_id" value="<?php echo $row['id']; ?>" />
								<input type="hidden" name="job_title" value="<?php echo $row['job_title']; ?>" />
								<div class="form-group">
									<button type="submit" class="btn pull-right">Apply</button>
									<div class="clearfix"></div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php include "../footer.php"; ?>
<script type="text/javascript">
	$(document).ready(function(){		
		var req_agg = '<?php echo $row["min_agg"]; ?>'
		$('#register_form').on('submit', function(e) {
			var errFlag = false;
			$('#register_form *').filter(':input').each(function(){
				if($(this).attr('type') != 'submit') {			

				    if($(this).val() == '') {
				    	$(this).next().removeClass('hide');
				    	$(this).css('border','1px solid #ff0000');
				    	errFlag = true;
				    }

				    $(this).on('focus',function(){
				    	if($(this).attr('id') == 'min_agg') {
				    		$(this).next().html('Your Current Agg is Required!');
				    	} 
				    	$(this).next().addClass('hide');
				    	$(this).css('border','1px solid #ccc');	
				    });

				}
			});			
			
			if($('#min_agg').val() != '' && $('#min_agg').val() < req_agg) {
				$('#min_agg').next().html('You are not eligible, as your aggregate is too low as per what is required.');
				$('#min_agg').next().removeClass('hide');
		    	$('#min_agg').css('border','1px solid #ff0000');
		    	errFlag = true;
			}

			if(errFlag == true) {
				return false;
			}else {
				this.submit();
			}
			
		});
	});
</script>