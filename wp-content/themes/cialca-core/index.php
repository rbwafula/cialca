<?php

	get_header();
	get_template_part( 'index-header' );
	$nt_agricom_pfp = get_option('page_for_posts');
	$nt_agricom_title_display 			= 	get_post_meta( $nt_agricom_pfp, 'nt_agricom_disable_title', true );
	$nt_agricom_page_title 				= 	get_post_meta( $nt_agricom_pfp, 'nt_agricom_alt_title', true );
	$nt_agricom_subtitle_display 		= 	get_post_meta( $nt_agricom_pfp, 'nt_agricom_disable_subtitle', true );
	$nt_agricom_page_subtitle 			= 	get_post_meta( $nt_agricom_pfp, 'nt_agricom_subtitle', true );
	$nt_agricom_page_contact_display	= 	get_post_meta( $nt_agricom_pfp, 'nt_agricom_page_contact_display', true );
	$nt_agricom_page_map_display 		= 	get_post_meta( $nt_agricom_pfp, 'nt_agricom_page_map_display', true );
	$nt_agricom_blog_content_style	= 	ot_get_option( 'nt_agricom_blog_content_style' );
	$nt_agricom_blog_layout 			= 	ot_get_option( 'nt_agricom_blog_layout' );

?>

	<!-- start header -->
	<header class="index-header intro flex-items-xs-middle parallax" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="300" data-stellar-offset-parent="true">

		<div class="template-overlay pattern"></div>

		<div class="container">
			<div class="intro__text template-cover-text">

				<?php if( $nt_agricom_subtitle_display != true ) : ?>
					<?php if( $nt_agricom_page_subtitle ) : ?>
						<p class="intro__subtitle cover-text-sublead"><?php echo esc_html( $nt_agricom_page_subtitle ); ?></p>
					<?php else : ?>
						<p class="intro__subtitle cover-text-sublead"><?php echo bloginfo( 'description' ); ?></p>
					<?php endif; ?>
				<?php endif; ?>

				<?php if( $nt_agricom_title_display != true ) : ?>
					<?php if( $nt_agricom_page_title ) : ?>
						<h1 class="intro__title uppercase"><?php echo esc_html( $nt_agricom_page_title ); ?></h1>
					<?php else : ?>
						<h1 class="intro__title uppercase"><?php echo bloginfo( 'name' ); ?></h1>
					<?php endif; ?>
				<?php endif; ?>

			</div>
		</div>
	</header>

<?php if ( $nt_agricom_blog_content_style == 'style1' ) : ?>

	<main>
		<section class="section">
			<div class="container">
				<div class="blog blog--style-1">

					<?php if ( have_posts() ) : ?>

						<div class="blog__inner">
							<div class="row  js-isotope" data-isotope-options='{ "itemSelector": ".js-isotope__item", "transitionDuration": "0.8s", "percentPosition": "true", "masonry": { "columnWidth": ".js-isotope__grid-sizer" }}'>
								<div class="col-xs-12 col-md-6 col-lg-4  js-isotope__grid-sizer" style="min-height: 0;"></div>

								<?php // MAIN POST LOOP ?>
								<?php while ( have_posts() ) : the_post(); ?>
									<?php get_template_part( 'post-format/list/content', get_post_format() ); ?>
								<?php endwhile; ?>

						</div>

						<?php // POST PAGINATION ?>
						<div class="text-center">

							<?php the_posts_pagination( array(
										'prev_text'          => esc_html__( 'Previous page', 'nt-agricom' ),
										'next_text'          => esc_html__( 'Next page', 'nt-agricom' ),
										'before_page_number' => '<span class="meta-nav screen-reader-text"></span>',
								) );
							?>

						</div>
					<?php else : ?>

						<div class="blog-container--inner">
							<?php get_template_part( 'content', 'none' ); ?>
						</div>

					<?php endif;?>
				</div>
			</div>
		</section>
		<?php

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

<?php else : ?>

	<section id="blog">
		<div class="container has-margin-bottom">
			<div class="row">

				<?php if( ( $nt_agricom_blog_layout ) =='right-sidebar' || ($nt_agricom_blog_layout ) =='' ){ ?>
				<div class="col-lg-8  col-md-8 col-sm-12 index float-right posts">
				<?php } elseif(( $nt_agricom_blog_layout ) == 'left-sidebar') { ?>
				<?php get_sidebar(); ?>
				<div class="col-lg-8  col-md-8 col-sm-12 index float-left posts">
				<?php } elseif(( $nt_agricom_blog_layout ) == 'full-width') { ?>
				<div class="col-xs-12 full-width-index v">
				<?php } ?>

					<?php
						if ( have_posts() ) :
						while ( have_posts() ) : the_post();
							 get_template_part( 'post-format/content', get_post_format() );
						endwhile;
							the_posts_pagination( array(
									'prev_text'          => esc_html__( 'Previous page', 'nt-agricom' ),
									'next_text'          => esc_html__( 'Next page', 'nt-agricom' ),
									'before_page_number' => '<span class="meta-nav screen-reader-text"></span>',
							) );
						else :
							get_template_part( 'content', 'none' );
						endif;
					?>

				</div>

				<?php
					if( ( $nt_agricom_blog_layout ) =='right-sidebar' || ($nt_agricom_blog_layout ) =='' ){
						 get_sidebar();
					}
				?>

			</div>
		</div>
	</section>

<?php endif; ?>

<?php get_footer(); ?>
