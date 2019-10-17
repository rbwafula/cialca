<?php defined('ABSPATH') or die('No scripts for you') ?>
<div class="tfa-single-board-wrapper" id="tfa-settings-board">
    <h3 class="tfa-title"><?php _e( 'API Settings', TFA_VC_DOMAIN ); ?></h3>
    <div class="tfa-option-wrapper">
        <label>Twitter Consumer Key</label>
        <div class="tfa-option-field">
            <input type="text" name="consumer_key" value="<?php echo esc_attr( $tfa_vc_settings['consumer_key'] ); ?>"/>
            <div class="tfa-option-note"><?php _e( 'Please create an app on Twitter through this link:', TFA_VC_DOMAIN ); ?><a href="https://dev.twitter.com/apps" target="_blank">https://dev.twitter.com/apps</a><?php _e( ' and get this information.', TFA_VC_DOMAIN ); ?></div>
        </div>
    </div>
    <div class="tfa-option-wrapper">
        <label>Twitter Consumer Secret</label>
        <div class="tfa-option-field">
            <input type="text" name="consumer_secret" value="<?php echo esc_attr( $tfa_vc_settings['consumer_secret'] ); ?>"/>
            <div class="tfa-option-note"><?php _e( 'Please create an app on Twitter through this link:', TFA_VC_DOMAIN ); ?><a href="https://dev.twitter.com/apps" target="_blank">https://dev.twitter.com/apps</a><?php _e( ' and get this information.', TFA_VC_DOMAIN ); ?></div>
        </div>
    </div>
    <div class="tfa-option-wrapper">
        <label>Twitter Access Token</label>
        <div class="tfa-option-field">
            <input type="text" name="access_token" value="<?php echo esc_attr( $tfa_vc_settings['access_token'] ); ?>"/>
            <div class="tfa-option-note"><?php _e( 'Please create an app on Twitter through this link:', TFA_VC_DOMAIN ); ?><a href="https://dev.twitter.com/apps" target="_blank">https://dev.twitter.com/apps</a><?php _e( ' and get this information.', TFA_VC_DOMAIN ); ?></div>
        </div>
    </div>
    <div class="tfa-option-wrapper">
        <label>Twitter Access Token Secret</label>
        <div class="tfa-option-field">
            <input type="text" name="access_token_secret" value="<?php echo esc_attr( $tfa_vc_settings['access_token_secret'] ); ?>"/>
            <div class="tfa-option-note"><?php _e( 'Please create an app on Twitter through this link:', TFA_VC_DOMAIN ); ?><a href="https://dev.twitter.com/apps" target="_blank">https://dev.twitter.com/apps</a><?php _e( ' and get this information.', TFA_VC_DOMAIN ); ?></div>
        </div>
    </div>
    <h3 class="tfa-title"><?php _e( 'Cache Settings', TFA_VC_DOMAIN ); ?></h3>
    <div class="tfa-option-wrapper">
        <label>Cache Period</label>
        <div class="tfa-option-field">
            <input type="text" name="cache_period" value="<?php echo esc_attr( $tfa_vc_settings['cache_period'] ); ?>" placeholder="e.g: 60"/>
            <div class="tfa-option-note"><?php _e( 'Please enter the time period in minutes in which the feeds should be fetched.Default is 60 Minutes', TFA_VC_DOMAIN ); ?></div>
        </div>
    </div>
    <div class="tfa-option-wrapper">
        <label><?php _e( 'Disable Cache', TFA_VC_DOMAIN ); ?></label>
        <div class="tfa-option-field">
            <input type="checkbox" id="disable_cache" name="disable_cache" value="1" <?php
            if ( isset( $tfa_vc_settings['disable_cache'] ) ) {
                checked( $tfa_vc_settings['disable_cache'], true );
            }
            ?>/>
            <label for="disable_cache"></label>
            <div class="tfa-option-note"><?php _e( 'Check if you want to disable storing of fetched tweets in the cache and fetch new tweets from twitter everytime.', TFA_VC_DOMAIN ); ?></div>
        </div>
    </div>
    <h3 class="tfa-title"><?php _e('Extra Settings',TFA_VC_DOMAIN) ?></h3>
    <div class="tfa-option-wrapper">
        <label><?php _e( 'Exclude Lightbox JS and CSS', TFA_VC_DOMAIN ); ?></label>
        <div class="tfa-option-field">
            <input type="checkbox" name="exclude_lightbox" id="exclude_lightbox" value="1" <?php checked( $tfa_vc_settings['exclude_lightbox'], true ); ?>/>
            <label for="exclude_lightbox"></label>
            <div class="tfa-option-note"><?php _e( 'Check only if you already have lightbox integrated in your theme and for preventing any conflicts regarding the lighbox with your theme.', TFA_VC_DOMAIN ); ?></div>
        </div>
    </div>
    <div class="tfa-option-wrapper">
        <label><?php _e( 'Exclude BX Slider JS and CSS', TFA_VC_DOMAIN ); ?></label>
        <div class="tfa-option-field">
            <input type="checkbox" name="exclude_slider" id="exclude_slider" value="1" <?php checked( $tfa_vc_settings['exclude_slider'], true ); ?>/>
            <label for="exclude_slider"></label>
            <div class="tfa-option-note"><?php _e( 'Check only if you already have bxslider integrated in your theme and for preventing any conflicts regarding the slider with your theme.', TFA_VC_DOMAIN ); ?></div>
        </div>
    </div>


</div>