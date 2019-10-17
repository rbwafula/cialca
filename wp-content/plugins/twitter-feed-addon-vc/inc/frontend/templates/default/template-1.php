<?php
if ( is_array( $tweets ) ) {

// to use with intents
    //echo '<script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>';

    foreach ( $tweets as $tweet ) {
        //$this->print_array($tweet);
        ?>

        <div class="tfa-single-tweet-wrapper">
            <div class="tfa-tweet-content tfa-body-content">

                <div class="tfa-tweet-box">
                    <?php
                    if ( $tweet->full_text ) {
                       $the_tweet = $tweet->full_text;
                        $the_tweet = $this->makeClickableLinks( $the_tweet );

                        // i. User_mentions must link to the mentioned user's profile.
                        if ( is_array( $tweet->entities->user_mentions ) ) {
                            foreach ( $tweet->entities->user_mentions as $key => $user_mention ) {
                                $the_tweet = preg_replace(
                                        '/@' . $user_mention->screen_name . '/i', '<a href="http://www.twitter.com/' . $user_mention->screen_name . '" target="_blank">@' . $user_mention->screen_name . '</a>', $the_tweet );
                            }
                        }

                        // ii. Hashtags must link to a twitter.com search with the hashtag as the query.
                        if ( is_array( $tweet->entities->hashtags ) ) {
                            foreach ( $tweet->entities->hashtags as $hashtag ) {
                                $the_tweet = str_replace( ' #' . $hashtag->text . ' ', ' <a href="https://twitter.com/search?q=%23' . $hashtag->text . '&src=hash" target="_blank">#' . $hashtag->text . '</a> ', $the_tweet );
                            }
                        }

                       

                        echo $the_tweet . ' ';
                        ?>
                    </div><!--tweet content-->
                    <!--Tweet Media -->
                    <?php include(plugin_dir_path( __FILE__ ) . '../tweet-media.php'); ?>
                    <!--Tweet Media-->

                    <?php if ( isset( $tfa_vc_settings['display_twitter_actions'] ) && $tfa_vc_settings['display_twitter_actions'] == 1 ) { ?>
                        <!--Tweet Action -->
                        <?php include(plugin_dir_path( __FILE__ ) . '../tweet-actions.php'); ?>
                        <!--Tweet Action -->
                    <?php } ?>
                </div>
                <?php if ( $username_link_status == true ) { ?><a href="http://twitter.com/<?php echo $tweet->user->screen_name; ?>/" class="tfa-tweet-name" target="_blank"><img src="<?php echo str_replace('http://','https://',$tweet->user->profile_image_url); ?>" height="50px" width="50px"/>&nbsp;&nbsp;@<?php echo $tweet->user->name; ?></a> <?php } ?>
                <div class="tfa-tweet-date tfa-header-content">
                        <p class="tfa-timestamp">
                            <a href="https://twitter.com/<?php echo $tweet->user->screen_name; ?>/status/<?php echo $tweet->id_str; ?>" target="_blank"> -
                                <?php echo $this->get_date_format( $tweet->created_at, $date_time_format ); ?>
                            </a>
                        </p>

                        <?php
                    } else {
                        ?>

                        <p><a href="http://twitter.com/'<?php echo $username; ?> " target="_blank"><?php _e( 'Click here to read ' . $username . '\'S Twitter feed', TFA_VC_DOMAIN ); ?></a></p>
                        <?php
                    }
                    ?>
                </div><!--tweet_date-->
        </div><!-- single_tweet_wrap-->


        <?php
    }
}
?>

