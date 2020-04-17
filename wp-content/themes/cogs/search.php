<?php

/**
 * Template Name: Search Page
 * @author Peter Laxalt
 * @since 4/2020
 * @stylesheet search-results.scss
 * 
 */

/*************************************/

?>

<?php include 'includes/core/header.php'; ?>

<section class="search-results">

  <?php if (have_posts()) { ?>
    <?php
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $s = get_search_query();
    $args = array(
      's' => $s,
      'paged' => $paged,
      'posts_per_page' => 15
    );

    // The Query
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) { ?>

      <div class='search-results-header'>
        <?php $squiggle['color'] = 'orange' ?>
        <?php require ( get_template_directory() . "/assets/images/squiggle-horizontal.php");  ?>
        <h1><?php echo $wp_query->found_posts ?> results for </h1>
        <h1 class='query'><?php echo get_query_var('s') ?></h1>
        <div class="search-results-input">
          <span class="ico"></span>
          <?php get_search_form(); ?>
        </div>
      </div>

      <div class="search-results-listings">
        <ul>
          <?php while ($the_query->have_posts()) {
            $the_query->the_post();
          ?>
            <li>
              <a href="<?php echo the_permalink() ?>" class="news-listing-card">
                <div class="news-listing-card-inner">
                  <div class="cover">
                    <img data-src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>" class="lazy" />
                  </div>

                  <div class="info">
                    <span class="title">
                      <?php the_title(); ?>
                    </span>
                    <?php if ( get_the_excerpt() ) { ?>
                      <p class="excerpt">
                        <?php the_excerpt(); ?>
                      </p>
                    <?php } ?>
                  </div>

                  <div class="actions">
                    <div class="col">
                      <?php the_date(); ?>
                    </div>

                    <div class="col">
                      <span class="btn btn-arrow">
                        More
                      </span>
                    </div>
                  </div>

                </div>
              </a>
            </li>
          <?php
          }
          ?>

            <li class="pagination">
              <nav>
                <div class="nav-links">
                <?php
                  // the_posts_pagination(array(
                  //   'mid_size'  => 2,
                  //   'prev_text' => __('', 'textdomain'),
                  //   'next_text' => __('', 'textdomain'),
                  // ));

                  echo custom_pagination();
                ?>
                </div>
              </nav>
            </li>
            <!-- <a href="/" class="no-barba" data-barba-prevent>TEST</a> -->

          </ul>
          <?php } else { ?>
            <div class='search-results-header'>
              <?php $squiggle['color'] = 'orange' ?>
              <?php require ( get_template_directory() . "/assets/images/squiggle-horizontal.php");  ?>
              <h1>No results for <span class="query"><?php echo get_query_var('s') ?></span> :(</h1>
              <h1>Try something else.</h1>
              <div class="search-results-input">
                <span class="ico"></span>
                <?php get_search_form(); ?>
              </div>
            </div>

            <?php // $headline = get_sub_field('headline'); ?>
            <?php //$btnText = get_sub_field('view_all_posts_button_text'); ?>
            <?php addComponent("news_listings") ?>
          
        <?php } ?>
      </div>

      <?php } else { ?>
        <div class='search-results-header'>
          <?php $squiggle['color'] = 'orange' ?>
          <?php require ( get_template_directory() . "/assets/images/squiggle-horizontal.php");  ?>
          <h1>No results for <span class="query"><?php echo get_query_var('s') ?></span> :(</h1>
          <h1>Try something else.</h1>
          <div class="search-results-input">
            <span class="ico"></span>
            <?php get_search_form(); ?>
          </div>
        </div>

        <?php // $headline = get_sub_field('headline'); ?>
        <?php //$btnText = get_sub_field('view_all_posts_button_text'); ?>
        <?php addComponent("news_listings") ?>
      <?php } ?>

</section>

<?php include 'includes/core/footer.php'; ?>