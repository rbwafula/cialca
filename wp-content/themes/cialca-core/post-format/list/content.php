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
$nt_agricom_teamthumb 	= get_post_thumbnail_id();
$nt_agricom_teamimg 	= nt_agricom_aq_resize( wp_get_attachment_url( $nt_agricom_teamthumb,'full' ), 510, 360 , true, true, true );
?>

	<div id="post-<?php the_ID(); ?>" <?php post_class('col-xs-12 col-md-6 col-lg-4  js-isotope__item'); ?>>
		<div class="blog__item  mx-auto">

				<?php if ( has_post_thumbnail() ) : ?>
					<figure>
						<a href="<?php echo esc_url( get_permalink() ); ?>">
							<img class="img-fluid" src="<?php echo esc_url( $nt_agricom_teamimg); ?>" alt="<?php the_title(); ?>" />
						</a>
					</figure>
				<?php endif; ?>

			<div class="blog__entry">
				<div class="blog__post-date">
					<span><?php echo the_time('d'); ?></span>
					<span><?php echo the_time('M'); ?><br /><?php echo the_time('Y'); ?></span>
				</div>

				<h3 class="blog__entry__title"><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h3>

				<?php $num_comments = get_comments_number(); // get_comments_number returns only a numeric value

					if ( comments_open() ) {
						if ( $num_comments == 0 ) {
							$comments = esc_html__('No Comments', 'nt-agricom');
						} elseif ( $num_comments > 1 ) {
							$comments = $num_comments . esc_html__(' Comments', 'nt-agricom');
						} else {
							$comments = esc_html__('1 Comment', 'nt-agricom');
						}
						$write_comments = '<a href="' . get_comments_link() .'">'. $comments.'</a>';
					} else {
						$write_comments =  esc_html__('Comments are off for this post.', 'nt-agricom');
					}
				?>

				<span class="blog__entry__meta"><?php the_category(' , '); ?>  | <?php echo nt_agricom_sanitize_data( $write_comments ); ?></span>

				<?php

					if ( ! is_single() ) :

						if ( has_excerpt() ) :

							the_excerpt();

						else :

							$content = get_the_content();
							$content = substr($content, 0, 150);

						endif;

					else :
						/* translators: %s: Name of current post */
						the_content( sprintf(
							esc_html__( 'Continue reading %s', 'nt-agricom' ),
							the_title( '<span class="screen-reader-text">', '</span>', false )
						) );

						wp_link_pages( array(
							'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'nt-agricom' ) . '</span>',
							'after'       => '</div>',
							'link_before' => '<span>',
							'link_after'  => '</span>',
							'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'nt-agricom' ) . ' </span>%',
							'separator'   => '<span class="screen-reader-text">, </span>',
						) );

					endif;

				?>

			</div>
		</div>
	</div>
