<?php /* Template Name: Homepage */ ?>

<?php include 'includes/header.php'; ?>

<?php
    if ($detect_device->isMobile() || $detect_device->isTablet()) {
        $block_class = "panel-slide";
    } else  {
        $block_class = "panel-section";
    }

    $fields = get_fields();
?>

<section id="main-section" class="content row">
    <div class="index-list column xs-12">
      <!-- Projects -->
      <div id="featured-stories" data-theme="light" data-panel-title="Work">
          <div class="panel-section-inner">
              <!-- Desktop / Non-touch Devices -->
              <?php if (!$detect_device->isMobile() && !$detect_device->isTablet()): ?>
                  <h3 class="index-title"><span>Work</span></h3>

                  <div class="index-content">
                      <?php
                      $p_index = 1;
                      while(the_repeater_field('project_list', $homepage_id)):
                          $project_id = get_sub_field('project');

                          if(get_post_status($project_id) == 'publish') {
                          ?>

                          <h2 class="index-item featured-project">
                              <?php 
                                $tags_list = get_the_tags( $project_id );
                                if ( $tags_list ) {
                                    foreach ( $tags_list as $tag ) {
                                        $tag_names[] = $tag->name;
                                    }
                                    $title_text = get_the_title($project_id) . ' - ' . implode( ', ', $tag_names );
                                }
                                else {
                                    $title_text = get_the_title($project_id);
                                }
                              ?>
                              <a class="async thumb-toggle" title="<?php echo $title_text ?>" data-id="p-<?php echo $p_index; ?>" href="<?php echo get_permalink($project_id); ?>"><?php echo get_the_title($project_id); ?></a>
                          </h2>

                          <?php
                              $p_index++;
                          }
                      endwhile;
                      ?>

                      <?php include("includes/thumbnails.php"); ?>
                  </div>

                  <!-- End Desktop / Non-touch Devices -->
              <?php else: ?>
                  <!-- Mobile / Touch Slideshow -->


                  <div class="mobile-project-list">
                      <?php
                      $p_index = 1;
                      while(the_repeater_field('project_list', $homepage_id)):
                          $project_id = get_sub_field('project');

                          $project_bg_img = get_the_post_thumbnail_url($project_id, 'medium');

                          // medium_large is a default size not overriden and smaller than the thumbnail size
                          if($detect_device->isMobile() && !$detect_device->isTablet()) {
                              $project_bg_img = get_the_post_thumbnail_url($project_id, 'medium_large');
                          }

                          ?>
                          <?php if($p_index <= 3) { ?>
                          <div class="list-slide" style="background-image:url(<?php echo $project_bg_img; ?>);">
                          <?php } else { ?>
                          <div class="list-slide lazy-bg" data-src="<?php echo $project_bg_img; ?>;">
                          <?php }?>
                              <?php 
                                if ( $tags_list ) {
                                    foreach ( $tags_list as $tag ) {
                                        $tag_names[] = $tag->name;
                                    }
                                    $title_text = get_the_title($project_id) . ' - ' . implode( ', ', $tag_names );
                                }
                                else {
                                    $title_text = get_the_title($project_id);
                                }
                              ?>
                              <a class="async project-toggle" title="<?php echo $title_text ?>" href="<?php echo get_permalink($project_id); ?>">
                                  <span><?php echo get_the_title($project_id); ?></span>
                              </a>
                          </div>

                          <?php
                          $p_index++;
                      endwhile;
                      ?>
                  </div>
              <?php endif; ?>
              <!-- End Mobile / Touch Slideshow -->
          </div>
      </div>
      <!-- End Projects -->

      <!-- Start Culture Teaser -->
      <?php if ( $fields['large_paragraph'] && $fields['small_paragraph'] && $fields['culture_image'] && $fields['pillar_one'] && $fields['pillar_two'] && $fields['pillar_three'] && $fields['button_text']){ ?>
            <section class="section culture-teaser bg-black">
                <div class="inner">
                    <div class="top">
                        <div class="text">
                            <div class="large-text"><?php echo $fields['large_paragraph'] ?></div>
                            <?php echo $fields['small_paragraph'] ?>
                        </div>
                        <img src="<?php echo esc_url( $fields['culture_image']['url']); ?>">
                    </div>
                    <ul class="pillars">
                        <li><?php echo $fields['pillar_one'] ?></li>
                        <li><?php echo $fields['pillar_two'] ?></li>
                        <li><?php echo $fields['pillar_three'] ?></li>
                        <li>
                            <a href="/culture" class="arrow-styles align-top">
                                <?php echo $fields['button_text'] ?>
                            </a>
                        </li>
                    </ul>
                </div>
            </section>
      <?php } ?>
      <!-- End Culture Teaser -->

      <!-- Start Press Teaser -->
      <?php
            $args = array(
                'numberposts' => 3,
                'post_type' => 'press'
            );
            
            $articles = get_posts( $args );

            if ( sizeof($articles) > 0 ){
                
        ?>
            <section class="section section-header bg-black padding-bottom-none">
                <div class="inner">
                    <h2>Press</h2>
                    <a href="/press" class="arrow-styles sm-size">View All</a>
                </div>
            </section>
            <section class="section press-list bg-black padding-top-half">
                <div class="inner">
                        <?php foreach ( $articles as $article ) { ?>
                            <a href="<?php echo get_field( 'article_link', $article->ID ) ?>" target="_blank">
                                <div class="left date-and-location">
                                    <?php echo get_the_date('F d, Y', $article->ID); ?></br>
                                    <?php echo get_field( 'article_location', $article->ID) ?>
                                </div>
                                <div class="middle">
                                    <h5 class="h3"><?php echo $article->post_title ?></h5>
                                    <div class="date-and-location mobile-item">
                                        <?php echo get_the_date('F d, Y', $article->ID); ?></br>
                                        <?php echo get_field( 'article_location', $article->ID) ?>
                                    </div>
                                    <p><?php echo $article->post_excerpt ?></p>
                                </div>
                                <div class="right arrow-styles align-top">
                                    <?php echo get_the_post_thumbnail($article->ID, 'full') ?>
                                </div>
                            </a>
                        <?php } ?>
                </div>
            </section>
        <?php  } ?>
      <!-- End Press Teaser -->
      
    </div>
</section>

<?php include 'includes/footer.php'; ?>
