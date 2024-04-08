<?php ?>
<html>
    <head>
    	<meta charset="UTF-8" />
    	<title><?php echo $title; ?></title>
        <meta name="description" content="<?php echo $description; ?>" />
        <meta name="keywords" content="<?php echo $keywords; ?>" />
        
        <?php if(!empty($canonicalUrl)) { ?>
        	<link rel="canonical" href="<?php echo $canonicalUrl; ?>" />
        <?php } ?>
        
    	<meta name="google-site-verification" content="DqqJ3OkWI_9lCcj4evJcIAjXqH5AAt9kXALoUDDuOro" />
    	<link rel="stylesheet" type="text/css" href="<?php echo URL; ?>css/style.css" />
    	<!--[if IE 9]>
    		<link rel="stylesheet" type="text/css" href="css/ie9.css" />
    	<![endif]-->
    	<!--[if IE 8]>
    		<link rel="stylesheet" type="text/css" href="css/ie8.css" />
    	<![endif]-->
    	<!--[if IE 7]>
    		<link rel="stylesheet" type="text/css" href="css/ie7.css" />
    	<![endif]-->
    	
    	 <!-- JavaScript -->
    	<script type="text/javascript" src="<?php echo URL; ?>js/jquery-1.9.1.min.js"></script>
    </head>
    <body>
        <div id="header">
        	<div>
        		<div id="logo">
        			<a href="<?php echo URL; ?>"><img src="images/logo.jpg" alt="Logo" /></a>
        		</div>
        		<div id="navigation">
        			<div>
        				<ul class="navbar-nav" id = "naveBarId">
        					<li id="homeLi"><a href="<?php echo URL; ?>">Home</a></li>
        					<li id="productLi"><a href="<?php echo URL; ?>product">Products</a></li>
        					<li id="aboutUsLi"><a href="<?php echo URL; ?>aboutus">About us</a></li>
        					<li id="chooseUsLi"><a href="<?php echo URL; ?>chooseus">Why Choose Us?</a></li>
        					<li id="contactUsLi"><a href="<?php echo URL; ?>contactus">Contact Us</a></li>
        				</ul>
        			</div>
        		</div>
        	</div>
        </div>
