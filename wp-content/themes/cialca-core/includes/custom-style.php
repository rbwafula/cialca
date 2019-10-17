<?php function nt_agricom_css_options()
{

    /* CSS to output */
    $theCSS = '';

    $mobile_breakpoint = ot_get_option( 'nt_agricom_nav_mobile_breakpoint' );
    $mb_breakpoint = ($mobile_breakpoint != '' && $mobile_breakpoint > 782 ) ? $mobile_breakpoint : 782;

	// admin bar
	if( is_admin_bar_showing() && ! is_customize_preview() ) {
		$theCSS .= '
        #top-bar { margin-top: 32px; }
		@media (max-width: 768px) {
			#top-bar { margin-top: 46px; }
			#top-bar.fixed { margin-top: 46px; }
		}
		@media (min-width: '.$mb_breakpoint.'px) {
			#top-bar { margin-top: 0px !important; }
			#top-bar.fixed { margin-top: 32px !important; }
			body #top-bar.mobile-header-after-scroll.fixed { margin-top: 32px !important; }
		}
		@media (max-width: 600px) {
			html.mobile,html.desktop { margin-top: 0px !important; }
			#top-bar { margin-top: 46px !important; }
			body #top-bar.mobile-header-after-scroll { margin-top: 0px !important; }
		}
		@media (max-width: 480px) {
			#header.header-style-3 { top: 92px; }
			#header { top: 46px; }
		}';

	}

	function nt_agricom_hex2rgb($hex)
    {
    	$hex = str_replace("#", "", $hex);

    	if(strlen($hex) == 3) {
        	$r = hexdec(substr($hex,0,1).substr($hex,0,1));
        	$g = hexdec(substr($hex,1,1).substr($hex,1,1));
        	$b = hexdec(substr($hex,2,1).substr($hex,2,1));
    	} else {
        	$r = hexdec(substr($hex,0,2));
        	$g = hexdec(substr($hex,2,2));
        	$b = hexdec(substr($hex,4,2));
    	}
    	$rgb = array($r, $g, $b);

    	return $rgb; // returns an array with the rgb values
	}

	function nt_agricom_colourBrightness($hex, $percent)
    {
		// Work out if hash given
		$hash = '';
		if (stristr($hex,'#')) {
			$hex = str_replace('#','',$hex);
			$hash = '#';
		}
		/// HEX TO RGB
		$rgb = array(hexdec(substr($hex,0,2)), hexdec(substr($hex,2,2)), hexdec(substr($hex,4,2)));
		//// CALCULATE
		for ($i=0; $i<3; $i++) {
			// See if brighter or darker
			if ($percent > 0) {
				// Lighter
				$rgb[$i] = round($rgb[$i] * $percent) + round(255 * (1-$percent));
			} else {
				// Darker
				$positivePercent = $percent - ($percent*2);
				$rgb[$i] = round($rgb[$i] * $positivePercent) + round(0 * (1-$positivePercent));
			}
			// In case rounding up causes us to go to 256
			if ($rgb[$i] > 255) {
				$rgb[$i] = 255;
			}
		}
		//// RBG to Hex
		$hex = '';
		for($i=0; $i < 3; $i++) {
			// Convert the decimal digit to hex
			$hexDigit = dechex($rgb[$i]);
			// Add a leading zero if necessary
			if(strlen($hexDigit) == 1) {
			$hexDigit = "0" . $hexDigit;
			}
			// Append to the hex string
			$hex .= $hexDigit;
		}
		return $hash.$hex;
	}


	// preloader
	if ( ot_get_option( 'nt_agricom_pre' ) !='off' ) :
		$theCSS .= 'div#preloader {';
		if ( ot_get_option( 'nt_agricom_prebgcolor' ) !='' ) :
			$theCSS .= 'background-color: '.esc_attr( ot_get_option( 'nt_agricom_prebgcolor' ) ).';';
		else :
			$theCSS .= 'background-color: #ecf0f1;';
		endif;

		   $theCSS .= ' overflow: hidden;
			background-repeat: no-repeat;
			background-position: center center;
			height: 100%;
			left: 0;
			position: fixed;
			top: 0;
			width: 100%;
			z-index: 1000;
		}';
	endif;


	if ( ot_get_option( 'nt_agricom_prespincolor' ) !='' ) :

		$prespincolor = ot_get_option( 'nt_agricom_prespincolor' );
		$pre_spincolor = nt_agricom_hex2rgb($prespincolor);
		$pre_spin_color = implode(", ", $pre_spincolor);

		if ( ot_get_option( 'nt_agricom_pre_type' ) =='01' ) { $theCSS .= '.loader01:after { background: '.$prespincolor.'!important;}';
		$theCSS .= '.loader01 { border:8px solid '.$prespincolor.'!important; border-right-color: transparent!important;}';}
		if ( ot_get_option( 'nt_agricom_pre_type' ) =='02' ) { $theCSS .= '.loader02 { border: 8px solid rgba('.$pre_spin_color.', 0.25)!important;}';
		$theCSS .= '.loader02 { border-top-color: '.$prespincolor.'!important;}'; }
		if ( ot_get_option( 'nt_agricom_pre_type' ) =='03' ) { $theCSS .= '.loader03{ border-top-color: '.$prespincolor.'!important;}';
		$theCSS .= '.loader03 { border-bottom-color: '.$prespincolor.'!important;}';}
		if ( ot_get_option( 'nt_agricom_pre_type' ) =='04' ) { $theCSS .= '.loader04 { border: 2px solid rgba('.$pre_spin_color.', 0.5)!important;}';
		$theCSS .= '.loader04:after { background: '.$prespincolor.'!important;}';}
		if ( ot_get_option( 'nt_agricom_pre_type' ) =='05' ) { $theCSS .= '.loader05 { border-color: '.$prespincolor.'!important;}'; }
		if ( ot_get_option( 'nt_agricom_pre_type' ) =='06' ) { $theCSS .= '.loader06:before { border: 4px solid rgba('.$pre_spin_color.', 0.5)!important;}';
		$theCSS .= '.loader06:after { border: 4px solid '.$prespincolor.';}';}

		if ( ot_get_option( 'nt_agricom_pre_type' ) =='07' ) {
		$theCSS .= '@keyframes loader-circles {
		  0% {
			box-shadow: 0 -27px 0 0 rgba('.$pre_spin_color.', 0.05), 19px -19px 0 0 rgba('.$pre_spin_color.', 0.1), 27px 0 0 0 rgba('.$pre_spin_color.', 0.2), 19px 19px 0 0 rgba('.$pre_spin_color.', 0.3), 0 27px 0 0 rgba('.$pre_spin_color.', 0.4), -19px 19px 0 0 rgba('.$pre_spin_color.', 0.6), -27px 0 0 0 rgba('.$pre_spin_color.', 0.8), -19px -19px 0 0 '.$prespincolor.'; }
		  12.5% {
			box-shadow: 0 -27px 0 0 '.$prespincolor.', 19px -19px 0 0 rgba('.$pre_spin_color.', 0.05), 27px 0 0 0 rgba('.$pre_spin_color.', 0.1), 19px 19px 0 0 rgba('.$pre_spin_color.', 0.2), 0 27px 0 0 rgba('.$pre_spin_color.', 0.3), -19px 19px 0 0 rgba('.$pre_spin_color.', 0.4), -27px 0 0 0 rgba('.$pre_spin_color.', 0.6), -19px -19px 0 0 rgba('.$pre_spin_color.', 0.8); }
		  25% {
			box-shadow: 0 -27px 0 0 rgba('.$pre_spin_color.', 0.8), 19px -19px 0 0 '.$prespincolor.', 27px 0 0 0 rgba('.$pre_spin_color.', 0.05), 19px 19px 0 0 rgba('.$pre_spin_color.', 0.1), 0 27px 0 0 rgba('.$pre_spin_color.', 0.2), -19px 19px 0 0 rgba('.$pre_spin_color.', 0.3), -27px 0 0 0 rgba('.$pre_spin_color.', 0.4), -19px -19px 0 0 rgba('.$pre_spin_color.', 0.6); }
		  37.5% {
			box-shadow: 0 -27px 0 0 rgba('.$pre_spin_color.', 0.6), 19px -19px 0 0 rgba('.$pre_spin_color.', 0.8), 27px 0 0 0 '.$prespincolor.', 19px 19px 0 0 rgba('.$pre_spin_color.', 0.05), 0 27px 0 0 rgba('.$pre_spin_color.', 0.1), -19px 19px 0 0 rgba('.$pre_spin_color.', 0.2), -27px 0 0 0 rgba('.$pre_spin_color.', 0.3), -19px -19px 0 0 rgba('.$pre_spin_color.', 0.4); }
		  50% {
			box-shadow: 0 -27px 0 0 rgba('.$pre_spin_color.', 0.4), 19px -19px 0 0 rgba('.$pre_spin_color.', 0.6), 27px 0 0 0 rgba('.$pre_spin_color.', 0.8), 19px 19px 0 0 '.$prespincolor.', 0 27px 0 0 rgba('.$pre_spin_color.', 0.05), -19px 19px 0 0 rgba('.$pre_spin_color.', 0.1), -27px 0 0 0 rgba('.$pre_spin_color.', 0.2), -19px -19px 0 0 rgba('.$pre_spin_color.', 0.3); }
		  62.5% {
			box-shadow: 0 -27px 0 0 rgba('.$pre_spin_color.', 0.3), 19px -19px 0 0 rgba('.$pre_spin_color.', 0.4), 27px 0 0 0 rgba('.$pre_spin_color.', 0.6), 19px 19px 0 0 rgba('.$pre_spin_color.', 0.8), 0 27px 0 0 '.$prespincolor.', -19px 19px 0 0 rgba('.$pre_spin_color.', 0.05), -27px 0 0 0 rgba('.$pre_spin_color.', 0.1), -19px -19px 0 0 rgba('.$pre_spin_color.', 0.2); }
		  75% {
			box-shadow: 0 -27px 0 0 rgba('.$pre_spin_color.', 0.2), 19px -19px 0 0 rgba('.$pre_spin_color.', 0.3), 27px 0 0 0 rgba('.$pre_spin_color.', 0.4), 19px 19px 0 0 rgba('.$pre_spin_color.', 0.6), 0 27px 0 0 rgba('.$pre_spin_color.', 0.8), -19px 19px 0 0 '.$prespincolor.', -27px 0 0 0 rgba('.$pre_spin_color.', 0.05), -19px -19px 0 0 rgba('.$pre_spin_color.', 0.1); }
		  87.5% {
			box-shadow: 0 -27px 0 0 rgba('.$pre_spin_color.', 0.1), 19px -19px 0 0 rgba('.$pre_spin_color.', 0.2), 27px 0 0 0 rgba('.$pre_spin_color.', 0.3), 19px 19px 0 0 rgba('.$pre_spin_color.', 0.4), 0 27px 0 0 rgba('.$pre_spin_color.', 0.6), -19px 19px 0 0 rgba('.$pre_spin_color.', 0.8), -27px 0 0 0 '.$prespincolor.', -19px -19px 0 0 rgba('.$pre_spin_color.', 0.05); }
		  100% {
			box-shadow: 0 -27px 0 0 rgba('.$pre_spin_color.', 0.05), 19px -19px 0 0 rgba('.$pre_spin_color.', 0.1), 27px 0 0 0 rgba('.$pre_spin_color.', 0.2), 19px 19px 0 0 rgba('.$pre_spin_color.', 0.3), 0 27px 0 0 rgba('.$pre_spin_color.', 0.4), -19px 19px 0 0 rgba('.$pre_spin_color.', 0.6), -27px 0 0 0 rgba('.$pre_spin_color.', 0.8), -19px -19px 0 0 '.$prespincolor.'; } }';
		}
		if ( ot_get_option( 'nt_agricom_pre_type' ) =='08' ) {
		$theCSS .= '@keyframes loader08 {
		  0%, 100% {
			box-shadow: -13px 20px 0 '.$prespincolor.', 13px 20px 0 rgba('.$pre_spin_color.', 0.2), 13px 46px 0 rgba('.$pre_spin_color.', 0.2), -13px 46px 0 rgba('.$pre_spin_color.', 0.2); }
		  25% {
			box-shadow: -13px 20px 0 rgba('.$pre_spin_color.', 0.2), 13px 20px 0 '.$prespincolor.', 13px 46px 0 rgba('.$pre_spin_color.', 0.2), -13px 46px 0 rgba('.$pre_spin_color.', 0.2); }
		  50% {
			box-shadow: -13px 20px 0 rgba('.$pre_spin_color.', 0.2), 13px 20px 0 rgba('.$pre_spin_color.', 0.2), 13px 46px 0 '.$prespincolor.', -13px 46px 0 rgba('.$pre_spin_color.', 0.2); }
		  75% {
			box-shadow: -13px 20px 0 rgba('.$pre_spin_color.', 0.2), 13px 20px 0 rgba('.$pre_spin_color.', 0.2), 13px 46px 0 rgba('.$pre_spin_color.', 0.2), -13px 46px 0 '.$prespincolor.'; } }';
		}
		if ( ot_get_option( 'nt_agricom_pre_type' ) =='09' ) {
			$theCSS .= '.loader09, .loader09:after, .loader09:before { background: '.$prespincolor.'!important;}';

			$theCSS .= '@keyframes loader09 {
			  0%, 100% {
				box-shadow: 0 0 0 '.$prespincolor.', 0 0 0 '.$prespincolor.'; }
			  50% {
				box-shadow: 0 -8px 0 '.$prespincolor.', 0 8px 0 '.$prespincolor.'; } }
			}';
		}
		if ( ot_get_option( 'nt_agricom_pre_type' ) =='10' ) {
			$theCSS .= '@keyframes loader10 {
			  0% {
				box-shadow: 0 28px 0 -28px '.$prespincolor.'; }
			  100% {
				box-shadow: 0 28px 0 '.$prespincolor.'; } }';
		}
		if ( ot_get_option( 'nt_agricom_pre_type' ) =='11' ) {

			$theCSS .= ' .loader11::after, .loader11::before {box-shadow: 0 40px 0 '.$prespincolor.'; }';
			$theCSS .= '@keyframes loader11 {
		  0% {
			box-shadow: 0 40px 0 '.$prespincolor.'; }
		  100% {
			box-shadow: 0 20px 0 '.$prespincolor.'; } }';
		}
		if ( ot_get_option( 'nt_agricom_pre_type' ) =='12' ) {
			$theCSS .= '@keyframes loader12 {
			  0% {
				box-shadow: -60px 40px 0 2px '.$prespincolor.', -30px 40px 0 0 rgba('.$pre_spin_color.', 0.2), 0 40px 0 0 rgba('.$pre_spin_color.', 0.2), 30px 40px 0 0 rgba('.$pre_spin_color.', 0.2), 60px 40px 0 0 rgba('.$pre_spin_color.', 0.2); }
			  25% {
				box-shadow: -60px 40px 0 0 rgba('.$pre_spin_color.', 0.2), -30px 40px 0 2px '.$prespincolor.', 0 40px 0 0 rgba('.$pre_spin_color.', 0.2), 30px 40px 0 0 rgba('.$pre_spin_color.', 0.2), 60px 40px 0 0 rgba('.$pre_spin_color.', 0.2); }
			  50% {
				box-shadow: -60px 40px 0 0 rgba('.$pre_spin_color.', 0.2), -30px 40px 0 0 rgba('.$pre_spin_color.', 0.2), 0 40px 0 2px '.$prespincolor.', 30px 40px 0 0 rgba('.$pre_spin_color.', 0.2), 60px 40px 0 0 rgba('.$pre_spin_color.', 0.2); }
			  75% {
				box-shadow: -60px 40px 0 0 rgba('.$pre_spin_color.', 0.2), -30px 40px 0 0 rgba('.$pre_spin_color.', 0.2), 0 40px 0 0 rgba('.$pre_spin_color.', 0.2), 30px 40px 0 2px '.$prespincolor.', 60px 40px 0 0 rgba('.$pre_spin_color.', 0.2); }
			  100% {
				box-shadow: -60px 40px 0 0 rgba('.$pre_spin_color.', 0.2), -30px 40px 0 0 rgba('.$pre_spin_color.', 0.2), 0 40px 0 0 rgba('.$pre_spin_color.', 0.2), 30px 40px 0 0 rgba('.$pre_spin_color.', 0.2), 60px 40px 0 2px '.$prespincolor.'; } }';
		}
    endif;

        // frontpage custom color
        $nt_agricom_theme_color = ot_get_option( 'nt_agricom_theme_color' ) ;
        $custom_color = ot_get_option( 'nt_agricom_custom_color' ) ;
        $one_color2 = ot_get_option( 'nt_agricom_custom_color2' ) ;

        if( $nt_agricom_theme_color == 'custom' ) {

            $one_color = $custom_color;

        }else{

            $one_color = $nt_agricom_theme_color;

        }

        if ( $one_color !='' OR  $one_color2 !='') {

            $theCSS .= '

            body.error404 .index .searchform input[type="submit"], body.search article .searchform input[type="submit"], #widget-area #searchform input#searchsubmit, #respond input:hover, .pager li > span, .pager li > a, .widget-title:after {
                background-color:'.esc_attr( $one_color ).';
            }

            body.error404 .index .searchform input[type="submit"]:hover, body.search article .searchform input[type="submit"]:hover, input[type="button"]:hover, input[type="submit"]:hover, input[type="reset"]:hover {
                background-color: '.nt_agricom_colourBrightness($one_color,-0.9).';
            }

            a:hover, a:focus{ color: '.nt_agricom_colourBrightness($one_color,-0.8).'; }
            #widget-area .widget ul li a:hover, .entry-title a:hover, .entry-meta a, #share-buttons i:hover {
                color:'.esc_attr( $one_color ).';
            }

            input[type="color"]:focus, input[type="date"]:focus, input[type="datetime"]:focus, input[type="datetime-local"]:focus, input[type="email"]:focus, input[type="month"]:focus, input[type="number"]:focus, input[type="password"]:focus, .ie input[type="range"]:focus, .ie9 input[type="range"]:focus, input[type="search"]:focus, input[type="tel"]:focus, input[type="text"]:focus, input[type="time"]:focus, input[type="url"]:focus, input[type="week"]:focus, select:focus, textarea:focus, .pager li > a, .pager li > span  {
                border-color:'.esc_attr( $one_color ).';
            }

            .breadcrubms, .breadcrubms span a span {
                color: '.nt_agricom_colourBrightness($one_color,0.7).';
            }
            .breadcrubms span {
                color: '.nt_agricom_colourBrightness($one_color,-0.6).';
            }
            .breadcrubms span a span:hover, .text-logo:hover {
                color: '.nt_agricom_colourBrightness($one_color,-0.8).';
            }

            .owl-theme .owl-dots .owl-dot span {
                -webkit-box-shadow: 0 0 0 0 '.esc_attr( $one_color ).' inset; box-shadow: 0 0 0 0 '.esc_attr( $one_color ).' inset;
            }
            .owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span {
                -webkit-box-shadow: 0 0 0 8px '.esc_attr( $one_color ).' inset; box-shadow: 0 0 0 8px '.esc_attr( $one_color ).' inset;
            }

            a,a:hover, a:focus,.timeline__year, .timeline__title,.blog__post-date, .page-contacts .contact__item__ico, .single-content .details .title,
            .page-blog .intro__post-date a ,#footer.footer--style-3 .company-contacts address i, #footer.footer--style-3 .company-contacts .social-btns,.single-content .dropcaps:first-letter, .counter__item,.page-blog .intro__post-date a {
                color: '.esc_attr( $one_color ).';
            }
            .section--background-base,.pattern,.top-bar--style-3 #top-bar__navigation a:not(.custom-btn):after,
            .top-bar--style-3 #top-bar__navigation li:not(.li-btn).active > a, .top-bar--style-3 #top-bar__navigation li:not(.li-btn).current > a, .top-bar--style-3 #top-bar__navigation li:not(.li-btn):hover > a,.team__item__inner,.gallery__item__inner,.section-contact .bg-1,.products--style-2 .product__item figure {
                background-color: '.esc_attr( $one_color ).';
            }
            form .textfield:hover, form .textfield:focus,.skill__chart  {
                border-color: '.esc_attr( $one_color ).';
            }

            #vegas-slider .vegas-dots a {
                background-color: '.esc_attr( $one_color ).';
                box-shadow: 0 0 0 0 '.esc_attr( $one_color ).' inset;
            }

            #top-bar__navigation a:not(.custom-btn):after ,.owl-theme .owl-dots .owl-dot span, #top-bar__navigation a:not(.custom-btn):after ,.custom-btn.primary:hover, .custom-btn.primary:focus, .custom-btn.primary:active,.owl-theme .owl-dots .owl-dot span ,.woocommerce span.onsale ,.error404 #searchform input[type="submit"]:active, .error404 #searchform input[type="submit"]:focus, .error404 #searchform input[type="submit"]:hover,.start-screen__content .custom-btn.primary,footer .widget input.wpcf7-form-control.wpcf7-submit, .start-screen__content .custom-btn.primary {
                background-color: '.esc_attr( $one_color2 ).';
            }
            #top-bar__navigation li:not(.li-btn).active > a, #top-bar__navigation li:not(.li-btn).current > a, #top-bar__navigation li:not(.li-btn):hover > a,#top-bar__navigation li:not(.li-btn).active > a, #top-bar__navigation li:not(.li-btn).current > a, #top-bar__navigation li:not(.li-btn):hover > a ,.breadcrubms span ,#vegas-slider .vegas-control__btn:hover,.page-blog .intro__post-date a {
                color: '.esc_attr( $one_color2 ).';
            }

            #vegas-slider .vegas-dots a {
                background-color: '.esc_attr( $one_color2 ).';
                box-shadow: 0 0 0 0 #4a8b71 inset;
            }
            footer .widget input.wpcf7-form-control.wpcf7-submit:hover {
                background-color: '.esc_attr( $one_color2 ).';
                border-color: '.esc_attr( $one_color2 ).';
            }
            .error404 #searchform input[type="submit"] {
                border-color: '.esc_attr( $one_color2 ).';
            }

            #gallery-set a.selected, #gallery-set a:hover ,#gallery-set a.selected, #gallery-set a:hover ,.custom-btn.primary {
                border-color: '.esc_attr( $one_color2 ).'; color: #504935;
            }';
        }
        //backtotop
        $nt_agricom_btbtn_lh = esc_attr( ot_get_option( 'nt_agricom_btbtn_lh' ) );
        $nt_agricom_btbtn_br = esc_attr( ot_get_option( 'nt_agricom_btbtn_br' ) );
        $nt_agricom_btbtn_fs = esc_attr( ot_get_option( 'nt_agricom_btbtn_fs' ) );
        $nt_agricom_btbtn_c = esc_attr( ot_get_option( 'nt_agricom_btbtn_c' ) );
        $nt_agricom_btbtn_bg = esc_attr( ot_get_option( 'nt_agricom_btbtn_bg' ) );
        $nt_agricom_btbtn_bgh = esc_attr( ot_get_option( 'nt_agricom_btbtn_bgh' ) );
        $backtotop = ( ot_get_option( 'nt_agricom_backtotop_dimension', array() ) );

        if ( $nt_agricom_btbtn_lh !=0 ) { $theCSS .= '#btn-to-top-wrap #btn-to-top{line-height:' .$nt_agricom_btbtn_lh . 'px!important;}'; }
        if ( $nt_agricom_btbtn_br !=0 ) { $theCSS .= '#btn-to-top-wrap #btn-to-top{border-radius:' . $nt_agricom_btbtn_br . 'px!important;}'; }
        if ( $nt_agricom_btbtn_fs !=0 ) { $theCSS .= '#btn-to-top-wrap #btn-to-top{font-size:' . $nt_agricom_btbtn_fs . 'px!important;}'; }
        if ( $nt_agricom_btbtn_c !='' ) { $theCSS .= '#btn-to-top-wrap #btn-to-top:before{border-bottom-color:' . $nt_agricom_btbtn_c . '!important;}'; }
        if ( $nt_agricom_btbtn_bg !='' ) { $theCSS .= '#btn-to-top-wrap #btn-to-top{background-color:' . $nt_agricom_btbtn_bg . '!important;}'; }
        if ( $nt_agricom_btbtn_bgh !='' ) { $theCSS .= '#btn-to-top-wrap #btn-to-top:hover{background-color:' . $nt_agricom_btbtn_bgh . '!important;}'; }
        // backtotop btn dimension
        if(isset($backtotop['unit'])) { $btunit = $backtotop['unit'];}else{ $btunit = 'px'; }
        if(isset($backtotop['width'])) { $theCSS .= '#btn-to-top-wrap #btn-to-top{ width:' . $backtotop['width'] .''. $btunit . ' !important; }'; }
        if(isset($backtotop['height'])) { $theCSS .= '#btn-to-top-wrap #btn-to-top{ height:' . $backtotop['height'] .''. $btunit . ' !important; }'; }


        if ( $mobile_breakpoint != '' && $mobile_breakpoint != '768' ) {
            // nav responsive
            $theCSS .= '@media only screen and (min-width: ' . $mobile_breakpoint . 'px) {
                  #top-bar { position: absolute; padding-top: 20px; padding-bottom: 20px; }
                  #top-bar.fixed { position: fixed !important; top: 0 !important; padding-top: 15px; padding-bottom: 15px; min-height: 80px; background-color: #fff !important; }
                  .desktop #top-bar.fixed { -webkit-animation-duration: .3s; animation-duration: .3s; -webkit-animation-fill-mode: both; animation-fill-mode: both; }
                  .desktop #top-bar.fixed.in { -webkit-animation-name: TopBarSlideInDown; animation-name: TopBarSlideInDown; }
                  .desktop #top-bar.fixed.out { -webkit-animation-name: TopBarSlideOutUp; animation-name: TopBarSlideOutUp; }
                  #top-bar.fixed #top-bar__navigation { padding-top: 20px; }
                  #top-bar__navigation { position: relative; top: auto; right: auto; bottom: auto; left: auto; padding-top: 20px; padding-left: 30px; margin-left: 45px; text-align: left; overflow-y: visible; display: block; }
                  #top-bar__navigation:before { content: none; }
                  #top-bar__navigation > ul { display: block; }
                  #top-bar__navigation li { display: inline-block; vertical-align: middle; margin-top: 0; margin-left: 20px; }
                  #top-bar__navigation li:first-child { margin-left: 0; }
                  #top-bar__navigation li.li-btn { float: right; margin-top: -18px; }
                  #top-bar__navigation li:hover > .submenu { padding-top: 10px; visibility: visible; opacity: 1; }
                  #top-bar__navigation .submenu { display: block; position: absolute; top: 100%; left: 5px; width: 200px; padding-top: 30px; visibility: hidden; opacity: 0; z-index: 3; -webkit-transition: opacity 0.2s ease-in-out, margin-left 0.2s ease-in-out, margin-right 0.2s ease-in-out, padding-top 0.2s ease-in-out, visibility 0.2s ease-in-out; transition: opacity 0.2s ease-in-out, margin-left 0.2s ease-in-out, margin-right 0.2s ease-in-out, padding-top 0.2s ease-in-out, visibility 0.2s ease-in-out; }
                  #top-bar__navigation .submenu ul { background-color: #282828; margin-left: 0; padding: 30px; }
                  #top-bar__navigation .submenu li { display: block; margin-top: 20px; margin-left: 0; }
                  #top-bar__navigation .submenu li:first-child { margin-top: 0; }
                  #top-bar__navigation .submenu a { color: #fff; }
                  #top-bar__navigation-toggler { display: none; }
                  .top-bar--style-1:not(.fixed) { top: 20px !important; background-color: transparent !important; }
                  .top-bar--style-1:not(.fixed) #top-bar__navigation > ul > li > a:not(:hover):not(:focus) { color: #fff; }
                  .top-bar--style-3:not(.fixed) { top: 15px !important; background-color: transparent !important; }
                  .top-bar--style-3:not(.fixed) .container:before { content: ""; position: absolute; top: -20px; right: -5px; bottom: -20px; left: -5px; background-color: #fff; }
            }';
        } else {
            $theCSS .= '@media only screen and (min-width: 768px) {
                  #top-bar { position: absolute; padding-top: 20px; padding-bottom: 20px; }
                  #top-bar.fixed { position: fixed !important; top: 0 !important; padding-top: 15px; padding-bottom: 15px; min-height: 80px; background-color: #fff !important; }
                  .desktop #top-bar.fixed { -webkit-animation-duration: .3s; animation-duration: .3s; -webkit-animation-fill-mode: both; animation-fill-mode: both; }
                  .desktop #top-bar.fixed.in { -webkit-animation-name: TopBarSlideInDown; animation-name: TopBarSlideInDown; }
                  .desktop #top-bar.fixed.out { -webkit-animation-name: TopBarSlideOutUp; animation-name: TopBarSlideOutUp; }
                  #top-bar.fixed #top-bar__navigation { padding-top: 20px; }
                  #top-bar__navigation { position: relative; top: auto; right: auto; bottom: auto; left: auto; padding-top: 20px; padding-left: 30px; margin-left: 45px; text-align: left; overflow-y: visible; display: block; }
                  #top-bar__navigation:before { content: none; }
                  #top-bar__navigation > ul { display: block; }
                  #top-bar__navigation li { display: inline-block; vertical-align: middle; margin-top: 0; margin-left: 20px; }
                  #top-bar__navigation li:first-child { margin-left: 0; }
                  #top-bar__navigation li.li-btn { float: right; margin-top: -18px; }
                  #top-bar__navigation li:hover > .submenu { padding-top: 10px; visibility: visible; opacity: 1; }
                  #top-bar__navigation .submenu { display: block; position: absolute; top: 100%; left: 5px; width: 200px; padding-top: 30px; visibility: hidden; opacity: 0; z-index: 3; -webkit-transition: opacity 0.2s ease-in-out, margin-left 0.2s ease-in-out, margin-right 0.2s ease-in-out, padding-top 0.2s ease-in-out, visibility 0.2s ease-in-out; transition: opacity 0.2s ease-in-out, margin-left 0.2s ease-in-out, margin-right 0.2s ease-in-out, padding-top 0.2s ease-in-out, visibility 0.2s ease-in-out; }
                  #top-bar__navigation .submenu ul { background-color: #282828; margin-left: 0; padding: 30px; }
                  #top-bar__navigation .submenu li { display: block; margin-top: 20px; margin-left: 0; }
                  #top-bar__navigation .submenu li:first-child { margin-top: 0; }
                  #top-bar__navigation .submenu a { color: #fff; }
                  #top-bar__navigation-toggler { display: none; }
                  .top-bar--style-1:not(.fixed) { top: 20px !important; background-color: transparent !important; }
                  .top-bar--style-1:not(.fixed) #top-bar__navigation > ul > li > a:not(:hover):not(:focus) { color: #fff; }
                  .top-bar--style-3:not(.fixed) { top: 15px !important; background-color: transparent !important; }
                  .top-bar--style-3:not(.fixed) .container:before { content: ""; position: absolute; top: -20px; right: -5px; bottom: -20px; left: -5px; background-color: #fff; }
            }';
        }

        //static nav
        $static_nav_bg = esc_attr( ot_get_option( 'nt_agricom_nav_bg' ) );
        $static_navitem = esc_attr( ot_get_option( 'nt_agricom_nav_item' ) );
        $static_navitemhover = esc_attr( ot_get_option( 'nt_agricom_nav_itemhover' ) );
        $nav_item_fs = esc_attr( ot_get_option( 'nt_agricom_nav_item_fs' ) );

        if ( $static_nav_bg !='' ) { $theCSS .= '.top-bar--style-1:not(.fixed), .top-bar--style-3:not(.fixed) .container:before {background-color:' . $static_nav_bg . '!important;}';
        $theCSS .= '@media only screen and (min-width: 768px) {.top-bar--style-1:not(.fixed) {top:0px !important;}}';
        }
        if ( $nav_item_fs !=0 ) { $theCSS .= '#top-bar__navigation a:not(.custom-btn) {font-size:' . $nav_item_fs . 'px!important;}'; }
        if ( $static_navitem !='' ) { $theCSS .= '#top-bar__navigation a:not(.custom-btn) {color:' . $static_navitem . '!important;}'; }
        if ( $static_navitemhover !='' ) { $theCSS .= '#top-bar__navigation li.active:not(.li-btn) > a, #top-bar__navigation li.current:not(.li-btn) > a, #top-bar__navigation li:hover:not(.li-btn) > a {color:' . $static_navitemhover . '!important;}'; }
        if ( $static_navitemhover !='' ) { $theCSS .= '#top-bar__navigation li a:not(.custom-btn):after {background-color:' . $static_navitemhover . '!important;}'; }

        // sticky nav
        $nav_sticky_bg = esc_attr( ot_get_option( 'nt_agricom_nav_sticky_bg' ) );
        $nav_sticky_item = esc_attr( ot_get_option( 'nt_agricom_nav_sticky_item' ) );
        $nav_sticky_item_hover = esc_attr( ot_get_option( 'nt_agricom_nav_sticky_itemhover' ) );
        $nt_agricom_sticky_header_display 	= esc_attr( ot_get_option( 'nt_agricom_sticky_header_display' ) );

        if ( $nav_sticky_bg !='' ) { $theCSS .= '#top-bar.fixed {background-color:' . $nav_sticky_bg . '!important;}';}
        if ( $nav_sticky_item !='' ) { $theCSS .= '#top-bar.fixed #top-bar__navigation a:not(.custom-btn) {color:' . $nav_sticky_item . '!important;}'; }
        if ( $nav_sticky_item_hover !='' ) { $theCSS .= '#top-bar.fixed #top-bar__navigation li.active:not(.li-btn) > a, #top-bar.fixed #top-bar__navigation li.current:not(.li-btn) > a, #top-bar.fixed #top-bar__navigation li:hover:not(.li-btn) > a  {color:' . $nav_sticky_item_hover . '!important;}'; }
        if ( $nav_sticky_item_hover !='' ) { $theCSS .= '#top-bar.fixed #top-bar__navigation li a:not(.custom-btn):after {background-color:' . $nav_sticky_item_hover . '!important;}'; }
        if ( $nt_agricom_sticky_header_display =='off' ) { $theCSS .= '#top-bar.fixed {position:absolute!important;}'; }

        //dropdown submenu
        $dropdownbg = esc_attr( ot_get_option( 'nt_agricom_dropdown_bg' ) );
        $dropdownitem = esc_attr( ot_get_option( 'nt_agricom_dropdown_item' ) );
        $dropdownitemhover = esc_attr( ot_get_option( 'nt_agricom_dropdown_itemhover' ) );

        if ( $dropdownbg !='' || $dropdownitem !='' || $dropdownitemhover !='' ) {
        $theCSS .= '@media only screen and (min-width:768px) { ';
        if ( $dropdownbg !='' ) { $theCSS .= '#top-bar__navigation .submenu ul {background-color:' . $dropdownbg . '!important;}'; }
        if ( $dropdownitem !='' ) { $theCSS .= '#top-bar__navigation .submenu li a{color:' . $dropdownitem . '!important;}'; }
        if ( $dropdownitemhover !='' ) { $theCSS .= '#top-bar__navigation .submenu li a:hover{color:' . $dropdownitemhover . '!important;}'; }
        if ( $dropdownitemhover !='' ) { $theCSS .= '#top-bar__navigation .submenu li a:not(.custom-btn):after {background-color:' . $dropdownitemhover . '!important;}'; }
        $theCSS .= '}';
        }

        // mobile nav
        $mobile_bg = esc_attr( ot_get_option( 'nt_agricom_mobile_bg' ) );
        $mobile_item = esc_attr( ot_get_option( 'nt_agricom_mobile_item' ) );
        $mobile_i_h = esc_attr( ot_get_option( 'nt_agricom_mobile_itemhover' ) );
        $mobile_btntoggler = esc_attr( ot_get_option( 'nt_agricom_mobile_btntoggler' ) );
        $header_btn_title_color = esc_attr( ot_get_option( 'nt_agricom_header_btn_title_color' ) );
        $header_btn_brd_color = esc_attr( ot_get_option( 'nt_agricom_header_btn_brd_color' ) );
        $header_btn_hover_color = esc_attr( ot_get_option( 'nt_agricom_header_btn_hover_color' ) );
        $header_btn_h_title_c = esc_attr( ot_get_option( 'nt_agricom_header_btn_hover_title_color' ) );
        $header_top_btn_display = ( ot_get_option('nt_agricom_header_top_btn_display') );
        $nt_agricom_btn_radius = ( ot_get_option('nt_agricom_btn_radius') );

        if ( $mobile_bg !='' ) { $theCSS .= '#top-bar.expanded{background-color:' . $mobile_bg . '!important;}'; }
        if ( $mobile_bg !='' ) { $theCSS .= '#top-bar.expanded{background-color:' . $mobile_bg . '!important;}'; }
        if ( $mobile_item !='' ) { $theCSS .= '#top-bar.expanded #top-bar.fixed #top-bar__navigation a:not(.custom-btn) {color:' . $mobile_item . '!important;}'; }
        if ( $mobile_i_h !='' ) { $theCSS .= '#top-bar.expanded #top-bar.fixed #top-bar__navigation li.active:not(.li-btn) > a, #top-bar.fixed #top-bar__navigation li.current:not(.li-btn) > a, #top-bar.fixed #top-bar__navigation li:hover:not(.li-btn) > a{color:' . $mobile_i_h . ' !important;}'; }
        if ( $mobile_btntoggler !='' ) { $theCSS .= '#top-bar__navigation-toggler span, #top-bar__navigation-toggler span:after, #top-bar__navigation-toggler span:before{background-color:' . $mobile_btntoggler . ' !important;}'; }
        if ( $header_btn_title_color !='' ) { $theCSS .= '#top-bar #top-bar__navigation .li-btn .custom-btn.primary  {color:'.$header_btn_title_color.'!important;}'; }
        if ( $header_btn_brd_color !='' ) { $theCSS .= '#top-bar #top-bar__navigation .li-btn .custom-btn.primary {border-color:'.$header_btn_brd_color.'!important;}'; }
        if ( $header_btn_hover_color !='' ) { $theCSS .= '#top-bar #top-bar__navigation .li-btn .custom-btn.primary:hover {border-color:'.$header_btn_hover_color.'!important;background-color:'.$header_btn_hover_color.'!important;}'; }
        if ( $header_btn_h_title_c !='' ) { $theCSS .= '#top-bar #top-bar__navigation .li-btn .custom-btn.primary:hover {color:'.$header_btn_h_title_c.'!important;}'; }
        if ( $header_top_btn_display =='off' ) { $theCSS .= '#top-bar #top-bar__navigation .li-btn .custom-btn.primary {display:none !important;}'; }
        if ( $nt_agricom_btn_radius !='' ) { $theCSS .= '#top-bar #top-bar__navigation .li-btn .custom-btn.primary {border-radius:'.$nt_agricom_btn_radius.'px!important;}'; }


        // logo style
        $theme_logo_type = esc_attr( ot_get_option( 'nt_agricom_logo_type' ) );
        if ( $theme_logo_type == 'text' ) {

            //variable for text logo custom style
            $textlogo_fs = esc_attr( ot_get_option( 'nt_agricom_textlogo_fs' ) );
            $textlogo_fw = esc_attr( ot_get_option( 'nt_agricom_textlogo_fw' ) );
            $textlogo_fstyle = esc_attr( ot_get_option( 'nt_agricom_textlogo_fstyle' ) );
            $textlogo_ltsp = esc_attr( ot_get_option( 'nt_agricom_textlogo_lettersp' ) );
            $staticlogo_color = esc_attr( ot_get_option( 'nt_agricom_staticlogo_color' ) );
            $stickylogo_color = esc_attr( ot_get_option( 'nt_agricom_stickylogo_color' ) );

            //static menu text logo
            $theCSS .= '#top-bar__logo.nt-text-logo {';
            if ( $textlogo_fw != '' ) { $theCSS .= 'font-weight:'.$textlogo_fw.';'; }
            if ( $textlogo_ltsp != '' ) { $theCSS .= 'letter-spacing:'.$textlogo_ltsp.'px;';}
            if ( $textlogo_fs != '' ) { $theCSS .= 'font-size:'.$textlogo_fs.'px;';}
            if ( $textlogo_fstyle != '' ) { $theCSS .= 'font-style:'.$textlogo_fstyle.';';}
            if ( $staticlogo_color != '' ) { $theCSS .= 'color:'.$staticlogo_color.'!important;';}
            $theCSS .= '}';

            //sticky menu text logo
            $theCSS .= '#top-bar.fixed.in #top-bar__logo.nt-text-logo {';
            if ( $textlogo_fw != '' ) { $theCSS .= 'font-weight:'.$textlogo_fw.';'; }
            if ( $textlogo_ltsp != '' ) { $theCSS .= 'letter-spacing:'.$textlogo_ltsp.'px;';}
            if ( $textlogo_fs != '' ) { $theCSS .= 'font-size:'.$textlogo_fs.'px;';}
            if ( $textlogo_fstyle != '' ) { $theCSS .= 'font-style:'.$textlogo_fstyle.';';}
            if ( $stickylogo_color != '' ) { $theCSS .= 'color:'.$stickylogo_color.'!important;';}
            $theCSS .= '}';

        }
        // logo dimension var
        $logoimg = ( ot_get_option( 'nt_agricom_logoimg' ) );
        $mobilelogo = ( ot_get_option( 'nt_agricom_mobilelogoimg' ) );
        $logo = ( ot_get_option( 'nt_agricom_logo_dimension', array() ) );
        $logo_m = ( ot_get_option( 'nt_agricom_margin_logo', array() ) );
        $logo_p = ( ot_get_option( 'nt_agricom_padding_logo', array() ) );

        // logo img
        if ( $theme_logo_type == 'img' ) {
            if( $logoimg!= '') {
                $theCSS .= '.top-bar--style-3 #top-bar__logo, .top-bar--style-2 #top-bar__logo,#top-bar__logo{ background-image: url(' .esc_url( $logoimg ).'); }';
            }
            if( $mobilelogo!= '') {
                $theCSS .= '#top-bar.fixed #top-bar__logo{ background-image: url(' .esc_url( $mobilelogo ).'); }';
            }
            if( $mobilelogo!= '') {
                if ( $mobile_breakpoint != '' && $mobile_breakpoint != '768' ) {
                    $theCSS .= '@media only screen and (max-width: '.$mobile_breakpoint.'px) {#top-bar__logo{ background-image: url(' .esc_url( $mobilelogo ).'); }}';
                } else {
                    $theCSS .= '@media only screen and (max-width: 767px) {#top-bar__logo{ background-image: url(' .esc_url( $mobilelogo ).'); }}';
                }
            }
        }

        // logo img width and height
        if(isset($logo['unit'])) { $logounit = $logo['unit'];}else{ $logounit = 'px'; }
        if(isset($logo['width'])) { $theCSS .= '#top-bar__logo{ width:' . $logo['width'] .''. $logounit . ' !important; }'; }
        if(isset($logo['height'])) { $theCSS .= '#top-bar__logo{ height:' . $logo['height'] .''. $logounit . ' !important; }'; }

        //logo  margin
        if(isset($logo_m['unit'])) { $logomarunit = $logo_m['unit'];}else{ $logomarunit = 'px'; }
        if(isset($logo_m['top'])) { $theCSS .= '#top-bar__logo{ margin-top:' . $logo_m['top'] .''. $logomarunit . ' !important; }'; }
        if(isset($logo_m['bottom'])) { $theCSS .= '#top-bar__logo{ margin-bottom:' . $logo_m['bottom'] .''. $logomarunit . ' !important; }'; }
        if(isset($logo_m['right'])) { $theCSS .= '#top-bar__logo{ margin-right:' . $logo_m['right'] .''. $logomarunit . ' !important; }'; }
        if(isset($logo_m['left'])) { $theCSS .= '#top-bar__logo{ margin-left:' . $logo_m['left'] .''. $logomarunit . ' !important; }'; }

        //logo padding
        if(isset($logo_p['unit'])) { $logopadunit = $logo_p['unit'];}else{ $logopadunit = 'px'; }
        if(isset($logo_p['top'])) { $theCSS .= '#top-bar__logo{ padding-top:' . $logo_p['top'] .''. $logopadunit . ' !important; }'; }
        if(isset($logo_p['bottom'])) { $theCSS .= '#top-bar__logo{ padding-bottom:' . $logo_p['bottom'] .''. $logopadunit . ' !important; }'; }
        if(isset($logo_p['right'])) { $theCSS .= '#top-bar__logo{ padding-right:' . $logo_p['right'] .''. $logopadunit . ' !important; }'; }
        if(isset($logo_p['left'])) { $theCSS .= '#top-bar__logo{ padding-left:' . $logo_p['left'] .''. $logopadunit . ' !important; }'; }

        // sidebar
        $sb_bg = esc_attr( ot_get_option( 'nt_agricom_sb_bg' ) );
        $sb_t_c = esc_attr( ot_get_option( 'nt_agricom_sb_t_c' ) );
        $sb_c = esc_attr( ot_get_option( 'nt_agricom_sb_c' ) );
        $sb_l_c = esc_attr( ot_get_option( 'nt_agricom_sb_l_c' ) );
        $sb_l_c_h = esc_attr( ot_get_option( 'nt_agricom_sb_l_c_h' ) );
        $sb_s_t = esc_attr( ot_get_option( 'nt_agricom_sb_s_t' ) );
        $sb_s_bg = esc_attr( ot_get_option( 'nt_agricom_sb_s_bg' ) );

        if ( $sb_bg !='' ) { $theCSS .= '#widget-area{ background-color:' . $sb_bg . '!important;}'; }
        if ( $sb_t_c !='' ) { $theCSS .= '.widget-title{ color:' . $sb_t_c . '!important;}'; }
        if ( $sb_c !='' ) { $theCSS .= '.widget ul{ color:' . $sb_c . '!important;}'; }
        if ( $sb_l_c !='' ) { $theCSS .= '.widget ul li a{ color:' . $sb_l_c . '!important;}'; }
        if ( $sb_l_c_h !='' ) { $theCSS .= '.widget ul li a:hover{ color:' . $sb_l_c_h . '!important;}'; }
        if ( $sb_s_t !='' ) { $theCSS .= '#widget-area #searchform input#searchsubmit{ color:' . $sb_s_t . '!important;}'; }
        if ( $sb_s_bg !='' ) { $theCSS .= '#widget-area #searchform input#searchsubmit{ background-color:' . $sb_s_bg . '!important;}'; }

	   // ALL PAGE OVERLAY MASK COLOR

        $blog_mask_v = esc_attr( ot_get_option( 'nt_agricom_blog_mask_v' ) );
        $blog_mask_c = esc_attr( ot_get_option( 'nt_agricom_blog_mask_c' ) );
        $single_mask_v = esc_attr( ot_get_option( 'nt_agricom_single_mask_v' ) );
        $single_mask_c = esc_attr( ot_get_option( 'nt_agricom_single_mask_c' ) );
        $archive_mask_v = esc_attr( ot_get_option( 'nt_agricom_archive_mask_v' ) );
        $archive_mask_c = esc_attr( ot_get_option( 'nt_agricom_archive_mask_c' ) );
        $error_mask_v = esc_attr( ot_get_option( 'nt_agricom_error_mask_v' ) );
        $error_mask_c = esc_attr( ot_get_option( 'nt_agricom_error_mask_c' ) );
        $search_mask_v = esc_attr( ot_get_option( 'nt_agricom_search_mask_v' ) );
        $search_mask_c = esc_attr( ot_get_option( 'nt_agricom_search_mask_c' ) );
        $woo_mask_c = esc_attr( ot_get_option( 'nt_agricom_single_woo_mask_c' ) );
        $woo_mask_v = esc_attr( ot_get_option( 'nt_agricom_single_woo_mask_v' ) );

        // BLOG HEADER
        $woo_h_bg = esc_attr( ot_get_option( 'nt_agricom_single_woo_headbg' ) );
        $woo_bg_c = esc_attr( ot_get_option( 'nt_agricom_woo_section_bgcolor' ) );
        $blog_h_bg = esc_attr( ot_get_option( 'nt_agricom_blog_headerbg' ) );
        $blog_bg_c = esc_attr( ot_get_option( 'nt_agricom_blog_header_bgcolor' ) );
        $blog_h_h = esc_attr( ot_get_option( 'nt_agricom_blog_header_bgheight' ) );
        $blog_h_c = esc_attr( ot_get_option( 'nt_agricom_blog_heading_color' ) );
        $blog_h_fs = esc_attr( ot_get_option( 'nt_agricom_blog_heading_fontsize' ) );
        $blog_sub_h_c = esc_attr( ot_get_option( 'nt_agricom_blog_slogan_color' ) );
        $blog_sub_h_fs = esc_attr( ot_get_option( 'nt_agricom_blog_slogan_fontsize' ) );
        $blog_h_p_t = esc_attr( ot_get_option( 'nt_agricom_blog_header_paddingtop' ) );
        $blog_h_p_b = esc_attr( ot_get_option( 'nt_agricom_blog_header_paddingbottom' ) );
        $woo_h_p_t = esc_attr( ot_get_option( 'nt_agricom_woo_section_paddingtop' ) );
        $woo_h_p_b = esc_attr( ot_get_option( 'nt_agricom_woo_section_paddingbottom' ) );

        if ( $woo_mask_v =='off' ) {  $theCSS .= '.woocommerce .index-header .pattern.template-overlay{display: none !important; }'; }
        if (( $woo_mask_c !='' ) && ( $woo_mask_v !='off' )) {
            $theCSS .= '.woocommerce .index-header .pattern.template-overlay{background:'.$woo_mask_c.';!important;opacity:1; }';
        }
        if ( $woo_h_bg !='' ) {
            $theCSS .= '.woocommerce .index-header { background: transparent url(' . $woo_h_bg .')no-repeat fixed center top / cover!important; }';
        }
        if ( $blog_h_bg !='' ) {
            $theCSS .= '.index-header { background: transparent url(' . $blog_h_bg .')no-repeat fixed center top / cover!important; }';
        }
        if ( $blog_mask_v =='off' ) {
            $theCSS .= '.blog .index-header .pattern.template-overlay{display: none !important; }';
        }
        if (( $blog_mask_c !='' ) && ( $blog_mask_v !='off' )) {
            $theCSS .= '.blog .index-header .pattern.template-overlay{background:'.$blog_mask_c.';!important;opacity:1; }';
        }

        if ( $woo_bg_c !='' ) { $theCSS .= '.woocommerce .index-header { background-color: ' . $woo_bg_c .'!important; }';  }
        if ( $blog_bg_c !='' ) { $theCSS .= '.blog .index-header { background-color: ' . $blog_bg_c .'!important; }';  }
        if ( $blog_h_h !='' ) { $theCSS .= '.intro.index-header { min-height: ' . $blog_h_h .'vh !important; max-height: 100%; }';  }
        if ( $blog_h_c !='' ) { $theCSS .= '.blog .index-header .template-cover-text .uppercase{color: ' . $blog_h_c .' !important; }';  }
        if ( $blog_h_fs !='' ) { $theCSS .= '.blog .index-header .template-cover-text .uppercase{font-size: '.$blog_h_fs.'px!important; }';  }
        if ( $blog_sub_h_c !='' ) { $theCSS .= '.blog .index-header .template-cover-text .cover-text-sublead{color: '.$blog_sub_h_c.'!important; }';  }
        if ( $blog_sub_h_fs !='' ) { $theCSS .= '.blog .index-header .template-cover-text .cover-text-sublead{font-size: '.$blog_sub_h_fs.'px!important; }';  }
        if ( $blog_h_p_t !='' ) { $theCSS .= '.blog .index-header { padding-top:'.$blog_h_p_t.'px!important; }'; }
        if ( $blog_h_p_b !='' ) { $theCSS .= '.blog .index-header { padding-bottom:'.$blog_h_p_b.'px!important; }'; }
        if ( $woo_h_p_t !='' ) { $theCSS .= '.woocommerce .index-header { padding-top:'.$woo_h_p_t.'px!important; }'; }
        if ( $woo_h_p_b !='' ) { $theCSS .= '.woocommerce .index-header { padding-bottom:'.$woo_h_p_b.'px!important; }'; }

        ///Blog reaad more button options
        $nt_agricom_r_b_c = esc_attr( ot_get_option( 'nt_agricom_r_b_c' ) );
        $nt_agricom_r_b_bgc = esc_attr( ot_get_option( 'nt_agricom_r_b_bgc' ) );
        $nt_agricom_r_b_bc = esc_attr( ot_get_option( 'nt_agricom_r_b_bc' ) );
        $nt_agricom_r_b_hc = esc_attr( ot_get_option( 'nt_agricom_r_b_hc' ) );
        $nt_agricom_r_b_hbgc = esc_attr( ot_get_option( 'nt_agricom_r_b_hbgc' ) );
        $nt_agricom_r_b_hbc = esc_attr( ot_get_option( 'nt_agricom_r_b_hbc' ) );

        if ( $nt_agricom_r_b_c !='' ) { $theCSS .= '.blog #blog-more-btn{ color:'.$nt_agricom_r_b_c.'!important; }'; }
        if ( $nt_agricom_r_b_bgc !='' ) { $theCSS .= '.blog #blog-more-btn{background-color:'.$nt_agricom_r_b_bgc.'!important; }'; }
        if ( $nt_agricom_r_b_bc !='' ) { $theCSS .= '.blog #blog-more-btn{border-color:'.$nt_agricom_r_b_bc.'!important; }'; }
        if ( $nt_agricom_r_b_hc !='' ) { $theCSS .= '.blog #blog-more-btn:hover{color:'.$nt_agricom_r_b_hc.'!important; }'; }
        if ( $nt_agricom_r_b_hbgc !='' ) { $theCSS .= '.blog #blog-more-btn:hover{background-color:'.$nt_agricom_r_b_hbgc.'!important; }'; }
        if ( $nt_agricom_r_b_hbc !='' ) { $theCSS .= '.blog #blog-more-btn:hover{border-color:'.$nt_agricom_r_b_hbc.'!important; }'; }


        // PAGE.PHP AND FULLWIDTH-PAGE.PHP HEADER - CUSTOM PAGE METABOX OPTIONS
        $nt_agricom_page_bg = wp_get_attachment_url( get_post_meta(get_the_ID(), 'nt_agricom_page_bg_image', true ),'full' );
        $nt_agricom_page_hero_minh = esc_attr( get_post_meta(get_the_ID(), 'nt_agricom_page_hero_minh', true ) );
        $nt_agricom_page_hero_mdminh = esc_attr( get_post_meta(get_the_ID(), 'nt_agricom_page_hero_mdminh', true ) );
        $nt_agricom_page_hero_smminh = esc_attr( get_post_meta(get_the_ID(), 'nt_agricom_page_hero_smminh', true ) );
        $nt_agricom_page_bg_color = esc_attr( get_post_meta(get_the_ID(), 'nt_agricom_page_bg_color', true ) );
        $nt_agricom_disable_page_mask = esc_attr( get_post_meta(get_the_ID(), 'nt_agricom_disable_page_mask', true ) );
        $nt_agricom_page_mask_color = esc_attr( get_post_meta(get_the_ID(), 'nt_agricom_page_mask_color', true ) );
        $nt_agricom_page_mask_opacity = esc_attr( get_post_meta(get_the_ID(), 'nt_agricom_page_mask_opacity', true ) );
        $nt_agricom_page_text_color = esc_attr( get_post_meta(get_the_ID(), 'nt_agricom_page_text_color', true ) );
        $nt_agricom_page_subtitle_color = esc_attr( get_post_meta(get_the_ID(), 'nt_agricom_page_subtitle_color', true ) );
        $nt_agricom_header_p_top = 	esc_attr( get_post_meta(get_the_ID(), 'nt_agricom_header_p_top', true ) );
        $nt_agricom_header_p_bottom = esc_attr( get_post_meta(get_the_ID(), 'nt_agricom_header_p_bottom', true ) );
        $nt_agricom_title_st = esc_attr( get_post_meta(get_the_ID(), 'nt_agricom_title_st', true ) );
        $nt_agricom_alt_title_fs = esc_attr( get_post_meta(get_the_ID(), 'nt_agricom_alt_title_fs', true ) );

        $page_mask_color = $nt_agricom_page_mask_color;
        $mask_rgb_color = nt_agricom_hex2rgb($page_mask_color);
        $final_page_mask_color = implode(", ", $mask_rgb_color);

        if ( $nt_agricom_page_hero_minh !='' ) {
            $theCSS .= '.page-id-' . get_the_ID().'.index-header { min-height: ' . $nt_agricom_page_hero_minh .'px !important; }';
        }
        if ( $nt_agricom_page_hero_mdminh !='' ) {
            $theCSS .= '@media(max-width:992px){.page-id-' . get_the_ID().'.index-header { min-height: ' . $nt_agricom_page_hero_mdminh .'px !important; }}';
        }
        if ( $nt_agricom_page_hero_smminh !='' ) {
            $theCSS .= '@media(max-width:768px){.page-id-' . get_the_ID().'.index-header { min-height: ' . $nt_agricom_page_hero_smminh .'px !important; }}';
        }

        if ( $nt_agricom_page_bg !='' ) {
            $theCSS .= '.page-id-' . get_the_ID().'.index-header { background-image: url(' . esc_url( $nt_agricom_page_bg ) .') !important; }';
        }
        if ( $nt_agricom_page_bg_color !='' && $nt_agricom_page_bg == '' ) {
            $theCSS .= '.page-id-' . get_the_ID().'.index-header { background-image: none !important; }';
        }
        if ( $nt_agricom_disable_page_mask == true ) {
            $theCSS .= '.page-id-' . get_the_ID().'.index-header .template-overlay.pattern{ display: none !important; }';
        }
        if ( ( $nt_agricom_disable_page_mask != true ) && ( $nt_agricom_page_mask_color != '' ) ) {
            $theCSS .= '.page-id-' . get_the_ID().'.index-header .template-overlay.pattern{background: '.$nt_agricom_page_mask_color .';!important; }';
        }
        if ( ( $nt_agricom_disable_page_mask != true ) && ( $nt_agricom_page_mask_opacity != '' ) ) {
            $theCSS .= '.page-id-' . get_the_ID().'.index-header .template-overlay.pattern{opacity:'.$nt_agricom_page_mask_opacity .';!important; }';
        }
        if ( $nt_agricom_page_bg_color !='' ) {
            $theCSS .= '.page-id-' . get_the_ID().'.index-header { background-color: ' . $nt_agricom_page_bg_color .' !important; }';
        }
        if ( $nt_agricom_page_text_color !='' ) {
            $theCSS .= '.page-id-' . get_the_ID().'.index-header h1.uppercase { color: ' . $nt_agricom_page_text_color .' !important; }';
        }
        if ( $nt_agricom_page_subtitle_color !='' ) {
            $theCSS .= '.page-id-' . get_the_ID().'.index-header .cover-text-sublead { color: ' . $nt_agricom_page_subtitle_color .' !important; }';
        }
        if ( $nt_agricom_header_p_top !='' ) {
            $theCSS .= '.page-id-' . get_the_ID().'.index-header { padding-bottom : ' . $nt_agricom_header_p_top .'px !important; }';
        }
        if ( $nt_agricom_header_p_bottom !='' ) {
            $theCSS .= '.page-id-' . get_the_ID().'.index-header { padding-top : ' . $nt_agricom_header_p_bottom .'px !important; }';
        }
        if ( $nt_agricom_title_st !='' ) {
            $theCSS .= '.page-id-' . get_the_ID().'.index-header .cover-text-sublead{ font-size: ' . $nt_agricom_title_st .'px!important; }';
        }
        if ( $nt_agricom_alt_title_fs !='' ) {
            $theCSS .= '.page-id-' . get_the_ID().'.index-header .uppercase{ font-size: ' . $nt_agricom_alt_title_fs .'px!important; }';
        }

        //custom page Bredcrumbs settings
        $nt_agricom_bred_display 	= 	esc_attr( get_post_meta(get_the_ID(), 'nt_agricom_page_bred_display', true ) );

        if ( $nt_agricom_bred_display ==true ) {
            $theCSS .= '.page-id-' . get_the_ID().'.index-header .breadcrubms{display:none!important; }';
        }

        // SINGLE POST
        if ( ot_get_option( 'nt_agricom_single_headbg' ) !='' ) {
            $theCSS .= '.single .index-header {
                background: transparent url( '. esc_attr( ot_get_option( 'nt_agricom_single_headbg' ) ) .')no-repeat fixed center top / cover!important;
            }';
        }
        if ( $single_mask_v =='off' ) {
            $theCSS .= '.single .index-header .template-overlay{display: none !important; }';
        }
        if (( $single_mask_c !='' ) && ( $single_mask_v !='off' )) {
            $theCSS .= '.single .index-header .template-overlay{background: '.$single_mask_c.';!important; opacity:1;}';
        }
        if ( ot_get_option( 'nt_agricom_single_header_bgcolor' ) !='' ) {
            $theCSS .= '.single .index-header {background-color: '. esc_attr( ot_get_option( 'nt_agricom_single_header_bgcolor' ) ) .'; }';
        }
        if ( ot_get_option( 'nt_agricom_single_headingcolor' ) !='' ) {
            $theCSS .= '.single .index-header h1{color: '. esc_attr( ot_get_option( 'nt_agricom_single_headingcolor' ) ) .'; }';
        }
        if ( ot_get_option( 'nt_agricom_single_heading_fontsize' ) !='' ) {
            $theCSS .= '.single .index-header h1{font-size: '. esc_attr( ot_get_option( 'nt_agricom_single_heading_fontsize' ) ) .'px; }';
        }
        if ( ot_get_option( 'nt_agricom_single_header_bgheight' ) !='' ) {
            $theCSS .= '.single .index-header {height: '. esc_attr( ot_get_option( 'nt_agricom_single_header_bgheight' ) ) .'vh !important; }';
        }
        if (( ot_get_option( 'nt_agricom_single_header_paddingtop' ) !='' )||( ot_get_option( 'nt_agricom_single_header_paddingbottom' ) !='' )) {
            $theCSS .= '@media (min-width: 768px) {
                .single .index-header  {
                    padding-top: '.  esc_attr( ot_get_option( 'nt_agricom_single_header_paddingtop' ) ) .'px !important;
                    padding-bottom: '.  esc_attr( ot_get_option( 'nt_agricom_single_header_paddingbottom' ) ) .'px !important;
                }
            }';
        }

        // ARCHIVE PAGES
        if ( ot_get_option( 'nt_agricom_archive_headbg' ) !='' ) {
            $theCSS .= '.archive .index-header {
                background: transparent url( '. esc_attr( ot_get_option( 'nt_agricom_archive_headbg' ) ) .')no-repeat fixed center top / cover!important;
            }';
        }
        if ( $archive_mask_v =='off' ) {
            $theCSS .= '.archive .index-header .template-overlay{display: none !important; }';
        }
        if (( $archive_mask_c !='' ) && ( $archive_mask_v !='off' )) {
            $theCSS .= '.archive .index-header .template-overlay{background: '.$archive_mask_c.';!important;opacity:1; }';
        }
        if ( ot_get_option( 'nt_agricom_archive_header_bgcolor' ) !='' ) {
            $theCSS .= '.archive .index-header {background-color: '.  esc_attr( ot_get_option( 'nt_agricom_archive_header_bgcolor' ) ) .'; }';
        }
        if ( ot_get_option( 'nt_agricom_archive_heading_color' ) !='' ) {
            $theCSS .= '.archive .index-header h1{color: '.  esc_attr( ot_get_option( 'nt_agricom_archive_heading_color' ) ) .'; }';
        }
        if ( ot_get_option( 'nt_agricom_archive_heading_fontsize' ) !='' ) {
            $theCSS .= '.archive .index-header h1{font-size: '.  esc_attr( ot_get_option( 'nt_agricom_archive_heading_fontsize' ) ) .'px; }';
        }
        if ( ot_get_option( 'nt_agricom_archive_slogan_color' ) !='' ) {
            $theCSS .= '.archive .index-header p{color: '.  esc_attr( ot_get_option( 'nt_agricom_archive_slogan_color' ) ) .'; }';
        }
        if ( ot_get_option( 'nt_agricom_archive_header_bgheight' ) !='' ) {
            $theCSS .= '.archive .index-header {height: '.  esc_attr( ot_get_option( 'nt_agricom_archive_header_bgheight' ) ) .'vh !important; }';
        }
        if (( ot_get_option( 'nt_agricom_archive_header_paddingtop' ) !='' )||( ot_get_option( 'nt_agricom_archive_header_paddingbottom' ) !='' )) {
            $theCSS .= '@media (min-width: 768px) {
                .archive .index-header  {
                    padding-top: '.  esc_attr( ot_get_option( 'nt_agricom_archive_header_paddingtop' ) ) .'px !important;
                    padding-bottom: '.  esc_attr( ot_get_option( 'nt_agricom_archive_header_paddingbottom' ) ) .'px !important;
                }
            }';
        }

        // 404 PAGE
        if ( ot_get_option( 'nt_agricom_error_headbg' ) !='' ) {
            $theCSS .= '.error404 .index-header {
                background: transparent url( '. esc_attr( ot_get_option( 'nt_agricom_error_headbg' ) ) .')no-repeat fixed center top / cover!important;
            }';
        }
        if ( $error_mask_v =='off' ) {
            $theCSS .= '.error404 .index-header .template-overlay{display: none !important; }';
        }
        if (( $error_mask_c !='' ) && ( $error_mask_v !='off' )) {
            $theCSS .= '.error404 .index-header .template-overlay{background: '.$error_mask_c.';!important; opacity:1;}';
        }
        if ( ot_get_option( 'nt_agricom_error_header_bgcolor' ) !='' ) {
            $theCSS .= '.error404 .index-header {background-color: '. esc_attr( ot_get_option( 'nt_agricom_error_header_bgcolor' ) ) .'; }';
        }
        if ( ot_get_option( 'nt_agricom_error_headingcolor' ) !='' ) {
            $theCSS .= '.error404 .index-header h1{color: '. esc_attr( ot_get_option( 'nt_agricom_error_headingcolor' ) ) .'; }';
        }
        if ( ot_get_option( 'nt_agricom_error_heading_fontsize' ) !='' ) {
            $theCSS .= '@media only screen and (min-width: 992px) {.error404 .index-header h1{font-size: '. esc_attr( ot_get_option( 'nt_agricom_error_heading_fontsize' ) ) .'px; }}';
        }
        if ( ot_get_option( 'nt_agricom_error_header_slogancolor' ) !='' ) {
            $theCSS .= '.error404 .index-header p{color: '. esc_attr( ot_get_option( 'nt_agricom_error_header_slogancolor' ) ) .'; }';
        }
        if ( ot_get_option( 'nt_agricom_error_header_bgheight' ) !='' ) {
            $theCSS .= '.error404 .index-header {height: '. esc_attr( ot_get_option( 'nt_agricom_error_header_bgheight' ) ) .'vh !important; }';
        }
        if (( ot_get_option( 'nt_agricom_error_header_paddingtop' ) !='' )||( ot_get_option( 'nt_agricom_error_header_paddingbottom' ) !='' )) {
            $theCSS .= '@media (min-width: 768px) {
                .error404 .index-header  {
                    padding-top: '.  esc_attr( ot_get_option( 'nt_agricom_error_header_paddingtop' ) ) .'px !important;
                    padding-bottom: '.  esc_attr( ot_get_option( 'nt_agricom_error_header_paddingbottom' ) ) .'px !important;
                }
            }';
        }

        // SEARCH PAGE
        if ( ot_get_option( 'nt_agricom_search_headbg' ) !='' ) {
            $theCSS .= '.search .index-header {
                background: transparent url( '. esc_attr( ot_get_option( 'nt_agricom_search_headbg' ) ) .')no-repeat scroll center top / cover!important;
            }';
        }
        if ( $search_mask_v =='off' ) {
            $theCSS .= '.search .index-header .template-overlay{display: none !important; }';
        }
        if (( $search_mask_c !='' ) && ( $search_mask_v !='off' )) {
            $theCSS .= '.search .index-header .template-overlay{background: '.$search_mask_c.';!important; opacity:1;}';
        }
        if ( ot_get_option( 'nt_agricom_search_header_bgcolor' ) !='' ) {
            $theCSS .= '.search .index-header {background-color: '. esc_attr( ot_get_option( 'nt_agricom_search_header_bgcolor' ) ) .'; }';
        }
        if ( ot_get_option( 'nt_agricom_search_headingcolor' ) !='' ) {
            $theCSS .= '.search .index-header h1{color: '. esc_attr( ot_get_option( 'nt_agricom_search_headingcolor' ) ) .'; }';
        }
        if ( ot_get_option( 'nt_agricom_search_heading_fontsize' ) !='' ) {
            $theCSS .= '.search .index-header h1{font-size: '. esc_attr( ot_get_option( 'nt_agricom_search_heading_fontsize' ) ) .'px; }';
        }
        if ( ot_get_option( 'nt_agricom_search_header_slogancolor' ) !='' ) {
            $theCSS .= '.search .index-header p{color: '. esc_attr( ot_get_option( 'nt_agricom_search_header_slogancolor' ) ) .'; }';
        }
        if ( ot_get_option( 'nt_agricom_search_header_bgheight' ) !='' ) {
            $theCSS .= '.search .index-header {height: '. esc_attr( ot_get_option( 'nt_agricom_search_header_bgheight' ) ) .'vh !important; }';
        }
        if (( ot_get_option( 'nt_agricom_search_header_paddingtop' ) !='' )||( ot_get_option( 'nt_agricom_search_header_paddingbottom' ) !='' )) {
            $theCSS .= '@media (min-width: 768px) {
                .search .index-header  {
                    padding-top: '. esc_attr( ot_get_option( 'nt_agricom_search_header_paddingtop' ) ) .'px !important;
                    padding-bottom: '. esc_attr( ot_get_option( 'nt_agricom_search_header_paddingbottom' ) ) .'px !important;
                }
            }';
        }

        // BREADCRUBMS
        if ( ot_get_option( 'nt_agricom_breadcrubms_color' ) !='' ) {
            $theCSS .= '.breadcrubms, .breadcrubms span a span{color: '.  esc_attr( ot_get_option( 'nt_agricom_breadcrubms_color' ) ) .'!important; }';
        }
        if ( ot_get_option( 'nt_agricom_breadcrubms_hovercolor' ) !='' ) {
            $theCSS .= '.breadcrubms span a span:hover{color: '.  esc_attr( ot_get_option( 'nt_agricom_breadcrubms_hovercolor' ) ) .'!important; }';
        }
        if ( ot_get_option( 'nt_agricom_breadcrubms_currentcolor' ) !='' ) {
            $theCSS .= '.breadcrubms span {color: '.  esc_attr( ot_get_option( 'nt_agricom_breadcrubms_currentcolor' ) ) .'!important; }';
        }
        if ( ot_get_option( 'nt_agricom_breadcrubms_font_size' ) !='' ) {
            $theCSS .= '.breadcrubms{font-size: '.  esc_attr( ot_get_option( 'nt_agricom_breadcrubms_font_size' ) ) .'px; }';
        }

        // POSTS
        if ( ot_get_option( 'nt_agricom_blogposttitlecolor' ) !='' ) {
            $theCSS .= '.entry-title a{color: '.  esc_attr( ot_get_option( 'nt_agricom_blogposttitlecolor' ) ) .'; }';
        }
        if ( ot_get_option( 'nt_agricom_blogposttitlhoverecolor' ) !='' ) {
            $theCSS .= '.entry-title a:hover{color: '.  esc_attr( ot_get_option( 'nt_agricom_blogposttitlhoverecolor' ) ) .'; }';
        }
        if ( ot_get_option( 'nt_agricom_blogmetacolor' ) !='' ) {
            $theCSS .= '.entry-meta li{color: '.  esc_attr( ot_get_option( 'nt_agricom_blogmetacolor' ) ) .'; }';
        }
        if ( ot_get_option( 'nt_agricom_blogmetalinktextcolor' ) !='' ) {
            $theCSS .= '.entry-meta li a{color: '.  esc_attr( ot_get_option( 'nt_agricom_blogmetalinktextcolor' ) ) .'; }';
        }
        if ( ot_get_option( 'nt_agricom_blogmetalinkhovercolor' ) !='' ) {
            $theCSS .= '.entry-meta li a:hover{color: '.  esc_attr( ot_get_option( 'nt_agricom_blogmetalinkhovercolor' ) ) .'; }';
        }
        if ( ot_get_option( 'nt_agricom_blogmetalinktextbgcolor' ) !='' ) {
            $theCSS .= '.entry-meta li a{background-color: '.  esc_attr( ot_get_option( 'nt_agricom_blogmetalinktextbgcolor' ) ) .'; }';
        }
        if ( ot_get_option( 'nt_agricom_blogmetalinktextbghovercolor' ) !='' ) {
            $theCSS .= '.entry-meta li a:hover{background-color: '.  esc_attr( ot_get_option( 'nt_agricom_blogmetalinktextbghovercolor' ) ) .'; }';
        }
        if ( ot_get_option( 'nt_agricom_blogpostparagraphcolor' ) !='' ) {
            $theCSS .= '.entry-content p{color: '.  esc_attr( ot_get_option( 'nt_agricom_blogpostparagraphcolor' ) ) .'; }';
            $theCSS .= '.entry-content p{color:#000;}';
        }
        if ( ot_get_option( 'nt_agricom_blogpostbuttonbgcolor' ) !='' ) {
            $theCSS .= 'a.margin_30{background-color:'.  esc_attr( ot_get_option( 'nt_agricom_blogpostbuttonbgcolor' ) ) .';}';
        }
        if ( ot_get_option( 'nt_agricom_blogpostbuttonbghovercolor' ) !='' ) {
            $theCSS .= 'a.margin_30:hover{background-color:'.  esc_attr( ot_get_option( 'nt_agricom_blogpostbuttonbghovercolor' ) ) .';}';
        }
        if ( ot_get_option( 'nt_agricom_blogpostbuttontitlecolor' ) !='' ) {
            $theCSS .= 'a.margin_30{color:'.  esc_attr( ot_get_option( 'nt_agricom_blogpostbuttontitlecolor' ) ) .';}';
        }
        if ( ot_get_option( 'nt_agricom_blogpostbuttontitlehovercolor' ) !='' ) {
            $theCSS .= 'a.margin_30:hover{color:'.  esc_attr( ot_get_option( 'nt_agricom_blogpostbuttontitlehovercolor' ) ) .';}';
        }

        // SHARE BUTTONS
        if ( ot_get_option( 'nt_agricom_blogsharebgcolor' ) !='' ) {
            $theCSS .= '#share-buttons i{ background-color: '.  esc_attr( ot_get_option( 'nt_agricom_blogsharebgcolor' ) ) .'; }';
        }
        if ( ot_get_option( 'nt_agricom_blogsharebghovercolor' ) !='' ) {
            $theCSS .= ' #share-buttons i:hover{ background-color: '.  esc_attr( ot_get_option( 'nt_agricom_blogsharebghovercolor' ) ) .'; }';
        }
        if ( ot_get_option( 'nt_agricom_blogsharecolor' ) !='' ) {
            $theCSS .= '#share-buttons i{ color: '.  esc_attr( ot_get_option( 'nt_agricom_blogsharecolor' ) ) .'; }';
        }
        if ( ot_get_option( 'nt_agricom_blogsharehovercolor' ) !='' ) {
            $theCSS .= '#share-buttons i:hover{ color: '.  esc_attr( ot_get_option( 'nt_agricom_blogsharehovercolor' ) ) .'; }';
        }

        // COMMENTS
        if ( ot_get_option( 'nt_agricom_blogmetalinktextcolor' ) !='' ) {
            $theCSS .= 'p.logged-in-as a{color: '.  esc_attr( ot_get_option( 'nt_agricom_blogmetalinktextcolor' ) ) .'; }';
        }
        if ( ot_get_option( 'nt_agricom_blogmetalinkhovercolor' ) !='' ) {
            $theCSS .= 'p.logged-in-as a:hover{color: '.  esc_attr( ot_get_option( 'nt_agricom_blogmetalinkhovercolor' ) ) .'; }';
        }
        if ( ot_get_option( 'nt_agricom_blogmetalinktextbgcolor' ) !='' ) {
            $theCSS .= 'p.logged-in-as a{background-color: '.  esc_attr( ot_get_option( 'nt_agricom_blogmetalinktextbgcolor' ) ) .'; }';
        }
        if ( ot_get_option( 'nt_agricom_blogmetalinktextbghovercolor' ) !='' ) {
            $theCSS .= 'p.logged-in-as a:hover{background-color: '.  esc_attr( ot_get_option( 'nt_agricom_blogmetalinktextbghovercolor' ) ) .'; }';
        }
        if ( ot_get_option( 'nt_agricom_blogmetalinktextcolor' ) !='' ) {
            $theCSS .= 'a.comment-edit-link,a.comment-reply-link{color: '.  esc_attr( ot_get_option( 'nt_agricom_blogmetalinktextcolor' ) ) .'; }';
        }
        if ( ot_get_option( 'nt_agricom_blogmetalinkhovercolor' ) !='' ) {
            $theCSS .= 'a.comment-edit-link:hover,a.comment-reply-link:hover{color: '.  esc_attr( ot_get_option( 'nt_agricom_blogmetalinkhovercolor' ) ) .'; }';
        }
        if ( ot_get_option( 'nt_agricom_blogmetalinktextbgcolor' ) !='' ) {
            $theCSS .= 'a.comment-edit-link,a.comment-reply-link{background-color: '.  esc_attr( ot_get_option( 'nt_agricom_blogmetalinktextbgcolor' ) ) .'; }';
        }
        if ( ot_get_option( 'nt_agricom_blogmetalinktextbghovercolor' ) !='' ) {
            $theCSS .= 'a.comment-edit-link:hover,a.comment-reply-link:hover{background-color: '.  esc_attr( ot_get_option( 'nt_agricom_blogmetalinktextbghovercolor' ) ) .'; }';
        }
        if ( ot_get_option( 'nt_agricom_blogcommentformsubmitcolor' ) !='' ) {
            $theCSS .= '.comment-form .submit{color: '.  esc_attr( ot_get_option( 'nt_agricom_blogcommentformsubmitcolor' ) ) .'; }';
        }
        if ( ot_get_option( 'nt_agricom_blogcommentformsubmithovercolor' ) !='' ) {
            $theCSS .= '.comment-form .submit:hover{color: '.  esc_attr( ot_get_option( 'nt_agricom_blogcommentformsubmithovercolor' ) ) .'; }';
        }
        if ( ot_get_option( 'nt_agricom_blogcommentformsubmitbgcolor' ) !='' ) {
            $theCSS .= '.comment-form .submit{background-color: '.  esc_attr( ot_get_option( 'nt_agricom_blogcommentformsubmitbgcolor' ) ) .'; }';
        }
        if ( ot_get_option( 'nt_agricom_blogcommentformsubmitbghovercolor' ) !='' ) {
            $theCSS .= '.comment-form .submit:hover{background-color: '.  esc_attr( ot_get_option( 'nt_agricom_blogcommentformsubmitbghovercolor' ) ) .'; }';
        }

        // PAGER
        if ( ot_get_option( 'nt_agricom_pagertitlecolor' ) !='' ) {
            $theCSS .= '.pager li a{color: '.  esc_attr( ot_get_option( 'nt_agricom_pagertitlecolor' ) ) .'; }';
        }
        if ( ot_get_option( 'nt_agricom_pagertitlehovercolor' ) !='' ) {
            $theCSS .= '.pager li a:hover{color: '.  esc_attr( ot_get_option( 'nt_agricom_pagertitlehovercolor' ) ) .'; }';
        }
        if ( ot_get_option( 'nt_agricom_pagerbgcolor' ) !='' ) {
            $theCSS .= '.pager li a{background-color: '.  esc_attr( ot_get_option( 'nt_agricom_pagerbgcolor' ) ) .'; }';
        }
        if ( ot_get_option( 'nt_agricom_pagerbghovercolor' ) !='' ) {
            $theCSS .= '.pager li a:hover{background-color: '.  esc_attr( ot_get_option( 'nt_agricom_pagerbghovercolor' ) ) .'; }';
        }


        // FOOTER WIDGETIZE OPTIONS
        $nt_agricom_fw_bg_c = esc_attr( ot_get_option( 'nt_agricom_fw_bg_c' ) );
        $nt_agricom_fw_brd_c = esc_attr( ot_get_option( 'nt_agricom_fw_brd_c' ) );
        $nt_agricom_fw_pad = esc_attr( ot_get_option( 'nt_agricom_fw_pad' ) );
        $nt_agricom_fw_h_c = esc_attr( ot_get_option( 'nt_agricom_fw_h_c' ) );
        $nt_agricom_fw_a_c = esc_attr( ot_get_option( 'nt_agricom_fw_a_c' ) );
        $nt_agricom_fw_a_hc = esc_attr( ot_get_option( 'nt_agricom_fw_a_hc' ) );
        $nt_agricom_fw_t_c = esc_attr( ot_get_option( 'nt_agricom_fw_t_c' ) );

        // WIDGETIZE FOOTER
        if ( $nt_agricom_fw_bg_c !='' ) {
            $theCSS .= '#footer{ background-color: '. $nt_agricom_fw_bg_c .'; }';
        }
        if ( $nt_agricom_fw_bg_c !='' ) {
            $theCSS .= '#footer {border-top-color: '. $nt_agricom_fw_brd_c .'; }';
        }
        if ( $nt_agricom_fw_pad !='0' ) {
            $theCSS .= '#footer{ padding: '.$nt_agricom_fw_pad.'px 0; }';
        }
        if ( $nt_agricom_fw_h_c !='' ) {
            $theCSS .= '#footer .widget .widget-head, #footer .footer__title{color: '. $nt_agricom_fw_h_c	.'!important; }';
        }
        if ( $nt_agricom_fw_a_c ) {
            $theCSS .= '#footer .widget ul li a, #footer .footer__menu a{ color: '. $nt_agricom_fw_a_c .'!important; }';
        }
        if ( $nt_agricom_fw_a_hc ) {
            $theCSS .= '#footer .widget ul li a:hover, #footer .footer__menu a:hover{ color: '. $nt_agricom_fw_a_hc .'!important; }';
        }
        if ( $nt_agricom_fw_t_c !='' ) {
            $theCSS .= '#footer .widget .textwidget{color: '. $nt_agricom_fw_t_c .'!important; }';
        }

        // FOOTER OPTIONS
        $nt_agricom_f_bg		= 	esc_attr( ot_get_option( 'nt_agricom_footerbgcolor' ) );
        $nt_agricom_f_pad		= 	esc_attr( ot_get_option( 'nt_agricom_footer_pad' ) );
        $nt_agricom_f_logo_c	= 	esc_attr( ot_get_option( 'nt_agricom_footer_logo_c' ) );
        $nt_agricom_f_p_c		= 	esc_attr( ot_get_option( 'nt_agricom_footer_p_c' ) );


        if ( $nt_agricom_f_bg  !='' ) {
            $theCSS .= '.footer-area{ background-color: '.  $nt_agricom_f_bg .'; }';
        }
        if ( $nt_agricom_f_pad  !='' ) {
            $theCSS .= '.footer-area{ padding-top: '.  $nt_agricom_f_pad .'px; padding-bottom: '.  $nt_agricom_f_pad .'px; }';
        }
        if ( $nt_agricom_f_logo_c !='' ) {
            $theCSS .= '.footer-logo.text-logo{ color: '.  $nt_agricom_f_logo_c .'; }';
        }
        if ( $nt_agricom_f_p_c !='' ) {
            $theCSS .= 'footer#footer .copyright{ color: '.  $nt_agricom_f_p_c .'; }';
        }


        // tipigrof
        $nt_agricom_typgrph = ot_get_option( 'nt_agricom_typgrph', array() );
        if ( !empty($nt_agricom_typgrph) ) :
            $theCSS .= 'body{';
            if ( !empty($nt_agricom_typgrph['font-color']) ) {$theCSS .= 'color:'.esc_attr( $nt_agricom_typgrph['font-color'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph['font-family']) ) {$theCSS .= 'font-family:"'.esc_attr( $nt_agricom_typgrph['font-family'] ).'"!important;'; }
            if ( !empty($nt_agricom_typgrph['font-size']) ) {$theCSS .= 'font-size:'.esc_attr( $nt_agricom_typgrph['font-size'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph['font-style']) ) {$theCSS .= 'font-style:'.esc_attr( $nt_agricom_typgrph['font-style'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph['font-variant']) ) {$theCSS .= 'font-variant:'.esc_attr( $nt_agricom_typgrph['font-variant'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph['font-weight']) ) {$theCSS .= 'font-weight:'.esc_attr( $nt_agricom_typgrph['font-weight'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph['letter-spacing']) ) {$theCSS .= 'letter-spacing:'.esc_attr( $nt_agricom_typgrph['letter-spacing'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph['line-height'])) {$theCSS .= 'line-height:'.esc_attr( $nt_agricom_typgrph['line-height'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph['text-decoration'])) {$theCSS .= 'text-decoration:'.esc_attr($nt_agricom_typgrph['text-decoration']).'!important;'; }
            if ( !empty($nt_agricom_typgrph['text-transform'])) {$theCSS .= 'text-transform:'.esc_attr($nt_agricom_typgrph['text-transform']).'!important;'; }
            $theCSS .= '}';
        endif;
        //
        $nt_agricom_typgrpha = ot_get_option( 'nt_agricom_typgrpha', array() );
        if ( !empty($nt_agricom_typgrpha) ) :
            $theCSS .= 'body a{';
            if ( !empty($nt_agricom_typgrpha['font-color']) ) {$theCSS .= 'color:'.esc_attr( $nt_agricom_typgrpha['font-color'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrpha['font-family']) ) {$theCSS .= 'font-family:"'.esc_attr( $nt_agricom_typgrpha['font-family'] ).'"!important;'; }
            if ( !empty($nt_agricom_typgrpha['font-size']) ) {$theCSS .= 'font-size:'.esc_attr( $nt_agricom_typgrpha['font-size'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrpha['font-style']) ) {$theCSS .= 'font-style:'.esc_attr( $nt_agricom_typgrpha['font-style'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrpha['font-variant']) ) {$theCSS .= 'font-variant:'.esc_attr( $nt_agricom_typgrpha['font-variant'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrpha['font-weight']) ) {$theCSS .= 'font-weight:'.esc_attr( $nt_agricom_typgrpha['font-weight'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrpha['letter-spacing']) ) {$theCSS .= 'letter-spacing:'.esc_attr( $nt_agricom_typgrpha['letter-spacing'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrpha['line-height'])) {$theCSS .= 'line-height:'.esc_attr( $nt_agricom_typgrpha['line-height'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrpha['text-decoration'])) {$theCSS .= 'text-decoration:'.esc_attr($nt_agricom_typgrpha['text-decoration']).'!important;'; }
            if ( !empty($nt_agricom_typgrpha['text-transform'])) {$theCSS .= 'text-transform:'.esc_attr($nt_agricom_typgrpha['text-transform']).'!important;'; }
            $theCSS .= '}';
        endif;
        //
        $nt_agricom_typgrph1 = ot_get_option( 'nt_agricom_typgrph1', array() );
        if ( !empty($nt_agricom_typgrph1) ) :
            $theCSS .= 'body h1{';
            if ( !empty($nt_agricom_typgrph1['font-color']) ) {$theCSS .= 'color:'.esc_attr( $nt_agricom_typgrph1['font-color'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph1['font-family']) ) {$theCSS .= 'font-family:"'.esc_attr( $nt_agricom_typgrph1['font-family'] ).'"!important;'; }
            if ( !empty($nt_agricom_typgrph1['font-size']) ) {$theCSS .= 'font-size:'.esc_attr( $nt_agricom_typgrph1['font-size'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph1['font-style']) ) {$theCSS .= 'font-style:'.esc_attr( $nt_agricom_typgrph1['font-style'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph1['font-variant']) ) {$theCSS .= 'font-variant:'.esc_attr( $nt_agricom_typgrph1['font-variant'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph1['font-weight']) ) {$theCSS .= 'font-weight:'.esc_attr( $nt_agricom_typgrph1['font-weight'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph1['letter-spacing']) ) {$theCSS .= 'letter-spacing:'.esc_attr( $nt_agricom_typgrph1['letter-spacing'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph1['line-height'])) {$theCSS .= 'line-height:'.esc_attr( $nt_agricom_typgrph1['line-height'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph1['text-decoration'])) {$theCSS .= 'text-decoration:'.esc_attr($nt_agricom_typgrph1['text-decoration']).'!important;'; }
            if ( !empty($nt_agricom_typgrph1['text-transform'])) {$theCSS .= 'text-transform:'.esc_attr($nt_agricom_typgrph1['text-transform']).'!important;'; }
            $theCSS .= '}';
        endif;
        //
        $nt_agricom_typgrph2 = ot_get_option( 'nt_agricom_typgrph2', array() );
        if ( !empty($nt_agricom_typgrph2) ) :
            $theCSS .= 'body h2{';
            if ( !empty($nt_agricom_typgrph2['font-color']) ) {$theCSS .= 'color:'.esc_attr( $nt_agricom_typgrph2['font-color'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph2['font-family']) ) {$theCSS .= 'font-family:'.esc_attr( $nt_agricom_typgrph2['font-family'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph2['font-size']) ) {$theCSS .= 'font-size:'.esc_attr( $nt_agricom_typgrph2['font-size'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph2['font-style']) ) {$theCSS .= 'font-style:'.esc_attr( $nt_agricom_typgrph2['font-style'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph2['font-variant']) ) {$theCSS .= 'font-variant:'.esc_attr( $nt_agricom_typgrph2['font-variant'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph2['font-weight']) ) {$theCSS .= 'font-weight:'.esc_attr( $nt_agricom_typgrph2['font-weight'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph2['letter-spacing']) ) {$theCSS .= 'letter-spacing:'.esc_attr( $nt_agricom_typgrph2['letter-spacing'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph2['line-height'])) {$theCSS .= 'line-height:'.esc_attr( $nt_agricom_typgrph2['line-height'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph2['text-decoration'])) {$theCSS .= 'text-decoration:'.esc_attr($nt_agricom_typgrph2['text-decoration']).'!important;'; }
            if ( !empty($nt_agricom_typgrph2['text-transform'])) {$theCSS .= 'text-transform:'.esc_attr($nt_agricom_typgrph2['text-transform']).'!important;'; }
            $theCSS .= '}';
        endif;
        //
        $nt_agricom_typgrph3 = ot_get_option( 'nt_agricom_typgrph3', array() );
        if ( !empty($nt_agricom_typgrph3) ) :
            $theCSS .= 'body h3{';
            if ( !empty($nt_agricom_typgrph3['font-color']) ) {$theCSS .= 'color:'.esc_attr( $nt_agricom_typgrph3['font-color'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph3['font-family']) ) {$theCSS .= 'font-family:'.esc_attr( $nt_agricom_typgrph3['font-family'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph3['font-size']) ) {$theCSS .= 'font-size:'.esc_attr( $nt_agricom_typgrph3['font-size'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph3['font-style']) ) {$theCSS .= 'font-style:'.esc_attr( $nt_agricom_typgrph3['font-style'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph3['font-variant']) ) {$theCSS .= 'font-variant:'.esc_attr( $nt_agricom_typgrph3['font-variant'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph3['font-weight']) ) {$theCSS .= 'font-weight:'.esc_attr( $nt_agricom_typgrph3['font-weight'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph3['letter-spacing']) ) {$theCSS .= 'letter-spacing:'.esc_attr( $nt_agricom_typgrph3['letter-spacing'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph3['line-height'])) {$theCSS .= 'line-height:'.esc_attr( $nt_agricom_typgrph3['line-height'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph3['text-decoration'])) {$theCSS .= 'text-decoration:'.esc_attr($nt_agricom_typgrph3['text-decoration']).'!important;'; }
            if ( !empty($nt_agricom_typgrph3['text-transform'])) {$theCSS .= 'text-transform:'.esc_attr($nt_agricom_typgrph3['text-transform']).'!important;'; }
            $theCSS .= '}';
        endif;
        //
        $nt_agricom_typgrph4 = ot_get_option( 'nt_agricom_typgrph4', array() );
        if ( !empty($nt_agricom_typgrph4) ) :
            $theCSS .= 'body h4{';
            if ( !empty($nt_agricom_typgrph4['font-color']) ) {$theCSS .= 'color:'.esc_attr( $nt_agricom_typgrph4['font-color'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph4['font-family']) ) {$theCSS .= 'font-family:'.esc_attr( $nt_agricom_typgrph4['font-family'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph4['font-size']) ) {$theCSS .= 'font-size:'.esc_attr( $nt_agricom_typgrph4['font-size'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph4['font-style']) ) {$theCSS .= 'font-style:'.esc_attr( $nt_agricom_typgrph4['font-style'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph4['font-variant']) ) {$theCSS .= 'font-variant:'.esc_attr( $nt_agricom_typgrph4['font-variant'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph4['font-weight']) ) {$theCSS .= 'font-weight:'.esc_attr( $nt_agricom_typgrph4['font-weight'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph4['letter-spacing']) ) {$theCSS .= 'letter-spacing:'.esc_attr( $nt_agricom_typgrph4['letter-spacing'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph4['line-height'])) {$theCSS .= 'line-height:'.esc_attr( $nt_agricom_typgrph4['line-height'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph4['text-decoration'])) {$theCSS .= 'text-decoration:'.esc_attr($nt_agricom_typgrph4['text-decoration']).'!important;'; }
            if ( !empty($nt_agricom_typgrph4['text-transform'])) {$theCSS .= 'text-transform:'.esc_attr($nt_agricom_typgrph4['text-transform']).'!important;'; }
            $theCSS .= '}';
        endif;
        //
        $nt_agricom_typgrph5 = ot_get_option( 'nt_agricom_typgrph5', array() );
        if ( !empty($nt_agricom_typgrph5) ) :
            $theCSS .= 'body h5{';
            if ( !empty($nt_agricom_typgrph5['font-color']) ) {$theCSS .= 'color:'.esc_attr( $nt_agricom_typgrph5['font-color'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph5['font-family']) ) {$theCSS .= 'font-family:'.esc_attr( $nt_agricom_typgrph5['font-family'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph5['font-size']) ) {$theCSS .= 'font-size:'.esc_attr( $nt_agricom_typgrph5['font-size'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph5['font-style']) ) {$theCSS .= 'font-style:'.esc_attr( $nt_agricom_typgrph5['font-style'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph5['font-variant']) ) {$theCSS .= 'font-variant:'.esc_attr( $nt_agricom_typgrph5['font-variant'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph5['font-weight']) ) {$theCSS .= 'font-weight:'.esc_attr( $nt_agricom_typgrph5['font-weight'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph5['letter-spacing']) ) {$theCSS .= 'letter-spacing:'.esc_attr( $nt_agricom_typgrph5['letter-spacing'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph5['line-height'])) {$theCSS .= 'line-height:'.esc_attr( $nt_agricom_typgrph5['line-height'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph5['text-decoration'])) {$theCSS .= 'text-decoration:'.esc_attr($nt_agricom_typgrph5['text-decoration']).'!important;'; }
            if ( !empty($nt_agricom_typgrph5['text-transform'])) {$theCSS .= 'text-transform:'.esc_attr($nt_agricom_typgrph5['text-transform']).'!important;'; }
            $theCSS .= '}';
        endif;
        //
        $nt_agricom_typgrph6 = ot_get_option( 'nt_agricom_typgrph6', array() );
        if ( !empty($nt_agricom_typgrph6) ) :
            $theCSS .= 'body h6{';
            if ( !empty($nt_agricom_typgrph6['font-color']) ) {$theCSS .= 'color:'.esc_attr( $nt_agricom_typgrph6['font-color'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph6['font-family']) ) {$theCSS .= 'font-family:'.esc_attr( $nt_agricom_typgrph6['font-family'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph6['font-size']) ) {$theCSS .= 'font-size:'.esc_attr( $nt_agricom_typgrph6['font-size'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph6['font-style']) ) {$theCSS .= 'font-style:'.esc_attr( $nt_agricom_typgrph6['font-style'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph6['font-variant']) ) {$theCSS .= 'font-variant:'.esc_attr( $nt_agricom_typgrph6['font-variant'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph6['font-weight']) ) {$theCSS .= 'font-weight:'.esc_attr( $nt_agricom_typgrph6['font-weight'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph6['letter-spacing']) ) {$theCSS .= 'letter-spacing:'.esc_attr( $nt_agricom_typgrph6['letter-spacing'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph6['line-height'])) {$theCSS .= 'line-height:'.esc_attr( $nt_agricom_typgrph6['line-height'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph6['text-decoration'])) {$theCSS .= 'text-decoration:'.esc_attr($nt_agricom_typgrph6['text-decoration']).'!important;'; }
            if ( !empty($nt_agricom_typgrph6['text-transform'])) {$theCSS .= 'text-transform:'.esc_attr($nt_agricom_typgrph6['text-transform']).'!important;'; }
            $theCSS .= '}';
        endif;
        $nt_agricom_typgrph7 = ot_get_option( 'nt_agricom_typgrph7', array() );
        if ( !empty($nt_agricom_typgrph7) ) :
            $theCSS .= 'body p{';
            if ( !empty($nt_agricom_typgrph7['font-color']) ) {$theCSS .= 'color:'.esc_attr( $nt_agricom_typgrph7['font-color'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph7['font-family']) ) {$theCSS .= 'font-family:'.esc_attr( $nt_agricom_typgrph7['font-family'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph7['font-size']) ) {$theCSS .= 'font-size:'.esc_attr( $nt_agricom_typgrph7['font-size'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph7['font-style']) ) {$theCSS .= 'font-style:'.esc_attr( $nt_agricom_typgrph7['font-style'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph7['font-variant']) ) {$theCSS .= 'font-variant:'.esc_attr( $nt_agricom_typgrph7['font-variant'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph7['font-weight']) ) {$theCSS .= 'font-weight:'.esc_attr( $nt_agricom_typgrph7['font-weight'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph7['letter-spacing']) ) {$theCSS .= 'letter-spacing:'.esc_attr( $nt_agricom_typgrph7['letter-spacing'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph7['line-height'])) {$theCSS .= 'line-height:'.esc_attr( $nt_agricom_typgrph7['line-height'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph7['text-decoration'])) {$theCSS .= 'text-decoration:'.esc_attr($nt_agricom_typgrph7['text-decoration']).'!important;'; }
            if ( !empty($nt_agricom_typgrph7['text-transform'])) {$theCSS .= 'text-transform:'.esc_attr($nt_agricom_typgrph7['text-transform']).'!important;'; }
            $theCSS .= '}';
        endif;
        $nt_agricom_typgrph7 = ot_get_option( 'nt_agricom_typgrph_copy', array() );
        if ( !empty($nt_agricom_typgrph7) ) :
            $theCSS .= '#footer, #footer .copyright{';
            if ( !empty($nt_agricom_typgrph7['font-color']) ) {$theCSS .= 'color:'.esc_attr( $nt_agricom_typgrph7['font-color'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph7['font-family']) ) {$theCSS .= 'font-family:'.esc_attr( $nt_agricom_typgrph7['font-family'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph7['font-size']) ) {$theCSS .= 'font-size:'.esc_attr( $nt_agricom_typgrph7['font-size'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph7['font-style']) ) {$theCSS .= 'font-style:'.esc_attr( $nt_agricom_typgrph7['font-style'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph7['font-variant']) ) {$theCSS .= 'font-variant:'.esc_attr( $nt_agricom_typgrph7['font-variant'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph7['font-weight']) ) {$theCSS .= 'font-weight:'.esc_attr( $nt_agricom_typgrph7['font-weight'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph7['letter-spacing']) ) {$theCSS .= 'letter-spacing:'.esc_attr( $nt_agricom_typgrph7['letter-spacing'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph7['line-height'])) {$theCSS .= 'line-height:'.esc_attr( $nt_agricom_typgrph7['line-height'] ).'!important;'; }
            if ( !empty($nt_agricom_typgrph7['text-decoration'])) {$theCSS .= 'text-decoration:'.esc_attr($nt_agricom_typgrph7['text-decoration']).'!important;'; }
            if ( !empty($nt_agricom_typgrph7['text-transform'])) {$theCSS .= 'text-transform:'.esc_attr($nt_agricom_typgrph7['text-transform']).'!important;'; }
            $theCSS .= '}';
        endif;

    /* Add CSS to style.css */
    wp_add_inline_style( 'nt-agricom-custom-style', $theCSS );
}

add_action( 'wp_enqueue_scripts', 'nt_agricom_css_options' );
