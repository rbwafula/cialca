<?php
/**
 * Custom template parts for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package nt_agricom
*/


// START PRELOADER
if ( ! function_exists( 'nt_agricom_preloader' ) ) :
	function nt_agricom_preloader() {

		if ( ot_get_option('nt_agricom_pre') != 'off' ) { ?>
			<div id="preloader">

				<?php if ( ot_get_option('nt_agricom_pre_type') == '' ) : ?>
				<div class="loader01"></div>
				<?php else : ?>
				<div class="loader<?php echo ot_get_option('nt_agricom_pre_type'); ?>"></div>
				<?php endif; ?>

			</div>
<?php
		}
	}
endif;
add_action( 'nt_agricom_preloader_action',  'nt_agricom_preloader', 10 );




// START BACKTOP
if ( ! function_exists( 'nt_agricom_backtop' ) ) :

	function nt_agricom_backtop() {

		$nt_agricom_btn_to_top = ( ot_get_option('nt_agricom_backtotop') );
		if ( $nt_agricom_btn_to_top != 'off' ) {
		 ?>
			<!-- Site Back Top -->
			<div id="btn-to-top-wrap">
				<a id="btn-to-top" class="circled" href="javascript:void(0);" data-visible-offset="1000"></a>
			</div>
			<!-- Site Back Top End -->
<?php 	}
	}
endif;
add_action( 'nt_agricom_backtop_action',  'nt_agricom_backtop', 10 );




// START LOGO
if ( ! function_exists( 'nt_agricom_logo' ) ) :

	function nt_agricom_logo() {

		$nt_agricom_logo_type 	= ( ot_get_option('nt_agricom_logo_type') );
		$nt_agricom_text_logo 	= ( ot_get_option('nt_agricom_textlogo') );
		$nt_agricom_img_logo 	= ( ot_get_option('nt_agricom_logoimg') );
	?>


		<?php // TEXT LOGO ?>
		<?php if ( ( $nt_agricom_logo_type ) == 'text' || ( $nt_agricom_logo_type ) == '') : ?>

			<?php if ( $nt_agricom_text_logo ) : ?>

				<a id="top-bar__logo" class="site-logo nt-text-logo nt-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $nt_agricom_text_logo ); ?></a>

			<?php  else : ?>

				<a id="top-bar__logo" class="site-logo nt-text-logo nt-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html_e( 'AGRICOM', 'nt-agricom' ); ?></a>

			<?php endif; ?>

		<?php endif; ?>

		<?php // IMAGE LOGO ?>
		<?php if (( $nt_agricom_logo_type ) == 'img' ) : ?>

			<?php if ( $nt_agricom_img_logo  ) : ?>

				<a id="top-bar__logo" class="site-logo nt-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"></a>

			<?php  else : ?>

				<a id="top-bar__logo" class="site-logo nt-text-logo nt-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html_e( 'AGRICOM', 'nt-agricom' ); ?></a>

			<?php endif; ?>

		<?php endif; ?>

	<?php
	}
endif;
add_action( 'nt_agricom_logo_action',  'nt_agricom_logo', 10 );


// START PRIMARY MENU
if ( ! function_exists( 'nt_agricom_menu' ) ) :
	function nt_agricom_menu() {
	?>

		<nav id="top-bar__navigation">
			<?php

				wp_nav_menu( array(
					'menu'              => 'primary',
					'theme_location'    => 'primary',
					'depth'             => 3,
					'container'         => '',
					'container_class'   => '',
					'menu_class'        => 'menu-primary',
					'menu_id'		    => 'menu-primary',
					'echo' 				=> true,
					'fallback_cb'       => 'Nt_Agricom_Wp_Bootstrap_Navwalker::fallback',
					'walker'            => new Nt_Agricom_Wp_Bootstrap_Navwalker()
				));

				do_action('nt_agricom_header_button_action');

			?>
		</nav>

	<?php
	}
endif;
add_action( 'nt_agricom_menu_action',  'nt_agricom_menu', 10 );


// START COMBINEMENU
if ( ! function_exists( 'nt_agricom_combinemenu' ) ) :
	function nt_agricom_combinemenu() {

		$nt_agricom_menu_item_name 	= 	rwmb_meta( 'nt_agricom_section_name' );
		$nt_agricom_menu_item_url 	= 	rwmb_meta( 'nt_agricom_section_url' );
		$nt_agricom_menutype 		= 	rwmb_meta( 'nt_agricom_menutype' );

		if( $nt_agricom_menutype == 'm' ) : ?>

			<nav id="top-bar__navigation">
				<?php if( $nt_agricom_menu_item_name !='' ) : ?>
					<ul class="nav">
   					<?php foreach (array_combine($nt_agricom_menu_item_name, $nt_agricom_menu_item_url) as $name => $url) {	?>
   						<li class="menu-item"><a href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $name ); ?></a></li>
   					<?php }
   						do_action('nt_agricom_header_button_action');
   					?>
					</ul>
				<?php endif; ?>
			</nav>

		<?php else : ?>

			<nav id="top-bar__navigation">
				<?php

					wp_nav_menu( array(
						'menu'              => 'primary',
						'theme_location'    => 'primary',
						'depth'             => 3,
						'container'         => '',
						'container_class'   => '',
						'menu_class'        => '',
						'menu_id'		    => '',
						'echo' 				=> true,
						'fallback_cb'       => 'Nt_Agricom_Wp_Bootstrap_Navwalker::fallback',
						'walker'            => new Nt_Agricom_Wp_Bootstrap_Navwalker()
					));

					do_action('nt_agricom_header_button_action');
				?>
			</nav>

		<?php endif;

	}
endif;
add_action( 'nt_agricom_combinemenu_action',  'nt_agricom_combinemenu', 10 );


// START METABOXMENU
if ( ! function_exists( 'nt_agricom_header_button' ) ) :
	function nt_agricom_header_button() {

		$btn           = ( ot_get_option('nt_agricom_header_top_btn_display') );
		$header_text   = ( ot_get_option('nt_agricom_header_btn') );
		$btn_link      = ( ot_get_option('nt_agricom_header_btn_link') );
		$target        = ( ot_get_option('nt_agricom_header_btn_target') );

		if ( $btn == 'on' AND $header_text != ''  ) {
	?>
			<li class="li-btn">
				<a class="custom-btn primary" target="<?php echo esc_attr( $target ); ?>" href="<?php echo esc_url( $btn_link ); ?>"><?php echo esc_html( $header_text ); ?></a>
			</li>
	<?php }
	}
endif;
add_action( 'nt_agricom_header_button_action',  'nt_agricom_header_button', 10 );


//  PAGE ADRESS SECTION
if ( ! function_exists( 'nt_agricom_page_contact_address' ) ) :
	function nt_agricom_page_contact_address() { ?>

		<div class="col-xs-12 col-md-6 bg-1">
			<div class="item">

			<?php

				$nt_agricom_address_section_title = ot_get_option( 'nt_agricom_address_section_title' );
				$nt_agricom_address_section_desc  = ot_get_option( 'nt_agricom_address_section_desc' );

			if ( $nt_agricom_address_section_title != '' || $nt_agricom_address_section_desc != '' ) : ?>

				<!-- SECTION TITLE AND DESCRIPTION -->
				<header class="item__header">

					<?php if ( $nt_agricom_address_section_title != '' ) : ?>
						<h2 class="item__title"><?php echo nt_agricom_sanitize_data( $nt_agricom_address_section_title ); ?></h2>
					<?php endif; ?>

					<?php  if ( $nt_agricom_address_section_desc != '' ) : ?>
						<p class="item__subtitle"><?php echo nt_agricom_sanitize_data( $nt_agricom_address_section_desc ); ?></p>
					<?php endif; ?>

				</header>
				<!-- /SECTION TITLE AND DESCRIPTION -->

			<?php endif;


				$nt_agricom_social = ot_get_option( 'nt_agricom_social', array() );
				$nt_agricom_address = ot_get_option( 'nt_agricom_address', array() );

				if ( ( ! empty( $nt_agricom_address ) ) || ( ! empty( $nt_agricom_social ) ) ) { ?>

				<div class="company-contacts">

					<?php

						if ( ! empty( $nt_agricom_address ) ) { ?>

							<!-- ADDRESS -->
							<address>

							<?php foreach( $nt_agricom_address as $add ) {
								if ( ! empty( $add ) ) { ?>
							<p>
								<i class="<?php echo esc_attr( $add['nt_agricom_address_icon'] ); ?>"></i>
								<?php echo nt_agricom_sanitize_data( $add['nt_agricom_address_detail'] ); ?>
							</p>

							<?php } } ?>

							</address>
							<!-- /ADDRESS -->
					<?php }

						$nt_agricom_social_target = ot_get_option( 'nt_agricom_social_target' );
						if ( ! empty( $nt_agricom_social ) ) {  ?>

						<!-- SOCIAL -->
						<div class="social-btns">
							<div class="social-btns__inner">

								<?php foreach( $nt_agricom_social as $soc ) {

									if ( ! empty( $soc ) ) {  ?>

									<a class="<?php echo esc_attr( $soc['nt_agricom_social_text'] ); ?>" href="<?php echo esc_url( $soc['nt_agricom_social_link'] ); ?>" target="<?php echo esc_attr( $nt_agricom_social_target ); ?>"></a>

								<?php } } ?>

							</div>
						</div>
						<!-- /SOCIAL -->

					<?php } ?>

				</div>
			<?php  } ?>
			</div>
		</div>

<?php }

endif;
add_action( 'nt_agricom_page_contact_address_action',  'nt_agricom_page_contact_address', 10 );


//  PAGE FORM SECTION
if ( ! function_exists( 'nt_agricom_page_contact_form' ) ) :

	function nt_agricom_page_contact_form() {

		$nt_agricom_contact_form_title = ot_get_option( 'nt_agricom_contact_form_title' );
		$nt_agricom_contact_form_desc  = ot_get_option( 'nt_agricom_contact_form_desc');

		if ( $nt_agricom_contact_form_title != '' || $nt_agricom_contact_form_desc != '' ) : ?>

			<div class="col-xs-12 col-md-6 bg-2">
				<div class="item">

					<header class="item__header">

						<?php  if ( $nt_agricom_contact_form_title != '' ) : ?>
							<h2 class="item__title"><?php echo  nt_agricom_sanitize_data( $nt_agricom_contact_form_title ); ?></h2>
						<?php endif; ?>

						<?php  if ( $nt_agricom_contact_form_desc != '' ) : ?>
							<p class="item__subtitle"><?php echo nt_agricom_sanitize_data( $nt_agricom_contact_form_desc ); ?></p>
						<?php endif; ?>

					</header>

					<?php
						if ( ot_get_option( 'nt_agricom_contact_form_shortcode' ) != '' ) :

							echo do_shortcode( ot_get_option( 'nt_agricom_contact_form_shortcode' ) );

						endif;
					?>

				</div>
			</div>

	<?php
		endif;
	}
endif;
add_action( 'nt_agricom_page_contact_form_action',  'nt_agricom_page_contact_form', 10 );


//  PAGE MAP SECTION
if ( ! function_exists( 'nt_agricom_page_contact_map' ) ) :
	function nt_agricom_page_contact_map() {

	if ( ot_get_option( 'nt_agricom_map_type' ) != 'plugin' ) {

		wp_enqueue_script('nt-agricom-map');
		wp_localize_script('nt-agricom-map', 'prefix',
		array(
			'apikey' => ot_get_option( 'nt_agricom_map_api' ),
		));

			$nt_agricom_map_longitude 	= ( ot_get_option( 'nt_agricom_map_longitude' ) != '' ) ? ot_get_option( 'nt_agricom_map_longitude' ) : 44.958309;
			$nt_agricom_map_latitude 	= ( ot_get_option( 'nt_agricom_map_latitude' ) != '' ) 	? ot_get_option( 'nt_agricom_map_latitude' ) : 34.109925;
			$nt_agricom_map_marker 		= ( ot_get_option( '$nt_agricom_map_marker' ) != '' ) 	? ot_get_option( '$nt_agricom_map_marker' ) : get_template_directory_uri() . '/images/marker.png';


		if ( $nt_agricom_map_longitude != '' && $nt_agricom_map_latitude != '' ) { ?>

			<div class="col-xs-12">
				<div class="item map-container">
					<div class="g_map" data-longitude="<?php echo esc_attr( $nt_agricom_map_longitude ); ?>" data-latitude="<?php echo esc_attr( $nt_agricom_map_latitude ); ?>" data-marker="<?php echo esc_url( $nt_agricom_map_marker ); ?>"></div>
				</div>
			</div>

<?php 	}

	}else{

		if ( ot_get_option( 'nt_agricom_contact_map_shortcode' ) != '' ) { ?>

			<div class="col-xs-12">
				<div class="item map-container">
					<?php echo do_shortcode( ot_get_option( 'nt_agricom_contact_map_shortcode' ) ); ?>
				</div>
			</div>

	<?php
		}
	}
}
endif;
add_action( 'nt_agricom_page_contact_map_action',  'nt_agricom_page_contact_map', 10 );


//  PAGE BEFORE CONTACT SECTION
if ( ! function_exists( 'nt_agricom_page_before_contact' ) ) :
	function nt_agricom_page_before_contact() { ?>

	<section class="section-contact">
		<div class="container-fluid">
			<div class="row">

<?php }

endif;
add_action( 'nt_agricom_page_before_contact_action',  'nt_agricom_page_before_contact', 10 );


//  PAGE AFTER CONTACT SECTION
if ( ! function_exists( 'nt_agricom_page_after_contact' ) ) :
	function nt_agricom_page_after_contact() { ?>

			</div>
		</div>
	</section>

<?php }

endif;
add_action( 'nt_agricom_page_after_contact_action',  'nt_agricom_page_after_contact', 10 );


//  FOOTER BEFORE
if ( ! function_exists( 'nt_agricom_before_footer' ) ) :
	function nt_agricom_before_footer() {

	$nt_agricom_custompage_footer_style = get_post_meta( get_the_ID(), 'nt_agricom_custompage_footer_style', true );
	if ( is_page_template( 'custom-page.php' ) || is_page_template( 'one-page-template.php' ) ) {
		$nt_agricom_footer_style = $nt_agricom_custompage_footer_style;
	}else{
		$nt_agricom_footer_style = ot_get_option('nt_agricom_footer_style');
	}
	?>

		<?php if ( $nt_agricom_footer_style == 'style1') :  ?>
		<footer id="footer" class="footer--style-1 footer-widgetize">
			<div class="footer__inner">
				<div class="container">

		<?php elseif ( $nt_agricom_footer_style == 'style2') :  ?>
		<a id="spy-get-in-touch" class="ancor"></a>
		<footer id="footer" class="footer--style-2 footer--dark footer-widgetize">
			<div class="footer__inner">
				<div class="container">

		<?php else :  ?>
		<footer id="footer" class="footer--style-3 footer-widgetize">
			<div class="footer__inner">
				<div class="container">

		<?php endif;

	}

endif;
add_action( 'nt_agricom_before_footer_action',  'nt_agricom_before_footer', 10 );


//  FOOTER AFTER
if ( ! function_exists( 'nt_agricom_after_footer' ) ) :
	function nt_agricom_after_footer() { ?>

				</div>
			</div>
		</footer>

<?php }

endif;
add_action( 'nt_agricom_after_footer_action',  'nt_agricom_after_footer', 10 );


// START WIDGETIZE FOOTER
if ( ! function_exists( 'nt_agricom_widgetize' ) ) :
	function nt_agricom_widgetize() {

		if ( ot_get_option('nt_agricom_widgetize') != 'off') :

			$nt_agricom_custompage_footer_style = get_post_meta( get_the_ID(), 'nt_agricom_custompage_footer_style', true );
			if ( is_page_template( 'custom-page.php' ) || is_page_template( 'one-page-template.php' ) ) {
				$nt_agricom_footer_style = $nt_agricom_custompage_footer_style;
			}else{
				$nt_agricom_footer_style = ot_get_option('nt_agricom_footer_style');
			}

			if ( $nt_agricom_footer_style == 'style2' ) {

				if ( is_active_sidebar( 'nt_agricom_footer_widgetize2' ) ) { ?>
					<div class="row">
						<?php dynamic_sidebar( 'nt_agricom_footer_widgetize2' ); ?>
					</div>

		<?php
				}
			}elseif ( $nt_agricom_footer_style == 'style3' ) {

				if ( is_active_sidebar( 'nt_agricom_footer_widgetize3' ) ) { ?>
					<div class="row">
						<?php dynamic_sidebar( 'nt_agricom_footer_widgetize3' ); ?>
					</div>

		<?php
				}
			}else {

				if ( is_active_sidebar( 'nt_agricom_footer_widgetize' ) ) { ?>
					<div class="row">
						<?php dynamic_sidebar( 'nt_agricom_footer_widgetize' ); ?>
					</div>

		<?php
				}
			}

		endif;
	}
endif;
add_action( 'nt_agricom_widgetize_action',  'nt_agricom_widgetize', 10 );

// START FOOTER COPYRIGHT
if ( ! function_exists( 'nt_agricom_copyright' ) ) :
	function nt_agricom_copyright() {

		if ( ot_get_option('nt_agricom_copyright_display') != 'off') :

			$nt_agricom_copyright = ot_get_option('nt_agricom_copyright');

			if ( ot_get_option('nt_agricom_copyright') != '' ) :

				if ( ot_get_option('nt_agricom_footer_style') == 'style1') :  ?>

					<div class="footer-item copyright">
						<?php echo nt_agricom_sanitize_data( $nt_agricom_copyright ); ?>
					</div>

				<?php elseif ( ot_get_option('nt_agricom_footer_style') == 'style2') :  ?>

					<div class="footer-item copyright">
						<?php echo nt_agricom_sanitize_data( $nt_agricom_copyright ); ?>
					</div>

				<?php else :

					echo nt_agricom_sanitize_data( $nt_agricom_copyright );

				endif;

			else :  ?>

				<p class="copy copyright"><?php echo esc_html_e( '2019 Ninetheme. All rights reserved', 'nt-agricom' ); ?></p>

	<?php 	endif;

		endif;
	}

endif;
add_action( 'nt_agricom_copyright_action',  'nt_agricom_copyright', 10 );


// START SINGLE HEADER STYLE1
if ( ! function_exists( 'nt_agricom_single_header' ) ) :
	function nt_agricom_single_header() {

		$nt_agricom_bread_display			= 	ot_get_option( 'nt_agricom_bread_display' );
		$nt_agricom_single_heading_display 	= 	ot_get_option( 'nt_agricom_single_heading_display' );
		$nt_agricom_single_category_display = 	ot_get_option( 'nt_agricom_single_category_display' );
		$nt_agricom_single_date_display 	= 	ot_get_option( 'nt_agricom_single_date_display' );

		 $num_comments = get_comments_number(); // get_comments_number returns only a numeric value

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
			global $post;
			// taxonomies post
			$terms = get_the_terms( $post->ID, 'gallery' );
			if ( $terms && ! is_wp_error( $terms ) ) :
				$links = array();
				foreach ( $terms as $term ){
					$links[] = $term->name;
				}
				$tax 	= join( " | ", $links );
			else :
				$tax = '';
			endif;

?>

		<header class="index-header intro flex-items-xs-middle parallax" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="300" data-stellar-offset-parent="true">

			<div class="template-overlay pattern"></div>

			<div class="container">

				<div class="intro__text template-cover-text">

					<?php if( $nt_agricom_single_heading_display != 'off' ) : ?>
						<h1 class="intro__title uppercase"><?php echo the_title();?></h1>
					<?php endif; ?>

					<?php if( $nt_agricom_single_date_display !=='off' ) : ?>
						<p class="intro__post-date"><?php the_time('F j, Y') ?> | <?php echo nt_agricom_sanitize_data( $write_comments ); ?> </p>
					<?php endif; ?>

				</div>

				<?php if( $nt_agricom_bread_display != 'off' ) : ?>
					<?php if( function_exists( 'bcn_display' ) ) : ?>
						<p class="breadcrubms"> <?php bcn_display(); ?></p>
					<?php endif; ?>
				<?php endif; ?>

			</div>
		</header>

<?php }

endif;
add_action( 'nt_agricom_single_header_action',  'nt_agricom_single_header', 10 );


// START BEFORE DEFAULT POST SINGLE
if ( ! function_exists( 'nt_agricom_before_post_single' ) ) :
	function nt_agricom_before_post_single() {

	$nt_agricom_post_layout = ot_get_option( 'nt_agricom_post_layout' ); ?>

	<section id="blog">
		<div class="container has-margin-bottom">
			<div class="row">

				<!-- right sidebar -->
				<?php if( ( $nt_agricom_post_layout ) == 'right-sidebar' || ( $nt_agricom_post_layout ) == '') { ?>
				<div class="col-lg-8 col-md-8 col-sm-12 index float-right posts">

				<!-- left sidebar -->
				<?php } elseif( ( $nt_agricom_post_layout ) == 'left-sidebar') { ?>
				<?php get_sidebar(); ?>
				<div class="col-lg-8 col-md-8 col-sm-12 index float-left posts">

				<!-- no sidebar -->
				<?php } elseif( ( $nt_agricom_post_layout ) == 'full-width') { ?>
				<div class="col-xs-12 full-width-index v">
				<?php }

	}

endif;

add_action( 'nt_agricom_before_post_single_action',  'nt_agricom_before_post_single', 10 );


// START AFTER DEFAULT POST SINGLE

if ( ! function_exists( 'nt_agricom_after_post_single' ) ) :
	function nt_agricom_after_post_single() {

	$nt_agricom_post_layout = ot_get_option( 'nt_agricom_post_layout' ); ?>

				</div><!-- #end sidebar+ content -->

				<!-- right sidebar -->
				<?php if( ( $nt_agricom_post_layout ) == 'right-sidebar' || ( $nt_agricom_post_layout ) == '') { ?>
					<?php get_sidebar(); ?>
				<?php } ?>

			</div>
		</div>
	</section>

<?php }

endif;

add_action( 'nt_agricom_after_post_single_action',  'nt_agricom_after_post_single', 10 );


// START BEFORE CPT SINGLE
if ( ! function_exists( 'nt_agricom_before_cpt_single' ) ) :
	function nt_agricom_before_cpt_single() {

?>
		<main>
			<section class="section">
				<div class="container">
					<div class="blog single-content">
						<div class="row flex-items-md-center">
							<div class="col-md-10">
	<?php

	}

endif;

add_action( 'nt_agricom_before_cpt_single_action',  'nt_agricom_before_cpt_single', 10 );

// START AFTER CPT SINGLE

if ( ! function_exists( 'nt_agricom_after_cpt_single' ) ) :
	function nt_agricom_after_cpt_single() {

 ?>

							</div>
						</div>
					</div>
				</div>
			</section>
		</main>

<?php }

endif;

add_action( 'nt_agricom_after_cpt_single_action',  'nt_agricom_after_cpt_single', 10 );


// Start nt_agricom_formats_content

if ( ! function_exists( 'nt_agricom_formats_content' ) ) :
	function nt_agricom_formats_content() {

		$meta_display = is_single() ? ot_get_option( 'nt_agricom_post_meta_display' ) : 'on';
		$date_display = is_single() ? ot_get_option( 'nt_agricom_post_date_display' ) : 'on';
		$cat_display = is_single() ? ot_get_option( 'nt_agricom_post_cat_display' ) : 'on';
		$author_display = is_single() ? ot_get_option( 'nt_agricom_post_author_display' ) : 'on';
		$tags_display = is_single() ? ot_get_option( 'nt_agricom_post_tags_display' ) : 'on';

		$readbutton_display = ot_get_option( 'nt_agricom_readbutton_display' );
		$readbutton = ot_get_option( 'nt_agricom_readbutton' );
		$readtarget = ot_get_option( 'nt_agricom_read_btn_target' );
		$shareicon_display = ot_get_option( 'nt_agricom_post_share_display' );
		$facebook_display = ot_get_option( 'nt_agricom_post_facebook_display' );
		$twitter_display = ot_get_option( 'nt_agricom_post_twitter_display' );
		$google_display = ot_get_option( 'nt_agricom_post_google_display' );
		$digg_display = ot_get_option( 'nt_agricom_post_digg_display' );
		$reddit_display = ot_get_option( 'nt_agricom_post_reddit_display' );
		$linkedin_display = ot_get_option( 'nt_agricom_post_linkedin_display' );
		$pinterest_display = ot_get_option( 'nt_agricom_post_pinterest_display' );
		$stumbleupon_display = ot_get_option( 'nt_agricom_post_stumbleupon_display' );
	?>

	<div class="post-container nt-theme-post-container">

		<div class="content-container">
			<div class="entry-header">
				<?php
					if ( ! is_single() ) :
						the_title( sprintf( '<h2 class="entry-title all-caps"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
					endif;
				?>
			</div><!-- .entry-header -->
			<?php if ( $meta_display != 'off' ) : ?>
				<ul class="entry-meta">

					<?php if ( $date_display != 'off' ) : ?>
						<li><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_time('F j, Y'); ?></a></li>
					<?php endif; ?>

					<?php if ( $cat_display != 'off' ) : ?>
						<li><?php esc_html_e('in', 'nt-agricom'); ?>  <?php the_category(', '); ?></li>
					<?php endif; ?>

					<?php if ( $author_display != 'off' ) : ?>
						<li><?php the_author(); ?></li>
					<?php endif; ?>

					<?php
						if ( $tags_display != 'off' ) :
							 the_tags( '<li>', ', ', '</li> ');
						endif;
					?>
				</ul>
			<?php endif; ?>
		</div>

		<div class="entry-content">

			<?php

				if ( is_single() ) :
					the_content();
					else :
					the_excerpt();
				endif ;

				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'nt-agricom' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'nt-agricom' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				) );

			?>

		</div><!-- .entry-content -->

		<?php if ( ! is_single() ) : ?>
			<?php if ( $readbutton_display !='off' ) : ?>
				<?php if ( $readbutton !='' ) : ?>
					<a id="blog-more-btn" class="custom-btn big primary" href="<?php echo esc_url( get_permalink() ); ?>" target="<?php echo esc_attr($readtarget) ?>"><?php echo esc_html($readbutton); ?></a>
				<?php else: ?>
					<a id="blog-more-btn" class="custom-btn big primary" href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e('Read more', 'nt-agricom'); ?></a>
				<?php endif; ?>
			<?php endif; ?>
		<?php endif; // is_single() ?>

		<?php if ( is_single() && $shareicon_display !='off' ) : ?>

			<div id="share-buttons">
				<?php if ( $facebook_display !='off' ) : ?>
				<a href="http://www.facebook.com/sharer.php?u=<?php echo esc_url( get_permalink() ); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
				<?php endif; ?>
				<?php if ( $twitter_display !='off' ) : ?>
				<a href="http://twitter.com/share?url=<?php echo esc_url( get_permalink() ); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
				<?php endif; ?>
				<?php if ( $google_display !='off' ) : ?>
				<a href="https://plus.google.com/share?url=<?php echo esc_url( get_permalink() ); ?>" target="_blank"><i class="fa fa-google-plus"></i></a>
				<?php endif; ?>
				<?php if ( $digg_display !='off' ) : ?>
				<a href="http://www.digg.com/submit?url=<?php echo esc_url( get_permalink() ); ?>" target="_blank"><i class="fa fa-digg"></i></a>
				<?php endif; ?>
				<?php if ( $reddit_display !='off' ) : ?>
				<a href="http://reddit.com/submit?url=<?php echo esc_url( get_permalink() ); ?>" target="_blank"><i class="fa fa-reddit"></i></a>
				<?php endif; ?>
				<?php if ( $linkedin_display !='off' ) : ?>
				<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo esc_url( get_permalink() ); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
				<?php endif; ?>
				<?php if ( $pinterest_display !='off' ) : ?>
				<a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());"><i class="fa fa-pinterest"></i></a>
				<?php endif; ?>
				<?php if ( $stumbleupon_display !='off' ) : ?>
				<a href="http://www.stumbleupon.com/submit?url=<?php echo esc_url( get_permalink() ); ?>" target="_blank"><i class="fa fa-stumbleupon"></i></a>
				<?php endif; ?>
			</div>

		<?php endif; ?>

	</div>

	<?php
	}
endif;

add_action( 'nt_agricom_formats_content_action',  'nt_agricom_formats_content', 10 );
