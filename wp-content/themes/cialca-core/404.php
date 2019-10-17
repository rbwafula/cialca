<?php

	get_header();  
	get_template_part('index-header');

	$nt_agricom_error_heading_display	= 	ot_get_option( 'nt_agricom_error_heading_display' );
	$nt_agricom_error_heading 			= 	ot_get_option( 'nt_agricom_error_heading' );
	$nt_agricom_error_slogan_display 	= 	ot_get_option( 'nt_agricom_error_slogan_display' );
	$nt_agricom_error_content_text 		= 	ot_get_option( 'nt_agricom_error_content_text' );
	$nt_agricom_error_slogan 			= 	ot_get_option( 'nt_agricom_error_slogan' );
	$nt_agricom_bread_display			= 	ot_get_option( 'nt_agricom_bread' );
	$nt_agricom_404_layout 				= 	ot_get_option( 'nt_agricom_404_layout' );


?>

	<!-- start header -->
	<header class="index-header intro flex-items-xs-middle parallax" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="300" data-stellar-offset-parent="true">

		<div class="template-overlay pattern"></div>

		<div class="container">
			<div class="intro__text template-cover-text">

				<?php if ( $nt_agricom_error_slogan_display != 'off' ) : ?>
					<?php if ( $nt_agricom_error_slogan != '' ) : ?>
						<p class="intro__subtitle cover-text-sublead"><?php echo esc_html( $nt_agricom_error_slogan ); ?></p>
					<?php endif; ?>
				<?php endif; ?>

				<?php if( $nt_agricom_error_heading_display != 'off' ) : ?>
					<?php if ( ( $nt_agricom_error_heading  ) != '') : ?>
						<h1 class="intro__title uppercase"><?php echo esc_html( $nt_agricom_error_heading ); ?></h1>
					<?php else : ?>
						<h1 class="intro__title uppercase"><?php echo esc_html_e( '404 - Not Found','nt-agricom' );?></h1>
					<?php endif; ?>
				<?php endif; ?>

			</div>

			<?php if( $nt_agricom_bread_display != 'off' ) : ?>
				<?php if( function_exists( 'bcn_display' ) ) : ?>
					<p class="breadcrubms"><?php bcn_display(); ?></p>
				<?php endif; ?>
			<?php endif; ?>

		</div>
	</header>

	<section id="blog" class="section-404">
		<div class="container has-margin-bottom">
			<div class="row">

				<?php if( ( $nt_agricom_404_layout ) == 'right-sidebar' || ( $nt_agricom_404_layout ) == '' ) { ?>
				<div class="col-lg-8  col-md-8 col-sm-12 index float-right posts">
				<?php } elseif( ( $nt_agricom_404_layout ) == 'left-sidebar') { ?>
				<?php get_sidebar(); ?>
				<div class="col-lg-8  col-md-8 col-sm-12 index float-left posts">
				<?php } elseif( ( $nt_agricom_404_layout ) == 'full-width') { ?>
				<div class="col-xs-12 col-md-10 col-md-offset-1 full-width-index v">
				<?php } ?>
				
					<div class="flex-items-md-center text-center">
						<img class="d-block img-fluid mx-auto" src="<?php echo get_template_directory_uri() . '/images/404.png'; ?>" alt="404" />

						<h2 class="title"><?php esc_html_e( 'page not found! ', 'nt-agricom' ); ?></h2>
						<?php if ( $nt_agricom_error_content_text != '' ) : ?>
						<div class="text">
							<?php echo esc_html( $nt_agricom_error_content_text ); ?>
						</div>
						<?php else : ?>
						<div class="text">
							<p><?php esc_html_e( 'Stimulates vast a real proven works discount secure care. Market invigorate a awesome handcrafted bigger comes newer recommended lifetime.', 'nt-agricom' ); ?></p>
							<p><?php esc_html_e( 'Evulates vast a real proven works discount secure care. Market invigorate a awesome handcrafted bigger comes newer recommended lifetime. Odor to yummy high racy bonus soaking mouthwatering. First superior', 'nt-agricom' ); ?></p>
						</div>
						<?php endif; ?>

						<?php get_search_form(); ?>

					</div>

				</div>

				<?php if( ( $nt_agricom_404_layout ) == 'right-sidebar' || ( $nt_agricom_404_layout ) == '' ) { ?>
					<?php get_sidebar(); ?>
				<?php } ?>

			</div>
		</div>
	</section>
<?php get_footer(); ?>