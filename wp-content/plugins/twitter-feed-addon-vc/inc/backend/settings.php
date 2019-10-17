<?php
$tfa_vc_settings = $this->tfa_vc_settings;
//$this->print_array($tfa_vc_settings);
?>
<div class="wrap">
    <div class="tfa-panel">
        <?php include('header.php'); ?>
        <div class="tfa-nav">
            <ul>
                <li><a href="javascript:void(0)" id="tfa-settings-trigger" class="tfa-tabs-trigger tfa-active-trigger"><?php _e( 'Settings', TFA_VC_VERSION ); ?></a></li>
                <li><a href="javascript:void(0)" id="tfa-how_to_use-trigger" class="tfa-tabs-trigger"><?php _e( 'How To Use', TFA_VC_VERSION ); ?></a></li>
                <li><a href="javascript:void(0)" id="tfa-about-trigger" class="tfa-tabs-trigger"><?php _e( 'About', TFA_VC_VERSION ); ?></a></li>
                <li><a href="javascript:void(0)" id="tfa-morewp-trigger" class="tfa-tabs-trigger"><?php _e( 'More WordPress Resources', TFA_VC_VERSION ); ?></a></li>
            </ul>
        </div>
        <div class="tfa-board-wrapper">
            <?php if ( isset( $_SESSION['tfa_msg'] ) ) { ?>
                <div class="notice notice-success is-dismissible">
                    <p>
                        <?php
                        echo $_SESSION['tfa_msg'];
                        unset( $_SESSION['tfa_msg'] );
                        ?>
                    </p>
                </div>
            <?php }
            ?>
            <form method="post" action="<?php echo admin_url() . 'admin-post.php'; ?>">
                <input type="hidden" name="action" value="tfa_vc_form_action"/>
                <?php
                /**
                 * Settings Panel
                 */
                include('boards/main-settings.php');

                /**
                 * How To use Panel
                 */
                include('boards/how-to-use.php');

                /**
                 * About Panel
                 */
                include('boards/about.php');
                
                /**
                 * More WordPress Resources Panel
                 */
                include('boards/more-wp.php');
                ?>
                <?php
                wp_nonce_field( 'tfa_action_nonce', 'tfa_nonce_field' );
                $restore_nonce = wp_create_nonce( 'tfa-restore-nonce' );
                ?>
                <input type="submit" name="tfa_vc_settings_submit" value="<?php _e( 'Save Settings', TFA_VC_DOMAIN ); ?>" class="button button-primary"/>
                <a href="<?php echo admin_url() . 'admin-post.php?action=tfa_restore_settings&_wpnonce=' . $restore_nonce; ?>" onclick="return confirm('<?php _e( 'Are you sure you want to restore default settings?', TFA_VC_DOMAIN ) ?>');"><input type="button" value="<?php _e( 'Restore Default Settings', TFA_VC_DOMAIN ); ?>" class="button button-primary"/></a>
                <a href="<?php echo admin_url() . 'admin-post.php?action=tfa_delete_cache'; ?>" onclick="return confirm('<?php _e( 'Are you sure you want to delete cache?', TFA_VC_DOMAIN ) ?>');"><input type="button" value="<?php _e( 'Delete Cache', TFA_VC_DOMAIN ); ?>" class="button button-primary"/></a>
            </form>
        </div>
    </div>

</div>

