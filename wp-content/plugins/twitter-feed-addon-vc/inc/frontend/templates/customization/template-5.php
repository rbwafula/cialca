<?php defined('ABSPATH') or die('No scripts for you'); ?>
<style type="text/css">

	<?php if (!empty($background_color)): ?>
		.<?=$customization_class ?> .tfa-single-tweet-wrapper .tfa-tweet-content{
			background-color: <?=$background_color ?>
		}
		.<?=$customization_class ?> .tfa-single-tweet-wrapper .tfa-tweet-content:after{
			border-top-color: <?=$background_color ?>
		}
	<?php endif ?>

	<?php if (!empty($text_color)): ?>
		.<?=$customization_class ?> .tfa-tweet-content .tfa-tweet-box{
			color: <?=$text_color; ?>
		}
	<?php endif ?>

	<?php if (!empty($link_color)): ?>
		.<?=$customization_class ?> .tfa-tweet-content .tfa-tweet-box>a{
			color: <?=$link_color; ?> !important
		}
	<?php endif ?>

	<?php if (!empty($date_time_color)): ?>
		.<?=$customization_class ?> .tfa-tweet-box-footer .tfa-timestamp a{
			color: <?=$date_time_color ?>	
		}
	<?php endif ?>

	<?php if (!empty($username_color)): ?>
		.<?=$customization_class ?> .tfa-tweet-screenName{
			color: <?=$username_color ?>	
		}
	<?php endif ?>

	<?php if (!empty($username_link_color)): ?>
		.<?=$customization_class ?> .tfa-tweet-name{
			color: <?=$username_link_color ?>	
		}
	<?php endif ?>
	
	<?php if (!empty($twitter_action_color)): ?>
		.<?=$customization_class ?> .tfa-tweet-content .tfa-tweet-actions a{
			color: <?=$twitter_action_color ?> !important
		}
	<?php endif ?>

	<?php if (!empty($twitter_action_bg_color)): ?>
		.<?=$customization_class ?> .tfa-tweet-content .tfa-tweet-actions{
			background-color: <?=$twitter_action_bg_color ?>
		}
	<?php endif ?>

	<?php if (!empty($twitter_icon_color)): ?>
		.<?=$customization_class ?> .tfa-tweet-screenName i.fa-twitter{
			color: <?=$twitter_icon_color ?> !important
		}
	<?php endif ?>

</style>