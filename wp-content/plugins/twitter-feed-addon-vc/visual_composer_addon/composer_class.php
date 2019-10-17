<?php
// don't load directly
if (!defined('ABSPATH')) die('-1');

class VCExtendTwitterFeedsAddonClass {
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'integrateWithVC' ) );

        // Use this when creating a shortcode addon
        add_shortcode( 'twitter_feed_addon', array( $this, 'renderMyTwitterAddon' ) );
        add_shortcode( 'twitter_feed_simple_addon', array( $this, 'renderMyTwitterSimpleAddon' ) );
        add_shortcode( 'twitter_feed_slider_addon', array( $this, 'renderMyTwitterSliderAddon' ) );
        add_shortcode( 'twitter_feed_ticker_addon', array( $this, 'renderMyTwitterTickerAddon' ) );

        // Register CSS and JS
        add_action('admin_enqueue_scripts',array($this,'loadBackendEditorCssAndJs'));
        add_action( 'wp_enqueue_scripts', array( $this, 'loadFrontendEditorCssAndJs' ) );
    }
 
    public function integrateWithVC() {
        // Check if WPBakery Page Builder is installed
        if ( ! defined( 'WPB_VC_VERSION' ) ) {
            // Display notice that Extend WPBakery Page Builder is required
            add_action('admin_notices', array( $this, 'showVcVersionNotice' ));
            return;
        }

        $simple_template_array = array();
        $dynamic_template_array = array();
        for ( $i = 1; $i <= 12; $i++ ) {
          $simple_template_array['Template ' . intval($i)] = esc_attr('template-' . intval($i));
        }
        for ( $i = 1; $i <= 10; $i++ ) {
          $dynamic_template_array['Template ' . intval($i)] = esc_attr('template-' . intval($i));
        }

        if(defined('WPB_VC_VERSION') && version_compare(WPB_VC_VERSION, 4.8) >= 0) {
          if(function_exists('vc_add_shortcode_param'))
          {
            vc_add_shortcode_param( 'numberField', array(&$this,'number_field_generator') );
          }
        }
        else {
          if(function_exists('add_shortcode_param'))
          {
            add_shortcode_param('numberField' , array(&$this, 'number_field_generator' ));
          }
        }
 
        /*
        Add your WPBakery Page Builder logic here.
        Lets call vc_map function to "register" our custom shortcode within WPBakery Page Builder interface.

        More info: http://kb.wpbakery.com/index.php?title=Vc_map
        */
        
        include TFA_VC_PATH . 'visual_composer_addon/component_settings/container_component_setting.php';
        include TFA_VC_PATH . 'visual_composer_addon/component_settings/simple_component_setting.php';
        include TFA_VC_PATH . 'visual_composer_addon/component_settings/slider_component_setting.php';
        include TFA_VC_PATH . 'visual_composer_addon/component_settings/ticker_component_setting.php';
    }

    /*
    Shortcode logic how it should be rendered
    */

    public function renderMyTwitterAddon( $atts , $content = null )
    {
      ob_start();
      include(TFA_VC_PATH . 'visual_composer_addon/shortcodes/shortcodes.php');
      $html = ob_get_contents();
      ob_get_clean();
      return $html;
    }


    public function renderMyTwitterSimpleAddon( $atts, $content = null )
    {
      ob_start();
      include(TFA_VC_PATH . 'visual_composer_addon/shortcodes/simple_shortcode.php');
      $html = ob_get_contents();
      ob_get_clean();
      return $html;
    }

    public function renderMyTwitterSliderAddon($atts,$content = null)
    {
      ob_start();
      include(TFA_VC_PATH . 'visual_composer_addon/shortcodes/slider_shortcode.php');
      $html = ob_get_contents();
      ob_get_clean();
      return $html;
    }

    public function renderMyTwitterTickerAddon($atts,$content = null)
    {
      ob_start();
      include(TFA_VC_PATH . 'visual_composer_addon/shortcodes/ticker_shortcode.php');
      $html = ob_get_contents();
      ob_get_clean();
      return $html;
    }

    public function loadBackendEditorCssAndJs()
    {
      wp_enqueue_script( 'tfa-admin-extended-script', TFA_VC_JS_DIR . '/extended-backend-addon-js.js', array( 'jquery' ), TFA_VC_VERSION );
      wp_enqueue_style( 'tfa-backend-extended-css', TFA_VC_CSS_DIR . '/extended-backend-addon-css.css', array(), TFA_VC_VERSION );
    }

    /*
    Load plugin css and javascript files which you may need on front end of your site
    */
    public function loadFrontendEditorCssAndJs() {
      
      wp_enqueue_style( 'tfa-frontend-extended-css', TFA_VC_CSS_DIR . '/extended-frontend-addon-css.css', array(), TFA_VC_VERSION );
    }

    /*
    Show notice if your plugin is activated but Visual Composer is not
    */
    public function showVcVersionNotice() {
        $plugin_data = get_plugin_data(__FILE__);
        echo '
        <div class="updated">
          <p>'.sprintf(__('<strong>%s</strong> requires <strong><a href="http://bit.ly/vcomposer" target="_blank">Visual Composer</a></strong> plugin to be installed and activated on your site.', TFA_VC_DOMAIN), $plugin_data['Name']).'</p>
        </div>';
    }

    public function print_array($array_var){
      if (is_array($array_var)) {
        echo "<pre>";
        print_r($array_var);
        echo "</pre>";
      }
      elseif (is_object($array_var)) {
        echo "<pre>";
        print_r($array_var);
        echo "</pre>";
      }
      else{
        echo "Parameter Error: Not an array" . self::new_line();
        var_dump($array_var);
      }
    }
    public function number_field_generator( $settings, $value ) {
      $dependency = '';
       return '<div class="numberField">'
                 .'<input name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-numberinput ' .
                 esc_attr( $settings['param_name'] ) . ' ' .
                 esc_attr( $settings['type'] ) . '_field" type="number" value="' . esc_attr( $value ) . '" min=0 />' .
                 '</div>'; // This is html markup that will be outputted in content elements edit form
    }
}
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
  class WPBakeryShortCode_Twitter_Feed_Addon extends WPBakeryShortCodesContainer {
  }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
  class WPBakeryShortCode_Twitter_Feed_Simple_Addon extends WPBakeryShortCode {
  }
  class WPBakeryShortCode_Twitter_Feed_Slider_Addon extends WPBakeryShortCode {
  }
  class WPBakeryShortCode_Twitter_Feed_Ticker_Addon extends WPBakeryShortCode {
  }
}
// Finally initialize code
new VCExtendTwitterFeedsAddonClass();