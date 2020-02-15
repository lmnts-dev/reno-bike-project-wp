<?php /* Template Name: People */ ?>

<?php include 'includes/core/header.php'; ?>

<section id="main-section" class="content row">
    <div class="index-list column xs-12">

      <div id="people" data-theme="dark" data-panel-title="People">
          <?php
              $dannyforster = get_field('danny_forster');
              $dannyforster_imgurl = wp_get_attachment_image_src($dannyforster['picture'], 'medium')[0];

              if($detect_device->isMobile() || $detect_device->isTablet()) {
                  $dannyforster_imgurl = wp_get_attachment_image_src($dannyforster['picture'], 'medium_large')[0];
              }
          ?>

          <div class="panel-section-inner">

              <div class="people-inner">
                  <div class="people-section">
                      <h3 class="index-title">
                          <span>People</span>
                      </h3>

                      <div class="index-content row">
                          <div class="team-member-highlight clearfix">

                              <div class="column xs-12 sm-8 md-6 df-photo">
                                  <figure class="team">
                                      <img class="img-responsive <?php echo imageOrientation($dannyforster_imgurl); ?>" src="<?php echo $dannyforster_imgurl; ?>" alt="Danny Forster" title="Danny Forster"/>
                                  </figure>
                              </div>
                              <div class="column xs-12 sm-4 md-6 about-description df-description">
                                  <div class="team-member">
                                      <div class="accordion-container">
                                          <h5>Danny Forster</h5>

                                          <?php
                                              $dannyforster_bio = $dannyforster['bio'];
                                              $dannyforster_bio = str_replace('<div>', '', $dannyforster_bio);
                                              $dannyforster_bio = str_replace('</div>', '', $dannyforster_bio);
                                              echo $dannyforster_bio;
                                          ?>

                                          <p class="read-more-toggle">+ <span>read more</span></p>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <div class="team-divider column xs-12">
                              <img src="<?php echo get_bloginfo('template_url') ?>/assets/team-divider.gif" />
                          </div>
                          <div class="team-group clearfix">
                              <div class="row team-member-group">

                                  <?php
                                      while(the_repeater_field('people')):
                                          $person_imgurl = wp_get_attachment_image_src(get_sub_field('picture'), 'medium_large')[0];

                                  ?>
                                  <div class="column xs-6 sm-4 md-3 team-member col-1-5">
                                      <figure>
                                          <img class="img-responsive lazy-load-img" src="<?php echo get_bloginfo('template_url'); ?>/assets/lazy-bg.png" data-src="<?php echo $person_imgurl; ?>" alt="<?php echo get_sub_field('name'); ?>" title="<?php echo get_sub_field('name'); ?>"/>
                                      </figure>
                                      <div class="team-info">
                                          <h5><?php echo get_sub_field('name'); ?></h5>
                                          <div class="accordion-container">
                                              <?php
                                                  $bio = get_sub_field('bio');
                                                  $bio = str_replace('<div>', '', $bio);
                                                  $bio = str_replace('</div>', '', $bio);
                                                  echo $bio;
                                              ?>
                                              <p class="read-more-toggle">+ <span>read more</span></p>
                                          </div>
                                      </div>
                                  </div>
                                  <?php
                                      endwhile;
                                  ?>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
</section>

<?php include 'includes/core/footer.php'; ?>
