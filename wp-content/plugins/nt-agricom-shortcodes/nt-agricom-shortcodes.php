<?php

/*
Plugin Name: NT Agricom Shortcodes
Plugin URI: http://themeforest.net/user/Ninetheme
Description: Shortcodes for Ninetheme WordPress Themes - NT-Attorneys Version
Version: 1.3.8
Author: Ninetheme
Author URI: http://themeforest.net/user/Ninetheme
*/

	require_once plugin_dir_path(__FILE__) . 'aq_resizer.php';
	
	add_action( 'vc_after_init', function () {
		require_once plugin_dir_path(__FILE__) . 'agricom-google-font-class.php';
	} );
	
	/*********************************************************
	* TEAM POST TYPE
	/********************************************************/

	function nt_agricom_team_cpt()
	{
		$team_display = ot_get_option( 'nt_agricom_cpt1_display' );
		$team_slug = ot_get_option( 'nt_agricom_cpt1' );
		$team_name = $team_slug != '' ? $team_slug : 'Team';

		if( 'off' != $team_display ){
			return esc_html( $team_name );
		} else {
			return false;
		}

	}
	add_action( 'after_setup_theme', 'nt_agricom_team_cpt' );


	function nt_agricom_register_cpts_team()
	{

		if ( nt_agricom_team_cpt() ) {

			$cpt1_has_archive = ot_get_option( 'nt_agricom_cpt1_has_archive' );
			$cpt1_has_archive = $cpt1_has_archive != 'off' ? true : false;
			/**
			* Post Type: Team.
			*/

			$labels = array(
				"name" => esc_html__( nt_agricom_team_cpt(), "nt-agricom" ),
				"singular_name" => esc_html__( nt_agricom_team_cpt(), "nt-agricom" ),
				"menu_name" => esc_html__( nt_agricom_team_cpt(), "nt-agricom" ),
				"all_items" => esc_html__( "All ".nt_agricom_team_cpt(), "nt-agricom" ),
				"add_new" => esc_html__( "Add ".nt_agricom_team_cpt(), "nt-agricom" ),
				"add_new_item" => esc_html__( "Add New ".nt_agricom_team_cpt(), "nt-agricom" ),
				"edit_item" => esc_html__( "Edit ".nt_agricom_team_cpt(), "nt-agricom" ),
			);

			$args = array(
				"label" => esc_html__( nt_agricom_team_cpt(), "nt-agricom" ),
				"labels" => $labels,
				"description" => "",
				"public" => true,
				"publicly_queryable" => true,
				"show_ui" => true,
				"delete_with_user" => false,
				"show_in_rest" => false,
				"rest_base" => "",
				"rest_controller_class" => "WP_REST_Posts_Controller",
				"has_archive" => $cpt1_has_archive != 'off' ? true : false,
				"show_in_menu" => true,
				"show_in_nav_menus" => true,
				"exclude_from_search" => false,
				"capability_type" => "post",
				"map_meta_cap" => true,
				"hierarchical" => false,
				"rewrite" => array( "slug" => "team", "with_front" => true ),
				"query_var" => true,
				"supports" => array( "title", "editor", "thumbnail", "excerpt" ),
			);

			register_post_type( "team", $args );


			/**
			* Taxonomy: Team Tags.
			*/

			$labels = array(
				"name" => esc_html__( nt_agricom_team_cpt()." Tags", "nt-agricom" ),
				"singular_name" => esc_html__( nt_agricom_team_cpt()." Tags", "nt-agricom" ),
			);

			$args = array(
				"label" => esc_html__( nt_agricom_team_cpt()." Tags", "nt-agricom" ),
				"labels" => $labels,
				"public" => true,
				"publicly_queryable" => true,
				"hierarchical" => true,
				"show_ui" => true,
				"show_in_menu" => true,
				"show_in_nav_menus" => true,
				"query_var" => true,
				"rewrite" => array( 'slug' => "team", 'with_front' => true, ),
				"show_admin_column" => true,
				"show_in_rest" => true,
				"rest_base" => "team",
				"rest_controller_class" => "WP_REST_Terms_Controller",
				"show_in_quick_edit" => true,
			);

			register_taxonomy( "team", array( "team" ), $args );
		}

	}

	add_action( 'init', 'nt_agricom_register_cpts_team' );



	/*********************************************************
	* GALLERY POST TYPE
	/********************************************************/

	function nt_agricom_gallery_cpt()
	{
		$gallery_display = ot_get_option( 'nt_agricom_cpt2_display' );
		$gallery_slug = ot_get_option( 'nt_agricom_cpt2' );
		$gallery_name = $gallery_slug != '' ? esc_html( $gallery_slug ) : 'Gallery';

		if( 'off' != $gallery_display ){
			return esc_html( $gallery_name );
		} else {
			return false;
		}

	}
	add_action( 'after_setup_theme', 'nt_agricom_gallery_cpt' );

	function nt_agricom_register_cpts_gallery()
	{
		if ( nt_agricom_gallery_cpt() ) {

			$cpt2_has_archive = ot_get_option( 'nt_agricom_cpt2_has_archive' );
			$cpt2_has_archive = $cpt2_has_archive != 'off' ? 1 : 0;

			/**
			* Post Type: Gallery.
			*/

			$labels = array(
				"name" => esc_html__( nt_agricom_gallery_cpt(), "nt-agricom" ),
				"singular_name" => esc_html__( nt_agricom_gallery_cpt(), "nt-agricom" ),
				"menu_name" => esc_html__( "My ".nt_agricom_gallery_cpt(), "nt-agricom" ),
				"all_items" => esc_html__( "All ".nt_agricom_gallery_cpt(), "nt-agricom" ),
				"add_new" => esc_html__( "Add ".nt_agricom_gallery_cpt(), "nt-agricom" ),
				"add_new_item" => esc_html__( "Add New ".nt_agricom_gallery_cpt(), "nt-agricom" ),
				"edit_item" => esc_html__( "Edit ".nt_agricom_gallery_cpt(), "nt-agricom" ),
			);

			$args = array(
				"label" => esc_html__( nt_agricom_gallery_cpt(), "nt-agricom" ),
				"labels" => $labels,
				"description" => "",
				"public" => true,
				"publicly_queryable" => true,
				"show_ui" => true,
				"delete_with_user" => false,
				"show_in_rest" => true,
				"rest_base" => "",
				"rest_controller_class" => "WP_REST_Posts_Controller",
				"has_archive" => $cpt2_has_archive != 'off' ? true : false,
				"show_in_menu" => true,
				"show_in_nav_menus" => true,
				"exclude_from_search" => true,
				"capability_type" => "post",
				"map_meta_cap" => true,
				"hierarchical" => false,
				"rewrite" => array( "slug" => "gallery", "with_front" => true ),
				"query_var" => true,
				"supports" => array( "title", "editor", "thumbnail", "excerpt" ),
				"taxonomies" => array( "post_tag", "gallery" ),
			);
			register_post_type( "gallery", $args );

			/**
			* Taxonomy: Gallery Category.
			*/

			$labels = array(
				"name" => esc_html__( nt_agricom_gallery_cpt()." Category", "nt-agricom" ),
				"singular_name" => esc_html__( nt_agricom_gallery_cpt()." Categories", "nt-agricom" ),
			);

			$args = array(
				"label" => esc_html__( nt_agricom_gallery_cpt()." Category", "nt-agricom" ),
				"labels" => $labels,
				"public" => true,
				"publicly_queryable" => true,
				"hierarchical" => true,
				"show_ui" => true,
				"show_in_menu" => true,
				"show_in_nav_menus" => true,
				"query_var" => true,
				"rewrite" => array( 'slug' => 'gallery', 'with_front' => true, 'hierarchical' => true, ),
				"show_admin_column" => true,
				"show_in_rest" => true,
				"rest_base" => "gallery",
				"rest_controller_class" => "WP_REST_Terms_Controller",
				"show_in_quick_edit" => true,
			);

			register_taxonomy( "gallery", array( "gallery" ), $args );
		}
	}

	add_action( 'init', 'nt_agricom_register_cpts_gallery' );




/*************************************************
## Word Limiter
*************************************************/
function nt_agricom_limit_words($string, $limit) {
	$words = explode(' ', $string);
	return implode(' ', array_slice($words, 0, $limit));
}


//element animation if have it
if ( ! function_exists( 'nt_agricom_animation' ) ) {
    function nt_agricom_animation( $animation ) {

			if ( $animation !='' ) {
				$animation = ' wow '.$animation.'';
			}
			else{ $animation = ''; }
        return $animation;
    }
}

//text font-size and color for custom style
if ( ! function_exists( 'nt_agricom_element' ) ) {
    function nt_agricom_element( $agricomdata='', $tag='', $class='', $lineh='', $fsize='', $color='', $extra='' ) {

		if ( ( isset( $agricomdata ) ) && ( $agricomdata != '' ) ) {

			$agricomdata = function_exists( 'nt_agricom_sanitize_data' ) ? nt_agricom_sanitize_data( $agricomdata ) : $agricomdata;

			$el_tag 	= ( isset( $tag    ) && $tag  	!= '' ) ? esc_attr( $tag ) : '';
			$el_class 	= ( isset( $class  ) && $class  != '' ) ? ' class="'.esc_attr( $class ).'"' : '';
			$lineheight = ( isset( $lineh  ) && $lineh  != '' ) ? ' line-height:'.esc_attr( $lineh ).'px ;' 	: '';
			$fontsize 	= ( isset( $fsize  ) && $fsize  != '' ) ? ' font-size:'.esc_attr( $fsize ).'px;' 	: '';
			$fontcolor 	= ( isset( $color  ) && $color  != '' ) ? ' color:'.esc_attr( $color ).' !important;' 			: '';

			if ( $fontsize != '' || $fontcolor != '' || $lineheight != '' || $extra != '' ){

				$style = ' style="'.$fontsize.$fontcolor.$lineheight.$extra.'"';

			}else{
				$style = '';
			}

			if ( $el_tag != '' ){

				$element = '<'.$el_tag.''.$el_class.''.$style.'>'.$agricomdata.'</'.$el_tag.'>';

			}else{

				$element = $agricomdata;

			}

		}else{

			return false;

		}

        return $element;
    }
}
//text font-size and color for custom style
if ( ! function_exists( 'nt_agricom_icon' ) ) {
    function nt_agricom_icon( $iconclass='', $iconsize='', $iconcolor='' ) {

		if ( ( isset( $iconclass  ) ) && ( $iconclass  != '' ) ){

			$icon_class = ( isset( $iconclass  ) && $iconclass  != '' ) ? ' class="'.esc_attr( $iconclass ).'"' 		: '';
			$icon_size 	= ( isset( $iconsize   ) && $iconsize   != '' ) ? ' font-size:'.esc_attr( $iconsize ).'px;' 	: '';
			$icon_color = ( isset( $iconcolor  ) && $iconcolor  != '' ) ? ' color:'.esc_attr( $iconcolor ).';' 			: '';

			if ( $icon_size != '' || $icon_color != '' ){

				$iconstyle = ' style="'.$icon_size.''.$icon_color.'"';

			}else{
				$iconstyle = '';
			}

			$agricom_icon = '<i'.$icon_class.''.$iconstyle.'></i>';

			return $agricom_icon;

		}else{

			return false;

		}

    }
}
//button function
if ( ! function_exists( 'nt_agricom_btn' ) ) {
    function nt_agricom_btn( $btntitle='', $btntarget='', $btnhref='', $btnclass='', $btnbg='', $btncolor='' ) {


		if ( ( isset( $btntitle ) ) && ( $btntitle != '' ) ) {

			$btn_class 	= ( isset( $btnclass  ) && $btnclass  != ''  ) 	? 	' class="'.esc_attr( $btnclass ).'"' 		: '';
			$btn_bg 	= ( isset( $btnbg 	  ) && $btnbg 	  != ''  ) 	? 	' background-color:'.esc_attr( $btnbg ).';' : '';
			$btn_color 	= ( isset( $btncolor  ) && $btncolor  != ''  ) 	? 	' color:'.esc_attr( $btncolor ).';' 		: '';
			$btn_href 	= ( isset( $btnhref   ) && $btnhref   != ''  ) 	? 	' href="'.esc_url( $btnhref ).'"' 			: '';
			$btn_target = ( isset( $btntarget ) && $btntarget != ''  ) 	? 	' target="'.esc_attr( $btntarget ).'"' 		: '';

			if ( $btn_bg != '' || $btn_color != '' ){

				$btn_style = ' style="'.$btn_bg.''.$btn_color.'"';

			}
			else{ $btn_style = '';}

			if ( $btntitle != '' ) {

				$button = '<a'.$btn_class.''.$btn_href.''.$btn_target.''.$btn_style.'>'.esc_html( $btntitle ).'</a>';

			}else{

				$button = '';

			}

			return $button;

		}else{

			return false;
		}
    }
}
//button function
if ( ! function_exists( 'nt_agricom_img' ) ) {
    function nt_agricom_img( $imgsrc='', $imgclass='', $imgwidth='', $imgheight='' ) {

		if ( ( isset( $imgsrc ) ) && ( $imgsrc != '' ) ) {

			// Gets url of the image
			$image = wp_get_attachment_url( $imgsrc,'full' );
			// Gets the Image Alt
			$image_alt = get_post_meta( $imgsrc, '_wp_attachment_image_alt', true );
			// Gets the image name with exstention
			$image_filename = basename ( get_attached_file( $imgsrc ) );
			// Gets the image name without exstention
			$image_title = get_the_title( $imgsrc );

			if (  $image_alt != '' ) {
				$imagealt = $image_alt;
			}else{
				$imagealt = $image_filename;
			}

			$img_src 	= ( isset( $imgsrc    ) && $imgsrc    != '' ) 	? 	' src="'.esc_url( $image ).'"' 			: '';
			$img_class 	= ( isset( $imgclass  ) && $imgclass  != '' ) 	? 	' class="'.esc_attr( $imgclass ).'"' 	: '';
			$img_width 	= ( isset( $imgwidth  ) && $imgwidth  != '' ) 	? 	' width="'.esc_attr( $imgwidth ).'"' 	: '';
			$img_height = ( isset( $imgheight ) && $imgheight != '' ) 	? 	' height="'.esc_attr( $imgheight ).'"' 	: '';
			$img_alt 	= ( $imagealt != '' ) ? ' alt="'.esc_attr( $imagealt ).'"' : '';

			$image 	= '<img'.$img_src . $img_class . $img_width . $img_height . $img_alt.'>';

			return $image;
		}
		else{
			return false;
		}
    }
}


/*-----------------------------------------------------------------------------------*/
/*	HERO SLIDER agricom
/*-----------------------------------------------------------------------------------*/
function theme_nt_agricom_section_heroslider( $atts, $content = null ) {
	extract( shortcode_atts(array(
		"overlayimg"=> '',
		"sloop"		=> '',
		"usevideo"	=> '',
		"vurl"		=> '',
		"mute"		=> '',
		"hideautoplay" => '',
		"hidenav"	=> '',
		"hidedots"	=> '',
		"talign"	=> '',
		"container"	=> '',
		"lgcol"	    => '',
		"xlcol"	    => '',
		"img"       => '',
		"layerloop"	=> '',
		"layer"		=> '',
		"delay"		=> '',
		"duration"		=> '',
		"title"		=> '',
		"tlineh"	=> '',
		"tsize"		=> '',
		"tcolor"	=> '',
		//btn
		"link"		=> '',
		"btnsize"	=> '',
		"btnstyle"	=> '',
		"btncolor"	=> '',
		"btnbg"		=> '',
		"btnborder"	=> '',
		"prev"	    => 'Prev',
		"next"	    => 'Next',
		"useicon"	=> '',
		"icontype"	=> '',
		"iconsize"	=> '',
		"iconstyle"	=> '',
		"iconspace"	=> '',
		'usefontss' => '',
        'google_fonts' => '',
        'htag' => '',
	), $atts) );

	wp_enqueue_script( 'vegas' );

	$slider_loop = (array) vc_param_group_parse_atts($sloop);

	$delays = $delay ? $delay : 1000;
	$hide_autoplay = $hideautoplay == 'yes' ? 'false' : 'true';
	$hide_dots = $hidedots == 'yes' ? 'false' : 'true';


	$uniq = 'item_'.uniqid();
	$item_css = array();

	$item_css = ! empty($item_css) ? ' data-res-css="'. implode(' ', $item_css) .'"'  : '';
	$uniq = $item_css ? ' '.$uniq  : '';

	$out = '';

	if( !empty( $slider_loop ) ){

		$btn_bg  = ( isset( $l['btnbg'] ) !='' ) ? ' background-color:'.$l['btnbg'].';' : '';

		$out .= '<header id="start-screen" class="start-screen--style-1">';

			$out .= '<div id="vegas-slider" data-dots="'.$hide_dots.'">';

			if( $hidenav != 'yes' ){

				$out .= '<div class="vegas-control">';
					if( $useicon == 'yes' ){
						$icontype = $icontype ? $icontype : '';
						$iconsize = $iconsize ? ' '.$iconsize : ' fa-3x';
						$iconstyle = $iconstyle ? ' '.$iconstyle : '';
						$iconspace = $iconspace ? ' '.$iconspace : '';
						$out .= '<span id="vegas-control__prev" class="vegas-control__btn font-icon'.$iconspace.'"><i class="fa fa-'.$icontype.'-left'.$iconsize.$iconstyle.'"></i></span>';
						$out .= '<span id="vegas-control__next" class="vegas-control__btn font-icon'.$iconspace.'"><i class="fa fa-'.$icontype.'-right'.$iconsize.$iconstyle.'"></i></span>';
					} else {
						$out .= '<span id="vegas-control__prev" class="vegas-control__btn">'.$prev.'</span>';
						$out .= '<span id="vegas-control__next" class="vegas-control__btn">'.$next.'</span>';
					}
				$out .= '</div>';
			}

			$out .= '</div>';

			$out .= '<div id="start-screen_content-container">';

			foreach ( $slider_loop as $s ) {
				$container = ( isset( $s['container'] ) !='' ) ? $s['container'] : 'container';
				$talign = ( isset( $s['talign'] ) !='' ) ? $s['talign'] : 'text-center';
				$v_align = ( isset( $s['valign'] ) !='' ) ? $s['valign'] : 'v-middle';
				$lg_col = ( isset( $s['lgcol'] ) !='' ) ? $s['lgcol'] : '10';
				$xl_col = ( isset( $s['xlcol'] ) !='' ) ? $s['xlcol'] : '8';
				$out .= '<div class="start-screen__content start-screen__content-second">';
					$out .= '<div class="v-align">';
						$out .= '<div class="'.$v_align.'">';
							$out .= '<div class="'.$container.'">';
								$out .= '<div class="row flex-items-md-center '.$talign.'">';
									$out .= '<div class="col-xs-12 col-lg-'.$lg_col.' col-xl-'.$xl_col.'">';

								$layer_loop = (array) vc_param_group_parse_atts($s['layerloop']);

								if( !empty( $layer_loop ) ){

									foreach ( $layer_loop as $l ) {

										$tlineh = ( isset( $l['tlineh'] ) !='' ) ? $l['tlineh'] : '';
										$tsize 	= ( isset( $l['tsize'] 	) !='' ) ? $l['tsize'] 	: '';
										$tcolor = ( isset( $l['tcolor'] ) !='' ) ? $l['tcolor'] : '';
										
										$htag = 'p';
										$extra = '';
										
										if ( isset($l['usefontss']) == 'yes' && isset($l['google_fonts']) !='') {
											$google = new WPBakeryShortCode_Vc_Custom_Google_Fonts();
											$extra = isset( $l['google_fonts'] ) !='' && $l['google_fonts'] !='font_family:Abril%20Fatface%3Aregular' ? $google->content( $l['google_fonts'] ) : '';
											$htag = isset($l['htag']) !='' ? $l['htag'] : 'p';
										}
										
										if( $l['layer'] =='title' ){
											
											if ( isset( $l['title'] ) !='' ){ 
												$out .= nt_agricom_element( $heading=$l['title'], $tag=$htag, $class='title', $tlineh, $tsize, $tcolor, $extra );
											}

										}elseif( $l['layer'] =='subtitle' ){

											if ( isset( $l['title'] ) !='' ){ 
												$out .= nt_agricom_element( $heading=$l['title'], $tag=$htag, $class='subtitle', $tlineh, $tsize, $tcolor, $extra ); 
											}

										}elseif( $l['layer'] =='text' ){

											if ( isset( $l['title'] ) !='' ){ 
												$out .= nt_agricom_element( $heading=$l['title'], $tag=$htag, $class='', $tlineh, $tsize, $tcolor, $extra ); 
											}

										}elseif( $l['layer'] =='button' ){

											if ( ! empty( $l['link'] ) ) {

												$btn_size   = ( isset( $l['btnsize'] 	) !='' ) ? $l['btnsize'] : '';
												$btn_style  = ( isset( $l['btnstyle'] 	) !='' ) ? $l['btnstyle'] : 'primary';
												$btn_color  = ( isset( $l['btncolor'] 	) !='' ) ? ' color:'.$l['btncolor'].';' : '';
												$btn_bg  	= ( isset( $l['btnbg'] 		) !='' ) ? ' background-color:'.$l['btnbg'].';' : '';
												$btn_border = ( isset( $l['btnborder']  ) !='' ) ? ' border-color:'.$l['btnborder'].';' : '';
												$style = ( $btn_color !='' || $btn_bg !='' || $btn_border !='' ) ? ' style="'.$btn_color.$btn_bg.$btn_border.'"' : '';

												$link = vc_build_link( $l['link'] );
												$out .= '<p><a class="custom-btn '.$btn_size.' '.$btn_style.'" href="' . esc_attr( $link['url'] ) . '"' . ( $link['target'] ? ' target="' . esc_attr( $link['target'] ) . '"' : '' ) . ( $link['rel'] ? ' rel="' . esc_attr( $link['rel'] ) . '"' : '' ) . ( $link['title'] ? ' title="' . esc_attr( $link['title'] ) . '"' : '' ) . ''.$style.'>' . esc_attr( $link['title'] ) . '</a></p>';
											}

										}else{ }

									}
								}
									$out .= '</div>';
								$out .= '</div>';
							$out .= '</div>';
						$out .= '</div>';
					$out .= '</div>';
				$out .= '</div>';
			}

			$out .= '</div>';
		$out .= '</header>';


?>
<script type="text/javascript">
(function()
{
var oInterval = setInterval(function ()
{
if (typeof window.jQuery !== 'undefined')
{
clearInterval(oInterval);



	jQuery(document).ready(function($){
		
		$.vegas.isVideoCompatible = function () {
			return true;
		}
		var slider = $('#vegas-slider'),
		slides = [
		<?php 
		
		$def_transition = 'random';
		$transition = array();
		foreach ( $slider_loop as $s ) {
				if ( isset( $s['img'] ) !='' ){ $img = wp_get_attachment_url( $s['img'],'full' ); }
				// Gets the Image alt
	            $image_alt = get_post_meta( $img, '_wp_attachment_image_alt', true );
	            // Gets the image name with exstention
	            $image_filename = basename ( get_attached_file( $img ) );
				$imagealt = $image_alt ? $image_alt : $image_filename;
				$mute = isset( $s['mute'] ) == 'yes' ? 'true' : 'false';
				$vurl = isset( $s['vurl'] ) != '' ? $s['vurl'] : '';
				$duration = isset( $s['duration'] ) != '' ? $s['duration'] : 4000;
				
				if ( isset( $s['transition'] ) !='' ){ 
					array_push($transition, $s['transition']);
				}
		?>
			{
				<?php if ( isset( $s['usevideo'] ) =='yes' && $vurl != '') { ?>
				name: "<?php echo esc_attr( $imagealt ); ?>",
				src: '<?php echo esc_url( $img ); ?>',
				video: {
	                src: ['<?php echo esc_url( $vurl ); ?>',],
	                loop: false,
	                mute: <?php echo esc_attr( $mute ); ?>
	            }
				<?php } else { ?>
					name: "<?php echo esc_attr( $imagealt ); ?>",
					src: '<?php echo esc_url( $img ); ?>'
				<?php } ?>
			},

		<?php }
		
		if ( ! empty( $transition ) ) { 
			$transition = ! empty( $transition ) ? '\''.implode("','",$transition).'\'' : $def_transition;
		}
		
		?>
		],
		slider_content = $('.start-screen__content'),
		dots, a, x;
		
		slider.vegas({
		autoplay: <?php echo esc_attr( $hide_autoplay ); ?>,
		timer: false,
		preloadImage: true,
		transition: [ <?php echo $transition; ?> ],
		transitionDuration: <?php echo esc_attr( $duration ); ?>,
		delay: <?php echo esc_attr( $delays ); ?>,
		slides: slides,
		overlay: '<?php if ( $overlayimg != '' ){ $overlayimg = wp_get_attachment_url( $overlayimg,'full' ); echo esc_url($overlayimg); } ?>',
		init: function (globalSettings) {

			if ( this.data('dots') == true ) {

				var $this = this,
					dots = $('<nav class="vegas-dots"></nav>');

				$this.find('.vegas-control').append(dots);

				for (var i = 0; i < slides.length; i++) {
					x = $('<a "href="#" class="paginatorLink"></a>');

					x.on('click', function(e) {
						e.preventDefault();

						$this.vegas('jump', dots.find('a').index(this));
					});

					dots.append(x);
				};

				a = dots.find('a');
				a.eq(0).addClass('active');

				slider_content.eq(0).addClass('active');
			};
		},
		play: function (index, slideSettings) {

		},
		walk: function (index, slideSettings) {

			if ( this.data('dots') == true ) {

				a.removeClass('active').eq(index).addClass('active');
			};

			slider_content.removeClass('active').eq(index).addClass('active');
		}
		});

		$('#vegas-control__prev').on('click', function () {
		slider.vegas('previous');
		});

		$('#vegas-control__next').on('click', function () {
		slider.vegas('next');
		});
	});

	}
	}, 500);
})();
</script>
<?php   }

	return $out;
}
add_shortcode('nt_agricom_section_heroslider', 'theme_nt_agricom_section_heroslider');

/*-----------------------------------------------------------------------------------*/
/*	HERO SLIDER 2 agricom
/*-----------------------------------------------------------------------------------*/
function theme_nt_agricom_section_heroslider2( $atts, $content = null ) {
    extract( shortcode_atts(array(
	//slider loop
	"sliderloop"=> '',
	"img"		=> '',
	"logo"		=> '',
	"imgwidth"	=> '',
	"imgheight"	=> '',
	//bg css
	"bgcss"		=> '',

	), $atts) );

	$bg_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $bgcss, ' ' ),  $atts );

	$slider_loop = (array) vc_param_group_parse_atts($sliderloop);

	$out = '';

	if ( !empty($slider_loop) ){

		$out .= '<header id="start-screen-owl" class="start-screen--style-2'.esc_attr( $bg_css ).'">';
			$out .= '<div class="owl-carousel owl-theme">';

			foreach ( $slider_loop as $s ) {

				if ( !empty($slider_loop) ){

					$out .= '<div class="slide">';

					if ( isset( $s['img'] ) !='' ){
						$out .= '<figure>';
							$item_img = wp_get_attachment_url( $s['img'],'full' );
							// Gets the Image Alt
							$image_alt = get_post_meta( $s['img'], '_wp_attachment_image_alt', true );
							// Gets the image name with exstention
							$image_filename = basename ( get_attached_file( $s['img'] ) );

							if (  $image_alt != '' ) {
								$imagealt = $image_alt;
							}else{
								$imagealt = $image_filename;
							}
							$out .= '<img src="'.get_template_directory_uri().'/images/blank.gif" style="background-image: url('.esc_url( $item_img ).');" alt="'.esc_attr( $imagealt ).'" />';
						$out .= '</figure>';
					}
						$imgwidth = ( isset( $s['imgwidth'] ) !='' ) ? $s['imgwidth'] : 150;
						$imgheight = ( isset( $s['imgheight'] ) !='' ) ? $s['imgheight'] : 150;
						if ( isset( $s['logo'] ) !='' ){ $out .= ''.nt_agricom_img( $imgsrc=$s['logo'], $imgclass='logo', $imgwidth, $imgheight ).''; }
					$out .= '</div>';
				}
			}

			$out .= '</div>';

		$out .= '</header>';
	}

	return $out;
}
add_shortcode('nt_agricom_section_heroslider2', 'theme_nt_agricom_section_heroslider2');


/*-----------------------------------------------------------------------------------*/
/*	FEEDBACK agricom
/*-----------------------------------------------------------------------------------*/
function theme_nt_agricom_section_testimonial( $atts, $content = null ) {
    extract( shortcode_atts(array(
	"heading"	=> '',
	"bgimg"		=> '',
	"timeout"	=> '',
	"speed"	=> '',
	//testi loop
	"testiloop"	=> '',
	"quote"		=> '',
	"tesimg"	=> '',
	"name"		=> '',
	"job"		=> '',
	//heading style
	"hlineh"	=> '',
	"hsize"		=> '',
	"hcolor"	=> '',
	//testi style
	"qsize"		=> '',
	"qlineh"	=> '',
	"qcolor"	=> '',
	"nsize"		=> '',
	"nlineh"	=> '',
	"ncolor"	=> '',
	"jsize"		=> '',
	"jlineh"	=> '',
	"jcolor"	=> '',
	//bg css
	"bgcss"		=> '',

	), $atts) );

	$bg_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $bgcss, ' ' ),  $atts );

	$testi_loop = (array) vc_param_group_parse_atts($testiloop);

	$bgimage = wp_get_attachment_url( $bgimg,'full' );

	$out = '';
	if ( $bgimage !='' ){
		$out .= '<section class="section parallax" data-stellar-background-ratio="0.5" data-stellar-vertical-offset="300" data-stellar-offset-parent="true" style="background-image: url('.esc_url( $bgimage ).');">';
			$out .= '<div class="container">';
	}else{
		$out .= '<section class="testimonial-section section'.esc_attr( $bg_css ).'">';
			$out .= '<div class="content">';
	}
			$out .= '<div class="content">';
			if ( $heading !='' ){
				$out .= '<div class="section-heading section-heading--center section-heading--white">';
					$out .= ''.nt_agricom_element( $heading=$heading, $tag='h2', $class='title', $hlineh, $hsize, $hcolor ).'';
				$out .= '</div>';
			}
				$out .= '<div class="row flex-items-md-center">';
					$out .= '<div class="col-lg-10">';

					if ( !empty($testi_loop) ){
						$timeout = $timeout ? ' data-owl-autoplaytimeout="'.$timeout.'"': '';
						$speed = $speed ? ' data-owl-smartspeed="'.$speed.'"' : '';
						$out .= '<div class="feedbacks feedbacks--slider feedbacks--style-1"'.$timeout.$speed.'>';
							$out .= '<div class="owl-carousel owl-theme">';
							foreach ( $testi_loop as $t ) {
								$out .= '<article class="feedback__item">';
									$out .= '<div class="feedback__author">';

											if ( isset( $t['tesimg'] ) !='' ){
												$out .= '<div class="feedback__author__photo  mx-auto">';
													$out .= ''.nt_agricom_img( $imgsrc=$t['tesimg'], $imgclass='circled  img-fluid', $imgwidth='140', $imgheight='140' ).'';
												$out .= '</div>';
											}

											if ( isset( $t['name'] ) !='' ){ $out .= ''.nt_agricom_element( $heading=$t['name'], $tag='h4', $class='feedback__author__name', $nsize, $nlineh, $ncolor ).''; }

											if ( isset( $t['job'] ) !='' ){ $out .= ''.nt_agricom_element( $heading=$t['job'], $tag='h5', $class='feedback__author__position', $jsize, $jlineh, $jcolor ).''; }

									$out .= '</div>';
								if ( isset( $t['quote'] ) !='' ){
									$out .= '<div class="feedback__text">';
										$out .= ''.nt_agricom_element( $heading=$t['quote'], $tag='p', $class='', $qlineh, $qsize, $qcolor ).'';
									$out .= '</div>';
								}
								$out .= '</article>';
							}

							$out .= '</div>';
						$out .= '</div>';
					}
					$out .= '</div>';
				$out .= '</div>';
			$out .= '</div>';
		$out .= '</section>';

	return $out;
}
add_shortcode('nt_agricom_section_testimonial', 'theme_nt_agricom_section_testimonial');

/*-----------------------------------------------------------------------------------*/
/*	FEEDBACK agricom
/*-----------------------------------------------------------------------------------*/
function theme_nt_agricom_section_timelinefull( $atts, $content = null ) {
    extract( shortcode_atts(array(
	"heading"	=> '',
	"column"	=> '',
	"xscol"		=> '',
	"smcol"		=> '',
	"mdcol"		=> '',
	"lgcol"		=> '',
	//testi loop
	"timeloop"	=> '',
	"date"		=> '',
	"title"		=> '',
	"desc"		=> '',
	//heading style
	"hlineh"	=> '',
	"hsize"		=> '',
	"hcolor"	=> '',
	//testi style
	"nsize"		=> '',
	"nlineh"	=> '',
	"ncolor"	=> '',
	"tsize"		=> '',
	"tlineh"	=> '',
	"tcolor"	=> '',
	"dtsize"	=> '',
	"dtlineh"	=> '',
	"dtcolor"	=> '',
	//bg css
	"bgcss"		=> '',

	), $atts) );

	$bg_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $bgcss, ' ' ),  $atts );

	$timeline_loop = (array) vc_param_group_parse_atts($timeloop);

	$out = '';

		$out .= '<section class="section-timeline '.esc_attr( $bg_css ).'">';
			$out .= '<div class="timeline-container">';
			if ( $heading !='' ){
				$out .= '<div class="section-heading section-heading--left">';
					$out .= ''.nt_agricom_element( $heading=$heading, $tag='h2', $class='title', $hlineh, $hsize, $hcolor ).'';
				$out .= '</div>';
			}

			if ( $column != 'custom' ) {
				$coltotal = $column ? $column : 'col-md-3';
			}
			if ( $column =='custom' ) {
				$xs_col = $xscol ? $xscol : '';
				$sm_col = $smcol ? $smcol : '';
				$md_col = $mdcol ? $mdcol : 'col-md-3';
				$lg_col = $lgcol ? $lgcol : '';
				$itemcolumn =  ' '.esc_attr( $xs_col ).' '.esc_attr( $sm_col ).' '.esc_attr( $md_col ).' '.esc_attr( $lg_col ).'';
				$coltotal = preg_replace('/\s\s+/', ' ', $itemcolumn);
			}
			if ( !empty($timeline_loop) ){
				$out .= '<div class="timeline">';
					$out .= '<div class="timeline__inner">';
						$out .= '<div class="row">';

						foreach ( $timeline_loop as $t ) {
							$out .= '<div class="'.$coltotal.'">';
								$out .= '<div class="timeline__item">';
									if ( isset( $t['date'] ) !='' ){ $out .= ''.nt_agricom_element( $heading=$t['date'], $tag='p', $class='timeline__year', $nsize, $nlineh, $ncolor ).''; }

									if ( isset( $t['title'] ) !='' ){ $out .= ''.nt_agricom_element( $heading=$t['title'], $tag='h4', $class='timeline__title', $tsize, $tlineh, $tcolor ).''; }

									if ( isset( $t['desc'] ) !='' ){ $out .= ''.nt_agricom_element( $heading=$t['desc'], $tag='p', $class='', $dtsize, $dtlineh, $dtcolor ).''; }

								$out .= '</div>';
							$out .= '</div>';
						}

						$out .= '</div>';
					$out .= '</div>';
				$out .= '</div>';
			}
			$out .= '</div>';
		$out .= '</section>';

	return $out;
}
add_shortcode('nt_agricom_section_timelinefull', 'theme_nt_agricom_section_timelinefull');

/*-----------------------------------------------------------------------------------*/
/*	FEATURES ICON agricom
/*-----------------------------------------------------------------------------------*/
function theme_nt_agricom_section_features( $atts, $content = null ) {
    extract( shortcode_atts(array(
	"heading"	=> '',
	"centerimg"	=> '',
	//testi loop
	"floop"		=> '',
	"icontype"	=> '',
	"icon"		=> '',
	"fonticon"	=> '',
	"iconimg"	=> '',
	"title"		=> '',
	//custom style
	"hlineh"	=> '',
	"hsize"		=> '',
	"hcolor"	=> '',
	"ilineh"	=> '',
	"isize"		=> '',
	"icolor"	=> '',
	"tlineh"	=> '',
	"tsize"		=> '',
	"tcolor"	=> '',
	//bg css
	"bgcss"		=> '',

	), $atts) );

	$bg_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $bgcss, ' ' ),  $atts );

	$features_loop = (array) vc_param_group_parse_atts($floop);

	$out = '';

		$out .= '<section class="section section--feature'.esc_attr( $bg_css ).'">';
			$out .= '<div class="feature-container">';
			if ( $heading !='' ){
				$out .= '<div class="section-heading section-heading--center">';
					$out .= ''.nt_agricom_element( $heading=$heading, $tag='h2', $class='title', $hlineh, $hsize, $hcolor ).'';
				$out .= '</div>';
			}

				$out .= '<div class="row flex-items-sm-middle">';
					$out .= '<div class="col-xs-12 col-md-6 col-lg-4 push-md-3 push-lg-4">';
						$out .= '<div class="col-MB-30 text-center">';
							$out .= ''.nt_agricom_img( $imgsrc=$centerimg, $imgclass='img-fluid', $imgwidth='', $imgheight='' ).'';
						$out .= '</div>';
					$out .= '</div>';

				if ( !empty($features_loop) ){
					$out .= '<div class="col-xs-12 col-md-6 col-lg-8">';
						$out .= '<div class="feature feature--style-2">';
							$out .= '<div class="feature__inner">';
								$out .= '<div class="row">';

								$countitem = 0;
								foreach ( $features_loop as $f ) {
									if ( $countitem % 2 == 0 ) {
										$out .= '<div class="col-xs-6 pull-md-12 pull-lg-6">';
									}else{
										$out .= '<div class="col-xs-6">';
									}
									$countitem++;
										$out .= '<div class="feature__item">';
											$out .= '<div class="row flex-items-lg-middle">';

											$icon_type = ( isset( $f['icontype'] ) !='' ) ? $f['icontype'] : 'iconfont';
											if ( $icon_type == 'imgicon' ){
												if ( isset( $f['iconimg'] ) !='' ){
													$out .= '<div class="col-lg-3">';
														$out .= ''.nt_agricom_img( $imgsrc=$f['iconimg'], $imgclass='feature__item__ico img-responsive', $imgwidth, $imgheight ).'';
													$out .= '</div>';
												}
											}else{
												$out .= '<div class="col-lg-3">';
													if ( isset( $f['fonticon'] ) !='' ){$out .= ''.nt_agricom_icon( $iconclass='font-icon '.$f['fonticon'], $iconsize='', $iconcolor='' ).''; }
												$out .= '</div>';
											}

											if ( isset( $f['title'] ) !='' ){
												$out .= '<div class="col-lg">';

												$out .= ''.nt_agricom_element( $heading=$f['title'], $tag='h3', $class='feature__item__title  h4', $tlineh, $tsize, $tcolor ).'';

												$out .= '</div>';
											}
											$out .= '</div>';
										$out .= '</div>';
									$out .= '</div>';

								}

								$out .= '</div>';
							$out .= '</div>';
						$out .= '</div>';
					$out .= '</div>';
				}
				$out .= '</div>';
			$out .= '</div>';
		$out .= '</section>';

	return $out;
}
add_shortcode('nt_agricom_section_features', 'theme_nt_agricom_section_features');


/*-----------------------------------------------------------------------------------*/
/*	GALLERY NO PLUGIN agricom
/*-----------------------------------------------------------------------------------*/
function theme_nt_agricom_section_simplegallery( $atts, $content = null ) {
    extract( shortcode_atts(array(
	//testi loop
	"galloop"	=> '',
	"itemimg"	=> '',
	"itemwidth"	=> '',
	"fullheight"=> '',
	"title"		=> '',
	"subtitle"	=> '',
	//custom style
	"tlineh"	=> '',
	"tsize"		=> '',
	"tcolor"	=> '',
	"stlineh"	=> '',
	"stsize"		=> '',
	"stcolor"	=> '',
	//bg css
	"bgcss"		=> '',
   //post
   "column"	=> '',
   "xscol"		=> '',
   "smcol"		=> '',
   "mdcol"		=> '',
   "lgcol"		=> '',
   "xlcol"		=> '',

	), $atts) );

	$bg_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $bgcss, ' ' ),  $atts );

	$gallery_loop = (array) vc_param_group_parse_atts($galloop);


   if ( $column != 'custom' ) {
      $coltotal = $column ? $column : 'col-sm-6 col-lg-4';
   }
   if ( $column =='custom' ) {
      $xs_col = $xscol ? $xscol : 'col-xs-12';
      $sm_col = $smcol ? $smcol : 'col-sm-6';
      $md_col = $mdcol ? $mdcol : 'col-md-6';
      $lg_col = $lgcol ? $lgcol : 'col-lg-4';
      $xl_col = $xlcol ? $xlcol : 'col-xl-3';
      $itemcolumn = ''.esc_attr( $xs_col ).' '.esc_attr( $sm_col ).' '.esc_attr( $md_col ).' '.esc_attr( $lg_col ).' '.esc_attr( $xl_col ).'';
      $coltotal = preg_replace('/\s\s+/', ' ', $itemcolumn);
   }

	$out = '';

	if ( !empty($gallery_loop) ){
		$out .= '<section class="section section--no-pt section--no-pb'.esc_attr( $bg_css ).'">';
			$out .= '<div class="gallery gallery--style-4">';
				$out .= '<div class="gallery__inner">';
					$out .= '<div class="row-no-gutter  js-isotope" data-isotope-options=\'{ "itemSelector": ".js-isotope__item", "transitionDuration": "0.8s", "percentPosition": "true", "masonry": { "columnWidth": ".js-isotope__grid-sizer" }}\'>';
						$out .= '<div class="col-sm-6 col-lg-1 js-isotope__grid-sizer" style="min-height: 0;"></div>';

					foreach ( $gallery_loop as $g ) {
						$itemwidth 	= ( isset( $g['itemwidth'] 	) !='' ) ? $g['itemwidth'] 	: 4;
						$datax 		= ( isset( $g['fullheight'] ) !='' ) ? $g['fullheight'] : 1;
						$out .= '<div class="'.$coltotal.' js-isotope__item">';
							$out .= '<div class="gallery__item" data-x="'.$datax.'" data-y="1">';
								$out .= '<div class="gallery__item__inner">';

								if ( isset( $g['itemimg'] ) !='' ){

									$out .= '<figure>';
										$item_img = wp_get_attachment_url( $g['itemimg'],'full' );
										// Gets the Image Alt
										$image_alt = get_post_meta( $g['itemimg'], '_wp_attachment_image_alt', true );
										// Gets the image name with exstention
										$image_filename = basename ( get_attached_file( $g['itemimg'] ) );

										if (  $image_alt != '' ) {
											$imagealt = $image_alt;
										}else{
											$imagealt = $image_filename;
										}

										$out .= '<img src="'.get_template_directory_uri().'/images/blank.gif" style="background-image: url('.esc_url( $item_img ).');" alt="'.esc_attr( $imagealt ).'" />';

										$out .= '<a class="gallery__item__description" href="'.esc_url( $item_img ).'" data-gallery="gall">';

											if ( isset( $g['title'] ) !='' ){ $out .= ''.nt_agricom_element( $heading=$g['title'], $tag='span', $class='gallery__item__title', $tlineh, $tsize, $tcolor ).''; }

											if ( isset( $g['subtitle'] ) !='' ){ $out .= ''.nt_agricom_element( $heading=$g['subtitle'], $tag='span', $class='gallery__item__subtitle', $stlineh, $stsize, $stcolor ).''; }

										$out .= '</a>';
									$out .= '</figure>';
								}
								$out .= '</div>';
							$out .= '</div>';
						$out .= '</div>';
					}

					$out .= '</div>';
				$out .= '</div>';
			$out .= '</div>';
		$out .= '</section>';
	}

	return $out;
}
add_shortcode('nt_agricom_section_simplegallery', 'theme_nt_agricom_section_simplegallery');


/*-----------------------------------------------------------------------------------*/
/*	SUBSCRIBE agricom
/*-----------------------------------------------------------------------------------*/
function theme_nt_agricom_section_subscribe( $atts, $content = null ) {
    extract( shortcode_atts(array(
	"lbgimg"	=> '',
	"leftbgc"	=> '',
	"ltitle"	=> '',
	"ldesc"		=> '',
	//btn
	"link"		=> '',
	"btnsize"	=> '',
	"btnstyle"	=> '',
	//right
	"rbgimg"	=> '',
	"rightbgc"	=> '',
	"rtitle"	=> '',
	"rdesc"		=> '',
	//custom style
	//left
	"ltsize"	=> '',
	"ltlineh"	=> '',
	"ltcolor"	=> '',
	"ldsize"	=> '',
	"ldlineh"	=> '',
	"ldcolor"	=> '',
	//right
	"rtsize"	=> '',
	"rtlineh"	=> '',
	"rtcolor"	=> '',
	"rdsize"	=> '',
	"rdlineh"	=> '',
	"rdcolor"	=> '',
	//custom style
	"btncolor"	=> '',
	"btnbg"		=> '',
	"btnborder"	=> '',

	), $atts) );

	$out = '';

		$out .= '<section class="section section--no-pt section--no-pb">';
			$out .= '<div class="container-fluid">';
				$out .= '<div class="banner">';
					$out .= '<div class="banner__inner">';
						$out .= '<div class="row">';
							$out .= '<div class="col-lg-6 col-no-gutter">';
							if ( $lbgimg !='' ){
								$leftbg = wp_get_attachment_url( $lbgimg,'full' );
								$out .= '<div class="banner__item" style="background-image: url('.esc_url($leftbg).');">';
							}else{
								$l_bgcolor = ( $leftbgc != '' ) ? $leftbgc : '#4a8b71';
								$out .= '<div class="banner__item" style="background-color:'.$l_bgcolor.';">';
							}
									$out .= '<div class="banner__text">';
										$out .= '<div class="banner__text__inner">';
											if ( $ltitle !='' ){ $out .= ''.nt_agricom_element( $heading=$ltitle, $tag='h2', $class='banner__title', $ltlineh, $ltsize, $ltcolor ).''; }

											if ( $ldesc !='' ){ $out .= ''.nt_agricom_element( $heading=$ldesc, $tag='p', $class='', $ldlineh, $ldsize, $ldcolor ).''; }

											if ( ! empty( $link ) ) {

												$btn_size   = ( $btnsize 	!='' ) ? $btnsize : '';
												$btn_style  = ( $btnstyle 	!='' ) ? $btnstyle : 'btn-default';
												$btn_color  = ( $btncolor 	!='' ) ? ' color:'.$btncolor.';' : '';
												$btn_bg  	= ( $btnbg 		!='' ) ? ' background-color:'.$btnbg.';' : '';
												$btn_border = ( $btnborder 	!='' ) ? ' border-color:'.$btnborder.';' : '';
												$style = ( $btn_color !='' || $btn_bg !='' || $btn_border !='' ) ? ' style="'.$btn_color.$btn_bg.$btn_border.'"' : '';

												$link = vc_build_link( $link );
												$out .= '<p><a class="custom-btn '.$btn_size.' '.$btn_style.'" href="' . esc_attr( $link['url'] ) . '"' . ( $link['target'] ? ' target="' . esc_attr( $link['target'] ) . '"' : '' ) . ( $link['rel'] ? ' rel="' . esc_attr( $link['rel'] ) . '"' : '' ) . ( $link['title'] ? ' title="' . esc_attr( $link['title'] ) . '"' : '' ) . ''.$style.'>' . esc_attr( $link['title'] ) . '</a></p>';
											}
										$out .= '</div>';
									$out .= '</div>';
								$out .= '</div>';
							$out .= '</div>';

							$out .= '<div class="col-lg-6 col-no-gutter">';
							if ( $rbgimg !='' ){
								$rightbg = wp_get_attachment_url( $rbgimg,'full' );

								$out .= '<div class="banner__item" style="background-image: url('.esc_url($rightbg).');">';
							}else{
								$r_bgcolor = ( $rightbgc != '' ) ? $rightbgc : '#282828';
								$out .= '<div class="banner__item" style="background-color:'.$r_bgcolor.';">';
							}
									$out .= '<div class="banner__subscribe">';
										if ( $rtitle !='' ){ $out .= ''.nt_agricom_element( $heading=$rtitle, $tag='h2', $class='banner__title', $rtlineh, $rtsize, $rtcolor ).''; }

										if ( $rdesc !='' ){ $out .= ''.nt_agricom_element( $heading=$rdesc, $tag='p', $class='', $rdlineh, $rdsize, $rdcolor ).''; }

										$out .= ''.do_shortcode( $content ).'';
									$out .= '</div>';
								$out .= '</div>';
							$out .= '</div>';
						$out .= '</div>';
					$out .= '</div>';
				$out .= '</div>';
			$out .= '</div>';
		$out .= '</section>';

	return $out;
}
add_shortcode('nt_agricom_section_subscribe', 'theme_nt_agricom_section_subscribe');


/*-----------------------------------------------------------------------------------*/
/*	LATEST BLOG agricom
/*-----------------------------------------------------------------------------------*/
function theme_nt_agricom_section_blog( $atts, $content = null ) {
    extract( shortcode_atts(array(
	"sec_id"	=> '',
	"heading"	=> '',
	"blogstyle"	=> '',
	//btn
	"link"		=> '',
	"btnsize"	=> '',
	"btnstyle"	=> '',
	//post column
	"column"	=> '',
	"xscol"		=> '',
	"smcol"		=> '',
	"mdcol"		=> '',
	"lgcol"		=> '',
	//post
	"imgwidth"	=> '370',
	"imgheight"	=> '265',
	"p_count"	=> '3',
	"order"		=> 'DESC',
	"orderby"	=> 'date',
	"p_cat"		=> 'all',
	"showcomment"=> '',
	"showcat"	=> '',
	"showdate"	=> '',
	"showcontent"=> '',
	//bg css
	"bgcss"		=> '',
	//heading style
	"hlineh"	=> '',
	"hsize"		=> '',
	"hcolor"	=> '',
	//post style
	"tlineh"	=> '',
	"tsize"		=> '',
	"tcolor"	=> '',
	"dtsize"	=> '',
	"dtlineh"	=> '',
	"dtcolor"	=> '',
	"mcolor"	=> '',
	"datecolor"	=> '',
	//btn style
	"btncolor"	=> '',
	"btnbg"		=> '',
	"btnborder"	=> '',

    ), 	$atts));

	$bg_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $bgcss, ' ' ),  $atts );

	global $post;

	$nt_agricom_postargs = array(
		'post_type'         => 'post',
		'posts_per_page'	=> $p_count,
		'order'             => $order,
		'orderby'           => $orderby,
		'post_status'       => 'publish'
	);

	if( $p_cat != 'all' ){
		$str = $p_cat;
		$arr = explode(',', $str);
		$nt_agricom_postargs['tax_query'][] = array(
			'taxonomy' 	    => 'category',
			'field' 	    => 'slug',
			'terms' 	    => $arr
		);
	}

    $out = '';

	if( $blogstyle == 'style1' ) {

		$out .='<section class="news-section section '.esc_attr( $bg_css ).'">';
			$out .='<div class="news-content">';

			if( $heading != '' ) {
				$out .='<div class="section-heading section-heading--left">';
					$out .= ''.nt_agricom_element( $heading=$heading, $tag='h2', $class='title', $hlineh, $hsize, $hcolor ).'';
				$out .='</div>';
			}

				$out .='<div class="blog blog--style-1">';
					$out .='<div class="blog__inner">';

						$out .='<div class="row  js-isotope" data-isotope-options=\'{ "itemSelector": ".js-isotope__item", "transitionDuration": "0.8s", "percentPosition": "true", "masonry": { "columnWidth": ".js-isotope__grid-sizer" }}\'>';
							$out .='<div class="col-xs-12 col-md-6 col-lg-4  js-isotope__grid-sizer" style="min-height: 0;"></div>';

						$nt_agricom_blog_post_query = new WP_Query($nt_agricom_postargs);
						if( $nt_agricom_blog_post_query->have_posts() ) :
						while ($nt_agricom_blog_post_query->have_posts()) : $nt_agricom_blog_post_query->the_post();

							$out .='<div class="post-'.$post->ID.' col-xs-12 col-md-6 col-lg-4  js-isotope__item">';
								$out .='<div class="blog__item  mx-auto">';

									if( has_post_thumbnail() ) {

										$img_w	= $imgwidth  ? $imgwidth  : 510;
										$img_h	= $imgheight ? $imgheight : 360;

										$nt_agricom_postthumb 		= get_post_thumbnail_id();
										$nt_agricom_postthumbimg 	= wp_get_attachment_url( $nt_agricom_postthumb,'full' );
										$nt_agricom_postimg 		= nt_agricom_aq_resize( $nt_agricom_postthumbimg, $img_w, $img_h , true, true, true );

										$out .='<figure>';
											$out .='<img clas="img-fluid" src="'.esc_url( $nt_agricom_postimg ).'" alt="'.get_the_title().'">';
										$out .='</figure>';

									}

									$out .='<div class="blog__entry">';
									$datestyle= ( $datecolor !=''  ) ? ' style="color:'.$datecolor.'"' : '';
										$out .='<div class="blog__post-date">';
											$out .='<span'.$datestyle.'>'.get_the_date('d').'</span>';
											$out .='<span'.$datestyle.'>'.get_the_date('M').'<br />'.get_the_date('Y').'</span>';
										$out .='</div>';

										// post title
										$post_title = get_the_title();
										if( $post_title != '' ) {
												$t_color 	= ( $tcolor !='' ) ? ' color:'.esc_attr( $tcolor ).';' : '';
												$t_size 	= ( $tsize !=''  ) ? ' font-size:'.esc_attr( $tsize ).';' : '';
												$t_lineh 	= ( $tlineh !='' ) ? ' line-height:'.esc_attr( $tlineh ).';' : '';
												$titlestyle = ( $t_color !='' || $t_size !='' || $t_lineh !='' ) ? ' style="'.$t_color.$t_size.$t_lineh.'"' : '';
											$out .='<h3 class="blog__entry__title"><a href="'.get_permalink().'"'.$titlestyle.'>'.$post_title.'</a></h3>';
										}

										// post category and comments
										// post category and comments
										if( $showcat != 'hide' || $showcomment != 'hide' ) {
											// post comments
											$catstyle= ( $mcolor !=''  ) ? ' style="color:'.$mcolor.'"' : '';
											$categories = get_the_category();
											$num_comments = get_comments_number(); // get_comments_number returns only a numeric value
											$out .='<span class="blog__entry__meta"'.$catstyle.'>';if( $showcat != 'hide' ) {if ( ! empty( $categories ) ) {$out .=''.esc_html( $categories[0]->name ).'  |  ';}} if( $showcomment != 'hide' ) {$out .=''.$num_comments.' '.esc_html__('Comments', 'nt-agricom' ).''; }$out .='</span>';
										}

										// post content
										if( $showcontent != 'hide' ) {
											if ( has_excerpt( $post->ID ) ) {
												$content = get_the_excerpt();
												$dt_color 	= ( $dtcolor !='' ) ? ' color:'.esc_attr( $dtcolor ).';' : '';
												$dt_size 	= ( $dtsize !=''  ) ? ' font-size:'.esc_attr( $dtsize ).';' : '';
												$dt_lineh 	= ( $dtlineh !='' ) ? ' line-height:'.esc_attr( $dtlineh ).';' : '';
												$dtstyle= ( $dt_color !='' || $dt_size !='' || $dt_lineh !='' ) ? ' style="'.$dt_color.$dt_size.$dt_lineh.'"' : '';
												$out .= '<p'.$dtstyle.'>'.$content.'</p>';
											}
										}
									$out .='</div>';
								$out .='</div>';
							$out .='</div>';
						endwhile;
						endif;
						wp_reset_postdata();

						$out .='</div>';
					$out .='</div>';

					// button bottom
					if ( ! empty( $link ) ) {

						$btn_size   = ( $btnsize 	!='' ) ? $btnsize : '';
						$btn_style  = ( $btnstyle 	!='' ) ? $btnstyle : 'btn-default';
						$btn_color  = ( $btncolor 	!='' ) ? ' color:'.$btncolor.';' : '';
						$btn_bg  	= ( $btnbg 		!='' ) ? ' background-color:'.$btnbg.';' : '';
						$btn_border = ( $btnborder 	!='' ) ? ' background-color:'.$btnborder.';' : '';
						$style = ( $btn_color !='' || $btn_bg !='' || $btn_border !='' ) ? ' style="'.$btn_color.$btn_bg.$btn_border.'"' : '';

						$link = vc_build_link( $link );
						$out .= '<div class="text-center"><a id="blog-more-btn" class="custom-btn '.$btn_size.' '.$btn_style.'" href="' . esc_attr( $link['url'] ) . '"' . ( $link['target'] ? ' target="' . esc_attr( $link['target'] ) . '"' : '' ) . ( $link['rel'] ? ' rel="' . esc_attr( $link['rel'] ) . '"' : '' ) . ( $link['title'] ? ' title="' . esc_attr( $link['title'] ) . '"' : '' ) . ''.$style.'>' . esc_attr( $link['title'] ) . '</a></div>';
					}

				$out .='</div>';
			$out .='</div>';
		$out .='</section>';

	}elseif( $blogstyle == 'style2' ){

		$out .='<section class="news-section section '.esc_attr( $bg_css ).'">';
			$out .='<div class="news-content">';

			if( $heading != '' ) {
				$out .='<div class="section-heading section-heading--left">';
					$out .= ''.nt_agricom_element( $heading=$heading, $tag='h2', $class='title', $hlineh, $hsize, $hcolor ).'';
				$out .='</div>';
			}

				$out .='<div class="blog blog--style-2">';
					$out .='<div class="row flex-items-md-middle">';

					$nt_agricom_blog_post_query = new WP_Query($nt_agricom_postargs);
					if( $nt_agricom_blog_post_query->have_posts() ) :
					while ($nt_agricom_blog_post_query->have_posts()) : $nt_agricom_blog_post_query->the_post();

						$out .='<div class="post-'.$post->ID.' col-xl-6">';
							$out .='<div class="blog__item">';
								$out .='<div class="row flex-items-md-middle">';
									$out .='<div class="col-md-6 col-lg-8 col-xl-6">';
										$out .='<div class="blog__entry">';
											$out .='<div class="blog__post-date">';

												$datestyle= ( $datecolor !=''  ) ? ' style="color:'.$datecolor.'"' : '';

												$out .='<span'.$datestyle.'>'.get_the_date('d').'</span>';
												$out .='<span'.$datestyle.'>'.get_the_date('M').'<br />'.get_the_date('Y').'</span>';
											$out .='</div>';

										$post_title = get_the_title();
										if( $post_title != '' ) {
												$t_color 	= ( $tcolor !='' ) ? ' color:'.esc_attr( $tcolor ).';' : '';
												$t_size 	= ( $tsize !=''  ) ? ' font-size:'.esc_attr( $tsize ).';' : '';
												$t_lineh 	= ( $tlineh !='' ) ? ' line-height:'.esc_attr( $tlineh ).';' : '';
												$titlestyle = ( $t_color !='' || $t_size !='' || $t_lineh !='' ) ? ' style="'.$t_color.$t_size.$t_lineh.'"' : '';
											$out .='<h3 class="blog__entry__title"><a href="'.get_permalink().'"'.$titlestyle.'>'.$post_title.'</a></h3>';
										}

										// post category and comments
										if( $showcat != 'hide' || $showcomment != 'hide' ) {
											// post comments
											$catstyle= ( $mcolor !=''  ) ? ' style="color:'.$mcolor.'"' : '';
											$categories = get_the_category();
											$num_comments = get_comments_number(); // get_comments_number returns only a numeric value
											$out .='<span class="blog__entry__meta"'.$catstyle.'>';if( $showcat != 'hide' ) {if ( ! empty( $categories ) ) {$out .=''.esc_html( $categories[0]->name ).'  |  ';}} if( $showcomment != 'hide' ) {$out .=''.$num_comments.' '.esc_html__('Comments', 'nt-agricom' ).''; }$out .='</span>';
										}

										// post content
										if( $showcontent != 'hide' ) {
											if ( has_excerpt( $post->ID ) ) {
												$content = get_the_excerpt();
												$dt_color 	= ( $dtcolor !='' ) ? ' color:'.esc_attr( $dtcolor ).';' : '';
												$dt_size 	= ( $dtsize !=''  ) ? ' font-size:'.esc_attr( $dtsize ).';' : '';
												$dt_lineh 	= ( $dtlineh !='' ) ? ' line-height:'.esc_attr( $dtlineh ).';' : '';
												$dtstyle= ( $dt_color !='' || $dt_size !='' || $dt_lineh !='' ) ? ' style="'.$dt_color.$dt_size.$dt_lineh.'"' : '';
												$out .= '<p'.$dtstyle.'>'.$content.'</p>';
											}
										}

										$out .='</div>';
									$out .='</div>';

									$out .='<div class="col-md-6 col-lg-4 col-xl-6">';

									if( has_post_thumbnail() ) {
										$img_w	= $imgwidth  ? $imgwidth  : 510;
										$img_h	= $imgheight ? $imgheight : 360;

										$nt_agricom_postthumb 		= get_post_thumbnail_id();
										$nt_agricom_postthumbimg 	= wp_get_attachment_url( $nt_agricom_postthumb,'full' );
										$nt_agricom_postimg 		= nt_agricom_aq_resize( $nt_agricom_postthumbimg, $img_w, $img_h , true, true, true );

										$out .='<figure class="embed-responsive embed-responsive-1by1">';
											$out .='<img class="embed-responsive-item" src="'.get_template_directory_uri().'/images/blank.gif" style="background-image: url('.esc_url( $nt_agricom_postimg ).');" alt="'.get_the_title().'">';
										$out .='</figure>';
									}

									$out .='</div>';
								$out .='</div>';
							$out .='</div>';
						$out .='</div>';
					endwhile;
					endif;
					wp_reset_postdata();

					$out .='</div>';

					// button bottom
					if ( ! empty( $link ) ) {

						$btn_size   = ( $btnsize 	!='' ) ? $btnsize : '';
						$btn_style  = ( $btnstyle 	!='' ) ? $btnstyle : 'btn-default';
						$btn_color  = ( $btncolor 	!='' ) ? ' color:'.$btncolor.';' : '';
						$btn_bg  	= ( $btnbg 		!='' ) ? ' background-color:'.$btnbg.';' : '';
						$btn_border = ( $btnborder 	!='' ) ? ' background-color:'.$btnborder.';' : '';
						$style = ( $btn_color !='' || $btn_bg !='' || $btn_border !='' ) ? ' style="'.$btn_color.$btn_bg.$btn_border.'"' : '';

						$link = vc_build_link( $link );
						$out .= '<div class="text-center"><a id="blog-more-btn" class="custom-btn '.$btn_size.' '.$btn_style.'" href="' . esc_attr( $link['url'] ) . '"' . ( $link['target'] ? ' target="' . esc_attr( $link['target'] ) . '"' : '' ) . ( $link['rel'] ? ' rel="' . esc_attr( $link['rel'] ) . '"' : '' ) . ( $link['title'] ? ' title="' . esc_attr( $link['title'] ) . '"' : '' ) . ''.$style.'>' . esc_attr( $link['title'] ) . '</a></div>';
					}

				$out .='</div>';
			$out .='</div>';
		$out .='</section>';

	}else{

		$out .='<section class="news-section section '.esc_attr( $bg_css ).'">';
			$out .='<div class="news-content">';

			if( $heading != '' ) {
				$out .='<div class="section-heading section-heading--left">';
					$out .= ''.nt_agricom_element( $heading=$heading, $tag='h2', $class='title', $hlineh, $hsize, $hcolor ).'';
				$out .='</div>';
			}
				$out .='<div class="blog blog--style-3">';
					$out .='<div class="blog__inner">';
						$out .='<div class="row row-no-gutter">';

						$nt_agricom_blog_post_query = new WP_Query($nt_agricom_postargs);
						if( $nt_agricom_blog_post_query->have_posts() ) :
						while ($nt_agricom_blog_post_query->have_posts()) : $nt_agricom_blog_post_query->the_post();

							if ( $column != 'custom' ) {
								$coltotal = $column ? $column : 'col-xs-12 col-sm-6 col-md-4';
							}
							if ( $column =='custom' ) {
								$xs_col = $xscol ? $xscol : '';
								$sm_col = $smcol ? $smcol : '';
								$md_col = $mdcol ? $mdcol : 'col-md-6';
								$lg_col = $lgcol ? $lgcol : 'col-lg-4';
								$itemcolumn =  ' '.esc_attr( $xs_col ).' '.esc_attr( $sm_col ).' '.esc_attr( $md_col ).' '.esc_attr( $lg_col ).'';
								$coltotal = preg_replace('/\s\s+/', ' ', $itemcolumn);
							}

							$out .='<div class="post-item-'.$post->ID.' '.$coltotal.'">';
								$out .='<div class="blog__item">';

								if( has_post_thumbnail() ) {

									$img_w	= $imgwidth  ? $imgwidth  : 510;
									$img_h	= $imgheight ? $imgheight : 360;

									$nt_agricom_postthumb 		= get_post_thumbnail_id();
									$nt_agricom_postthumbimg 	= wp_get_attachment_url( $nt_agricom_postthumb,'full' );
									$nt_agricom_postimg 		= nt_agricom_aq_resize( $nt_agricom_postthumbimg, $img_w, $img_h , true, true, true );

									$out .='<figure>';
										$out .='<img src="'. get_template_directory_uri() . '/images/blank.gif" style="background-image: url('.esc_url( $nt_agricom_postimg ).');" alt="'.get_the_title().'">';
									$out .='</figure>';

								}
									$out .='<div class="blog__entry">';

									// post category and comments
									if( $showcomment != 'hide' || $showdate != 'hide' ) {
										// post comments
										$num_comments = get_comments_number(); // get_comments_number returns only a numeric value

										$out .='<span class="blog__entry__meta">';if( $showdate != 'hide' ) {$out .=''.get_the_date().'  / ';} if( $showcomment != 'hide' ) {$out .=''.$num_comments.' '.esc_html__('Comments', 'nt-agricom' ).''; }$out .='</span>';
									}

									// post title
									$post_title = get_the_title();
									if( $post_title != '' ) {
											$t_color 	= ( $tcolor !='' ) ? ' color:'.esc_attr( $tcolor ).';' : '';
											$t_size 	= ( $tsize !=''  ) ? ' font-size:'.esc_attr( $tsize ).';' : '';
											$t_lineh 	= ( $tlineh !='' ) ? ' line-height:'.esc_attr( $tlineh ).';' : '';
											$titlestyle = ( $t_color !='' || $t_size !='' || $t_lineh !='' ) ? ' style="'.$t_color.$t_size.$t_lineh.'"' : '';
										$out .='<h3 class="blog__entry__title  h4"><a href="'.get_permalink().'"'.$titlestyle.'>'.$post_title.'</a></h3>';
									}
									$out .='</div>';

								$out .='</div>';
							$out .='</div>';
						endwhile;
						endif;
						wp_reset_postdata();

						$out .='</div>';
					$out .='</div>';
				$out .='</div>';
			$out .='</div>';
		$out .='</section>';
	}

	return $out;
}
add_shortcode('nt_agricom_section_blog', 'theme_nt_agricom_section_blog');

/*-----------------------------------------------------------------------------------*/
/*	GALLERY agricom
/*-----------------------------------------------------------------------------------*/
function theme_nt_agricom_section_gallery( $atts, $content = null ){
	extract(shortcode_atts(array(
	'galstyle'	=> '',
	'filter'	=> 'show',
	'filterpos'	=> '',
	'custompost'=> '',
	'heading'	=> '',
	'desc'		=> '',
	//btn
	"link"		=> '',
	"btnsize"	=> '',
	"btnstyle"	=> '',
	//post
	"column"	=> '',
	"xscol"		=> '',
	"smcol"		=> '',
	"mdcol"		=> '',
	"lgcol"		=> '',
	"xlcol"		=> '',
	//post
	'imgwidth'	=> '510',
	'imgheight'	=> '510',
	'orderby'	=> 'date',
	'order'		=> 'DESC',
	'p_count'	=> '4',
	'p_cat'	=> 'all',
	//bg css
	"bgcss"		=> '',
	//custom style
	"hlineh"	=> '',
	"hsize"		=> '',
	"hcolor"	=> '',
	"dlineh"	=> '',
	"dsize"		=> '',
	"dcolor"	=> '',
	//post style
	"tlineh"	=> '',
	"tsize"		=> '',
	"tcolor"	=> '',
	"dtlineh"	=> '',
	"dtsize"	=> '',
	"dtcolor"	=> '',
	//btn style
	"btncolor"	=> '',
	"btnbg"		=> '',
	"btnborder"	=> '',

	), $atts));

	global $post;

	if( $custompost != '' ){ $customposttype = $custompost; }else{ $customposttype = 'gallery'; }

	if ( post_type_exists( $customposttype ) ) {

		$nt_agricom_gallery_query_arg = array(
			'post_type' 		=> ''.$customposttype.'',
			'posts_per_page' 	=> $p_count,
			'order' 		 	=> $order,
			'orderby' 		 	=> $orderby,
			'post_status' 	 	=> 'publish'
		);

		if($p_cat != 'all'){
			$str = $p_cat;
			$arr = explode(',', $str);
			$nt_agricom_gallery_query_arg['tax_query'][] = array( 'taxonomy' => ''.$customposttype.'', 'field' => 'slug', 'terms' => $arr );
		}

		$bg_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $bgcss, ' ' ),  $atts );

		if ( $column != 'custom' ) {
			$coltotal = $column ? $column : 'col-xs-12 col-sm-6 col-md-4';
		}
		if ( $column =='custom' ) {
			$xs_col = $xscol ? $xscol : 'col-xs-12';
			$sm_col = $smcol ? $smcol : 'col-sm-6';
			$md_col = $mdcol ? $mdcol : 'col-md-6';
			$lg_col = $lgcol ? $lgcol : 'col-lg-4';
			$xl_col = $xlcol ? $xlcol : 'col-xl-3';
			$itemcolumn = ''.esc_attr( $xs_col ).' '.esc_attr( $sm_col ).' '.esc_attr( $md_col ).' '.esc_attr( $lg_col ).' '.esc_attr( $xl_col ).'';
			$coltotal = preg_replace('/\s\s+/', ' ', $itemcolumn);
		}

		$out = '';

		if ( $galstyle  == 'style1' ){

			$out .= '<section class="section'.esc_attr( $bg_css ).'">';
				$out .= '<div class="container">';

				$terms = get_terms(''.$customposttype.'');
				$count = count($terms);

			if ( $filter != 'hide' ){
				if ( $count > 0 ){
					$filter_pos = ( $filterpos != '' ) ? ' class="'.$filterpos.'"' : '';
					$out .= '<ul id="gallery-set"'.$filter_pos.'>';
						$out .= '<li><a class="selected" data-cat="*" href="#">'.__('All','nt-xeon').'</a></li>';

					foreach ( $terms as $term ) {
						$termname = strtolower($term->name);
						$termslug = strtolower($term->slug);
						$term_slug = str_replace(' ', '-', $termslug);

						$out .= '<li><a data-cat="'.$term_slug.'" href="#">'.$term->name.'</a></li>';

					}
					$out .= '</ul>';
				}
			}
					$out .= '<div class="gallery gallery--style-1">';
						$out .= '<div class="gallery__inner">';
							$out .= '<div class="row row-no-gutter js-isotope" data-isotope-options=\'{ "itemSelector": ".js-isotope__item", "transitionDuration": "0.8s", "percentPosition": "true"}\'>';

							$nt_agricom_gallery_query = new WP_Query($nt_agricom_gallery_query_arg);
							if( $nt_agricom_gallery_query->have_posts() ) :
							while ($nt_agricom_gallery_query->have_posts()) : $nt_agricom_gallery_query->the_post();

							$linktype	= get_post_meta( get_the_ID(), 'nt_agricom_gallery_linktype', true );
							$vidurl		= get_post_meta( get_the_ID(), 'nt_agricom_gallery_vidurl', true );

								$terms = get_the_terms( $post->ID, ''.$customposttype.'' );
								if ( $terms && ! is_wp_error( $terms ) ) :
									$links = array();
									foreach ( $terms as $term ){
										$links[] = $term->name;
									}
									$links 	= str_replace(' ', '-', $links);
									$tax 	= join( " ", $links );
									$taxi 	= join( " / ", $links );
								else :
									$tax = '';
								endif;
								$out .= '<div class="'.$coltotal.'  js-isotope__item  '.strtolower( $tax ).'">';
									$out .= '<div class="gallery__item">';
										$out .= '<div class="gallery__item__inner">';

										if( has_post_thumbnail() ) {
											$out .= '<figure>';

											$img_w	= $imgwidth  ? $imgwidth  : 510;
											$img_h	= $imgheight ? $imgheight : 510;

											$nt_agricom_postthumb 		= get_post_thumbnail_id();
											$nt_agricom_postthumbimg 	= wp_get_attachment_url( $nt_agricom_postthumb,'full' );
											$nt_agricom_postimg 		= nt_agricom_aq_resize( $nt_agricom_postthumbimg, $img_w, $img_h , true, true, true );

											$out .='<img src="'. get_template_directory_uri() . '/images/blank.gif" style="background-image: url('.esc_url( $nt_agricom_postthumbimg ).');" alt="'.get_the_title().'">';

											if ( $linktype != 'single' ){
												if ( $vidurl !='' ){
													$out .= '<a class="gallery__item__description" href="'.esc_url( $vidurl ).'" data-gallery="gall">';
												}else{
													$out .= '<a class="gallery__item__description" href="'.esc_url( $nt_agricom_postthumbimg ).'" data-gallery="gall">';
												}
											}else{
												$out .= '<a class="gallery__item__description" href="'.get_permalink().'">';
											}
													// post title
													$post_title = get_the_title();
													if ( $post_title !='' ){ $out .= ''.nt_agricom_element( $heading=$post_title, $tag='span', $class='gallery__item__title', $tlineh='', $tsize, $tcolor ).''; }
													$out .= '<span class="gallery__item__subtitle">'.esc_html( $taxi ).' </span>';
												$out .= '</a>';
											$out .= '</figure>';
										}
										$out .= '</div>';
									$out .= '</div>';
								$out .= '</div>';
							endwhile;
							endif;
							wp_reset_postdata();

							$out .= '</div>';
						$out .= '</div>';
					$out .= '</div>';

					// button bottom
					if ( ! empty( $link ) ) {

						$btn_size   = ( $btnsize 	!='' ) ? $btnsize : '';
						$btn_style  = ( $btnstyle 	!='' ) ? $btnstyle : 'btn-default';
						$btn_color  = ( $btncolor 	!='' ) ? ' color:'.$btncolor.';' : '';
						$btn_bg  	= ( $btnbg 		!='' ) ? ' background-color:'.$btnbg.';' : '';
						$btn_border = ( $btnborder 	!='' ) ? ' border-color:'.$btnborder.';' : '';
						$style = ( $btn_color !='' || $btn_bg !='' || $btn_border !='' ) ? ' style="'.$btn_color.$btn_bg.$btn_border.'"' : '';

						$link = vc_build_link( $link );
						$out .= '<div class="text-center"><a id="gallery-more-btn" class="custom-btn '.$btn_size.' '.$btn_style.'" href="' . esc_attr( $link['url'] ) . '"' . ( $link['target'] ? ' target="' . esc_attr( $link['target'] ) . '"' : '' ) . ( $link['rel'] ? ' rel="' . esc_attr( $link['rel'] ) . '"' : '' ) . ( $link['title'] ? ' title="' . esc_attr( $link['title'] ) . '"' : '' ) . ''.$style.'>' . esc_attr( $link['title'] ) . '</a></div>';
					}

				$out .= '</div>';
			$out .= '</section>';

		}elseif( $galstyle  == 'style2' ){

			$out .= '<section class="section'.esc_attr( $bg_css ).'">';
				$out .= '<div class="container">';

				$terms = get_terms(''.$customposttype.'');
				$count = count($terms);

			if ( $filter  != 'hide' ){
				if ( $count > 0 ){
					$filter_pos = ( $filterpos != '' ) ? ' class="'.$filterpos.'"' : '';
					$out .= '<ul id="gallery-set"'.$filter_pos.'>';
						$out .= '<li><a class="selected" data-cat="*" href="#">'.__('All','nt-xeon').'</a></li>';

					foreach ( $terms as $term ) {
						$termname = strtolower($term->name);
						$termslug = strtolower($term->slug);
						$term_slug = str_replace(' ', '-', $termslug);

						$out .= '<li><a data-cat="'.$term_slug.'" href="#">'.$term->name.'</a></li>';

					}
					$out .= '</ul>';
				}
			}
					$out .= '<div class="gallery gallery--style-2">';
						$out .= '<div class="gallery__inner">';
							$out .= '<div class="row js-isotope" data-isotope-options=\'{ "itemSelector": ".js-isotope__item", "transitionDuration": "0.8s", "percentPosition": "true"}\'>';

							$nt_agricom_gallery_query = new WP_Query($nt_agricom_gallery_query_arg);
							if( $nt_agricom_gallery_query->have_posts() ) :
							while ($nt_agricom_gallery_query->have_posts()) : $nt_agricom_gallery_query->the_post();

								$linktype	= get_post_meta( get_the_ID(), 'nt_agricom_gallery_linktype', true );
								$vidurl		= get_post_meta( get_the_ID(), 'nt_agricom_gallery_vidurl', true );

								$terms = get_the_terms( $post->ID, ''.$customposttype.'' );
								if ( $terms && ! is_wp_error( $terms ) ) :
									$links = array();
									foreach ( $terms as $term ){
										$links[] = $term->name;
									}
									$links 	= str_replace(' ', '-', $links);
									$tax 	= join( " ", $links );
									$taxi 	= join( " / ", $links );
								else :
									$tax = '';
								endif;

								$out .= '<div class="'.$coltotal.' js-isotope__item '.strtolower( $tax ).'">';
									$out .= '<div class="gallery__item">';
										$out .= '<div class="gallery__item__inner">';
										if( has_post_thumbnail() ) {
											$out .= '<figure>';

											$img_w	= $imgwidth  ? $imgwidth  : 510;
											$img_h	= $imgheight ? $imgheight : 510;

											$nt_agricom_postthumb 		= get_post_thumbnail_id();
											$nt_agricom_postthumbimg 	= wp_get_attachment_url( $nt_agricom_postthumb,'full' );
											$nt_agricom_postimg 		= nt_agricom_aq_resize( $nt_agricom_postthumbimg, $img_w, $img_h , true, true, true );

											$out .='<img src="'. get_template_directory_uri() . '/images/blank.gif" style="background-image: url('.esc_url( $nt_agricom_postimg ).');" alt="'.get_the_title().'">';

											if ( $linktype != 'single' ){
												if ( $vidurl !='' ){
													$out .= '<a href="'.esc_url( $vidurl ).'" data-gallery="gall"></a>';
												}else{
													$out .= '<a href="'.esc_url( $nt_agricom_postthumbimg ).'" data-gallery="gall"></a>';
												}
											}else{
												$out .= '<a href="'.get_permalink().'"></a>';
											}
											$out .= '</figure>';
										}
										$out .= '</div>';
										$out .= '<div class="gallery__item__description">';
											// post title
											$post_title = get_the_title();
											if ( $post_title !='' ){ $out .= ''.nt_agricom_element( $heading=$post_title, $tag='span', $class='gallery__item__title', $tlineh='', $tsize, $tcolor ).''; }

										$out .= '</div>';
									$out .= '</div>';
								$out .= '</div>';

							endwhile;
							endif;
							wp_reset_postdata();

							$out .= '</div>';
						$out .= '</div>';
					$out .= '</div>';

					// button bottom
					if ( ! empty( $link ) ) {

						$btn_size   = ( $btnsize 	!='' ) ? $btnsize : '';
						$btn_style  = ( $btnstyle 	!='' ) ? $btnstyle : 'btn-default';
						$btn_color  = ( $btncolor 	!='' ) ? ' color:'.$btncolor.';' : '';
						$btn_bg  	= ( $btnbg 		!='' ) ? ' background-color:'.$btnbg.';' : '';
						$btn_border = ( $btnborder 	!='' ) ? ' border-color:'.$btnborder.';' : '';
						$style = ( $btn_color !='' || $btn_bg !='' || $btn_border !='' ) ? ' style="'.$btn_color.$btn_bg.$btn_border.'"' : '';

						$link = vc_build_link( $link );
						$out .= '<div class="text-center"><a id="gallery-more-btn" class="custom-btn '.$btn_size.' '.$btn_style.'" href="' . esc_attr( $link['url'] ) . '"' . ( $link['target'] ? ' target="' . esc_attr( $link['target'] ) . '"' : '' ) . ( $link['rel'] ? ' rel="' . esc_attr( $link['rel'] ) . '"' : '' ) . ( $link['title'] ? ' title="' . esc_attr( $link['title'] ) . '"' : '' ) . ''.$style.'>' . esc_attr( $link['title'] ) . '</a></div>';
					}

				$out .= '</div>';
			$out .= '</section>';

		}elseif( $galstyle  == 'style3' ){

			$out .= '<section class="gallery-section section'.esc_attr( $bg_css ).'">';
				$out .= '<div class="gallery-container">';

				$terms = get_terms(''.$customposttype.'');
				$count = count($terms);

			if ( $filter  != 'hide' ){
				if ( $count > 0 ){
					$filter_pos = ( $filterpos != '' ) ? ' class="'.$filterpos.'"' : '';
					$out .= '<ul id="gallery-set"'.$filter_pos.'>';
						$out .= '<li><a class="selected" data-cat="*" href="#">'.__('All','nt-xeon').'</a></li>';

					foreach ( $terms as $term ) {
						$termname = strtolower($term->name);
						$termslug = strtolower($term->slug);
						$term_slug = str_replace(' ', '-', $termslug);

						$out .= '<li><a data-cat="'.$term_slug.'" href="#">'.$term->name.'</a></li>';

					}
					$out .= '</ul>';
				}
			}
					$out .= '<div class="gallery gallery--style-3">';
						$out .= '<div class="gallery__inner">';
							$out .= '<div class="row row-no-gutter  js-isotope" data-isotope-options=\'{ "itemSelector": ".js-isotope__item", "transitionDuration": "0.8s", "percentPosition": "true"}\'>';

							$nt_agricom_gallery_query = new WP_Query($nt_agricom_gallery_query_arg);
							if( $nt_agricom_gallery_query->have_posts() ) :
							while ($nt_agricom_gallery_query->have_posts()) : $nt_agricom_gallery_query->the_post();

							$linktype	= get_post_meta( get_the_ID(), 'nt_agricom_gallery_linktype', true );
							$vidurl		= get_post_meta( get_the_ID(), 'nt_agricom_gallery_vidurl', true );

								$terms = get_the_terms( $post->ID, ''.$customposttype.'' );
								if ( $terms && ! is_wp_error( $terms ) ) :
									$links = array();
									foreach ( $terms as $term ){
										$links[] = $term->name;
									}
									$links 	= str_replace(' ', '-', $links);
									$tax 	= join( " ", $links );
									$taxi 	= join( " / ", $links );
								else :
									$tax = '';
								endif;

								$out .= '<div class="'.$coltotal.' js-isotope__item  '.strtolower( $tax ).'">';
									$out .= '<div class="gallery__item">';
										$out .= '<div class="gallery__item__inner">';

											if( has_post_thumbnail() ) {
												$out .= '<figure>';

												$img_w	= $imgwidth  ? $imgwidth  : 510;
												$img_h	= $imgheight ? $imgheight : 510;

												$nt_agricom_postthumb 		= get_post_thumbnail_id();
												$nt_agricom_postthumbimg 	= wp_get_attachment_url( $nt_agricom_postthumb,'full' );
												$nt_agricom_postimg 		= nt_agricom_aq_resize( $nt_agricom_postthumbimg, $img_w, $img_h , true, true, true );

												$out .='<img src="'. get_template_directory_uri() . '/images/blank.gif" style="background-image: url('.esc_url( $nt_agricom_postimg ).');" alt="'.get_the_title().'">';

													if ( $linktype != 'single' ){
														if ( $vidurl !='' ){
															$out .= '<a class="gallery__item__description" href="'.esc_url( $vidurl ).'" data-gallery="gall">';
														}else{
															$out .= '<a class="gallery__item__description" href="'.esc_url( $nt_agricom_postthumbimg ).'" data-gallery="gall">';
														}
													}else{
														$out .= '<a class="gallery__item__description" href="'.get_permalink().'">';
													}
														// post title
														$post_title = get_the_title();
														if ( $post_title !='' ){ $out .= ''.nt_agricom_element( $heading=$post_title, $tag='span', $class='gallery__item__title', $tlineh='', $tsize, $tcolor ).''; }
														$out .= '<span class="gallery__item__subtitle">'.esc_html( $taxi ).' </span>';
													$out .= '</a>';
												$out .= '</figure>';
											}

										$out .= '</div>';
									$out .= '</div>';
								$out .= '</div>';
							endwhile;
							endif;
							wp_reset_postdata();

							$out .= '</div>';
						$out .= '</div>';
					$out .= '</div>';

					// button bottom
					if ( ! empty( $link ) ) {

						$btn_size   = ( $btnsize 	!='' ) ? $btnsize : '';
						$btn_style  = ( $btnstyle 	!='' ) ? $btnstyle : 'btn-default';
						$btn_color  = ( $btncolor 	!='' ) ? ' color:'.$btncolor.';' : '';
						$btn_bg  	= ( $btnbg 		!='' ) ? ' background-color:'.$btnbg.';' : '';
						$btn_border = ( $btnborder 	!='' ) ? ' border-color:'.$btnborder.';' : '';
						$style = ( $btn_color !='' || $btn_bg !='' || $btn_border !='' ) ? ' style="'.$btn_color.$btn_bg.$btn_border.'"' : '';

						$link = vc_build_link( $link );
						$out .= '<div class="text-center"><a id="gallery-more-btn" class="custom-btn '.$btn_size.' '.$btn_style.'" href="' . esc_attr( $link['url'] ) . '"' . ( $link['target'] ? ' target="' . esc_attr( $link['target'] ) . '"' : '' ) . ( $link['rel'] ? ' rel="' . esc_attr( $link['rel'] ) . '"' : '' ) . ( $link['title'] ? ' title="' . esc_attr( $link['title'] ) . '"' : '' ) . ''.$style.'>' . esc_attr( $link['title'] ) . '</a></div>';
					}

				$out .= '</div>';
			$out .= '</section>';

		}elseif( $galstyle  == 'style4' ){

			$out .= '<section class="gallery-section section'.esc_attr( $bg_css ).'">';
				$out .= '<div class="gallery-container">';

				$terms = get_terms(''.$customposttype.'');
				$count = count($terms);

			if ( $filter  != 'hide' ){
				if ( $count > 0 ){
					$filter_pos = ( $filterpos != '' ) ? ' class="'.$filterpos.'"' : '';
					$out .= '<ul id="gallery-set"'.$filter_pos.'>';
						$out .= '<li><a class="selected" data-cat="*" href="#">'.__('All','nt-xeon').'</a></li>';

					foreach ( $terms as $term ) {
						$termname = strtolower($term->name);
						$termslug = strtolower($term->slug);
						$term_slug = str_replace(' ', '-', $termslug);

						$out .= '<li><a data-cat="'.$term_slug.'" href="#">'.$term->name.'</a></li>';

					}
					$out .= '</ul>';
				}
			}
					$out .= '<div class="gallery gallery--style-4">';
						$out .= '<div class="gallery__inner">';
							$out .= '<div class="row row-no-gutter  js-isotope" data-isotope-options=\'{ "itemSelector": ".js-isotope__item", "transitionDuration": "0.8s", "percentPosition": "true", "masonry": { "columnWidth": ".js-isotope__grid-sizer" }}\'>';
								$out .= '<div class="'.$coltotal.'  js-isotope__grid-sizer" style="min-height: 0;"></div>';

							$countitem = 0;
							$nt_agricom_gallery_query = new WP_Query($nt_agricom_gallery_query_arg);
							if( $nt_agricom_gallery_query->have_posts() ) :
							while ($nt_agricom_gallery_query->have_posts()) : $nt_agricom_gallery_query->the_post();

							$linktype	= get_post_meta( get_the_ID(), 'nt_agricom_gallery_linktype', true );
							$vidurl		= get_post_meta( get_the_ID(), 'nt_agricom_gallery_vidurl', true );

								$terms = get_the_terms( $post->ID, ''.$customposttype.'' );
								if ( $terms && ! is_wp_error( $terms ) ) :
									$links = array();
									foreach ( $terms as $term ){
										$links[] = $term->name;
									}
									$links 	= str_replace(' ', '-', $links);
									$tax 	= join( " ", $links );
									$taxi 	= join( " / ", $links );
								else :
									$tax = '';
								endif;

								$out .= '<div class="'.$coltotal.'  js-isotope__item  '.strtolower( $tax ).'">';

								if ( $countitem % 2 == 0 ) {
									$out .= '<div class="gallery__item" data-x="1" data-y="1">';
								}else{
									$out .= '<div class="gallery__item" data-x="2" data-y="1">';
								}
								$countitem++;
										$out .= '<div class="gallery__item__inner">';

										if( has_post_thumbnail() ) {
											$out .= '<figure>';

											$nt_agricom_postthumb 		= get_post_thumbnail_id();
											$nt_agricom_postthumbimg 	= wp_get_attachment_url( $nt_agricom_postthumb,'full' );

											$out .='<img src="'. get_template_directory_uri() . '/images/blank.gif" style="background-image: url('.esc_url( $nt_agricom_postthumbimg ).');" alt="'.get_the_title().'">';

											if ( $linktype != 'single' ){
												if ( $vidurl !='' ){
													$out .= '<a class="gallery__item__description" href="'.esc_url( $vidurl ).'" data-gallery="gall">';
												}else{
													$out .= '<a class="gallery__item__description" href="'.esc_url( $nt_agricom_postthumbimg ).'" data-gallery="gall">';
												}
											}else{
												$out .= '<a class="gallery__item__description" href="'.get_permalink().'">';
											}
													// post title
													$post_title = get_the_title();
													if ( $post_title !='' ){ $out .= ''.nt_agricom_element( $heading=$post_title, $tag='span', $class='gallery__item__title', $tlineh='', $tsize, $tcolor ).''; }
													$out .= '<span class="gallery__item__subtitle">'.esc_html( $taxi ).' </span>';
												$out .= '</a>';
											$out .= '</figure>';
										}
										$out .= '</div>';
									$out .= '</div>';
								$out .= '</div>';

							endwhile;
							endif;
							wp_reset_postdata();


							$out .= '</div>';
						$out .= '</div>';
					$out .= '</div>';

					// button bottom
					if ( ! empty( $link ) ) {

						$btn_size   = ( $btnsize 	!='' ) ? $btnsize : '';
						$btn_style  = ( $btnstyle 	!='' ) ? $btnstyle : 'btn-default';
						$btn_color  = ( $btncolor 	!='' ) ? ' color:'.$btncolor.';' : '';
						$btn_bg  	= ( $btnbg 		!='' ) ? ' background-color:'.$btnbg.';' : '';
						$btn_border = ( $btnborder 	!='' ) ? ' border-color:'.$btnborder.';' : '';
						$style = ( $btn_color !='' || $btn_bg !='' || $btn_border !='' ) ? ' style="'.$btn_color.$btn_bg.$btn_border.'"' : '';

						$link = vc_build_link( $link );
						$out .= '<div class="text-center"><a id="gallery-more-btn" class="custom-btn '.$btn_size.' '.$btn_style.'" href="' . esc_attr( $link['url'] ) . '"' . ( $link['target'] ? ' target="' . esc_attr( $link['target'] ) . '"' : '' ) . ( $link['rel'] ? ' rel="' . esc_attr( $link['rel'] ) . '"' : '' ) . ( $link['title'] ? ' title="' . esc_attr( $link['title'] ) . '"' : '' ) . ''.$style.'>' . esc_attr( $link['title'] ) . '</a></div>';
					}

				$out .= '</div>';
			$out .= '</section>';

		}elseif( $galstyle  == 'style5' ){

			$out .= '<section class="gallery-section section'.esc_attr( $bg_css ).'">';
				$out .= '<div class="gallery-container">';

				$terms = get_terms(''.$customposttype.'');
				$count = count($terms);

			if ( $filter  != 'hide' ){
				if ( $count > 0 ){
					$filter_pos = ( $filterpos != '' ) ? ' class="'.$filterpos.'"' : '';
					$out .= '<ul id="gallery-set"'.$filter_pos.'>';
						$out .= '<li><a class="selected" data-cat="*" href="#">'.__('All','nt-xeon').'</a></li>';

					foreach ( $terms as $term ) {
						$termname = strtolower($term->name);
						$termslug = strtolower($term->slug);
						$term_slug = str_replace(' ', '-', $termslug);

						$out .= '<li><a data-cat="'.$term_slug.'" href="#">'.$term->name.'</a></li>';

					}
					$out .= '</ul>';
				}
			}
					$out .= '<div class="gallery gallery--style-5">';
						$out .= '<div class="gallery__inner">';
							$out .= '<div class="row js-isotope" data-isotope-options=\'{ "itemSelector": ".js-isotope__item", "transitionDuration": "0.8s", "percentPosition": "true", "masonry": { "columnWidth": ".js-isotope__grid-sizer" }}\'>';
								$out .= '<div class="'.$coltotal.'  js-isotope__grid-sizer" style="min-height: 0;"></div>';
							$countitem = 0;
							$nt_agricom_gallery_query = new WP_Query($nt_agricom_gallery_query_arg);
							if( $nt_agricom_gallery_query->have_posts() ) :
							while ($nt_agricom_gallery_query->have_posts()) : $nt_agricom_gallery_query->the_post();

							$linktype	= get_post_meta( get_the_ID(), 'nt_agricom_gallery_linktype', true );
							$vidurl		= get_post_meta( get_the_ID(), 'nt_agricom_gallery_vidurl', true );

								$terms = get_the_terms( $post->ID, ''.$customposttype.'' );
								if ( $terms && ! is_wp_error( $terms ) ) :
									$links = array();
									foreach ( $terms as $term ){
										$links[] = $term->name;
									}
									$links 	= str_replace(' ', '-', $links);
									$tax 	= join( " ", $links );
									$taxi 	= join( " / ", $links );
								else :
									$tax = '';
								endif;

								$out .= '<div class="'.$coltotal.'  js-isotope__item  '.strtolower( $tax ).'">';
								if ( $countitem % 2 == 0 ) {
									$out .= '<div class="gallery__item" data-x="1" data-y="1">';
								}else{
									$out .= '<div class="gallery__item" data-x="2" data-y="1">';
								}
								$countitem++;
										$out .= '<div class="gallery__item__inner">';

										if( has_post_thumbnail() ) {
											$out .= '<figure>';

											$nt_agricom_postthumb 		= get_post_thumbnail_id();
											$nt_agricom_postthumbimg 	= wp_get_attachment_url( $nt_agricom_postthumb,'full' );

											$out .='<img src="'. get_template_directory_uri() . '/images/blank.gif" style="background-image: url('.esc_url( $nt_agricom_postthumbimg ).');" alt="'.get_the_title().'">';

											if ( $linktype != 'single' ){
												if ( $vidurl !='' ){
													$out .= '<a class="gallery__item__description" href="'.esc_url( $vidurl ).'" data-gallery="gall">';
												}else{
													$out .= '<a class="gallery__item__description" href="'.esc_url( $nt_agricom_postthumbimg ).'" data-gallery="gall">';
												}
											}else{
												$out .= '<a class="gallery__item__description" href="'.get_permalink().'">';
											}
													// post title
													$post_title = get_the_title();
													if ( $post_title !='' ){ $out .= ''.nt_agricom_element( $heading=$post_title, $tag='span', $class='gallery__item__title', $tlineh='', $tsize, $tcolor ).''; }
													$out .= '<span class="gallery__item__subtitle">'.esc_html( $taxi ).' </span>';
												$out .= '</a>';
											$out .= '</figure>';
										}
										$out .= '</div>';
									$out .= '</div>';
								$out .= '</div>';
							endwhile;
							endif;
							wp_reset_postdata();

							$out .= '</div>';
						$out .= '</div>';
					$out .= '</div>';

					// button bottom
					if ( ! empty( $link ) ) {

						$btn_size   = ( $btnsize 	!='' ) ? $btnsize : '';
						$btn_style  = ( $btnstyle 	!='' ) ? $btnstyle : 'btn-default';
						$btn_color  = ( $btncolor 	!='' ) ? ' color:'.$btncolor.';' : '';
						$btn_bg  	= ( $btnbg 		!='' ) ? ' background-color:'.$btnbg.';' : '';
						$btn_border = ( $btnborder 	!='' ) ? ' border-color:'.$btnborder.';' : '';
						$style = ( $btn_color !='' || $btn_bg !='' || $btn_border !='' ) ? ' style="'.$btn_color.$btn_bg.$btn_border.'"' : '';

						$link = vc_build_link( $link );
						$out .= '<div class="text-center"><a id="gallery-more-btn" class="custom-btn '.$btn_size.' '.$btn_style.'" href="' . esc_attr( $link['url'] ) . '"' . ( $link['target'] ? ' target="' . esc_attr( $link['target'] ) . '"' : '' ) . ( $link['rel'] ? ' rel="' . esc_attr( $link['rel'] ) . '"' : '' ) . ( $link['title'] ? ' title="' . esc_attr( $link['title'] ) . '"' : '' ) . ''.$style.'>' . esc_attr( $link['title'] ) . '</a></div>';
					}

				$out .= '</div>';
			$out .= '</section>';

		}else{

			$out .= '<section class="gallery-section section'.esc_attr( $bg_css ).'">';
				$out .= '<div class="gallery-container">';
					$out .= '<div class="gallery gallery--style-3">';
						$out .= '<div class="gallery__inner">';
							$out .= '<div class="row row-no-gutter flex-items-sm-middle">';

							if ( $heading !='' || $desc !='' ){
								$out .= '<div class="'.$coltotal.'">';
									$out .= '<div class="gallery__item gallery__item--text">';

									if ( $heading !='' ){ $out .= ''.nt_agricom_element( $heading, $tag='h2', $class='', $hlineh='', $hsize, $hcolor ).''; }

									if ( $desc !='' ){ $out .= ''.nt_agricom_element( $desc, $tag='p', $class='', $dlineh='', $dsize, $dcolor ).''; }

										// button bottom
										if ( ! empty( $link ) ) {

											$style = ( $btncolor !='' ) ? ' style="color:'.$btncolor.';"' : '';

											$link = vc_build_link( $link );
											$out .= '<a class="gallery-more-link" href="' . esc_attr( $link['url'] ) . '"' . ( $link['target'] ? ' target="' . esc_attr( $link['target'] ) . '"' : '' ) . ( $link['rel'] ? ' rel="' . esc_attr( $link['rel'] ) . '"' : '' ) . ( $link['title'] ? ' title="' . esc_attr( $link['title'] ) . '"' : '' ) . ''.$style.'>' . esc_attr( $link['title'] ) . '</a>';
										}
									$out .= '</div>';
								$out .= '</div>';
							}

							$nt_agricom_gallery_query = new WP_Query($nt_agricom_gallery_query_arg);
							if( $nt_agricom_gallery_query->have_posts() ) :
							while ($nt_agricom_gallery_query->have_posts()) : $nt_agricom_gallery_query->the_post();

							$linktype	= get_post_meta( get_the_ID(), 'nt_agricom_gallery_linktype', true );
							$vidurl		= get_post_meta( get_the_ID(), 'nt_agricom_gallery_vidurl', true );

								$terms = get_the_terms( $post->ID, ''.$customposttype.'' );
								if ( $terms && ! is_wp_error( $terms ) ) :
									$links = array();
									foreach ( $terms as $term ){
										$links[] = $term->name;
									}
									$links 	= str_replace(' ', '-', $links);
									$tax 	= join( " ", $links );
									$taxi 	= join( " / ", $links );
								else :
									$tax = '';
								endif;

								$out .= '<div class="'.$coltotal.'">';
									$out .= '<div class="gallery__item">';
										$out .= '<div class="gallery__item__inner">';

										if( has_post_thumbnail() ) {
											$out .= '<figure>';

											$img_w	= $imgwidth  ? $imgwidth  : 510;
											$img_h	= $imgheight ? $imgheight : 510;

											$nt_agricom_postthumb 		= get_post_thumbnail_id();
											$nt_agricom_postthumbimg 	= wp_get_attachment_url( $nt_agricom_postthumb,'full' );
											$nt_agricom_postimg 		= nt_agricom_aq_resize( $nt_agricom_postthumbimg, $img_w, $img_h , true, true, true );


											$out .='<img src="'. get_template_directory_uri() . '/images/blank.gif" style="background-image: url('.esc_url( $nt_agricom_postimg ).');" alt="'.get_the_title().'">';

											if ( $linktype != 'single' ){
												if ( $vidurl !='' ){
													$out .= '<a class="gallery__item__description" href="'.esc_url( $vidurl ).'" data-gallery="gall">';
												}else{
													$out .= '<a class="gallery__item__description" href="'.esc_url( $nt_agricom_postthumbimg ).'" data-gallery="gall">';
												}
											}else{
												$out .= '<a class="gallery__item__description" href="'.get_permalink().'">';
											}
													// post title
													$post_title = get_the_title();
													if ( $post_title !='' ){ $out .= ''.nt_agricom_element( $heading=$post_title, $tag='span', $class='gallery__item__title', $tlineh='', $tsize, $tcolor ).''; }
													$out .= '<span class="gallery__item__subtitle">'.esc_html( $taxi ).' </span>';
												$out .= '</a>';
											$out .= '</figure>';
										}

										$out .= '</div>';
									$out .= '</div>';
								$out .= '</div>';
							endwhile;
							endif;
							wp_reset_postdata();

							$out .= '</div>';
						$out .= '</div>';
					$out .= '</div>';
				$out .= '</div>';
			$out .= '</section>';
		}

		return $out;
	}
}
add_shortcode('nt_agricom_section_gallery', 'theme_nt_agricom_section_gallery');

/*-----------------------------------------------------------------------------------*/
/*	TEAM
/*-----------------------------------------------------------------------------------*/
function theme_nt_agricom_section_team($atts){
	extract(shortcode_atts(array(
	//section
	'custompost'=> 'team',
	'heading'	=> '',
	'desc'		=> '',
	"fcolumn"	=> '',
	"fxscol"	=> '',
	"fsmcol"	=> '',
	"fmdcol"	=> '',
	"flgcol"	=> '',
	//post opt
	'orderby'	=> 'date',
	'order'		=> 'DESC',
	'p_count'	=> '4',
	'p_cat'		=> 'all',
	//team style
	"hsize"		=> '',
	"hlineh"	=> '',
	"hcolor"	=> '',
	"dsize"		=> '',
	"dlineh"	=> '',
	"dcolor"	=> '',
	//post style
	"tsize"		=> '',
	"tlineh"	=> '',
	"tcolor"	=> '',
	"jsize"		=> '',
	"jlineh"	=> '',
	"jcolor"	=> '',
	//bg css
	"bgcss"		=> '',

    ), $atts));

	global $post;

	$customposttype = ( $custompost != '' ) ? strtolower( $custompost ) : 'team';

	if ( post_type_exists( $customposttype ) ) {

		$nt_agricom_team_args = array(

			'post_type'		=> $customposttype,
			'posts_per_page'=> $p_count,
			'order'			=> $order,
			'orderby'		=> $orderby,
			'post_status'	=> 'publish'

		);

		$bg_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $bgcss, ' ' ),  $atts );

		if( $p_cat != 'all' ){
			$str = $p_cat;
			$arr = explode( ',', $str );
			$nt_agricom_team_args['tax_query'][] = array( 'taxonomy' => ''.$customposttype.'', 'field' => 'slug', 'terms' => $arr );

		}

		$out = '';

			$out .= '<section class="section section-team'.esc_attr( $bg_css ).'">';
				$out .= '<div class="container">';
					$out .= '<div class="team">';
						$out .= '<div class="team__inner">';
							$out .= '<div class="row row-no-gutter">';


							if ( $heading != '' || $desc != '' ) {

								if ( $fcolumn != 'custom' ) {
									$fcoltotal = $fcolumn ? $fcolumn : 'col-xs-12 col-lg-6';
								}
								if ( $fcolumn =='custom' ) {
									$fxs_col = $fxscol ? $fxscol : 'col-xs-12';
									$fsm_col = $fsmcol ? $fsmcol : '';
									$fmd_col = $fmdcol ? $fmdcol : '';
									$flg_col = $flgcol ? $flgcol : 'col-lg-6';
									$fitemcolumn = ''.esc_attr( $fxs_col ).' '.esc_attr( $fsm_col ).' '.esc_attr( $fmd_col ).' '.esc_attr( $flg_col ).'';
									$fcoltotal = preg_replace('/\s\s+/', ' ', $fitemcolumn);
								}

								$out .= '<div class="'.$fcoltotal.'">';
									$out .= '<div class="team__item team__item--text">';
										$out .= '<div>';

											if ( $heading != '' ) { $out .= ''.nt_agricom_element( $heading=$heading, $tag='h2', $class='', $hlineh, $hsize, $hcolor ).''; }

											if ( $desc != '' ) { $out .= ''.nt_agricom_element( $heading=$desc, $tag='p', $class='', $dlineh, $dsize, $dcolor ).''; }

										$out .= '</div>';
									$out .= '</div>';
								$out .= '</div>';
							}

							$nt_agricom_team_query = new WP_Query($nt_agricom_team_args);
							if ( $nt_agricom_team_query->have_posts() ) :
							while ($nt_agricom_team_query->have_posts()) : $nt_agricom_team_query->the_post();

								$teamjob	= get_post_meta( get_the_ID(), 'nt_agricom_team_job', true );
								$imgwidth	= get_post_meta( get_the_ID(), 'nt_agricom_team_imgwidth', true );
								$imgheight	= get_post_meta( get_the_ID(), 'nt_agricom_team_imgheight', true );

								$xscol		= get_post_meta( get_the_ID(), 'nt_agricom_xs_col', true );
								$smcol		= get_post_meta( get_the_ID(), 'nt_agricom_sm_col', true );
								$mdcol		= get_post_meta( get_the_ID(), 'nt_agricom_md_col', true );
								$lgcol		= get_post_meta( get_the_ID(), 'nt_agricom_lg_col', true );


								$xs_col 	= $xscol ? $xscol : 'col-xs-12';
								$sm_col 	= $smcol ? $smcol : '';
								$md_col 	= $mdcol ? $mdcol : 'col-md-6';
								$lg_col 	= $lgcol ? $lgcol : 'col-lg-3';

								$column =  ''.esc_attr( $xs_col ).' '.esc_attr( $sm_col ).' '.esc_attr( $md_col ).' '.esc_attr( $lg_col ).'';
								$coltotal = preg_replace('/\s\s+/', ' ', $column);
								$out .= '<div class="'.$coltotal.'">';
									$out .= '<div class="team__item">';
										$out .= '<div class="team__item__inner">';
										if( has_post_thumbnail() ) {
											$out .= '<figure>';

												$img_w	= ( $imgwidth != '' )  ? ( is_numeric( $imgwidth ) )  : 510;
												$img_h	= ( $imgheight != '' ) ? ( is_numeric( $imgheight ) ) : 510;


												$nt_agricom_postthumb 	= get_post_thumbnail_id();
												$nt_agricom_postthumbimg = wp_get_attachment_url( $nt_agricom_postthumb,'full' );
												$nt_agricom_postimg 	= nt_agricom_aq_resize( $nt_agricom_postthumbimg, $img_w, $img_h , true, true, true );

												$out .='<img src="'. get_template_directory_uri() . '/images/blank.gif" style="background-image: url('.esc_url( $nt_agricom_postimg ).');" alt="'.get_the_title().'">';

												$out .= '<div class="team__item__descriptiom">';
													// team name
													$team_name = get_the_title();

													if ( $team_name !='' ) {
													$out .= '<a href="'.esc_url( get_permalink() ).'">';
														$out .= ''.nt_agricom_element( $heading=$team_name, $tag='span', $class='team__item__title', $tlineh, $tsize, $tcolor ).'';
													$out .= '</a>';
													}
													// team job
													if ( $teamjob !='' ) {

														$out .= ''.nt_agricom_element( $heading=$teamjob, $tag='span', $class='team__item__subtitle', $jlineh, $jsize, $jcolor ).'';
													}

												$out .= '</div>';
											$out .= '</figure>';
										}
										$out .= '</div>';
									$out .= '</div>';
								$out .= '</div>';
							endwhile;
							endif;
							wp_reset_postdata();

							$out .= '</div>';
						$out .= '</div>';
					$out .= '</div>';
				$out .= '</div>';
			$out .= '</section>';

		return $out;
	}
}
add_shortcode('nt_agricom_section_team', 'theme_nt_agricom_section_team');


/*-----------------------------------------------------------------------------------*/
/*	PRODUCTS agricom
/*-----------------------------------------------------------------------------------*/
function theme_nt_agricom_section_product_list2( $atts, $content = null ) {
    extract( shortcode_atts(array(
	//post options
	"proloop"  	=> '',
	"iconimg"  	=> '',
	"imgwidth"  => '',
	"imgheight" => '',
	"link" 		=> '',
	"desc" 		=> '',
	"img" 		=> '',
	//custom style
	"tlineh"	=> '',
	"tsize"		=> '',
	"tcolor"	=> '',
	"dtlineh"	=> '',
	"dtsize"	=> '',
	"dtcolor"	=> '',
	//bg css
	"bgcss"		=> '',

    ), $atts) );

	$bg_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $bgcss, ' ' ),  $atts );

	$product_loop = (array) vc_param_group_parse_atts($proloop);

	$out = '';

	if ( !empty($product_loop) ){

		$out .= '<section class="product-section section'.esc_attr( $bg_css ).'">';
			$out .= '<div class="container">';
				$out .= '<div class="products">';
					$out .= '<div class="products__inner">';

					foreach ( $product_loop as $p ) {
						$out .= '<div class="row flex-items-xs-middle row-no-gutter">';
							$out .= '<div class="col-md-6">';
								$out .= '<div class="product__item product__item--text">';

									if( isset($p['iconimg'])!= '' ) {
										$out .= ''.nt_agricom_img( $imgsrc=$p['iconimg'], $imgclass='product__item__ico img-responsive', $imgwidth=$p['imgwidth'], $imgheight=$p['imgheight'] ).'';
									}
									$link = vc_build_link( $p['link'] );
									if( isset( $link['title'] )!= '' ) {

										$t_color 	= ( $tcolor !='' ) ? ' color:'.esc_attr( $tcolor ).';' : '';
										$t_size 	= ( $tsize !=''  ) ? ' font-size:'.esc_attr( $tsize ).';' : '';
										$t_lineh 	= ( $tlineh !='' ) ? ' line-height:'.esc_attr( $tlineh ).';' : '';
										$tstyle= ( $t_color !='' || $t_size !='' || $t_lineh !='' ) ? ' style="'.$t_color.$t_size.$t_lineh.'"' : '';

										$out .= '<h3 class="product__item__title"><a href="' . esc_attr( $link['url'] ) . '"' . ( $link['target'] ? ' target="' .esc_attr( $link['target'] ).'"' : '' ) . ( $link['rel'] ? ' rel="' . esc_attr( $link['rel'] ) . '"' : '' ) . ( $link['title'] ? ' title="'.esc_attr( $link['title'] ).'"' : '' ) . ''.$tstyle.'>'.esc_attr( $link['title'] ).'</a></h3>';
									}

									if( isset($p['desc'])!= '' ) {
										$dt_color 	= ( $dtcolor !='' ) ? ' color:'.esc_attr( $dtcolor ).';' : '';
										$dt_size 	= ( $dtsize !=''  ) ? ' font-size:'.esc_attr( $dtsize ).';' : '';
										$dt_lineh 	= ( $dtlineh !='' ) ? ' line-height:'.esc_attr( $dtlineh ).';' : '';
										$dtstyle= ( $dt_color !='' || $dt_size !='' || $dt_lineh !='' ) ? ' style="'.$dt_color.$dt_size.$dt_lineh.'"' : '';
										$out .= '<p'.$dtstyle.'>'.$p['desc'].'</p>';
									}

								$out .= '</div>';
							$out .= '</div>';

							$out .= '<div class="col-md-6">';
								$out .= '<div class="product__item product__item--image">';
									if( isset($p['img'])!= '' ) {
										$out .= ''.nt_agricom_img( $imgsrc=$p['img'], $imgclass='product__item__ico img-responsive', $imgwidth='', $imgheight='' ).'';
									}

								$out .= '</div>';
							$out .= '</div>';

						$out .= '</div>';
					}

					$out .= '</div>';
				$out .= '</div>';
			$out .= '</div>';
		$out .= '</section>';
	}
	return $out;
}
add_shortcode('nt_agricom_section_product_list2', 'theme_nt_agricom_section_product_list2');

/*-----------------------------------------------------------------------------------*/
/*	PRODUCTS agricom
/*-----------------------------------------------------------------------------------*/
function theme_nt_agricom_section_product_list( $atts, $content = null ) {
    extract( shortcode_atts(array(
	//post options
	"woo_orderby"  	=> 'date',
	"woo_order"    	=> 'DESC',
	"woo_posts"    	=> '4',
	"showcat"		=> '',
	"catposition"   => '',
	"catlink"   	=> '',
	"separator"   	=> '',
	"beforecat"   	=> '',
	"showcontent"   => '',
	"add_border"    => '',
	//custom style start
	"tlineh"		=> '',
	"tsize"			=> '',
	"tcolor"		=> '',
	"dtlineh"		=> '',
	"dtsize"		=> '',
	"dtcolor"		=> '',
	//bg css
	"bgcss"			=> '',

    ), $atts) );

	$bg_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $bgcss, ' ' ),  $atts );

	$out = '';

		$out .= '<section class="product-section section'.esc_attr( $bg_css ).'">';
			$out .= '<div class="container">';
				$out .= '<div class="products">';
					$out .= '<div class="products__inner">';

				// Woo start
				if( function_exists( 'WC' ) ) {

					$nt_agricom_woo_meta_query = WC()->query->get_meta_query();
					$nt_agricom_woo_args = array(
						'post_type'				=> 'product',
						'post_status'			=> 'publish',
						'ignore_sticky_posts'	=> 1,
						'posts_per_page' 		=> $woo_posts,
						'orderby' 				=> $woo_orderby,
						'order' 				=> $woo_order,
						'meta_query' 			=> $nt_agricom_woo_meta_query
					);

					ob_start();

					$nt_agricom_woo_products = new WP_Query( apply_filters( 'woocommerce_shortcode_products_query', $nt_agricom_woo_args, $atts ) );
					if ( $nt_agricom_woo_products->have_posts() ) :
					while ( $nt_agricom_woo_products->have_posts() ) : $nt_agricom_woo_products->the_post();
					global $product;

					$iconimg = get_post_meta( get_the_ID(), 'nt_agricom_product_iconimg', true );
						// partials
						$p_id 			= $product->get_id();
						$add_to_url 	= $product->add_to_cart_url();
						$add_to_text 	= $product->add_to_cart_text();
						$image 			= $product->get_image('shop_catalog');
						$stock 			= $product->is_in_stock();
						$sale 			= $product->is_on_sale();
						$regular 		= $product->get_price_html();
						$p_title 		= $product->get_title();
						$rating 		= $product->get_average_rating();
						$size 			= wc_get_image_size( 'shop_catalog' );
						$placeh_width 	= $size['width'];

						if( $showcat == 'yes' ) {
							$cat_html = '';
							$terms = get_the_terms( get_the_ID(), 'product_cat' );
							$count_terms = !empty($terms) ? count($terms) : 0;
							$sep_cat = $separator ? $separator : ', '; // separator between categories
							$cat_html .= '<span class="product__item__cat">';
							$cat_html .= $beforecat != '' ? esc_html($beforecat) : '';
							$count_item = 1;
							if( $catlink == 'archive' ) {
								$out .= wc_get_product_category_list( $product->get_id(), ' | ', '', '' );
							} else {
								foreach ($terms as $term) {

									$sep_cat = ($count_item < $count_terms) ? ', ' : '';

									if($count_terms > 1){
										$cat_html .= '<a href="'. esc_url( get_permalink( $product->id ) ) . '">'.$term->name.'</a>'.$sep_cat;
									} else {
										$cat_html .= '<a href="'. esc_url( get_permalink( $product->id ) ) . '">'.$term->name.'</a>';
									}
									$count_item++;
								}

								$cat_html .= '</span>';
							}
						}

						$has_border = ($add_border == 'yes') ? ' has-border-bottom' : '';
						$out .= '<div class="row flex-items-xs-middle row-no-gutter'.$has_border.'">';
							$out .= '<div class="col-md-6">';
								$out .= '<div class="product__item product__item--text">';

									if ( $iconimg !='' ){
										$out .= ''.nt_agricom_img( $imgsrc=$iconimg, $imgclass='product__item__ico img-responsive', $imgwidth=$imgwidth, $imgheight=$imgheight ).'';
									 }

									 // product category
 									if( $catposition == 'before-title' ) {
 										$out .= $cat_html;
 									}
									if (  $stock != '' ) {

										$t_color 	= ( $tcolor !='' ) ? ' color:'.esc_attr( $tcolor ).';' : '';
										$t_size 	= ( $tsize !=''  ) ? ' font-size:'.esc_attr( $tsize ).';' : '';
										$t_lineh 	= ( $tlineh !='' ) ? ' line-height:'.esc_attr( $tlineh ).';' : '';
										$tstyle= ( $t_color !='' || $t_size !='' || $t_lineh !='' ) ? ' style="'.$t_color.$t_size.$t_lineh.'"' : '';

										$out .= '<h3 class="product__item__title"><a href="'. esc_url( get_permalink( $p_id ) ) . '"'.$tstyle.'>'.$p_title.'</a></h3>';
									}
									// product category
									if( $catposition == 'after-title' ) {
										$out .= $cat_html;
									}
									// post content
									if( $showcontent != 'hide' ) {
										if ( has_excerpt( $p_id ) ) {
											$content = get_the_excerpt();
											$dt_color 	= ( $dtcolor !='' ) ? ' color:'.esc_attr( $dtcolor ).';' : '';
											$dt_size 	= ( $dtsize !=''  ) ? ' font-size:'.esc_attr( $dtsize ).';' : '';
											$dt_lineh 	= ( $dtlineh !='' ) ? ' line-height:'.esc_attr( $dtlineh ).';' : '';
											$dtstyle= ( $dt_color !='' || $dt_size !='' || $dt_lineh !='' ) ? ' style="'.$dt_color.$dt_size.$dt_lineh.'"' : '';
											$out .= '<p'.$dtstyle.'>'.$content.'</p>';
										}
									}
									if( $catposition == 'bottom' || $catposition == '' ) {
										$out .= $cat_html;
									}

								$out .= '</div>';
							$out .= '</div>';

							$out .= '<div class="col-md-6">';
								$out .= '<div class="product__item product__item--image">';
									if (  $stock != '' ) :

										$out .= '<a href="'. esc_url( get_permalink( $product->id ) ) . '">';

									endif;

										$out .= ''.$image.'';

									if (  $stock != '' ) :

										$out .= '</a>';

									endif;
								$out .= '</div>';
							$out .= '</div>';

						$out .= '</div>';
					endwhile;
					endif;
					ob_get_clean();
					wp_reset_postdata();
				}

					$out .= '</div>';
				$out .= '</div>';
			$out .= '</div>';
		$out .= '</section>';

	return $out;
}
add_shortcode('nt_agricom_section_product_list', 'theme_nt_agricom_section_product_list');



/*------------------------------------------------------------------- COMPONENT -------------------------------------------------------*/


/*-----------------------------------------------------------------------------------*/
/*	OVERLAY COLOR agricom
/*-----------------------------------------------------------------------------------*/
function theme_nt_agricom_section_overlaycolor( $atts, $content = null ) {
    extract( shortcode_atts(array(

	"bgcolor"	=> '',

	), $atts) );

	$out = '';

		$out .= '<div class="vc_custom_overlay_color" style="background-color:'.$bgcolor.'"></div>';

	return $out;
}
add_shortcode('nt_agricom_section_overlaycolor', 'theme_nt_agricom_section_overlaycolor');

/*-----------------------------------------------------------------------------------*/
/*	BUTTON agricom
/*-----------------------------------------------------------------------------------*/
function theme_nt_agricom_section_custombtn( $atts, $content = null ) {
    extract( shortcode_atts(array(
	"link"		=> '',
	"btnsize"	=> '',
	"btnstyle"	=> '',
	"btnpos"	=> '',
	"btnradius"	=> '',
	//custom style
	"btncolor"	=> '',
	"btnbg"		=> '',
	"btnborder"	=> '',
	"btnhcolor"	=> '',
	"btnhbg"		=> '',
	"btnhborder"	=> '',
	), $atts) );

	$out = '';

		if ( ! empty( $link ) ) {

			$btn_pos    = ( $btnpos 	!='' ) ? $btnpos : 'text-left';
			$btn_size   = ( $btnsize 	!='' ) ? $btnsize : '';
			$btn_style  = ( $btnstyle 	!='' ) ? $btnstyle : 'btn-default';
			$btn_color  = ( $btncolor 	!='' ) ? ' color:'.$btncolor.';' : '';
			$btn_bg  	= ( $btnbg 		!='' ) ? ' background-color:'.$btnbg.';' : '';
			$btn_border = ( $btnborder 	!='' ) ? ' border-color:'.$btnborder.';' : '';
			$btn_radius = ( $btnradius 	!='' ) ? ' border-radius:'.$btnradius.';' : '';
			$style = ( $btn_color !='' || $btn_bg !='' || $btn_border !='' || $btn_radius !='' ) ? ' style="'.$btn_color.$btn_bg.$btn_border.$btn_radius.'"' : '';

			//btn unique hover id
			$btnuniqid  = uniqid('btn-');
			$btnid      = substr_replace($btnuniqid,"#",0,0);
			?>

			<style>
			<?php if($btnhbg !=''){ echo $btnid ?>:hover{background-color:<?php echo esc_attr($btnhbg) ?>!important;}<?php } ?>
			<?php if($btnhcolor !=''){ echo $btnid ?>:hover{color:<?php echo esc_attr($btnhcolor) ?>!important;}<?php } ?>
			<?php if($btnhborder!=''){ echo $btnid ?>:hover{border-color:<?php echo esc_attr($btnhborder) ?>!important;}<?php } ?>
			</style>

			<?php
			$link = vc_build_link( $link );
			$out .= '<p class="'.$btn_pos.'"><a id="'.esc_attr($btnuniqid).'" class="custom-btn '.$btn_size.' '.$btn_style.'" href="' . esc_attr( $link['url'] ) . '"' . ( $link['target'] ? ' target="' . esc_attr( $link['target'] ) . '"' : '' ) . ( $link['rel'] ? ' rel="' . esc_attr( $link['rel'] ) . '"' : '' ) . ( $link['title'] ? ' title="' . esc_attr( $link['title'] ) . '"' : '' ) . ''.$style.'>' . esc_attr( $link['title'] ) . '</a></p>';
		}

	return $out;
}
add_shortcode('nt_agricom_section_custombtn', 'theme_nt_agricom_section_custombtn');

/*-----------------------------------------------------------------------------------*/
/*	COUNTER agricom
/*-----------------------------------------------------------------------------------*/
function theme_nt_agricom_section_counteritem( $atts, $content = null ) {
    extract( shortcode_atts(array(
	//counter loop
	"style"		=> '',
	"icontype"	=> '',
	"icon"		=> '',
	"fonticon"	=> '',
	"iconimg"	=> '',
	"imgwidth"	=> '85',
	"imgheight"	=> '100',
	"title"		=> '',
	"number"	=> '',
	"nafter"	=> '',
	//custom style
	"tlineh"	=> '',
	"tsize"		=> '',
	"tcolor"	=> '',
	"nlineh"	=> '',
	"nsize"		=> '',
	"ncolor"	=> '',
	"isize"		=> '',
	"icolor"	=> '',

	), $atts) );

	$out = '';

	$counterstyle = ( $style != '' ) ? $style : 2;

	$out .= '<div class="counters counters--style-'.$counterstyle.'">';
		$out .= '<div class="counters__inner">';
			$out .= '<div class="counter__item">';

		$icon_type = ( $icontype != '' ) ? $icontype : 'iconfont';
		if ( $icon_type == 'imgicon' ){

			if ( $iconimg !='' ){ $out .= ''.nt_agricom_img( $imgsrc=$iconimg, $imgclass='counter__item__ico img-responsive', $imgwidth=$imgwidth, $imgheight=$imgheight ).''; }

		}else{

			if ( $fonticon !='' ){$out .= ''.nt_agricom_icon( $iconclass='font-icon '.$fonticon, $iconsize=$isize, $iconcolor=$icolor ).''; }
		}


					if ( $nsize !='' || $ncolor !='' || $nlineh !='' ){
						if ( $nsize !=''){ $n_size  = ' font-size:'.$nsize.'px;'; }else{$n_size = '';}
						if ( $ncolor !=''){ $n_color  = ' color:'.$ncolor.';'; }else{$n_color = '';}
						if ( $nlineh !=''){ $n_lineh  = ' line-height:'.$nlineh.'px;'; }else{$n_lineh = '';}
						$numberstyle = ' style="'.$n_size.$n_color.$n_lineh.'"';
					}else{
						$numberstyle = '';
					}
				if ( $number !='' ){ $out .= '<p class="counter__item__count  js-count" data-from="0" data-to="'.$number.'" data-after="'.$nafter.'"'.$numberstyle.'>'.$number.'</p>'; }

				if ( $title !='' ){ $out .= ''.nt_agricom_element( $heading=$title, $tag='p', $class='counter__item__title', $tlineh='', $tsize, $tcolor ).''; }
			$out .= '</div>';
		$out .= '</div>';
	$out .= '</div>';

	return $out;
}
add_shortcode('nt_agricom_section_counteritem', 'theme_nt_agricom_section_counteritem');

/*-----------------------------------------------------------------------------------*/
/*	SKILLS CIRCLE agricom
/*-----------------------------------------------------------------------------------*/
function theme_nt_agricom_section_circleskills( $atts, $content = null ) {
    extract( shortcode_atts(array(
	//counter loop
	"title"		=> '',
	"number"	=> '',
	"nafter"	=> '',
	"barc"		=> '',
	//custom style
	"tlineh"	=> '',
	"tsize"		=> '',
	"tcolor"	=> '',
	"nlineh"	=> '',
	"nsize"		=> '',
	"ncolor"	=> '',

	), $atts) );

	$out = '';

		$n_size  	= ( $nsize !=''	 ) ? ' font-size:'.$nsize.'px;' 	: '';
		$n_color  	= ( $ncolor !='' ) ? ' color:'.$ncolor.';' 			: '';
		$n_lineh  	= ( $nlineh !='' ) ? ' line-height:'.$nlineh.'px;' 	: '';
		$numberstyle = ( $n_size != '' || $n_color != '' || $n_lineh != '' ) ? ' style="'.$n_size.$n_color.$n_lineh.'"' : '';

		if ( $number != '' ){
			$after_number = ( $nafter != '' ) ? $nafter : '%';
			$databarc = ( $barc != '' ) ? $barc : '#f1cf69';
			$out .= '<div class="skill__item">';
				$out .= '<div class="skill__chart js-chart" data-percent="'.$number.'" data-bar-color="'.$databarc.'">';
					$out .= '<span class="skill__percent percent" data-after="'.esc_html($after_number).'"'.$numberstyle.'>'.$number.'</span>';
				$out .= '</div>';

				if ( $title !='' ){ $out .= ''.nt_agricom_element( $heading=$title, $tag='p', $class='', $tlineh='', $tsize, $tcolor ).''; }
			$out .= '</div>';
		}

	return $out;
}
add_shortcode('nt_agricom_section_circleskills', 'theme_nt_agricom_section_circleskills');

/*-----------------------------------------------------------------------------------*/
/*	CONTACT agricom
/*-----------------------------------------------------------------------------------*/
function theme_nt_agricom_section_contact( $atts, $content = null ) {
    extract( shortcode_atts(array(
	"title"		=> '',
	"desc"		=> '',
	//custom style
	"tlineh"	=> '',
	"tsize"		=> '',
	"tcolor"	=> '',
	"dlineh"	=> '',
	"dsize"		=> '',
	"dcolor"	=> '',

	), $atts) );

	$out = '';

		$out .= '<div class="col-xs-12 col-md-6 bg-2">';
			$out .= '<div class="item">';
			if ( $title !='' || $desc !='' ){
				$out .= '<header class="item__header">';
					if ( $title !='' ){ $out .= ''.nt_agricom_element( $heading=$title, $tag='h2', $class='item__title', $tlineh='', $tsize, $tcolor ).''; }
					if ( $desc !='' ){ $out .= ''.nt_agricom_element( $heading=$desc, $tag='p', $class='item__subtitle', $dlineh='', $dsize, $dcolor ).''; }
				$out .= '</header>';
			}
				$out .= ''.do_shortcode( $content ).'';


			$out .= '</div>';
		$out .= '</div>';

	return $out;
}
add_shortcode('nt_agricom_section_contact', 'theme_nt_agricom_section_contact');


/*-----------------------------------------------------------------------------------*/
/*	GALLERY ITEM agricom
/*-----------------------------------------------------------------------------------*/
function theme_nt_agricom_section_galleryitem( $atts, $content = null ) {
    extract( shortcode_atts(array(
	"bgimg"		=> '',
	"bgcolor"	=> '',
	"title"		=> '',
	//custom style
	"tsize"		=> '',
	"tlineh"	=> '',
	"tcolor"	=> '',

	), $atts) );

	$out = '';
	$out .= '<div class="page-landing">';
		$out .= '<div class="section-gallery">';
		if ( $bgimg !='' ){
			$itembgimg = wp_get_attachment_url( $bgimg,'full' );

			$out .= '<div class="item" style="background-image: url('.esc_url($itembgimg).');">';
		}else{
			$itembgcolor = ( $bgcolor != '' ) ? $bgcolor : '#37343b';
			$out .= '<div class="item" style="background-color: '.esc_attr($itembgcolor).';">';
		}
				$out .= '<div class="container">';
					$out .= '<div class="row">';
						$out .= '<div class="col-xs-12">';
							if ( $title !='' ){ $out .= ''.nt_agricom_element( $heading=$title, $tag='h2', $class='item__title', $tlineh, $tsize, $tcolor ).''; }
						$out .= '</div>';
					$out .= '</div>';
				$out .= '</div>';
			$out .= '</div>';
		$out .= '</div>';
	$out .= '</div>';

	return $out;
}
add_shortcode('nt_agricom_section_galleryitem', 'theme_nt_agricom_section_galleryitem');

/*-----------------------------------------------------------------------------------*/
/*	MAP agricom
/*-----------------------------------------------------------------------------------*/
function theme_nt_agricom_section_map( $atts, $content = null ) {
	extract( shortcode_atts(array(
		"apikey"	=> '',
		"longitude"	=> '',
		"latitude"	=> '',
		"markerimg"	=> '',
		"minheight"	=> '',
	), $atts) );

	$out = '';


		wp_enqueue_script('nt-agricom-map');
		wp_localize_script('nt-agricom-map', 'prefix',
		array(
			'apikey' => $apikey,
		));

		$longitude = ( $longitude != '' ) ? esc_html( $longitude ) : 44.958309;
		$latitude  = ( $latitude != ''  ) ? esc_html( $latitude )  : 34.109925;
		$minheight = ( $minheight != '' ) ? ' style="min-height:'.esc_html( $minheight ).'px;"'  : '';

		$out .= '<div class="item map-container"'.$minheight.'>';
			if ( $markerimg !='' ){
				$markerimg = wp_get_attachment_url( $markerimg,'full' );
			}else{
				$markerimg = get_template_directory_uri().'/images/marker.png';
			}
			$out .= '<div class="g_map" data-longitude="'.$longitude.'" data-latitude="'.$latitude.'" data-marker="'.esc_url( $markerimg ).'"'.$minheight.'></div>';
		$out .= '</div>';

	return $out;
}
add_shortcode('nt_agricom_section_map', 'theme_nt_agricom_section_map');


/*-----------------------------------------------------------------------------------*/
/*	TIMELINE ITEM agricom
/*-----------------------------------------------------------------------------------*/
function theme_nt_agricom_section_timelineitem( $atts, $content = null ) {
    extract( shortcode_atts(array(
	"bgimg"		=> '',
	"bgcolor"	=> '',
	"time"		=> '',
	"title"		=> '',
	"desc"		=> '',
	//custom style
	"dtsize"	=> '',
	"dtlineh"	=> '',
	"dtcolor"	=> '',
	"tsize"		=> '',
	"tlineh"	=> '',
	"tcolor"	=> '',
	"dsize"		=> '',
	"dlineh"	=> '',
	"dcolor"	=> '',
	"bgcss"		=> '',

	), $atts) );

	$bg_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $bgcss, ' ' ),  $atts );

	$out = '';

		$out .= '<div class="timeline'.esc_attr( $bg_css ).'">';
			$out .= '<div class="timeline__inner">';

				$out .= '<div class="timeline__item">';

					if ( $time !='' ){ $out .= ''.nt_agricom_element( $heading=$time, $tag='p', $class='timeline__year', $dtlineh, $dtsize, $dtcolor ).''; }

					if ( $title !='' ){ $out .= ''.nt_agricom_element( $heading=$title, $tag='h4', $class='timeline__title', $tlineh, $tsize, $tcolor ).''; }

					if ( $desc !='' ){ $out .= ''.nt_agricom_element( $heading=$desc, $tag='p', $class='', $dlineh, $dsize, $dcolor ).''; }

				$out .= '</div>';

			$out .= '</div>';
		$out .= '</div>';

	return $out;
}
add_shortcode('nt_agricom_section_timelineitem', 'theme_nt_agricom_section_timelineitem');


/*******************************/
/* special_offer
/******************************/
if (!function_exists('nt_agricom_vc_special_offer')) {
    function nt_agricom_vc_special_offer($atts, $content = null)
    {
        $atts = shortcode_atts(array(
        // data
        'usefonts' => '',
        'google_fonts' => '',
        'htag' => '',
        'tsize' => '',
        'lheight' => '',
        'title' => '',
        'img' => '',
        'anim' => '',
        'aos' => '',
        'delay' => '',
        'offset' => '',
        // background css
        'css' => '',
        ), $atts, 'nt_agricom_special_offer');

        $bgcss = apply_filters(VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class($atts['css'], ' '), $atts);

        $uniq = 'item_'.uniqid();
        $item_css = array();

        $htag = 'h2';
        if ($atts['usefonts'] == 'yes') {
            $google = new WPBakeryShortCode_Vc_Custom_Google_Fonts();
            $google = $google->content( $atts['google_fonts'] );
            $htag = $atts['htag'] ? $atts['htag'] : 'h2';
            $item_css[] = $google ? '.special-offer.special-offer--style-1.'.$uniq.' .text {'. $google .'}' : '';
        }

        $lheight = preg_match( '/(px|em|\%|pt|cm)$/', strtolower($atts['lheight']) ) ? $atts['lheight'] : $atts['lheight'];
        $tsize = preg_match( '/(px|em|\%|pt|cm)$/', strtolower($atts['tsize']) ) ? $atts['tsize'] : $atts['tsize'].'px';
        $item_css[] = $atts['lheight'] ? '.special-offer.special-offer--style-1.'.$uniq.' .text {line-height:'. $lheight .';}' : '';
        $item_css[] = $atts['tsize'] ? '.special-offer.special-offer--style-1.'.$uniq.' .text {font-size:'. $tsize .';}' : '';

        $item_css = ! empty($item_css) ? ' data-res-css="'. implode(' ', $item_css) .'"'  : '';
        $uniq = $item_css ? ' '.$uniq  : '';

        $out = '';
        $animdelay = $atts['delay'] != '' ? ' data-aos-delay="'.$atts['delay'].'"' : '';
        $animoffset = $atts['offset'] != '' ? ' data-aos-offset="'.$atts['offset'].'"' : '';
        $animaos = $atts['anim'] == 'yes' ? ' data-aos="'.$atts['aos'].'"'.$animdelay.$animoffset : '';
        if ($atts['title']) {
            $out .= '<div class="special-offer special-offer--style-1'.$uniq.'" '.$animaos.$item_css.'>';
            $bgimg = wp_get_attachment_url($atts['img'], 'full');
            $out .= '<'.$htag.' class="text text-center" style="background-image:url('.esc_url($bgimg).');">'. esc_html($atts['title']) .'</'.$htag.'>';
            $out .= '</div>';
        }

        return $out;
    }
    add_shortcode('nt_agricom_special_offer', 'nt_agricom_vc_special_offer');
}