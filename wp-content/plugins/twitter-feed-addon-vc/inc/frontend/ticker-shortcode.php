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
    $controls_color = (isset($customization['controls_color']) && !empty($customization['controls_color']))?esc_attr($customization['controls_color']):'';

$tfa_vc_settings = $this->tfa_vc_settings;
if ( isset( $atts['username'] ) ) {
    $tfa_vc_settings['twitter_username'] = $atts['username'];
}
if ( isset( $atts['total_feeds'] ) && $atts['total_feeds'] != '' ) {
    $tfa_vc_settings['total_feed'] = $atts['total_feeds'];
}
else{
    $tfa_vc_settings['total_feed'] = $atts['total_tweets'];
}
// $this->print_array( $atts );
$date_time_format = isset($atts['data_time_format'])?$atts['data_time_format']:'full_date';
$username_link_status = (isset($atts['username_link_status']) && !empty($atts['username_link_status']))?boolval(0):boolval(1);
$username = $tfa_vc_settings['twitter_username'];
$total_feeds = $tfa_vc_settings['total_feed'];
if ( isset( $atts['hashtag'] ) && $atts['hashtag'] != '' ) {
    $tweets = $this->get_twitter_hastag_tweets( $atts['hashtag'], $total_feeds );
} else {

    $username_array = explode( ',', $username );
    if ( count( $username_array ) > 1 ) {
        $tweets = $this->get_multiple_twitter_tweets( $username, $total_feeds );
    } else {
        $tweets = $this->get_twitter_tweets( $username, $total_feeds );
    }
}
$template = isset( $atts['template'] ) ? $atts['template'] : 'template-1';
$mouse_pause = isset( $atts['mouse_pause'] ) ? $atts['mouse_pause'] : 'false';
$slide_controls = (isset( $atts['controls'] ) && $atts['controls'] == '1') ? 'true' : 'false';
$ticker_speed = isset( $atts['ticker_speed'] ) ? $atts['ticker_speed'] : '6000';
$transition_speed = (isset( $atts['transition_speed'] ) && $atts['transition_speed'] !='')? esc_attr($atts['transition_speed']) : 'slow';
$visible_tweets = isset( $atts['visible_tweets'] ) ? $atts['visible_tweets'] : '1';
$ticker_direction = isset( $atts['ticker_direction'] ) ? $atts['ticker_direction'] : 'up';
$controls = (isset( $atts['controls'] ) && $atts['controls'] == '1') ? 1 : 0;
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
if ( isset( $tweets->errors ) || !is_array($tweets) ) {
    $fallback_message = ($atts['fetch_unavailable'] == '') ? __( 'Something went wrong with the twitter.', TFA_VC_DOMAIN ) : $atts['fetch_unavailable'];
    ?>
    <p><?php echo $fallback_message; ?></p>
    <?php
} else {
    ?>

    <div class="tfa-tweets-ticker-wrapper tfa-<?php echo $template; ?> tfa-ticker-<?php echo $template; ?> <?php echo $customization_class ?>">
        <?php if (isset($controls) && $controls == 1): ?>
            <div class="tfa-ticker-controls">
                <a href="javascript:void(0);" class="tfa-ticker-up" id="tfa-ticker-up-<?php echo rand( 111111111, 999999999 ); ?>"><i class="fa fa-chevron-up" <?php echo !empty($controls_color)?("style=' color: " . esc_attr($controls_color) . "'"):'' ?>></i></a>
                <a href="javascript:void(0);" class="tfa-ticker-down" id="tfa-ticker-down-<?php echo rand( 111111111, 999999999 ); ?>"><i class="fa fa-chevron-down" <?php echo !empty($controls_color)?("style=' color: " . esc_attr($controls_color) . "'"):'' ?>></i></a>
            </div>
        <?php endif ?>
        <div class="tfa-pro-ticker-main-wrapper" data-ticker-speed ="<?php echo $ticker_speed; ?>" data-transition-speed ="<?php echo $transition_speed; ?>" data-mouse-pause = "<?php echo $mouse_pause; ?>" data-direction="<?php echo $ticker_direction; ?>" data-controls="<?php echo $controls; ?>" data-visible="<?php echo $visible_tweets;?>">
            <div class="tfa-ticker-inner-wrap">
                <?php
                if ( file_exists( TFA_VC_PATH.'/inc/frontend/templates/default/' . $template . '.php' ) ) {

                    include(TFA_VC_PATH.'/inc/frontend/templates/default/' . $template . '.php');
                }

                ?>
            </div>
        </div>
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
    </div>
    <?php
    include plugin_dir_path( __FILE__ ) . "templates/customization/$template.php";
}
?>

