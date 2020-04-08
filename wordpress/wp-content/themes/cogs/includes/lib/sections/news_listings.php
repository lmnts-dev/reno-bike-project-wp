<?php

/** 
 * News Listings
 * 
 * @author Peter Laxalt
 * @since 2/2020
 * @stylesheet news-listings.scss
 * 
 */

/*************************************/
/** Variables */
/*************************************/



if (get_row_layout() == 'news_listings' || $rowLayout == 'news_listings') {
  $args = array(
    'numberposts' => 6,
  );
  
  $articles = get_posts( $args );
  $headline = get_sub_field('headline');
  $btnText = get_sub_field('view_all_posts_button_text');
?>

  <section class="news-listings padding-top-half news-listings-<?php echo $idx ?>">
    <?php if ( $headline ) { ?>
      <div class="squiggle-svg squiggle-orange squiggle-centered squiggle-short squiggle-vertical"><?php require ( get_template_directory() . "/assets/images/squiggle.svg");  ?></div>
      <div class="news-listings-header">
        <h3>
          <?php echo $headline ?>
        </h3>
        <?php if ( $btnText ) { ?>
          <a href="/news-and-press" class="btn btn-border-black">
            <?php echo $btnText ?>
          </a>
        <?php } ?>
      </div>
    <?php } ?>

    <div class="news-listings-inner">

      <?php foreach ($articles as $article) { ?>

        <a href="<?php echo get_post_permalink($article) ?>" class="news-listing-card">
          <div class="news-listing-card-inner">
            <div class="cover">
              <img data-src="<?php echo get_the_post_thumbnail_url( $article ) ?>" alt="<?php echo $article->post_title ?>" class="lazy" />
            </div>

            <div class="info">
              <span class="title">
                <?php echo $article->post_title ?>
              </span>
              <p class="excerpt">
                <?php echo $article->post_excerpt ?>
              </p>
            </div>

            <div class="actions">
              <div class="col">
                <?php echo date('F j, Y', strtotime($article->post_date)) ?>
              </div>

              <div class="col">
                <span class="btn btn-arrow">
                  More
                </span>
              </div>
            </div>

          </div>
        </a>
      <?php
        #/forEach 
      } ?>

      <?php if ( $btnText ) { ?>
        <div class="mobile-btn">
          <a href="/news-and-press" class="btn btn-border-black">
            <?php echo $btnText ?>
          </a>
        </div>
      <?php } ?>

    </div>
  </section>


<?php } ?>