<?php
defined('ABSPATH') or die('No scripts for you');

	$twitter_datachoice = isset($atts['twitter_datachoice'])?esc_attr($atts['twitter_datachoice']):esc_attr('username');
	$twitter_template = isset($atts['twitter_template'])?esc_attr($atts['twitter_template']):esc_attr('template-1');
	$twitter_user = isset($atts['twitter_user'])?esc_attr($atts['twitter_user']):'';
	$twitter_hashtag = isset($atts['twitter_hashtag'])?esc_attr($atts['twitter_hashtag']):'';
	$display_actions = isset($atts['display_actions'])?'true':'false';
	$username_link_status = isset($atts['username_link_status'])?'1':'0';
	$date_time_format = isset($atts['date_time_format'])?esc_attr($atts['date_time_format']):esc_attr('full_date');
	$no_of_tweets = isset($atts['no_of_tweets'])?esc_attr($atts['no_of_tweets']):'4';
	$follow_btn_status = isset($atts['follow_btn_status'])?'true':'false';
	
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

	$data_source = ($twitter_datachoice == 'username')?(!empty($twitter_user)?('username="' . $twitter_user . '"'):''):("hashtag='$twitter_hashtag'");

	echo do_shortcode("[twitter-feed-addon-vc $data_source template='$twitter_template' follow_button='$follow_btn_status' username_link_status='$username_link_status' data_time_format='$date_time_format' total_feeds='$no_of_tweets' display_actions=$display_actions image_width='$image_width' image_status='$disable_image_status' customization='$customization' fetch_unavailable='$fetch_unavailable']");