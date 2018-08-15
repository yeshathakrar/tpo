<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>

<script type="text/javascript" src="js/jquery_v_1.4.js"></script>
<script type="text/javascript" src="js/jquery_notification_v.1.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $(".btn1").click(function(){
        $("p").fadeOut()
    });
    $(".btn2").click(function(){
        $("p").fadeIn();
    });
});
</script>



        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <p><title>SFIT - Training and Placement Cell</title></p>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="/tpo/css/bootstrap.min.css">
        <link rel="stylesheet" href="/tpo/css/icomoon-social.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,800' rel='stylesheet' type='text/css'>

        <link href="/tpo/font_awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet" />

        <link rel="stylesheet" href="/tpo/css/leaflet.css" />
		<!--[if lte IE 8]>
		    <link rel="stylesheet" href="css/leaflet.ie.css" />
		<![endif]-->
		<link rel="stylesheet" href="/tpo/css/main.css">

        <script src="/tpo/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->       

        <!-- Navigation & Logo-->
        <div class="mainmenu-wrapper">
	        <div class="container">
	        	<div class="menuextras">
					<div class="extras">
						<ul>
							<?php  
								session_start();
								if(isset($_SESSION['user_data']['id'])) {
									echo '<li>Hello '.$_SESSION['user_data']['first_name'].' '.$_SESSION['user_data']['last_name'].' | <a href="/tpo/login/logout.php">Logout</a></li>';
								}else {
									echo '<li><a href="/tpo/login/login.php">Login</a></li>';
								}
							?>              				
            			</ul>
					</div>
		        </div>
		        <nav id="mainmenu" class="mainmenu">
					<ul>
						<li class="logo-wrapper"><a href="/tpo/index.php"><img src="/tpo/img/logo1.png" alt="SFIT - TPO"></a></li>
						<li>
							<a href="/tpo/index.php">Home</a>
						</li>
						<li>
							<a href="/tpo/jobs/jobs.php">View Jobs List</a>
						</li>
						<?php if(isset($_SESSION['user_data']['user_role']) && $_SESSION['user_data']['user_role'] == 'A') { ?>
							<li>
								<a href="/tpo/jobs/addjobs.php">Add a Job</a>
							</li>
						<?php } ?>						
					</ul>
				</nav>
			</div>
		</div>
<button class="btn1">Fade out</button>
<button class="btn2">Fade in</button>