<?php
/**
 * The template for displaying posts in the Video post format.
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
			$nt_agricom_embed = rwmb_meta( 'nt_agricom_video_embed' );
			if( $nt_agricom_embed!='' ) :
		?>
		<div class="post-thumb blog-bg">
			<div class="media-element video-responsive"><?php echo nt_agricom_sanitize_data( $nt_agricom_embed ); ?></div>
		</div>

		<?php else : ?>

		<?php
			$nt_agricom_m4v 		=	rwmb_meta( 'nt_agricom_video_m4v' );
			$nt_agricom_ogv 		=	rwmb_meta( 'nt_agricom_video_ogv' );
			$nt_agricom_webm 		=	rwmb_meta( 'nt_agricom_video_webm' );
			$nt_agricom_image_id 	=	get_post_thumbnail_id();
			$nt_agricom_image_url	=	wp_get_attachment_image_src($nt_agricom_image_id, true);
			$nt_agricom_wp_video 	=	'[video poster="'.$nt_agricom_image_url[0].'" mp4="'.$nt_agricom_m4v.'"  webm="'.$nt_agricom_webm.'"]';
		?>

	    <div class="post-thumb"><?php echo do_shortcode ($nt_agricom_wp_video); ?></div>
		<?php endif; ?>

		<?php do_action('nt_agricom_formats_content_action'); ?>

	</article><!-- #post-## -->
