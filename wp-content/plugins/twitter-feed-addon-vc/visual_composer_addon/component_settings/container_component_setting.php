<?php
defined('ABSPATH') or die('No scripts for you');
 vc_map( array(
            "name"        => __("Twitter Feed Addon", TFA_VC_DOMAIN),
            "description" => __("Display twitter feeds", TFA_VC_DOMAIN),
            "base"        => "twitter_feed_addon",
            "class"       => "tfaddon-form-wrapper",
            "controls"    => "full",
            "icon"        => TFA_VC_IMAGE_DIR . '/twitter.png', // or css class name which you can reffer in your css file later. Example: "vc_extend_my_class"
            "category"    => __('Twitter Feed Addon', TFA_VC_DOMAIN),
            "as_parent"    => array('only' => 'twitter_feed_simple_addon,twitter_feed_slider_addon,twitter_feed_ticker_addon'),
            "content_element" => true,
            "show_settings_on_create" => true,
            "params" => array(
                array(
                    "type"        => "textfield",
                    "heading"     => __("Header text", TFA_VC_DOMAIN),
                    "group"       => "General",
                    "param_name"  => "header_text",
                    "value"       => __("Twitter Feeds",TFA_VC_DOMAIN),
                    "description" => __("Enter a header text", TFA_VC_DOMAIN),
                    "admin_label" => false
                ),
                array(
                    "type"        => "colorpicker",
                    "heading"     => __("Header Color", TFA_VC_DOMAIN),
                    "group"       => "General",
                    "param_name"  => "header_color",
                    "value"       => '#000', //Default Red color
                    "description" => __("Choose a color for username", TFA_VC_DOMAIN),
                    "dependency"  => array('element'=>'header_text','not_empty'=>true)
                ),
                array(
                    "type"        => "dropdown",
                    "heading"     => __("Header Alignment", TFA_VC_DOMAIN),
                    "group"       => "General",
                    "param_name"  => "header_alignment",
                    "value"       => array(
                                    'Left'  => 'left',
                                    'Center'=> 'center',
                                    'Right'=> 'right',
                                    ), //Default Red color
                    "std"         => 'left',
                    "description" => __("Choose header alignment", TFA_VC_DOMAIN),
                    "dependency"  => array('element'=>'header_text','not_empty'=>true)
                ),
                array(
                    "type"        => "numberField",
                    "heading"     => __("Header Bottom Margin",TFA_VC_DOMAIN),
                    "group"       => "Layout",
                    "param_name"  => "header_margin_bottom",
                    "value"       => '0',
                ),
                array(
                    "type"        => "css_editor",
                    "heading"     => __("Custom CSS", TFA_VC_DOMAIN),
                    "group"       => "Layout",
                    "param_name"  => "custom_css",
                    "value"       => '', //Default Red color
                    "description" => __("Customize the component area", TFA_VC_DOMAIN),
                ),
            ),
            "js_view" => 'VcColumnView' //Backbone.js
        ) );