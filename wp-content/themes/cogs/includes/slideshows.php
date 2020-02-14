<div class="slideshow-bg"></div>

<?php
    if( have_rows('project_media') ):
        while ( have_rows('project_media') ) : the_row();
            while ( have_rows('media') ) : the_row();
                $data_slideshow = get_sub_field('media_id');

                if(get_sub_field('media_type') == 'slideshow') {
?>
<div id="s-<?php echo $data_slideshow; ?>" class="slideshow-container-outer" data-type="images">
    <div class="slideshow-container">
        <div class="slideshow-container-inner">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php
                        $slide = 0;
                        while(the_repeater_field('slideshow')):
                            // $parsed = parse_url( wp_get_attachment_url( get_sub_field('image'), 'large' ) );
                            // $image    = $_SERVER['DOCUMENT_ROOT'] . dirname( $parsed [ 'path' ] ) . '/' . rawurlencode( basename( $parsed[ 'path' ] ) );

                            $image = wp_get_attachment_image_src(get_sub_field('image'), 'large')[0];
                            $image_alt = get_post_meta(get_sub_field('image'), '_wp_attachment_image_alt', true);
                            $image_orientation = imageOrientation($image);

                            if($image_orientation != "landscape") {
                              $image = wp_get_attachment_image_src(get_sub_field('image'), 'medium')[0];
                            }

                            if ($detect_device->isMobile() || $detect_device->isTablet()):
                              // medium_large is a default size not overriden and smaller than the thumbnail size
                              $image = wp_get_attachment_image_src(get_sub_field('image'), 'medium_large')[0];
                            endif;

                    ?>

                    <div class="swiper-slide">

                        <div class="slide-content <?php echo $image_orientation; ?> ">
                          <?php
                            $slide_title = get_sub_field('headline');
                            $slide_description = get_sub_field('description');
                          ?>
                          <?php if($slide_title) { ?>
                          <div class="slide-info">
                              <span class="slide-info-title"><?php echo $slide_title; ?></span>
                              <div class="slide-info-text">
                                  <p><?php echo $slide_description; ?></p>
                              </div>
                          </div>
                          <?php } ?>
                          <div class="close-slideshow"><span></span></div>
                          <!-- <div class="swiper-zoom-container"> -->
                            <?php
                                if($slide == 0) {
                                    echo "<img src='" . $image . "' alt='" . $image_alt . "'>";
                                }

                                else if($slide > 0) {
                                    echo "<img src='' data-src='" . $image . "' alt='" . $image_alt . "' class='swiper-lazy'>";
                                    echo "<div class='preloader'></div>";
                                }
                            ?>
                          <!-- </div> -->
                          <div class="slideshow-button slideshow-prev"></div>
                          <div class="slideshow-button slideshow-next"></div>
                        </div>
                    </div>

                    <?php
                            $slide++;
                        endwhile;
                    ?>
                </div>
                <div class="swiper-pagination"></div>

            </div>

            <?php
                //if(count(get_sub_field('slideshow')) > 1) {
            ?>

            <?php
                //}
            ?>
        </div>
    </div>
</div>

<?php
        }

        else if(get_sub_field('media_type') == 'video') {
            $video = get_sub_field('video');

            $video_url = $video['video_url'];
            $video_id = array();
            preg_match("/https:\/\/player.vimeo.com\/external\/(\d*)/", $video_url, $video_id);
?>
<div id="s-<?php echo $data_slideshow; ?>" class="slideshow-container-outer" data-type="video">
    <div class="slideshow-container">
        <div class="close-slideshow"><span></span></div>
        <div class="slideshow-container-inner">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <?php if($video['headline']) { ?>
                        <div class="slide-info">
                            <span class="slide-info-title"><?php echo $video['headline']; ?></span>
                            <div class="slide-info-text">
                                <p><?php echo $video['description']; ?></p>
                            </div>
                        </div>
                        <?php } ?>

                        <div class="slide-content">
                            <video id="v-<?php echo $data_slideshow; ?>" class="video-js vjs-default-skin" preload="none" controls poster="<?php print wp_get_attachment_image_src(get_sub_field('thumbnail'), 'medium')[0]; ?>">
                                <source src="<?php print $video_url; ?>" type="video/mp4">
                            </video>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
        }

        else if(get_sub_field('media_type') == '360') {
            $_360 = get_sub_field('360');
?>

<div id="s-<?php echo $data_slideshow; ?>" class="slideshow-container-outer" data-type="3d">
    <div  class="slideshow-container" >
        <div class="close-slideshow"><span></span></div>
        <div class="slideshow-container-inner">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <?php if($_360['headline']) { ?>
                        <div class="slide-info">
                            <span class="slide-info-title"><?php echo $_360['headline']; ?></span>
                            <div class="slide-info-text">
                                <p><?php echo $_360['description']; ?></p>
                            </div>
                        </div>
                        <?php } ?>

                        <div class="slide-content">
                            <iframe frameborder="0" src="" data-360-src="<?php echo $_360['360_url']; ?>"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
                }

            endwhile;
        endwhile;
    endif;
?>
