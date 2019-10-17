<?php

add_filter( 'rwmb_meta_boxes', 'nt_agricom_register_meta_boxes' );
function nt_agricom_register_meta_boxes( $meta_boxes ) {
$prefix = 'nt_agricom_';
$meta_boxes = array();


/* ----------------------------------------------------- */
// FRONTPAGE METABOX MENU SETTINGS
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'title' => esc_html__( 'Metabox menu', 'nt-agricom' ),
	'pages' => array( 'page' ),
	'clone-group' => 'onepage-clone-group',
	'id' => 'page_menu',
	'context' => 'side',
	'priority' => 'low',
	'show' => array(
		'template' => array( 'one-page-template.php' )
	),
	'fields' => array(
		array(
			'name' => esc_html__('Header menu type', 'nt-agricom'),
			'desc' => esc_html__('Select header menu type', 'nt-agricom'),
			'id' => $prefix . 'menutype',
			'type' => 'select',
			'options' => array(
				'm' => esc_html__( 'Metabox menu', 'nt-agricom' ),
				'p' => esc_html__( 'Default Primary menu', 'nt-agricom' ),
			),
			'std' => 'm'
		),
		array(
			'name' => esc_html__( 'Menu item name', 'nt-agricom' ),
			'desc' => esc_html__( 'Format: Any text', 'nt-agricom' ),
			'id' => $prefix . 'section_name',
			'type' => 'text',
			'std' => esc_html__( 'Menu item name', 'nt-agricom' ),
			'class' => 'custom-class',
			'clone' => true,
			'sort_clone' => true,
			'clone-group' => 'onepage-clone-group',
		),
		array(
			'name' => esc_html__( 'Menu item Url', 'nt-agricom' ),
			'desc' => esc_html__( 'Format: #sectionname or http://yoururl.com', 'nt-agricom' ),
			'id' => $prefix . 'section_url',
			'type' => 'text',
			'std' => '#sectionname',
			'class' => 'custom-class',
			'clone' => true,
			'sort_clone' => true,
			'clone-group' => 'onepage-clone-group',
		)
	)
);
/* ----------------------------------------------------- */
// FRONTPAGE METABOX MENU SETTINGS
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'title' => esc_html__( 'Page Header Display', 'nt-agricom' ),
	'pages' => array( 'page' ),
	'clone-group' => 'onepage-clone-group',
	'id' => 'general_page_header',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		// header
		array(
			'name' => esc_html__( 'Disable Page Header', 'nt-agricom' ),
			'desc' => esc_html__( 'This option disables the menu from this page only.', 'nt-agricom' ),
			'id' => $prefix . "page_header_display",
			'type' => 'checkbox',
			'std' => 0,
		),
	)
);
/* ----------------------------------------------------- */
// FRONTPAGE METABOX MENU SETTINGS
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'title' => esc_html__( 'Page Header Options', 'nt-agricom' ),
	'pages' => array( 'page' ),
	'clone-group' => 'onepage-clone-group',
	'id' => 'home_page_header',
	'context' => 'normal',
	'priority' => 'high',
	'show' => array(
		'template' => array( 'one-page-template.php' )
	),
	'fields' => array(

		array(
			'name' => esc_html__( 'Page header style ( for onepage template )', 'nt-agricom' ),
			'id' => $prefix . "homepage_header_style",
			'type' => 'select',
			'options' => array(
				'style-1' => esc_html__( 'Style 1', 'nt-agricom' ),
				'style-2' => esc_html__( 'Style 2', 'nt-agricom' ),
				'style-3' => esc_html__( 'Style 3', 'nt-agricom' ),
			),
			'multiple' => false,
			'std' => 'style1',
			'placeholder' => esc_html__( 'Select an Item', 'nt-agricom' ),
		),
	)
);

/* ----------------------------------------------------- */
// PAGE HEADER OPTIONS
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'title' => esc_html__( 'Page Header Options', 'nt-agricom' ),
	'pages' => array( 'page' ),
	'clone-group' => 'onepage-clone-group',
	'id' => 'custom_page_header',
	'context' => 'normal',
	'priority' => 'high',
	'show' => array(
		'template' => array( 'custom-page.php' )
	),
	'fields' => array(
		array(
			'name' => esc_html__( 'Page header style', 'nt-agricom' ),
			'id' => $prefix . "custompage_header_style",
			'type' => 'select',
			'options' => array(
				'style-1' => esc_html__( 'Style 1', 'nt-agricom' ),
				'style-2' => esc_html__( 'Style 2', 'nt-agricom' ),
				'style-3' => esc_html__( 'Style 3', 'nt-agricom' ),
			),
			'multiple' => false,
			'std' => 'style1',
			'placeholder' => esc_html__( 'Select an Item', 'nt-agricom' ),
		),
	)
);

/* ----------------------------------------------------- */
// PAGE HERO SECTION
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'title' => esc_html__( 'Page Hero Section', 'nt-agricom' ),
	'pages' => array( 'page' ),
	'id' => 'custom_page_hero',
	'context' => 'normal',
	'priority' => 'high',
	'hide' => array(
		'template' => array( 'one-page-template.php' )
	),
	'fields' => array(
		// heading
		array(
			'name' => esc_html__( 'Disable Page Hero Section', 'nt-agricom' ),
			'id' => $prefix . "page_hero_display",
			'type' => 'checkbox',
			'std' => 0,
		),
	)
);

/* ----------------------------------------------------- */
// OTHER PAGE SETTINGS
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'pagetitlesettings',
	'title' => esc_html__( 'Page Hero Title Options', 'nt-agricom' ),
	'pages' => array( 'page' ),
	'context' => 'normal',
	'priority' => 'high',
	'hide' => array(
		'template' => array( 'one-page-template.php' )
	),
	'fields' => array(
		array(
			'name' => esc_html__( 'Disable Page Title', 'nt-agricom' ),
			'id' => $prefix . "disable_title",
			'type' => 'checkbox',
			'std' => 0,
		),
		array(
			'name' => esc_html__( 'Alternate Page Title', 'nt-agricom' ),
			'id' => $prefix . "alt_title",
			'clone' => false,
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => esc_html__( 'Page text color', 'nt-agricom' ),
			'id' => $prefix . "page_text_color",
			'type' => 'color',
		),
		array(
			'name' => esc_html__( 'Page Title font size', 'nt-agricom' ),
			'id' => $prefix . "alt_title_fs",
			'type' => 'number',
			'min' => 0,
			'step' => 1,
		),
	)
);

/* ----------------------------------------------------- */
// PAGE SUBTITLE SETTINGS
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'pagesubtitlesettings',
	'title' => esc_html__( 'Page Hero Subtitle Options', 'nt-agricom' ),
	'pages' => array( 'page' ),
	'context' => 'normal',
	'priority' => 'high',
	'hide' => array(
		'template' => array( 'one-page-template.php' )
	),
	'fields' => array(
		array(
			'name' => esc_html__( 'Disable Page Subtitle', 'nt-agricom' ),
			'id' => $prefix . "disable_subtitle",
			'type' => 'checkbox',
			'std' => 0,
		),
		array(
			'name' => esc_html__( 'Page Subtitle', 'nt-agricom' ),
			'id' => $prefix . "subtitle",
			'clone' => false,
			'type' => 'text',
			'std' => ''
		),
		array(
			'name' => esc_html__( 'Subtitle color', 'nt-agricom' ),
			'id' => $prefix . "page_subtitle_color",
			'type' => 'color',
		),
		array(
			'name' => esc_html__( 'Subtitle font size', 'nt-agricom' ),
			'id' => $prefix . "title_st",
			'type' => 'number',
			'min' => 0,
			'step' => 1,
		),
	)
);

/* ----------------------------------------------------- */
// PAGE HERO BACKGROUND SETTINGS
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'pagebgsettings',
	'title' => esc_html__( 'Page Hero Background Settings', 'nt-agricom' ),
	'pages' => array( 'page' ),
	'context' => 'normal',
	'priority' => 'high',
	'hide' => array(
		'template' => array( 'one-page-template.php' )
	),
	'fields' => array(
		array(
			'name' => esc_html__( 'Hero Minumum Height ( Desktop )', 'nt-agricom' ),
			'id' => $prefix . "page_hero_minh",
			'type' => 'number',
			'min' => 0,
			'max' => 2000,
			'step' => 1,
		),
		array(
			'name' => esc_html__( 'Hero Minumum Height ( Tablet )', 'nt-agricom' ),
			'id' => $prefix . "page_hero_mdminh",
			'type' => 'number',
			'min' => 0,
			'max' => 2000,
			'step' => 1,
		),
		array(
			'name' => esc_html__( 'Hero Minumum Height ( Phone )', 'nt-agricom' ),
			'id' => $prefix . "page_hero_smminh",
			'type' => 'number',
			'min' => 0,
			'max' => 2000,
			'step' => 1,
		),
		array(
			'name' => esc_html__( 'Hero background Image', 'nt-agricom' ),
			'id' => $prefix . "page_bg_image",
			'type' => 'image_advanced',
			'max_file_uploads' => 1,
		),
		// color
		array(
			'name' => esc_html__( 'Hero Background color', 'nt-agricom' ),
			'id' => $prefix . "page_bg_color",
			'type' => 'color',
		),
		array(
			'type' => 'divider',
			'id' => 'fake_divider_id',
		),
		array(
			'name' => esc_html__( 'Hero Mask / Overlay disable', 'nt-agricom' ),
			'id' => $prefix . "disable_page_mask",
			'type' => 'checkbox',
			'std' => 0,
		),
		array(
			'name' => esc_html__( 'Hero Mask / Overlay color', 'nt-agricom' ),
			'id' => $prefix . "page_mask_color",
			'type' => 'color',
		),
		array(
			'name' => esc_html__( 'Hero Mask / Overlay opacity', 'nt-agricom' ),
			'id' => $prefix . "page_mask_opacity",
			'type' => 'number',
			'min' => 0,
			'max' => 1,
			'step' => 0.1,
		),
		array(
			'type' => 'divider',
			'id' => 'fake_divider_id',
		),
		array(
			'name' => esc_html__( 'Hero header padding top', 'nt-agricom' ),
			'id' => $prefix . "header_p_top",
			'type' => 'number',
			'min' => 0,
			'step' => 1,
		),
		array(
			'name' => esc_html__( 'Hero header padding bottom', 'nt-agricom' ),
			'id' => $prefix . "header_p_bottom",
			'type' => 'number',
			'min' => 0,
			'step' => 1,
		),
	)
);

/* ----------------------------------------------------- */
// OTHER PAGE SETTINGS
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'pagesidebarsettings',
	'title' => esc_html__( 'Page Sidebar', 'nt-agricom' ),
	'pages' => array( 'page' ),
	'context' => 'normal',
	'priority' => 'high',
	'hide' => array(
		'template' => array( 'one-page-template.php' )
	),
	'fields' => array(
		array(
			'name' => esc_html__( 'Page sidebar', 'nt-agricom' ),
			'id' => $prefix . "pagelayout",
			'type' => 'select',
			'options' => array(
				'left-sidebar' => esc_html__( 'left', 'nt-agricom' ),
				'right-sidebar' => esc_html__( 'right', 'nt-agricom' ),
				'full-width' => esc_html__( 'full', 'nt-agricom' ),
			),
			'multiple' => false,
			'std' => 'right-sidebar',
			'placeholder' => esc_html__( 'Select an Item', 'nt-agricom' ),
		)
	)
);

/* ----------------------------------------------------- */
// PAGE CONTACT SETTINGS
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'title' => esc_html__( 'Page Contact', 'nt-agricom' ),
	'pages' => array( 'page' ),
	'id' => 'home_page_contact',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name' => esc_html__( 'Page contact section display', 'nt-agricom' ),
			'id' => $prefix . "page_contact_display",
			'type' => 'select',
			'options' => array(
				'show' => esc_html__( 'Show Contact', 'nt-agricom' ),
				'hide' => esc_html__( 'Hide Contact', 'nt-agricom' ),
			),
			'multiple' => false,
			'std' => 'show',
		),
		array(
			'name' => esc_html__( 'Page google map section display', 'nt-agricom' ),
			'id' => $prefix . "page_map_display",
			'type' => 'select',
			'options' => array(
				'show' => esc_html__( 'Show Map', 'nt-agricom' ),
				'hide' => esc_html__( 'Hide Map', 'nt-agricom' ),
			),
			'multiple' => false,
			'std' => 'hide',
		),
	)
);

/* ----------------------------------------------------- */
// PAGE WIDGETIZE FOOTER STYLE
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'title' => esc_html__( 'Page Widgetize Footer Style', 'nt-agricom' ),
	'pages' => array( 'page' ),
	'id' => 'custom_page_footer',
	'context' => 'normal',
	'priority' => 'high',
	'show' => array(
		'template' => array( 'custom-page.php', 'one-page-template.php' )
	),
	'fields' => array(
		array(
			'name' => esc_html__( 'Page Footer Style', 'nt-agricom' ),
			'id' => $prefix . "custompage_footer_style",
			'type' => 'select',
			'options' => array(
				'style1' => esc_html__( 'Style 1', 'nt-agricom' ),
				'style2' => esc_html__( 'Style 2', 'nt-agricom' ),
				'style3' => esc_html__( 'Style 3', 'nt-agricom' ),
			),
			'multiple' => false,
			'std' => 'style1',
			'placeholder' => esc_html__( 'Select an Item', 'nt-agricom' ),
		),
	)
);



$nt_revity_ot_register_cpt2 = ot_get_option( 'nt_agricom_cpt2' );

$nt_revity_cpt_slug2 = ( $nt_revity_ot_register_cpt2 != '' ) ? $nt_revity_ot_register_cpt2 : 'Gallery';


/* ----------------------------------------------------- */
// GALLERY CPT SETTINGS
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'id' => 'gallerysettings',
	'title' => esc_html__( 'DETAILS', 'nt-agricom' ),
	'pages' => array( strtolower( esc_html( $nt_revity_cpt_slug2 ) ) ),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(

		array(
			'name' => esc_html__( 'Post link type', 'nt-agricom' ),
			'id' => $prefix . "gallery_linktype",
			'type' => 'select',
			'multiple' => false,
			'std' => '_blank',
			'options' => array(
				'popup' => esc_html__( 'Popup lightbox', 'nt-agricom' ),
				'single' => esc_html__( 'Single page', 'nt-agricom' ),
			)
		),
		array(
			'name' => esc_html__( 'Popup video url', 'nt-agricom' ),
			'desc' => esc_html__( 'Add your vimeo or youtube popup video url.Format url:http://player.vimeo.com/video/95974049', 'nt-agricom' ),
			'id' => $prefix . "gallery_vidurl",
			'clone' => false,
			'type' => 'text',
		),

	)
);

$nt_revity_ot_register_cpt1 = ot_get_option( 'nt_agricom_cpt1' );

$nt_revity_cpt_slug1 = ( $nt_revity_ot_register_cpt1 != '' ) ? $nt_revity_ot_register_cpt1 : 'Team';

/* ----------------------------------------------------- */
// TEAM CPT SETTINGS
/* ----------------------------------------------------- */
$meta_boxes[] = array(
	'title' => esc_html__( 'DETAILS', 'nt-agricom' ),
	'pages' => array( strtolower( esc_html( $nt_revity_cpt_slug1 ) ) ),
	'id' => 'teamsettings',
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name' => esc_html__($nt_revity_cpt_slug1.' Job', 'nt-agricom'),
			'id' => $prefix . "team_job",
			'clone' => false,
			'type' => 'text',
			'std' => 'Developer'
		),
		array(
			'name' => esc_html__($nt_revity_cpt_slug1.' image width', 'nt-agricom'),
			'desc' => esc_html__( 'Add team image width for auto crop.Use simple number without px or unit', 'nt-agricom' ),
			'id' => $prefix . "team_imgwidth",
			'clone' => false,
			'type' => 'text',
			'std' => '510'
		),
		array(
			'name' => esc_html__($nt_revity_cpt_slug1.' image height', 'nt-agricom'),
			'desc' => esc_html__( 'Add team image height for auto crop.Use simple number without px or unit', 'nt-agricom' ),
			'id' => $prefix . "team_imgheight",
			'clone' => false,
			'type' => 'text',
			'std' => '510'
		),
		// RESPONSIVE
		array(
			'type' => 'divider',
			'id' => 'fake_divider_8', // Not used, but needed
		),
		array(
			'type' => 'heading',
			'id' => 'page_design_section',
			'name' => esc_html__( 'Responsive Options', 'nt-agricom' ),
		),
		array(
			'name' => esc_html__( 'Large Device', 'nt-agricom' ),
			'id' => $prefix . "lg_col",
			'type' => 'select',
			'multiple' => false,
			'std' => 'col-lg-3',
			'options' => array(
				''=> esc_html__( 'Select Custom Column', 'nt-agricom' ),
				'col-lg-1' => esc_html__( 'col-lg-1', 'nt-agricom' ),
				'col-lg-2' => esc_html__( 'col-lg-2', 'nt-agricom' ),
				'col-lg-3' => esc_html__( 'col-lg-3', 'nt-agricom' ),
				'col-lg-4' => esc_html__( 'col-lg-4', 'nt-agricom' ),
				'col-lg-5' => esc_html__( 'col-lg-5', 'nt-agricom' ),
				'col-lg-6' => esc_html__( 'col-lg-6', 'nt-agricom' ),
				'col-lg-7' => esc_html__( 'col-lg-7', 'nt-agricom' ),
				'col-lg-8' => esc_html__( 'col-lg-8', 'nt-agricom' ),
				'col-lg-9' => esc_html__( 'col-lg-9', 'nt-agricom' ),
				'col-lg-10' => esc_html__( 'col-lg-10', 'nt-agricom' ),
				'col-lg-11' => esc_html__( 'col-lg-11', 'nt-agricom' ),
				'col-lg-12' => esc_html__( 'col-lg-12', 'nt-agricom' ),
			)
		),
		array(
			'name' => esc_html__( 'Desktop', 'nt-agricom' ),
			'id' => $prefix . "md_col",
			'type' => 'select',
			'multiple' => false,
			'std' => 'col-md-6',
			'options' => array(
				'' => esc_html__( 'Select Custom Column', 'nt-agricom' ),
				'col-md-1' => esc_html__( 'col-md-1', 'nt-agricom' ),
				'col-md-2' => esc_html__( 'col-md-2', 'nt-agricom' ),
				'col-md-3' => esc_html__( 'col-md-3', 'nt-agricom' ),
				'col-md-4' => esc_html__( 'col-md-4', 'nt-agricom' ),
				'col-md-5' => esc_html__( 'col-md-5', 'nt-agricom' ),
				'col-md-6' => esc_html__( 'col-md-6', 'nt-agricom' ),
				'col-md-7' => esc_html__( 'col-md-7', 'nt-agricom' ),
				'col-md-8' => esc_html__( 'col-md-8', 'nt-agricom' ),
				'col-md-9' => esc_html__( 'col-md-9', 'nt-agricom' ),
				'col-md-10' => esc_html__( 'col-md-10', 'nt-agricom' ),
				'col-md-11' => esc_html__( 'col-md-11', 'nt-agricom' ),
				'col-md-12' => esc_html__( 'col-md-12', 'nt-agricom' ),
			)
		),
		array(
			'name' => esc_html__( 'Tablet', 'nt-agricom' ),
			'id' => $prefix . "sm_col",
			'type' => 'select',
			'multiple' => false,
			'std' => '',
			'options' => array(
				'' => esc_html__( 'Select Custom Column', 'nt-agricom' ),
				'col-sm-1' => esc_html__( 'col-sm-1', 'nt-agricom' ),
				'col-sm-2' => esc_html__( 'col-sm-2', 'nt-agricom' ),
				'col-sm-3' => esc_html__( 'col-sm-3', 'nt-agricom' ),
				'col-sm-4' => esc_html__( 'col-sm-4', 'nt-agricom' ),
				'col-sm-5' => esc_html__( 'col-sm-5', 'nt-agricom' ),
				'col-sm-6' => esc_html__( 'col-sm-6', 'nt-agricom' ),
				'col-sm-7' => esc_html__( 'col-sm-7', 'nt-agricom' ),
				'col-sm-8' => esc_html__( 'col-sm-8', 'nt-agricom' ),
				'col-sm-9' => esc_html__( 'col-sm-9', 'nt-agricom' ),
				'col-sm-10' => esc_html__( 'col-sm-10', 'nt-agricom' ),
				'col-sm-11' => esc_html__( 'col-sm-11', 'nt-agricom' ),
				'col-sm-12' => esc_html__( 'col-sm-12', 'nt-agricom' ),
			)
		),
		array(
			'name' => esc_html__( 'Phone', 'nt-agricom' ),
			'id' => $prefix . "xs_col",
			'type' => 'select',
			'multiple' => false,
			'std' => '',
			'options' => array(
				'' => esc_html__( 'Select Custom Column', 'nt-agricom' ),
				'col-xs-1' => esc_html__( 'col-xs-1', 'nt-agricom' ),
				'col-xs-2' => esc_html__( 'col-xs-2', 'nt-agricom' ),
				'col-xs-3' => esc_html__( 'col-xs-3', 'nt-agricom' ),
				'col-xs-4' => esc_html__( 'col-xs-4', 'nt-agricom' ),
				'col-xs-5' => esc_html__( 'col-xs-5', 'nt-agricom' ),
				'col-xs-6' => esc_html__( 'col-xs-6', 'nt-agricom' ),
				'col-xs-7' => esc_html__( 'col-xs-7', 'nt-agricom' ),
				'col-xs-8' => esc_html__( 'col-xs-8', 'nt-agricom' ),
				'col-xs-9' => esc_html__( 'col-xs-9', 'nt-agricom' ),
				'col-xs-10' => esc_html__( 'col-xs-10', 'nt-agricom' ),
				'col-xs-11' => esc_html__( 'col-xs-11', 'nt-agricom' ),
				'col-xs-12' => esc_html__( 'col-xs-12', 'nt-agricom' ),
			)
		)

	)
);


/*-----------------------------------------------------------------------------------*/
/*  METABOXES FOR BLOG POSTS
/*-----------------------------------------------------------------------------------*/

//	GALLERY POST FORMAT
$meta_boxes[] = array(
	'title' => esc_html__('Gallery Settings', 'nt-agricom'),
	'pages' => array('post'),
	'fields' => array(
		array(
			'name' => esc_html__('Select Images', 'nt-agricom'),
			'desc' => esc_html__('Select the images from the media library or upload your new ones.', 'nt-agricom'),
			'id' => $prefix . 'gallery_image',
			'type' => 'image_advanced',
		)
	)
);

//	QUOTE POST FORMAT
$meta_boxes[] = array(
	'title' => esc_html__('Quote Settings', 'nt-agricom'),
	'pages' => array('post'),
	'fields' => array(
		array(
			'name' => esc_html__('The Quote', 'nt-agricom'),
			'desc' => esc_html__('Write your quote in this field.', 'nt-agricom'),
			'id' => $prefix . 'quote_text',
			'type' => 'textarea',
			'rows' => 5
		),
		array(
			'name' => esc_html__('The Author', 'nt-agricom'),
			'desc' => esc_html__('Enter the name of the author of this quote.', 'nt-agricom'),
			'id' => $prefix . 'quote_author',
			'type' => 'text'
		),
		array(
			'name' => esc_html__('Background Color', 'nt-agricom'),
			'desc' => esc_html__('Choose the background color for this quote.', 'nt-agricom'),
			'id' => $prefix . 'quote_bg',
			'type' => 'color'
		),
		array(
			'name' => esc_html__('Background Opacity', 'nt-agricom'),
			'desc' => esc_html__('Choose the opacity of the background color.', 'nt-agricom'),
			'id' => $prefix . 'quote_bg_opacity',
			'type' => 'text',
			'std' => 80
		)
	)
);

//	AUDIO POST FORMAT
$meta_boxes[] = array(
	'title' => esc_html__('Audio Settings', 'nt-agricom'),
	'pages' => array('post'),
	'fields' => array(
		array(
			'type' => 'heading',
			'name' => esc_html__( 'These settings enable you to embed audio in your posts. Note that for audio, you must supply both MP3 and OGG files to satisfy all browsers. For poster you can select a featured image.', 'nt-agricom' ),
			'id' => 'audio_head'
		),
		array(
			'name' => esc_html__('MP3 File URL', 'nt-agricom'),
			'desc' => esc_html__('The URL to the .mp3 audio file.', 'nt-agricom'),
			'id' => $prefix . 'audio_mp3',
			'type' => 'text',
		),
		array(
			'name' => esc_html__('OGA File URL', 'nt-agricom'),
			'desc' => esc_html__('The URL to the .oga, .ogg audio file.', 'nt-agricom'),
			'id' => $prefix . 'audio_ogg',
			'type' => 'text',
		),
		array(
			'name' => esc_html__('Divider', 'nt-agricom'),
			'desc' => esc_html__('divider.', 'nt-agricom'),
			'id' => $prefix . 'audio_divider',
			'type' => 'divider'
		),
		array(
			'name' => esc_html__('SoundCloud', 'nt-agricom'),
			'desc' => esc_html__('Enter the url of the soundcloud audio.', 'nt-agricom'),
			'id' => $prefix . 'audio_sc',
			'type' => 'text',
		),
		array(
			'name' => esc_html__('Color', 'nt-agricom'),
			'desc' => esc_html__('Choose the color.', 'nt-agricom'),
			'id' => $prefix . 'audio_sc_color',
			'type' => 'color',
			'std' => '#ff7700'
		)
	)
);

//	VIDEO POST FORMAT
$meta_boxes[] = array(
	'title' => esc_html__('Video Settings', 'nt-agricom'),
	'pages' => array('post'),
	'fields' => array(
		array(
			'type' => 'heading',
			'name' => esc_html__( 'These settings enable you to embed videos into your posts. Note that for video, you must supply an M4V file to satisfy both HTML5 and Flash solutions. The optional OGV format is used to increase x-browser support for HTML5 browsers such as Firefox and Opera. For the poster, you can select a featured image.', 'nt-agricom' ),
			'id' => 'video_head'
		),
		array(
			'name' => esc_html__('M4V File URL', 'nt-agricom'),
			'desc' => esc_html__('The URL to the .m4v video file.', 'nt-agricom'),
			'id' => $prefix . 'video_m4v',
			'type' => 'text',
		),
		array(
			'name' => esc_html__('OGV File URL', 'nt-agricom'),
			'desc' => esc_html__('The URL to the .ogv video file.', 'nt-agricom'),
			'id' => $prefix . 'video_ogv',
			'type' => 'text',
		),
		array(
			'name' => esc_html__('WEBM File URL', 'nt-agricom'),
			'desc' => esc_html__('The URL to the .webm video file.', 'nt-agricom'),
			'id' => $prefix . 'video_webm',
			'type' => 'text',
		),
		array(
			'name' => esc_html__('Embeded Code', 'nt-agricom'),
			'desc' => esc_html__('Select the preview image for this video.', 'nt-agricom'),
			'id' => $prefix . 'video_embed',
			'type' => 'textarea',
			'rows' => 8
		)
	)
);

	//end
	return $meta_boxes;
}

?>
