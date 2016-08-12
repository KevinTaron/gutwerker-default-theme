<!DOCTYPE html>
<html lang="de">
<head>
	<title><?php wp_title(''); ?></title>
	<meta charset="utf-8">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Language" content="de" />
	<link hreflang="de" href="<?php bloginfo("url"); ?>"/>
	<?php wp_head(); ?>
	<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" />

	<!-- Favicon Start -->
	<?php get_template_part('includes/favicon'); ?>	
	<!-- Favicon End -->
</head>
<body <?php body_class(); ?>>

	<header class="clearfix">
		<div class="container">
			<div class="row">
		        <div class="logo-container col-xs-8 col-md-3">
		            <a href="<?php echo home_url(); ?>" class="logo">
		            	<?php echo wp_get_attachment_image( get_field('logo', 'option'), 'full' ); ?>
		            </a>
		        </div>
		        <div class="button-container col-xs-4">
		        	<div class="button-wrapper">
			            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
			                <span class="sr-only">Toggle navigation</span>
			                <span class="icon-bar first"></span>
			                <span class="icon-bar mid"></span>
			                <span class="icon-bar last"></span>
			        	</button>
		        	</div>
		        </div>
		        <div class="menu-container col-xs-12 col-md-9">
			        <div class="menu collapse navbar-collapse" id="navbar-collapse-1">
			            <?php wp_nav_menu(array( 'theme_location' => 'navi', 'menu_id' => 'mainmenu' )); ?>
			        </div>
		        </div>
			</div>
	    </div>
	</header>
