<?php

	get_header();
	get_template_part( 'index-header' );
	$nt_agricom_single_comment_display = ot_get_option( 'nt_agricom_post_comment_display' );

	do_action( 'nt_agricom_single_header_action' );

	if( ! is_singular( array('page', 'attachment', 'post') ) ) {

		do_action( 'nt_agricom_before_cpt_single_action' );

			while ( have_posts() ) : the_post();

				the_content();

				if ( comments_open() || '0' != get_comments_number() ) :
					comments_template();
				endif;
			endwhile;

			// post navigation
			nt_agricom_post_nav();

		do_action( 'nt_agricom_after_cpt_single_action' );

	} else {

		do_action( 'nt_agricom_before_post_single_action' );

			while ( have_posts() ) : the_post();

				get_template_part( 'post-format/content', get_post_format() );

				if ( $nt_agricom_single_comment_display !== 'off') :
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				endif;

				endwhile;

			// post navigation
			nt_agricom_post_nav();

		do_action( 'nt_agricom_after_post_single_action' );
	}

get_footer();

?>
