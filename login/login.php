<?php include "../header.php"; ?>		
		<!-- Page Title -->
		<div class="section section-breadcrumbs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h1>Login</h1>
					</div>
				</div>
			</div>
		</div>
        
        <div class="section">
	    	<div class="container">
				<div class="row">
					<div class="col-sm-5">
						<div class="basic-login">
							<form role="form" role="form" method="POST" action="/tpo/login/controller.php">
								<div class="form-group">
		        				 	<label for="login-username"><i class="icon-user"></i> <b>Username or Email</b></label>
									<input class="form-control" id="login_username" name="login_username" type="text" placeholder="">
								</div>
								<div class="form-group">
		        				 	<label for="login-password"><i class="icon-lock"></i> <b>Password</b></label>
									<input class="form-control" id="login_password" name="login_password" type="password" placeholder="">
								</div>
								<?php if(isset($_GET['id'])) { ?>
									<input type="hidden" name="jobs_id" value="<?php echo $_GET['id']; ?>" />
								<?php } ?>
								<div class="form-group">
									<button type="submit" class="btn pull-right">Login</button>
									<div class="clearfix"></div>
								</div>
							</form>
						</div>
					</div>
					<div class="col-sm-7 social-login">
						<div class="clearfix"></div>
						<div class="not-member">
							<p>Not a member? <a href="/tpo/register/register.php">Register here</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php include "../footer.php"; ?>