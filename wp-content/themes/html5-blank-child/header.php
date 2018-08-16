<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
        <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
	<body <?php body_class(); ?>>
		<div class="ryu-bg" style="background: url('./wp-content/themes/html5-blank-child/<?php echo $GLOBALS['background_image']; ?>');"></div>

		<!-- wrapper -->
		<div class="wrapper">

			<!-- header -->
			<header class="header clear" role="banner">

					<!-- nav -->
					<nav class="nav" role="navigation">
						<div class="navbar">
                            <h1>SFV Frame Data</h1>
                        </div>
					</nav>
                    <div class="bottom-nav">
						<a href="/"><h2>Home</h2></a>
						<a href="/?post_type=character"><h2>Character List</h2></a>
						<a href="/?page_id=2"><h2>About</h2></a>
                    </div>
					<!-- /nav -->

			</header>
			<!-- /header -->
