<?php /* Template Name: Office */ ?>

<?php include 'includes/header.php'; ?>

<section id="main-section" class="content row">
    <div class="index-list column xs-12">
      <!-- About -->
      <div id="about" data-theme="dark" data-panel-title="Office">
          <?php
              $about = get_field('about');

              $about_imgurl = wp_get_attachment_image_src($about['picture'], 'large')[0];
              $about_imgcaption = get_post($about['picture'])->post_excerpt;

              $about_imgurl_hover = wp_get_attachment_image_src($about['picture_hover'], 'large')[0];

              if($detect_device->isMobile() && !$detect_device->isTablet()) {
                  $about_imgurl = wp_get_attachment_image_src($about['picture'], 'medium_large')[0];
                  $about_imgurl_hover = wp_get_attachment_image_src($about['picture_hover'], 'medium_large')[0];
              }

              if($detect_device->isTablet()) {
                $about_imgurl = wp_get_attachment_image_src($about['picture'], 'medium')[0];
                $about_imgurl_hover = wp_get_attachment_image_src($about['picture_hover'], 'medium')[0];
              }

          ?>

          <div class="panel-section-inner">

              <h3 class="index-title"><span>Office</span></h3>

              <div class="index-content row people-columns">
                  <div class="column xs-12 sm-6 md-7 about-photo top">
                      <figure class="team">
                          <img class="img-responsive first" src="<?php echo $about_imgurl; ?>" alt="Danny Forster & Architects Team" title="Danny Forster & Architects Team">
                          <img class="img-responsive last" src="<?php echo $about_imgurl_hover; ?>" alt="Danny Forster & Architects Team" title="Danny Forster & Architects Team">
                          <figcaption><?php echo $about_imgcaption; ?></figcaption>
                      </figure>
                  </div>
                  <div class="column xs-12 sm-6 md-5 about-description">
                    <div class="accordion-container">
                      <?php
                        $content = $about['text'];
                        $content = str_replace('<div>', '', $content);
                        $content = str_replace('</div>', '', $content);
                        echo $content;

                        if (strpos($content, '<hr>') !== false || strpos($content, '<hr />') !== false || strpos($content, '<hr/>') !== false) {
                            echo "<p class='read-more-toggle'>+ <span>read more</span></p>";
                        }

                      ?>
                    </div>
                  </div>
                  <div class="column xs-12 sm-6 md-7 about-photo bottom">
                      <figure class="team">
                          <img class="img-responsive first" src="<?php echo $about_imgurl; ?>" alt="Danny Forster & Architects Team" title="Danny Forster & Architects Team">
                          <img class="img-responsive last" src="<?php echo $about_imgurl_hover; ?>" alt="Danny Forster & Architects Team" title="Danny Forster & Architects Team">
                          <figcaption><?php echo $about_imgcaption; ?></figcaption>
                      </figure>
                  </div>
              </div>
          </div>
      </div>
      <!-- End About -->
    </div>
</section>

<?php include 'includes/footer.php'; ?>
