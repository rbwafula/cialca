<?php defined('ABSPATH') or die('No scripts for you'); ?>
<style type="text/css">

	<?php if (!empty($background_color)): ?>
		.<?=$customization_class ?>{
			background-color: <?=$background_color ?>
		}
	<?php endif ?>

	<?php if (!empty($text_color)): ?>
		.<?=$customization_class ?> .tfa-tweet-content .tfa-tweet-box{
			color: <?=$text_color; ?> !important
		}
	<?php endif ?>

	<?php if (!empty($link_color)): ?>
		.<?=$customization_class ?> .tfa-tweet-content .tfa-tweet-box>a{
			color: <?=$link_color; ?> !important
		}
	<?php endif ?>

	<?php if (!empty($date_time_color)): ?>
		.<?=$customization_class ?> .tfa-tweet-date .tfa-timestamp a{
			color: <?=$date_time_color ?>	
		}
	<?php endif ?>

	<?php if (!empty($username_color)): ?>
		.<?=$customization_class ?> .tfa-tweet-box-header .tfa-tweet-screenName{
			color: <?=$username_color ?>	
		}
	<?php endif ?>

	<?php if (!empty($username_link_color)): ?>
		.<?=$customization_class ?> .tfa-tweet-box-header .tfa-tweet-name{
			color: <?=$username_link_color ?> !important
		}
	<?php endif ?>
	
	<?php if (!empty($twitter_action_color)): ?>
		.<?=$customization_class ?> .tfa-tweet-content .tfa-tweet-actions a{
			color: <?=$twitter_action_color ?> !important
		}
	<?php endif ?>

</style>