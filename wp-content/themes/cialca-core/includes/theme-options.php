<?php
	add_action( 'init', 'nt_agricom_custom_theme_options' );
	function nt_agricom_custom_theme_options() {
	if ( ! function_exists( 'ot_settings_id' ) || ! is_admin() )
	return false;


	$nt_agricom_saved_settings = get_option( ot_settings_id(), array() );

	$nt_agricom_custom_settings = array(
	'contextual_help' => array(
		'sidebar'       => ''
	),
	'sections'        => array(
		array(
			'id'		=> 'general',
			'title'		=> esc_html__( 'General', 'nt-agricom' ),
		),
		array(
			'id'		=> 'cpt',
			'title'		=> esc_html__( 'CPT', 'nt-agricom' ),
		),
		array(
			'id'		=> 'logo',
			'title'		=> esc_html__( 'Logo', 'nt-agricom' ),
		),
		array(
			'id'		=> 'navigation',
			'title'		=> esc_html__( 'Navigation', 'nt-agricom' ),
		),
		array(
			'id'		=> 'pre',
			'title'		=> esc_html__( 'Preloader', 'nt-agricom' ),
		),
		array(
			'id'		=> 'sidebars',
			'title'		=> esc_html__( 'Sidebars', 'nt-agricom' ),
		),
		array(
			'id'		=> 'header',
			'title'		=> esc_html__( 'Blog Page', 'nt-agricom' ),
		),
		array(
			'id'		=> 'single_header',
			'title'		=> esc_html__( 'Single Page', 'nt-agricom' ),
		),
		array(
			'id'		=> 'archive_page',
			'title'		=> esc_html__( 'Archive Page', 'nt-agricom' ),
		),
		array(
			'id'		=> 'error_page',
			'title'		=> esc_html__( '404 Page', 'nt-agricom' ),
		),
		array(
			'id'		=> 'search_page',
			'title'		=> esc_html__( 'Search Page', 'nt-agricom' ),
		),
		array(
			'id'		=> 'breadcrubms',
			'title'		=> esc_html__( 'Breadcrubms', 'nt-agricom' ),
		),
		array(
			'id'		=> 'footer_general',
			'title'		=> esc_html__( 'Contact and Map', 'nt-agricom' ),
		),
		array(
			'id'		=> 'footer_widgetize',
			'title'		=> esc_html__( 'Widgetize Footer', 'nt-agricom' ),
		),
		array(
			'id'		=> 'copyright',
			'title'		=> esc_html__( 'Footer Copyright', 'nt-agricom' ),
		),
      array(
         'id'  		=> 'google_fonts',
         'title' 	=> esc_html__('Google Fonts', 'nt-agricom' )
      ),
      array(
         'id'  		=> 'typography',
         'title' 	=> esc_html__('Typography', 'nt-agricom' )
      ),
      array(
			'id'		=> 'woo_section',
			'title'		=> esc_html__( 'Woocommerce', 'nt-agricom' ),
		)
	),// sidebar end

	// options start
	'settings'  => array(
		array(
			'id'          => 'general_tabs',
			'label'       => esc_html__( 'General', 'nt-agricom' ),
			'type'        => 'tab',
			'section'     => 'general'
		),
		/** HEADER TYPE **/
		array(
			'id'          => 'nt_agricom_theme_color',
			'label'       => esc_html__( 'Theme general color', 'nt-agricom' ),
			'desc'        => esc_html__( 'Select a color' , 'nt-agricom' ),
			'std'         => '#c1aa81',
			'type'        => 'select',
			'section'     => 'general',
			'operator'    => 'and',
			'choices'     => array(
				array(
					'value'   => '#c1aa81',
					'label'   => esc_html__( 'Tan', 'nt-agricom' )
				),
				array(
					'value'   => '#87a4b2',
					'label'   => esc_html__( 'Gray', 'nt-agricom' )
				),
				array(
					'value'   => '#cf7e7a',
					'label'   => esc_html__( 'Red', 'nt-agricom' )
				),
				array(
					'value'   => '#81a592',
					'label'   => esc_html__( 'Green', 'nt-agricom' )
				),
				array(
					'value'   => 'custom',
					'label'   => esc_html__( 'Custom Color', 'nt-agricom' )
				),
			)
		),
		array(
			'id'          => 'nt_agricom_custom_color',
			'label'       => esc_html__( 'Custom color', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select your custom color ( default green)', 'nt-agricom' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_agricom_theme_color:is(custom)',
			'section'     => 'general'
		),
		array(
			'id'          => 'nt_agricom_custom_color2',
			'label'       => esc_html__( 'Custom color 2', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select your custom color ( default yellow)', 'nt-agricom' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_agricom_theme_color:is(custom)',
			'section'     => 'general'
		),

		// Backtotop
		array(
			'id'          => 'backtotop_tab',
			'label'       => esc_html__( 'Back to top', 'nt-agricom' ),
			'type'        => 'tab',
			'section'     => 'general'
		),
		array(
			'id'        => 'nt_agricom_backtotop',
			'label'     => esc_html( 'Back to top', 'nt-agricom' ),
			'desc'      => sprintf( esc_html( 'Backtotop display %s or %s.', 'nt-agricom' ), '<code>on</code>', '<code>off</code>' ),
			'std'       => 'on',
			'type'      => 'on-off',
			'section'   => 'general',
			'operator'  => 'and'
		),
		array(
			'id'          => 'nt_agricom_backtotop_dimension',
			'label'       => esc_html__( 'Back to top dimension', 'nt-agricom' ),
			'desc'        => esc_html__( 'Back to top dimension', 'nt-agricom' ),
			'type'        => 'dimension',
			'condition'   => 'nt_agricom_backtotop:is(on)',
			'section'     => 'general',
		),
		array(
			'id'          => 'nt_agricom_btbtn_lh',
			'label'       => esc_html__('Back to top button line-height', 'nt-agricom' ),
			'desc'        => esc_html__('You can use this option for backtotop line-height', 'nt-agricom' ),
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,300',
			'std'		  		=> '0',
			'condition'   => 'nt_agricom_backtotop:is(on)',
			'section'     => 'general',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_btbtn_br',
			'label'       => esc_html__('Back to top button border-radius', 'nt-agricom' ),
			'desc'        => esc_html__('You can use this option for backtotop border-radius', 'nt-agricom' ),
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,300',
			'std'		  		=> '0',
			'condition'   => 'nt_agricom_backtotop:is(on)',
			'section'     => 'general',
			'operator'    => 'and'
		),
		array(
			'id'        => 'nt_agricom_btbtn_c',
			'label'     => esc_html( 'Back to top color ', 'nt-agricom' ),
			'desc'      => esc_html( 'Please select color', 'nt-agricom' ),
			'type'      => 'colorpicker',
			'condition' => 'nt_agricom_backtotop:is(on)',
			'section'   => 'general'
		),
		array(
			'id'        => 'nt_agricom_btbtn_bg',
			'label'     => esc_html( 'Back to top bg color ', 'nt-agricom' ),
			'desc'      => esc_html( 'Please select color', 'nt-agricom' ),
			'type'      => 'colorpicker',
			'condition' => 'nt_agricom_backtotop:is(on)',
			'section'   => 'general'
		),
		array(
			'id'        => 'nt_agricom_btbtn_bgh',
			'label'     => esc_html( 'Back to top bg hover color ', 'nt-agricom' ),
			'desc'      => esc_html( 'Please select color', 'nt-agricom' ),
			'type'      => 'colorpicker',
			'condition' => 'nt_agricom_backtotop:is(on)',
			'section'   => 'general'
		),

		//CPT
		array(
			'id'        => 'nt_agricom_cpt1_display',
			'label'     => esc_html( 'CPT Team Display', 'nt-agricom' ),
			'desc'      => sprintf( esc_html( 'Enable or Disable CPT Team with %s or %s.', 'nt-agricom' ), '<code>on</code>', '<code>off</code>' ),
			'std'       => 'on',
			'type'      => 'on-off',
			'section'   => 'cpt',
			'operator'  => 'and'
		),
		array(
			'id'        => 'nt_agricom_cpt1_has_archive',
			'label'     => esc_html( 'CPT Team Has Archive', 'nt-agricom' ),
			'desc'      => esc_html( 'In order to get rid of the archive page conflicts, please disable this option', 'nt-agricom' ),
			'std'       => 'on',
			'type'      => 'on-off',
			'section'   => 'cpt',
			'condition'   => 'nt_agricom_cpt1_display:is(on)',
			'operator'  => 'and'
		),
		array(
			'id'          => 'nt_agricom_cpt1',
			'label'       => esc_html__('CPT Team name', 'nt-agricom' ),
			'desc'        => esc_html__('Add your CPT name.Default name is Team', 'nt-agricom' ),
			'std'         => '',
			'type'        => 'text',
			'condition'   => 'nt_agricom_cpt1_display:is(on)',
			'section'     => 'cpt',

		),
		array(
			'id'        => 'nt_agricom_cpt2_display',
			'label'     => esc_html( 'CPT Gallery Display', 'nt-agricom' ),
			'desc'      => sprintf( esc_html( 'Enable or Disable CPT Gallery with %s or %s.', 'nt-agricom' ), '<code>on</code>', '<code>off</code>' ),
			'std'       => 'on',
			'type'      => 'on-off',
			'section'   => 'cpt',
			'operator'  => 'and'
		),
		array(
			'id'        => 'nt_agricom_cpt2_has_archive',
			'label'     => esc_html( 'CPT Gallery Has Archive', 'nt-agricom' ),
			'desc'      => esc_html( 'In order to get rid of the archive page conflicts, please disable this option', 'nt-agricom' ),
			'std'       => 'on',
			'type'      => 'on-off',
			'section'   => 'cpt',
			'condition'   => 'nt_agricom_cpt2_display:is(on)',
			'operator'  => 'and'
		),
		array(
			'id'          => 'nt_agricom_cpt2',
			'label'       => esc_html__('CPT Gallery name', 'nt-agricom' ),
			'desc'        => esc_html__('Add your CPT name.Default name is Gallery', 'nt-agricom' ),
			'std'         => '',
			'type'        => 'text',
			'condition'   => 'nt_agricom_cpt2_display:is(on)',
			'section'     => 'cpt'
		),
		//PRELOADER  SETTINGS.
		array(
			'id'        => 'nt_agricom_pre',
			'label'     => esc_html( 'Preloader', 'nt-agricom' ),
			'desc'      => sprintf( esc_html( 'Preloader display %s or %s.', 'nt-agricom' ), '<code>on</code>', '<code>off</code>' ),
			'std'       => 'on',
			'type'      => 'on-off',
			'section'   => 'pre',
			'operator'  => 'and'
		),
		 array(
			'id'        => 'nt_agricom_pre_type',
			'label'     => esc_html('Preloader types', 'nt-agricom' ),
			'desc'      => esc_html('Please choose a preloader type', 'nt-agricom' ),
			'std'       => '01',
			'type'      => 'select',
			'section'   => 'pre',
			'operator'  => 'and',
			'choices'   => array(
			array(
				'value' => '01',
				'label' => esc_html('Type 1', 'nt-agricom' ),
			),
			array(
				'value' => '02',
				'label' => esc_html('Type 2', 'nt-agricom' ),
			),
			array(
				'value' => '03',
				'label' => esc_html('Type 3', 'nt-agricom' ),
			),
			array(
				'value' => '04',
				'label' => esc_html('Type 4', 'nt-agricom' ),
			),
			array(
				'value' => '05',
				'label' => esc_html('Type 5', 'nt-agricom' ),
			),
			array(
				'value' => '06',
				'label' => esc_html('Type 6', 'nt-agricom' ),
			),
			array(
				'value' => '07',
				'label' => esc_html('Type 7', 'nt-agricom' ),
			),
			array(
				'value' => '08',
				'label' => esc_html('Type 8', 'nt-agricom' ),
			),
			array(
				'value' => '09',
				'label' => esc_html('Type 9', 'nt-agricom' ),
			),
			array(
				'value' => '10',
				'label' => esc_html('Type 10', 'nt-agricom' ),
			),
			array(
				'value' => '11',
				'label' => esc_html('Type 11', 'nt-agricom' ),
			),
			array(
				'value' => '12',
				'label' => esc_html('Type 12', 'nt-agricom' ),
			),
		  )
		),
		array(
			'id'        => 'nt_agricom_prebgcolor',
			'label'     => esc_html( 'Preloader BG color ', 'nt-agricom' ),
			'desc'      => esc_html( 'Please select color', 'nt-agricom' ),
			'type'      => 'colorpicker',
			'condition' => 'nt_agricom_pre:is(on)',
			'section'   => 'pre'
		),
		array(
			'id'        => 'nt_agricom_prespincolor',
			'label'     => esc_html( 'Preloader spin color ', 'nt-agricom' ),
			'desc'      => esc_html( 'Please select color', 'nt-agricom' ),
			'type'      => 'colorpicker',
			'condition' => 'nt_agricom_pre:is(on)',
			'section'   => 'pre'
		),

		// LOGO OPTIONS
		array(
			'id'          => 'nt_agricom_logo_type',
			'label'       => esc_html__('Logo Type', 'nt-agricom' ),
			'desc'        => esc_html__('Choose logo type', 'nt-agricom' ),
			'std'         => 'text',
			'type'        => 'select',
			'section'     => 'logo',
			'operator'    => 'and',
			'choices'     => array(
				array(
					'value'	=> 'img',
					'label'	=> esc_html__('Image Logo', 'nt-agricom' ),
					'src'	=> ''
				),
				array(
					'value'	=> 'text',
					'label'	=> esc_html__('Text Logo', 'nt-agricom' ),
					'src'	=> ''
				)
			)
		),
		array(
			'id'          => 'nt_agricom_textlogo',
			'label'       => esc_html__('Text logo', 'nt-agricom' ),
			'desc'        => esc_html__('Text logo', 'nt-agricom' ),
			'std'         => 'AGRICOM',
			'type'        => 'text',
			'condition'   => 'nt_agricom_logo_type:is(text)',
			'section'     => 'logo'
		),
		array(
			'id'          => 'nt_agricom_logoimg',
			'label'       => esc_html__( 'Upload logo image', 'nt-agricom' ),
			'desc'        => esc_html__( 'Upload logo image', 'nt-agricom' ),
			'type'        => 'upload',
			'condition'   => 'nt_agricom_logo_type:is(img)',
			'section'     => 'logo'
		),
		array(
			'id'          => 'nt_agricom_mobilelogoimg',
			'label'       => esc_html__( 'Upload sticky logo image', 'nt-agricom' ),
			'desc'        => esc_html__( 'Upload logo image', 'nt-agricom' ),
			'type'        => 'upload',
			'condition'   => 'nt_agricom_logo_type:is(img)',
			'section'     => 'logo'
		),
		array(
			'id'          => 'nt_agricom_logo_dimension',
			'label'       => esc_html__( 'Logo dimension', 'nt-agricom' ),
			'desc'        => esc_html__( 'Logo dimension', 'nt-agricom' ),
			'type'        => 'dimension',
			'condition'   => 'nt_agricom_logo_type:is(img)',
			'section'     => 'logo',
		),
		array(
			'id'          => 'nt_agricom_staticlogo_color',
			'label'       => esc_html__( 'Static text logo color', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color for static menu text logo', 'nt-agricom' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_agricom_logo_type:is(text)',
			'section'     => 'logo'
		),
		array(
			'id'          => 'nt_agricom_stickylogo_color',
			'label'       => esc_html__( 'Sticky text logo color', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color for sticky menu text logo', 'nt-agricom' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_agricom_logo_type:is(text)',
			'section'     => 'logo'
		),
		array(
			'id'          => 'nt_agricom_textlogo_fs',
			'label'       => esc_html__('Font size', 'nt-agricom' ),
			'desc'        => esc_html__('Font size for text logo', 'nt-agricom' ),
			'std'         => '36',
			'type'        => 'numeric-slider',
			'condition'   => 'nt_agricom_logo_type:is(text)',
			'min_max_step'=> '0,100',
			'section'     => 'logo',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_textlogo_fw',
			'label'       => esc_html__('Font weight', 'nt-agricom' ),
			'desc'        => esc_html__('Font weight for text logo', 'nt-agricom' ),
			'std'         => '700',
			'type'        => 'numeric-slider',
			'condition'   => 'nt_agricom_logo_type:is(text)',
			'min_max_step'=> '100,900,100',
			'section'     => 'logo',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_textlogo_lettersp',
			'label'       => esc_html__('Letter spacing', 'nt-agricom' ),
			'desc'        => esc_html__('Letter spacing for text logo', 'nt-agricom' ),
			'std'         => '0',
			'type'        => 'numeric-slider',
			'condition'   => 'nt_agricom_logo_type:is(text)',
			'min_max_step'=> '0,10',
			'section'     => 'logo',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_textlogo_fstyle',
			'label'       => esc_html__('Font style', 'nt-agricom' ),
			'desc'        => esc_html__('Choose font style for text logo', 'nt-agricom' ),
			'std'         => 'normal',
			'type'        => 'select',
			'section'     => 'logo',
			'condition'   => 'nt_agricom_logo_type:is(text)',
			'operator'    => 'and',
			'choices'     => array(
				array(
					'value'	=> 'normal',
					'label'	=> esc_html__('Normal', 'nt-agricom' ),
					'src'	=> ''
				),
				array(
					'value'	=> 'italic',
					'label'	=> esc_html__('Italic', 'nt-agricom' ),
					'src'	=> ''
				)
			)
		),
		array(
			'id'          => 'nt_agricom_padding_logo',
			'label'       => esc_html__( 'Logo padding', 'nt-agricom' ),
			'desc'        => esc_html__( 'Logo padding', 'nt-agricom' ),
			'type'        => 'spacing',
			'section'     => 'logo',
		),
		array(
			'id'          => 'nt_agricom_margin_logo',
			'label'       => esc_html__( 'Logo margin', 'nt-agricom' ),
			'desc'        => esc_html__( 'Logo margin', 'nt-agricom' ),
			'type'        => 'spacing',
			'section'     => 'logo',
		),

		// NAVIGATION SETTINGS
		// static menu
		array(
			'id'          => 'menu_g_tab',
			'label'       => esc_html__( 'General', 'nt-agricom' ),
			'type'        => 'tab',
			'section'     => 'navigation'
		),

		array(
			'id'          => 'nt_agricom_header_type',
			'label'       => esc_html__( 'Theme header type', 'nt-agricom' ),
			'desc'        => esc_html__( 'Select header type.' , 'nt-agricom' ),
			'std'         => 'style-1',
			'type'        => 'select',
			'section'     => 'navigation',
			'operator'    => 'and',
			'choices'     => array(
				array(
					'value'   => 'style-1',
					'label'   => esc_html__( 'Style 1', 'nt-agricom' )
				),
				array(
					'value'   => 'style-2',
					'label'   => esc_html__( 'Style 2', 'nt-agricom' )
				),
				array(
					'value'   => 'style-3',
					'label'   => esc_html__( 'Style 3', 'nt-agricom' )
				),
			)
		),
		array(
			'id'          => 'nt_agricom_nav_item_fs',
			'label'       => esc_html__('Navigation menu item font-size', 'nt-agricom' ),
			'desc'        => esc_html__('You can use this option for menu item font-size', 'nt-agricom' ),
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,100',
			'std'		  		=> '0',
			'section'     => 'navigation',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_sticky_header_display',
			'label'       => esc_html__( 'Sticky Header display', 'nt-agricom' ),
			'desc'        => sprintf( esc_html__( 'Sticky header display %s or %s.', 'nt-agricom' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'navigation',
			'operator'    => 'and'
		),
		// menu button
		array(
			'id'          => 'menu_btn_tab',
			'label'       => esc_html__( 'Menu Button', 'nt-agricom' ),
			'type'        => 'tab',
			'section'     => 'navigation'
		),
		array(
			'id'          => 'nt_agricom_header_top_btn_display',
			'label'       => esc_html__( 'Header top button display', 'nt-agricom' ),
			'desc'        => sprintf( esc_html__( 'header top button display %s or %s.', 'nt-agricom' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'navigation',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_header_btn',
			'label'       => esc_html__('Button title', 'nt-agricom' ),
			'desc'        => esc_html__('Add button title', 'nt-agricom' ),
			'std'         => 'Get a quote',
			'condition'   => 'nt_agricom_header_top_btn_display:is(on)',
			'type'        => 'text',
			'section'     => 'navigation'
		),
		array(
			'id'          => 'nt_agricom_header_btn_link',
			'label'       => esc_html__('Button custom link', 'nt-agricom' ),
			'desc'        => esc_html__('Add your custom link', 'nt-agricom' ),
			'std'         => '#0',
			'type'        => 'text',
			'condition'   => 'nt_agricom_header_top_btn_display:is(on)',
			'section'     => 'navigation'
		),
		array(
			'id'          => 'nt_agricom_header_btn_target',
			'label'       => esc_html__( 'Button target', 'nt-agricom' ),
			'desc'        => esc_html__( 'Select button target type. Default : _blank' , 'nt-agricom' ),
			'std'         => '_blank',
			'type'        => 'select',
			'condition'   => 'nt_agricom_header_top_btn_display:is(on)',
			'section'     => 'navigation',
			'operator'    => 'and',
			'choices'     => array(
				array(
					'value'       => '_blank',
					'label'       => esc_html__( '_blank', 'nt-agricom' )
				),
				array(
					'value'       => '_self',
					'label'       => esc_html__( '_self', 'nt-agricom' )
				),
				array(
					'value'       => '_parent',
					'label'       => esc_html__( '_parent', 'nt-agricom' )
				),
				array(
					'value'       => '_top',
					'label'       => esc_html__( '_top', 'nt-agricom' )
				),
			)
		),
		array(
			'id'          => 'nt_agricom_btn_radius',
			'label'       => esc_html__('Header button border radius', 'nt-agricom' ),
			'desc'        => esc_html__('You can use this option for header button border radius', 'nt-agricom' ),
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,500',
			'std'		  		=> '0',
			'section'     => 'navigation',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_header_btn_title_color',
			'label'       => esc_html__( 'Header button title color', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select your custom color', 'nt-agricom' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_agricom_header_top_btn_display:is(on)',
			'section'     => 'navigation'
		),
		array(
			'id'          => 'nt_agricom_header_btn_brd_color',
			'label'       => esc_html__( 'Header button border color', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select your custom color', 'nt-agricom' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_agricom_header_top_btn_display:is(on)',
			'section'     => 'navigation'
		),
		array(
			'id'          => 'nt_agricom_header_btn_hover_color',
			'label'       => esc_html__( 'Header button hover background color', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select your custom color', 'nt-agricom' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_agricom_header_top_btn_display:is(on)',
			'section'     => 'navigation'
		),
		array(
			'id'          => 'nt_agricom_header_btn_hover_title_color',
			'label'       => esc_html__( 'Header button hover title color', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select your custom color', 'nt-agricom' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_agricom_header_top_btn_display:is(on)',
			'section'     => 'navigation'
		),
		array(
			'id'          => 'menu_static_tab',
			'label'       => esc_html__( 'Static menu', 'nt-agricom' ),
			'type'        => 'tab',
			'section'     => 'navigation'
		),
		array(
			'id'          => 'nt_agricom_nav_bg',
			'label'       => esc_html__( 'Static menu background color', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker',
			'section'     => 'navigation'
		),
		array(
			'id'          => 'nt_agricom_nav_item',
			'label'       => esc_html__( 'Static menu item color', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker',
			'section'     => 'navigation'
		),
		array(
			'id'          => 'nt_agricom_nav_itemhover',
			'label'       => esc_html__( 'Static menu item hover color', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker',
			'section'     => 'navigation'
		),

		// fixed menu
		array(
			'id'          => 'menu_sticky_tab',
			'label'       => esc_html__( 'Sticky menu', 'nt-agricom' ),
			'type'        => 'tab',
			'section'     => 'navigation'
		),
		array(
			'id'          => 'nt_agricom_nav_sticky_bg',
			'label'       => esc_html__( 'Sticky menu background color', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker',
			'section'     => 'navigation'
		),
		array(
			'id'          => 'nt_agricom_nav_sticky_item',
			'label'       => esc_html__( 'Sticky menu item color', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker',
			'section'     => 'navigation'
		),
		array(
			'id'          => 'nt_agricom_nav_sticky_itemhover',
			'label'       => esc_html__( 'Sticky menu item hover color', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker',
			'section'     => 'navigation'
		),

		// dropdown menu
		array(
			'id'          => 'menu_dropdown_tab',
			'label'       => esc_html__( 'Dropdown menu', 'nt-agricom' ),
			'type'        => 'tab',
			'section'     => 'navigation'
		),
		array(
			'id'          => 'nt_agricom_dropdown_bg',
			'label'       => esc_html__( 'Menu dropdown color', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker',
			'section'     => 'navigation'
		),
		array(
			'id'          => 'nt_agricom_dropdown_item',
			'label'       => esc_html__( 'Menu dropdown inner item color', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker',
			'section'     => 'navigation'
		),
		array(
			'id'          => 'nt_agricom_dropdown_itemhover',
			'label'       => esc_html__( 'Menu dropdown inner item hover color', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker',
			'section'     => 'navigation'
		),

		// mobile menu
		array(
			'id'          => 'menu_Mobile_tab',
			'label'       => esc_html__( 'Mobile menu', 'nt-agricom' ),
			'type'        => 'tab',
			'section'     => 'navigation'
		),
		array(
			'id'          => 'nt_agricom_nav_mobile_breakpoint',
			'label'       => esc_html__( 'Mobile menu breakpoint', 'nt-agricom' ),
			'desc'        => esc_html__( 'Set your breakpoint for the mobile menu', 'nt-agricom' ),
			'std'         => '768',
			'type'        => 'numeric-slider',
			'min_max_step'=> '768,1200,1',
			'section'     => 'navigation'
		),
		array(
			'id'          => 'nt_agricom_mobile_bg',
			'label'       => esc_html__( 'Mobile menu background color', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker',
			'section'     => 'navigation'
		),
		array(
			'id'          => 'nt_agricom_mobile_item',
			'label'       => esc_html__( 'Mobile menu item color', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker',
			'section'     => 'navigation'
		),
		array(
			'id'          => 'nt_agricom_mobile_itemhover',
			'label'       => esc_html__( 'Mobile menu item hover color', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker',
			'section'     => 'navigation'
		),

		// toggler btn menu
		array(
			'id'          => 'nt_agricom_mobile_btntoggler',
			'label'       => esc_html__( 'Mobile menu button color', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker',
			'section'     => 'navigation'
		),

		// SIDEBAR TYPE SETTINGS
		array(
			'id'          => 'nt_agricom_blog_layout',
			'label'       => esc_html__( 'Blog layout', 'nt-agricom' ),
			'desc'        => esc_html__( 'Choose blog page layout type', 'nt-agricom' ),
			'std'         => 'right-sidebar',
			'type'        => 'radio-image',
			'section'     => 'sidebars',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_page_layout',
			'label'       => esc_html__( 'Default page Layout', 'nt-agricom' ),
			'desc'        => esc_html__( 'Choose default page layout type', 'nt-agricom' ),
			'std'         => 'right-sidebar',
			'type'        => 'radio-image',
			'section'     => 'sidebars',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_search_layout',
			'label'       => esc_html__( 'Search page Layout', 'nt-agricom' ),
			'desc'        => esc_html__( 'Choose search page layout type', 'nt-agricom' ),
			'std'         => 'right-sidebar',
			'type'        => 'radio-image',
			'section'     => 'sidebars',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_post_layout',
			'label'       => esc_html__( 'Blog single page layout', 'nt-agricom' ),
			'desc'        => esc_html__( 'Choose post page layout type', 'nt-agricom' ),
			'std'         => 'right-sidebar',
			'type'        => 'radio-image',
			'section'     => 'sidebars',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_archive_layout',
			'label'       => esc_html__( 'archive page layout', 'nt-agricom' ),
			'desc'        => esc_html__( 'Choose archive page layout type', 'nt-agricom' ),
			'std'         => 'right-sidebar',
			'type'        => 'radio-image',
			'section'     => 'sidebars',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_404_layout',
			'label'       => esc_html__( '404 page layout', 'nt-agricom' ),
			'desc'        => esc_html__( 'Choose 404 page layout type', 'nt-agricom' ),
			'std'         => 'right-sidebar',
			'type'        => 'radio-image',
			'section'     => 'sidebars',
			'operator'    => 'and'
		),
		array(
			'id'          => 'woosingle_layout',
			'label'       => esc_html__( 'Woocommerce single page layout', 'nt-agricom' ),
			'desc'        => esc_html__( 'Choose Woocommerce single page layout type', 'nt-agricom' ),
			'std'         => 'right-sidebar',
			'type'        => 'radio-image',
			'section'     => 'sidebars',
			'operator'    => 'and'
		),
		   array(
			'id'          => 'woopage_layout',
			'label'       => esc_html__( 'Woocommerce  page layout', 'nt-agricom' ),
			'desc'        => esc_html__( 'Choose 404 page layout type', 'nt-agricom' ),
			'std'         => 'right-sidebar',
			'type'        => 'radio-image',
			'section'     => 'sidebars',
			'operator'    => 'and'
		),

		// BLOG/PAGE HEADER SETTINGS
		array(
			'id'          => 'blog_general_tab',
			'label'       => esc_html__( 'General', 'nt-agricom' ),
			'type'        => 'tab',
			'section'     => 'header'
		),
		array(
			'id'          => 'nt_agricom_blog_content_style',
			'label'       => esc_html__('Blog page content style', 'nt-agricom' ),
			'desc'        => esc_html__('Select blog post page content style', 'nt-agricom' ),
			'std'         => 'style1',
			'type'        => 'select',
			'section'     => 'header',
			'operator'    => 'and',
			'choices'     => array(
				array(
					'value'	=> 'style1',
					'label'	=> esc_html__('List style ( No Sidebar )', 'nt-agricom' ),
					'src'	=> ''
				),
				array(
					'value'	=> 'style2',
					'label'	=> esc_html__('Classic style ( with Sidebar )', 'nt-agricom' ),
					'src'	=> ''
				)
			)
		),
		array(
			'id'          => 'nt_agricom_blog_headerbg',
			'label'       =>  esc_html__( 'Blog pages hero section background image', 'nt-agricom' ),
			'desc'        =>  esc_html__( 'You can upload your image for header', 'nt-agricom' ),
			'type'        => 'upload',
			'section'     => 'header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_blog_mask_v',
			'label'       => esc_html__( 'Blog pages hero section overlay color display', 'nt-agricom' ),
			'desc'        => sprintf( esc_html__( 'Please select hero section overlay color display %s or %s.', 'nt-agricom' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_blog_mask_c',
			'label'       => esc_html__( 'Blog pages hero overlay color ', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_agricom_blog_mask_v:is(on)',
			'section'     => 'header'
		),
		array(
			'id'          => 'nt_agricom_blog_header_bgcolor',
			'label'       => esc_html__( 'Blog page hero section background color ', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker-opacity',
			'section'     => 'header'
		),
		array(
			'id'          => 'nt_agricom_blog_header_bgheight',
			'label'       => esc_html__('Blog pages hero height', 'nt-agricom' ),
			'desc'        => esc_html__('Blog pages hero height', 'nt-agricom' ),
			'std'         => '60',
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,100',
			'section'     => 'header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_blog_header_paddingtop',
			'label'       => esc_html__('Hero padding top', 'nt-agricom' ),
			'desc'        => esc_html__('You can use this option for heading text vertical align', 'nt-agricom' ),
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,500',
			'std'		  => '40',
			'section'     => 'header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_blog_header_paddingbottom',
			'label'       => esc_html__('Hero padding bottom', 'nt-agricom' ),
			'desc'        => esc_html__('You can use this option for heading text vertical align', 'nt-agricom' ),
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,500',
			'std'		  => '0',
			'section'     => 'header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_blog_heading_color',
			'label'       => esc_html__( 'Blog pages hero heading color ', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker',
			'section'     => 'header'
		),
		array(
			'id'          => 'nt_agricom_blog_heading_fontsize',
			'label'       => esc_html__('Blog hero heading font size', 'nt-agricom' ),
			'desc'        => esc_html__('Enter blog heading font size', 'nt-agricom' ),
			'std'         => '70',
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,100',
			'section'     => 'header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_blog_slogan_color',
			'label'       => esc_html__( 'Blog hero subtitle color ', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker',
			'section'     => 'header'
		),
		array(
			'id'          => 'nt_agricom_blog_slogan_fontsize',
			'label'       => esc_html__('Blog hero subtitle font size', 'nt-agricom' ),
			'desc'        => esc_html__('Enter blog subtitle font size', 'nt-agricom' ),
			'std'         => '16',
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,100',
			'section'     => 'header',
			'operator'    => 'and'
		),
		//Blog read button
		array(
			'id'          => 'blog_button_tab',
			'label'       => esc_html__( 'Read More Button', 'nt-agricom' ),
			'type'        => 'tab',
			'section'     => 'header'
		),
		array(
			'id'          => 'nt_agricom_readbutton_display',
			'label'       => esc_html__( 'Blog read more button display', 'nt-agricom' ),
			'desc'        => sprintf( esc_html__( 'Please blog read more button display %s or %s.', 'nt-agricom' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_readbutton',
			'label'       => esc_html__('Blog read more button text', 'nt-agricom' ),
			'desc'        => esc_html__('Blog read more button text', 'nt-agricom' ),
			'std'         => 'Read More',
			'type'        => 'text',
			'condition'   => 'nt_agricom_readbutton_display:is(on)',
			'section'     => 'header'
		),
		array(
			'id'          => 'nt_agricom_read_btn_target',
			'label'       => esc_html__( 'Read more button target', 'nt-agricom' ),
			'desc'        => esc_html__( 'Select button target type. Default : _blank' , 'nt-agricom' ),
			'std'         => '_blank',
			'type'        => 'select',
			'condition'   => 'nt_agricom_readbutton_display:is(on)',
			'section'     => 'header',
			'operator'    => 'and',
			'choices'     => array(
				array(
					'value'       => '_blank',
					'label'       => esc_html__( '_blank', 'nt-agricom' )
				),
				array(
					'value'       => '_self',
					'label'       => esc_html__( '_self', 'nt-agricom' )
				),
				array(
					'value'       => '_parent',
					'label'       => esc_html__( '_parent', 'nt-agricom' )
				),
				array(
					'value'       => '_top',
					'label'       => esc_html__( '_top', 'nt-agricom' )
				),
			)
		),
		array(
			'id'          => 'nt_agricom_r_b_c',
			'label'       => esc_html__( 'Blog read more button color', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_agricom_readbutton_display:is(on)',
			'section'     => 'header'
		),
		array(
			'id'          => 'nt_agricom_r_b_bgc',
			'label'       => esc_html__( 'Blog read more button bg color', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_agricom_readbutton_display:is(on)',
			'section'     => 'header'
		),
		array(
			'id'          => 'nt_agricom_r_b_bc',
			'label'       => esc_html__( 'Blog read more button border color', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_agricom_readbutton_display:is(on)',
			'section'     => 'header'
		),
		array(
			'id'          => 'nt_agricom_r_b_hc',
			'label'       => esc_html__( 'Blog read more button hover color', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_agricom_readbutton_display:is(on)',
			'section'     => 'header'
		),
		array(
			'id'          => 'nt_agricom_r_b_hbgc',
			'label'       => esc_html__( 'Blog read more button bg hover color', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_agricom_readbutton_display:is(on)',
			'section'     => 'header'
		),
		array(
			'id'          => 'nt_agricom_r_b_hbc',
			'label'       => esc_html__( 'Blog read more button border hover color', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_agricom_readbutton_display:is(on)',
			'section'     => 'header'
		),
		//SINGLE HEADER SETTINGS
		//Blog read button
		array(
			'id'          => 'single_button_tab',
			'label'       => esc_html__( 'Hero Section', 'nt-agricom' ),
			'type'        => 'tab',
			'section'     => 'single_header'
		),
		array(
			'id'          => 'nt_agricom_single_headbg',
			'label'       =>  esc_html__( 'Single hero section background image', 'nt-agricom' ),
			'desc'        =>  esc_html__( 'You can upload your image for parallax header', 'nt-agricom' ),
			'type'        => 'upload',
			'section'     => 'single_header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_single_mask_v',
			'label'       => esc_html__( 'Single page hero section overlay color display', 'nt-agricom' ),
			'desc'        => sprintf( esc_html__( 'Please select hero section overlay color  display %s or %s.', 'nt-agricom' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'single_header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_single_mask_c',
			'label'       => esc_html__( 'Single page hero overlay color ', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_agricom_single_mask_v:is(on)',
			'section'     => 'single_header'
		),
		array(
			'id'          => 'nt_agricom_single_header_bgcolor',
			'label'       => esc_html__( 'Single page hero section background color ', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker',
			'section'     => 'single_header'
		),
		array(
			'id'          => 'nt_agricom_single_header_bgheight',
			'label'       => esc_html__('Single page hero height', 'nt-agricom' ),
			'desc'        => esc_html__('Single page hero height', 'nt-agricom' ),
			'std'         => '60',
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,100',
			'section'     => 'single_header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_single_header_paddingtop',
			'label'       => esc_html__('header padding top', 'nt-agricom' ),
			'desc'        => esc_html__('You can use this option for heading text vertical align', 'nt-agricom' ),
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,500',
			'std'		  => '40',
			'section'     => 'single_header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_single_header_paddingbottom',
			'label'       => esc_html__('header padding bottom', 'nt-agricom' ),
			'desc'        => esc_html__('You can use this option for heading text vertical align', 'nt-agricom' ),
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,500',
			'std'		  => '0',
			'section'     => 'single_header',
			'operator'    => 'and'
		),
		//Single heading
		array(
			'id'          => 'nt_agricom_single_disable_heading',
			'label'       => esc_html__( 'Single pages heading post title display', 'nt-agricom' ),
			'desc'        => sprintf( esc_html__( 'Please select single pages heading post title display %s or %s.', 'nt-agricom' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'single_header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_single_headingcolor',
			'label'       => esc_html__( 'Single pages heading color ', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_agricom_single_disable_heading:is(on)',
			'section'     => 'single_header'
		),
		array(
			'id'          => 'nt_agricom_single_heading_fontsize',
			'label'       => esc_html__('Single heading font size', 'nt-agricom' ),
			'desc'        => esc_html__('Enter Single heading font size', 'nt-agricom' ),
			'std'         => '70',
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,100',
			'condition'   => 'nt_agricom_single_disable_heading:is(on)',
			'section'     => 'single_header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_single_date_display',
			'label'       => esc_html__( 'Single page hero post date and comments display', 'nt-agricom' ),
			'desc'        => sprintf( esc_html__( 'Please select single page hero post date and comments display %s or %s.', 'nt-agricom' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'single_header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'single_content_tab',
			'label'       => esc_html__( 'Single Content', 'nt-agricom' ),
			'type'        => 'tab',
			'section'     => 'single_header'
		),
		array(
			'id'          => 'nt_agricom_post_meta_display',
			'label'       => esc_html__( 'Single post all meta display', 'nt-agricom' ),
			'desc'        => esc_html__( 'This is a general option.Disables or enables the post all meta(category,date,author,tags)', 'nt-agricom' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'single_header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_post_date_display',
			'label'       => esc_html__( 'Single page post date display', 'nt-agricom' ),
			'desc'        => esc_html__( 'This is a general option.Disables or enables the simple post date', 'nt-agricom' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'condition'   => 'nt_agricom_post_meta_display:is(on)',
			'section'     => 'single_header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_post_cat_display',
			'label'       => esc_html__( 'Single page post category display', 'nt-agricom' ),
			'desc'        => esc_html__( 'This is a general option.Disables or enables the simple post category', 'nt-agricom' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'condition'   => 'nt_agricom_post_meta_display:is(on)',
			'section'     => 'single_header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_post_author_display',
			'label'       => esc_html__( 'Single page post author display', 'nt-agricom' ),
			'desc'        => esc_html__( 'This is a general option.Disables or enables the simple post author', 'nt-agricom' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'condition'   => 'nt_agricom_post_meta_display:is(on)',
			'section'     => 'single_header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_post_tags_display',
			'label'       => esc_html__( 'Single page post tags display', 'nt-agricom' ),
			'desc'        => esc_html__( 'This is a general option.Disables or enables the simple post tags', 'nt-agricom' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'condition'   => 'nt_agricom_post_meta_display:is(on)',
			'section'     => 'single_header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_post_comment_display',
			'label'       => esc_html__( 'Single page post comment display', 'nt-agricom' ),
			'desc'        => esc_html__( 'This is a general option.Disables comments form from the all posts.', 'nt-agricom' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'single_header',
			'operator'    => 'and'
		),
		// Single share icon
		array(
			'id'          => 'single_share_tab',
			'label'       => esc_html__( 'Post Share Icon', 'nt-agricom' ),
			'type'        => 'tab',
			'section'     => 'single_header'
		),
		array(
			'id'          => 'nt_agricom_post_share_display',
			'label'       => esc_html__( 'Single post all share icon display', 'nt-agricom' ),
			'desc'        => esc_html__( 'This is a general option.Disables or enables the post all share icon.', 'nt-agricom' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'single_header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_post_facebook_display',
			'label'       => esc_html__( 'Facebook display', 'nt-agricom' ),
			'desc'        => esc_html__( 'This is a general option.Disables or enables the simple post facebook share icon', 'nt-agricom' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'condition'   => 'nt_agricom_post_share_display:is(on)',
			'section'     => 'single_header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_post_twitter_display',
			'label'       => esc_html__( 'Twitter display', 'nt-agricom' ),
			'desc'        => esc_html__( 'This is a general option.Disables or enables the simple post twitter share icon', 'nt-agricom' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'condition'   => 'nt_agricom_post_share_display:is(on)',
			'section'     => 'single_header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_post_google_display',
			'label'       => esc_html__( 'Google-plus display', 'nt-agricom' ),
			'desc'        => esc_html__( 'This is a general option.Disables or enables the simple post Google-plus share icon', 'nt-agricom' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'condition'   => 'nt_agricom_post_share_display:is(on)',
			'section'     => 'single_header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_post_digg_display',
			'label'       => esc_html__( 'Digg display', 'nt-agricom' ),
			'desc'        => esc_html__( 'This is a general option.Disables or enables the simple post digg share icon', 'nt-agricom' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'condition'   => 'nt_agricom_post_share_display:is(on)',
			'section'     => 'single_header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_post_reddit_display',
			'label'       => esc_html__( 'Reddit display', 'nt-agricom' ),
			'desc'        => esc_html__( 'This is a general option.Disables or enables the simple post reddit share icon', 'nt-agricom' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'condition'   => 'nt_agricom_post_share_display:is(on)',
			'section'     => 'single_header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_post_linkedin_display',
			'label'       => esc_html__( 'Linkedin display', 'nt-agricom' ),
			'desc'        => esc_html__( 'This is a general option.Disables or enables the simple post linkedin share icon', 'nt-agricom' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'condition'   => 'nt_agricom_post_share_display:is(on)',
			'section'     => 'single_header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_post_pinterest_display',
			'label'       => esc_html__( 'Pinterest display', 'nt-agricom' ),
			'desc'        => esc_html__( 'This is a general option.Disables or enables the simple post pinterest share icon', 'nt-agricom' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'condition'   => 'nt_agricom_post_share_display:is(on)',
			'section'     => 'single_header',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_post_stumbleupon_display',
			'label'       => esc_html__( 'Stumbleupon display', 'nt-agricom' ),
			'desc'        => esc_html__( 'This is a general option.Disables or enables the simple post stumbleupon share icon', 'nt-agricom' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'condition'   => 'nt_agricom_post_share_display:is(on)',
			'section'     => 'single_header',
			'operator'    => 'and'
		),
		// ARCHIVE PAGE SETTINGS
		array(
			'id'          => 'nt_agricom_archive_headbg',
			'label'       =>  esc_html__( 'Archive hero section background image', 'nt-agricom' ),
			'desc'        =>  esc_html__( 'You can upload your image for parallax header', 'nt-agricom' ),
			'type'        => 'upload',
			'section'     => 'archive_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_archive_mask_v',
			'label'       => esc_html__( 'Archive page hero section overlay color display', 'nt-agricom' ),
			'desc'        => sprintf( esc_html__( 'Please select hero section overlay color  display %s or %s.', 'nt-agricom' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'archive_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_archive_mask_c',
			'label'       => esc_html__( 'Archive page hero overlay color ', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_agricom_archive_mask_v:is(on)',
			'section'     => 'archive_page'
		),
		array(
			'id'          => 'nt_agricom_archive_header_bgcolor',
			'label'       => esc_html__( 'Archive pages hero section background color ', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker',
			'section'     => 'archive_page'
		),
		array(
			'id'          => 'nt_agricom_archive_header_bgheight',
			'label'       => esc_html__('Archive pages hero height', 'nt-agricom' ),
			'desc'        => esc_html__('Archive pages hero height', 'nt-agricom' ),
			'std'         => '60',
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,100',
			'section'     => 'archive_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_archive_header_paddingtop',
			'label'       => esc_html__('Hero padding top', 'nt-agricom' ),
			'desc'        => esc_html__('You can use this option for heading text vertical align', 'nt-agricom' ),
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,500',
			'std'		  => '40',
			'section'     => 'archive_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_archive_header_paddingbottom',
			'label'       => esc_html__('Hero padding bottom', 'nt-agricom' ),
			'desc'        => esc_html__('You can use this option for heading text vertical align', 'nt-agricom' ),
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,500',
			'std'		  => '0',
			'section'     => 'archive_page',
			'operator'    => 'and'
		),
		//Archive heading
		array(
			'id'          => 'nt_agricom_archive_heading_display',
			'label'       => esc_html__( 'Archive heading display', 'nt-agricom' ),
			'desc'        => sprintf( esc_html__( 'Archive heading display %s or %s.', 'nt-agricom' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'archive_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_archive_heading',
			'label'       => esc_html__( 'Archive heading', 'nt-agricom' ),
			'desc'        => esc_html__( 'Enter Archive heading', 'nt-agricom' ),
			'std'         => 'Our Archive',
			'type'        => 'text',
			'condition'   => 'nt_agricom_archive_heading_display:is(on)',
			'section'     => 'archive_page'
		),
		array(
			'id'          => 'nt_agricom_archive_heading_fontsize',
			'label'       => esc_html__('Archive heading font size', 'nt-agricom' ),
			'desc'        => esc_html__('Enter Archive heading font size', 'nt-agricom' ),
			'std'         => '70',
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,100',
			'condition'   => 'nt_agricom_archive_heading_display:is(on)',
			'section'     => 'archive_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_archive_heading_color',
			'label'       => esc_html__( 'Archive pages heading color ', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_agricom_archive_heading_display:is(on)',
			'section'     => 'archive_page'
		),
		//Archive Slogan
		array(
			'id'          => 'nt_agricom_archive_slogan_display',
			'label'       => esc_html__( 'Archive heading display', 'nt-agricom' ),
			'desc'        => sprintf( esc_html__( 'Archive heading display %s or %s.', 'nt-agricom' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'archive_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_archive_slogan',
			'label'       => esc_html__( 'Archive slogan', 'nt-agricom' ),
			'desc'        => esc_html__( 'Enter Archive slogan', 'nt-agricom' ),
			'std'         => 'Our Archive',
			'type'        => 'text',
			'condition'   => 'nt_agricom_archive_slogan_display:is(on)',
			'section'     => 'archive_page'
		),
		array(
			'id'          => 'nt_agricom_archive_slogan_fontsize',
			'label'       => esc_html__('Archive slogan font size', 'nt-agricom' ),
			'desc'        => esc_html__('Enter Archive slogan font size', 'nt-agricom' ),
			'std'         => '16',
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,100',
			'condition'   => 'nt_agricom_archive_slogan_display:is(on)',
			'section'     => 'archive_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_archive_slogan_color',
			'label'       => esc_html__( 'Archive slogan color ', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_agricom_archive_slogan_display:is(on)',
			'section'     => 'archive_page'
		),

		// 404 PAGE SETTINGS
		array(
			'id'          => 'nt_agricom_error_headbg',
			'label'       =>  esc_html__( '404 hero section background image', 'nt-agricom' ),
			'desc'        =>  esc_html__( 'You can upload your image for parallax header', 'nt-agricom' ),
			'type'        => 'upload',
			'section'     => 'error_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_error_mask_v',
			'label'       => esc_html__( '404 page hero section overlay color display', 'nt-agricom' ),
			'desc'        => sprintf( esc_html__( 'Please select hero section overlay color  display %s or %s.', 'nt-agricom' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'error_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_error_mask_c',
			'label'       => esc_html__( '404 page hero overlay color ', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_agricom_error_mask_v:is(on)',
			'section'     => 'error_page'
		),
		array(
			'id'          => 'nt_agricom_error_header_bgcolor',
			'label'       => esc_html__( '404 pages hero section background color ', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker',
			'section'     => 'error_page'
		),
		array(
			'id'          => 'nt_agricom_error_header_bgheight',
			'label'       => esc_html__('404 page hero height', 'nt-agricom' ),
			'desc'        => esc_html__('404 page hero height', 'nt-agricom' ),
			'std'         => '60',
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,100',
			'section'     => 'error_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_error_header_paddingtop',
			'label'       => esc_html__('Hero padding top', 'nt-agricom' ),
			'desc'        => esc_html__('You can use this option for heading text vertical align', 'nt-agricom' ),
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,500',
			'std'		  => '40',
			'section'     => 'error_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_error_header_paddingbottom',
			'label'       => esc_html__('Hero padding bottom', 'nt-agricom' ),
			'desc'        => esc_html__('You can use this option for heading text vertical align', 'nt-agricom' ),
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,500',
			'std'		  => '0',
			'section'     => 'error_page',
			'operator'    => 'and'
		),
		//404 heading
		array(
			'id'          => 'nt_agricom_error_heading_display',
			'label'       => esc_html__( '404 page heading display', 'nt-agricom' ),
			'desc'        => sprintf( esc_html__( 'error heading display %s or %s.', 'nt-agricom' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'error_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_error_heading',
			'label'       => esc_html__( '404 page heading', 'nt-agricom' ),
			'desc'        => esc_html__( 'Enter Error heading', 'nt-agricom' ),
			'std'         => '404 page',
			'type'        => 'text',
			'condition'   => 'nt_agricom_error_heading_display:is(on)',
			'section'     => 'error_page'
		),
		array(
			'id'          => 'nt_agricom_error_heading_fontsize',
			'label'       => esc_html__('404 page heading font size', 'nt-agricom' ),
			'desc'        => esc_html__('Enter 404 page heading font size', 'nt-agricom' ),
			'type'        => 'numeric-slider',
			'std'		  => '70',
			'min_max_step'=> '0,100',
			'condition'   => 'nt_agricom_error_heading_display:is(on)',
			'section'     => 'error_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_error_headingcolor',
			'label'       => esc_html__( '404 pages heading color ', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_agricom_error_heading_display:is(on)',
			'section'     => 'error_page'
		),
		//404 slogan
		array(
			'id'          => 'nt_agricom_error_slogan_display',
			'label'       => esc_html__( '404 page slogan display', 'nt-agricom' ),
			'desc'        => sprintf( esc_html__( '404 page slogan display %s or %s.', 'nt-agricom' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'error_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_error_slogan',
			'label'       => esc_html__( '404 page Slogan', 'nt-agricom' ),
			'desc'        => esc_html__( 'Enter 404 page slogan', 'nt-agricom' ),
			'std'         => 'Oops! That page can not be found.',
			'type'        => 'text',
			'condition'   => 'nt_agricom_error_slogan_display:is(on)',
			'section'     => 'error_page'
		),
		array(
			'id'          => 'nt_agricom_error_header_slogancolor',
			'label'       => esc_html__( '404 page slogan color ', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_agricom_error_slogan_display:is(on)',
			'section'     => 'error_page'
		),
		array(
			'id'          => 'nt_agricom_error_content_text',
			'label'       => esc_html__('404 page content text', 'nt-agricom' ),
			'std'         => '',
			'type'        => 'textarea',
			'section'     => 'error_page'
		),

		// SEARCH PAGE SETTINGS
		array(
			'id'          => 'nt_agricom_search_headbg',
			'label'       =>  esc_html__( 'Search hero section background image', 'nt-agricom' ),
			'desc'        =>  esc_html__( 'You can upload your image for parallax header', 'nt-agricom' ),
			'type'        => 'upload',
			'section'     => 'search_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_search_mask_v',
			'label'       => esc_html__( 'Search page hero section overlay color display', 'nt-agricom' ),
			'desc'        => sprintf( esc_html__( 'Please select hero section overlay color  display %s or %s.', 'nt-agricom' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'search_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_search_mask_c',
			'label'       => esc_html__( 'Search page hero overlay color ', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_agricom_search_mask_v:is(on)',
			'section'     => 'search_page'
		),
		array(
			'id'          => 'nt_agricom_search_header_bgcolor',
			'label'       => esc_html__( 'Search page hero section background color ', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker',
			'section'     => 'search_page'
		),
		array(
			'id'          => 'nt_agricom_search_header_bgheight',
			'label'       => esc_html__('Search page hero height', 'nt-agricom' ),
			'desc'        => esc_html__('Search page hero height', 'nt-agricom' ),
			'std'         => '60',
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,100',
			'section'     => 'search_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_search_header_paddingtop',
			'label'       => esc_html__('Hero padding top', 'nt-agricom' ),
			'desc'        => esc_html__('You can use this option for heading text vertical align', 'nt-agricom' ),
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,500',
			'std'		  => '40',
			'section'     => 'search_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_search_header_paddingbottom',
			'label'       => esc_html__('Hero padding bottom', 'nt-agricom' ),
			'desc'        => esc_html__('You can use this option for heading text vertical align', 'nt-agricom' ),
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,500',
			'std'		  => '0',
			'section'     => 'search_page',
			'operator'    => 'and'
		),
		//Search heading
		array(
			'id'          => 'nt_agricom_search_heading_display',
			'label'       => esc_html__( 'Search page heading display', 'nt-agricom' ),
			'desc'        => sprintf( esc_html__( 'search heading display %s or %s.', 'nt-agricom' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'search_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_search_heading',
			'label'       => esc_html__( 'Search page heading', 'nt-agricom' ),
			'desc'        => esc_html__( 'Enter Search heading', 'nt-agricom' ),
			'std'         => 'Search page',
			'type'        => 'text',
			'condition'   => 'nt_agricom_search_heading_display:is(on)',
			'section'     => 'search_page'
		),
		array(
			'id'          => 'nt_agricom_search_heading_fontsize',
			'label'       => esc_html__('Search page heading font size', 'nt-agricom' ),
			'desc'        => esc_html__('Enter Search page heading font size', 'nt-agricom' ),
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,100',
			'std'		  => '70',
			'condition'   => 'nt_agricom_search_heading_display:is(on)',
			'section'     => 'search_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_search_headingcolor',
			'label'       => esc_html__( 'Search pages heading color ', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_agricom_search_heading_display:is(on)',
			'section'     => 'search_page'
		),
		//Search Slogan
		array(
			'id'          => 'nt_agricom_search_slogan_display',
			'label'       => esc_html__( 'Search page slogan display', 'nt-agricom' ),
			'desc'        => sprintf( esc_html__( 'Search page slogan display %s or %s.', 'nt-agricom' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'search_page',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_search_slogan',
			'label'       => esc_html__( 'Search page slogan', 'nt-agricom' ),
			'desc'        => esc_html__( 'Enter Search page Slogan', 'nt-agricom' ),
			'std'         => 'Search completed',
			'type'        => 'text',
			'condition'   => 'nt_agricom_search_slogan_display:is(on)',
			'section'     => 'search_page'
		),
		array(
			'id'          => 'nt_agricom_search_header_slogancolor',
			'label'       => esc_html__( 'Search page slogan color ', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_agricom_search_slogan_display:is(on)',
			'section'     => 'search_page'
		),

		// BREADCRUBMS SETTINGS.
		array(
			'id'          => 'nt_agricom_bread_display',
			'label'       => esc_html__( 'Breadcrubms display', 'nt-agricom' ),
			'desc'        => sprintf( esc_html__( 'Breadcrubms display %s or %s.', 'nt-agricom' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'breadcrubms',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_breadcrubms_color',
			'label'       => esc_html__( 'Blog pages breadcrubms color ', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_agricom_bread_display:is(on)',
			'section'     => 'breadcrubms'
		),
		array(
			'id'          => 'nt_agricom_breadcrubms_hovercolor',
			'label'       => esc_html__( 'Blog pages breadcrubms hover color ', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_agricom_bread_display:is(on)',
			'section'     => 'breadcrubms'
		),
		array(
			'id'          => 'nt_agricom_breadcrubms_currentcolor',
			'label'       => esc_html__( 'Blog pages breadcrubms current page text color ', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_agricom_bread_display:is(on)',
			'section'     => 'breadcrubms'
		),
		array(
			'id'          => 'nt_agricom_breadcrubms_font_size',
			'label'       => esc_html__('Breadcrubms font size', 'nt-agricom' ),
			'desc'        => esc_html__('Blog/pages breadcrubms font size', 'nt-agricom' ),
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,100',
			'std'         => '16',
			'condition'   => 'nt_agricom_bread_display:is(on)',
			'section'     => 'breadcrubms',
			'operator'    => 'and'
		),

		// WIDGETIZE FOOTER SETTINGS
		array(
			'id'          => 'nt_agricom_address_section_title',
			'label'       => esc_html__( 'Address section title', 'nt-agricom' ),
			'desc'        => esc_html__( 'Add title for contact detail section', 'nt-agricom' ),
			'std'         => 'Contacts',
			'type'        => 'text',
			'section'     => 'footer_general'
		),
		array(
			'id'          => 'nt_agricom_address_section_desc',
			'label'       => esc_html__('Address section description', 'nt-agricom' ),
			'std'         => 'Mega bold action. Sold care wherever less appetizing your far easily',
			'type'        => 'textarea',
			'section'     => 'footer_general'
		),
		//ADRESS DETAIL SECTION
		array(
			'id'          => 'nt_agricom_address',
			'label'       => esc_html__( 'Contact detail ', 'nt-agricom' ),
			'desc'        => esc_html__( 'Add contact section detail', 'nt-agricom' ),
			'type'        => 'list-item',
			'section'     => 'footer_general',
			'settings'    => array(
				array(
					'id'          => 'nt_agricom_address_icon',
					'label'       => esc_html__( 'Icon name', 'nt-agricom' ),
					'desc'        => esc_html__( 'Enter icon name for before detail. example : fontello-location', 'nt-agricom' ),
					'type'        => 'text'
				),
				array(
					'id'          => 'nt_agricom_address_detail',
					'label'       => esc_html__( 'Detail text or link', 'nt-agricom' ),
					'desc'        => esc_html__( 'Enter detail', 'nt-agricom' ),
					'type'        => 'text'
				),
			)
		),
		//SOCIAL SECTION
		array(
			'id'          => 'nt_agricom_social',
			'label'       => esc_html__( 'Contact section social icons', 'nt-agricom' ),
			'desc'        => esc_html__( 'Add social media icons and url', 'nt-agricom' ),
			'type'        => 'list-item',
			'section'     => 'footer_general',
			'settings'    => array(
				array(
					'id'          => 'nt_agricom_social_text',
					'label'       => esc_html__( 'Social icon name', 'nt-agricom' ),
					'desc'        => esc_html__( 'Enter icon name. example : fontello-facebook', 'nt-agricom' ),
					'type'        => 'text'
				),
				array(
					'id'          => 'nt_agricom_social_link',
					'label'       => esc_html__( 'URL', 'nt-agricom' ),
					'desc'        => esc_html__( 'Enter a url for social media', 'nt-agricom' ),
					'type'        => 'text'
				),
			)
		),
		array(
			'id'          => 'nt_agricom_social_target',
			'label'       => esc_html__( 'Target social media', 'nt-agricom' ),
			'desc'        => esc_html__( 'Select social media target type. Default : _blank' , 'nt-agricom' ),
			'std'         => '_blank',
			'type'        => 'select',
			'section'     => 'footer_general',
			'operator'    => 'and',
			'choices'     => array(
				array(
					'value'       => '_blank',
					'label'       => esc_html__( '_blank', 'nt-agricom' )
				),
				array(
					'value'       => '_self',
					'label'       => esc_html__( '_self', 'nt-agricom' )
				),
				array(
					'value'       => '_parent',
					'label'       => esc_html__( '_parent', 'nt-agricom' )
				),
				array(
					'value'       => '_top',
					'label'       => esc_html__( '_top', 'nt-agricom' )
				),
			)
		),
		// FORM SECTION
		array(
			'id'          => 'nt_agricom_contact_form_title',
			'label'       => esc_html__( 'Contact form section title', 'nt-agricom' ),
			'desc'        => esc_html__( 'Add title for form section', 'nt-agricom' ),
			'std'         => 'Get In Touch',
			'type'        => 'text',
			'section'     => 'footer_general'
		),
		array(
			'id'          => 'nt_agricom_contact_form_desc',
			'label'       => esc_html__('Contact form section description', 'nt-agricom' ),
			'std'         => 'Vinyl grown remarkable in survey wherever parents are its. Mega bold action. Sold care',
			'type'        => 'textarea',
			'section'     => 'footer_general'
		),
		array(
			'id'          => 'nt_agricom_contact_form_shortcode',
			'label'       => esc_html__('Contact form shortcode', 'nt-agricom' ),
			'std'         => '',
			'type'        => 'textarea',
			'section'     => 'footer_general'
		),
		// map options
		array(
			'id'          => 'nt_agricom_map_type',
			'label'       => esc_html__( 'Map type', 'nt-agricom' ),
			'desc'        => esc_html__( 'Select google map type.' , 'nt-agricom' ),
			'std'         => 'default',
			'type'        => 'select',
			'section'     => 'footer_general',
			'operator'    => 'and',
			'choices'     => array(
				array(
					'value'       => 'default',
					'label'       => esc_html__( 'Default theme map', 'nt-agricom' )
				),
				array(
					'value'       => 'plugin',
					'label'       => esc_html__( 'Use Plugin map', 'nt-agricom' )
				),
			)
		),
		array(
			'id'          => 'nt_agricom_map_api',
			'label'       => esc_html__('Map api key', 'nt-agricom' ),
			'std'         => 'AIzaSyDB-HWTh7GSOINpfHczBMT7pStVWxkctP8',
			'type'        => 'text',
			'condition'   => 'nt_agricom_map_type:is(default)',
			'section'     => 'footer_general'
		),
		array(
			'id'          => 'nt_agricom_map_longitude',
			'label'       => esc_html__('Map longitude', 'nt-agricom' ),
			'std'         => '44.958309',
			'type'        => 'text',
			'condition'   => 'nt_agricom_map_type:is(default)',
			'section'     => 'footer_general'
		),
		array(
			'id'          => 'nt_agricom_map_latitude',
			'label'       => esc_html__('Map latitude', 'nt-agricom' ),
			'std'         => '34.109925',
			'type'        => 'text',
			'condition'   => 'nt_agricom_map_type:is(default)',
			'section'     => 'footer_general'
		),
		array(
			'id'          => 'nt_agricom_contact_map_shortcode',
			'label'       => esc_html__('Map shortcode', 'nt-agricom' ),
			'desc'        => esc_html__('Add your custom map plugin shortcode here', 'nt-agricom' ),
			'std'         => '',
			'type'        => 'textarea',
			'condition'   => 'nt_agricom_map_type:is(plugin)',
			'section'     => 'footer_general'
		),

		// WIDGETIZE FOOTER SETTINGS
		array(
			'id'          => 'nt_agricom_footer_style',
			'label'       => esc_html__('Footer widgetize content style', 'nt-agricom' ),
			'desc'        => esc_html__('Select main footer style', 'nt-agricom' ),
			'std'         => 'style1',
			'type'        => 'select',
			'section'     => 'footer_widgetize',
			'operator'    => 'and',
			'choices'     => array(
				array(
					'value'	=> 'style1',
					'label'	=> esc_html__('Style 1', 'nt-agricom' )
				),
				array(
					'value'	=> 'style2',
					'label'	=> esc_html__('Style 2', 'nt-agricom' )
				),
				array(
					'value'	=> 'style3',
					'label'	=> esc_html__('Style 3', 'nt-agricom' )
				),
			)
		),
		array(
			'id'          => 'nt_agricom_widgetize_clmn_style',
			'label'       => esc_html__('Footer widgetize column style', 'nt-agricom' ),
			'desc'        => esc_html__('Please select widgetize column style', 'nt-agricom' ),
			'std'         => 'd',
			'type'        => 'select',
			'section'     => 'footer_widgetize',
			'operator'    => 'and',
			'choices'     => array(
				array(
					'value'	=> 'd',
					'label'	=> esc_html__('Default column', 'nt-agricom' ),
					'src'	=> ''
				),
				array(
					'value'	=> 'c',
					'label'	=> esc_html__('Custom column', 'nt-agricom' ),
					'src'	=> ''
				),
			)
		),
		array(
			'id'          => 'nt_agricom_footer_clmn',
			'label'       => esc_html__('Footer widgetize column', 'nt-agricom' ),
			'desc'        => esc_html__('Select main footer column', 'nt-agricom' ),
			'std'         => 'style1',
			'type'        => 'select',
			'condition'   => 'nt_agricom_widgetize_clmn_style:is(c)',
			'section'     => 'footer_widgetize',
			'operator'    => 'and',
			'choices'     => array(
				array(
					'value'	=> '6',
					'label'	=> esc_html__('2 Column', 'nt-agricom' ),
					'src'	=> ''
				),
				array(
					'value'	=> '3',
					'label'	=> esc_html__('3 Column', 'nt-agricom' ),
					'src'	=> ''
				),
				array(
					'value'	=> '4',
					'label'	=> esc_html__('4 Column', 'nt-agricom' ),
					'src'	=> ''
				),
			)
		),
		array(
			'id'          => 'nt_agricom_widgetize',
			'label'       => esc_html__( 'Footer top widgetize area section', 'nt-agricom' ),
			'desc'        => sprintf( esc_html__( 'Choose footer widgetize section %s or %s.', 'nt-agricom' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'off',
			'type'        => 'on-off',
			'section'     => 'footer_widgetize',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_fw_bg_c',
			'label'       => esc_html__( 'Footer widgetize background color ', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_agricom_widgetize:is(on)',
			'section'     => 'footer_widgetize'
		),
		array(
			'id'          => 'nt_agricom_fw_brd_c',
			'label'       => esc_html__( 'Footer widgetize border top color ', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_agricom_widgetize:is(on)',
			'section'     => 'footer_widgetize'
		),
		array(
			'id'          => 'nt_agricom_fw_h_c',
			'label'       => esc_html__( 'Footer widget heading color ', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_agricom_widgetize:is(on)',
			'section'     => 'footer_widgetize'
		),
		array(
			'id'          => 'nt_agricom_fw_t_c',
			'label'       => esc_html__( 'Footer general text color ', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_agricom_widgetize:is(on)',
			'section'     => 'footer_widgetize'
		),
		array(
			'id'          => 'nt_agricom_fw_a_c',
			'label'       => esc_html__( 'Footer general a(link/URL) color ', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_agricom_widgetize:is(on)',
			'section'     => 'footer_widgetize'
		),
		array(
			'id'          => 'nt_agricom_fw_a_hc',
			'label'       => esc_html__( 'Footer general a(link/URL) hover color ', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_agricom_widgetize:is(on)',
			'section'     => 'footer_widgetize'
		),
		array(
			'id'          => 'nt_agricom_fw_pad',
			'label'       => esc_html__('Footer widgetize padding top and botom', 'nt-agricom' ),
			'desc'        => esc_html__('Enter padding top and botom for widgetize footer', 'nt-agricom' ),
			'type'        => 'numeric-slider',
			'std'		  => '',
			'min_max_step'=> '0,250',
			'condition'   => 'nt_agricom_widgetize:is(on)',
			'section'     => 'footer_widgetize',
			'operator'    => 'and'
		),

		// FOOTER COPYRIGHT
		array(
			'id'          => 'nt_agricom_copyright_display',
			'label'       => esc_html__( 'footer powered section', 'nt-agricom' ),
			'desc'        => sprintf( esc_html__( 'Choose footer powered section %s or %s.', 'nt-agricom' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'copyright',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_copyright',
			'label'       => esc_html__('Footer copyright', 'nt-agricom' ),
			'std'         => 'Launch beautiful, responsive websites faster with themes',
			'type'        => 'textarea',
			'condition'   => 'nt_agricom_copyright_display:is(on)',
			'section'     => 'copyright'
		),
		array(
			'id'          => 'nt_agricom_footer_p_c',
			'label'       => esc_html__( 'Footer copyright text color ', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker',
			'section'     => 'copyright'
		),
		array(
			'id'        => 'nt_agricom_typgrph_copy',
			'label'     => esc_html__( 'Footer copyright typography', 'nt-agricom' ),
			'desc'      => esc_html__( 'The Typography option type is for adding typography styles to your site.', 'nt-agricom' ),
			'type'      => 'typography',
			'section'   => 'copyright',
			'condition' => 'nt_agricom_copyright_display:is(on)',
			'operator'  => 'and'
		),
		//GOOGLE FONTS  SETTINGS.
		array(
			'id'        => 'body_google_fonts',
			'label'     => esc_html__( 'Google Fonts', 'nt-agricom'  ),
			'desc'      => esc_html__( 'Add Google Font and after the save settings follow these steps Dashbont-agricom > Appearance > Theme Options > Typography', 'nt-agricom' ),
			'type'      => 'google-fonts',
			'section'   => 'google_fonts',
			'operator'  => 'and'
		),

		//TYPOGRAPHY  SETTINGS.
		array(
			'id'        => 'nt_agricom_typgrph',
			'label'     => esc_html__( 'Typography', 'nt-agricom' ),
			'desc'      => esc_html__( 'The Typography option type is for adding typography styles to your site.', 'nt-agricom' ),
			'type'      => 'typography',
			'section'   => 'typography',
			'operator'  => 'and'
		),
		array(
			'id'        => 'nt_agricom_typgrpha',
			'label'     => esc_html__( 'Typography a', 'nt-agricom' ),
			'desc'      => esc_html__( 'The Typography a option type is for adding typography styles to your site.', 'nt-agricom' ),
			'type'      => 'typography',
			'section'   => 'typography',
			'operator'  => 'and'
		),
		array(
			'id'        => 'nt_agricom_typgrph1',
			'label'     => esc_html__( 'Typography h1', 'nt-agricom' ),
			'desc'      => esc_html__( 'The Typography option type is for adding typography styles to your site.', 'nt-agricom' ),
			'type'      => 'typography',
			'section'   => 'typography',
			'operator'  => 'and'
		),
		array(
			'id'        => 'nt_agricom_typgrph2',
			'label'     => esc_html__( 'Typography h2', 'nt-agricom' ),
			'desc'      => esc_html__( 'The Typography option type is for adding typography styles to your site.', 'nt-agricom' ),
			'type'      => 'typography',
			'section'   => 'typography',
			'operator'  => 'and'
		),
		array(
			'id'        => 'nt_agricom_typgrph3',
			'label'     => esc_html__( 'Typography h3', 'nt-agricom' ),
			'desc'      => esc_html__( 'The Typography option type is for adding typography styles to your site.', 'nt-agricom' ),
			'type'      => 'typography',
			'section'   => 'typography',
			'operator'  => 'and'
		),
		array(
			'id'        => 'nt_agricom_typgrph4',
			'label'     => esc_html__( 'Typography h4', 'nt-agricom' ),
			'desc'      => esc_html__( 'The Typography option type is for adding typography styles to your site.', 'nt-agricom' ),
			'type'      => 'typography',
			'section'   => 'typography',
			'operator'  => 'and'
		),
		array(
			'id'        => 'nt_agricom_typgrph5',
			'label'     => esc_html__( 'Typography h5', 'nt-agricom' ),
			'desc'      => esc_html__( 'The Typography option type is for adding typography styles to your site.', 'nt-agricom' ),
			'type'      => 'typography',
			'section'   => 'typography',
			'operator'  => 'and'
		),
		array(
			'id'        => 'nt_agricom_typgrph6',
			'label'     => esc_html__( 'Typography h6', 'nt-agricom' ),
			'desc'      => esc_html__( 'The Typography option type is for adding typography styles to your site.', 'nt-agricom' ),
			'type'      => 'typography',
			'section'   => 'typography',
			'operator'  => 'and'
		),
		array(
			'id'        => 'nt_agricom_typgrph7',
			'label'     => esc_html__( 'Typography p', 'nt-agricom' ),
			'desc'      => esc_html__( 'The Typography option type is for adding typography styles to your site.', 'nt-agricom' ),
			'type'      => 'typography',
			'section'   => 'typography',
			'operator'  => 'and'
		),

		//SINGLE WOO HERO SETTINGS
		array(
			'id'          => 'nt_agricom_single_woo_headbg',
			'label'       =>  esc_html__( 'Woocommerce product hero section background image', 'nt-agricom' ),
			'desc'        =>  esc_html__( 'You can upload your image for parallax header', 'nt-agricom' ),
			'type'        => 'upload',
			'section'     => 'woo_section',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_single_woo_mask_v',
			'label'       => esc_html__( 'Woocommerce product page hero section overlay color display', 'nt-agricom' ),
			'desc'        => sprintf( esc_html__( 'Please select hero section overlay color  display %s or %s.', 'nt-agricom' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'woo_section',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_single_woo_mask_c',
			'label'       => esc_html__( 'Woocommerce product page hero overlay color ', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker-opacity',
			'condition'   => 'nt_agricom_single_woo_mask_v:is(on)',
			'section'     => 'woo_section'
		),
		array(
			'id'          => 'nt_agricom_woo_section_bgcolor',
			'label'       => esc_html__( 'Woocommerce product page hero section background color ', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker',
			'section'     => 'woo_section'
		),
		array(
			'id'          => 'nt_agricom_woo_section_bgheight',
			'label'       => esc_html__('Woocommerce product page hero height', 'nt-agricom' ),
			'desc'        => esc_html__('Single page hero height', 'nt-agricom' ),
			'std'         => '60',
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,100',
			'section'     => 'woo_section',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_woo_section_paddingtop',
			'label'       => esc_html__('Woocommerce product header padding top', 'nt-agricom' ),
			'desc'        => esc_html__('You can use this option for heading text vertical align', 'nt-agricom' ),
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,500',
			'std'		  => '40',
			'section'     => 'woo_section',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_woo_section_paddingbottom',
			'label'       => esc_html__('Woocommerce product header padding bottom', 'nt-agricom' ),
			'desc'        => esc_html__('You can use this option for heading text vertical align', 'nt-agricom' ),
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,500',
			'std'		  => '0',
			'section'     => 'woo_section',
			'operator'    => 'and'
		),
		//Single heading
		array(
			'id'          => 'nt_agricom_single_woo_heading_display',
			'label'       => esc_html__( 'Woocommerce product  heading post title display', 'nt-agricom' ),
			'desc'        => sprintf( esc_html__( 'Please select single pages heading post title display %s or %s.', 'nt-agricom' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'woo_section',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_single_woo_heading',
			'label'       => esc_html__( 'Woocommerce single heading', 'nt-agricom' ),
			'desc'        => esc_html__( 'Enter heading', 'nt-agricom' ),
			'std'         => '',
			'type'        => 'text',
			'condition'   => 'nt_agricom_single_woo_heading_display:is(on)',
			'section'     => 'woo_section'
		),
		array(
			'id'          => 'nt_agricom_single_woo_headingcolor',
			'label'       => esc_html__( 'Woocommerce product  heading color ', 'nt-agricom' ),
			'desc'        => esc_html__( 'Please select color', 'nt-agricom' ),
			'type'        => 'colorpicker',
			'condition'   => 'nt_agricom_single_woo_heading_display:is(on)',
			'section'     => 'woo_section'
		),
		array(
			'id'          => 'nt_agricom_single_woo_heading_fontsize',
			'label'       => esc_html__('Woocommerce product  heading font size', 'nt-agricom' ),
			'desc'        => esc_html__('Enter Single heading font size', 'nt-agricom' ),
			'std'         => '70',
			'type'        => 'numeric-slider',
			'min_max_step'=> '0,100',
			'condition'   => 'nt_agricom_single_woo_heading_display:is(on)',
			'section'     => 'woo_section',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_single_woo_desc_display',
			'label'       => esc_html__( 'Woocommerce product  description visibility', 'nt-agricom' ),
			'desc'        => sprintf( esc_html__( 'Please select single pages heading post title display %s or %s.', 'nt-agricom' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'woo_section',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_single_woo_desc',
			'label'       => esc_html__( 'Woocommerce single description', 'nt-agricom' ),
			'desc'        => esc_html__( 'Enter description', 'nt-agricom' ),
			'std'         => '',
			'type'        => 'text',
			'condition'   => 'nt_agricom_single_woo_desc_display:is(on)',
			'section'     => 'woo_section'
		),
		// woo shop
		array(
			'id'          => 'nt_agricom_page_woo_heading_display',
			'label'       => esc_html__( 'Shop page heading visibility', 'nt-agricom' ),
			'desc'        => sprintf( esc_html__( 'Please select shop page heading post title display %s or %s.', 'nt-agricom' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'woo_section',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_page_woo_heading',
			'label'       => esc_html__( 'Woocommerce shop page heading', 'nt-agricom' ),
			'desc'        => esc_html__( 'Enter heading', 'nt-agricom' ),
			'std'         => '',
			'type'        => 'text',
			'condition'   => 'nt_agricom_page_woo_heading_display:is(on)',
			'section'     => 'woo_section'
		),
		array(
			'id'          => 'nt_agricom_page_woo_desc_display',
			'label'       => esc_html__( 'Shop page description visibility', 'nt-agricom' ),
			'desc'        => sprintf( esc_html__( 'Please select shop page description %s or %s.', 'nt-agricom' ), '<code>on</code>', '<code>off</code>' ),
			'std'         => 'on',
			'type'        => 'on-off',
			'section'     => 'woo_section',
			'operator'    => 'and'
		),
		array(
			'id'          => 'nt_agricom_page_woo_desc',
			'label'       => esc_html__( 'Woocommerce shop page description', 'nt-agricom' ),
			'desc'        => esc_html__( 'Enter description', 'nt-agricom' ),
			'std'         => '',
			'type'        => 'text',
			'condition'   => 'nt_agricom_page_woo_desc_display:is(on)',
			'section'     => 'woo_section'
		)

	) // end array
);

// end function
	/* allow settings to be filtered before saving */
	$nt_agricom_custom_settings = apply_filters( ot_settings_id() . '_args', $nt_agricom_custom_settings );
	/* settings are not the same update the DB */
	if ( $nt_agricom_saved_settings !== $nt_agricom_custom_settings ) {
		update_option( ot_settings_id(), $nt_agricom_custom_settings );
	}
	/* Lets OptionTree know the UI Builder is being overridden */
	global $ot_has_custom_theme_options;
	$ot_has_custom_theme_options = true;
	}
