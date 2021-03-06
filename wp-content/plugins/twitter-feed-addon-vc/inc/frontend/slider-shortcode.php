<?php
// $this->print_array($atts);

$customization_class = 'tfa-custom-' . str_pad( dechex( mt_rand( 0, pow(16, 5) ) ), 2, '0', STR_PAD_LEFT);
$customization = maybe_unserialize($atts['customization']);

    $background_color = ( isset($customization['background_color']) && !empty($customization['background_color']))?esc_attr($customization['background_color']):'';
    $text_color = ( isset($customization['text_color']) && !empty($customization['text_color']))?esc_attr($customization['text_color']):'';
    $link_color = ( isset($customization['link_color']) && !empty($customization['link_color']))?esc_attr($customization['link_color']):'';
    $username_color = ( isset($customization['username_color']) && !empty($customization['username_color']))?esc_attr($customization['username_color']):'';
    $username_link_color = ( isset($customization['username_link_color']) && !empty($customization['username_link_color']))?esc_attr($customization['username_link_color']):'';
    $date_time_color = ( isset($customization['date_time_color']) && !empty($customization['date_time_color']))?esc_attr($customization['date_time_color']):'';
    $border_color = ( isset($customization['border_color']) && !empty($customization['border_color']))?esc_attr($customization['border_color']):'';
    $twitter_icon_color = ( isset($customization['twitter_icon_color']) && !empty($customization['twitter_icon_color']))?esc_attr($customization['twitter_icon_color']):'';
    $twitter_action_color = ( isset($customization['twitter_action_color']) && !empty($customization['twitter_action_color']))?esc_attr($customization['twitter_action_color']):'';
    $twitter_action_bg_color = ( isset($customization['twitter_action_bg_color']) && !empty($customization['twitter_action_bg_color']))?esc_attr($customization['twitter_action_bg_color']):'';
    $follow_btn_txt_color = (isset($customization['follow_btn_txt_color']) && !empty($customization['follow_btn_txt_color']))?esc_attr($customization['follow_btn_txt_color']):'';
    $follow_btn_bg_color = (isset($customization['follow_btn_bg_color']) && !empty($customization['follow_btn_bg_color']))?esc_attr($customization['follow_btn_bg_color']):'';

$date_time_format = isset($atts['data_time_format'])?$atts['data_time_format']:'full_date';
$username_link_status = (isset($atts['username_link_status']) && !empty($atts['username_link_status']))?boolval(0):boolval(1);
$tfa_vc_settings = $this->tfa_vc_settings;
$username = isset( $atts['username'] ) ? $atts['username'] : '';
$total_feeds = isset($atts['total_feeds']) ? $atts['total_feeds'] : '4';
if ( isset( $atts['hashtag'] ) && $atts['hashtag'] != '' ) {
    $tweets = $this->get_twitter_hastag_tweets( $atts['hashtag'], $total_feeds );
} else {

    $username_array = explode(',',$username);
        if(count($username_array)>1){
            $tweets = $this->get_multiple_twitter_tweets($username,$total_feeds);
            
        }else{
             $tweets = $this->get_twitter_tweets( $username, $total_feeds );
        }
}
//var_dump($tweets);
$template = isset( $atts['template'] ) ? $atts['template'] : 'template-1';
$auto_slide = isset( $atts['auto_slide'] ) ? $atts['auto_slide'] : 'true';
$slide_controls = isset( $atts['controls'] ) ? $atts['controls'] : 'true';
$adaptive_height = (isset( $atts['adaptive_height'] ))? $atts['adaptive_height'] : 'true';
$slider_mode = isset( $atts['slider_mode'] ) ? $atts['slider_mode'] : 'horizontal';
$slide_duration = isset( $atts['slide_duration'] ) ? $atts['slide_duration'] : '3000';
if ( isset( $atts['follow_button'] ) ) {
    if ( $atts['follow_button'] == 'true' ) {
        $tfa_vc_settings['display_follow_button'] = 1;
    } else {
        $tfa_vc_settings['display_follow_button'] = 0;
    }
}
if ( isset( $atts['display_actions'] ) ) {
    if ( $atts['display_actions'] == 'true' ) {
        $tfa_vc_settings['display_twitter_actions'] = 0;
    } else {
        $tfa_vc_settings['display_twitter_actions'] = 1;
    }
}
//$this->print_array($tweets);
if ( isset( $tweets->errors ) || !is_array($tweets) ) {
    $fallback_message = ($atts['fetch_unavailable'] == '') ? __( 'Something went wrong with the twitter.', TFA_VC_DOMAIN ) : $atts['fetch_unavailable'];
    ?>
    <p><?php echo $fallback_message; ?></p>
    <?php
} else {
    ?>
    <div class="tfa-<?php echo $template; ?> tfa-slider-<?php echo $template; ?> <?php echo $customization_class ?>" >
        <div class="tfa-tweets-slider-wrapper" data-auto-slide ="<?php echo $auto_slide; ?>" data-slide-controls = "<?php echo $slide_controls; ?>" data-slide-duration="<?php echo $slide_duration; ?>" data-adaptive="<?php echo $adaptive_height; ?>" data-mode="<?php echo $slider_mode; ?>">
            <?php
            if(  file_exists( TFA_VC_PATH.'/inc/frontend/templates/default/' . $template . '.php' )){
                include(TFA_VC_PATH.'/inc/frontend/templates/default/' . $template . '.php');
            }
            ?>
        </div><!--tfa-tweets-slider-wrapper-->
        <?php if ( isset( $tfa_vc_settings['display_follow_button'] ) && $tfa_vc_settings['display_follow_button'] == 1 ) {
            ?>
            <div class="tfa-seperator"></div>
            <?php
            if ( isset( $atts['hashtag'] ) && $atts['hashtag'] != '' ) {
                $follow_username = (isset( $atts['hashtag'] ) && $atts['hashtag'] != '')?esc_attr(trim($atts['hashtag'],'#')):esc_attr($tweet->user->screen_name);
                include(plugin_dir_path( __FILE__ ) . 'templates/follow-btn.php');
            } else {
                if (!empty($username)) {
                    if ( count( $username_array ) >= 1 ) {
                        foreach ($username_array as $index => $follow_username) {
                            $follow_username = !empty($follow_username)?esc_attr($follow_username):esc_attr($tweet->user->screen_name);
                            include(plugin_dir_path( __FILE__ ) . 'templates/follow-btn.php');
                        }
                    }
                }
                else{
                    $follow_username = esc_attr($tweet->user->screen_name);
                    include(plugin_dir_path( __FILE__ ) . 'templates/follow-btn.php');
                }
            }
        }
        ?>
    </div><!--tfa-template-1 -->
    <?php
//var_dump($tweets);
    include plugin_dir_path( __FILE__ ) . "templates/customization/$template.php";
}
?>

