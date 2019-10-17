<?php // TOP HEADER SECTION

$nt_agricom_header_type =  ot_get_option('nt_agricom_header_type');

?>

<div id="top-bar" class="top-bar--<?php echo esc_html( $nt_agricom_header_type );// header style ?>">
	<div class="container">

		<?php // LOGO ?>
		<?php do_action('nt_agricom_logo_action'); ?>

		<a id="top-bar__navigation-toggler" href="javascript:void(0);"><span></span></a>

		<?php // NAVIGATION ?>
		<?php do_action('nt_agricom_menu_action'); ?>

	</div>
</div>
