	
	
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="blog-bg">
				<?php
					wp_enqueue_style( 'nt-agricom-custom-flexslider');
					wp_enqueue_script( 'nt-agricom-custom-flexslider');
					wp_enqueue_script( 'fitvids');
					wp_enqueue_script( 'nt-agricom-blog-settings');
					$nt_agricom_images = rwmb_meta( 'nt_agricom_gallery_image', 'type=image_advanced' );
					if( $nt_agricom_images != '' ) : 
				?>
					<div class="flexslider">
						<ul class="slides">
							<?php
								foreach ( $nt_agricom_images as $image ) {
									echo "<li><img src='{$image['full_url']}' alt='{$image['alt']}' /></li>";
								}
							?>
						</ul>
					</div>
				<?php endif; ?>
		</div><!-- Ends Post Media -->

		

		<?php do_action('nt_agricom_formats_content_action'); ?>
		
	</article><!-- #post-## -->