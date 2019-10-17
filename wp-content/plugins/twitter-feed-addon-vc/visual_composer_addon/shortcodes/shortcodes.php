<?php
defined('ABSPATH') or die('No scripts for you');

	extract( shortcode_atts( array(
			'header_text'		=> 'Twitter Feeds',
			'header_color'		=> '#000',
			'header_alignment'	=> 'left',
			'custom_css'		=> '',
			'header_margin_bottom'=> '0'
		), $atts ) );

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $custom_css, ' ' ), 'twitter_feed_addon', $atts );

echo "<div class='tfa-main-container $css_class'>";
if (!empty($header_text)) {
	echo "<div class='tfa-header-label' style='color: $header_color;text-align:$header_alignment;margin-bottom:" . $header_margin_bottom . "px;'>$header_text</div>";
}
echo "<div class='tfa-items-wrapper'>";
echo do_shortcode($content);
echo "</div>";
echo "</div>";