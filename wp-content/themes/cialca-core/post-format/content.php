<?php
/**
* The default template for displaying content
*
* Used for both single and index/archive/search.
*
* @package WordPress
* @subpackage nt_agricom
* @since nt_agricom 1.0
*/

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="article-img">
			<a href="<?php echo esc_url( get_permalink() ); ?>">
				<?php the_post_thumbnail('full'); ?>
			</a>
		</div>
	<?php endif; ?>

	<?php do_action('nt_agricom_formats_content_action'); ?>


</article><!-- #post-## -->
