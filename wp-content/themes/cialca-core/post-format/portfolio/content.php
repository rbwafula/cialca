
				<div class="col-md-7 col-sm-7">

					<?php
						$nt_agricom_services_list	= 	rwmb_meta( 'nt_agricom_services_list');
						$nt_agricom_images			=   rwmb_meta( 'nt_agricom_images' );
					?>

					<?php
					if ( $nt_agricom_images !='' ) {
					foreach ( $nt_agricom_images as $image ) {
					?>
					   <p><img src="<?php	echo esc_url( $image['full_url'] ); ?>" class="img-responsive"></p>
					<?php } ?>
					<?php } ?>

					<?php
						$nt_agricom_embed = rwmb_meta( 'nt_agricom_video_embed' );
						if( $nt_agricom_embed!='' ) :
					?>

					<div class="media-element video-responsive"><?php echo nt_agricom_sanitize_data( $nt_agricom_embed ); ?></div>

					<?php else : ?>

					<?php
						$nt_agricom_m4v 			=	rwmb_meta( 'nt_agricom_video_m4v' );
						$nt_agricom_ogv 			=	rwmb_meta( 'nt_agricom_video_ogv' );
						$nt_agricom_webm 		=	rwmb_meta( 'nt_agricom_video_webm' );
						$nt_agricom_image_id 	=	get_post_thumbnail_id();
						$nt_agricom_image_url	=	wp_get_attachment_image_src($nt_agricom_image_id, true);
						$nt_agricom_wp_video 	=	'[video poster="'.$nt_agricom_image_url[0].'" mp4="'.$nt_agricom_m4v.'"  webm="'.$nt_agricom_webm.'"]';
					?>

					<div class="post-thumb"><?php echo do_shortcode ($nt_agricom_wp_video); ?></div>
					<?php endif; ?>

						<?php
							$nt_agricom_sc_color = rwmb_meta( 'nt_agricom_audio_sc_color' );
							$nt_agricom_sc_url 	= rwmb_meta( 'nt_agricom_audio_sc' );
							$nt_agricom_soundcloud_audio = '<iframe width="100%" height="166" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url='.urlencode( $nt_agricom_sc_url ).'&amp;show_comments=true&amp;auto_play=false&amp;color='.$nt_agricom_sc_color.'"></iframe>';
						?>

						<?php if($nt_agricom_sc_url!='') : ?>
							<div class="post-thumb blog-bg"><?php echo nt_agricom_sanitize_data( $nt_agricom_soundcloud_audio ); ?></div>
						<?php endif; ?>

				</div>
               <div class="col-md-4 col-md-push-1 col-sm-4 col-sm-push-1">
					<h2 class="fh5co-heading"><?php the_title(); ?></h2>

					<ul class="entry-meta portfolio">
						<li><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_time('F j, Y'); ?></a></li>
						<li><?php the_author(); ?></li>
					</ul>

					<?php the_content(); ?>
					<div class="p-b"></div>
					<?php if( $nt_agricom_services_list ) :  ?>
					<div class="fh5co-checklist">
						<h3><?php esc_html_e( 'Services' , 'nt-agricom' ); ?></h3>
						<ul>
							<?php if ( $nt_agricom_services_list !='' ) { ?>
								<?php foreach ( $nt_agricom_services_list as $item ) { ?>
									<li><?php echo esc_html( $item ); ?> </li>
								<?php } ?>
							<?php } ?>
						</ul>
					</div>
					<?php endif; ?>

                  <div class="fh5co-share">
                     <h3><?php esc_html_e( 'Share' , 'nt-agricom' ); ?></h3>
                     <ul>
						 <li><a href="http://www.facebook.com/sharer.php?u=<?php echo esc_url( get_permalink() ); ?>" target="_blank"><?php esc_html_e( 'Facebook' , 'nt-agricom' ); ?></a></li>
						 <li><a href="http://twitter.com/share?url=<?php echo esc_url( get_permalink() ); ?>" target="_blank"><?php esc_html_e( 'Twitter' , 'nt-agricom' ); ?></a></li>
						 <li><a href="https://plus.google.com/share?url=<?php echo esc_url( get_permalink() ); ?>" target="_blank"><?php esc_html_e( 'Google Plus' , 'nt-agricom' ); ?></a></li>
						 <li><a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());"><?php esc_html_e( 'Pinterest' , 'nt-agricom' ); ?></a></li>
                     </ul>
                  </div>

               </div>
