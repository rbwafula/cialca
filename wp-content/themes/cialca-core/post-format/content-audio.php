
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php
		$nt_agricom_mp3 		= rwmb_meta( 'nt_agricom_audio_mp3' );
		$nt_agricom_oga 		= rwmb_meta( 'nt_agricom_audio_ogg' );
		$nt_agricom_sc_url 	= rwmb_meta( 'nt_agricom_audio_sc' );
		$nt_agricom_sc_color = rwmb_meta( 'nt_agricom_audio_sc_color' );
		$nt_agricom_wp_audio = '[audio mp3="'.$nt_agricom_mp3.'"  ogg="'.$nt_agricom_oga.'"]';
		$nt_agricom_soundcloud_audio = '<iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url='.urlencode( $nt_agricom_sc_url ).'&amp;show_comments=true&amp;auto_play=false&amp;color='.$nt_agricom_sc_color.'"></iframe>';
	?>

	<?php if($nt_agricom_sc_url!='') : ?>
		<div class="post-thumb blog-bg"><?php echo nt_agricom_sanitize_data( $nt_agricom_soundcloud_audio ); ?></div>
	<?php else : ?>
		<div class="post-thumb blog-bg">
			<?php if(has_post_thumbnail()) : the_post_thumbnail(); endif; ?>
			<?php echo do_shortcode ( $nt_agricom_wp_audio ); ?>
		</div>
	<?php endif; ?>

	<?php do_action('nt_agricom_formats_content_action'); ?>

</article><!-- #post-## -->
