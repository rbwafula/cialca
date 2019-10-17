<?php defined('ABSPATH') or die('No scripts for you'); ?>
<style type="text/css">

	<?php if (!empty($background_color)): ?>
		.<?=$customization_class ?> .tfa-single-tweet-wrapper{
			background-color: <?=$background_color ?>
		}
	<?php endif ?>

	<?php if (!empty($text_color)): ?>
		.<?=$customization_class ?> .tfa-tweet-content{
			color: <?=$text_color; ?>
		}
	<?php endif ?>

	<?php if (!empty($link_color)): ?>
		.<?=$customization_class ?> .tfa-tweet-content a{
			color: <?=$link_color; ?> !important
		}
	<?php endif ?>

	<?php if (!empty($date_time_color)): ?>
		.<?=$customization_class ?> .tfa-tweet-content .tfa-timestamp a{
			color: <?=$date_time_color ?> !important
		}
	<?php endif ?>

	<?php if (!empty($username_color)): ?>
		.<?=$customization_class ?> .tfa-tweet-content>a:first-child{
			color: <?=$username_color ?> !important	
		}
	<?php endif ?>
	
	<?php if (!empty($twitter_action_color)): ?>
		.<?=$customization_class ?> .tfa-tweet-actions a{
			color: <?=$twitter_action_color ?> !important
		}
	<?php endif ?>

</style>