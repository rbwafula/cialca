<?php

	get_header();
	get_template_part( 'index-header' );

	$nt_agricom_bread_display			= 	ot_get_option( 'nt_agricom_bread_display');
	$nt_agricom_search_layout 			= 	ot_get_option( 'nt_agricom_search_layout' );
	$nt_agricom_search_heading_display 	= 	ot_get_option( 'nt_agricom_search_heading_display' );
	$nt_agricom_search_heading 			= 	ot_get_option( 'nt_agricom_search_heading' );
	$nt_agricom_single_slogan_display 	= 	ot_get_option( 'nt_agricom_single_slogan_display' );
	$nt_agricom_search_slogan 			= 	ot_get_option( 'nt_agricom_search_slogan' );


?>

	<!-- start header -->
	<header class="index-header intro flex-items-xs-middle parallax" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="300" data-stellar-offset-parent="true">

		<div class="template-overlay pattern"></div>

		<div class="container">
			<div class="intro__text template-cover-text">

				<?php // SUBTITLE ?>
				<?php if( $nt_agricom_single_slogan_display != 'off' ) : ?>
					<?php if( $nt_agricom_search_slogan != '' ) : ?>
						<p class="intro__subtitle cover-text-sublead"><?php echo esc_html( $nt_agricom_search_slogan ); ?></p>
					<?php else : ?>
						<p class="intro__subtitle cover-text-sublead"><?php echo esc_html_e( 'Welcome to Our Archive','nt-agricom' );?></p>
					<?php endif; ?>
				<?php endif; ?>

				<?php // PAGE TITLE ?>
				<?php if ( $nt_agricom_search_heading_display != 'off' ) : ?>
					<?php if ( $nt_agricom_search_heading != '' ) : ?>
						<h1 class="intro__title uppercase lead-heading"><?php echo nt_agricom_sanitize_data( $nt_agricom_search_heading ); ?></h1> 
					<?php else : ?>
						<h1 class="intro__title uppercase lead-heading"><?php echo esc_html( $wp_query->found_posts ); ?> <?php esc_html_e( 'Search Results Found For', 'nt-agricom' ); ?>: "<?php the_search_query(); ?>"</h1>
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

	<section id="blog">
		<div class="container has-margin-bottom">
			<div class="row">
				<div class="col-md-12-off has-margin-bottom-off">

				<?php if( ( $nt_agricom_search_layout ) == 'right-sidebar' || ( $nt_agricom_search_layout ) == '' ) { ?>
				<div class="col-lg-8  col-md-8 col-sm-12 index float-right posts">

				<?php } elseif( ( $nt_agricom_search_layout ) == 'left-sidebar') { ?>
				<?php get_sidebar(); ?>
				<div class="col-lg-8  col-md-8 col-sm-12 index float-left posts">

				<?php } elseif( ( $nt_agricom_search_layout ) == 'full-width') { ?>
				<div class="col-xs-12 full-width-index v">
				<?php } ?>

					<?php
						if ( have_posts() ) :

							while ( have_posts() ) : the_post();
								get_template_part( 'content', 'search' );
							endwhile;
							the_posts_pagination( array(
								'before_page_number' => '<span class="meta-nav screen-reader-text">' . esc_html__( 'Page', 'nt-agricom' ) . ' </span>',
							) );
							else :
							get_template_part( 'content', 'none' );

						endif;

						wp_link_pages();
					 ?>

				</div><!-- #end sidebar+ content -->

				<?php
					if( ( $nt_agricom_search_layout ) == 'right-sidebar' || ( $nt_agricom_search_layout ) == '') {
						get_sidebar();
					}
				?>

				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>
