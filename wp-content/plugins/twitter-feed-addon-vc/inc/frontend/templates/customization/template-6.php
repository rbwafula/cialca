<?php defined('ABSPATH') or die('No scripts for you'); ?>
<style type="text/css">
	
	<?php if (!empty($background_color)): ?>
		.<?=$customization_class ?> .tfa-single-tweet-wrapper:before{
			background-color: <?=$background_color ?>
		}
	<?php endif ?>

	<?php if (!empty($text_color)): ?>
		.<?=$customization_class ?> .tfa-tweet-content {
			color: <?=$text_color; ?>
		}
	<?php endif ?>

	<?php if (!empty($link_color)): ?>
		.<?=$customization_class ?> .tfa-tweet-content a{
			color: <?=$link_color; ?> !important
		}
	<?php endif ?>

	<?php if (!empty($date_time_color)): ?>
		.<?=$customization_class ?> .tfa-tweet-content .tfa-user-info .tfa-timestamp a{
			color: <?=$date_time_color ?> !important
		}
	<?php endif ?>

	<?php if (!empty($username_color)): ?>
		.<?=$customization_class ?> .tfa-tweet-content .tfa-user-info .tfa-screenName{
			color: <?=$username_color ?>	
		}
	<?php endif ?>

	<?php if (!empty($username_link_color)): ?>
		.<?=$customization_class ?> .tfa-tweet-content .tfa-user-info a{
			color: <?=$username_link_color ?> !important
		}
	<?php endif ?>
	
	<?php if (!empty($twitter_action_color)): ?>
		.<?=$customization_class ?> .tfa-tweet-actions a{
			color: <?=$twitter_action_color ?> !important
		}
	<?php endif ?>

	<?php if (!empty($twitter_icon_color)): ?>
		.<?=$customization_class ?> .tfa-user-info i.fa-twitter{
			color: <?=$twitter_icon_color ?>
		}
	<?php endif ?>

</style>