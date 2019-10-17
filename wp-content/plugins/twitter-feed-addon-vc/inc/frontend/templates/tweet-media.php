<?php
$disable_media = (isset( $atts['image_status'] )) ? $atts['image_status'] : 0;
$disable_media = ($disable_media == 1) ? true : false;
if ( !$disable_media ) {
    if ( isset( $tweet->extended_entities ) ) {
        ?>
        <div class="tfa-tweet-media">
            <?php
            if ( count( $tweet->extended_entities->media ) > 1 ) {
                $image_size = 'thumb';
            } else {
                $image_size = 'large';
            }

            //$this->print_array($tweet['extended_entities']);
            foreach ( $tweet->extended_entities->media as $media ) {
                ?>
                <div class="tfa-each-media tfa-media-<?php echo $image_size; ?>" <?php
                if ( isset( $atts['image_width'] )  && $atts['image_width']!='') {
                    ?>
                     style="width:<?php echo esc_attr($atts['image_width']);?>"
                        <?php 
                }
                ?>>
                    <a href="<?php echo str_replace('http://','https://',$media->media_url); ?>" data-lightbox="<?php echo $username; ?>"><img src="<?php echo str_replace('http://','https://',$media->media_url) . ':' . $image_size; ?>" style="max-width: 100%;"/></a>
                </div>
                <?php
                //                $this->print_array($media);
            }
            ?>
        </div>
        <?php
    }else if(isset($tweet->retweeted_status->extended_entities)){
        ?> 
        <div class="tfa-tweet-media">
            <?php
            if ( (isset($tweet->extended_entities->media) && (is_array($tweet->extended_entities->media) || is_object($tweet->extended_entities->media))) && (count( $tweet->extended_entities->media ) > 1) ) {
                $image_size = 'thumb';
            } else {
                $image_size = 'large';
            }

            //$this->print_array($tweet['extended_entities']);
            foreach ( $tweet->retweeted_status->extended_entities->media as $media ) {
                ?>
                <div class="tfa-each-media tfa-media-<?php echo $image_size; ?>" <?php
                if ( isset( $atts['image_width'] )  && $atts['image_width']!='') {
                    ?>
                     style="width:<?php echo esc_attr($atts['image_width']);?>"
                        <?php 
                }
                ?>>
                    <a href="<?php echo str_replace('http://','https://',$media->media_url); ?>" data-lightbox="<?php echo $username; ?>"><img src="<?php echo str_replace('http://','https://',$media->media_url) . ':' . $image_size; ?>" style="max-width: 100%;"/></a>
                </div>
                <?php
                //                $this->print_array($media);
            }
            ?>
        </div>
        <?php 
    }
}
?>