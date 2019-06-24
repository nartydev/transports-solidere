<!DOCTYPE HTML>
<html lang="<?php bloginfo('language'); ?>">
<head>
	<meta charset="<?php bloginfo('charset');?>">
	<title><?php bloginfo('name'); ?></title>
	<meta name="description" content="<?php bloginfo('description');?>"/>
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700&display=swap" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?><?= "?d=".rand(0,10000); ?>" media="all" />
	<?php if(is_home()){ echo '<meta name="fragment" content="!"/>';} ?>
	<?php wp_head();?>
	<!--[if lt IE 9]>
	<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
	<header>
		<div class="container">
			<div class="flex-container">
				<a class="no-under" href="http://localhost/transports-solidere/">
					<div class="logo">
						Transports <span class="bold"> Solid'<span class="color-green">ère</span></span>
					</div>
			    </a>
				<div class="nav">
					<?php
                    $args = array(
						'theme_location' => 'top_menu', 
                        'menu' => 'top_menu', 
                        'menu_class' => 'menu-header-right', 
                        'menu_id' => 'menu_id'
                    );
                    wp_nav_menu($args);
					?>
				</div>
			</div>
		</div>
	</header>