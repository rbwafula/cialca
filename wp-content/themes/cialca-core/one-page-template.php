<?php

	/*
	Template name: Agricom Template
	*/

	get_header();
	$nt_agricom_page_header_display 	= rwmb_meta( 'nt_agricom_page_header_display' );
	$nt_agricom_header_style 			= get_post_meta( get_the_ID(), 'nt_agricom_homepage_header_style', true );
	$nt_agricom_page_contact_display 	= get_post_meta( get_the_ID(), 'nt_agricom_page_contact_display', true );
	$nt_agricom_page_map_display 		= get_post_meta( get_the_ID(), 'nt_agricom_page_map_display', true );

	$nt_agricom_header_style = ( $nt_agricom_header_style != '' ) ? $nt_agricom_header_style : 'style-1';
?>
	<?php if( $nt_agricom_page_header_display != true ) : ?>
		<!-- start top bar -->
		<div id="top-bar" class="top-bar--<?php echo esc_html( $nt_agricom_header_style );// header style ?>">
			<div class="container">

				<?php // LOGO ?>
				<?php do_action('nt_agricom_logo_action'); ?>

				<a id="top-bar__navigation-toggler" href="javascript:void(0);"><span></span></a>

				<?php // NAVIGATION ?>
				<?php do_action('nt_agricom_combinemenu_action'); ?>

			</div>
		</div>
	<?php endif; ?>

	<main>

		<?php

			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					the_content();
				endwhile;
			endif;

			if ( $nt_agricom_page_contact_display != 'hide' || $nt_agricom_page_map_display != 'hide' ) :

				do_action('nt_agricom_page_before_contact_action');

					// contact section
					if ( $nt_agricom_page_contact_display != 'hide' ) :

						do_action('nt_agricom_page_contact_address_action');

						do_action('nt_agricom_page_contact_form_action');

					endif;

					// map section
					if ( $nt_agricom_page_map_display != 'hide' ) :

						do_action('nt_agricom_page_contact_map_action');

					endif;

				do_action('nt_agricom_page_after_contact_action');

			endif;

		?>

	</main>

<?php get_footer(); ?>
