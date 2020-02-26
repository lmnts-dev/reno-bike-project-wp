<?php include 'includes/core/header.php'; ?>

<?php
    function mediaIcon($type) {
        if($type == 'slideshow') {
            echo '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" style="enable-background:new 0 0 20 20;" xml:space="preserve">
                <path d="M19.9,3.7H2.7V5H1.4v1.3H0.1v9.9h17.2V15h1.3v-1.3h1.3V3.7z M1.9,6.8h0.8v6.8h14.1v0.8h-15V6.8z M1.9,5.5h0.8v0.8H1.9V5.5z M16.8,15.8H0.6V6.8h0.6h0.3V15h15.5V15.8z M18.1,14.5h-0.8v-0.8h0.8V14.5z"/>
            </svg>';
        }

        else if($type == 'video') {
            echo '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" style="enable-background:new 0 0 20 20;" xml:space="preserve">
                <g>
                    <path d="M4.3,16.6V3.4L15.7,10L4.3,16.6z"/>
                </g>
            </svg>';
        }

        else if($type == '360') {
            echo '<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 20 20" style="enable-background:new 0 0 20 20;" xml:space="preserve">
                <g>
                    <polygon points="17.1,14.2 10.3,18.1 10.3,10.2 17.1,6.3"/>
                    <polygon points="10,9.8 3.2,5.8 10,1.9 16.8,5.8"/>
                    <polygon points="9.7,18.1 2.9,14.2 2.9,6.3 9.7,10.2"/>
                </g>
            </svg>';
        }
    }

    while ( have_posts() ) : the_post();
?>

    <!-- Main Content -->
    <h2 class="index-title active to-fixed animate-top project-view-header project-header">Work</h2>
    <h1 class="index-item active animate-top project-header project-view-header"><?php echo get_the_title(); ?></h1>

    <?php
        $featured_image = get_the_post_thumbnail_url(get_the_id(), 'largest');

        if($detect_device->isMobile() || $detect_device->isTablet()) {
            //$featured_image = get_the_post_thumbnail_url(get_the_id(), 'medium');

            // medium_large is a default size not overriden and smaller than the thumbnail size
            if(get_field('mobile_image')) {
              //$featured_image = wp_get_attachment_image_src(get_field('mobile_image'), 'medium')[0];
              $featured_image = get_the_post_thumbnail_url(get_the_id(), 'medium');
            } else {
              $featured_image = get_the_post_thumbnail_url(get_the_id(), 'medium');
            }
        }

        if($detect_device->isTablet()) {
            $featured_image = get_the_post_thumbnail_url(get_the_id(), 'large');
        }

        // if($detect_device->isMobile() || $detect_device->isTablet()) {
        //     $featured_image = get_the_post_thumbnail_url(get_the_id(), 'large');
        // }

        if(get_field('hero_video')) {
            $video_url = get_field('hero_video');
            $video_id = array();
            preg_match("/https:\/\/player.vimeo.com\/external\/(\d*)/", $video_url, $video_id);

            // if($detect_device->isMobile() || $detect_device->isTablet()) {
            //     if(get_field('hero_gif')) {
            //         $featured_image = wp_get_attachment_image_src(get_field('hero_gif'), 'original')[0];
            //     }
            //     echo "<img src='" . $featured_image . "' class='preload-img' style='display:none;'>";
            //     echo "<div class='intro-video-wrapper no-video' style='background-image: url(" . $featured_image . ")'></div>";
            // }
            //else {
              ?>

              <div class="intro-video-wrapper">
                  <video id="intro-video" poster="<?php echo $featured_image; ?>" loop autoplay muted playsinline>
                      <source src="<?php print $video_url; ?>" type="video/mp4">
                  </video>
              </div>

              <?php
            //}
        }
        else {
            // if(($detect_device->isMobile() || $detect_device->isTablet()) && get_field('hero_gif')) {
            //     $featured_image = wp_get_attachment_image_src(get_field('hero_gif'), 'original')[0];
            // }
            echo "<img src='" . $featured_image . "' class='preload-img' style='display:none;'>";
            echo "<div class='intro-video-wrapper no-video' style='background-image: url(" . $featured_image . ")'></div>";
        }
    ?>

    <section id="main-section" class="content row">

        <!-- Project Content -->
        <div id="project-content" class="index-list column xs-12" data-theme="red">
            <div class="panel-section project-panel" data-panel-title="Projects<br><i><?php echo get_the_title(); ?></i>">
                <?php
                if (!$detect_device->isMobile() && !$detect_device->isTablet()):
                    ?>

                    <div class="video-parallax-effect">
                        <!-- <span class="arrow-down-trigger"></span> -->

                    </div>

                    <?php
                endif;
                ?>

                <div class="panel-section-inner no-padding project-all-info">
                    <?php
                      if(get_field('hero_video')) {
                    ?>
                    <div class="video-controls">
                      <span class="preload"></span>
                      <span class="icon play is-playing"></span>
                      <span class="icon sound is-muted"></span>
                    </div>
                    <?php
                      }
                    ?>
                    <?php
                    //if ($detect_device->isMobile() || $detect_device->isTablet()):
                        ?>
                        <!-- <div class="video-parallax-effect"> -->
                            <!-- <span class="arrow-down-trigger"></span> -->
                        <!-- </div> -->
                        <?php
                    //endif;
                    ?>


                    <!-- Project Intro -->
                    <div class="project-intro clearfix">



                        <div class="project-intro-inner clearfix">
                            <div class="column xs-12 md-10 md-offset-2 lg-9 lg-offset-3 project-intro-cover">
                              <div class="project-thumb-cover">
                                  <?php
                                  $imgurl = wp_get_attachment_image_src(get_field('second_image'), 'large')[0];
                                  $img_alt = get_post_meta(get_field('second_image'), '_wp_attachment_image_alt', true);
                                  if ($img_alt == null){
                                      $img_alt = get_the_title();
                                  }

                                  if($detect_device->isMobile() && !$detect_device->isTablet()) {
                                    $imgurl = wp_get_attachment_image_src(get_field('second_image'), 'medium_large')[0];
                                  }
                                  if($detect_device->isTablet()) {
                                    $imgurl = wp_get_attachment_image_src(get_field('second_image'), 'medium')[0];
                                  }
                                  ?>
                                  <img src="<?php echo $imgurl; ?>" alt="<?php echo $img_alt; ?>" title="<?php echo $img_alt; ?>">
                              </div>
                              <!-- <div class="ratio-16-9"></div> -->
                            </div>
                            <div class="column xs-12 md-10 md-offset-2 lg-9 lg-offset-3 project-text">
                                <div class="row">
                                    <div class="column xs-12 sm-12 md-3 lg-3">
                                        <h3><?php echo get_field('second_title'); ?></h3>
                                    </div>
                                    <div class="column xs-12 sm-8 md-6 lg-7 project-text-info accordion-container">
                                        <?php
                                        ob_start();
                                        the_content();
                                        $content = ob_get_clean();
                                        $content = str_replace('<div>', '', $content);
                                        $content = str_replace('</div>', '', $content);
                                        echo $content;

                                        if (strpos($content, '<hr>') !== false || strpos($content, '<hr />') !== false || strpos($content, '<hr/>') !== false) {
                                            echo "<p class='read-more-toggle'>+ <span>read more</span></p>";
                                        }
                                        ?>
                                    </div>

                                    <div class="column xs-12 sm-4 md-3 lg-2 project-text-info project-data">
                                        <?php
                                            if(get_field('project_details')) {
                                                while(the_repeater_field('project_details')):

                                                    echo "<h6>" . get_sub_field('label') . "</h6>";
                                                    echo "<p>" . get_sub_field('value') . "</p>";

                                                endwhile;
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Project Intro -->
                    <?php
                        if( have_rows('project_media') ):
                    ?>

                    <div class='project-thumbs-list clearfix'>

                        <?php
                            while ( have_rows('project_media') ) : the_row();
                                //ROW TYPE ONE
                                if( get_row_layout() == 'type_one' ):
                        ?>

                        <div class="project-thumb-row first-type clearfix">
                            <?php
                                $i = 0;
                                while ( have_rows('media') ) : the_row();
                                    $class = '';
                                    $thumbnail = wp_get_attachment_image_src(get_sub_field('thumbnail'), 'medium')[0];
                                    $thumbnail_alt = get_post_meta(get_sub_field('thumbnail'), '_wp_attachment_image_alt', true);
                                    if ($thumbnail_alt == null){
                                        $thumbnail_alt = get_the_title();
                                    }

                                    if ($detect_device->isMobile() || $detect_device->isTablet()):
                                      $thumbnail = wp_get_attachment_image_src(get_sub_field('thumbnail'), 'thumbnail')[0];
                                    endif;

                                    if($i == 0) {
                                        $class = 'grid-left-side';
                                    }
                                    else if($i == 1) {
                                        $class = 'grid-right-side';
                                    }

                            ?>

                            <!-- Project Thumb -->
                            <div class="column xs-12 md-6 project-thumb <?php echo $class; ?> <?php print "thumb-type-".get_sub_field('media_type'); ?>" data-slideshow="<?php echo get_sub_field('media_id'); ?>">
                                <div class="project-thumb-icon">
                                    <?php mediaIcon(get_sub_field('media_type')); ?>
                                </div>
                                <div class="ratio-16-9">
                                    <div class="project-thumb-cover">
                                        <?php
                                            if(get_sub_field('media_type') == 'slideshow') {
                                                $thumbnail = wp_get_attachment_image_src(get_sub_field('thumbnail'), 'large')[0];
                                            }

                                            $image_orientation = imageOrientation($thumbnail);

                                            if($image_orientation != "landscape") {
                                              $thumbnail = wp_get_attachment_image_src(get_sub_field('thumbnail'), 'medium')[0];
                                            }

                                            if ($detect_device->isMobile() || $detect_device->isTablet()):
                                              $thumbnail = wp_get_attachment_image_src(get_sub_field('thumbnail'), 'thumbnail')[0];
                                            endif;
                                        ?>

                                        <img class="lazy-load-img" src="<?php echo get_bloginfo('template_url'); ?>/assets/lazy-bg.png" data-src="<?php echo $thumbnail; ?>" alt="<?php echo $thumbnail_alt; ?>" title="<?php echo $thumbnail_alt; ?>">
                                    </div>
                                </div>
                                <?php if(get_sub_field('thumbnail_description')) { ?>
                                <div class="project-thumb-description">
                                    <?php echo get_sub_field('thumbnail_description'); ?>
                                </div>
                                <?php } ?>
                            </div>
                            <!-- End Project Thumb -->

                            <?php
                                    $i++;
                                endwhile;

                                if(count(get_sub_field('media')) == 1) {
                                    echo '<div class="column xs-12 md-6 grid-right-side empty"></div>';
                                }
                            ?>
                        </div>

                        <?php
                                //ROW TYPE TWO
                                elseif( get_row_layout() == 'type_two' ):
                        ?>

                        <div class="project-thumb-row second-type clearfix">
                            <?php
                                $i = 0;
                                while ( have_rows('media') ) : the_row();
                                    $divopen = '';
                                    $divclose = '';
                                    $class = '';
                                    $class2 = '';
                                    $thumbnail = wp_get_attachment_image_src(get_sub_field('thumbnail'), 'medium')[0];
                                    $thumbnail_alt = get_post_meta(get_sub_field('thumbnail'), '_wp_attachment_image_alt', true);
                                    if ($thumbnail_alt == null){
                                        $thumbnail_alt = get_the_title();
                                    }

                                    if($i == 0) {
                                        $divopen = '<div class="column xs-12 md-6 grid-left-side">';
                                        $divclose = '';
                                        $class = 'square-thumb';
                                        $class2 = 'square';
                                        $thumbnail = wp_get_attachment_image_src(get_sub_field('thumbnail'), 'thumbnail')[0];
                                    }
                                    else if($i == 1) {
                                        $divopen = '';
                                        $divclose = '</div>';
                                        $class = 'rectangle-thumb';
                                        $class2 = 'rectangle';
                                        $thumbnail = wp_get_attachment_image_src(get_sub_field('thumbnail'), 'thumbnail')[0];
                                    }
                                    else if($i == 2) {
                                        $divopen = '';
                                        $divclose = '';
                                        $class = 'xs-12 md-6 grid-right-side';
                                        $class2 = '';
                                    }

                                    if ($detect_device->isMobile() || $detect_device->isTablet()):
                                      $thumbnail = wp_get_attachment_image_src(get_sub_field('thumbnail'), 'thumbnail')[0];
                                    endif;

                            ?>

                            <!-- Project Thumb -->
                            <?php echo $divopen; ?>
                                <div class="column project-thumb <?php echo $class; ?> <?php print "thumb-type-".get_sub_field('media_type'); ?>" data-slideshow="<?php echo get_sub_field('media_id'); ?>">
                                    <div class="project-thumb-icon">
                                        <?php mediaIcon(get_sub_field('media_type')); ?>
                                    </div>
                                    <div class="ratio-16-9 <?php echo $class2; ?>">
                                        <div class="project-thumb-cover">
                                            <?php
                                                if(get_sub_field('media_type') == 'slideshow') {
                                                    $thumbnail = wp_get_attachment_image_src(get_sub_field('thumbnail'), 'large')[0];
                                                }

                                                $image_orientation = imageOrientation($thumbnail);
                                                if($image_orientation != "landscape") {
                                                  $thumbnail = wp_get_attachment_image_src(get_sub_field('thumbnail'), 'medium')[0];
                                                }

                                                if ($detect_device->isMobile() || $detect_device->isTablet()):
                                                  // medium_large is a default size not overriden and smaller than the thumbnail size
                                                  $thumbnail = wp_get_attachment_image_src(get_sub_field('thumbnail'), 'medium_large')[0];
                                                endif;
                                            ?>

                                            <img class="lazy-load-img" src="<?php echo get_bloginfo('template_url'); ?>/assets/lazy-bg.png" data-src="<?php echo $thumbnail; ?>" alt="<?php echo $thumbnail_alt; ?>" title="<?php echo $thumbnail_alt; ?>">
                                        </div>
                                    </div>
                                    <?php if(get_sub_field('thumbnail_description')) { ?>
                                    <div class="project-thumb-description">
                                        <?php echo get_sub_field('thumbnail_description'); ?>
                                    </div>
                                    <?php } ?>
                                </div>
                            <?php echo $divclose; ?>
                            <!-- End Project Thumb -->

                            <?php
                                    $i++;
                                endwhile;
                            ?>
                        </div>

                        <?php
                                //ROW TYPE THREE
                                elseif( get_row_layout() == 'type_three' ):
                        ?>

                        <div class="project-thumb-row third-type clearfix">
                            <?php
                                $i = 0;
                                while ( have_rows('media') ) : the_row();
                                    $divopen = '';
                                    $divclose = '';
                                    $class = '';
                                    $class2 = '';
                                    $thumbnail = wp_get_attachment_image_src(get_sub_field('thumbnail'), 'medium')[0];
                                    $thumbnail_alt = get_post_meta(get_sub_field('thumbnail'), '_wp_attachment_image_alt', true);
                                    if ($thumbnail_alt == null){
                                        $thumbnail_alt = get_the_title();
                                    }

                                    if($i == 0) {
                                        $divopen = '';
                                        $divclose = '';
                                        $class = 'xs-12 md-6 grid-left-side';
                                        $class2 = '';

                                    }
                                    else if($i == 1) {
                                        $divopen = '<div class="column xs-12 md-6 grid-right-side">';
                                        $divclose = '';
                                        $class = 'square-thumb';
                                        $class2 = 'square';
                                        $thumbnail = wp_get_attachment_image_src(get_sub_field('thumbnail'), 'thumbnail')[0];
                                    }
                                    else if($i == 2) {
                                        $divopen = '';
                                        $divclose = '</div>';
                                        $class = 'rectangle-thumb';
                                        $class2 = 'rectangle';
                                        $thumbnail = wp_get_attachment_image_src(get_sub_field('thumbnail'), 'thumbnail')[0];
                                    }

                                    if ($detect_device->isMobile() || $detect_device->isTablet()):
                                      $thumbnail = wp_get_attachment_image_src(get_sub_field('thumbnail'), 'thumbnail')[0];
                                    endif;
                            ?>

                            <!-- Project Thumb -->
                            <?php echo $divopen; ?>
                                <div class="column project-thumb <?php echo $class; ?> <?php print "thumb-type-".get_sub_field('media_type'); ?>" data-slideshow="<?php echo get_sub_field('media_id'); ?>">
                                    <div class="project-thumb-icon">
                                        <?php mediaIcon(get_sub_field('media_type')); ?>
                                    </div>
                                    <div class="ratio-16-9 <?php echo $class2; ?>">
                                        <div class="project-thumb-cover">
                                            <?php
                                                if(get_sub_field('media_type') == 'slideshow') {
                                                    $thumbnail = wp_get_attachment_image_src(get_sub_field('thumbnail'), 'large')[0];
                                                }

                                                $image_orientation = imageOrientation($thumbnail);
                                                if($image_orientation != "landscape") {
                                                  $thumbnail = wp_get_attachment_image_src(get_sub_field('thumbnail'), 'medium')[0];
                                                }

                                                if ($detect_device->isMobile() || $detect_device->isTablet()):
                                                  // medium_large is a default size not overriden and smaller than the thumbnail size
                                                  $thumbnail = wp_get_attachment_image_src(get_sub_field('thumbnail'), 'medium_large')[0];
                                                endif;
                                            ?>

                                            <img class="lazy-load-img" src="<?php echo get_bloginfo('template_url'); ?>/assets/lazy-bg.png" data-src="<?php echo $thumbnail; ?>" alt="<?php echo $thumbnail_alt; ?>" title="<?php echo $thumbnail_alt; ?>">
                                        </div>
                                    </div>
                                    <?php if(get_sub_field('thumbnail_description')) { ?>
                                    <div class="project-thumb-description">
                                        <?php echo get_sub_field('thumbnail_description'); ?>
                                    </div>
                                    <?php } ?>
                                </div>
                            <?php echo $divclose; ?>
                            <!-- End Project Thumb -->

                            <?php
                                    $i++;
                                endwhile;
                            ?>
                        </div>

                        <?php
                                //ROW TYPE FOUR
                                elseif( get_row_layout() == 'type_four' ):
                        ?>

                        <div class="row no-margins fourth-type project-text">


                          <div class="column xs-12 sm-6">
                            <div class="column-inner first">
                              <div class="row">
                                <div class="column xs-12 sm-12 md-6 lg-5">
                                  <?php
                                    if(get_sub_field('title')) {
                                        echo "<h3>" . get_sub_field('title') . "</h3>";
                                    }
                                  ?>
                                </div>
                                <div class="column xs-12 sm-8 md-6 lg-7 project-text-info accordion-container">
                                  <?php
                                      echo get_sub_field('content');
                                      if (strpos($content, '<hr>') !== false || strpos($content, '<hr />') !== false || strpos($content, '<hr/>') !== false) {
                                          echo "<p class='read-more-toggle'>+ <span>read more</span></p>";
                                      }
                                  ?>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="column xs-12 sm-6">
                            <div class="column-inner last">
                              <div class="row">
                                <div class="column xs-12 sm-12 md-6 lg-5">
                                <?php
                                  if(get_sub_field('title')) {
                                      echo "<h3>" . get_sub_field('title_2') . "</h3>";
                                  }
                                ?>
                                </div>
                                <div class="column xs-12 sm-8 md-6 lg-7  project-text-info accordion-container">
                                  <?php
                                      echo get_sub_field('content_2');
                                      if (strpos($content, '<hr>') !== false || strpos($content, '<hr />') !== false || strpos($content, '<hr/>') !== false) {
                                          echo "<p class='read-more-toggle'>+ <span>read more</span></p>";
                                      }
                                  ?>
                                </div>
                              </div>
                            </div>
                          </div>


                        </div>

                        <?php

                                endif;
                            endwhile;
                        ?>
                    </div>

                    <?php
                        endif;
                    ?>

                    <div class="container-fluid related-projects">
                        <div class="related-projects-inner clearfix">
                            <ul class="column xs-12">
                                <li class="related-project contextual-link back-to-work"><a class="async project-toggle" title="Work" href="<?php echo home_url(); ?>">Work</a></li>

                                <?php if(get_field('related_projects')[0]) { ?>
                                <li class="list-title">RELATED PROJECTS</li>

                                <?php foreach(get_field('related_projects') as $related_id): ?>
                                    <li class="related-project contextual-link uppercase"><a class="async project-toggle" title="<?php echo get_the_title($related_id); ?>" href="<?php echo get_permalink($related_id); ?>"><?php echo get_the_title($related_id); ?></a></li>
                                <?php endforeach; ?>

                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            // if (!$detect_device->isMobile() && !$detect_device->isTablet()):
            //     include("includes/content-list.php");
            // endif;
            ?>
        </div>
    </section>
    <?php include("includes/slideshows.php"); ?>

    <?php endwhile; wp_reset_query(); ?>

    <?php include 'includes/core/footer.php'; ?>
