<?php
defined('ABSPATH') or die('No scripts for you');
//$this->print_array($_POST);die();
/**
 * [action] => tfa_vc_form_action
  [consumer_key] => Roo0zrWHjCUrB13fNvsLmBOZN
  [consumer_secret] => 8aU1sfjKaDRK7rmZJ3JXC5cC0zNcunV4CmVYDl8NiuaXtt0NRq
  [access_token] => 256050616-psaikzDyzWQ1tFDNRQzIDpBLSnxNiPB7ieYUKaUG
  [access_token_secret] => 2Rjcetsnc0dYbd8TZlEoUo6Sn51bT1Qa2c9ia8JQUn5g4
  [twitter_username] => @apthemes
  [cache_period] => 60
  [total_feed] => 5
  [feed_template] => template-
  [tfa_nonce_field] => 6f8a90d5c4
  [_wp_http_referer] => /accesspress-twitter-feed/wp-admin/admin.php?page=twitter-feed-addon-vc
  [tfa_vc_settings_submit] => Save Settings
 */
foreach ( $_POST as $key => $val ) {
    $$key = sanitize_text_field( $val );
}

$tfa_vc_settings = array( 'consumer_key' => $consumer_key,
    'consumer_secret' => $consumer_secret,
    'access_token' => $access_token,
    'access_token_secret' => $access_token_secret,
    'cache_period' => $cache_period,
    'exclude_lightbox' => isset( $exclude_lightbox ) ? 1 : 0,
    'exclude_slider' => isset( $exclude_slider ) ? 1 : 0,
    'disable_cache' => isset( $disable_cache ) ? 1 : 0
);
update_option( 'tfa_vc_settings', $tfa_vc_settings );
$_SESSION['tfa_msg'] = __( 'Settings Saved Successfully', TFA_VC_DOMAIN );
wp_redirect( admin_url() . 'admin.php?page=twitter-feed-addon-vc' );

