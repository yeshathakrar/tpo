<?php include "../header.php"; ?>
		<!-- Page Title -->
		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Add a Job</h1>
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
							<form role="form" id="register_form" method="POST" action="/tpo/jobs/controller.php">
								<div class="form-group">
		        				 	<label for="register-username"><i class="icon-user"></i> <b>Job Title</b></label>
									<input class="form-control" id="job_title" name="job_title" type="text" placeholder="">
									<span style="color:#ff0000;" class="hide">Job Title is Required!</span>
								</div>
								<div class="form-group">
		        				 	<label for="register-username"><i class="icon-user"></i> <b>Job Location</b></label>
									<input class="form-control" id="job_location" name="job_location" type="text" placeholder="">
									<span style="color:#ff0000;" class="hide">Job Location is Required!</span>
								</div>								
								<div class="form-group">
		        				 	<label for="register-username"><i class="icon-user"></i> <b>Company Name</b></label>
									<input class="form-control" id="company_name" name="company_name" type="text" placeholder="">
									<span style="color:#ff0000;" class="hide">Company Name is Required!</span>
								</div>
								<div class="form-group">
		        				 	<label for="register-username"><i class="icon-user"></i> <b>Job Type</b></label>
									<select name="job_type" id="job_type" class="form-control">
										<option value="1">Full Time</option>
										<option value="0">Part Time</option>
									</select>
									<span style="color:#ff0000;" class="hide">Job Type is Required!</span>
								</div>
								<div class="form-group">
		        				 	<label for="register-password"><i class="icon-lock"></i> <b>Min Aggregate Required</b></label>
									<input class="form-control" id="min_agg" name="min_agg" type="text" placeholder="">
									<span style="color:#ff0000;" class="hide">Min Aggregate Required is Required!</span>
								</div>
								<div class="form-group">
		        				 	<label for="register-password2"><i class="icon-lock"></i> <b>Job Description</b></label>
									<textarea name="job_description" id="job_description" class="form-control"></textarea>
									<span style="color:#ff0000;" class="hide">Job Description is Required!</span>
								</div>
								<div class="form-group">
									<button type="submit" class="btn pull-right">Post a Job</button>
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
				    	$(this).next().addClass('hide');
				    	$(this).css('border','1px solid #ccc');	
				    });

				}
			});			
			
			if(errFlag == true) {
				return false;
			}else {
				this.submit();
			}
			
		});
	});
</script>