<?php

	$nt_agricom_bd 				= 	ot_get_option( 'nt_agricom_bread' );
	$nt_agricom_wsh				= 	ot_get_option( 'nt_agricom_single_woo_heading' );
	$nt_agricom_wsd				= 	ot_get_option( 'nt_agricom_single_woo_desc' );
	$nt_agricom_wshd 			= 	ot_get_option( 'nt_agricom_single_woo_heading_display' );
	$nt_agricom_wsdd 			= 	ot_get_option( 'nt_agricom_single_woo_desc_display' );
	$nt_agricom_post_layout 	= 	ot_get_option( 'woosingle_layout' );

?>

		<!-- start header -->
	<header class="page-id-<?php echo get_the_ID(); ?> index-header intro flex-items-xs-middle parallax" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="300" data-stellar-offset-parent="true">

		<div class="template-overlay pattern"></div>

		<div class="container">
			<div class="intro__text template-cover-text">

				<?php if( $nt_agricom_wsdd != 'off' ) : ?>
					<?php if( $nt_agricom_wsd ) : ?>
						<p class="intro__subtitle cover-text-sublead"><?php echo esc_html( $nt_agricom_wsd ); ?></p>
					<?php endif; ?>
				<?php endif; ?>

				<?php if( $nt_agricom_wshd != 'off' ) : ?>
					<?php if( $nt_agricom_wsh ) : ?>
						<h1 class="intro__title uppercase"><?php echo esc_html( $nt_agricom_wsh ); ?></h1>
					<?php else : ?>
						<h1 class="intro__title uppercase"><?php echo the_title();?></h1>
					<?php endif; ?>
				<?php endif; ?>

			</div>

			<?php if( $nt_agricom_bd != 'off' && function_exists( 'bcn_display' ) ) : ?>
					<p class="breadcrubms"><?php bcn_display(); ?></p>
			<?php endif; ?>

		</div>
	</header>

	<section id="blog" class="page-internal-content">
		<div class="container">
			<div class="row">
				<div class="col-md-12-off has-margin-bottom-off">

				<?php if( $nt_agricom_post_layout == 'right-sidebar' || $nt_agricom_post_layout == '') { ?>
					<div class="col-lg-9  col-md-9 col-sm-9 index float-right posts">
				<?php } elseif( $nt_agricom_post_layout == 'left-sidebar') { ?>

					<div id="widget-area" class="widget-area col-lg-3 col-md-3 col-sm-3 woo-sidebar">
						<?php dynamic_sidebar( 'shop-single-page-sidebar' ); ?>
					</div>
					<div class="col-lg-9  col-md-9 col-sm-9 index float-left posts">

				<?php } elseif( $nt_agricom_post_layout == 'full-width' ) { ?>
					<div class="col-xs-12 full-width-index v">
				<?php } ?>

					<?php woocommerce_content(); ?>

			   </div><!-- #end sidebar+ content -->

				<?php if( $nt_agricom_post_layout == 'right-sidebar' || $nt_agricom_post_layout == '') { ?>
					<div id="widget-area" class="widget-area col-lg-3 col-md-3 col-sm-3 woo-sidebar">
						<?php dynamic_sidebar( 'shop-single-page-sidebar' ); ?>
					</div>
				<?php } ?>

				</div>
			</div>
		</div>
	</section>

	<?php get_footer(); ?>
