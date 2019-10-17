<?php
if (is_array($tweets)) {


    foreach ($tweets as $tweet) {
       // $this->print_array($tweet);
        ?>

        <div class="tfa-single-tweet-wrapper">
            <div class="tfa-tweet-content">

                <div class="tfa-tweet-box">
                    <?php
                    if ( $tweet->full_text ) {
                       $the_tweet = $tweet->full_text;
                        $the_tweet = $this->makeClickableLinks($the_tweet);
                        // i. User_mentions must link to the mentioned user's profile.
                        if (is_array($tweet->entities->user_mentions)) {
                            foreach ($tweet->entities->user_mentions as $key => $user_mention) {
                                $the_tweet = preg_replace(
                                        '/@' . $user_mention->screen_name . '/i', '<a href="http://www.twitter.com/' . $user_mention->screen_name . '" target="_blank">@' . $user_mention->screen_name . '</a>', $the_tweet);
                            }
                        }

                        // ii. Hashtags must link to a twitter.com search with the hashtag as the query.
                        if (is_array($tweet->entities->hashtags)) {
                            foreach ($tweet->entities->hashtags as $hashtag) {
                                $the_tweet = str_replace(' #' . $hashtag->text . ' ', ' <a href="https://twitter.com/search?q=%23' . $hashtag->text . '&src=hash" target="_blank">#' . $hashtag->text . '</a> ', $the_tweet);
                            }
                        }
                        
                        /**
                         * Not required from version 1.1.0
                         * since @1.1.0
                         */
                        /*
                        // iii. Links in Tweet text must be displayed using the display_url
                        //      field in the URL entities API response, and link to the original t.co url field.
                        if (is_array($tweet->entities->urls)) {
                            foreach ($tweet->entities->urls as $key => $link) {
                                $the_tweet = preg_replace(
                                        '`' . $link->url . '`', '<a href="' . $link->url . '" target="_blank">' . $link->url . '</a>', $the_tweet);
                            }
                        }
                         * 
                         */

                        echo '<div class="tfa-body-content">' . $the_tweet . '</div>';
                        ?>
                    </div><!--tweet content-->
                    <!--Tweet Media -->
                    <?php include(plugin_dir_path(__FILE__) . '../tweet-media.php'); ?>
                    <!--Tweet Media-->
                    <?php if (isset($tfa_vc_settings['display_twitter_actions']) && $tfa_vc_settings['display_twitter_actions'] == 1) { ?>
                        <!--Tweet Action -->
                        <?php include(plugin_dir_path(__FILE__) . '../tweet-actions.php'); ?>
                        <!--Tweet Action -->
                    <?php } ?>
                </div>
                <div class="tfa-tweet-box-footer tfa-header-content">
                    <div class="tfa-subheader-content">
                        <img src="<?php echo str_replace('http://','https://',$tweet->user->profile_image_url); ?>" height="50px" width="50px"/>
                        <span class="tfa-tweet-screenName"><?php echo $tweet->user->name; ?></span>
                        <?php
                        if ($username_link_status == true) {
                            ?>
                            <a href="http://twitter.com/<?php echo $tweet->user->screen_name; ?>" class="tfa-tweet-name" target="_blank">
                                @<?php echo $tweet->user->screen_name; ?>
                            </a> <?php }
                            ?>
                    </div>
                    <span class="tfa-timestamp">
                        <a href="https://twitter.com/<?php echo $username; ?>/status/<?php echo $tweet->id_str; ?>" target="_blank">
                            <?php echo $this->get_date_format($tweet->created_at, $date_time_format); ?>
                        </a>
                    </span>
                </div>
                <?php
            } else {
                ?>

                <p>
                    <a href="http://twitter.com/'<?php echo $username; ?> " target="_blank"><?php _e('Click here to read ' . $username . '\'S Twitter feed', TFA_VC_DOMAIN); ?></a>
                </p>
                <?php
            }
            ?>

        </div><!-- single_tweet_wrap-->


        <?php
    }
}
?>
