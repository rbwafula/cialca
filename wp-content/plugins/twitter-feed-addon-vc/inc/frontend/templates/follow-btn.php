<div class="tfa-center-align">
    <div class="tfa-follow-btn" <?php echo !empty($follow_btn_bg_color)?("style=' background-image: linear-gradient(#fff," . $follow_btn_bg_color . " 0%)'"):'' ?>>
    	<?php if (isset( $atts['hashtag'] ) && $atts['hashtag'] != ''):
    		$prefix = 'Find more #';
    		?>
    		<a href="<?php echo "https://twitter.com/hashtag/" . $follow_username ?>" target="_blank">
    	<?php else :
    		$prefix = 'Follow ';
    		?>
    	<a href="<?php echo "https://twitter.com/".$follow_username;?>" target="_blank">
    	<?php endif ?>
    		<i class="fa fa-twitter" <?php echo !empty($twitter_icon_color)?("style='color: " . esc_attr($twitter_icon_color) . " !important'"):'' ?>></i>
    		<span id="l" class="tfa-label" <?php echo !empty($follow_btn_txt_color)?("style=' color: " . $follow_btn_txt_color . "'"):'' ?>><?php echo $prefix; ?><b><?php echo $follow_username;?></b>
    		</span>
    	</a>
    </div>
</div>
