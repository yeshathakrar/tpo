<?php include "../header.php"; ?>		
		<!-- Page Title -->
		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Register</h1>
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
							<form role="form" id="register_form" method="POST" action="/tpo/register/controller.php">
								<div class="form-group">
		        				 	<label for="register-username"><i class="icon-user"></i> <b>First Name</b></label>
									<input class="form-control" id="register_fname" name="register_fname" type="text" placeholder="">
									<span style="color:#ff0000;" class="hide">First Name is Required!</span>
								</div>
								<div class="form-group">
		        				 	<label for="register-username"><i class="icon-user"></i> <b>Last Name</b></label>
									<input class="form-control" id="register_lname" name="register_lname" type="text" placeholder="">
									<span style="color:#ff0000;" class="hide">Last Name is Required!</span>
								</div>								
								<div class="form-group">
		        				 	<label for="register-username"><i class="icon-user"></i> <b>Email</b></label>
									<input class="form-control" id="register_username" name="register_username" type="text" placeholder="">
									<span style="color:#ff0000;" class="hide">Email is Required!</span>
								</div>
								<div class="form-group">
		        				 	<label for="register-username"><i class="icon-user"></i> <b>PID</b></label>
									<input class="form-control" id="register_pid" name="register_pid" type="text" placeholder="">
									<span style="color:#ff0000;" class="hide">PID is Required!</span>
								</div>
								<div class="form-group">
		        				 	<label for="register-password"><i class="icon-lock"></i> <b>Password</b></label>
									<input class="form-control" id="register_password" name="register_password" type="password" placeholder="">
									<span style="color:#ff0000;" class="hide">Password is Required!</span>
								</div>
								<div class="form-group">
		        				 	<label for="register-password2"><i class="icon-lock"></i> <b>Re-enter Password</b></label>
									<input class="form-control" id="register_password2" name="register_password2" type="password" placeholder="">
								</div>
								<span style="color:#ff0000;" class="hide" id="password_mismatch">Passwords do not match!</span>
								<div class="form-group">
									<button type="submit" class="btn pull-right">Register</button>
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

				    //Email Validtion
				    if($(this).attr('id') == 'register_username' && $(this).val() != '') {
				    	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	  					if(!emailReg.test( $(this).val() )) {
	  						$(this).next().html('Please enter valid Email!');
	  						$(this).next().removeClass('hide');
				    		$(this).css('border','1px solid #ff0000');	
				    		errFlag = true;	
	  					}
				    }

				    $(this).on('focus',function(){
				    	if($(this).attr('id') == 'register_username') {
				    		$(this).next().html('Email is Required!');
				    	}
				    	$(this).next().addClass('hide');
				    	$(this).css('border','1px solid #ccc');	
				    	if($(this).attr('id') == 'register_password' || $(this).attr('id') == 'register_password2') {
				    		$("#password_mismatch").addClass('hide');
				    	}			    	
				    });

				}
			});

			//Password Validation
			if($("#register_password").val() != '' && $("#register_password2").val() != '' && $("#register_password").val() != $("#register_password2").val()) {
				$("#password_mismatch").removeClass('hide');
		    	$("#register_password").css('border','1px solid #ff0000');
		    	$("#register_password2").css('border','1px solid #ff0000');
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