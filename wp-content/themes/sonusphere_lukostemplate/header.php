<?php
/**
 * The Header for our theme.
 */
?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="apple-touch-icon" href="icon.png">
		<!-- Place favicon.ico in the root directory -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
		<!-- Place social media icons in your site -->
		<meta name="theme-color" content="#fafafa">
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<!--[if IE]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
		<![endif]-->
		<header class="site-header">
			<div class="header-background" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/header_background.jpg');">
        		<div class="logo-container">
						<div class="logo">
							<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
								<img src= "<?php echo get_template_directory_uri()?> /assets/images/logo.jpg";>
							</a>
						</div>
						<div class=description>
							<h1 class="site-title"><?php bloginfo('name'); ?></h1>
							<p class="site-description"><?php bloginfo('description'); ?></p>
						</div>
				</div>
			</div>
		
		</header>
	</body>
</div>

