<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
/**
 * Plugin Name: Twitter Feed addon for Visual Composer
 * Description: A WPBakery Page Builder addon for displaying twitter feeds on the go.
 * Version: 1.0.1
 * Author: AccessPress Themes
 * Author URI: http://accesspressthemes.com
 * Text Domain: twitter-feed-addon-vc
 * Domain Path: /languages/
 * 
 * /
  /**
 * Declartion of necessary constants for plugin
 * */
if ( !defined( 'TFA_VC_IMAGE_DIR' ) ) {
    define( 'TFA_VC_IMAGE_DIR', plugin_dir_url( __FILE__ ) . 'images' );
}
if ( !defined( 'TFA_VC_JS_DIR' ) ) {
    define( 'TFA_VC_JS_DIR', plugin_dir_url( __FILE__ ) . 'js' );
}
if ( !defined( 'TFA_VC_CSS_DIR' ) ) {
    define( 'TFA_VC_CSS_DIR', plugin_dir_url( __FILE__ ) . 'css' );
}
if ( !defined( 'TFA_VC_VERSION' ) ) {
    define( 'TFA_VC_VERSION', '1.0.1' );
}
if(!defined('TFA_VC_PATH')){
    define('TFA_VC_PATH',  plugin_dir_path(__FILE__));
}

if ( !defined( 'TFA_VC_DOMAIN' ) ) {
    define( 'TFA_VC_DOMAIN', 'twitter-feed-addon-vc' );
}
include_once('visual_composer_addon/composer_class.php');
include_once("twitteroauth/twitteroauth.php");
if ( !class_exists( 'TFA_VC_Class' ) ) {

    class TFA_VC_Class {

        var $tfa_vc_settings;

        /**
         * Initialization of plugin from constructor
         */
        function __construct() {
            $this->tfa_vc_settings = get_option( 'tfa_vc_settings' );
            add_action( 'init', array( $this, 'load_text_domain' ) ); //loads plugin text domain for internationalization
            add_action( 'admin_init', array( $this, 'session_init' ) ); //starts session in admin section
            add_action( 'admin_menu', array( $this, 'add_plugin_admin_menu' ) ); //adds the menu in admin section
            add_action( 'admin_enqueue_scripts', array( $this, 'register_admin_scripts' ) ); //registers scripts and css for admin section
            register_activation_hook( __FILE__, array( $this, 'load_default_settings' ) ); //loads default settings for the plugin while activating the plugin
            add_action( 'admin_post_tfa_vc_form_action', array( $this, 'tfa_vc_form_action' ) ); //action to save settings
            add_action( 'admin_post_tfa_restore_settings', array( $this, 'tfa_restore_settings' ) ); //action to restore default settings
            add_action( 'admin_post_tfa_delete_cache', array( $this, 'tfa_delete_cache' ) ); //action to delete cache
            add_shortcode( 'twitter-feed-addon-vc', array( $this, 'feed_shortcode' ) ); //registers shortcode to display the feeds
            add_shortcode( 'twitter-feed-addon-vc-slider', array( $this, 'feed_slider_shortcode' ) ); //registers shortcode to display the feeds as slider
            add_shortcode( 'twitter-feed-addon-vc-ticker', array( $this, 'feed_ticker_shortcode' ) ); //registers shortcode to display the feeds as ticker
            add_action( 'wp_enqueue_scripts', array( $this, 'register_front_assests' ) ); //registers assets for the frontend
        }

        /**
         * Loads Plugin Text Domain
         * 
         */
        function load_text_domain() {
            load_plugin_textdomain( TFA_VC_DOMAIN, false, basename( dirname( __FILE__ ) ) . '/languages' );
        }

        /**
         * Starts Session
         */
        function session_init() {
            if ( !session_id() ) {
                session_start();
            }
        }

        /**
         * Loads Default Settings
         */
        function load_default_settings() {
            $default_settings = $this->get_default_settings();
            if ( !get_option( 'tfa_vc_settings' ) ) {
                update_option( 'tfa_vc_settings', $default_settings );
            }
            $this->tfa_delete_cache();
        }

        /**
         * Adds plugin's menu in the admin section
         */
        function add_plugin_admin_menu() {
            add_menu_page( __( 'Twitter Feed addon', TFA_VC_DOMAIN ), __( 'Twitter Feed addon', TFA_VC_DOMAIN ), 'manage_options', 'twitter-feed-addon-vc', array( $this, 'main_setting_page' ), TFA_VC_IMAGE_DIR . '/icon.png' );
        }

        /**
         * Plugin's main setting page
         */
        function main_setting_page() {
            include('inc/backend/settings.php');
        }

        /**
         * Register all the scripts in admin section
         */
        function register_admin_scripts() {
            if ( isset( $_GET['page'] ) && $_GET['page'] == 'twitter-feed-addon-vc' ) {
                wp_enqueue_script( 'tfa-admin-script', TFA_VC_JS_DIR . '/backend.js', array( 'jquery' ), TFA_VC_VERSION );
                wp_enqueue_style( 'tfa-backend-css', TFA_VC_CSS_DIR . '/backend.css', array(), TFA_VC_VERSION );
                wp_enqueue_style( 'tfa-pro-fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', array(), TFA_VC_VERSION );
            }
        }

        /**
         * Return default settings array
         * @return array
         */
        function get_default_settings() {
            $default_settings = array( 'consumer_key' => '',
                'consumer_secret' => '',
                'access_token' => '',
                'access_token_secret' => '',
                'cache_period' => '',
                'total_feed' => '5',
                'fallback_message' => '',
                'exclude_lightbox' => 0,
                'exclude_slider' => 0
            );
            return $default_settings;
        }

        function get_api_connection($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
            $connection = new TwitterOAuth( $cons_key, $cons_secret, $oauth_token, $oauth_token_secret );
            return $connection;
        }

        /**
         * Prints array in pre format
         */
        function print_array($array) {
            echo "<pre>";
            print_r( $array );
            echo "</pre>";
        }

        /**
         * Saves settings in option table
         */
        function tfa_vc_form_action() {
            if ( !empty( $_POST ) && wp_verify_nonce( $_POST['tfa_nonce_field'], 'tfa_action_nonce' ) ) {
                include('inc/backend/save-settings.php');
            } else {
                die( 'No script kiddies please!' );
            }
        }

        /**
         * Restores Default Settings
         */
        function tfa_restore_settings() {
            if ( !empty( $_GET ) && wp_verify_nonce( $_GET['_wpnonce'], 'tfa-restore-nonce' ) ) {
                $tfa_vc_settings = $this->get_default_settings();
                update_option( 'tfa_vc_settings', $tfa_vc_settings );
                $_SESSION['tfa_msg'] = __( 'Restored Default Settings Successfully.', TFA_VC_DOMAIN );
                wp_redirect( admin_url() . 'admin.php?page=twitter-feed-addon-vc' );
            } else {
                die( 'No script kiddies please!' );
            }
        }

        /**
         * Registers shortcode to display feed
         */
        function feed_shortcode($atts) {
            ob_start();
            include('inc/frontend/shortcode.php');
            $html = ob_get_contents();
            ob_get_clean();
            return $html;
        }

        /**
         * Register shortcode for feeds slider
         */
        function feed_slider_shortcode($atts) {
            ob_start();
            include('inc/frontend/slider-shortcode.php');
            $html = ob_get_contents();
            ob_get_clean();
            return $html;
        }

        /**
         * 
         * @param varchar $date
         * @param string $format
         * @return type
         */
        function get_date_format($date, $format) {
            switch ( $format ) {
                case 'full_date':
                    $date = strtotime( $date );
                    $date = date( 'F j, Y, g:i a', $date );
                    break;
                case 'date_only':
                    $date = strtotime( $date );
                    $date = date( 'F j, Y', $date );
                    break;
                case 'elapsed_time':
                    $current_date = strtotime( date( 'h:i A M d Y' ) );
                    $tweet_date = strtotime( $date );
                    $total_seconds = $current_date - $tweet_date;

                    $seconds = $total_seconds % 60;
                    $total_minutes = $total_seconds / 60;
                    ;
                    $minutes = $total_minutes % 60;
                    $total_hours = $total_minutes / 60;
                    $hours = $total_hours % 24;
                    $total_days = $total_hours / 24;
                    $days = $total_days % 365;
                    $years = $total_days / 365;

                    if ( $years >= 1 ) {
                        if ( floor($years) == 1 ) {
                            $date = __( 'a year ago', TFA_VC_DOMAIN );
                        } else {
                            $date = floor($years) . __( ' years ago', TFA_VC_DOMAIN );
                        }
                    } elseif ( $days >= 1 ) {
                        if ( floor($days) == 1 ) {
                            $date = floor($days) . __( ' day ago', TFA_VC_DOMAIN );
                        } else {
                            $date = floor($days) . __( ' days ago', TFA_VC_DOMAIN );
                        }
                    } elseif ( $hours >= 1 ) {
                        if ( floor($hours) == 1 ) {
                            $date = floor($hours) . __( ' hour ago', TFA_VC_DOMAIN );
                        } else {
                            $date = floor($hours) . __( ' hours ago', TFA_VC_DOMAIN );
                        }
                    } elseif ( $minutes > 1 ) {
                        $date = floor($minutes) . __( ' minutes ago', TFA_VC_DOMAIN );
                    } else {
                        $date = __( "1 minute ago", TFA_VC_DOMAIN );
                    }
                    break;
                default:
                    break;
            }
            return $date;
        }

        /**
         * Registers Assets for frontend
         */
        function register_front_assests() {
            $tfa_vc_settings = $this->tfa_vc_settings;
            $js_dependencies = array( 'jquery', 'tfa-pro-easy-ticker' );
            /**
             * Frontend JS
             */
            wp_enqueue_script( 'tfa-pro-easing', TFA_VC_JS_DIR . '/jquery.easing.min.js', array( 'jquery' ), TFA_VC_VERSION );
            wp_enqueue_script( 'tfa-pro-easy-ticker', TFA_VC_JS_DIR . '/jquery.easy-ticker.min.js', array( 'jquery', 'tfa-pro-easing' ), TFA_VC_VERSION );
            if ( $tfa_vc_settings['exclude_slider'] != 1 ) {
                wp_enqueue_script( 'tfa-pro-bxslider-js', TFA_VC_JS_DIR . '/jquery.bxslider.min.js', array( 'jquery' ), TFA_VC_VERSION );
                $js_dependencies[] = 'tfa-pro-bxslider-js';
                wp_enqueue_style( 'tfa-pro-bxslider-css', TFA_VC_CSS_DIR . '/jquery.bxslider.css', array(), TFA_VC_VERSION );
            }
            if ( $tfa_vc_settings['exclude_slider'] != 1 ) {
                wp_enqueue_script( 'tfa-pro-lightbox-js', TFA_VC_JS_DIR . '/lightbox.js', array( 'jquery' ), TFA_VC_VERSION );
                $js_dependencies[] = 'tfa-pro-lightbox-js';
                wp_enqueue_style( 'tfa-pro-lightbox-css', TFA_VC_CSS_DIR . '/lightbox.css', array(), TFA_VC_VERSION );
            }
            wp_enqueue_script( 'tfa-pro-front-js', TFA_VC_JS_DIR . '/frontend.js', $js_dependencies, TFA_VC_VERSION );

            /**
             * Frontend styles
             */
            
            wp_enqueue_style( 'tfa-pro-front-css', TFA_VC_CSS_DIR . '/frontend.css', array(), TFA_VC_VERSION );
            wp_enqueue_style( 'tfa-pro-font-css', TFA_VC_CSS_DIR . '/fonts.css', array(), TFA_VC_VERSION );
            wp_enqueue_style( 'tfa-pro-fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css', array(), TFA_VC_VERSION );
            
        }

        /**
         * Register shortcode for the feed ticker mode
         */
        function feed_ticker_shortcode($atts) {
            ob_start();
            include('inc/frontend/ticker-shortcode.php');
            $html = ob_get_contents();
            ob_get_clean();
            return $html;
        }

        /**
         * Returns abreviated count format
         * @param integer $value
         * @return string
         */
        function abreviateTotalCount($value) {

            $abbreviations = array( 12 => 'T', 9 => 'B', 6 => 'M', 3 => 'K', 0 => '' );

            foreach ( $abbreviations as $exponent => $abbreviation ) {

                if ( $value >= pow( 10, $exponent ) ) {

                    return round( floatval( $value / pow( 10, $exponent ) ), 1 ) . $abbreviation;
                }
            }
        }

        /**
         * Deletes Feeds from cache
         */
        function tfa_delete_cache() {

            global $wpdb;
            $tbl_name = $wpdb->options;
            $results = $wpdb->get_results( "SELECT option_name FROM  `$tbl_name` WHERE `option_name` LIKE  '_transient_tfa%'" );
            if ( count( $results ) > 0 ) {
                foreach ( $results as $result ) {
                    $transient_name = str_replace( '_transient_', '', $result->option_name );
                    delete_transient( $transient_name );
                }
            }
            $_SESSION['tfa_msg'] = __( 'Cache Deleted Successfully.', TFA_VC_DOMAIN );
            wp_redirect( admin_url() . 'admin.php?page=twitter-feed-addon-vc' );
        }

        /**
         * New Functions
         * */
        function get_oauth_connection($cons_key, $cons_secret, $oauth_token, $oauth_token_secret) {
            $connection = new TwitterOAuth( $cons_key, $cons_secret, $oauth_token, $oauth_token_secret );
            return $connection;
        }

        function get_twitter_tweets($username, $tweets_number, $multiple = false) {
            $transient_variable = 'tfa_tweets_' . $username . '_' . $tweets_number;
            $tweets = get_transient( $transient_variable );
            $tfa_vc_settings = $this->tfa_vc_settings;
            if ( isset( $tfa_vc_settings['disable_cache'] )  && $tfa_vc_settings['disable_cache'] == 1) {

                $tweets = false;
            }
            if ( $multiple ) {
                $tweets = false;
            }
            if ( false === $tweets ) {
             

                $consumer_key = $tfa_vc_settings['consumer_key'];
                $consumer_secret = $tfa_vc_settings['consumer_secret'];
                $access_token = $tfa_vc_settings['access_token'];
                $access_token_secret = $tfa_vc_settings['access_token_secret'];
                $oauth_connection = $this->get_oauth_connection( $consumer_key, $consumer_secret, $access_token, $access_token_secret );
                $tweets = $oauth_connection->get( "https://api.twitter.com/1.1/statuses/user_timeline.json?tweet_mode=extended&screen_name=" . $username . "&count=" . $tweets_number );
                $cache_period = intval( ($tfa_vc_settings['cache_period'] == '')?1:$tfa_vc_settings['cache_period'] ) * 60;
                $cache_period = ($cache_period < 1) ? 3600 : $cache_period;
                if ( !isset( $tweets->errors ) ) {
                    if ( !$multiple ) {
                        $chck = set_transient( $transient_variable, $tweets, $cache_period );
                        
                    }
                }
            } 

            return $tweets;
        }

        function get_twitter_hastag_tweets($hashtag, $tweets_number) {
            $transient_hashtag = str_replace( '#', '', $hashtag );
            $transient_variable = 'tfa_tweets_' . $transient_hashtag . '_' . $tweets_number;
            $tweets = get_transient( $transient_variable );
            $tfa_vc_settings = $this->tfa_vc_settings;
            if ( isset( $tfa_vc_settings['disable_cache'] ) && $tfa_vc_settings['disable_cache'] == 1 ) {

                $tweets = false;
            }
            if ( false === $tweets ) {

                $consumer_key = $tfa_vc_settings['consumer_key'];
                $consumer_secret = $tfa_vc_settings['consumer_secret'];
                $access_token = $tfa_vc_settings['access_token'];
                $access_token_secret = $tfa_vc_settings['access_token_secret'];
                $oauth_connection = $this->get_oauth_connection( $consumer_key, $consumer_secret, $access_token, $access_token_secret );
                $query = array(
                    "q" => $hashtag,
                    "count" => $tweets_number,
                    "tweet_mode"=>'extended'
                );
                $tweets = $oauth_connection->get( 'search/tweets', $query );
                // $this->print_array( $tweets );
                $cache_period = intval( $tfa_vc_settings['cache_period'] ) * 60;
                $cache_period = ($cache_period < 1) ? 3600 : $cache_period;
                if ( !isset( $tweets->errors ) ) {
                    set_transient( $transient_variable, $tweets, $cache_period );
                }
            } 
            if ( isset( $tweets->statuses ) ) {
                return $tweets->statuses;
            } else {
                return array();
            }
        }

        function get_multiple_twitter_tweets($accounts, $tweets_number) {
            $tfa_vc_settings = $this->tfa_vc_settings;
            $transient_variable = 'tfa_tweets_' . md5( $accounts ) . '_' . $tweets_number;
            $multiple_tweets = get_transient( $transient_variable );
            if ( isset( $tfa_vc_settings['disable_cache'] ) && $tfa_vc_settings['disable_cache'] == 1 ) {

                $tweets = false;
            }
            if ( false === $multiple_tweets ) {
                $accounts_array = explode( ',', str_replace( ' ', '', trim( $accounts ) ) );
                $total_acccounts = count( $accounts_array );
                $each_tweet_number = $tweets_number / $total_acccounts;
                $multiple_tweets = array();
                $tweet_count = 0;
                if ( $tweets_number % $total_acccounts != 0 ) {
                    $each_tweet_number = intval( $each_tweet_number ) + 1;
                }
                foreach ( $accounts_array as $account ) {
                    $tweets = $this->get_twitter_tweets( $account, $each_tweet_number, true );
                    foreach ( $tweets as $tweet ) {
                        $tweet_count++;
                        if ( $tweet_count <= $tweets_number ) {
                            $multiple_tweets[] = $tweet;
                        }
                    }
                }
                $cache_period = intval( $tfa_vc_settings['cache_period'] ) * 60;
                $cache_period = ($cache_period < 1) ? 3600 : $cache_period;
                shuffle( $multiple_tweets );
                set_transient( $transient_variable, $multiple_tweets, $cache_period );
            }
            return $multiple_tweets;
        }

        function makeClickableLinks($s) {
            return preg_replace( '@(https?://([-\w\.]+)+(:\d+)?(/([\w/_\.-]*(\?\S+)?)?)?)@', '<a href="$1" target="_blank">$1</a>', $s );
        }

    }

    /**
     * Plugin Initialization
     */
    $tfa_obj = new TFA_VC_Class();
}

