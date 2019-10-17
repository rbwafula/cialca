<?php

	/*
	Template name: Custom-page Template
	*/

	get_header();

	$nt_agricom_page_header_display = rwmb_meta( 'nt_agricom_page_header_display' );
	$nt_agricom_page_hero_display	= get_post_meta( get_the_ID(), 'nt_agricom_page_hero_display', true );
	$nt_agricom_page_contact_display= get_post_meta( get_the_ID(), 'nt_agricom_page_contact_display', true );
	$nt_agricom_page_map_display 	= get_post_meta( get_the_ID(), 'nt_agricom_page_map_display', true );
	$nt_agricom_title_display 		= rwmb_meta( 'nt_agricom_disable_title' );
	$nt_agricom_page_title 			= rwmb_meta( 'nt_agricom_alt_title' );
	$nt_agricom_subtitle_display 	= rwmb_meta( 'nt_agricom_disable_subtitle' );
	$nt_agricom_page_subtitle 		= rwmb_meta( 'nt_agricom_subtitle' );
	$nt_agricom_bread_display 		= ot_get_option( 'nt_agricom_bread_display' );
	$nt_agricom_header_type 		= rwmb_meta( 'nt_agricom_custompage_header_style' );

?>
	<?php if( $nt_agricom_page_header_display != true ) : ?>
		<div id="top-bar" class="top-bar--<?php echo esc_html( $nt_agricom_header_type );// header style ?>">
			<div class="container">

				<?php do_action('nt_agricom_logo_action'); ?>
				<a id="top-bar__navigation-toggler" href="javascript:void(0);"><span></span></a>
				<?php do_action('nt_agricom_menu_action'); ?>

			</div>
		</div>
	<?php endif; ?>

	<?php if( $nt_agricom_page_hero_display != true ) : ?>
		<!-- start header -->
		<header class="page-id-<?php echo get_the_ID(); ?> index-header intro flex-items-xs-middle parallax" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="300" data-stellar-offset-parent="true">

			<div class="template-overlay pattern"></div>

			<div class="container">
				<div class="intro__text template-cover-text">

					<?php if( $nt_agricom_subtitle_display != true ) : ?>
						<?php if( $nt_agricom_page_subtitle ) : ?>
							<p class="intro__subtitle cover-text-sublead"><?php echo esc_html( $nt_agricom_page_subtitle ); ?></p>
						<?php endif; ?>
					<?php endif; ?>

					<?php if( $nt_agricom_title_display != true ) : ?>
						<?php if( $nt_agricom_page_title ) : ?>
							<h1 class="intro__title uppercase"><?php echo esc_html( $nt_agricom_page_title ); ?></h1>
						<?php else : ?>
							<h1 class="intro__title uppercase"><?php echo the_title();?></h1>
						<?php endif; ?>
					<?php endif; ?>

				</div>

				<?php //BREADCRUMB ?>
				<?php if( $nt_agricom_bread_display != 'off' ) : ?>
					<?php if( function_exists( 'bcn_display' ) ) : ?>
						<p class="breadcrubms"><?php bcn_display(); ?></p>
					<?php endif; ?>
				<?php endif; ?>

			</div>
		</header>
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
