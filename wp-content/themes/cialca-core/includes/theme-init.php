<?php
/**
 *
 * @package WordPress
 * @subpackage nt_agricom
 * @since nt_agricom 1.0
 *
**/

/*************************************************
## Google Font
*************************************************/

if ( ! function_exists( 'nt_agricom_fonts_url' ) ) :
function nt_agricom_fonts_url() {
	$fonts_url = '';

	$poppins = _x( 'on', 'Poppins font: on or off', 'nt-agricom' );
	$raleway = _x( 'on', 'Raleway font: on or off', 'nt-agricom' );


	if ( 'off' !== $poppins || 'off' !== $raleway ) {
		$font_families = array();

		if ( 'off' !== $poppins )
			$font_families[] = 'Poppins:300,400,500,600,700';

		if ( 'off' !== $raleway )
			$font_families[] = 'Raleway:400,400i,500,500i,700,700i';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, "//fonts.googleapis.com/css" );
	}

	return $fonts_url;
}
endif;


/*************************************************
## Styles and Scripts
*************************************************/


function nt_agricom_scripts() {

	if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

	// fontawesome icon
	wp_enqueue_style( 'nt-agricom-loader', get_template_directory_uri() . '/css/css-spin-loader.css', 	false, '1.0');
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', 	false, '1.0');
	// fontawesome icon
	wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/fontawesome.min.css', false, '1.0');
	// theme main style
	wp_enqueue_style( 'nt-agricom-slider', get_template_directory_uri() . '/css/vegas-slider.css', false, '1.0');
	wp_enqueue_style( 'nt-agricom-main-style', get_template_directory_uri() . '/css/style.css', false, '1.0');
	wp_enqueue_style( 'aos', get_template_directory_uri() . '/css/aos.css', false, '1.0');

	// visual composer css for homepage
	wp_enqueue_style( 'nt-agricom-vc', get_template_directory_uri() . '/css/framework-visual-composer.css', false, '1.0');
	// flexslider css file for blog post
	wp_enqueue_style( 'nt-agricom-custom-flexslider', get_template_directory_uri() . '/js/flexslider/framework-flexslider.css', false, '1.0');
	// wordpress css file for blog post
	wp_enqueue_style( 'nt-agricom-wordpress', get_template_directory_uri() . '/css/framework-wordpress.css', false, '1.0');
	// update css file
	wp_enqueue_style( 'nt-agricom-extra', get_template_directory_uri() . '/css/framework-extra.css', false, '1.0');
	wp_enqueue_style( 'nt-agricom-update', get_template_directory_uri() . '/css/framework-update.css', false, '1.0');
	// woocommerce
	if ( class_exists( 'woocommerce' ) ) {
	wp_enqueue_style( 'nt-agricom-woocommerce', get_template_directory_uri() . '/css/framework-woocommerce.css', false, '1.0');
	}
	// theme default google webfont loader
	wp_enqueue_style( 'nt-agricom-fonts-load', nt_agricom_fonts_url(), array(), '1.0.0' );

	// custom css
	wp_enqueue_style('nt-agricom-custom-style', get_template_directory_uri() . '/css/framework-custom-style.css', false, '1.0');

	// default
	wp_enqueue_style( 'nt-agricom-style', get_stylesheet_uri() );

	// JS
	// Theme scripts for theme
	wp_enqueue_script('isotope', get_template_directory_uri() . '/js/isotope.pkgd.js', array('jquery'), '1.0', true);
	wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'), '1.0', true);
	wp_enqueue_script('countTo', get_template_directory_uri() . '/js/jquery.countTo.js', array('jquery'), '1.0', true);
	wp_enqueue_script('appear', get_template_directory_uri() . '/js/jquery.appear.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('easypiechart', get_template_directory_uri() . '/js/jquery.easypiechart.js', array('jquery'), '1.0', true);
	wp_enqueue_script('stellar', get_template_directory_uri() .  '/js/jquery.stellar.min.js', array('jquery'), '1.0', true);
	wp_enqueue_script('fs-boxer', get_template_directory_uri() . '/js/jquery.fs.boxer.min.js', array('jquery'), '1.0', true);
	wp_register_script('vegas', get_template_directory_uri() . '/js/vegas-slider.js', array('jquery'), '1.0', true);
	wp_enqueue_script('aos', get_template_directory_uri() . '/js/aos.js', array('jquery'), '1.0', true);

	wp_enqueue_script('nt-agricom-main', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0', true);
	wp_register_script('nt-agricom-map', get_template_directory_uri() . '/js/map-settings.js', array('jquery'), '1.0', true);
	


	// WP default scripts for theme
	wp_enqueue_script('nt-agricom-custom-flexslider', get_template_directory_uri() . '/js/flexslider/framework-flexslider.js', array('jquery'), '1.0', true);
	wp_enqueue_script('agricom-fitvids', get_template_directory_uri() . '/js/framework-fitvids.js', array('jquery'), '1.0', true);
	wp_enqueue_script('nt-agricom-blog-settings', get_template_directory_uri() .  '/js/framework-blog-settings.js', array('jquery'), '1.0', true);

	wp_enqueue_script('device', get_template_directory_uri() . '/js/device.js', array('jquery'), '1.0', false);
}

add_action( 'wp_enqueue_scripts', 'nt_agricom_scripts' );


/*************************************************
## Admin style and scripts
*************************************************/

function nt_agricom_admin_style() {

	// Update CSS within in Admin
	wp_enqueue_style( 'nt-agricom-custom-admin', get_template_directory_uri().'/css/framework-admin.css');
	wp_enqueue_script('nt-agricom-custom-admin', get_template_directory_uri() . '/js/framework-custom.admin.js');

}
add_action('admin_enqueue_scripts', 'nt_agricom_admin_style');


/*************************************************
## Theme option & Metaboxes & shortcodes
*************************************************/

	// theme homepage visual composer shortcodes settings
	if(function_exists('vc_set_as_theme')) {
		require_once get_template_directory() . '/includes/visual-shortcodes.php';
	}

	// Metabox plugin check
	if ( ! function_exists( 'rwmb_meta' ) ) {
		function rwmb_meta( $key, $args = '', $post_id = null ) {
			return false;
		}
	}
	// Theme post and page meta plugin for customization and more features
	require_once get_template_directory() . '/includes/page-metaboxes.php';

	// Theme navigation and pagination options
	require_once get_template_directory() . '/includes/template-tags.php';

	// Theme parts
	require_once get_template_directory() . '/includes/template-parts.php';

	// TGM plugin activation
	require_once get_template_directory() . '/includes/class-tgm-plugin-activation.php';

	// Option tree controllers
	if ( ! class_exists( 'OT_Loader' )){

		function ot_get_option() {
			return false;
		}

	}

	// add filter for  options panel loader
	add_filter( 'ot_show_pages', '__return_false' );
	add_filter( 'ot_show_new_layout', '__return_false' );

	// Theme options admin panel setings file
	include_once get_template_directory() . '/includes/theme-options.php';

	// Theme customize css setting file
	require_once get_template_directory() . '/includes/custom-style.php';



/*************************************************
## Theme Setup
*************************************************/

if ( ! isset( $content_width ) ) $content_width = 960;

function nt_agricom_theme_setup() {

	/*
	* This theme styles the visual editor to resemble the theme style,
	* specifically font, colors, icons, and column width.
	*/
	add_editor_style ( 'custom-editor-style.css' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	* Enable support for Post Thumbnails on posts and pages.
	*
	* See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	*/
	add_theme_support( 'post-thumbnails' );

	// woocommerce
 	if ( class_exists( 'woocommerce' ) ) {
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
 	}

	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'html5', array( 'search-form' ) );

	/*
	* Enable support for Post Formats.
	*
	* See: https://codex.wordpress.org/Post_Formats
	*/
	add_theme_support( 'post-formats', array('gallery', 'quote', 'video', 'audio'));

	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'nt-agricom', get_template_directory() . '/languages' );

	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'nt-agricom' ),
	) );

}
add_action( 'after_setup_theme', 'nt_agricom_theme_setup' );


// remove RSD link for validation
remove_action ('wp_head', 'rsd_link');


/*************************************************
## OPTION TREE WEBFONTS API
*************************************************/

add_filter( 'ot_google_fonts_api_key', 'nt_agricom_change_ot_google_fonts_api_key' );

function nt_agricom_change_ot_google_fonts_api_key( $key ) {
  return "AIzaSyA2rMBHxvoyNhL8gTR2dITpGgXOdAiW6IQ";
}



/*************************************************
## ADMIN NOTICES
*************************************************/


function nt_agricom_theme_activation_notice()
{
    global $current_user;

    $user_id = $current_user->ID;

    if (!get_user_meta($user_id, 'nt_agricom_theme_activation_notice')) {
        ?>

		<div class="updated notice">
	        <p>
			<?php echo sprintf(
                esc_html__('If you need help about demodata installation, please read docs and %s', 'nt-agricom'),
                '<a target="_blank" href="' . esc_url('https://ninetheme.com/contact/') . '">' . esc_html__('Open a ticket', 'nt-agricom') . '</a> ' . esc_html__('or', 'nt-agricom') . ' <a href="?nt-agricom-ignore-notice">' . esc_html__('Dismiss', 'nt-agricom') . '</a>'
); ?>
	        </p>
	    </div>

<?php
    }
}


add_action('admin_notices', 'nt_agricom_theme_activation_notice');

function nt_agricom_theme_activation_notice_ignore()
{
    global $current_user;

    $user_id = $current_user->ID;

    if (isset($_GET['nt-agricom-ignore-notice'])) {
        add_user_meta($user_id, 'nt_agricom_theme_activation_notice', 'true', true);
    }
}
add_action('admin_init', 'nt_agricom_theme_activation_notice_ignore');






/*************************************************
## SANITIZE MODIFIED VC-ELEMENTS OUTPUT
*************************************************/


if (!function_exists('nt_agricom_vc_sanitize_data')) {
    function nt_agricom_vc_sanitize_data($html_data)
    {
        return $html_data;
    }
}

/*************************************************
## HTML5 SEARCH FORM
*************************************************/

function nt_agricom_custom_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . esc_url( home_url( '/' ) ) . '" >
    <div>
		<input type="text" value="' . get_search_query() . '" placeholder="'. esc_attr__( 'Search', 'nt-agricom' ) .'" name="s" id="s" />
		<input type="submit" id="searchsubmit" value="'. esc_attr__( 'Find','nt-agricom' ) .'" />
    </div>
    </form>';

    return $form;
}
add_filter( 'get_search_form', 'nt_agricom_custom_search_form' );

/*************************************************
## Widget columns
*************************************************/

function nt_agricom_widgets_init() {
   $nt_agricom_cs = ( ot_get_option('nt_agricom_widgetize_clmn_style') );
   $nt_agricom_ww = ( ot_get_option('nt_agricom_footer_clmn') );
	 if($nt_agricom_cs =='d' ){
		 $nt_agricom_cst='';
	 }else{
		 $nt_agricom_cst=$nt_agricom_ww;
	 }

	register_sidebar( array(
		'name' => esc_html__( 'Blog Sidebar', 'nt-agricom' ),
		'id' => 'sidebar-1',
		'description'=> esc_html__( 'These are widgets for the Blog page.','nt-agricom' ),
		'before_widget' => '<div class="widget  %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title"><span>',
		'after_title' => '</span></h4>'
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Woo Single Sidebar', 'nt-agricom' ),
		'id' => 'shop-single-page-sidebar',
		'description' => esc_html__( 'These are widgets for the Blog page.','nt-agricom' ),
		'before_widget' => '<div class="widget  %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title"><span>',
		'after_title' => '</span></h4>'
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Woo Shop Page Sidebar', 'nt-agricom' ),
		'id' => 'shop-page-sidebar',
		'description' => esc_html__( 'These are widgets for the Blog page.','nt-agricom' ),
		'before_widget' => '<div class="widget  %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title"><span>',
		'after_title' => '</span></h4>'
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Footer Style 1', 'nt-agricom' ),
		'id' => 'nt_agricom_footer_widgetize',
		'description' => esc_html__( 'Theme footer default area','nt-agricom' ),
		'before_widget' => '<div class="widget %2$s col-md-'.$nt_agricom_cst.' col-lg-'.$nt_agricom_cst.'">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-head">',
		'after_title' => '</h3>'
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Footer Style 2 area', 'nt-agricom' ),
		'id' => 'nt_agricom_footer_widgetize2',
		'description' => esc_html__( 'Theme footer widgetize area','nt-agricom' ),
		'before_widget' => '<div class="widget %2$s col-md-'.$nt_agricom_cst.' col-lg-'.$nt_agricom_cst.'">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-head">',
		'after_title' => '</h3>'
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Footer Style 3 area', 'nt-agricom' ),
		'id' => 'nt_agricom_footer_widgetize3',
		'description' => esc_html__( 'Theme footer widgetize area','nt-agricom' ),
		'before_widget' => '<div class="widget %2$s col-md-'.$nt_agricom_cst.' col-lg-'.$nt_agricom_cst.'">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-head">',
		'after_title' => '</h3>'
	) );
}
add_action( 'widgets_init', 'nt_agricom_widgets_init' );

/*************************************************
## Include the TGM_Plugin_Activation class.
*************************************************/

function nt_agricom_register_required_plugins() {

	$url = 'https://ninetheme.com/documentation';

    $plugins = array(

			array(
				'name' => esc_html__('Breadcrumb NavXT', 'nt-agricom'),
				'slug' => 'breadcrumb-navxt'
			),
			array(
				'name' => esc_html__('Contact Form 7', 'nt-agricom'),
				'slug' => 'contact-form-7'
			),
			array(
				'name' => esc_html__('Meta Box', 'nt-agricom'),
				'slug' => 'meta-box',
				'required' => true
			),
			array(
				'name' => esc_html__('Theme Options Panel', 'nt-agricom'),
				'slug' => 'option-tree',
				'source' => $url . '/plugins/option-tree.zip',
				'required' => true
			),
			array(
				'name' => esc_html__('Metabox Show/Hide', 'nt-agricom'),
				'slug' => 'meta-box-show-hide',
				'source' => $url . '/plugins/meta-box-show-hide.zip',
				'required' => true
			),
			array(
				'name' => esc_html__('Envato Auto Update Theme', 'nt-agricom'),
				'slug' => 'envato-market',
				'source' => $url . '/plugins/envato-market.zip',
				'required' => true
			),
			array(
				'name' => esc_html__('Visual Composer', 'nt-agricom'),
				'slug' => 'visual_composer',
				'source' => $url . '/plugins/visual_composer.zip',
				'required' => true
			),
			array(
				'name' => esc_html__('Revolution Slider', 'nt-agricom'),
				'slug' => 'revolution_slider',
				'source' => $url . '/plugins/revolution_slider.zip',
				'required' => false
			),
			array(
				'name' => esc_html__('NT Agricom Shortcodes', 'nt-agricom'),
				'slug' => 'nt-agricom-shortcodes',
				'source' => get_template_directory() . '/plugins/nt-agricom-shortcodes.zip',
				'required' => true,
				'version' => '1.3.8'
			),
    );

	$config = array(
		'id' => 'tgmpa',
		'default_path' => '',
		'menu' => 'tgmpa-install-plugins',
		'has_notices' => true,
		'dismissable' => true,
		'dismiss_msg' => '',
		'is_automatic' => true,
		'message' => '',
	);

	tgmpa( $plugins, $config );
}

add_action( 'tgmpa_register', 'nt_agricom_register_required_plugins' );


/*************************************************
## Custom body class
*************************************************/
	function nt_agricom_body_classes( $classes ) {

		if( basename( get_page_template() ) === 'one-page-template.php' ){

			$classes[] = ' nt-theme-homepage page page-home';

		}else{

			$classes[] = ' nt-theme-blogpage page page-blog';

		}

		return $classes;

	}
	add_filter( 'body_class', 'nt_agricom_body_classes' );


/*************************************************
## return $post_typess for cpt
*************************************************/
function nt_agricom_get_all_cpts(){

	$args = array(
		'public'   => true,
		'_builtin' => false
	);
	$output = 'names'; // names or objects, note names is the default
	$operator = 'and'; // 'and' or 'or'
	$post_types = get_post_types( $args, $output, $operator );

	foreach ( $post_types  as $post_type ) {
	  $post_typess = $post_type;
	}

	return $post_typess ;
}


/*************************************************
## Allowed tags
*************************************************/
function nt_agricom_sanitize_data( $nt_agricom_data ) {

		$nt_agricom_sanitize_data = wp_kses( $nt_agricom_data, array(
			'a' => array(
				'class' => array(),
				'href'  => array(),
				'rel'   => array(),
				'title' => array(),
				'target' => array('_blank', '_top'),
			),
			'b' => array(),
			'br' => array(),
			'span' => array(
				'class' => array(),
				'title' => array(),
				'style' => array(),
			),
			'del' => array(
				'datetime' => array(),
				'title' => array(),
			),
			'dd' => array(),
			'div' => array(
				'class' => array(),
				'title' => array(),
				'style' => array(),
			),
			'em' => array(),
			'ul' => array(
				'class' => array(),
			),
			'ol' => array(
				'class' => array(),
			),
			'li' => array(
				'class' => array(),
			),
			'dl' => array(),
			'dt' => array(),
			'em' => array(),
			'h1' => array(),
			'h2' => array(),
			'h3' => array(),
			'h4' => array(),
			'h5' => array(),
			'h6' => array(),
			'img' => array(
				'alt'    => array(),
				'class'  => array(),
				'height' => array(),
				'src'    => array(),
				'width'  => array(),
			),
			'input' => array(
				'accept' => array(),
				'class' => array(),
				'id' => array(),
				'align' => array(),
				'alt' => array(),
				'autocomplete' => array(),
				'autofocus' => array(),
				'clicked' => array(),
				'dirname' => array(),
				'disabled' => array(),
				'form' => array(),
				'formenctype' => array(),
				'formmethod' => array(),
				'formnovalidate' => array(),
				'formtarget' => array(),
				'height' => array(),
				'list' => array(),
				'max' => array(),
				'maxlength' => array(),
				'min' => array(),
				'multiple' => array(),
				'name' => array(),
				'pattern' => array(),
				'placeholder' => array(),
				'readonly' => array(),
				'required' => array(),
				'size' => array(),
				'step' => array(),
				'type' => array(),
				'value' => array(),
				'width' => array(),
			),
			'strong' => array(),
			'pre' => array(),
			'code' => array(),
			'blockquote' => array(
				'cite' => true,
			),
			'i' => array(
				'class' => array(),
			),
			'cite' => array(
				'title' => array(),
			),
			'abbr' => array(
				'title' => true,
			),
			'select' => array(
				'id'   => array(),
				'class' => array(),
				'name' => array(),
			),
			'option' => array(
				'value' => array(),
				'selected' => array(),
			),
			'strike' => array(),
		) );

	return $nt_agricom_sanitize_data;
}

add_filter('walker_nav_menu_start_el', 'wpse_226884_replace_hash', 999);
/**
 * Replace # with js
 * @param string $menu_item item HTML
 * @return string item HTML
 */
function wpse_226884_replace_hash($menu_item) {
    if (strpos($menu_item, 'href="#"') !== false) {
        $menu_item = str_replace('href="#"', 'href="javascript:void(0);"', $menu_item);
    }
    return $menu_item;
}

/*************************************************
## Register Menu
*************************************************/

class Nt_Agricom_Wp_Bootstrap_Navwalker extends Walker_Nav_Menu {
	/**
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 */
	public function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat( "\t", $depth );
		$output .= "\n$indent<div class=\"submenu\"><ul>\n";

	}
	public function end_lvl(&$output, $depth=0, $args=array()) {
			$output .= "</ul></div>\n";
		}
	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		/**
		 * Dividers, Headers or Disabled
		 */
		if ( strcasecmp( $item->attr_title, 'divider' ) == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider item-has-children">';
		} else if ( strcasecmp( $item->title, 'divider') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="divider item-has-children">';
		} else if ( strcasecmp( $item->attr_title, 'dropdown-header item-has-children') == 0 && $depth === 1 ) {
			$output .= $indent . '<li role="presentation" class="dropdown-header item-has-children">' . esc_attr( $item->title );
		} else if ( strcasecmp($item->attr_title, 'disabled' ) == 0 ) {
			$output .= $indent . '<li role="presentation" class="disabled"><a href="#">' . esc_attr( $item->title ) . '</a>';
		} else {

			$class_names = $value = '';

			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			$classes[] = 'menu-item-' . $item->ID;

			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );

			if ( in_array( 'current-menu-item', $classes ) )
				$class_names .= ' active';

			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

			$output .= $indent . '<li' . $id . $value . $class_names .'>';

			$atts = array();
			$atts['title']  = ! empty( $item->title )	? $item->title	: '';
			$atts['target'] = ! empty( $item->target )	? $item->target	: '';
			$atts['rel']    = ! empty( $item->xfn )		? $item->xfn	: '';

			// If item has_children add atts to a.
			if ( $args->has_children && $depth === 0 ) {
				$atts['href']   		= '"#"';
			} else {
				$atts['href'] = ! empty( $item->url ) ? $item->url : '';
			}

			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}

			$item_output = $args->before;

			/*
			 * Glyphicons
			 **/
			if ( ! empty( $item->attr_title ) )
				$item_output .= '<a'. $attributes .'><span class=" ' . esc_attr( $item->attr_title ) . '"></span>&nbsp;';
			else
				$item_output .= '<a'. $attributes .'>';

			$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
			$item_output .= ( $args->has_children && 0 === $depth ) ? ' <span class="caret"></span></a>' : '</a>';
			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}
	}

	/**
	 * Traverse elements to create list from elements.
	 **/
	public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
        if ( ! $element )
            return;

        $id_field = $this->db_fields['id'];

        // Display this element.
        if ( is_object( $args[0] ) )
           $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );

        parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
    }

	/**
	 * Menu Fallback
	 **/
	public static function fallback( $args ) {
		if ( current_user_can( 'manage_options' ) ) {

			extract( $args );

			$fb_output = null;

			if ( $container ) {
				$fb_output = '<' . $container;

				if ( $container_id )
					$fb_output .= ' id="' . $container_id . '"';

				if ( $container_class )
					$fb_output .= ' class="' . $container_class . '"';

				$fb_output .= '>';
			}

			$fb_output .= '<ul';

			if ( $menu_id )
				$fb_output .= ' id="' . $menu_id . '"';

			if ( $menu_class )
				$fb_output .= ' class="' . $menu_class . '"';

			$fb_output .= '>';
			$fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">' . esc_html__('Add a menu','nt-agricom') .'</a></li>';
			$fb_output .= '</ul>';

			if ( $container )
				$fb_output .= '</' . $container . '>';

			echo nt_agricom_sanitize_data( $fb_output );
		}
	}
}

/*************************************************
## agricom Comment
*************************************************/

	if ( ! function_exists( 'agricom_comment' ) ) {
    function agricom_comment( $comment, $args, $depth ) {
        $GLOBALS['comment'] = $comment;
        switch ( $comment->comment_type ) :
            case 'pingback' :
            case 'trackback' :
                // Display trackbacks differently than normal comments. ?>
                <li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
                <p><strong><?php esc_html_e( 'Pingback:', 'nt-agricom' ); ?></strong> <?php comment_author_link(); ?></p>
            <?php
            break;
            default :
                // Proceed with normal comments. ?>
                <li id="li-comment-<?php comment_ID(); ?>" class="comments">
                    <div id="comment-<?php comment_ID(); ?>" <?php comment_class( 'clr' ); ?>>
                        <span class="avatar-class">
                            <?php echo get_avatar( $comment, 50 ); ?>
                        </span><!-- .comment-author -->
                        <div class="comment-details clr who-comment">
                            <header class="comment-meta">
                                <cite class="fn name"><?php comment_author_link(); ?></cite>
                                <span class="comment-date">
                                <?php
                                    printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
                                        esc_url( get_comment_link( $comment->comment_ID ) ),
                                        get_comment_time( 'c' ),
                                        sprintf( _x( '%1$s', '1: date', 'nt-agricom' ), get_comment_date() )
                                    ); ?>
                                </span><!-- .comment-date -->
                            </header><!-- .comment-meta -->
                            <?php if ( '0' == $comment->comment_approved ) : ?>
                                <p class="comment-awaiting-moderation">
                                    <?php esc_html_e( 'Your comment is awaiting moderation.', 'nt-agricom' ); ?>
                                </p><!-- .comment-awaiting-moderation -->
                            <?php endif; ?>
                            <div class="comment-content entry clr">
                                <?php comment_text(); ?>
                            </div><!-- .comment-content -->
                            <footer class="comment-footer clr">
                                <?php
                                // Cancel comment link
                                comment_reply_link( array_merge( $args, array(
                                    'reply_text'    => esc_html__( 'Reply', 'nt-agricom' ) . '',
                                    'depth' => $depth,
                                    'max_depth' => $args['max_depth']
                                ) ) ); ?>
                                <?php
                                // Edit comment link
                                edit_comment_link( esc_html__( 'Edit', 'nt-agricom' ), '<div class="edit-comment">', '</div>' ); ?>
                            </footer>
                        </div><!-- .comment-details -->
                    </div><!-- #comment-## -->
            <?php
            break;
        endswitch;
    }
}



/*************************************************
## THEME SETUP WIZARD
    https://github.com/richtabor/MerlinWP
*************************************************/


require_once get_parent_theme_file_path( '/includes/merlin/vendor/autoload.php' );
require_once get_parent_theme_file_path( '/includes/merlin/class-merlin.php' );
require_once get_parent_theme_file_path( '/includes/demo-wizard-config.php' );

function agricom_merlin_local_import_files() {
    return array(
        array(

            'import_file_name'              => 'Demo Import',
            // xml data
            'local_import_file'             => get_parent_theme_file_path( 'includes/merlin/demodata/data.xml' ),
            // widget data
            'local_import_widget_file'      => get_parent_theme_file_path( 'includes/merlin/demodata/widgets.wie' ),
            // option tree -> theme options
            'local_import_option_tree_file' => get_parent_theme_file_path( 'includes/merlin/demodata/optiontree.txt' ),

        )
    );
}
add_filter( 'merlin_import_files', 'agricom_merlin_local_import_files' );


/**
 * Execute custom code after the whole import has finished.
 */
function nt_big_border_merlin_after_import_setup() {

	// Assign menus to their locations.
	$primary = get_term_by( 'name', 'primary', 'nav_menu' );

	set_theme_mod(
		'nav_menu_locations', array(
            'primary' => $primary->term_id,
            'primary-menu-2' => $footer->term_id,
		)
	);

	// Assign front page and posts page (blog page).
	$front_page_id = get_page_by_title( 'Home' );
	$blog_page_id  = get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );

}
add_action( 'merlin_after_all_import', 'nt_big_border_merlin_after_import_setup' );


add_action('init', 'do_output_buffer'); function do_output_buffer() { ob_start(); }
