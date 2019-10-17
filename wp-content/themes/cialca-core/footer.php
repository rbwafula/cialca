	<?php
		/**
		* The template for displaying the footer
		*
		*
		* @package WordPress
		* @subpackage nt_agricom
		* @since nt_agricom 1.0
		*/

		if ( is_active_sidebar( 'nt_agricom_footer_widgetize' ) ) :

			do_action('nt_agricom_before_footer_action');
			do_action('nt_agricom_widgetize_action');
			do_action('nt_agricom_copyright_action');
			do_action('nt_agricom_after_footer_action');

		endif;

		do_action('nt_agricom_backtop_action');

		wp_footer();
	?>

	</body>
</html>
