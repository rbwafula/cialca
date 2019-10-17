<?php
defined('ABSPATH') or die('No scripts for you');

$twitter_datachoice	= isset($atts['twitter_datachoice'])?esc_attr($atts['twitter_datachoice']):esc_attr('username');
$twitter_template = isset($atts['twitter_template'])?esc_attr($atts['twitter_template']):esc_attr('template-1');
$twitter_user = isset($atts['twitter_user'])?esc_attr($atts['twitter_user']):'';
$twitter_hashtag = (isset($atts['twitter_hashtag']) && !empty($atts['twitter_hashtag']))?esc_attr($atts['twitter_hashtag']):'';
$username = '';
if ($twitter_datachoice == 'username') {
	$username .= 'username="' . $twitter_user . '"';
}
else if ($twitter_datachoice == 'hashtag') {
	$username .= 'hashtag="' . $twitter_hashtag . '"';
}
$display_actions = isset($atts['display_actions'])?'0':'1';
$username_link_status = isset($atts['username_link_status'])?'1':'0';
$date_time_format = isset($atts['date_time_format'])?esc_attr($atts['date_time_format']):esc_attr('full_date');
$follow_btn_status = isset($atts['follow_btn_status'])?'true':'false';
$no_of_tweets = isset($atts['no_of_tweets'])?intval($atts['no_of_tweets']):intval(4);
$auto_slide = isset($atts['auto_slide'])?'0':'1';
$slider_controls = isset($atts['slider_controls'])?'0':'1';
$adaptive_height = isset($atts['adaptive_height'])?'false':'true';
$slider_mode = isset($atts['slider_mode'])?esc_attr($atts['slider_mode']):esc_attr('horizontal');
$slide_duration	= isset($atts['slide_duration'])?intval($atts['slide_duration']):intval(1000);

$disable_image_status = isset($atts['disable_image_status'])?'1':'0';
$image_width = isset($atts['image_width'])?esc_attr($atts['image_width']):'';

$fetch_unavailable = isset($atts['fetch_unavailable'])?esc_attr($atts['fetch_unavailable']):'';

$temp_custom = array(
			'background_color'=>isset($atts['background_color'])?esc_attr($atts['background_color']):'',
			'text_color'=>isset($atts['text_color'])?esc_attr($atts['text_color']):'',
			'link_color'=>isset($atts['link_color'])?esc_attr($atts['link_color']):'',
			'username_color'=>isset($atts['username_color'])?esc_attr($atts['username_color']):'',
			'username_link_color'=>isset($atts['username_link_color'])?esc_attr($atts['username_link_color']):'',
			'date_time_color'=>isset($atts['date_time_color'])?esc_attr($atts['date_time_color']):'',
			'border_color'=>isset($atts['border_color'])?esc_attr($atts['border_color']):'',
			'twitter_icon_color'=>isset($atts['twitter_icon_color'])?esc_attr($atts['twitter_icon_color']):'',
			'twitter_action_color'=>isset($atts['twitter_action_color'])?esc_attr($atts['twitter_action_color']):'',
			'twitter_action_bg_color'=>isset($atts['twitter_action_bg_color'])?esc_attr($atts['twitter_action_bg_color']):'',
			'follow_btn_txt_color'=>isset($atts['follow_btn_txt_color'])?esc_attr($atts['follow_btn_txt_color']):'',
			'follow_btn_bg_color'=>isset($atts['follow_btn_bg_color'])?esc_attr($atts['follow_btn_bg_color']):'',
		);
$customization = maybe_serialize($temp_custom);

echo do_shortcode("[twitter-feed-addon-vc-slider $username template='$twitter_template' data_time_format='$date_time_format' username_link_status='$username_link_status' follow_button='$follow_btn_status' total_feeds='$no_of_tweets' display_actions='$display_actions' auto_slide='$auto_slide' controls='$slider_controls' adaptive_height='$adaptive_height' slider_mode='$slider_mode' slide_duration='$slide_duration' image_width='$image_width' image_status='$disable_image_status' customization='$customization' fetch_unavailable='$fetch_unavailable']");

if (isset($_GET['vc_editable'])) {
	if ($_GET['vc_editable'] == true) {
		?>
		<div class="tfa-init-slider">
			<script type="text/javascript">
				tfaInitSlider(jQuery('.tfa-init-slider').parent().find('.tfa-tweets-slider-wrapper'),true);
			</script>
		</div>
		<?php
	}
}