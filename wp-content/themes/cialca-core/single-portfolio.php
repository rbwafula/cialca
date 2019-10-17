<?php

	get_header();  
	get_template_part( 'index-header' );

	$nt_agricom_blog_header_style 			= 	ot_get_option( 'nt_agricom_blog_header_style' );
	$nt_agricom_bread_display					= 	ot_get_option( 'nt_agricom_bread_display' );
	$nt_agricom_single_port_heading_display 	= 	ot_get_option( 'nt_agricom_single_port_heading_display' );


 if ( $nt_agricom_blog_header_style == 'style2' ) : ?>

	<div class="template-cover template-cover-style-2 js-full-height-off section-class-scroll index-header">

		<div class="template-overlay"></div>

		<div class="template-cover-text">
			<div class="container">
				<div class="row">
					<div class="col-md-8 center">
						<div class="template-cover-intro">

							<?php if ( $nt_agricom_single_port_heading_display != 'off') : ?>
								<h2 class="uppercase lead-heading"><?php echo the_title();?></h2>
							<?php endif; ?>

							<?php if ( $nt_agricom_bread_display != 'off' ) : ?>
								<?php if( function_exists( 'bcn_display' ) ) : ?>
									<p class="breadcrubms"><?php bcn_display();  ?></p>
								<?php endif; ?>
							<?php endif; ?>

						</div>
					</div>
				</div>
			</div>	
		</div>
	</div>


<?php else : ?>

	<section id="headline">
		<div class="container">
			<div class="row">

				<?php if ( $nt_agricom_single_port_heading_display != 'off') : ?>
					<div class="col-xs-12 col-md-7">
						<p id="page-title" class="h1"><?php echo the_title();?></p>
					</div>
				<?php endif; ?>

				<?php if ( $nt_agricom_bread_display != 'off' ) : ?>
					<div class="col-xs-12 col-md-5">
						<?php if( function_exists( 'bcn_display' ) ) : ?>
							<p class="breadcrubms headline-text"> <?php bcn_display();  ?></p>
						<?php endif; ?>
					</div>
				<?php endif; ?>

			</div>

		</div>
	</section>

<?php endif; ?>

	<section id="blog">
		<div class="container has-margin-bottom">
			<div class="row">
				<div class="fh5co-project-style-4">

					<?php 
						while ( have_posts() ) :
							the_post();
							get_template_part( 'post-format/portfolio/content', get_post_format() );
						endwhile; // end of the loop. 
					?>

				</div>
			</div>
		</div>
	</section>

<?php get_footer(); ?>