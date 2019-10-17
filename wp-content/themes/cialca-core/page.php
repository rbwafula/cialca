<?php

	get_header();

	$nt_agricom_page_header_display = rwmb_meta( 'nt_agricom_page_header_display' );
	$nt_agricom_page_hero_display	= rwmb_meta( 'nt_agricom_page_hero_display' );
	$nt_agricom_title_display 		= rwmb_meta( 'nt_agricom_disable_title' );
	$nt_agricom_page_title 			= rwmb_meta( 'nt_agricom_alt_title' );
	$nt_agricom_subtitle_display 	= rwmb_meta( 'nt_agricom_disable_subtitle' );
	$nt_agricom_page_subtitle 		= rwmb_meta( 'nt_agricom_subtitle' );
	$nt_agricom_pagelayout 			= ot_get_option( 'nt_agricom_pagelayout' );
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
		<div class="container has-margin-bottom">
			<div class="row">
				<div class="col-md-12-off  has-margin-bottom-off">

					<?php if( ( $nt_agricom_pagelayout ) =='right-sidebar' || ( $nt_agricom_pagelayout ) =='' ){ ?>
					<div class="col-lg-8  col-md-8 col-sm-12 index float-right posts">
					<?php } elseif( ( $nt_agricom_pagelayout ) == 'left-sidebar' ) { ?>
					<?php get_sidebar(); ?>
					<div class="col-lg-8  col-md-8 col-sm-12 index float-left posts">
					<?php } elseif( ( $nt_agricom_pagelayout ) == 'full-width' ) { ?>
					<div class="col-xs-12 full-width-index v">
					<?php } ?>

						<?php
							// Start the loop.
							while ( have_posts() ) : the_post();

								// Include the page content template.
								get_template_part( 'content', 'page' );

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

							// End the loop.
							endwhile;
						?>
					</div>

					<?php if( ( $nt_agricom_pagelayout ) =='right-sidebar' || ( $nt_agricom_pagelayout ) =='' ){ ?>
						<?php get_sidebar(); ?>
					<?php } ?>

				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>
