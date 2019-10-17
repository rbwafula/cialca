<?php
/**
 * The template for displaying posts in the Quote post format.
 *
 * @package WordPress
 * @subpackage nt_agricom_
 * @since nt_agricom_ 1.0
 */
?>

<!-- Start .hentry -->
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="hentry-box">

		<?php

		$nt_agricom_quote_text 		=	rwmb_meta( 'nt_agricom_quote_text' );
		$nt_agricom_quote_author 	=	rwmb_meta( 'nt_agricom_quote_author' );
		$nt_agricom_image_id 		=	get_post_thumbnail_id();
		$nt_agricom_image_url 		=	wp_get_attachment_image_src($nt_agricom_image_id, true);
		$nt_agricom_color 			=	rwmb_meta( 'nt_agricom_quote_bg' );
		$nt_agricom_opacity 			=	rwmb_meta( 'nt_agricom_quote_bg_opacity' );
		$nt_agricom_opacity 			=	$nt_agricom_opacity / 100;

		?>

		<div class="post-thumb">
			<div class="content-quote-format-wrapper">
				<?php if(has_post_thumbnail()) : ?>
				<div class="entry-media" style="background-image: url(<?php echo esc_url( $nt_agricom_image_url[0] ); ?>); ">
				<?php else : ?>
				<div class="entry-media">
				<?php endif; ?>
					<div class="content-quote-format-overlay" style="background-color: <?php echo esc_attr( $nt_agricom_color ); ?>; opacity: <?php echo esc_attr( $nt_agricom_opacity ); ?>;"></div>
					<div class="content-quote-format-textwrap">
						<h3><a href="<?php esc_url( the_permalink() ); ?>"><?php echo esc_attr( $nt_agricom_quote_text ); ?></a></h3>
						<p><a href="#0" target="_blank" style="color: #ffffff;"><?php echo esc_attr( $nt_agricom_quote_author ); ?></a></p>
					</div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		
		

		<?php do_action('nt_agricom_formats_content_action'); ?>
		
	</article><!-- #post-## -->