<!doctype html>
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<head>
	<title>Login | Flyhi Admin</title>
	
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="copyright" content="">
	<meta name="author" content="">
	<meta name="language" content="English">
	<meta name="robots" content="index, follow">
	<meta property="fb:page_id" content="XXX"> <!-- XXX = Facebook Fan Page ID -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Icons -->
	<link rel="shortcut icon" href="/favicon.ico">
	<link rel="apple-touch-icon" href="/apple-touch-icon.png">
	
	<!-- CSS Styles -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/screen.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/colors.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>public/admin/css/jquery.tipsy.css">
	
	<!-- Google WebFonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;v2' rel='stylesheet' type='text/css'>
	
	<!-- Modernizr adds classes to the <html> element which allow you to target specific browser functionality in your stylesheet -->
	<script src="<?php echo base_url(); ?>public/admin/js/libs/modernizr-1.7.min.js"></script>
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery.validate.js"></script>
	
	<script type="text/javascript">
	$(document).ready(function(){ // jQuery DOM ready function.
		$("#loginfrm").validate();
	});
	</script>

</head>
<body class="login">
	
	<div class="login-wrapper">
		
		<?php
		if ($this->session->flashdata('error')){ 
		?>
		<!-- Notification -->
		<div class="notification error">
			<a href="#" class="close-notification tooltip" title="Hide Notification">x</a>
			<h4>Error</h4>
			<p><?php echo $this->session->flashdata('error'); ?></p>
		</div>
		<!-- /Notification -->
		<?php
		}
		?>
		<!-- Full width content box -->
		<article class="content-box minimizer">
			<header>
				<h2>Flyhi Administartion</h2>
				<nav>
					
				</nav>
			</header>
			<section>
				
				<div id="logform">
					
					<?php
					$attributes = array('id' => 'loginfrm');

					echo form_open('login/validation',$attributes);

					$dataName = array(
						  'name'        => 'loginName',
						  'id'          => 'loginName',
						  'class'	=> 'required'
						);

					$dataPass = array(
						  'name'        => 'loginPass',
						  'id'          => 'loginPass',
						  'class'	=> 'required'
					);
					
					?>
					<dl>
						<dt>
							<label>User Name</label>
						</dt>
						<dd>
							
							<?php echo form_input($dataName); ?>
						</dd>

						<dt>
							<label>Password</label>
						</dt>
						<dd>
							<?php echo form_password($dataPass); ?>
						</dd>
						
						<dt class="checkbox remember"><label>Remember me</label></dt>
						
						<dd class="remember">
							
							<?php echo form_checkbox('loginRemeber', 'remeber');?>
							
						</dd>
						<dd><?php echo form_submit('submit','Login'); ?>
						</dd>
					</dl>	
					
					
				<?php echo form_close(); ?>
				
				</div>
			</section>
		</article>
		<!-- /Full width content box -->
	</div>

	<!-- JavaScript at the bottom for faster page loading -->
	
	<script>!window.jQuery && document.write(unescape('%3Cscript src="<?php echo base_url(); ?>public/admin/js/libs/jquery-1.5.1.min.js"%3E%3C/script%3E'))</script>
	<script src="<?php echo base_url(); ?>public/admin/js/jquery/jquery.tipsy.js"></script>
	<script src="<?php echo base_url(); ?>public/admin/js/login.js"></script>
	
	<script>
		var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']]; // Change UA-XXXXX-X to be your site's ID
		(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
		g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
		s.parentNode.insertBefore(g,s)}(document,'script'));
	</script>
</body>
</html>