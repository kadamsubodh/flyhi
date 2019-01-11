<!doctype html>
      <!--[if IE 7 ]>    <html lang="en" class="no-js ie7"> <![endif]-->
      <!--[if IE 8 ]>    <html lang="en" class="no-js ie8"> <![endif]-->
      <!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
      <!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
          <?php
        
    $this->load->view('header');
    ?>
     <body>   
	<!-- Muon jQuery Sticky Dropdown Menu 1.0 -->
	<header class="muon">
	
		<div class="navigation-wrapper">
		
			<!-- Logo -->
                        <div style="float: left"><a href="<?php echo base_url();?>dashboard" title="Back to Dashboard"><img height="40" src="../images/logo.png" ></a></div>
			
                        
			<!-- Root navigation block -->
			<nav>
			
				<!-- Root menu level -->
				<ul>
					
					<!-- Root menu items -->
					<li><a href="<?php echo base_url(); ?>newsevents" class="muon-no-submenu">News & Events</a></li>
					
					<!-- Root menu item -->
					<li><a href="<?php echo base_url().'jobs'; ?>">Job Opportunities</a></li>
	
				<!-- End of root menu level -->
				</ul>
				
			<!-- End of root navigation block -->
			</nav>

			<!-- User list -->
			<ul class="muon-user-list">
				<li class="muon-user-data">Welcome, <a href="#"><?php echo $this->session->userdata('username'); ?></a></li>
				<li><a class="muon-logout" title="Logout" href="<?php echo base_url(); ?>login/logout">Logout</a></li>
			</ul>
			
		</div>
	
	</header>
	<!-- End of Muon Header -->		
	
	<!-- Main Content -->
	<section role="main" class="page-wrapper">
	
		<!-- Dashboard -->
		<section id="dashboard">
			
			<!-- Notification -->
				<?php if($this->session->flashdata('error') || $this->session->flashdata('fewerror')) { ?>
			<div class="notification error">
				<a href="#" class="close-notification tooltip" title="Hide Notification">x</a>
					<h4>Error notification</h4>
					<p><?php if($this->session->flashdata('error')){ echo $this->session->flashdata('error'); } else { echo $this->session->flashdata('fewerror'); } ?></p>
			</div>
					<?php } ?>
			<!-- /Notification -->

			<!-- Notification -->
				<?php if($this->session->flashdata('success')) { ?>
			<div class="notification success">
				<a href="#" class="close-notification tooltip" title="Hide Notification">x</a>
					<h4>Success notification</h4>
					<p><?php echo $this->session->flashdata('success'); ?></p>
			</div>
					<?php } ?>
			<!-- /Notification -->

			<!-- Breadcumbs -->
			<ul id="breadcrumbs">
			<?php $path = base_url(); ?>
                            
                                <?php if($this->uri->segment(1) != "dashboard"){ ?>
                            
                                <li><a href="<?php echo $path.'dashboard'; ?>" title="Back to Homepage">dashboard</a></li>
                                    
                                <?php } ?>
                            
				<li><a href="<?php echo $path.$this->uri->segment(1); ?>" title="Back to Homepage"><?php echo $this->uri->segment(1); ?></a></li>

				<li><a href="<?php echo $path.$this->uri->segment(2); ?>"><?php echo $this->uri->segment(2); ?></a></li>

				<li><a href="<?php echo $path.$this->uri->segment(2).'/'.$this->uri->segment(3).'/'.$this->uri->segment(4); ?>"><?php echo $this->uri->segment(3); ?></a></li>
				<li>Current Page</li>
			</ul>
			<!-- /Breadcumbs -->
			
			<!-- Nav Shortcuts -->
			<ul class="shortcuts">


				<li class="shortcut-sales"><a href="<?php echo base_url().'newsevents'; ?>" title="News & Events">News & Events</a></li>

				<li class="shortcut-looong"><a href="<?php echo base_url().'jobs'; ?>" title="Job Opportunity">Job Opportunities</a></li>
				
			</ul>
			<!-- /Nav Shortcuts -->
			
		</section>
		<!-- /Dashboard -->
		
	</section>
	<!-- /Main Content -->

  <?php   
            if(ISSET($content)){
                $this->load->view($content);
                    }
        $this->load->view('footer');
?>
	<script>
		var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']]; // Change UA-XXXXX-X to be your site's ID
		(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
		g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
		s.parentNode.insertBefore(g,s)}(document,'script'));
	</script>

</body>
</html>
