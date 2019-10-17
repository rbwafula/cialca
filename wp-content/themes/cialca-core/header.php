<!DOCTYPE html>
<html <?php language_attributes(); ?>> 

<head>
	<!-- Meta UTF8 charset -->
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="user-scalable=no, width=device-width, height=device-height, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui" />
	<?php wp_head(); ?>
</head>

	<!-- BODY START=========== -->
	<body <?php body_class(); ?>>

	<?php do_action('nt_agricom_preloader_action'); ?>