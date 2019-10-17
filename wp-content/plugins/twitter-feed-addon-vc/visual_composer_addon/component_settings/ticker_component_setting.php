<?php
defined('ABSPATH') or die('No scripts for you');
vc_map( array(
            "name"        => __("Ticker Twitter Feeds", TFA_VC_DOMAIN),
            "description" => __("Display twitter feeds in ticker", TFA_VC_DOMAIN),
            "base"        => "twitter_feed_ticker_addon",
            "class"       => "tfaddon-ticker-form-wrapper",
            "icon"        => TFA_VC_CSS_DIR . '/twitter-addon-logo-ticker.png', // or css class name which you can reffer in your css file later. Example: "vc_extend_my_class"
            "category"    => __('Twitter Feed Addon', TFA_VC_DOMAIN),
            "front_enqueue_js"  => TFA_VC_JS_DIR . '/extended-frontend-addon-js.js',
            "admin_enqueue_js"  => TFA_VC_JS_DIR . '/extended-backend-addon-js.js',
            "as_child"    => array('only' => 'twitter_feed_addon'),
            "content_element" => true,
            "is_container"    => false,
            "params" => array(
                array(
                    "type"        => "dropdown",
                    "class"       => "tfa_simple_data_type",
                    "heading"     => __("Choose data from", TFA_VC_DOMAIN),
                    "group"       => "General",
                    "param_name"  => "twitter_datachoice",
                    "value"       => array(
                                        'Username'  => 'username',
                                        'Hashtag'   => 'hashtag',
                                      ),
                    "std"         => "username",
                    "description" => __("Choose the twitter data from either username or hashtag.", TFA_VC_DOMAIN)
                ),
                array(
                    "type"        => "textfield",
                    "class"       => "",
                    "heading"     => __("Username", TFA_VC_DOMAIN),
                    "group"       => "General",
                    "param_name"  => "twitter_user",
                    "value"       => '',
                    "description" => __("Please enter the username of twitter account from which the feeds need to be fetched. For multiple account in single feed, please use comma separated username without any spaces( )For example:@apthemes or facebook,twitter,instagram,cnn", TFA_VC_DOMAIN),
                    "dependency"  => array('element'  => 'twitter_datachoice',  'value' => 'username')
                ),
                array(
                    "type"        => "textfield",
                    "class"       => "",
                    "heading"     => __("Hashtag", TFA_VC_DOMAIN),
                    "group"       => "General",
                    "param_name"  => "twitter_hashtag",
                    "value"       => '',
                    "description" => __("Note: Add hashtag if you want to show the feeds from specific hashtags such as #nature. Leave blank if you want to show the tweets of a user.", TFA_VC_DOMAIN),
                  "dependency"  => array('element'  => 'twitter_datachoice',  'value' => 'hashtag')
                ),
                array(
                    "type"        => "numberField",
                    "class"       => "",
                    "heading"     => __("Total Tweets", TFA_VC_DOMAIN),
                    "group"       => "General",
                    "param_name"  => "no_of_tweets",
                    "value"       => '4',
                    "description" => __("Enter a Total Tweets", TFA_VC_DOMAIN)
                ),
                array(
                    "type"        => "numberField",
                    "class"       => "",
                    "heading"     => __("Visible Tweets", TFA_VC_DOMAIN),
                    "group"       => "General",
                    "param_name"  => "visible_tweets",
                    "value"       => '2',
                    "description" => __("Enter a number of visible tweets", TFA_VC_DOMAIN)
                ),
                array(
                    "type"        => "dropdown",
                    "class"       => "",
                    "heading"     => __("Date and Time Format", TFA_VC_DOMAIN),
                    "group"       => "General",
                    "param_name"  => "date_time_format",
                    "value"       => array(
                                        'Full Date and Time'  => 'full_date',
                                        'Date only'           => 'date_only',
                                        'Elapsed Time'        => 'elapsed_time'
                                      ),
                    "std"         => "full_date",
                    "description" => __("Show/Hide twitter username link", TFA_VC_DOMAIN)
                ),
                array(
                    "type"        => "textfield",
                    "class"       => "",
                    "group"       => "General",
                    "heading"     => __("Fetch Unavailable Message",TFA_VC_DOMAIN),
                    "param_name"  => "fetch_unavailable",
                    "value"       => ''
                ),
                array(
                    "type"        => "checkbox",
                    "class"       => "",
                    "heading"     => '',
                    "group"       => "Components",
                    "param_name"  => "follow_btn_status",
                    "value"       => array("Show Follow Button?" => true),
                    // "description" => __("Show/Hide follow button", TFA_VC_DOMAIN)
                ),
                array(
                  "type"        => "checkbox",
                  "class"       => "tfa_simple_action_status",
                  "heading"     => '',
                  "group"       => "Components",
                  "param_name"  => "display_actions",
                  "value"       => array("Disable Twitter Actions?" => true),
                  // "description" => __("Disable Twitter Actions (Reply, Retweet, Favorite)", TFA_VC_DOMAIN),
                ),
                array(
                    "type"        => "checkbox",
                    "class"       => "",
                    "heading"     => '',
                    "group"       => "Components",
                    "param_name"  => "username_link_status",
                    "value"       => array("Disable twitter username?" => true),
                    // "description" => __("Disable twitter username link and text", TFA_VC_DOMAIN)
                ),
                array(
                      "type"        => "textfield",
                      "class"       => "tfa_simple_image_width",
                      "heading"     => __("Image Width", TFA_VC_DOMAIN),
                      "group"       => "Components",
                      "param_name"  => "image_width",
                      "value"       => '',
                      "description" => __("Please enter the width of the image that will show up in the twitter feed in px or % . Default is 100%", TFA_VC_DOMAIN),
                  ),
                  array(
                      "type"        => "checkbox",
                      "class"       => "tfa_simple_image_status",
                      "heading"     => '',
                      "group"       => "Components",
                      "param_name"  => "disable_image_status",
                      "value"       => array("Disable Image on Feeds?" => true),
                  ),
                array(
                    "type"        => "dropdown",
                    "class"       => "",
                    "heading"     => __("Direction", TFA_VC_DOMAIN),
                    "group"       => "Ticker Settings",
                    "param_name"  => "ticker_direction",
                    "value"       => array(
                                          'Up'    => 'up',
                                          'Down'  => 'down',
                                        ),
                    "std"         => 'up',
                    "description" => __("Choose the direction in which the ticker moves", TFA_VC_DOMAIN)
                ),
                array(
                    "type"        => "numberField",
                    "class"       => "",
                    "heading"     => __("Ticker Speed", TFA_VC_DOMAIN),
                    "group"       => "Ticker Settings",
                    "param_name"  => "ticker_speed",
                    "value"       => '6000',
                    "description" => __("Assign the speed in which the ticker moves.", TFA_VC_DOMAIN)
                ),
                array(
                    "type"        => "numberField",
                    "class"       => "",
                    "heading"     => __("Ticker Pause Duration", TFA_VC_DOMAIN),
                    "group"       => "Ticker Settings",
                    "param_name"  => "ticker_pause_duration",
                    "value"       => '2500',
                    "description" => __("Assign the pause duration of the ticker until the next tweet moves in.", TFA_VC_DOMAIN)
                ),
                array(
                    "type"        => "checkbox",
                    "class"       => "",
                    "heading"     => '',
                    "group"       => "Ticker Settings",
                    "param_name"  => "ticker_pause_mousehover",
                    "value"       => array("Pause on Mouse Hover?" => true),
                    // "description" => __("Check to pause the ticker on mouse over.", TFA_VC_DOMAIN)
                ),
                array(
                    "type"        => "checkbox",
                    "class"       => "",
                    "heading"     => '',
                    "group"       => "Ticker Settings",
                    "param_name"  => "display_controls",
                    "value"       => array("Disable Controls?" => true),
                    // "description" => __("Disable the ticker controls elements", TFA_VC_DOMAIN)
                ),
                array(
                    "type"        => "dropdown",
                    "class"       => "tfaddon_template",
                    "heading"     => __("Template", TFA_VC_DOMAIN),
                    "group"       => "Layout",
                    "param_name"  => "twitter_template",
                    "value"       => $dynamic_template_array,
                    "std"         => 'template-1',
                    "description" => __("Choose twitter template", TFA_VC_DOMAIN),
                    "admin_label" => true
                ),
                array(
                  "type"        => "colorpicker",
                  "class"       => "",
                  "heading"     => __("Background Color", TFA_VC_DOMAIN),
                  "group"       => "Layout",
                  "param_name"  => "background_color",
                  "value"       => '', //Default Red color
                  "dependency"  => array('element'=> 'twitter_template','value'=> array('template-1','template-3','template-4','template-5','template-6','template-9','template-10','template-11'))
              ),
              array(
                  "type"        => "colorpicker",
                  "class"       => "",
                  "heading"     => __( "Text Color" , TFA_VC_DOMAIN ),
                  "group"       => "Layout",
                  "param_name"  => "text_color",
                  "value"       => '',
                  "dependency"  => array('element'=> 'twitter_template','value'=> array('template-1','template-2','template-3','template-4','template-5','template-6','template-7','template-8','template-9','template-10','template-11','template-12') )
              ),
              array(
                  "type"        => "colorpicker",
                  "class"       => "",
                  "heading"     => __( "Link Color" , TFA_VC_DOMAIN ),
                  "group"       => "Layout",
                  "param_name"  => "link_color",
                  "value"       => '',
                  "dependency"  => array('element'=> 'twitter_template','value'=> array('template-1','template-2','template-3','template-4','template-5','template-6','template-7','template-8','template-9','template-10','template-11','template-12') )
              ),
              array(
                  "type"        => "colorpicker",
                  "class"       => "",
                  "heading"     => __( "Username Color" , TFA_VC_DOMAIN ),
                  "group"       => "Layout",
                  "param_name"  => "username_color",
                  "value"       => '',
                  "dependency"  => array('element'=> 'twitter_template','value'=> array('template-2','template-3','template-4','template-5','template-6','template-7','template-8','template-9','template-10','template-11','template-12') )
              ),
              array(
                  "type"        => "colorpicker",
                  "class"       => "",
                  "heading"     => __( "Username Link Color" , TFA_VC_DOMAIN ),
                  "group"       => "Layout",
                  "param_name"  => "username_link_color",
                  "value"       => '',
                  "dependency"  => array('element'=> 'twitter_template','value'=> array('template-1','template-2','template-4','template-5','template-6','template-7','template-8','template-9','template-10','template-11','template-12') )
              ),
              array(
                  "type"        => "colorpicker",
                  "class"       => "",
                  "heading"     => __( "Date and Time Color" , TFA_VC_DOMAIN ),
                  "group"       => "Layout",
                  "param_name"  => "date_time_color",
                  "value"       => '',
                  "dependency"  => array('element'=> 'twitter_template','value'=> array('template-1','template-2','template-3','template-4','template-5','template-6','template-7','template-8','template-9','template-10','template-11','template-12') )
              ),
              array(
                  "type"        => "colorpicker",
                  "class"       => "",
                  "heading"     => __( "Border Color" , TFA_VC_DOMAIN ),
                  "group"       => "Layout",
                  "param_name"  => "border_color",
                  "value"       => '',
                  "dependency"  => array('element'=> 'twitter_template','value'=> array('template-1','template-9') )
              ),
              array(
                  "type"        => "colorpicker",
                  "class"       => "",
                  "heading"     => __( "Twitter Icon Color" , TFA_VC_DOMAIN ),
                  "group"       => "Layout",
                  "param_name"  => "twitter_icon_color",
                  "value"       => '',
                  "dependency"  => array('element'=> 'twitter_template','value'=> array('template-1','template-2','template-3','template-4','template-5','template-6','template-7','template-8','template-9','template-10','template-11','template-12') )
              ),
              array(
                  "type"        => "colorpicker",
                  "class"       => "",
                  "heading"     => __( "Twitter Action Color" , TFA_VC_DOMAIN ),
                  "group"       => "Layout",
                  "param_name"  => "twitter_action_color",
                  "value"       => '',
                  "dependency"  => array('element'=> 'twitter_template','value'=> array('template-1','template-2','template-3','template-4','template-5','template-6','template-7','template-8','template-9','template-10','template-11','template-12') )
              ),
              array(
                  "type"        => "colorpicker",
                  "class"       => "",
                  "heading"     => __( "Twitter Action Background Color" , TFA_VC_DOMAIN ),
                  "group"       => "Layout",
                  "param_name"  => "twitter_action_bg_color",
                  "value"       => '',
                  "dependency"  => array('element'=> 'twitter_template','value'=> array('template-1') )
              ),
              array(
                  "type"        => "colorpicker",
                  "class"       => "",
                  "heading"     => __( "Follow Button Text Color" , TFA_VC_DOMAIN ),
                  "group"       => "Layout",
                  "param_name"  => "follow_btn_txt_color",
                  "value"       => '',
              ),
              array(
                  "type"        => "colorpicker",
                  "class"       => "",
                  "heading"     => __( "Follow Button Background Color" , TFA_VC_DOMAIN ),
                  "group"       => "Layout",
                  "param_name"  => "follow_btn_bg_color",
                  "value"       => '',
              ),
              array(
                  "type"        => "colorpicker",
                  "class"       => "",
                  "heading"     => __("Controls Color",TFA_VC_DOMAIN),
                  "group"       => "Layout",
                  "param_name"  => "controls_color",
                  "value"       => ""
              ),
            )
        ) );