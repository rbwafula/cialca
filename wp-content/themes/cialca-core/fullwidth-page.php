<?php

	/*
	Template name: Fullwidth Template
	*/

	get_header();

	$nt_agricom_page_header_display = rwmb_meta( 'nt_agricom_page_header_display' );
	$nt_agricom_page_hero_display	= rwmb_meta( 'nt_agricom_page_hero_display' );
	$nt_agricom_title_display 		= rwmb_meta( 'nt_agricom_disable_title' );
	$nt_agricom_page_title 			= rwmb_meta( 'nt_agricom_alt_title' );
	$nt_agricom_subtitle_display 	= rwmb_meta( 'nt_agricom_subtitle_display' );
	$nt_agricom_page_subtitle 		= rwmb_meta( 'nt_agricom_subtitle' );
	$nt_agricom_bread_display 		= ot_get_option( 'nt_agricom_bread_display' );

	if( $nt_agricom_page_header_display != true ) {
		get_template_part( 'index-header' );
	}
?>
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

	<section id="blog">
		<div class="container-off has-margin-bottom">
			<div class="row-off">
				<div class="col-md-12-off has-margin-bottom">
					<?php
						if ( have_posts() ) :
							while ( have_posts() ) : the_post();
								the_content();
							endwhile;
						endif;
					?>
				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>
