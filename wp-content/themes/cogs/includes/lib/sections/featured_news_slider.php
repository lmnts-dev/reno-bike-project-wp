<?php

/** 
 * Featured News Slider
 * 
 * @author Peter Laxalt
 * @since 2/2020
 * @stylesheet featured-news-slider.scss
 * 
 */

/*************************************/
/** Variables */
/*************************************/


if (get_row_layout() == 'featured_news_slider' || $rowLayout == 'featured_news_slider') {

  $args = array(
    'numberposts' => 6,
  );
  
  $featuredNewsListings = get_posts( $args );

?>

  <section class="featured-news-slider featured-news-slider-<?php echo $idx ?>">

    <?php if ( $headline ) { ?>
      <div class="featured-news-slider-header">
        <?php $squiggle['color'] = 'orange' ?>
        <?php require ( get_template_directory() . "/assets/images/squiggle-horizontal.php");  ?>
        <h1>
          <?php echo $headline ?>
        </h1>
      </div>
    <?php } ?>

    <div class="featured-news-slider-inner">
      <div class="featured-news-slider-el featured-news-slider-<?php echo $idx; ?>">

        <?php foreach ($featuredNewsListings as $listing) {
        ?>
          <div class="featured-news-slide">
            <div class="featured-news-slide-inner">
              <div class="news-listing-card">
                <div class="news-listing-card-inner">
                  <div class="info">
                    <span class="title">
                      <?php echo $listing->post_title ?>
                    </span>
                    <?php if ( $listing->post_excerpt ) { ?>
                      <p class="excerpt">
                          <?php echo $listing->post_excerpt ?>
                      </p>
                    <?php } ?>
                  </div>

                  <div class="actions">
                    <div class="col">
                    <?php echo date('F j, Y', strtotime($listing->post_date)) ?>
                    </div>

                    <div class="col">
                      <a href="<?php echo get_post_permalink($listing) ?>" class="btn btn-arrow">
                        More
                      </a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="featured-news-slide-cover">
                <div class="featured-news-slide-cover-inner">
                  <img data-src="<?php echo get_the_post_thumbnail_url( $listing ) ?>" class="lazy" alt="<?php echo $listing->post_title ?>" />
                </div>
              </div>
            </div>
          </div>
        <?php
          #/foreach
        } ?>


      </div>
    </div>
  </section>

<?php } ?>