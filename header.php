<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="<?= esc_url(get_site_icon_url()); ?>" type="image/png">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

	<div class="wrapper">

		<header class="header">
			<div class="container">
				<a href="<?= esc_url(home_url('/')); ?>" class="header__logo">
					<?php 
						if(function_exists('the_custom_logo')) {
							$custom_logo_id = get_theme_mod('custom_logo');
							$logo = wp_get_attachment_image_src($custom_logo_id, 'full');

							if($logo) {
								echo '<img src="' . esc_url($logo[0]) . '" alt="' . esc_attr(get_bloginfo('name')) . '" loading="lazy" width="32" height="32">';
							}
						}
					?>
					<span><?= esc_html(get_bloginfo('name')); ?></span>
				</a>
			</div>
		</header>

		<main class="main">