<?php

/*-----------------------------------------------------------------------------------*/
/*	Shortcode Filter
/*-----------------------------------------------------------------------------------*/

vc_set_as_theme( $disable_updater = false );
vc_is_updater_disabled();

if(!function_exists('agricom_anim_aos')) {
	
	function agricom_anim_aos()
	{
	    $anim_aos = array(
	        esc_html__('Select option', 'bon') => '',
	        esc_html__('fade', 'bon') => 'fade',
	        esc_html__('fade-up', 'bon') => 'fade-up',
	        esc_html__('fade-down', 'bon') => 'fade-down',
	        esc_html__('fade-left', 'bon') => 'fade-left',
	        esc_html__('fade-right', 'bon') => 'fade-right',
	        esc_html__('fade-up-right', 'bon') => 'fade-up-right',
	        esc_html__('fade-up-left', 'bon') => 'fade-up-left',
	        esc_html__('fade-down-right', 'bon') => 'fade-down-right',
	        esc_html__('fade-down-left', 'bon') => 'fade-down-left',
	        esc_html__('flip-up', 'bon') => 'flip-up',
	        esc_html__('flip-down', 'bon') => 'flip-down',
	        esc_html__('flip-left', 'bon') => 'flip-left',
	        esc_html__('flip-right', 'bon') => 'flip-right',
	        esc_html__('slide-up', 'bon') => 'slide-up',
	        esc_html__('slide-down', 'bon') => 'slide-down',
	        esc_html__('slide-left', 'bon') => 'slide-left',
	        esc_html__('slide-right', 'bon') => 'slide-right',
	        esc_html__('zoom-in', 'bon') => 'zoom-in',
	        esc_html__('zoom-in-up', 'bon') => 'zoom-in-up',
	        esc_html__('zoom-in-down', 'bon') => 'zoom-in-down',
	        esc_html__('zoom-in-left', 'bon') => 'zoom-in-left',
	        esc_html__('zoom-in-right', 'bon') => 'zoom-in-right',
	        esc_html__('zoom-out', 'bon') => 'zoom-out',
	        esc_html__('zoom-out-up', 'bon') => 'zoom-out-up',
	        esc_html__('zoom-out-down', 'bon') => 'zoom-out-down',
	        esc_html__('zoom-out-left', 'bon') => 'zoom-out-left',
	        esc_html__('zoom-out-right', 'bon') => 'zoom-out-right',
	     );
	    return $anim_aos;
	}
}



//FOR ROW EXTRA ATTR
$nt_agricom_background_one_attributes = array(

	array(
		'type'        	=> 'dropdown',
		'heading'     	=> esc_html__('Background position Y-X axis', 'nt-agricom' ),
		'param_name'  	=> 'nt_agricom_bg_position',
		'description' 	=> esc_html__('Change position Y-X axis for bg image.', 'nt-agricom'),
		'group' 		=> esc_html__('Design Options','nt-agricom'),
		'value'       	=> array(
			esc_html__('Select Y-X position', 	'nt-agricom' )	=> '',
			esc_html__('Left-Top', 		'nt-agricom' )	=> 'left top',
			esc_html__('Left-Center', 	'nt-agricom' )	=> 'left center',
			esc_html__('Left-Bottom', 	'nt-agricom' )	=> 'left bottom',
			esc_html__('Right-Top', 	'nt-agricom' )	=> 'right top',
			esc_html__('Right-Center', 	'nt-agricom' )	=> 'right center',
			esc_html__('Right-Bottom', 	'nt-agricom' )	=> 'right bottom',
			esc_html__('Center-Top', 	'nt-agricom' )	=> 'center top',
			esc_html__('Center-Center', 'nt-agricom' )	=> 'center center',
			esc_html__('Center-Bottom', 'nt-agricom' )	=> 'center bottom',
			esc_html__('Custom', 		'nt-agricom' )	=> 'custom',
		),
	),

	array(
		'type' 			=> 'textfield',
		'heading' 		=> esc_html__('Background position Y axis', 'nt-agricom'),
		'param_name' 	=> 'nt_agricom_bg_positiony',
		'description' 	=> esc_html__('Change position X axis offset for bg image.example: center or 40px or 25% ...etc', 'nt-agricom'),
		'group' 		=> esc_html__('Design Options','nt-agricom'),
		'dependency' 	=> array(
						'element' 	=> 'nt_agricom_bg_position',
						'value'   	=> 'custom'
		)
	),
	array(
		'type' 			=> 'textfield',
		'heading' 		=> esc_html__('Background position X axis', 'nt-agricom'),
		'param_name' 	=> 'nt_agricom_bg_positionx',
		'description' 	=> esc_html__('Change position X axis offset for bg image.example: center or 40px or 25% ...etc', 'nt-agricom'),
		'group' 		=> esc_html__('Design Options','nt-agricom'),
		'dependency' 	=> array(
						'element' 	=> 'nt_agricom_bg_position',
						'value'   	=> 'custom'
		)
	),
	array(
		'type' 			=> 'textfield',
		'heading' 		=> esc_html__('Background position X axis offset', 'nt-agricom'),
		'param_name' 	=> 'nt_agricom_bg_xoffset',
		'description' 	=> esc_html__('Change position X axis offset for bg image.example: 40px or 25% ...etc', 'nt-agricom'),
		'group' 		=> esc_html__('Design Options','nt-agricom'),
		'dependency' 	=> array(
						'element' 	=> 'nt_agricom_bg_position',
						'value'   	=> 'custom'
		)
	),
	array(
		'type' 			=> 'textfield',
		'heading' 		=> esc_html__('Background size', 'nt-agricom'),
		'param_name' 	=> 'nt_agricom_bg_size',
		'description' 	=> esc_html__('Change size for bg image.example: 100px or 100% or 100vh', 'nt-agricom'),
		'group' 		=> esc_html__('Design Options','nt-agricom'),
	),
	array(
		'type'        	=> 'dropdown',
		'heading'     	=> esc_html__('Background image display ( under 992px )', 'nt-agricom' ),
		'param_name'  	=> 'nt_agricom_bg_ontablet',
		'description' 	=> esc_html__('You can select show or hide background image under 992px', 'nt-agricom'),
		'group' 		=> esc_html__('Design Options','nt-agricom'),
		'value'       	=> array(
			esc_html__('Select options', 'nt-agricom' )	=> '',
			esc_html__('Show', 	'nt-agricom' )	=> 'show',
			esc_html__('Hide', 	'nt-agricom' )	=> 'hide',
		),
	),
	array(
		'type'        	=> 'dropdown',
		'heading'     	=> esc_html__('Background image display ( under 768px )', 'nt-agricom' ),
		'param_name'  	=> 'nt_agricom_bg_onmobile',
		'description' 	=> esc_html__('You can select show or hide background image under 768px', 'nt-agricom'),
		'group' 		=> esc_html__('Design Options','nt-agricom'),
		'value'       	=> array(
			esc_html__('Select options', 'nt-agricom' )	=> '',
			esc_html__('Show', 	'nt-agricom' )	=> 'show',
			esc_html__('Hide', 	'nt-agricom' )	=> 'hide',
		),
	),
	array(
		'type'        	=> 'dropdown',
		'heading'     	=> esc_html__('Background image display ( under 480px )', 'nt-agricom' ),
		'param_name'  	=> 'nt_agricom_bg_onphone',
		'description' 	=> esc_html__('You can select show or hide background image under 480px', 'nt-agricom'),
		'group' 		=> esc_html__('Design Options','nt-agricom'),
		'value'       	=> array(
			esc_html__('Select options', 'nt-agricom' )	=> '',
			esc_html__('Show', 	'nt-agricom' )	=> 'show',
			esc_html__('Hide', 	'nt-agricom' )	=> 'hide',
		),
	),
);
vc_add_params( 'vc_row', $nt_agricom_background_one_attributes );


//FOR ROW 480 RESOLUTION
$nt_agricom_vc_row_responsive_attributes = array(
	array(
		'type'        	=> 'dropdown',
		'heading'     	=> esc_html__('Container display ?', 'nt-agricom' ),
		'param_name'  	=> 'nt_agricom_container_display',
		'description' 	=> esc_html__('You can select show or hide container for grid element', 'nt-agricom'),
		'group' 		=> esc_html__('Responsive Extra','nt-agricom'),
		'value'       	=> array(
			esc_html__('Select options', 'nt-agricom' )	=> '',
			esc_html__('Show', 	'nt-agricom' )	=> 'show',
			esc_html__('Hide', 	'nt-agricom' )	=> 'hide',
		),
	),
	array(
		'type' 			=> 'css_editor',
		'heading' 		=> esc_html__( 'Max width 992px resolution', 'nt-agricom' ),
		'param_name' 	=> 'nt_agricom_vc_row_992_responsive',
		'description' 	=> esc_html__( 'These options for 992px resolution - responsive medya', 'nt-agricom' ),
		'group' 		=> esc_html__('Responsive Extra','nt-agricom'),
	),
	array(
		'type' 			=> 'css_editor',
		'heading' 		=> esc_html__( 'Max width 768px resolution', 'nt-agricom' ),
		'param_name' 	=> 'nt_agricom_vc_row_768_responsive',
		'description' 	=> esc_html__( 'These options for 768px resolution - responsive medya', 'nt-agricom' ),
		'group' 		=> esc_html__('Responsive Extra','nt-agricom'),
	),
	array(
		'type' 			=> 'css_editor',
		'heading' 		=> esc_html__( 'Max width 480px resolution', 'nt-agricom' ),
		'param_name' 	=> 'nt_agricom_vc_row_480_responsive',
		'description' 	=> esc_html__( 'These options for 480px resolution - responsive medya', 'nt-agricom' ),
		'group' 		=> esc_html__('Responsive Extra','nt-agricom'),
	),

);
vc_add_params( 'vc_row', $nt_agricom_vc_row_responsive_attributes );


//FOR ROW EXTRA 3 OVERLAY ATTR
$nt_agricom_row_overlay_attributes = array(

		//OVERLAY 1
		array(
			'type'			=> 'colorpicker',
			'heading'		=> esc_html__('Overlay Color', 'nt-agricom'),
			'param_name'	=> 'overlaybg',
			'description'	=> esc_html__('Add color.', 'nt-agricom'),
			'group' 		=> esc_html__('Overlay 1','nt-agricom'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Width', 'nt-agricom'),
			'param_name'	=> 'overlaywidth',
			'description'	=> esc_html__('Add width.example:100% or 75%....etc.', 'nt-agricom'),
			'group' 		=> esc_html__('Overlay 1','nt-agricom'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Height', 'nt-agricom'),
			'param_name'	=> 'overlayheight',
			'description'	=> esc_html__('Add width.example:100% or 75%....etc.', 'nt-agricom'),
			'group' 		=> esc_html__('Overlay 1','nt-agricom'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Top offset', 'nt-agricom'),
			'param_name'	=> 'overlaytop',
			'description'	=> esc_html__('Add Top offset for top position.example:10px or 10%.', 'nt-agricom'),
			'group' 		=> esc_html__('Overlay 1','nt-agricom'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Left offset', 'nt-agricom'),
			'param_name'	=> 'overlayleft',
			'description'	=> esc_html__('Add left offset for left position.example:10px or 10%.', 'nt-agricom'),
			'group' 		=> esc_html__('Overlay 1','nt-agricom'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Right offset', 'nt-agricom'),
			'param_name'	=> 'overlayright',
			'description'	=> esc_html__('Add right offset for right position.example:10px or 10%.', 'nt-agricom'),
			'group' 		=> esc_html__('Overlay 1','nt-agricom'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Bottom offset', 'nt-agricom'),
			'param_name'	=> 'overlaybottom',
			'description'	=> esc_html__('Add bottom offset for bottom position.example:10px or 10%.', 'nt-agricom'),
			'group' 		=> esc_html__('Overlay 1','nt-agricom'),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__('Display under 992px', 'nt-agricom' ),
			'param_name'	=> 'overlay992',
			'description'	=> esc_html__('You can select show or hide overlay and underlay color maximum device width 992px', 'nt-agricom' ),
			'group' 	  	=> esc_html__('Overlay 1', 'nt-agricom' ),
			'value'			=> array(
				esc_html__('Select position', 'nt-agricom' )	=> '',
				esc_html__('Show', 	'nt-agricom' )	=> 'show',
				esc_html__('Hide', 	'nt-agricom' )	=> 'hide',
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__('Display under 768px', 'nt-agricom' ),
			'param_name'	=> 'overlay768',
			'description'	=> esc_html__('You can select show or hide overlay and underlay color maximum device width 768px', 'nt-agricom' ),
			'group' 	  	=> esc_html__('Overlay 1', 'nt-agricom' ),
			'value'			=> array(
				esc_html__('Select position', 'nt-agricom' )	=> '',
				esc_html__('Show', 	'nt-agricom' )	=> 'show',
				esc_html__('Hide', 	'nt-agricom' )	=> 'hide',
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__('Display under 480px', 'nt-agricom' ),
			'param_name'	=> 'overlay480',
			'description'	=> esc_html__('You can select show or hide overlay and underlay color maximum device width 480px', 'nt-agricom' ),
			'group' 	  	=> esc_html__('Overlay 1', 'nt-agricom' ),
			'value'			=> array(
				esc_html__('Select position', 'nt-agricom' )	=> '',
				esc_html__('Show', 	'nt-agricom' )	=> 'show',
				esc_html__('Hide', 	'nt-agricom' )	=> 'hide',
			),
		),
		//OVERLAY 2
		array(
			'type'			=> 'colorpicker',
			'heading'		=> esc_html__('Overlay Color', 'nt-agricom'),
			'param_name'	=> 'overlaybg2',
			'description'	=> esc_html__('Add color.', 'nt-agricom'),
			'group' 		=> esc_html__('Overlay 2','nt-agricom'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Width', 'nt-agricom'),
			'param_name'	=> 'overlaywidth2',
			'description'	=> esc_html__('Add width.example:100% or 75%....etc.', 'nt-agricom'),
			'group' 		=> esc_html__('Overlay 2','nt-agricom'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Height', 'nt-agricom'),
			'param_name'	=> 'overlayheight2',
			'description'	=> esc_html__('Add width.example:100% or 75%....etc.', 'nt-agricom'),
			'group' 		=> esc_html__('Overlay 2','nt-agricom'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Top offset', 'nt-agricom'),
			'param_name'	=> 'overlaytop2',
			'description'	=> esc_html__('Add Top offset for top position.example:10px or 10%.', 'nt-agricom'),
			'group' 		=> esc_html__('Overlay 2','nt-agricom'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Left offset', 'nt-agricom'),
			'param_name'	=> 'overlayleft2',
			'description'	=> esc_html__('Add left offset for left position.example:10px or 10%.', 'nt-agricom'),
			'group' 		=> esc_html__('Overlay 2','nt-agricom'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Right offset', 'nt-agricom'),
			'param_name'	=> 'overlayright2',
			'description'	=> esc_html__('Add right offset for right position.example:10px or 10%.', 'nt-agricom'),
			'group' 		=> esc_html__('Overlay 2','nt-agricom'),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__('Bottom offset', 'nt-agricom'),
			'param_name'	=> 'overlaybottom2',
			'description'	=> esc_html__('Add bottom offset for bottom position.example:10px or 10%.', 'nt-agricom'),
			'group' 		=> esc_html__('Overlay 2','nt-agricom'),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__('Display under 992px', 'nt-agricom' ),
			'param_name'	=> 'overlay2_992',
			'description'	=> esc_html__('You can select show or hide overlay and underlay color maximum device width 992px', 'nt-agricom' ),
			'group' 	  	=> esc_html__('Overlay 2', 'nt-agricom' ),
			'value'			=> array(
				esc_html__('Select position', 'nt-agricom' )	=> '',
				esc_html__('Show', 	'nt-agricom' )	=> 'show',
				esc_html__('Hide', 	'nt-agricom' )	=> 'hide',
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__('Display under 768px', 'nt-agricom' ),
			'param_name'	=> 'overlay2_768',
			'description'	=> esc_html__('You can select show or hide overlay and underlay color maximum device width 768px', 'nt-agricom' ),
			'group' 	  	=> esc_html__('Overlay 2', 'nt-agricom' ),
			'value'			=> array(
				esc_html__('Select position', 'nt-agricom' )	=> '',
				esc_html__('Show', 	'nt-agricom' )	=> 'show',
				esc_html__('Hide', 	'nt-agricom' )	=> 'hide',
			),
		),
		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__('Display under 480px', 'nt-agricom' ),
			'param_name'	=> 'overlay2_480',
			'description'	=> esc_html__('You can select show or hide overlay and underlay color maximum device width 480px', 'nt-agricom' ),
			'group' 	  	=> esc_html__('Overlay 2', 'nt-agricom' ),
			'value'			=> array(
				esc_html__('Select position', 'nt-agricom' )	=> '',
				esc_html__('Show', 	'nt-agricom' )	=> 'show',
				esc_html__('Hide', 	'nt-agricom' )	=> 'hide',
			),
		),


);
vc_add_params( 'vc_row', $nt_agricom_row_overlay_attributes );

//FOR COLUMN
$nt_agricom_vc_column_responsive_attributes = array(

	array(
		'type' 			=> 'css_editor',
		'heading' 		=> esc_html__( 'Max width 992px resolution', 'nt-agricom' ),
		'param_name' 	=> 'nt_agricom_vc_column_992',
		'description' 	=> esc_html__( 'These options for 992px resolution - responsive medya', 'nt-agricom' ),
		'group' 		=> esc_html__('Responsive Extra','nt-agricom'),
	),
	array(
		'type' 			=> 'css_editor',
		'heading' 		=> esc_html__( 'Max width 768px resolution', 'nt-agricom' ),
		'param_name' 	=> 'nt_agricom_vc_column_768',
		'description' 	=> esc_html__( 'These options for 768px resolution - responsive medya', 'nt-agricom' ),
		'group' 		=> esc_html__('Responsive Extra','nt-agricom'),
	),
	array(
		'type' 			=> 'css_editor',
		'heading' 		=> esc_html__( 'Max width 480px resolution', 'nt-agricom' ),
		'param_name' 	=> 'nt_agricom_vc_column_480',
		'description' 	=> esc_html__( 'These options for 480px resolution - responsive medya', 'nt-agricom' ),
		'group' 		=> esc_html__('Responsive Extra','nt-agricom'),
	),

);
vc_add_params( 'vc_column', $nt_agricom_vc_column_responsive_attributes );

//FOR COLUMN INNER
$nt_agricom_vc_column_inner_responsive_attributes = array(

	array(
		'type' 			=> 'css_editor',
		'heading' 		=> esc_html__( 'Max width 992px resolution', 'nt-agricom' ),
		'param_name' 	=> 'nt_agricom_vc_colinner_992',
		'description' 	=> esc_html__( 'These options for 992px resolution - responsive medya', 'nt-agricom' ),
		'group' 		=> esc_html__('Responsive Extra','nt-agricom'),
	),
	array(
		'type' 			=> 'css_editor',
		'heading' 		=> esc_html__( 'Max width 768px resolution', 'nt-agricom' ),
		'param_name' 	=> 'nt_agricom_vc_colinner_768',
		'description' 	=> esc_html__( 'These options for 768px resolution - responsive medya', 'nt-agricom' ),
		'group' 		=> esc_html__('Responsive Extra','nt-agricom'),
	),
	array(
		'type' 			=> 'css_editor',
		'heading' 		=> esc_html__( 'Max width 480px resolution', 'nt-agricom' ),
		'param_name' 	=> 'nt_agricom_vc_colinner_480',
		'description' 	=> esc_html__( 'These options for 480px resolution - responsive medya', 'nt-agricom' ),
		'group' 		=> esc_html__('Responsive Extra','nt-agricom'),
	),

);
vc_add_params( 'vc_column_inner', $nt_agricom_vc_column_inner_responsive_attributes );

/*-----------------------------------------------------------------------------------*/
/*	HERO SLIDER 1 agricom
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Agricom_heroslider_integrateWithVC' );
function NT_Agricom_heroslider_integrateWithVC() {
   vc_map( array(
		'name' 	     => esc_html__( 'Hero Slider', 'nt-agricom' ),
		'base' 	   	 => 'nt_agricom_section_heroslider',
		'category'   => esc_html__( 'NT Agricom', 'nt-agricom'),
		'params'     => array(

			array(
				'type' 		  => 'attach_image',
				'heading' 	  => esc_html__('BG image overlay', 'nt-agricom'),
				'param_name'  => 'overlayimg',
				'description' => esc_html__('Add background image overlay', 'nt-agricom'),
			),
			array(
                'type' => 'checkbox',
                'param_name' => 'hidenav',
                'heading' => esc_html__('Hide prev/next button?', 'nt-agricom'),
                'value' => array( esc_html__('Yes', 'nt-agricom') => 'yes' ),
            ),
			array(
				'type' => 'checkbox',
				'param_name' => 'useicon',
				'heading' => esc_html__('Use arrow icon?', 'nt-agricom'),
				'value' => array( esc_html__('Yes', 'nt-agricom') => 'yes' ),
				'dependency' 	=> array(
					'element' 	=> 'hidenav',
					'is_empty'  => true
				)
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Icon type', 'nt-agricom' ),
				'param_name'	=> 'icontype',
				'description'	=> esc_html__('You can select prev next button icon type', 'nt-agricom' ),
				'edit_field_class' => 'vc_col-sm-6',
				'value'			=> array(
					esc_html__('Select a option',  'nt-agricom' )	=> '',
					esc_html__('Arrow', 'nt-agricom' )	=> 'arrow',
					esc_html__('Chevron', 'nt-agricom' )	=> 'chevron',
					esc_html__('Angle', 'nt-agricom' )	=> 'angle',
				),
				'dependency' 	=> array(
					'element' 	=> 'useicon',
					'not_empty'  => true
				)
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Icon size', 'nt-agricom' ),
				'param_name'	=> 'iconsize',
				'description'	=> esc_html__('You can select prev next button icon size', 'nt-agricom' ),
				'edit_field_class' => 'vc_col-sm-6',
				'value'			=> array(
					esc_html__('Select a option',  'nt-agricom' )	=> '',
					esc_html__('1x', 'nt-agricom' )	=> 'fa-1x',
					esc_html__('2x', 'nt-agricom' )	=> 'fa-2x',
					esc_html__('3x', 'nt-agricom' )	=> 'fa-3x',
					esc_html__('4x', 'nt-agricom' )	=> 'fa-4x',
				),
				'dependency' 	=> array(
					'element' 	=> 'useicon',
					'not_empty'  => true
				)
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Icon style', 'nt-agricom' ),
				'param_name'	=> 'iconstyle',
				'description'	=> esc_html__('You can select prev next button icon style', 'nt-agricom' ),
				'edit_field_class' => 'vc_col-sm-6',
				'value'			=> array(
					esc_html__('Select a option',  'nt-agricom' )	=> '',
					esc_html__('default', 'nt-agricom' )	=> 'arrow',
					esc_html__('Cirle', 'nt-agricom' )	=> 'circle',
					esc_html__('Cirle bordered', 'nt-agricom' )	=> 'circle-bordered',
					esc_html__('Square', 'nt-agricom' )	=> 'square',
					esc_html__('Square bordered', 'nt-agricom' )	=> 'square-bordered',
				),
				'dependency' 	=> array(
					'element' 	=> 'useicon',
					'not_empty'  => true
				)
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Icon side space', 'nt-agricom' ),
				'param_name'	=> 'iconspace',
				'description'	=> esc_html__('You can select prev next button icon spacing', 'nt-agricom' ),
				'edit_field_class' => 'vc_col-sm-6',
				'value'			=> array(
					esc_html__('Select a option',  'nt-agricom' )	=> '',
					esc_html__('none', 'nt-agricom' )	=> 'space-none',
					esc_html__('5px', 'nt-agricom' )	=> 'space-5',
					esc_html__('10px', 'nt-agricom' )	=> 'space-10',
					esc_html__('15px', 'nt-agricom' )	=> 'space-15',
					esc_html__('20px', 'nt-agricom' )	=> 'space-20',
					esc_html__('25px', 'nt-agricom' )	=> 'space-25',
					esc_html__('30px', 'nt-agricom' )	=> 'space-30',
					esc_html__('40px', 'nt-agricom' )	=> 'space-40',
					esc_html__('50px', 'nt-agricom' )	=> 'space-50',
					esc_html__('60px', 'nt-agricom' )	=> 'space-60',
					esc_html__('70px', 'nt-agricom' )	=> 'space-70',
					esc_html__('80px', 'nt-agricom' )	=> 'space-80',
					esc_html__('90px', 'nt-agricom' )	=> 'space-90',
					esc_html__('100px', 'nt-agricom' )	=> 'space-100',
				),
				'dependency' 	=> array(
					'element' 	=> 'useicon',
					'not_empty'  => true
				)
			),
			array(
				'type' 		  => 'textfield',
				'heading'     => esc_html__('Slider next button text', 'nt-agricom' ),
				'param_name'  => 'next',
				'description' => esc_html__('You can add your text for next button', 'nt-agricom'),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency' 	=> array(
					'element' 	=> 'hidenav',
					'is_empty'  => true
				)
			),
			array(
				'type' 		  => 'textfield',
				'heading'     => esc_html__('Slider prev button text', 'nt-agricom' ),
				'param_name'  => 'prev',
				'description' => esc_html__('You can add your text for prev button', 'nt-agricom'),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency' 	=> array(
					'element' 	=> 'hidenav',
					'is_empty'  => true
				)
			),
			array(
                'type' => 'checkbox',
                'param_name' => 'hidedots',
                'heading' => esc_html__('Hide dots?', 'nt-agricom'),
                'value' => array( esc_html__('Yes', 'nt-agricom') => 'yes' ),
				'edit_field_class' => 'vc_col-sm-6',
            ),
			array(
                'type' => 'checkbox',
                'param_name' => 'hideautoplay',
                'heading' => esc_html__('Disable Autoplay?', 'nt-agricom'),
                'value' => array( esc_html__('Yes', 'nt-agricom') => 'yes' ),
                'edit_field_class' => 'vc_col-sm-6',
            ),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Animation Delay', 'nt-agricom'),
				'param_name'	=> 'delay',
				'description'	=> esc_html__('Please add animation delay.1s=1000 sample=1000', 'nt-agricom'),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Duration', 'nt-agricom'),
				'param_name'	=> 'duration',
				'description'	=> esc_html__('Please add slide item duration.Default 4000', 'nt-agricom'),
				'edit_field_class' => 'vc_col-sm-6',
			),
			array(
				'type'        => 'param_group',
				'heading'     => esc_html__('Slider items', 'nt-agricom' ),
				'param_name'  => 'sloop',
				'group' 	  => esc_html__('Slider', 'nt-agricom' ),
				'params' 	  => array(
					array(
						'type' 		  	=> 'attach_image',
						'heading' 	  	=> esc_html__('BG image', 'nt-agricom'),
						'param_name'  	=> 'img',
						'description' 	=> esc_html__('Add your background image', 'nt-agricom'),
						 'edit_field_class' => 'vc_col-sm-8',
					),
					array(
		                'type' => 'checkbox',
		                'param_name' => 'usevideo',
		                'heading' => esc_html__('Use local video?', 'nt-agricom'),
		                'value' => array( esc_html__('Yes', 'nt-agricom') => 'yes' ),
		                'edit_field_class' => 'vc_col-sm-4',
		            ),
					array(
		                'type' => 'textfield',
		                'param_name' => 'vurl',
		                'heading' => esc_html__('Video URL?', 'nt-agricom'),
		                'value' => array( esc_html__('Yes', 'nt-agricom') => 'yes' ),
		                'edit_field_class' => 'vc_col-sm-8',
						'dependency' 	=> array(
							'element' 	=> 'usevideo',
							'not_empty'   =>  true
						)
		            ),
					array(
		                'type' => 'checkbox',
		                'param_name' => 'mute',
		                'heading' => esc_html__('Mute?', 'nt-agricom'),
		                'value' => array( esc_html__('Yes', 'nt-agricom') => 'yes' ),
		                'std' => 'yes',
		                'edit_field_class' => 'vc_col-sm-4',
						'dependency' 	=> array(
							'element' 	=> 'usevideo',
							'not_empty'   =>  true
						)
		            ),
					array(
						'type'			=> 'dropdown',
						'heading'		=> esc_html__('Transition type', 'nt-agricom' ),
						'param_name'	=> 'transition',
						'description'	=> esc_html__('Select slide item transition type.', 'nt-agricom' ),
						'edit_field_class' => 'vc_col-sm-6',
						'value'			=> array(
							esc_html__('Select a option',  'nt-agricom' )	=> '',
							esc_html__('fade', 'nt-agricom' )	    => 'fade',
							esc_html__('fade2', 'nt-agricom' )	    => 'fade2',
							esc_html__('slideLeft', 'nt-agricom' )	=> 'slideLeft',
							esc_html__('slideLeft2', 'nt-agricom' )	=> 'slideLeft2',
							esc_html__('slideRight', 'nt-agricom' )	=> 'slideRight',
							esc_html__('slideRight2', 'nt-agricom' )=> 'slideRight2',
							esc_html__('slideUp', 'nt-agricom' )	=> 'slideUp',
							esc_html__('slideUp2', 'nt-agricom' )	=> 'slideUp2',
							esc_html__('slideDown', 'nt-agricom' )	=> 'slideDown',
							esc_html__('slideDown2', 'nt-agricom' )	=> 'slideDown2',
							esc_html__('zoomIn', 'nt-agricom' )	    => 'zoomIn',
							esc_html__('zoomIn2', 'nt-agricom' )	=> 'zoomIn2',
							esc_html__('zoomOut', 'nt-agricom' )	=> 'zoomOut',
							esc_html__('zoomOut2', 'nt-agricom' )	=> 'zoomOut2',
							esc_html__('swirlLeft', 'nt-agricom' )	=> 'swirlLeft',
							esc_html__('swirlLeft2', 'nt-agricom' )	=> 'swirlLeft2',
							esc_html__('swirlRight', 'nt-agricom' )	=> 'swirlRight',
							esc_html__('swirlRight2', 'nt-agricom' )=> 'swirlRight2',
							esc_html__('burn', 'nt-agricom' )	    => 'burn',
							esc_html__('burn2', 'nt-agricom' )	    => 'burn2',
							esc_html__('blur', 'nt-agricom' )	    => 'blur',
							esc_html__('blur2', 'nt-agricom' )	    => 'blur2',
							esc_html__('flash', 'nt-agricom' )	    => 'flash',
							esc_html__('flash2', 'nt-agricom' )	    => 'flash2',
						)
					),
					array(
						'type'			=> 'dropdown',
						'heading'		=> esc_html__('Container type', 'nt-agricom' ),
						'param_name'	=> 'container',
						'description'	=> esc_html__('You can select layer aligment', 'nt-agricom' ),
						'edit_field_class' => 'vc_col-sm-6',
						'value'			=> array(
							esc_html__('Select a option',  'nt-agricom' )	=> '',
							esc_html__('default', 	'nt-agricom' )	=> 'container',
							esc_html__('container fluid', 'nt-agricom' )	=> 'container-fluid',
						)
					),
					array(
						'type'			=> 'dropdown',
						'heading'		=> esc_html__('Layer horizontal aligment', 'nt-agricom' ),
						'param_name'	=> 'talign',
						'description'	=> esc_html__('You can select layer aligment', 'nt-agricom' ),
						'edit_field_class' => 'vc_col-sm-6',
						'value'			=> array(
							esc_html__('Select a option',  'nt-agricom' )	=> '',
							esc_html__('Left', 	'nt-agricom' )	=> 'left',
							esc_html__('Center', 'nt-agricom' )	=> 'text-center',
							esc_html__('Right', 'nt-agricom' )	=> 'text-right',
						)
					),
					array(
						'type'			=> 'dropdown',
						'heading'		=> esc_html__('Layer vertical aligment', 'nt-agricom' ),
						'param_name'	=> 'valign',
						'description'	=> esc_html__('You can select layer aligment', 'nt-agricom' ),
						'edit_field_class' => 'vc_col-sm-6',
						'value'			=> array(
							esc_html__('Select a option',  'nt-agricom' )	=> '',
							esc_html__('center', 	'nt-agricom' )	=> 'v-middle',
							esc_html__('top', 'nt-agricom' )	=> 'v-top',
							esc_html__('bottom', 'nt-agricom' )	=> 'v-bottom',
						)
					),
					array(
						'type'			=> 'dropdown',
						'heading'		=> esc_html__('XL Column Width', 'nt-agricom' ),
						'param_name'	=> 'xlcol',
						'description'	=> esc_html__('XL:min-device width: 1200px.Default column width is 8.', 'nt-agricom' ),
						'edit_field_class' => 'vc_col-sm-6',
						'value'			=> array(
							esc_html__('Select a option',  'nt-agricom' )	=> '',
							esc_html__('12', 	'nt-agricom' )	=> '12',
							esc_html__('11', 'nt-agricom' )	=> '11',
							esc_html__('10', 'nt-agricom' )	=> '10',
							esc_html__('9', 'nt-agricom' )	=> '9',
							esc_html__('8', 'nt-agricom' )	=> '8',
							esc_html__('7', 'nt-agricom' )	=> '7',
							esc_html__('6', 'nt-agricom' )	=> '6',
						)
					),
					array(
						'type'			=> 'dropdown',
						'heading'		=> esc_html__('LG Column Width', 'nt-agricom' ),
						'param_name'	=> 'lgcol',
						'description'	=> esc_html__('LG:min-device width: 992px.Default column width is 10.', 'nt-agricom' ),
						'edit_field_class' => 'vc_col-sm-6',
						'value'			=> array(
							esc_html__('Select a option',  'nt-agricom' )	=> '',
							esc_html__('12', 'nt-agricom' )	=> '12',
							esc_html__('11', 'nt-agricom' )	=> '11',
							esc_html__('10', 'nt-agricom' )	=> '10',
							esc_html__('9', 'nt-agricom' )	=> '9',
							esc_html__('8', 'nt-agricom' )	=> '8',
							esc_html__('7', 'nt-agricom' )	=> '7',
							esc_html__('6', 'nt-agricom' )	=> '6',
						)
					),
					array(
						'type'        => 'param_group',
						'heading'     => esc_html__('Slider layer', 'nt-agricom' ),
						'param_name'  => 'layerloop',
						'params' 	  => array(
							array(
								'type'			=> 'dropdown',
								'heading'		=> esc_html__('Layer type', 'nt-agricom' ),
								'param_name'	=> 'layer',
								'description'	=> esc_html__('You can select layer type', 'nt-agricom' ),
								'group' 	    => esc_html__('Slider', 'nt-agricom' ),
								'value'			=> array(
									esc_html__('Select layer',  'nt-agricom' )	=> '',
									esc_html__('Title', 		'nt-agricom' )	=> 'title',
									esc_html__('Subtitle', 		'nt-agricom' )	=> 'subtitle',
									esc_html__('Text paragraph','nt-agricom' )	=> 'text',
									esc_html__('Button', 		'nt-agricom' )	=> 'button',
								),
							),

							array(
								'type' 			  => 'textarea',
								'heading' 		  => esc_html__('Slider Title', 'nt-agricom'),
								'param_name' 	  => 'title',
								'description' 	  => esc_html__('Add slider title for item.', 'nt-agricom'),
								'dependency' 	=> array(
										'element' 	=> 'layer',
										'value'   	=>  array('title','subtitle','text')
								)
							),
							array(
								'type'			=> 'textfield',
								'heading'		=> esc_html__('Font-size', 'nt-agricom'),
								'param_name'	=> 'tsize',
								'description'	=> esc_html__('Change layer fontsize.Use simple number without ( px or unit )', 'nt-agricom'),
								'edit_field_class' => 'vc_col-sm-4',
								'dependency' 	=> array(
									'element' 	=> 'layer',
									'value'   	=>  array('title','subtitle','text')
								)
							),
							array(
								'type'			=> 'textfield',
								'heading'		=> esc_html__('Line-height', 'nt-agricom'),
								'param_name'	=> 'tlineh',
								'description'	=> esc_html__('Change layer line-height.Use simple number without ( px or unit )', 'nt-agricom'),
								'edit_field_class' => 'vc_col-sm-4',
								'dependency' 	=> array(
									'element' 	=> 'layer',
									'value'   	=>  array('title','subtitle','text')
								)
							),
							array(
								'type'			=> 'colorpicker',
								'heading'		=> esc_html__('Color', 'nt-agricom'),
								'param_name'	=> 'tcolor',
								'description'	=> esc_html__('Change layer color.', 'nt-agricom'),
								'edit_field_class' => 'vc_col-sm-4',
								'dependency' 	=> array(
									'element' 	=> 'layer',
									'value'   	=>  array('title','subtitle','text')
								)
							),
							array(
				                'type' => 'dropdown',
				                'heading' => esc_html__('Layer tag', 'agro'),
				                'param_name' => 'htag',
				                'value' => array(
				                    esc_html__('Select tag', 'agro') => '',
				                    esc_html__('h1', 'agro') => 'h1',
				                    esc_html__('h2', 'agro') => 'h2',
				                    esc_html__('h3', 'agro') => 'h3',
				                    esc_html__('h4', 'agro') => 'h4',
				                    esc_html__('h5', 'agro') => 'h5',
				                    esc_html__('h6', 'agro') => 'h6',
				                    esc_html__('div', 'agro') => 'div',
				                    esc_html__('p', 'agro') => 'p',
				                    esc_html__('span', 'agro') => 'span'
				                ),
								'dependency' 	=> array(
									'element' 	=> 'layer',
									'value'   	=>  array('title','subtitle','text')
								)
				            ),
						
							array(
				                'type' => 'checkbox',
				                'param_name' => 'usefontss',
				                'heading' => esc_html__('Use Google Fonts?', 'agro'),
				                'value' => array( esc_html__('Yes', 'agro') => 'yes' ),
								'std' => 'no',
								'dependency' 	=> array(
									'element' 	=> 'layer',
									'value'   	=>  array('title','subtitle','text')
								)
				            ),
							
							array(
				                'type' => 'google_fonts',
				                'param_name' => 'google_fonts',
				                'value' => '',
				                'settings' => array(
				                    'fields' => array(
				                        'font_family_description' => esc_html__( 'Select font family.', 'agro' ),
				                        'font_style_description' => esc_html__( 'Select font styling.', 'agro' )
				                    )
				                ),
				                'dependency' => array(
				                    'element' => 'usefontss',
				                    'not_empty' => true
				                )
				            ),
						
							//button
							array(
								'type'          => 'vc_link',
								'heading'       => esc_html__('Button (Link)', 'nt-agricom' ),
								'param_name'    => 'link',
								'description'   => esc_html__('Add custom link.', 'nt-agricom' ),
								'dependency' 	=> array(
									'element' 	=> 'layer',
									'value'   	=> 'button'
								)
							),
							array(
								'type'			=> 'dropdown',
								'heading'		=> esc_html__('Button style', 'nt-agricom' ),
								'param_name'	=> 'btnstyle',
								'description'	=> esc_html__('You can select button style', 'nt-agricom' ),
								'edit_field_class' => 'vc_col-sm-6',
								'value'			=> array(
									esc_html__('Select option', 'nt-agricom' )	=> '',
									esc_html__('Default button', 	'nt-agricom' )	=> 'btn-default',
									esc_html__('Primary button', 	'nt-agricom' )	=> 'primary',
								),
								'dependency' 	=> array(
									'element' 	=> 'layer',
									'value'   	=> 'button'
								)
							),
							array(
								'type'			=> 'dropdown',
								'heading'		=> esc_html__('Button size', 'nt-agricom' ),
								'param_name'	=> 'btnsize',
								'description'	=> esc_html__('You can select button size', 'nt-agricom' ),
								'edit_field_class' => 'vc_col-sm-6',
								'value'			=> array(
									esc_html__('Select option', 'nt-agricom' )	=> '',
									esc_html__('Small', 'nt-agricom' )	=> 'small-btn',
									esc_html__('Big', 	'nt-agricom' )	=> 'big',
									esc_html__('Large', 'nt-agricom' )	=> 'long',
								),
								'dependency' 	=> array(
									'element' 	=> 'layer',
									'value'   	=> 'button'
								)
							),
							array(
								'type'			=> 'colorpicker',
								'heading'		=> esc_html__('Button BG color', 'nt-agricom'),
								'param_name'	=> 'btnbg',
								'description'	=> esc_html__('Change button background color.', 'nt-agricom'),
								'edit_field_class' => 'vc_col-sm-4',
								'dependency' 	=> array(
									'element' 	=> 'layer',
									'value'   	=> 'button'
								)
							),
							array(
								'type'			=> 'colorpicker',
								'heading'		=> esc_html__('Button title color', 'nt-agricom'),
								'param_name'	=> 'btncolor',
								'description'	=> esc_html__('Change button title color.', 'nt-agricom'),
								'edit_field_class' => 'vc_col-sm-4',
								'dependency' 	=> array(
									'element' 	=> 'layer',
									'value'   	=> 'button'
								)
							),
							array(
								'type'			=> 'colorpicker',
								'heading'		=> esc_html__('Button border color', 'nt-agricom'),
								'param_name'	=> 'btnborder',
								'description'	=> esc_html__('Change button border color.', 'nt-agricom'),
								'edit_field_class' => 'vc_col-sm-4',
								'dependency' 	=> array(
									'element' 	=> 'layer',
									'value'   	=> 'button'
								)
							)
						)
					) // param_group layerloop end
				)
			), // param_group sloop end
		)
	));
} class NT_Agricom_section_heroslider extends WPBakeryShortCode {}

/*-----------------------------------------------------------------------------------*/
/*	HERO SLIDER 2 agricom
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Agricom_heroslider2_integrateWithVC' );
function NT_Agricom_heroslider2_integrateWithVC() {
	vc_map( array(
		'name'		=> esc_html__( 'Hero slider 2', 'nt-agricom' ),
		'base'		=> 'nt_agricom_section_heroslider2',
		'category'	=> esc_html__( 'NT Agricom', 'nt-agricom'),
		'params'	=> array(

			//heroslider2 loop
			array(
				'type'        => 'param_group',
				'heading'     => esc_html__('Slider items', 'nt-agricom' ),
				'param_name'  => 'sliderloop',
				'group' 	  => esc_html__('Slider', 'nt-agricom' ),
				'params' 	  => array(
					array(
						'type' 		  	=> 'attach_image',
						'heading' 	  	=> esc_html__('Slider image', 'nt-agricom'),
						'param_name'  	=> 'img',
						'description' 	=> esc_html__('Add your slider image', 'nt-agricom'),
					),
					array(
						'type' 		  	=> 'attach_image',
						'heading' 	  	=> esc_html__('Logo image', 'nt-agricom'),
						'param_name'  	=> 'logo',
						'description' 	=> esc_html__('Add your logo image', 'nt-agricom'),
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__('Logo image width', 'nt-agricom'),
						'param_name'	=> 'imgwidth',
						'description'	=> esc_html__('Add logo image width.use simple number without ( px or unit ).example: 140', 'nt-agricom'),
						'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__('Logo image height', 'nt-agricom'),
						'param_name'	=> 'imgheight',
						'description'	=> esc_html__('Add logo image height.use simple number without ( px or unit ).example: 80', 'nt-agricom'),
						'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
					),
				)
			),

			// BG style
			array(
				'type'          => 'css_editor',
				'heading'       => esc_html__('Background CSS', 'nt-agricom' ),
				'param_name'    => 'bgcss',
				'group' 	    => esc_html__('Background options', 'nt-agricom' ),
			),
		)
	));
} class NT_Agricom_section_heroslider2 extends WPBakeryShortCode {}

/*-----------------------------------------------------------------------------------*/
/*	FEATURES agricom
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Agricom_features_integrateWithVC' );
function NT_Agricom_features_integrateWithVC() {
	vc_map( array(
		'name'		=> esc_html__( 'Features Icon', 'nt-agricom' ),
		'base'		=> 'nt_agricom_section_features',
		'category'	=> esc_html__( 'NT Agricom', 'nt-agricom'),
		'params'	=> array(
			//heading
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Heading', 'nt-agricom' ),
				'param_name'    => 'heading',
				'description'   => esc_html__('Add heading for this section', 'nt-agricom'),
			),
			array(
				'type' 		  	=> 'attach_image',
				'heading' 	  	=> esc_html__('Center image', 'nt-agricom'),
				'param_name'  	=> 'centerimg',
				'description' 	=> esc_html__('Add center image', 'nt-agricom'),
			),
			//Services two loop
			array(
				'type'        => 'param_group',
				'heading'     => esc_html__('Features items', 'nt-agricom' ),
				'param_name'  => 'floop',
				'group' 	  => esc_html__('Features', 'nt-agricom' ),
				'params' 	  => array(
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Item icon type', 'nt-agricom' ),
						'param_name'  => 'icontype',
						'description' => esc_html__('You can select icon type as image or fonticon', 'nt-agricom' ),
						'value'       => array(
							esc_html__('Select icon type', 	'nt-agricom' )	=> '',
							esc_html__('Font icon', 	'nt-agricom' )	=> 'iconfont',
							esc_html__('Image icon', 	'nt-agricom' )	=> 'imgicon',
						),
					),
					array(
						'type' 			  => 'textfield',
						'heading' 		  => esc_html__('Fonticon name', 'nt-agricom'),
						'param_name' 	  => 'fonticon',
						'description' 	  => esc_html__('Add icon name(fonticon class name). example : fa fa-facebook', 'nt-agricom'),
						'dependency' 	=> array(
							'element' 	=> 'icontype',
							'value'   	=> 'iconfont'
						)
					),
					array(
						'type' 		  	=> 'attach_image',
						'heading' 	  	=> esc_html__('image icon', 'nt-agricom'),
						'param_name'  	=> 'iconimg',
						'description' 	=> esc_html__('Add image icon', 'nt-agricom'),
						'dependency' 	=> array(
							'element' 	=> 'icontype',
							'value'   	=> 'imgicon'
						)
					),
					array(
						'type' 			  => 'textarea',
						'heading' 		  => esc_html__('Title', 'nt-agricom'),
						'param_name' 	  => 'title',
						'description' 	  => esc_html__('Add title for item.', 'nt-agricom'),
					),
				)
			),

			//custom style
			//heading
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Heading line-height', 'nt-agricom'),
				'param_name'	=> 'hlineh',
				'description'	=> esc_html__('Change section heading line-height.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Heading font-size', 'nt-agricom'),
				'param_name'	=> 'hsize',
				'description'	=> esc_html__('Change section heading fontsize.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Heading color', 'nt-agricom'),
				'param_name'	=> 'hcolor',
				'description'	=> esc_html__('Change section heading color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			//title
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Title font-size', 'nt-agricom'),
				'param_name'	=> 'tsize',
				'description'	=> esc_html__('Change item title fontsize.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Title line-height', 'nt-agricom'),
				'param_name'	=> 'tlineh',
				'description'	=> esc_html__('Change section title line-height.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Title color', 'nt-agricom'),
				'param_name'	=> 'tcolor',
				'description'	=> esc_html__('Change item title color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			//icon
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Icon font-size', 'nt-agricom'),
				'param_name'	=> 'isize',
				'description'	=> esc_html__('Change icon fontsize.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Icon color', 'nt-agricom'),
				'param_name'	=> 'icolor',
				'description'	=> esc_html__('Add icon color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			//bg style
			array(
				'type'			=> 'css_editor',
				'heading'		=> esc_html__('Background CSS', 'nt-agricom' ),
				'param_name'	=> 'bgcss',
				'group'			=> esc_html__('Background options', 'nt-agricom' ),
			),
		)
	));
} class NT_Agricom_section_features extends WPBakeryShortCode {}

/*-----------------------------------------------------------------------------------*/
/*	GALLERY NO PLUGIN agricom
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Agricom_simplegallery_integrateWithVC' );
function NT_Agricom_simplegallery_integrateWithVC() {
	vc_map( array(
		'name'		=> esc_html__( 'Gallery ( NO PLUGIN )', 'nt-agricom' ),
		'base'		=> 'nt_agricom_section_simplegallery',
		'category'	=> esc_html__( 'NT Agricom', 'nt-agricom'),
		'params'	=> array(
			//gallery simple loop
			array(
				'type'        => 'param_group',
				'heading'     => esc_html__('Gallery items', 'nt-agricom' ),
				'param_name'  => 'galloop',
				'group' 	  => esc_html__('Gallery', 'nt-agricom' ),
				'params' 	  => array(
               /*
            	array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Image width', 'nt-agricom' ),
						'param_name'  => 'itemwidth',
						'description' => esc_html__('You can select width each image for masonry gallery style', 'nt-agricom' ),
						'value'       => array(
							esc_html__('Select width image', 	'nt-agricom' )	=> '',
							esc_html__('Image 2x', 	'nt-agricom' )	=> '2',
							esc_html__('Image 4x', 	'nt-agricom' )	=> '4',
						),
					),
               */
					array(
						'type'        => 'dropdown',
						'heading'     => esc_html__('Image height', 'nt-agricom' ),
						'param_name'  => 'fullheight',
						'description' => esc_html__('You can select height each image for masonry gallery style', 'nt-agricom' ),
						'value'       => array(
							esc_html__('Select width image', 	'nt-agricom' )	=> '',
							esc_html__('Image 2x', 	'nt-agricom' )	=> '2',
							esc_html__('Image 4x', 	'nt-agricom' )	=> '1',
						),
					),
					array(
						'type' 		  	=> 'attach_image',
						'heading' 	  	=> esc_html__('Image', 'nt-agricom'),
						'param_name'  	=> 'itemimg',
						'description' 	=> esc_html__('Add image for gallery', 'nt-agricom'),

					),
					array(
						'type' 			  => 'textfield',
						'heading' 		  => esc_html__('Title', 'nt-agricom'),
						'param_name' 	  => 'title',
						'description' 	  => esc_html__('Add title for item.', 'nt-agricom'),
					),
					array(
						'type' 			  => 'textfield',
						'heading' 		  => esc_html__('Subtitle', 'nt-agricom'),
						'param_name' 	  => 'subtitle',
						'description' 	  => esc_html__('Add subtitle for item.', 'nt-agricom'),
					),
				)
			),

         //post column
         array(
            'type'			=> 'dropdown',
            'heading'		=> esc_html__('Item column size', 'nt-agricom' ),
            'param_name'	=> 'column',
            'group' 	  => esc_html__('Gallery', 'nt-agricom' ),
            'description'	=> esc_html__('You can select post column size', 'nt-agricom' ),
            'value'			=> array(
               esc_html__('Select column for all item', 	'nt-agricom' )	=> '',
               esc_html__('2 Column', 	'nt-agricom' )	=> 'col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6',
               esc_html__('3 Column', 	'nt-agricom' )	=> 'col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4',
               esc_html__('4 Column', 	'nt-agricom' )	=> 'col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3',
               esc_html__('Custom Column', 'nt-agricom' )=> 'custom',
            ),
         ),
         array(
            'type'			=> 'dropdown',
            'heading'		=> esc_html__('Phone Mobile column', 'nt-agricom' ),
            'param_name'	=> 'xscol',
            'description'	=> esc_html__('You can select phone mobile device column size', 'nt-agricom' ),
            'value'			=> array(
               esc_html__('Select small mobile column for all item', 	'nt-agricom' )	=> '',
               esc_html__('col-xs-1', 	'nt-agricom' )	=> 'col-xs-1',
               esc_html__('col-xs-2', 	'nt-agricom' )	=> 'col-xs-2',
               esc_html__('col-xs-3', 	'nt-agricom' )	=> 'col-xs-3',
               esc_html__('col-xs-4', 	'nt-agricom' )	=> 'col-xs-4',
               esc_html__('col-xs-5', 	'nt-agricom' )	=> 'col-xs-5',
               esc_html__('col-xs-6', 	'nt-agricom' )	=> 'col-xs-6',
               esc_html__('col-xs-7', 	'nt-agricom' )	=> 'col-xs-7',
               esc_html__('col-xs-8', 	'nt-agricom' )	=> 'col-xs-8',
               esc_html__('col-xs-9', 	'nt-agricom' )	=> 'col-xs-9',
               esc_html__('col-xs-10', 'nt-agricom' )	=> 'col-xs-10',
               esc_html__('col-xs-11', 'nt-agricom' )	=> 'col-xs-11',
               esc_html__('col-xs-12', 'nt-agricom' )	=> 'col-xs-12',
            ),
            'dependency' 	=> array(
                  'element' 	=> 'column',
                  'value'   	=> 'custom'
               )
         ),
         array(
            'type'			=> 'dropdown',
            'heading'		=> esc_html__('Tablet Mobile column', 'nt-agricom' ),
            'param_name'	=> 'smcol',
            'group' 	  => esc_html__('Gallery', 'nt-agricom' ),
            'description'	=> esc_html__('You can select tablet mobile device column size', 'nt-agricom' ),
            'value'			=> array(
               esc_html__('Select mobile column for all item', 	'nt-agricom' )	=> '',
               esc_html__('col-sm-1', 	'nt-agricom' )	=> 'col-sm-1',
               esc_html__('col-sm-2', 	'nt-agricom' )	=> 'col-sm-2',
               esc_html__('col-sm-3', 	'nt-agricom' )	=> 'col-sm-3',
               esc_html__('col-sm-4', 	'nt-agricom' )	=> 'col-sm-4',
               esc_html__('col-sm-5', 	'nt-agricom' )	=> 'col-sm-5',
               esc_html__('col-sm-6', 	'nt-agricom' )	=> 'col-sm-6',
               esc_html__('col-sm-7', 	'nt-agricom' )	=> 'col-sm-7',
               esc_html__('col-sm-8', 	'nt-agricom' )	=> 'col-sm-8',
               esc_html__('col-sm-9', 	'nt-agricom' )	=> 'col-sm-9',
               esc_html__('col-sm-10', 'nt-agricom' )	=> 'col-sm-10',
               esc_html__('col-sm-11', 'nt-agricom' )	=> 'col-sm-11',
               esc_html__('col-sm-12', 'nt-agricom' )	=> 'col-sm-12',
            ),
            'dependency' 	=> array(
                  'element' 	=> 'column',
                  'value'   	=> 'custom'
               )
         ),
         array(
            'type'			=> 'dropdown',
            'heading'		=> esc_html__('Desktop column', 'nt-agricom' ),
            'param_name'	=> 'mdcol',
            'group' 	  => esc_html__('Gallery', 'nt-agricom' ),
            'description'	=> esc_html__('You can select desktop column size', 'nt-agricom' ),
            'value'			=> array(
               esc_html__('Select desktop column for all item', 	'nt-agricom' )	=> '',
               esc_html__('col-md-1', 	'nt-agricom' )	=> 'col-md-1',
               esc_html__('col-md-2', 	'nt-agricom' )	=> 'col-md-2',
               esc_html__('col-md-3', 	'nt-agricom' )	=> 'col-md-3',
               esc_html__('col-md-4', 	'nt-agricom' )	=> 'col-md-4',
               esc_html__('col-md-5', 	'nt-agricom' )	=> 'col-md-5',
               esc_html__('col-md-6', 	'nt-agricom' )	=> 'col-md-6',
               esc_html__('col-md-7', 	'nt-agricom' )	=> 'col-md-7',
               esc_html__('col-md-8', 	'nt-agricom' )	=> 'col-md-8',
               esc_html__('col-md-9', 	'nt-agricom' )	=> 'col-md-9',
               esc_html__('col-md-10', 'nt-agricom' )	=> 'col-md-10',
               esc_html__('col-md-11', 'nt-agricom' )	=> 'col-md-11',
               esc_html__('col-md-12', 'nt-agricom' )	=> 'col-md-12',
            ),
            'dependency' 	=> array(
                  'element' 	=> 'column',
                  'value'   	=> 'custom'
            )
         ),
         array(
            'type'			=> 'dropdown',
            'heading'		=> esc_html__('Large device column', 'nt-agricom' ),
            'param_name'	=> 'mdcol',
            'group' 	  => esc_html__('Gallery', 'nt-agricom' ),
            'description'	=> esc_html__('You can select big large device column size', 'nt-agricom' ),
            'value'			=> array(
               esc_html__('Select large device column for all item', 	'nt-agricom' )	=> '',
               esc_html__('col-lg-1', 	'nt-agricom' )	=> 'col-lg-1',
               esc_html__('col-lg-2', 	'nt-agricom' )	=> 'col-lg-2',
               esc_html__('col-lg-3', 	'nt-agricom' )	=> 'col-lg-3',
               esc_html__('col-lg-4', 	'nt-agricom' )	=> 'col-lg-4',
               esc_html__('col-lg-5', 	'nt-agricom' )	=> 'col-lg-5',
               esc_html__('col-lg-6', 	'nt-agricom' )	=> 'col-lg-6',
               esc_html__('col-lg-7', 	'nt-agricom' )	=> 'col-lg-7',
               esc_html__('col-lg-8', 	'nt-agricom' )	=> 'col-lg-8',
               esc_html__('col-lg-9', 	'nt-agricom' )	=> 'col-lg-9',
               esc_html__('col-lg-10', 'nt-agricom' )	=> 'col-lg-10',
               esc_html__('col-lg-11', 'nt-agricom' )	=> 'col-lg-11',
               esc_html__('col-lg-12', 'nt-agricom' )	=> 'col-lg-12',
            ),
            'dependency' 	=> array(
                  'element' 	=> 'column',
                  'value'   	=> 'custom'
            )
         ),
         array(
            'type'			=> 'dropdown',
            'heading'		=> esc_html__('XL device column', 'nt-agricom' ),
            'param_name'	=> 'xlcol',
            'group' 	  => esc_html__('Gallery', 'nt-agricom' ),
            'description'	=> esc_html__('You can select big xl device column size', 'nt-agricom' ),
            'value'			=> array(
               esc_html__('Select large device column for all item', 	'nt-agricom' )	=> '',
               esc_html__('col-xl-1', 	'nt-agricom' )	=> 'col-xl-1',
               esc_html__('col-xl-2', 	'nt-agricom' )	=> 'col-xl-2',
               esc_html__('col-xl-3', 	'nt-agricom' )	=> 'col-xl-3',
               esc_html__('col-xl-4', 	'nt-agricom' )	=> 'col-xl-4',
               esc_html__('col-xl-5', 	'nt-agricom' )	=> 'col-xl-5',
               esc_html__('col-xl-6', 	'nt-agricom' )	=> 'col-xl-6',
               esc_html__('col-xl-7', 	'nt-agricom' )	=> 'col-xl-7',
               esc_html__('col-xl-8', 	'nt-agricom' )	=> 'col-xl-8',
               esc_html__('col-xl-9', 	'nt-agricom' )	=> 'col-xl-9',
               esc_html__('col-xl-10', 'nt-agricom' )	=> 'col-xl-10',
               esc_html__('col-xl-11', 'nt-agricom' )	=> 'col-xl-11',
               esc_html__('col-xl-12', 'nt-agricom' )	=> 'col-xl-12',
            ),
            'dependency' 	=> array(
                  'element' 	=> 'column',
                  'value'   	=> 'custom'
            )
         ),

			//custom style
			//title
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Title font-size', 'nt-agricom'),
				'param_name'	=> 'tsize',
				'description'	=> esc_html__('Change item title fontsize.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Title line-height', 'nt-agricom'),
				'param_name'	=> 'tlineh',
				'description'	=> esc_html__('Change title line-height.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Title color', 'nt-agricom'),
				'param_name'	=> 'tcolor',
				'description'	=> esc_html__('Change item title color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			//Subtitle
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Subtitle font-size', 'nt-agricom'),
				'param_name'	=> 'stsize',
				'description'	=> esc_html__('Change item subtitle fontsize.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Subtitle line-height', 'nt-agricom'),
				'param_name'	=> 'stlineh',
				'description'	=> esc_html__('Change subtitle line-height.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Subtitle color', 'nt-agricom'),
				'param_name'	=> 'stcolor',
				'description'	=> esc_html__('Change item subtitle color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),

			//bg style
			array(
				'type'			=> 'css_editor',
				'heading'		=> esc_html__('Background CSS', 'nt-agricom' ),
				'param_name'	=> 'bgcss',
				'group'			=> esc_html__('Background options', 'nt-agricom' ),
			),
		)
	));
} class NT_Agricom_section_simplegallery extends WPBakeryShortCode {}

/*-----------------------------------------------------------------------------------*/
/*	TESTIMONIAL agricom
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Agricom_testimonial_integrateWithVC' );
function NT_Agricom_testimonial_integrateWithVC() {
	vc_map( array(
		'name'		=> esc_html__( 'Testimonial Section', 'nt-agricom' ),
		'base'		=> 'nt_agricom_section_testimonial',
		'category'	=> esc_html__( 'NT Agricom', 'nt-agricom'),
		'params'	=> array(

			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Heading', 'nt-agricom' ),
				'param_name'    => 'heading',
				'description'   => esc_html__('Add heading for this section', 'nt-agricom'),
			),
			array(
				'type' 		  	=> 'attach_image',
				'heading' 	  	=> esc_html__('Background parallax image', 'nt-agricom'),
				'param_name'  	=> 'bgimg',
				'description' 	=> esc_html__('Add your background parallax image', 'nt-agricom'),
			),
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Slider speed', 'nt-agricom' ),
				'param_name'    => 'speed',
				'description'   => esc_html__('Set slider custom speed.Default 1000', 'nt-agricom'),
			),
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Timeout', 'nt-agricom' ),
				'param_name'    => 'timeout',
				'description'   => esc_html__('Set slider custom timeout.Default 6000 ( 6s )', 'nt-agricom'),
			),
			//testimonial loop
			array(
				'type'        => 'param_group',
				'heading'     => esc_html__('Testimonial items', 'nt-agricom' ),
				'param_name'  => 'testiloop',
				'group' 	  => esc_html__('Testimonial', 'nt-agricom' ),
				'params' 	  => array(
					array(
						'type' 		  	=> 'attach_image',
						'heading' 	  	=> esc_html__('Testimonial image', 'nt-agricom'),
						'param_name'  	=> 'tesimg',
						'description' 	=> esc_html__('Add your testimonial image', 'nt-agricom'),
					),
					array(
						'type' 			  => 'textarea',
						'heading' 		  => esc_html__('Quote', 'nt-agricom'),
						'param_name' 	  => 'quote',
						'description' 	  => esc_html__('Add testimonial quote.', 'nt-agricom'),
					),
					array(
						'type' 			  => 'textfield',
						'heading' 		  => esc_html__('Name', 'nt-agricom'),
						'param_name' 	  => 'name',
						'description' 	  => esc_html__('Add testimonial name.', 'nt-agricom'),
					),
					array(
						'type' 			  => 'textfield',
						'heading' 		  => esc_html__('Job', 'nt-agricom'),
						'param_name' 	  => 'job',
						'description' 	  => esc_html__('Add testimonial job.', 'nt-agricom'),
					)
				)
			),

			//custom style

			// section heading
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Heading font-size', 'nt-agricom'),
				'param_name'	=> 'hsize',
				'description'	=> esc_html__('Change heading font-size.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Heading line-height', 'nt-agricom'),
				'param_name'	=> 'hlineh',
				'description'	=> esc_html__('Change heading line-height.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Heading color', 'nt-agricom'),
				'param_name'	=> 'hcolor',
				'description'	=> esc_html__('Change heading color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			//Quote
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Quote font-size', 'nt-agricom'),
				'param_name'	=> 'qsize',
				'description'	=> esc_html__('Change quote fontsize.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Quote line-height', 'nt-agricom'),
				'param_name'	=> 'qlineh',
				'description'	=> esc_html__('Change quote line-height.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Quote color', 'nt-agricom'),
				'param_name'	=> 'qcolor',
				'description'	=> esc_html__('Change quote color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			//name
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Name font-size', 'nt-agricom'),
				'param_name'	=> 'nsize',
				'description'	=> esc_html__('Change testimonial name fontsize.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Name line-height', 'nt-agricom'),
				'param_name'	=> 'nlineh',
				'description'	=> esc_html__('Change testimonial name line-height.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Name color', 'nt-agricom'),
				'param_name'	=> 'ncolor',
				'description'	=> esc_html__('Change testimonial name color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			//Job
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Job font-size', 'nt-agricom'),
				'param_name'	=> 'jsize',
				'description'	=> esc_html__('Change testimonial job fontsize.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Job line-height', 'nt-agricom'),
				'param_name'	=> 'jlineh',
				'description'	=> esc_html__('Change testimonial job line-height.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Job color', 'nt-agricom'),
				'param_name'	=> 'jcolor',
				'description'	=> esc_html__('Change testimonial job color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			// BG style
			array(
				'type'          => 'css_editor',
				'heading'       => esc_html__('Background CSS', 'nt-agricom' ),
				'param_name'    => 'bgcss',
				'group' 	    => esc_html__('Background options', 'nt-agricom' ),
			),
		)
	));
} class NT_Agricom_section_testimonial extends WPBakeryShortCode {}

/*-----------------------------------------------------------------------------------*/
/*	TESTIMONIAL agricom
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Agricom_timelinefull_integrateWithVC' );
function NT_Agricom_timelinefull_integrateWithVC() {
	vc_map( array(
		'name'		=> esc_html__( 'Timeline Loop', 'nt-agricom' ),
		'base'		=> 'nt_agricom_section_timelinefull',
		'category'	=> esc_html__( 'NT Agricom', 'nt-agricom'),
		'params'	=> array(

			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Heading', 'nt-agricom' ),
				'param_name'    => 'heading',
				'description'   => esc_html__('Add heading for this section', 'nt-agricom'),
			),
			//post column
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Item column size', 'nt-agricom' ),
				'param_name'	=> 'column',
				'description'	=> esc_html__('You can select post column size', 'nt-agricom' ),
				'value'			=> array(
					esc_html__('Select column for all item', 	'nt-agricom' )	=> '',
					esc_html__('2 Column', 	'nt-agricom' )	=> 'col-md-6',
					esc_html__('3 Column', 	'nt-agricom' )	=> 'col-md-4',
					esc_html__('4 Column', 	'nt-agricom' )	=> 'col-md-3',
					esc_html__('Custom Column', 'nt-agricom' )=> 'custom',
				),
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Mobile column', 'nt-agricom' ),
				'param_name'	=> 'smcol',
				'description'	=> esc_html__('You can select mobile device column size', 'nt-agricom' ),
				'value'			=> array(
					esc_html__('Select mobile column for all item', 	'nt-agricom' )	=> '',
					esc_html__('col-sm-1', 	'nt-agricom' )	=> 'col-sm-1',
					esc_html__('col-sm-2', 	'nt-agricom' )	=> 'col-sm-2',
					esc_html__('col-sm-3', 	'nt-agricom' )	=> 'col-sm-3',
					esc_html__('col-sm-4', 	'nt-agricom' )	=> 'col-sm-4',
					esc_html__('col-sm-5', 	'nt-agricom' )	=> 'col-sm-5',
					esc_html__('col-sm-6', 	'nt-agricom' )	=> 'col-sm-6',
					esc_html__('col-sm-7', 	'nt-agricom' )	=> 'col-sm-7',
					esc_html__('col-sm-8', 	'nt-agricom' )	=> 'col-sm-8',
					esc_html__('col-sm-9', 	'nt-agricom' )	=> 'col-sm-9',
					esc_html__('col-sm-10', 'nt-agricom' )	=> 'col-sm-10',
					esc_html__('col-sm-11', 'nt-agricom' )	=> 'col-sm-11',
					esc_html__('col-sm-12', 'nt-agricom' )	=> 'col-sm-12',
				),
				'dependency' 	=> array(
						'element' 	=> 'column',
						'value'   	=> 'custom'
				)
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Mobile column', 'nt-agricom' ),
				'param_name'	=> 'xscol',
				'description'	=> esc_html__('You can select mobile device column size', 'nt-agricom' ),
				'value'			=> array(
					esc_html__('Select small mobile column for all item', 	'nt-agricom' )	=> '',
					esc_html__('col-xs-1', 	'nt-agricom' )	=> 'col-xs-1',
					esc_html__('col-xs-2', 	'nt-agricom' )	=> 'col-xs-2',
					esc_html__('col-xs-3', 	'nt-agricom' )	=> 'col-xs-3',
					esc_html__('col-xs-4', 	'nt-agricom' )	=> 'col-xs-4',
					esc_html__('col-xs-5', 	'nt-agricom' )	=> 'col-xs-5',
					esc_html__('col-xs-6', 	'nt-agricom' )	=> 'col-xs-6',
					esc_html__('col-xs-7', 	'nt-agricom' )	=> 'col-xs-7',
					esc_html__('col-xs-8', 	'nt-agricom' )	=> 'col-xs-8',
					esc_html__('col-xs-9', 	'nt-agricom' )	=> 'col-xs-9',
					esc_html__('col-xs-10', 'nt-agricom' )	=> 'col-xs-10',
					esc_html__('col-xs-11', 'nt-agricom' )	=> 'col-xs-11',
					esc_html__('col-xs-12', 'nt-agricom' )	=> 'col-xs-12',
				),
				'dependency' 	=> array(
						'element' 	=> 'column',
						'value'   	=> 'custom'
				)
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Desktop column', 'nt-agricom' ),
				'param_name'	=> 'mdcol',
				'description'	=> esc_html__('You can select desktop column size', 'nt-agricom' ),
				'value'			=> array(
					esc_html__('Select desktop column for all item', 	'nt-agricom' )	=> '',
					esc_html__('col-md-1', 	'nt-agricom' )	=> 'col-md-1',
					esc_html__('col-md-2', 	'nt-agricom' )	=> 'col-md-2',
					esc_html__('col-md-3', 	'nt-agricom' )	=> 'col-md-3',
					esc_html__('col-md-4', 	'nt-agricom' )	=> 'col-md-4',
					esc_html__('col-md-5', 	'nt-agricom' )	=> 'col-md-5',
					esc_html__('col-md-6', 	'nt-agricom' )	=> 'col-md-6',
					esc_html__('col-md-7', 	'nt-agricom' )	=> 'col-md-7',
					esc_html__('col-md-8', 	'nt-agricom' )	=> 'col-md-8',
					esc_html__('col-md-9', 	'nt-agricom' )	=> 'col-md-9',
					esc_html__('col-md-10', 'nt-agricom' )	=> 'col-md-10',
					esc_html__('col-md-11', 'nt-agricom' )	=> 'col-md-11',
					esc_html__('col-md-12', 'nt-agricom' )	=> 'col-md-12',
				),
				'dependency' 	=> array(
						'element' 	=> 'column',
						'value'   	=> 'custom'
				)
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Large device column', 'nt-agricom' ),
				'param_name'	=> 'lgcol',
				'description'	=> esc_html__('You can select big large device column size', 'nt-agricom' ),
				'value'			=> array(
					esc_html__('Select large device column for all item', 	'nt-agricom' )	=> '',
					esc_html__('col-lg-1', 	'nt-agricom' )	=> 'col-lg-1',
					esc_html__('col-lg-2', 	'nt-agricom' )	=> 'col-lg-2',
					esc_html__('col-lg-3', 	'nt-agricom' )	=> 'col-lg-3',
					esc_html__('col-lg-4', 	'nt-agricom' )	=> 'col-lg-4',
					esc_html__('col-lg-5', 	'nt-agricom' )	=> 'col-lg-5',
					esc_html__('col-lg-6', 	'nt-agricom' )	=> 'col-lg-6',
					esc_html__('col-lg-7', 	'nt-agricom' )	=> 'col-lg-7',
					esc_html__('col-lg-8', 	'nt-agricom' )	=> 'col-lg-8',
					esc_html__('col-lg-9', 	'nt-agricom' )	=> 'col-lg-9',
					esc_html__('col-lg-10', 'nt-agricom' )	=> 'col-lg-10',
					esc_html__('col-lg-11', 'nt-agricom' )	=> 'col-lg-11',
					esc_html__('col-lg-12', 'nt-agricom' )	=> 'col-lg-12',
				),
				'dependency' 	=> array(
						'element' 	=> 'column',
						'value'   	=> 'custom'
				)
			),
			//testimonial loop
			array(
				'type'        => 'param_group',
				'heading'     => esc_html__('Timeline items', 'nt-agricom' ),
				'param_name'  => 'timeloop',
				'group' 	  => esc_html__('Timeline', 'nt-agricom' ),
				'params' 	  => array(
					array(
						'type' 			  => 'textfield',
						'heading' 		  => esc_html__('Date', 'nt-agricom'),
						'param_name' 	  => 'date',
						'description' 	  => esc_html__('Add timeline date.', 'nt-agricom'),
					),
					array(
						'type' 			  => 'textfield',
						'heading' 		  => esc_html__('Title', 'nt-agricom'),
						'param_name' 	  => 'title',
						'description' 	  => esc_html__('Add timeline title.', 'nt-agricom'),
					),
					array(
						'type' 			  => 'textarea',
						'heading' 		  => esc_html__('Description', 'nt-agricom'),
						'param_name' 	  => 'desc',
						'description' 	  => esc_html__('Add timeline job.', 'nt-agricom'),
					)
				)
			),

			//custom style

			// section heading
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Heading font-size', 'nt-agricom'),
				'param_name'	=> 'hsize',
				'description'	=> esc_html__('Change heading font-size.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Heading line-height', 'nt-agricom'),
				'param_name'	=> 'hlineh',
				'description'	=> esc_html__('Change heading line-height.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Heading color', 'nt-agricom'),
				'param_name'	=> 'hcolor',
				'description'	=> esc_html__('Change heading color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			//name
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Date font-size', 'nt-agricom'),
				'param_name'	=> 'nsize',
				'description'	=> esc_html__('Change date fontsize.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Date line-height', 'nt-agricom'),
				'param_name'	=> 'nlineh',
				'description'	=> esc_html__('Change date line-height.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Date color', 'nt-agricom'),
				'param_name'	=> 'ncolor',
				'description'	=> esc_html__('Change date color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			//Quote
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Title font-size', 'nt-agricom'),
				'param_name'	=> 'tsize',
				'description'	=> esc_html__('Change title fontsize.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Title line-height', 'nt-agricom'),
				'param_name'	=> 'tlineh',
				'description'	=> esc_html__('Change title line-height.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Title color', 'nt-agricom'),
				'param_name'	=> 'tcolor',
				'description'	=> esc_html__('Change title color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			//Job
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Description font-size', 'nt-agricom'),
				'param_name'	=> 'dtsize',
				'description'	=> esc_html__('Change description fontsize.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Description line-height', 'nt-agricom'),
				'param_name'	=> 'dtlineh',
				'description'	=> esc_html__('Change description line-height.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Description color', 'nt-agricom'),
				'param_name'	=> 'dtcolor',
				'description'	=> esc_html__('Change description color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			// BG style
			array(
				'type'          => 'css_editor',
				'heading'       => esc_html__('Background CSS', 'nt-agricom' ),
				'param_name'    => 'bgcss',
				'group' 	    => esc_html__('Background options', 'nt-agricom' ),
			),
		)
	));
} class NT_Agricom_section_timelinefull extends WPBakeryShortCode {}

/*-----------------------------------------------------------------------------------*/
/*	SUBSCRIBE agricom
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Agricom_subscribe_integrateWithVC' );
function NT_Agricom_subscribe_integrateWithVC() {
	vc_map( array(
		'name'		=> esc_html__( 'Subscribe Section', 'nt-agricom' ),
		'base'		=> 'nt_agricom_section_subscribe',
		'category'	=> esc_html__( 'NT Agricom', 'nt-agricom'),
		'params'	=> array(

			array(
				'type'        => 'textarea',
				'heading'     => esc_html__('Heading', 'nt-agricom' ),
				'param_name'  => 'ltitle',
				'description' => esc_html__('Add heading for this section', 'nt-agricom'),
				'group' 	  => esc_html__('Left Section', 'nt-agricom' ),
			),
			array(
				'type'        => 'textarea',
				'heading'     => esc_html__('Description', 'nt-agricom' ),
				'param_name'  => 'ldesc',
				'description' => esc_html__('Add description for this section', 'nt-agricom'),
				'group' 	  => esc_html__('Left Section', 'nt-agricom' ),
			),
			array(
				'type' 		  => 'attach_image',
				'heading' 	  => esc_html__('Background image', 'nt-agricom'),
				'param_name'  => 'lbgimg',
				'description' => esc_html__('Add left section background image', 'nt-agricom'),
				'group' 	  => esc_html__('Left Section', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Background color', 'nt-agricom'),
				'param_name'	=> 'leftbgc',
				'description'	=> esc_html__('Change background color.', 'nt-agricom'),
				'group' 	  	=> esc_html__('Left Section', 'nt-agricom' ),
			),
			array(
				'type'          => 'vc_link',
				'heading'       => esc_html__('Button (Link)', 'nt-agricom' ),
				'param_name'    => 'link',
				'description'   => esc_html__('Add custom link.', 'nt-agricom' ),
				'group' 	  	=> esc_html__('Left Section', 'nt-agricom' ),
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Button style', 'nt-agricom' ),
				'param_name'	=> 'btnstyle',
				'description'	=> esc_html__('You can select button style', 'nt-agricom' ),
				'group' 	  	=> esc_html__('Left Section', 'nt-agricom' ),
				'value'			=> array(
					esc_html__('Select option', 'nt-agricom' )	=> '',
					esc_html__('Default button', 	'nt-agricom' )	=> 'btn-default',
					esc_html__('Primary button', 	'nt-agricom' )	=> 'primary',
				),
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Button size', 'nt-agricom' ),
				'param_name'	=> 'btnsize',
				'description'	=> esc_html__('You can select button size', 'nt-agricom' ),
				'group' 	 	=> esc_html__('Left Section', 'nt-agricom' ),
				'value'		  	=> array(
					esc_html__('Select option', 'nt-agricom' )	=> '',
					esc_html__('Small', 'nt-agricom' )	=> 'small-btn',
					esc_html__('Big', 	'nt-agricom' )	=> 'big',
					esc_html__('Large', 'nt-agricom' )	=> 'long',
				),
			),
			//btn style
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Button title color', 'nt-agricom'),
				'param_name'	=> 'btncolor',
				'description'	=> esc_html__('Change button title color.', 'nt-agricom'),
				'group' 	  	=> esc_html__('Left Section', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Button background color', 'nt-agricom'),
				'param_name'	=> 'btnbg',
				'description'	=> esc_html__('Change button background color.', 'nt-agricom'),
				'group' 	  	=> esc_html__('Left Section', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Button border color', 'nt-agricom'),
				'param_name'	=> 'btnborder',
				'description'	=> esc_html__('Change button border color.', 'nt-agricom'),
				'group' 	  	=> esc_html__('Left Section', 'nt-agricom' ),
			),


			//rigt section style
			array(
				'type'        => 'textarea',
				'heading'     => esc_html__('Heading', 'nt-agricom' ),
				'param_name'  => 'rtitle',
				'description' => esc_html__('Add heading for this section', 'nt-agricom'),
				'group' 	  => esc_html__('Right Section', 'nt-agricom' ),
			),
			array(
				'type'        => 'textarea',
				'heading'     => esc_html__('Description', 'nt-agricom' ),
				'param_name'  => 'rdesc',
				'description' => esc_html__('Add description for this section', 'nt-agricom'),
				'group' 	  => esc_html__('Right Section', 'nt-agricom' ),
			),
			array(
				'type' 		  => 'attach_image',
				'heading' 	  => esc_html__('Background image', 'nt-agricom'),
				'param_name'  => 'rbgimg',
				'description' => esc_html__('Add right section background image', 'nt-agricom'),
				'group' 	  => esc_html__('Right Section', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Background color', 'nt-agricom'),
				'param_name'	=> 'rightbgc',
				'description'	=> esc_html__('Change background color.', 'nt-agricom'),
				'group' 	  	=> esc_html__('Right Section', 'nt-agricom' ),
			),
			array(
				'type'        => 'textarea_html',
				'heading'     => esc_html__('Subscribe form shortcode', 'nt-agricom' ),
				'param_name'  => 'content',
				'description' => esc_html__('Add Subscribe form shortcode here', 'nt-agricom'),
				'group' 	  => esc_html__('Right Section', 'nt-agricom' ),
			),
			//custom style

			//left haeding
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Left Heading font-size', 'nt-agricom'),
				'param_name'	=> 'ltsize',
				'description'	=> esc_html__('Change heading font-size.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Left Heading line-height', 'nt-agricom'),
				'param_name'	=> 'ltlineh',
				'description'	=> esc_html__('Change heading line-height.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Left Heading color', 'nt-agricom'),
				'param_name'	=> 'ltcolor',
				'description'	=> esc_html__('Change heading color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			//left description
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Left description font-size', 'nt-agricom'),
				'param_name'	=> 'ldsize',
				'description'	=> esc_html__('Change description font-size.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Left description line-height', 'nt-agricom'),
				'param_name'	=> 'ldlineh',
				'description'	=> esc_html__('Change description line-height.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Left description color', 'nt-agricom'),
				'param_name'	=> 'ldcolor',
				'description'	=> esc_html__('Change description color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			//left haeding
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Right Heading font-size', 'nt-agricom'),
				'param_name'	=> 'rtsize',
				'description'	=> esc_html__('Change heading font-size.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Right Heading line-height', 'nt-agricom'),
				'param_name'	=> 'rtlineh',
				'description'	=> esc_html__('Change heading line-height.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Right Heading color', 'nt-agricom'),
				'param_name'	=> 'rtcolor',
				'description'	=> esc_html__('Change heading color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			//left description
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Right Left description font-size', 'nt-agricom'),
				'param_name'	=> 'rdsize',
				'description'	=> esc_html__('Change description font-size.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Right description line-height', 'nt-agricom'),
				'param_name'	=> 'rdlineh',
				'description'	=> esc_html__('Change description line-height.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Right description color', 'nt-agricom'),
				'param_name'	=> 'rdcolor',
				'description'	=> esc_html__('Change description color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
		)
	));
} class NT_Agricom_section_subscribe extends WPBakeryShortCode {}



/*-----------------------------------------------------------------------------------*/
/*	BLOG agricom
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Agricom_section_blog_integrateWithVC' );
function NT_Agricom_section_blog_integrateWithVC() {
   vc_map( array(
      'name'       => esc_html__('Blog ( Default Post )', 'nt-agricom'),
      'base'       => 'nt_agricom_section_blog',
	  'icon'       => 'icon-wpb-row',
	  'category'   => esc_html__('NT Agricom', 'nt-agricom'),
      'params'     => array(
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Heading', 'nt-agricom' ),
				'param_name'    => 'heading',
				'description'   => esc_html__('Add heading for this section', 'nt-agricom'),
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Blog shortcode style', 'nt-agricom' ),
				'param_name'	=> 'blogstyle',
				'description'	=> esc_html__('You can select style for blog section', 'nt-agricom' ),
				'value'			=> array(
					esc_html__('Select style', 	'nt-agricom' )	=> '',
					esc_html__('Style 1', 		'nt-agricom' )	=> 'style1',
					esc_html__('Style 2', 		'nt-agricom' )	=> 'style2',
					esc_html__('Style 3', 		'nt-agricom' )	=> 'style3',
				),
			),
			array(
				'type'          => 'vc_link',
				'heading'       => esc_html__('Button Bottom (Link)', 'nt-agricom' ),
				'param_name'    => 'link',
				'description'   => esc_html__('Add custom link.', 'nt-agricom' ),
				'dependency' 	=> array(
						'element' 	=> 'blogstyle',
						'value'   	=>  array('style1','style2')
				)
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Button style', 'nt-agricom' ),
				'param_name'	=> 'btnstyle',
				'description'	=> esc_html__('You can select button style', 'nt-agricom' ),
				'value'			=> array(
					esc_html__('Select option', 'nt-agricom' )	=> '',
					esc_html__('Default button', 	'nt-agricom' )	=> 'btn-default',
					esc_html__('Primary button', 	'nt-agricom' )	=> 'primary',
				),
				'dependency' 	=> array(
						'element' 	=> 'blogstyle',
						'value'   	=> array('style1','style2')
				)
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Button size', 'nt-agricom' ),
				'param_name'	=> 'btnsize',
				'description'	=> esc_html__('You can select button size', 'nt-agricom' ),
				'value'			=> array(
					esc_html__('Select option', 'nt-agricom' )	=> '',
					esc_html__('Small', 'nt-agricom' )	=> 'small-btn',
					esc_html__('Big', 	'nt-agricom' )	=> 'big',
					esc_html__('Large', 'nt-agricom' )	=> 'long',
				),
				'dependency' 	=> array(
						'element' 	=> 'blogstyle',
						'value'   	=>  array('style1','style2')
				)
			),

			//post column
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Item column size', 'nt-agricom' ),
				'param_name'	=> 'column',
				'description'	=> esc_html__('You can select post column size', 'nt-agricom' ),
				'value'			=> array(
					esc_html__('Select column for all item', 	'nt-agricom' )	=> '',
					esc_html__('2 Column', 	'nt-agricom' )	=> 'col-xs-12 col-sm-6 col-md-6',
					esc_html__('3 Column', 	'nt-agricom' )	=> 'col-xs-12 col-sm-6 col-md-4',
					esc_html__('4 Column', 	'nt-agricom' )	=> 'col-xs-12 col-sm-6 col-md-3',
					esc_html__('Custom Column', 'nt-agricom' )=> 'custom',
				),
				'dependency' 	=> array(
						'element' 	=> 'blogstyle',
						'value'   	=> 'style3'
				)
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Mobile column', 'nt-agricom' ),
				'param_name'	=> 'smcol',
				'description'	=> esc_html__('You can select mobile device column size', 'nt-agricom' ),
				'value'			=> array(
					esc_html__('Select mobile column for all item', 	'nt-agricom' )	=> '',
					esc_html__('col-sm-1', 	'nt-agricom' )	=> 'col-sm-1',
					esc_html__('col-sm-2', 	'nt-agricom' )	=> 'col-sm-2',
					esc_html__('col-sm-3', 	'nt-agricom' )	=> 'col-sm-3',
					esc_html__('col-sm-4', 	'nt-agricom' )	=> 'col-sm-4',
					esc_html__('col-sm-5', 	'nt-agricom' )	=> 'col-sm-5',
					esc_html__('col-sm-6', 	'nt-agricom' )	=> 'col-sm-6',
					esc_html__('col-sm-7', 	'nt-agricom' )	=> 'col-sm-7',
					esc_html__('col-sm-8', 	'nt-agricom' )	=> 'col-sm-8',
					esc_html__('col-sm-9', 	'nt-agricom' )	=> 'col-sm-9',
					esc_html__('col-sm-10', 'nt-agricom' )	=> 'col-sm-10',
					esc_html__('col-sm-11', 'nt-agricom' )	=> 'col-sm-11',
					esc_html__('col-sm-12', 'nt-agricom' )	=> 'col-sm-12',
				),
				'dependency' 	=> array(
						'element' 	=> 'column',
						'value'   	=> 'custom'
				)
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Mobile column', 'nt-agricom' ),
				'param_name'	=> 'xscol',
				'description'	=> esc_html__('You can select mobile device column size', 'nt-agricom' ),
				'value'			=> array(
					esc_html__('Select small mobile column for all item', 	'nt-agricom' )	=> '',
					esc_html__('col-xs-1', 	'nt-agricom' )	=> 'col-xs-1',
					esc_html__('col-xs-2', 	'nt-agricom' )	=> 'col-xs-2',
					esc_html__('col-xs-3', 	'nt-agricom' )	=> 'col-xs-3',
					esc_html__('col-xs-4', 	'nt-agricom' )	=> 'col-xs-4',
					esc_html__('col-xs-5', 	'nt-agricom' )	=> 'col-xs-5',
					esc_html__('col-xs-6', 	'nt-agricom' )	=> 'col-xs-6',
					esc_html__('col-xs-7', 	'nt-agricom' )	=> 'col-xs-7',
					esc_html__('col-xs-8', 	'nt-agricom' )	=> 'col-xs-8',
					esc_html__('col-xs-9', 	'nt-agricom' )	=> 'col-xs-9',
					esc_html__('col-xs-10', 'nt-agricom' )	=> 'col-xs-10',
					esc_html__('col-xs-11', 'nt-agricom' )	=> 'col-xs-11',
					esc_html__('col-xs-12', 'nt-agricom' )	=> 'col-xs-12',
				),
				'dependency' 	=> array(
						'element' 	=> 'column',
						'value'   	=> 'custom'
				)
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Desktop column', 'nt-agricom' ),
				'param_name'	=> 'mdcol',
				'description'	=> esc_html__('You can select desktop column size', 'nt-agricom' ),
				'value'			=> array(
					esc_html__('Select desktop column for all item', 	'nt-agricom' )	=> '',
					esc_html__('col-md-1', 	'nt-agricom' )	=> 'col-md-1',
					esc_html__('col-md-2', 	'nt-agricom' )	=> 'col-md-2',
					esc_html__('col-md-3', 	'nt-agricom' )	=> 'col-md-3',
					esc_html__('col-md-4', 	'nt-agricom' )	=> 'col-md-4',
					esc_html__('col-md-5', 	'nt-agricom' )	=> 'col-md-5',
					esc_html__('col-md-6', 	'nt-agricom' )	=> 'col-md-6',
					esc_html__('col-md-7', 	'nt-agricom' )	=> 'col-md-7',
					esc_html__('col-md-8', 	'nt-agricom' )	=> 'col-md-8',
					esc_html__('col-md-9', 	'nt-agricom' )	=> 'col-md-9',
					esc_html__('col-md-10', 'nt-agricom' )	=> 'col-md-10',
					esc_html__('col-md-11', 'nt-agricom' )	=> 'col-md-11',
					esc_html__('col-md-12', 'nt-agricom' )	=> 'col-md-12',
				),
				'dependency' 	=> array(
						'element' 	=> 'column',
						'value'   	=> 'custom'
				)
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Large device column', 'nt-agricom' ),
				'param_name'	=> 'lgcol',
				'description'	=> esc_html__('You can select big large device column size', 'nt-agricom' ),
				'value'			=> array(
					esc_html__('Select large device column for all item', 	'nt-agricom' )	=> '',
					esc_html__('col-lg-1', 	'nt-agricom' )	=> 'col-lg-1',
					esc_html__('col-lg-2', 	'nt-agricom' )	=> 'col-lg-2',
					esc_html__('col-lg-3', 	'nt-agricom' )	=> 'col-lg-3',
					esc_html__('col-lg-4', 	'nt-agricom' )	=> 'col-lg-4',
					esc_html__('col-lg-5', 	'nt-agricom' )	=> 'col-lg-5',
					esc_html__('col-lg-6', 	'nt-agricom' )	=> 'col-lg-6',
					esc_html__('col-lg-7', 	'nt-agricom' )	=> 'col-lg-7',
					esc_html__('col-lg-8', 	'nt-agricom' )	=> 'col-lg-8',
					esc_html__('col-lg-9', 	'nt-agricom' )	=> 'col-lg-9',
					esc_html__('col-lg-10', 'nt-agricom' )	=> 'col-lg-10',
					esc_html__('col-lg-11', 'nt-agricom' )	=> 'col-lg-11',
					esc_html__('col-lg-12', 'nt-agricom' )	=> 'col-lg-12',
				),
				'dependency' 	=> array(
						'element' 	=> 'column',
						'value'   	=> 'custom'
				)
			),
			// post
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Post image width', 'nt-agricom' ),
				'param_name'	=> 'imgwidth',
				'description'	=> esc_html__('You can control with number image size for auto crop image.Enter image width without px or unit.Example: 370', 'nt-agricom'),
				'group'			=> esc_html__('Post Options', 'nt-agricom'),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Post image height', 'nt-agricom' ),
				'param_name'	=> 'imgheight',
				'description'	=> esc_html__('You can control with number image size for auto crop image.Enter image height without px or unit.Example: 265', 'nt-agricom'),
				'group'			=> esc_html__('Post Options', 'nt-agricom'),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Post Count', 'nt-agricom' ),
				'param_name'	=> 'p_count',
				'description'	=> esc_html__('You can control with number your post.Please enter a number or leave a blank', 'nt-agricom'),
				'group'			=> esc_html__('Post Options', 'nt-agricom'),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Post Category', 'nt-agricom' ),
				'param_name'	=> 'p_cat',
				'description'	=> esc_html__('Enter post category or write all', 'nt-agricom'),
				'group'			=> esc_html__('Post Options', 'nt-agricom'),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Post Order', 'nt-agricom' ),
				'param_name'	=> 'order',
				'description'	=> esc_html__('Enter post order. DESC or ASC', 'nt-agricom'),
				'group'			=> esc_html__('Post Options', 'nt-agricom'),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Post Orderby', 'nt-agricom' ),
				'param_name'	=> 'orderby',
				'description'	=> esc_html__('Enter post orderby. Default is : date', 'nt-agricom'),
				'group'			=> esc_html__('Post Options', 'nt-agricom'),
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Date display ?', 'nt-agricom' ),
				'param_name'	=> 'showdate',
				'description'	=> esc_html__('You can select show or hide for post date', 'nt-agricom' ),
				'group'			=> esc_html__('Post Options', 'nt-agricom' ),
				'value'			=> array(
					esc_html__('Select a option', 	'nt-agricom' )	=> '',
					esc_html__('Show',				'nt-agricom' )	=> 'show',
					esc_html__('Hide',				'nt-agricom' )	=> 'hide',
				),
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Category display ?', 'nt-agricom' ),
				'param_name'	=> 'showcat',
				'description'	=> esc_html__('You can select show or hide for post category', 'nt-agricom' ),
				'group'			=> esc_html__('Post Options', 'nt-agricom' ),
				'value'			=> array(
					esc_html__('Select a option', 	'nt-agricom' )	=> '',
					esc_html__('Show',				'nt-agricom' )	=> 'show',
					esc_html__('Hide',				'nt-agricom' )	=> 'hide',
				),
				'dependency' 	=> array(
						'element' 	=> 'blogstyle',
						'value'   	=>  array('style1','style2')
				)
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Comments display ?', 'nt-agricom' ),
				'param_name'	=> 'showcomment',
				'description'	=> esc_html__('You can select show or hide for post comments', 'nt-agricom' ),
				'group'			=> esc_html__('Post Options', 'nt-agricom' ),
				'value'			=> array(
					esc_html__('Select a option', 	'nt-agricom' )	=> '',
					esc_html__('Show',				'nt-agricom' )	=> 'show',
					esc_html__('Hide',				'nt-agricom' )	=> 'hide',
				),
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Content text display ?', 'nt-agricom' ),
				'param_name'	=> 'showcontent',
				'description'	=> esc_html__('You can select show or hide for post content text', 'nt-agricom' ),
				'group'			=> esc_html__('Post Options', 'nt-agricom' ),
				'value'			=> array(
					esc_html__('Select a option', 	'nt-agricom' )	=> '',
					esc_html__('Show',				'nt-agricom' )	=> 'show',
					esc_html__('Hide',				'nt-agricom' )	=> 'hide',
				),
			),

			// custom style

			// section heading
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Heading font-size', 'nt-agricom'),
				'param_name'	=> 'hsize',
				'description'	=> esc_html__('Change heading font-size.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Heading line-height', 'nt-agricom'),
				'param_name'	=> 'hlineh',
				'description'	=> esc_html__('Change heading line-height.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Heading color', 'nt-agricom'),
				'param_name'	=> 'hcolor',
				'description'	=> esc_html__('Change heading color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),

			// Post title
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Post title font-size', 'nt-agricom'),
				'param_name'	=> 'tsize',
				'description'	=> esc_html__('Change team job font-size.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Post title line-height', 'nt-agricom'),
				'param_name'	=> 'tlineh',
				'description'	=> esc_html__('Change title line-height.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Post title color', 'nt-agricom'),
				'param_name'	=> 'tcolor',
				'description'	=> esc_html__('Change title color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			// Post content
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Post content text font-size', 'nt-agricom'),
				'param_name'	=> 'dtsize',
				'description'	=> esc_html__('Change content text font-size.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Post content text line-height', 'nt-agricom'),
				'param_name'	=> 'dtlineh',
				'description'	=> esc_html__('Change content text line-height.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Post content text color', 'nt-agricom'),
				'param_name'	=> 'dtcolor',
				'description'	=> esc_html__('Change content text color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			// Post meta
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Post category and comment color', 'nt-agricom'),
				'param_name'	=> 'mcolor',
				'description'	=> esc_html__('Change category and comment color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Post date color', 'nt-agricom'),
				'param_name'	=> 'datecolor',
				'description'	=> esc_html__('Change date color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			// btn style
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Button title color', 'nt-agricom'),
				'param_name'	=> 'btncolor',
				'description'	=> esc_html__('Change button title color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
				'dependency' 	=> array(
						'element' 	=> 'blogstyle',
						'value'   	=>  array('style1','style2')
				)
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Button background color', 'nt-agricom'),
				'param_name'	=> 'btnbg',
				'description'	=> esc_html__('Change button background color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
				'dependency' 	=> array(
						'element' 	=> 'blogstyle',
						'value'   	=>  array('style1','style2')
				)
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Button border color', 'nt-agricom'),
				'param_name'	=> 'btnborder',
				'description'	=> esc_html__('Change button border color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
				'dependency' 	=> array(
						'element' 	=> 'blogstyle',
						'value'   	=>  array('style1','style2')
				)
			),
			// BG style
			array(
				'type'          => 'css_editor',
				'heading'       => esc_html__('Background CSS', 'nt-agricom' ),
				'param_name'    => 'bgcss',
				'group' 	    => esc_html__('Background options', 'nt-agricom' ),
			),
		)
	));
}
class NT_Agricom_section_blog extends WPBakeryShortCode {}


/*-----------------------------------------------------------------------------------*/
/*	GALLERY agricom
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Agricom_section_gallery_integrateWithVC' );
function NT_Agricom_section_gallery_integrateWithVC() {
   vc_map( array(
      'name'       => esc_html__('Gallery ( CPT )', 'nt-agricom'),
      'base'       => 'nt_agricom_section_gallery',
	  'icon'       => 'icon-wpb-row',
	  'category'   => esc_html__('NT Agricom', 'nt-agricom'),
      'params'     => array(
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__('Section ID', 'nt-agricom'),
				'param_name'  => 'sec_id',
				'description' => esc_html__('Add your Section ID', 'nt-agricom'),
			),
			array(
				'type'			=> 'posttypes',
				'heading'		=> esc_html__('Select your post type', 'nt-agricom'),
				'param_name'	=> 'custompost',
				'description'	=> esc_html__('You can select your created CPT.Default post type name is gallery.', 'nt-agricom'),
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Gallery post style', 'nt-agricom' ),
				'param_name'	=> 'galstyle',
				'description'	=> esc_html__('You can select gallery section post style', 'nt-agricom' ),
				'value'			=> array(
					esc_html__('Select style', 'nt-agricom' )	=> '',
					esc_html__('Grid with Filter 1', 	'nt-agricom' )	=> 'style1',
					esc_html__('Grid with Filter 2', 	'nt-agricom' )	=> 'style2',
					esc_html__('Grid with Filter 3', 	'nt-agricom' )	=> 'style3',
					esc_html__('Masonry No Gutter', 	'nt-agricom' )	=> 'style4',
					esc_html__('Masonry Gutter', 		'nt-agricom' )	=> 'style5',
					esc_html__('Grid with Section Heading', 	'nt-agricom' )	=> 'style6',
				),
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Show filter', 'nt-agricom' ),
				'param_name'	=> 'filter',
				'description'	=> esc_html__('You can select show or hide gallery filter', 'nt-agricom' ),
				'value'			=> array(
					esc_html__('Select a option', 'nt-agricom' )	=> '',
					esc_html__('Show', 	'nt-agricom' )	=> 'show',
					esc_html__('Hide', 	'nt-agricom' )	=> 'hide',
				),
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Filter position', 'nt-agricom' ),
				'param_name'	=> 'filterpos',
				'description'	=> esc_html__('You can select gallery filter position', 'nt-agricom' ),
				'value'			=> array(
					esc_html__('Select a option', 'nt-agricom' )	=> '',
					esc_html__('Left', 	 'nt-agricom' )	=> 'text-left',
					esc_html__('Center', 'nt-agricom' )	=> 'text-center',
					esc_html__('Right',  'nt-agricom' )	=> 'text-right',
				),
				'dependency' 	=> array(
						'element' 	=> 'filter',
						'value'   	=> 'show',
				)
			),
			array(
				'type'        => 'textarea',
				'heading'     => esc_html__('Section heading', 'nt-agricom'),
				'param_name'  => 'heading',
				'description' => esc_html__('Add section gallery heading', 'nt-agricom'),
				'dependency' 	=> array(
						'element' 	=> 'galstyle',
						'value'   	=> 'style6',
				)
			),
			array(
				'type'        => 'textarea',
				'heading'     => esc_html__('Section description', 'nt-agricom'),
				'param_name'  => 'desc',
				'description' => esc_html__('Add section gallery description', 'nt-agricom'),
				'dependency' 	=> array(
						'element' 	=> 'galstyle',
						'value'   	=> 'style6',
				)
			),
			array(
				'type'          => 'vc_link',
				'heading'       => esc_html__('Button Bottom (Link)', 'nt-agricom' ),
				'param_name'    => 'link',
				'description'   => esc_html__('Add custom link.', 'nt-agricom' ),
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Button style', 'nt-agricom' ),
				'param_name'	=> 'btnstyle',
				'description'	=> esc_html__('You can select button style', 'nt-agricom' ),
				'value'			=> array(
					esc_html__('Select option', 'nt-agricom' )	=> '',
					esc_html__('Default button', 	'nt-agricom' )	=> 'btn-default',
					esc_html__('Primary button', 	'nt-agricom' )	=> 'primary',
				),
				'dependency' 	=> array(
						'element' 	=> 'galstyle',
						'value'   	=> array('style1','style2','style3','style4','style5')
				)
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Button size', 'nt-agricom' ),
				'param_name'	=> 'btnsize',
				'description'	=> esc_html__('You can select button size', 'nt-agricom' ),
				'value'			=> array(
					esc_html__('Select option', 'nt-agricom' )	=> '',
					esc_html__('Small', 'nt-agricom' )	=> 'small-btn',
					esc_html__('Big', 	'nt-agricom' )	=> 'big',
					esc_html__('Large', 'nt-agricom' )	=> 'long',
				),
				'dependency' 	=> array(
						'element' 	=> 'galstyle',
						'value'   	=> array('style1','style2','style3','style4','style5')
				)
			),
			//post column
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Item column size', 'nt-agricom' ),
				'param_name'	=> 'column',
				'description'	=> esc_html__('You can select post column size', 'nt-agricom' ),
				'value'			=> array(
					esc_html__('Select column for all item', 	'nt-agricom' )	=> '',
					esc_html__('2 Column', 	'nt-agricom' )	=> 'col-xs-12 col-sm-6 col-md-6 col-lg-6 col-xl-6',
					esc_html__('3 Column', 	'nt-agricom' )	=> 'col-xs-12 col-sm-6 col-md-4 col-lg-4 col-xl-4',
					esc_html__('4 Column', 	'nt-agricom' )	=> 'col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3',
					esc_html__('Custom Column', 'nt-agricom' )=> 'custom',
				),
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Phone Mobile column', 'nt-agricom' ),
				'param_name'	=> 'xscol',
				'description'	=> esc_html__('You can select phone mobile device column size', 'nt-agricom' ),
				'value'			=> array(
					esc_html__('Select small mobile column for all item', 	'nt-agricom' )	=> '',
					esc_html__('col-xs-1', 	'nt-agricom' )	=> 'col-xs-1',
					esc_html__('col-xs-2', 	'nt-agricom' )	=> 'col-xs-2',
					esc_html__('col-xs-3', 	'nt-agricom' )	=> 'col-xs-3',
					esc_html__('col-xs-4', 	'nt-agricom' )	=> 'col-xs-4',
					esc_html__('col-xs-5', 	'nt-agricom' )	=> 'col-xs-5',
					esc_html__('col-xs-6', 	'nt-agricom' )	=> 'col-xs-6',
					esc_html__('col-xs-7', 	'nt-agricom' )	=> 'col-xs-7',
					esc_html__('col-xs-8', 	'nt-agricom' )	=> 'col-xs-8',
					esc_html__('col-xs-9', 	'nt-agricom' )	=> 'col-xs-9',
					esc_html__('col-xs-10', 'nt-agricom' )	=> 'col-xs-10',
					esc_html__('col-xs-11', 'nt-agricom' )	=> 'col-xs-11',
					esc_html__('col-xs-12', 'nt-agricom' )	=> 'col-xs-12',
				),
				'dependency' 	=> array(
						'element' 	=> 'column',
						'value'   	=> 'custom'
					)
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Tablet Mobile column', 'nt-agricom' ),
				'param_name'	=> 'smcol',
				'description'	=> esc_html__('You can select tablet mobile device column size', 'nt-agricom' ),
				'value'			=> array(
					esc_html__('Select mobile column for all item', 	'nt-agricom' )	=> '',
					esc_html__('col-sm-1', 	'nt-agricom' )	=> 'col-sm-1',
					esc_html__('col-sm-2', 	'nt-agricom' )	=> 'col-sm-2',
					esc_html__('col-sm-3', 	'nt-agricom' )	=> 'col-sm-3',
					esc_html__('col-sm-4', 	'nt-agricom' )	=> 'col-sm-4',
					esc_html__('col-sm-5', 	'nt-agricom' )	=> 'col-sm-5',
					esc_html__('col-sm-6', 	'nt-agricom' )	=> 'col-sm-6',
					esc_html__('col-sm-7', 	'nt-agricom' )	=> 'col-sm-7',
					esc_html__('col-sm-8', 	'nt-agricom' )	=> 'col-sm-8',
					esc_html__('col-sm-9', 	'nt-agricom' )	=> 'col-sm-9',
					esc_html__('col-sm-10', 'nt-agricom' )	=> 'col-sm-10',
					esc_html__('col-sm-11', 'nt-agricom' )	=> 'col-sm-11',
					esc_html__('col-sm-12', 'nt-agricom' )	=> 'col-sm-12',
				),
				'dependency' 	=> array(
						'element' 	=> 'column',
						'value'   	=> 'custom'
					)
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Desktop column', 'nt-agricom' ),
				'param_name'	=> 'mdcol',
				'description'	=> esc_html__('You can select desktop column size', 'nt-agricom' ),
				'value'			=> array(
					esc_html__('Select desktop column for all item', 	'nt-agricom' )	=> '',
					esc_html__('col-md-1', 	'nt-agricom' )	=> 'col-md-1',
					esc_html__('col-md-2', 	'nt-agricom' )	=> 'col-md-2',
					esc_html__('col-md-3', 	'nt-agricom' )	=> 'col-md-3',
					esc_html__('col-md-4', 	'nt-agricom' )	=> 'col-md-4',
					esc_html__('col-md-5', 	'nt-agricom' )	=> 'col-md-5',
					esc_html__('col-md-6', 	'nt-agricom' )	=> 'col-md-6',
					esc_html__('col-md-7', 	'nt-agricom' )	=> 'col-md-7',
					esc_html__('col-md-8', 	'nt-agricom' )	=> 'col-md-8',
					esc_html__('col-md-9', 	'nt-agricom' )	=> 'col-md-9',
					esc_html__('col-md-10', 'nt-agricom' )	=> 'col-md-10',
					esc_html__('col-md-11', 'nt-agricom' )	=> 'col-md-11',
					esc_html__('col-md-12', 'nt-agricom' )	=> 'col-md-12',
				),
				'dependency' 	=> array(
						'element' 	=> 'column',
						'value'   	=> 'custom'
				)
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Large device column', 'nt-agricom' ),
				'param_name'	=> 'mdcol',
				'description'	=> esc_html__('You can select big large device column size', 'nt-agricom' ),
				'value'			=> array(
					esc_html__('Select large device column for all item', 	'nt-agricom' )	=> '',
					esc_html__('col-lg-1', 	'nt-agricom' )	=> 'col-lg-1',
					esc_html__('col-lg-2', 	'nt-agricom' )	=> 'col-lg-2',
					esc_html__('col-lg-3', 	'nt-agricom' )	=> 'col-lg-3',
					esc_html__('col-lg-4', 	'nt-agricom' )	=> 'col-lg-4',
					esc_html__('col-lg-5', 	'nt-agricom' )	=> 'col-lg-5',
					esc_html__('col-lg-6', 	'nt-agricom' )	=> 'col-lg-6',
					esc_html__('col-lg-7', 	'nt-agricom' )	=> 'col-lg-7',
					esc_html__('col-lg-8', 	'nt-agricom' )	=> 'col-lg-8',
					esc_html__('col-lg-9', 	'nt-agricom' )	=> 'col-lg-9',
					esc_html__('col-lg-10', 'nt-agricom' )	=> 'col-lg-10',
					esc_html__('col-lg-11', 'nt-agricom' )	=> 'col-lg-11',
					esc_html__('col-lg-12', 'nt-agricom' )	=> 'col-lg-12',
				),
				'dependency' 	=> array(
						'element' 	=> 'column',
						'value'   	=> 'custom'
				)
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('XL device column', 'nt-agricom' ),
				'param_name'	=> 'xlcol',
				'description'	=> esc_html__('You can select big xl device column size', 'nt-agricom' ),
				'value'			=> array(
					esc_html__('Select large device column for all item', 	'nt-agricom' )	=> '',
					esc_html__('col-xl-1', 	'nt-agricom' )	=> 'col-xl-1',
					esc_html__('col-xl-2', 	'nt-agricom' )	=> 'col-xl-2',
					esc_html__('col-xl-3', 	'nt-agricom' )	=> 'col-xl-3',
					esc_html__('col-xl-4', 	'nt-agricom' )	=> 'col-xl-4',
					esc_html__('col-xl-5', 	'nt-agricom' )	=> 'col-xl-5',
					esc_html__('col-xl-6', 	'nt-agricom' )	=> 'col-xl-6',
					esc_html__('col-xl-7', 	'nt-agricom' )	=> 'col-xl-7',
					esc_html__('col-xl-8', 	'nt-agricom' )	=> 'col-xl-8',
					esc_html__('col-xl-9', 	'nt-agricom' )	=> 'col-xl-9',
					esc_html__('col-xl-10', 'nt-agricom' )	=> 'col-xl-10',
					esc_html__('col-xl-11', 'nt-agricom' )	=> 'col-xl-11',
					esc_html__('col-xl-12', 'nt-agricom' )	=> 'col-xl-12',
				),
				'dependency' 	=> array(
						'element' 	=> 'column',
						'value'   	=> 'custom'
				)
			),
			//post options
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__('Post Count', 'nt-agricom' ),
				'param_name'  => 'p_count',
				'group'       => esc_html__('Post Options', 'nt-agricom'),
				'description' => esc_html__('You can control with number your price tables.Please enter a number', 'nt-agricom'),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__('Category', 'nt-agricom' ),
				'param_name'  => 'p_cat',
				'group'       => esc_html__('Post Options', 'nt-agricom'),
				'description' => esc_html__('Enter Price table category or write all', 'nt-agricom'),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__('Order', 'nt-agricom' ),
				'param_name'  => 'order',
				'group'       => esc_html__('Post Options', 'nt-agricom'),
				'description' => esc_html__('Enter Price table order. DESC or ASC', 'nt-agricom'),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__('Orderby', 'nt-agricom' ),
				'param_name'  => 'orderby',
				'group'       => esc_html__('Post Options', 'nt-agricom'),
				'description' => esc_html__('Enter Price table orderby. Default is : date', 'nt-agricom'),
			),

			// custom style
			// filter content
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Filter title color', 'nt-agricom'),
				'param_name'	=> 'fcolor',
				'description'	=> esc_html__('Change filter title color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Filter border color', 'nt-agricom'),
				'param_name'	=> 'fbrd',
				'description'	=> esc_html__('Change filter border color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			// Post title
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Post title font-size', 'nt-agricom'),
				'param_name'	=> 'tsize',
				'description'	=> esc_html__('Change team job font-size.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Post title line-height', 'nt-agricom'),
				'param_name'	=> 'tlineh',
				'description'	=> esc_html__('Change title line-height.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Post title color', 'nt-agricom'),
				'param_name'	=> 'tcolor',
				'description'	=> esc_html__('Change title color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			// Post content
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Post content text font-size', 'nt-agricom'),
				'param_name'	=> 'dtsize',
				'description'	=> esc_html__('Change content text font-size.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Post content text line-height', 'nt-agricom'),
				'param_name'	=> 'dtlineh',
				'description'	=> esc_html__('Change content text line-height.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Post content text color', 'nt-agricom'),
				'param_name'	=> 'dtcolor',
				'description'	=> esc_html__('Change content text color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			// btn style
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Button title color', 'nt-agricom'),
				'param_name'	=> 'btncolor',
				'description'	=> esc_html__('Change button title color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Button background color', 'nt-agricom'),
				'param_name'	=> 'btnbg',
				'description'	=> esc_html__('Change button background color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
				'dependency' 	=> array(
						'element' 	=> 'galstyle',
						'value'   	=>  array('style1','style2','style3','style4','style5')
				)
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Button border color', 'nt-agricom'),
				'param_name'	=> 'btnborder',
				'description'	=> esc_html__('Change button border color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
				'dependency' 	=> array(
						'element' 	=> 'galstyle',
						'value'   	=>  array('style1','style2','style3','style4','style5')
				)
			),
			// BG style
			array(
				'type'          => 'css_editor',
				'heading'       => esc_html__('Background CSS', 'nt-agricom' ),
				'param_name'    => 'bgcss',
				'group' 	    => esc_html__('Background options', 'nt-agricom' ),
			),
		),
	));
}
class NT_Agricom_section_gallery extends WPBakeryShortCode {}


/*-----------------------------------------------------------------------------------*/
/*	TEAM Agricom
/*-----------------------------------------------------------------------------------*/

add_action( 'vc_before_init', 'NT_Agricom_section_team_integrateWithVC' );
function NT_Agricom_section_team_integrateWithVC() {
   vc_map( array(
      'name'       => esc_html__('TEAM ( CPT )', 'nt-agricom'),
      'base'       => 'nt_agricom_section_team',
	  'icon'       => 'icon-wpb-row',
	  'category'   => esc_html__('NT Agricom', 'nt-agricom'),
      'params'     => array(

			array(
				'type'			=> 'posttypes',
				'heading'		=> esc_html__('Select your post type', 'nt-agricom'),
				'param_name'	=> 'custompost',
				'description'	=> esc_html__('You can select your created CPT.Default post type name is team.', 'nt-agricom'),
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Section heading', 'nt-agricom' ),
				'param_name'    => 'heading',
				'description'   => esc_html__('Add heading for this section', 'nt-agricom'),
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Section description', 'nt-agricom' ),
				'param_name'    => 'desc',
				'description'   => esc_html__('Add description for this section', 'nt-agricom'),
			),
			//post column
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Section heading column size', 'nt-agricom' ),
				'param_name'	=> 'fcolumn',
				'description'	=> esc_html__('You can select section heading  column size', 'nt-agricom' ),
				'value'			=> array(
					esc_html__('Select column for section heading', 	'nt-agricom' )	=> '',
					esc_html__('6 Column', 	'nt-agricom' )	=> 'col-xs-12 col-lg-6',
					esc_html__('4 Column', 	'nt-agricom' )	=> 'col-xs-12 col-lg-4',
					esc_html__('3 Column', 	'nt-agricom' )	=> 'col-xs-12 col-lg-3',
					esc_html__('Custom Column', 'nt-agricom' )=> 'custom',
				),
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Large device column', 'nt-agricom' ),
				'param_name'	=> 'flgcol',
				'description'	=> esc_html__('You can select big large device column size', 'nt-agricom' ),
				'value'			=> array(
					esc_html__('Select large device column for section heading', 	'nt-agricom' )	=> '',
					esc_html__('col-lg-1', 	'nt-agricom' )	=> 'col-lg-1',
					esc_html__('col-lg-2', 	'nt-agricom' )	=> 'col-lg-2',
					esc_html__('col-lg-3', 	'nt-agricom' )	=> 'col-lg-3',
					esc_html__('col-lg-4', 	'nt-agricom' )	=> 'col-lg-4',
					esc_html__('col-lg-5', 	'nt-agricom' )	=> 'col-lg-5',
					esc_html__('col-lg-6', 	'nt-agricom' )	=> 'col-lg-6',
					esc_html__('col-lg-7', 	'nt-agricom' )	=> 'col-lg-7',
					esc_html__('col-lg-8', 	'nt-agricom' )	=> 'col-lg-8',
					esc_html__('col-lg-9', 	'nt-agricom' )	=> 'col-lg-9',
					esc_html__('col-lg-10', 'nt-agricom' )	=> 'col-lg-10',
					esc_html__('col-lg-11', 'nt-agricom' )	=> 'col-lg-11',
					esc_html__('col-lg-12', 'nt-agricom' )	=> 'col-lg-12',
				),
				'dependency' 	=> array(
						'element' 	=> 'fcolumn',
						'value'   	=> 'custom'
				)
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Desktop column', 'nt-agricom' ),
				'param_name'	=> 'fmdcol',
				'description'	=> esc_html__('You can select desktop column size', 'nt-agricom' ),
				'value'			=> array(
					esc_html__('Select desktop column for section heading', 	'nt-agricom' )	=> '',
					esc_html__('col-md-1', 	'nt-agricom' )	=> 'col-md-1',
					esc_html__('col-md-2', 	'nt-agricom' )	=> 'col-md-2',
					esc_html__('col-md-3', 	'nt-agricom' )	=> 'col-md-3',
					esc_html__('col-md-4', 	'nt-agricom' )	=> 'col-md-4',
					esc_html__('col-md-5', 	'nt-agricom' )	=> 'col-md-5',
					esc_html__('col-md-6', 	'nt-agricom' )	=> 'col-md-6',
					esc_html__('col-md-7', 	'nt-agricom' )	=> 'col-md-7',
					esc_html__('col-md-8', 	'nt-agricom' )	=> 'col-md-8',
					esc_html__('col-md-9', 	'nt-agricom' )	=> 'col-md-9',
					esc_html__('col-md-10', 'nt-agricom' )	=> 'col-md-10',
					esc_html__('col-md-11', 'nt-agricom' )	=> 'col-md-11',
					esc_html__('col-md-12', 'nt-agricom' )	=> 'col-md-12',
				),
				'dependency' 	=> array(
						'element' 	=> 'fcolumn',
						'value'   	=> 'custom'
				)
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Tablet column', 'nt-agricom' ),
				'param_name'	=> 'fsmcol',
				'description'	=> esc_html__('You can select mobile device column size', 'nt-agricom' ),
				'value'			=> array(
					esc_html__('Select mobile column for section heading', 	'nt-agricom' )	=> '',
					esc_html__('col-sm-1', 	'nt-agricom' )	=> 'col-sm-1',
					esc_html__('col-sm-2', 	'nt-agricom' )	=> 'col-sm-2',
					esc_html__('col-sm-3', 	'nt-agricom' )	=> 'col-sm-3',
					esc_html__('col-sm-4', 	'nt-agricom' )	=> 'col-sm-4',
					esc_html__('col-sm-5', 	'nt-agricom' )	=> 'col-sm-5',
					esc_html__('col-sm-6', 	'nt-agricom' )	=> 'col-sm-6',
					esc_html__('col-sm-7', 	'nt-agricom' )	=> 'col-sm-7',
					esc_html__('col-sm-8', 	'nt-agricom' )	=> 'col-sm-8',
					esc_html__('col-sm-9', 	'nt-agricom' )	=> 'col-sm-9',
					esc_html__('col-sm-10', 'nt-agricom' )	=> 'col-sm-10',
					esc_html__('col-sm-11', 'nt-agricom' )	=> 'col-sm-11',
					esc_html__('col-sm-12', 'nt-agricom' )	=> 'col-sm-12',
				),
				'dependency' 	=> array(
						'element' 	=> 'fcolumn',
						'value'   	=> 'custom'
					)
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Phone column', 'nt-agricom' ),
				'param_name'	=> 'fxscol',
				'description'	=> esc_html__('You can select mobile device column size', 'nt-agricom' ),
				'value'			=> array(
					esc_html__('Select small mobile column for section heading', 	'nt-agricom' )	=> '',
					esc_html__('col-xs-1', 	'nt-agricom' )	=> 'col-xs-1',
					esc_html__('col-xs-2', 	'nt-agricom' )	=> 'col-xs-2',
					esc_html__('col-xs-3', 	'nt-agricom' )	=> 'col-xs-3',
					esc_html__('col-xs-4', 	'nt-agricom' )	=> 'col-xs-4',
					esc_html__('col-xs-5', 	'nt-agricom' )	=> 'col-xs-5',
					esc_html__('col-xs-6', 	'nt-agricom' )	=> 'col-xs-6',
					esc_html__('col-xs-7', 	'nt-agricom' )	=> 'col-xs-7',
					esc_html__('col-xs-8', 	'nt-agricom' )	=> 'col-xs-8',
					esc_html__('col-xs-9', 	'nt-agricom' )	=> 'col-xs-9',
					esc_html__('col-xs-10', 'nt-agricom' )	=> 'col-xs-10',
					esc_html__('col-xs-11', 'nt-agricom' )	=> 'col-xs-11',
					esc_html__('col-xs-12', 'nt-agricom' )	=> 'col-xs-12',
				),
				'dependency' 	=> array(
						'element' 	=> 'fcolumn',
						'value'   	=> 'custom'
					)
			),

			// post options
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__('Team post count', 'nt-agricom' ),
				'param_name'  => 'p_count',
				'group'       => esc_html__('Post Options', 'nt-agricom'),
				'description' => esc_html__('You can control with number your team members post.Please enter a number', 'nt-agricom'),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__('Category', 'nt-agricom' ),
				'param_name'  => 'p_cat',
				'group'       => esc_html__('Post Options', 'nt-agricom'),
				'description' => esc_html__('Enter Team category or write all', 'nt-agricom'),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__('order', 'nt-agricom' ),
				'param_name'  => 'order',
				'group'       => esc_html__('Post Options', 'nt-agricom'),
				'description' => esc_html__('Enter Team order. DESC or ASC', 'nt-agricom'),
			),
			array(
				'type'        => 'textfield',
				'heading'     => esc_html__('orderby', 'nt-agricom' ),
				'param_name'  => 'orderby',
				'group'       => esc_html__('Post Options', 'nt-agricom'),
				'description' => esc_html__('Enter Team orderby. Default is : date', 'nt-agricom'),
			),

			// custom style
			// section heading
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Heading font-size', 'nt-agricom'),
				'param_name'	=> 'hsize',
				'description'	=> esc_html__('Change heading font-size.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Heading line-height', 'nt-agricom'),
				'param_name'	=> 'hlineh',
				'description'	=> esc_html__('Change heading line-height.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Heading color', 'nt-agricom'),
				'param_name'	=> 'hcolor',
				'description'	=> esc_html__('Change heading color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			// section description
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Description font-size', 'nt-agricom'),
				'param_name'	=> 'dsize',
				'description'	=> esc_html__('Change description font-size.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Description line-height', 'nt-agricom'),
				'param_name'	=> 'dlineh',
				'description'	=> esc_html__('Change description line-height.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Description color', 'nt-agricom'),
				'param_name'	=> 'dcolor',
				'description'	=> esc_html__('Change description color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			// team name
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Team name font-size', 'nt-agricom'),
				'param_name'	=> 'tsize',
				'description'	=> esc_html__('Change team team font-size.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Team name line-height', 'nt-agricom'),
				'param_name'	=> 'tlineh',
				'description'	=> esc_html__('Change team name line-height.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Team name color', 'nt-agricom'),
				'param_name'	=> 'tcolor',
				'description'	=> esc_html__('Change team name color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			// team job
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Team job font-size', 'nt-agricom'),
				'param_name'	=> 'jsize',
				'description'	=> esc_html__('Change team job font-size.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Team job line-height', 'nt-agricom'),
				'param_name'	=> 'jlineh',
				'description'	=> esc_html__('Change team job line-height.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Team job color', 'nt-agricom'),
				'param_name'	=> 'jcolor',
				'description'	=> esc_html__('Change team job color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),

			// bd css
			array(
				'type'          => 'css_editor',
				'heading'       => esc_html__('Background CSS', 'nt-agricom' ),
				'param_name'    => 'bgcss',
				'group' 	    => esc_html__('Background options', 'nt-agricom' ),
			),
		),
	));
}
class NT_Agricom_section_team extends WPBakeryShortCode {}
/*-----------------------------------------------------------------------------------*/
/*	PRODUCT LISTS 2 agricom
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Agricom_section_product_list2_integrateWithVC' );
function NT_Agricom_section_product_list2_integrateWithVC() {
	vc_map( array(
		'name'		=> esc_html__( 'Products( No plugin )', 'nt-agricom' ),
		'base'		=> 'nt_agricom_section_product_list2',
		'category'	=> esc_html__( 'NT Agricom', 'nt-agricom'),
		'params'	=> array(

			//heroslider2 loop
			array(
				'type'        => 'param_group',
				'heading'     => esc_html__('Product items', 'nt-agricom' ),
				'param_name'  => 'proloop',
				'group' 	  => esc_html__('Product', 'nt-agricom' ),
				'params' 	  => array(
					array(
						'type' 		  	=> 'attach_image',
						'heading' 	  	=> esc_html__('Product icon image', 'nt-agricom'),
						'param_name'  	=> 'iconimg',
						'description' 	=> esc_html__('Add your icon image', 'nt-agricom'),
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__('Logo image width', 'nt-agricom'),
						'param_name'	=> 'imgwidth',
						'description'	=> esc_html__('Add logo image width.use simple number without ( px or unit ).example: 140', 'nt-agricom'),
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__('Logo image height', 'nt-agricom'),
						'param_name'	=> 'imgheight',
						'description'	=> esc_html__('Add logo image height.use simple number without ( px or unit ).example: 80', 'nt-agricom'),
					),
					array(
						'type'          => 'vc_link',
						'heading'       => esc_html__('Product title and link', 'nt-agricom' ),
						'param_name'    => 'link',
						'description'   => esc_html__('Add custom link.', 'nt-agricom' ),
					),
					array(
						'type'			=> 'textarea',
						'heading'		=> esc_html__('Product description', 'nt-agricom'),
						'param_name'	=> 'desc',
						'description'	=> esc_html__('Add product description', 'nt-agricom'),
					),
					array(
						'type' 		  	=> 'attach_image',
						'heading' 	  	=> esc_html__('Product image', 'nt-agricom'),
						'param_name'  	=> 'img',
						'description' 	=> esc_html__('Add your product image', 'nt-agricom'),
					),
				)
			),
			// team name
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Title font-size', 'nt-agricom'),
				'param_name'	=> 'tsize',
				'description'	=> esc_html__('Change title font-size.use simple number with ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Title line-height', 'nt-agricom'),
				'param_name'	=> 'tlineh',
				'description'	=> esc_html__('Change title line-height.use simple number with ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Title color', 'nt-agricom'),
				'param_name'	=> 'tcolor',
				'description'	=> esc_html__('Change title color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			// section description
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Description font-size', 'nt-agricom'),
				'param_name'	=> 'dsize',
				'description'	=> esc_html__('Change description font-size.use simple number with ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Description line-height', 'nt-agricom'),
				'param_name'	=> 'dlineh',
				'description'	=> esc_html__('Change description line-height.use simple number with ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Description color', 'nt-agricom'),
				'param_name'	=> 'dcolor',
				'description'	=> esc_html__('Change description color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			// BG style
			array(
				'type'          => 'css_editor',
				'heading'       => esc_html__('Background CSS', 'nt-agricom' ),
				'param_name'    => 'bgcss',
				'group' 	    => esc_html__('Background options', 'nt-agricom' ),
			),
		)
	));
} class NT_Agricom_section_product_list2 extends WPBakeryShortCode {}

/*-----------------------------------------------------------------------------------*/
/*	PRODUCT LISTS
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Agricom_section_product_list_integrateWithVC' );
function NT_Agricom_section_product_list_integrateWithVC() {
   vc_map( array(
      'name'       => esc_html__('Products( Plugin )', 'nt-agricom'),
      'base'       => 'nt_agricom_section_product_list',
	  'icon'       => 'icon-wpb-row',
	  'category'   => esc_html__('NT Agricom', 'nt-agricom'),
      'params'     => array(
			//post
			array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__('Woocommerce post per section', 'nt-agricom' ),
				'param_name'  	=> 'woo_posts',
				'description' 	=> esc_html__('Default value 4.', 'nt-agricom'),
				'group' 	  	=> esc_html__('Woo', 'nt-agricom')
			),
			array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__('Woocommerce order', 'nt-agricom' ),
				'param_name'  	=> 'woo_order',
				'description' 	=> __('Enter item order. DESC or ASC', 'nt-agricom'),
				'group' 	  	=> esc_html__('Woo', 'nt-agricom')
			),
			array(
				'type'        	=> 'textfield',
				'heading'     	=> esc_html__('Woocommerce orderby', 'nt-agricom' ),
				'param_name'  	=> 'woo_orderby',
				'description' 	=> __('Enter item orderby. Default is : date', 'nt-agricom'),
				'group' 	  	=> esc_html__('Woo', 'nt-agricom')
			),
			array(
                'type' => 'checkbox',
                'heading' => esc_html__('Show Product Category?', 'nt-agricom'),
                'param_name' => 'showcat',
                'value' => array( esc_html__('Yes', 'nt-agricom') => 'yes' ),
                'group' => esc_html__('Woo', 'nt-agricom'),
            ),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Category Position', 'nt-agricom' ),
				'param_name'	=> 'catposition',
				'description'	=> esc_html__('You can select category position.Bottom Excerpt', 'nt-agricom' ),
				'group' => esc_html__('Woo', 'nt-agricom'),
				'edit_field_class' => 'vc_col-sm-6',
				'value'			=> array(
					esc_html__('Select option', 'nt-agricom' )	=> '',
					esc_html__('Before Product Title', 	'nt-agricom' )	=> 'before-title',
					esc_html__('After Product Title', 	'nt-agricom' )	=> 'after-title',
					esc_html__('Bottom Excerpt', 	'nt-agricom' )	=> 'bottom',
				),
				'dependency' => array(
					'element' => 'showcat',
					'not_empty' => true
				)
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Category Link', 'nt-agricom' ),
				'param_name'	=> 'catlink',
				'description'	=> esc_html__('You can select category link.Default: Product Single Page', 'nt-agricom' ),
				'group' => esc_html__('Woo', 'nt-agricom'),
				'edit_field_class' => 'vc_col-sm-6',
				'value'			=> array(
					esc_html__('Select option', 'nt-agricom' )	=> '',
					esc_html__('Product Single Page', 	'nt-agricom' )	=> 'single',
					esc_html__('Archive Category Page', 'nt-agricom' )	=> 'archive',
				),
				'dependency' => array(
					'element' => 'showcat',
					'not_empty' => true
				)
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Text Before Category', 'nt-agricom' ),
				'param_name'	=> 'beforecat',
				'description'	=> esc_html__('Example: Category: , Categories:', 'nt-agricom' ),
				'group' => esc_html__('Woo', 'nt-agricom'),
				'edit_field_class' => 'vc_col-sm-6',
				'value'			=> '',
				'dependency' => array(
					'element' => 'showcat',
					'not_empty' => true
				)
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Category Separator', 'nt-agricom' ),
				'param_name'	=> 'separator',
				'description'	=> esc_html__('Separator to be used when the product has multiple categories.Example: / or | or - or ,...etc.Default separator is comma.', 'nt-agricom' ),
				'group' => esc_html__('Woo', 'nt-agricom'),
				'edit_field_class' => 'vc_col-sm-6',
				'dependency' => array(
					'element' => 'showcat',
					'not_empty' => true
				)
			),
			array(
                'type' => 'checkbox',
                'heading' => esc_html__('Add bottom line for separate product item.', 'nt-agricom'),
                'param_name' => 'add_border',
                'value' => array( esc_html__('Yes', 'nt-agricom') => 'yes' ),
                'group' => esc_html__('Woo', 'nt-agricom'),
            ),
			array(
                'type' => 'checkbox',
                'heading' => esc_html__('Hide Excerpt', 'nt-agricom'),
                'param_name' => 'showcontent',
                'value' => array( esc_html__('Hide', 'nt-agricom') => 'hide' ),
                'group' => esc_html__('Woo', 'nt-agricom'),
            ),
			// custom style

			// title
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Title font-size', 'nt-agricom'),
				'param_name'	=> 'tsize',
				'description'	=> esc_html__('Change title fontsize.use simple number without ( px or unit ).', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Title line-height', 'nt-agricom'),
				'param_name'	=> 'tlineh',
				'description'	=> esc_html__('Change title line-height.use simple number without ( px or unit ).', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Title color', 'nt-agricom'),
				'param_name'	=> 'tcolor',
				'description'	=> esc_html__('Change title color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			// description
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Description font-size', 'nt-agricom'),
				'param_name'	=> 'dtsize',
				'description'	=> esc_html__('Change section description fontsize.use simple number without ( px or unit )example: 20', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Description line-height', 'nt-agricom'),
				'param_name'	=> 'dtlineh',
				'description'	=> esc_html__('Change section description line-height.use simple number without ( px or unit )example: 30', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Description color', 'nt-agricom'),
				'param_name'	=> 'dtcolor',
				'description'	=> esc_html__('Change section description color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			// bg css
			array(
				'type'			=> 'css_editor',
				'heading'		=> esc_html__('Background CSS', 'nt-agricom'),
				'param_name'	=> 'bgcss',
				'group'			=> esc_html__('Background options', 'nt-agricom'),
			),
		)
    ));
}
class NT_Agricom_section_product_list extends WPBakeryShortCode {}




/*---------------------------------------------------------- COMPONENT -----------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/*	OVERLAY COLOR agricom
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Agricom_overlaycolor_integrateWithVC' );
function NT_Agricom_overlaycolor_integrateWithVC() {
	vc_map( array(
		'name'		=> esc_html__( 'Overlay Color', 'nt-agricom' ),
		'base'		=> 'nt_agricom_section_overlaycolor',
		'category'	=> esc_html__( 'NT Agricom Component', 'nt-agricom'),
		'params'	=> array(
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Overlay color', 'nt-agricom'),
				'param_name'	=> 'bgcolor',
				'description'	=> esc_html__('Add overlay color.', 'nt-agricom'),
			),
		)
	));
} class NT_Agricom_section_overlaycolor extends WPBakeryShortCode {}

/*-----------------------------------------------------------------------------------*/
/*	BUTTON agricom
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Agricom_custombtn_integrateWithVC' );
function NT_Agricom_custombtn_integrateWithVC() {
   vc_map( array(
		'name' 	   	=> esc_html__( 'Button ( Agricom )', 'nt-agricom' ),
		'base' 	   	=> 'nt_agricom_section_custombtn',
		'category'  => esc_html__( 'NT Agricom Component', 'nt-agricom'),
		'params'    => array(
			array(
				'type'          => 'vc_link',
				'heading'       => esc_html__('Button (Link)', 'nt-agricom' ),
				'param_name'    => 'link',
				'description'   => esc_html__('Add custom link.', 'nt-agricom' ),
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Button style', 'nt-agricom' ),
				'param_name'	=> 'btnstyle',
				'description'	=> esc_html__('You can select button style', 'nt-agricom' ),
				'value'			=> array(
					esc_html__('Select option', 'nt-agricom' )	=> '',
					esc_html__('Default button', 	'nt-agricom' )	=> 'btn-default',
					esc_html__('Primary button', 	'nt-agricom' )	=> 'primary',
				),
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Button position', 'nt-agricom' ),
				'param_name'	=> 'btnpos',
				'description'	=> esc_html__('You can select button position', 'nt-agricom' ),
				'value'			=> array(
					esc_html__('Select position', 'nt-agricom' )	=> '',
					esc_html__('Left', 	 'nt-agricom' )	=> 'text-left',
					esc_html__('Center', 'nt-agricom' )	=> 'text-center',
					esc_html__('Right',  'nt-agricom' )	=> 'text-right',
				),
			),
			array(
				'type'			=> 'dropdown',
				'heading'		=> esc_html__('Button size', 'nt-agricom' ),
				'param_name'	=> 'btnsize',
				'description'	=> esc_html__('You can select button size', 'nt-agricom' ),
				'value'			=> array(
					esc_html__('Select option', 'nt-agricom' )	=> '',
					esc_html__('Small', 'nt-agricom' )	=> 'small-btn',
					esc_html__('Big', 	'nt-agricom' )	=> 'big',
					esc_html__('Large', 'nt-agricom' )	=> 'long',
				),
			),

			//custom style
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Button border radius', 'nt-agricom'),
				'param_name'	=> 'btnradius',
				'description'	=> esc_html__('Change button border radius.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Button title color', 'nt-agricom'),
				'param_name'	=> 'btncolor',
				'description'	=> esc_html__('Change button title color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Button background color', 'nt-agricom'),
				'param_name'	=> 'btnbg',
				'description'	=> esc_html__('Change button background color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Button border color', 'nt-agricom'),
				'param_name'	=> 'btnborder',
				'description'	=> esc_html__('Change button border color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Button title hover color', 'nt-agricom'),
				'param_name'	=> 'btnhcolor',
				'description'	=> esc_html__('Change button title hover color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Button background hover color', 'nt-agricom'),
				'param_name'	=> 'btnhbg',
				'description'	=> esc_html__('Change button background hover color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Button border hover color', 'nt-agricom'),
				'param_name'	=> 'btnhborder',
				'description'	=> esc_html__('Change button border hover color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),

		)
	));
} class NT_Agricom_section_custombtn extends WPBakeryShortCode {}

/*-----------------------------------------------------------------------------------*/
/*	COUNTER agricom
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Agricom_counteritem_integrateWithVC' );
function NT_Agricom_counteritem_integrateWithVC() {
	vc_map( array(
		'name'		=> esc_html__( 'Counter Item', 'nt-agricom' ),
		'base'		=> 'nt_agricom_section_counteritem',
		'category'	=> esc_html__( 'NT Agricom Component', 'nt-agricom'),
		'params'	=> array(

			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__('Counter style', 'nt-agricom' ),
				'param_name'  => 'style',
				'description' => esc_html__('You can select counter item style', 'nt-agricom' ),
				'value'       => array(
					esc_html__('Select style', 	'nt-agricom' )	=> '',
					esc_html__('Style 1', 		'nt-agricom' )	=> '1',
					esc_html__('Style 2', 		'nt-agricom' )	=> '2',
				),
			),
			array(
				'type'        => 'dropdown',
				'heading'     => esc_html__('Item icon type', 'nt-agricom' ),
				'param_name'  => 'icontype',
				'description' => esc_html__('You can select icon type as image or fonticon', 'nt-agricom' ),
				'value'       => array(
					esc_html__('Select icon type', 	'nt-agricom' )	=> '',
					esc_html__('Font icon', 	'nt-agricom' )	=> 'iconfont',
					esc_html__('Image icon', 	'nt-agricom' )	=> 'imgicon'
				),
			),
			array(
				'type' 			  => 'textfield',
				'heading' 		  => esc_html__('Font icon name', 'nt-agricom'),
				'param_name' 	  => 'fonticon',
				'description' 	  => esc_html__('Add icon name(fonticon class name). example : fa fa-facebook', 'nt-agricom'),
				'dependency' 	=> array(
					'element' 	=> 'icontype',
					'value'   	=> 'iconfont'
				)
			),
			array(
				'type' 		  	=> 'attach_image',
				'heading' 	  	=> esc_html__('image icon', 'nt-agricom'),
				'param_name'  	=> 'iconimg',
				'description' 	=> esc_html__('Add your image icon', 'nt-agricom'),
				'dependency' 	=> array(
					'element' 	=> 'icontype',
					'value'   	=> 'imgicon'
				)
			),
			array(
				'type' 			  => 'textfield',
				'heading' 		  => esc_html__('Image width', 'nt-agricom'),
				'param_name' 	  => 'imgwidth',
				'description' 	  => esc_html__('Add width for image icon', 'nt-agricom'),
				'dependency' 	=> array(
					'element' 	=> 'icontype',
					'value'   	=> 'imgicon'
				)
			),
			array(
				'type' 			  => 'textfield',
				'heading' 		  => esc_html__('Image height', 'nt-agricom'),
				'param_name' 	  => 'imgheight',
				'description' 	  => esc_html__('Add height for image icon', 'nt-agricom'),
				'dependency' 	=> array(
					'element' 	=> 'icontype',
					'value'   	=> 'imgicon'
				)
			),
			array(
				'type' 			  => 'textarea',
				'heading' 		  => esc_html__('Title', 'nt-agricom'),
				'param_name' 	  => 'title',
				'description' 	  => esc_html__('Add title for item.', 'nt-agricom'),
			),
			array(
				'type' 			  => 'textfield',
				'heading' 		  => esc_html__('Number', 'nt-agricom'),
				'param_name' 	  => 'number',
				'description' 	  => esc_html__('Add number for item.', 'nt-agricom'),
			),
			array(
				'type' 			  => 'textfield',
				'heading' 		  => esc_html__('After number', 'nt-agricom'),
				'param_name' 	  => 'nafter',
				'description' 	  => esc_html__('Add sign( plus or custom ) after number', 'nt-agricom'),
			),

			array(
				'type'			=> 'css_editor',
				'heading'		=> esc_html__('Background CSS', 'nt-agricom' ),
				'param_name'	=> 'bgcss',
				'group'			=> esc_html__('Background options', 'nt-agricom' ),
			),

			//custom style
			//title
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Title font-size', 'nt-agricom'),
				'param_name'	=> 'tsize',
				'description'	=> esc_html__('Change item title fontsize.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Title color', 'nt-agricom'),
				'param_name'	=> 'tcolor',
				'description'	=> esc_html__('Change item title color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			//Number
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Number font-size', 'nt-agricom'),
				'param_name'	=> 'nsize',
				'description'	=> esc_html__('Change item number fontsize.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Number color', 'nt-agricom'),
				'param_name'	=> 'ncolor',
				'description'	=> esc_html__('Change item number color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			//icon
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Icon font-size', 'nt-agricom'),
				'param_name'	=> 'isize',
				'description'	=> esc_html__('Change icon fontsize.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Icon color', 'nt-agricom'),
				'param_name'	=> 'icolor',
				'description'	=> esc_html__('Add icon color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
		)
	));
} class NT_Agricom_section_counteritem extends WPBakeryShortCode {}

/*-----------------------------------------------------------------------------------*/
/*	CIRCLE SKILL BAR agricom
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Agricom_circleskills_integrateWithVC' );
function NT_Agricom_circleskills_integrateWithVC() {
	vc_map( array(
		'name'		=> esc_html__( 'Circle Skill Bar', 'nt-agricom' ),
		'base'		=> 'nt_agricom_section_circleskills',
		'category'	=> esc_html__( 'NT Agricom Component', 'nt-agricom'),
		'params'	=> array(
			array(
				'type' 			  => 'textfield',
				'heading' 		  => esc_html__('Number', 'nt-agricom'),
				'param_name' 	  => 'number',
				'description' 	  => esc_html__('Add number for item.', 'nt-agricom'),
			),
			array(
				'type' 			  => 'textarea',
				'heading' 		  => esc_html__('Title', 'nt-agricom'),
				'param_name' 	  => 'title',
				'description' 	  => esc_html__('Add title for item.', 'nt-agricom'),
			),
			array(
				'type' 			  => 'textfield',
				'heading' 		  => esc_html__('After number', 'nt-agricom'),
				'param_name' 	  => 'nafter',
				'description' 	  => esc_html__('Add sign after number.example: %', 'nt-agricom'),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Bar background color', 'nt-agricom'),
				'param_name'	=> 'barc',
				'description'	=> esc_html__('Change item bar bg color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			//custom style
			//title
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Title font-size', 'nt-agricom'),
				'param_name'	=> 'tsize',
				'description'	=> esc_html__('Change item title fontsize.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Title line-height', 'nt-agricom'),
				'param_name'	=> 'tlineh',
				'description'	=> esc_html__('Change item title line-height.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Title color', 'nt-agricom'),
				'param_name'	=> 'tcolor',
				'description'	=> esc_html__('Change item title color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),

			//Number
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Number font-size', 'nt-agricom'),
				'param_name'	=> 'nsize',
				'description'	=> esc_html__('Change item number fontsize.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Number line-height', 'nt-agricom'),
				'param_name'	=> 'nlineh',
				'description'	=> esc_html__('Change item title line-height.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Number color', 'nt-agricom'),
				'param_name'	=> 'ncolor',
				'description'	=> esc_html__('Change item number color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
		)
	));
} class NT_Agricom_section_circleskills extends WPBakeryShortCode {}


/*-----------------------------------------------------------------------------------*/
/*	GALLERY ITEM agricom
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Agricom_galleryitem_integrateWithVC' );
function NT_Agricom_galleryitem_integrateWithVC() {
	vc_map( array(
		'name'		=> esc_html__( 'Gallery BG Item', 'nt-agricom' ),
		'base'		=> 'nt_agricom_section_galleryitem',
		'category'	=> esc_html__( 'NT Agricom Component', 'nt-agricom'),
		'params'	=> array(
			array(
				'type' 			  => 'textarea',
				'heading' 		  => esc_html__('Title', 'nt-agricom'),
				'param_name' 	  => 'title',
				'description' 	  => esc_html__('Add title for item.', 'nt-agricom'),
			),
			array(
				'type' 		  	=> 'attach_image',
				'heading' 	  	=> esc_html__('Background image', 'nt-agricom'),
				'param_name'  	=> 'bgimg',
				'description' 	=> esc_html__('Add your background image', 'nt-agricom'),
			),
			//bgcolor
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Background color', 'nt-agricom'),
				'param_name'	=> 'bgcolor',
				'description'	=> esc_html__('Change item background color.', 'nt-agricom'),
			),

			//custom style
			//title
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Title font-size', 'nt-agricom'),
				'param_name'	=> 'tsize',
				'description'	=> esc_html__('Change item title fontsize.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Title line-height', 'nt-agricom'),
				'param_name'	=> 'tlineh',
				'description'	=> esc_html__('Change section title line-height.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Title color', 'nt-agricom'),
				'param_name'	=> 'tcolor',
				'description'	=> esc_html__('Change item title color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
		)
	));
} class NT_Agricom_section_galleryitem extends WPBakeryShortCode {}


/*-----------------------------------------------------------------------------------*/
/*	MAP agricom
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Agricom_map_integrateWithVC' );
function NT_Agricom_map_integrateWithVC() {
	vc_map( array(
		'name'		=> esc_html__( 'Google Map', 'nt-agricom' ),
		'base'		=> 'nt_agricom_section_map',
		'category'	=> esc_html__( 'NT Agricom Component', 'nt-agricom'),
		'params'	=> array(
			array(
				'type' 			  => 'textfield',
				'heading' 		  => esc_html__('Map Apikey( required )', 'nt-agricom'),
				'param_name' 	  => 'apikey',
				'description' 	  => esc_html__('Add your google map apikey.', 'nt-agricom'),
			),
			array(
				'type' 			  => 'textfield',
				'heading' 		  => esc_html__('Coordinate 1 (longitude)', 'nt-agricom'),
				'param_name' 	  => 'longitude',
				'description' 	  => esc_html__('Add first your coordinate.', 'nt-agricom'),
			),
			array(
				'type' 			  => 'textfield',
				'heading' 		  => esc_html__('Coordinate 2 (latitude)', 'nt-agricom'),
				'param_name' 	  => 'latitude',
				'description' 	  => esc_html__('Add first your coordinate.', 'nt-agricom'),
			),
			array(
				'type' 			  => 'textfield',
				'heading' 		  => esc_html__('Map min-height', 'nt-agricom'),
				'param_name' 	  => 'minheight',
				'description' 	  => esc_html__('Add map minumum height without px or unit. example:735.', 'nt-agricom'),
			),
			array(
				'type' 		  	=> 'attach_image',
				'heading' 	  	=> esc_html__('Marker image', 'nt-agricom'),
				'param_name'  	=> 'markerimg',
				'description' 	=> esc_html__('Add your map marker image', 'nt-agricom'),
			),
		)
	));
} class NT_Agricom_section_map extends WPBakeryShortCode {}

/*-----------------------------------------------------------------------------------*/
/*	TIMELINE ITEM agricom
/*-----------------------------------------------------------------------------------*/
add_action( 'vc_before_init', 'NT_Agricom_timelineitem_integrateWithVC' );
function NT_Agricom_timelineitem_integrateWithVC() {
	vc_map( array(
		'name'		=> esc_html__( 'Timeline Item', 'nt-agricom' ),
		'base'		=> 'nt_agricom_section_timelineitem',
		'category'	=> esc_html__( 'NT Agricom Component', 'nt-agricom'),
		'params'	=> array(
			array(
				'type' 			  => 'textfield',
				'heading' 		  => esc_html__('Time', 'nt-agricom'),
				'param_name' 	  => 'time',
				'description' 	  => esc_html__('Add time for item.', 'nt-agricom'),
			),
			array(
				'type' 			  => 'textfield',
				'heading' 		  => esc_html__('Title', 'nt-agricom'),
				'param_name' 	  => 'title',
				'description' 	  => esc_html__('Add title for item.', 'nt-agricom'),
			),
			array(
				'type' 			  => 'textarea',
				'heading' 		  => esc_html__('Description', 'nt-agricom'),
				'param_name' 	  => 'desc',
				'description' 	  => esc_html__('Add description for item.', 'nt-agricom'),
			),

			//custom style
			//time
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Time font-size', 'nt-agricom'),
				'param_name'	=> 'tsize',
				'description'	=> esc_html__('Change item time fontsize.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Time line-height', 'nt-agricom'),
				'param_name'	=> 'tlineh',
				'description'	=> esc_html__('Change section time line-height.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Time color', 'nt-agricom'),
				'param_name'	=> 'tcolor',
				'description'	=> esc_html__('Change item time color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			//title
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Title font-size', 'nt-agricom'),
				'param_name'	=> 'tsize',
				'description'	=> esc_html__('Change item title fontsize.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Title line-height', 'nt-agricom'),
				'param_name'	=> 'tlineh',
				'description'	=> esc_html__('Change section title line-height.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Title color', 'nt-agricom'),
				'param_name'	=> 'tcolor',
				'description'	=> esc_html__('Change item title color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			//Description
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Description font-size', 'nt-agricom'),
				'param_name'	=> 'tsize',
				'description'	=> esc_html__('Change item description fontsize.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'textfield',
				'heading'		=> esc_html__('Description line-height', 'nt-agricom'),
				'param_name'	=> 'tlineh',
				'description'	=> esc_html__('Change section description line-height.use simple number without ( px or unit )', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			array(
				'type'			=> 'colorpicker',
				'heading'		=> esc_html__('Description color', 'nt-agricom'),
				'param_name'	=> 'tcolor',
				'description'	=> esc_html__('Change item description color.', 'nt-agricom'),
				'group'			=> esc_html__('Custom Style', 'nt-agricom' ),
			),
			// bg css
			array(
				'type'			=> 'css_editor',
				'heading'		=> esc_html__('Background CSS', 'nt-agricom'),
				'param_name'	=> 'bgcss',
				'group'			=> esc_html__('Background options', 'nt-agricom'),
			),
		)
	));
} class NT_Agricom_section_timelineitem extends WPBakeryShortCode {}



/*******************************/
/* special_offer
/******************************/
if (!function_exists('nt_agricom_special_offer_integrateWithVC')) {
    add_action('vc_before_init', 'nt_agricom_special_offer_integrateWithVC');
    function nt_agricom_special_offer_integrateWithVC()
    {
        vc_map(array(
        'name' => esc_html__('Special Offer', 'agro'),
        'base' => 'nt_agricom_special_offer',
        'icon' => 'nt_logo',
        'category' => 'AGRO',
        'params' => array(
            array(
                'type' => 'attach_image',
                'param_name' => 'img',
                'heading' => esc_html__('Background image', 'agro')
            ),
            array(
                'type' => 'textfield',
                'param_name' => 'title',
                'heading' => esc_html__('Title', 'agro')
            ),
            array(
                'type' => 'checkbox',
                'param_name' => 'anim',
                'heading' => esc_html__('Add animation?', 'agro'),
                'value' => array( esc_html__('Yes', 'agro') => 'yes' )
            ),
            array(
                'type' => 'dropdown',
                'param_name' => 'aos',
                'heading' => esc_html__('Animation', 'agro'),
                'edit_field_class' => 'vc_col-sm-4',
                'value' => agricom_anim_aos(),
                'dependency' => array(
                    'element' => 'anim',
                    'not_empty' => true
                ),
            ),
            array(
                'type' => 'textfield',
                'param_name' => 'delay',
                'heading' => esc_html__('Animation delay', 'agro'),
                'edit_field_class' => 'vc_col-sm-4',
                'dependency' => array(
                    'element' => 'anim',
                    'not_empty' => true
                )
            ),
            array(
                'type' => 'textfield',
                'param_name' => 'offset',
                'heading' => esc_html__('Animation offset', 'agro'),
                'edit_field_class' => 'vc_col-sm-4',
                'dependency' => array(
                    'element' => 'anim',
                    'not_empty' => true
                )
            ),
            // fonts
            array(
                'type' => 'nt_spacer',
                'param_name' => 'fonts_spacer',
                'heading' => esc_html__('Heading Fonts Customize', 'agro'),
                'group' => esc_html__('Fonts', 'agro')
            ),
            array(
                'type' => 'checkbox',
                'param_name' => 'usefonts',
                'heading' => esc_html__('Use Google Fonts?', 'agro'),
                'value' => array( esc_html__('Yes', 'agro') => 'yes' ),
                'group' => esc_html__('Fonts', 'agro'),
            ),
            array(
                'type' => 'dropdown',
                'heading' => esc_html__('Text tag', 'agro'),
                'param_name' => 'htag',
                'group' => esc_html__('Fonts', 'agro'),
                'value' => array(
                    esc_html__('Select tag', 'agro') => '',
                    esc_html__('h1', 'agro') => 'h1',
                    esc_html__('h2', 'agro') => 'h2',
                    esc_html__('h3', 'agro') => 'h3',
                    esc_html__('h4', 'agro') => 'h4',
                    esc_html__('h5', 'agro') => 'h5',
                    esc_html__('h6', 'agro') => 'h6',
                    esc_html__('div', 'agro') => 'div',
                    esc_html__('p', 'agro') => 'p',
                    esc_html__('span', 'agro') => 'span'
                )
            ),
            array(
                'type' => 'textfield',
                'param_name' => 'tsize',
                'heading' => esc_html__('Font size', 'agro'),
                'group' => esc_html__('Fonts', 'agro'),
                'edit_field_class' => 'vc_col-sm-6'
            ),
            array(
                'type' => 'textfield',
                'param_name' => 'lheight',
                'heading' => esc_html__('Line height', 'agro'),
                'group' => esc_html__('Fonts', 'agro'),
                'edit_field_class' => 'vc_col-sm-6'
            ),
            array(
                'type' => 'google_fonts',
                'param_name' => 'google_fonts',
                'value' => 'font_family:Abril%20Fatface%3Aregular|font_style:400%20regular%3A400%3Anormal',
                'group' => esc_html__('Fonts', 'agro'),
                'settings' => array(
                    'fields' => array(
                        'font_family_description' => esc_html__( 'Select font family.', 'agro' ),
                        'font_style_description' => esc_html__( 'Select font styling.', 'agro' )
                    )
                ),
                'dependency' => array(
                    'element' => 'usefonts',
                    'not_empty' => true
                )
            ),
            //Background CSS
            array(
                'type' => 'css_editor',
                'param_name' => 'css',
                'heading' => esc_html__('Background CSS', 'agro'),
                'group' => esc_html__('Background', 'agro')
            )
        )));
    }
}