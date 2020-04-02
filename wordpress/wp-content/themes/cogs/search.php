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

  <?php if (have_posts()) : ?>
    <?php
    $s = get_search_query();
    $args = array(
      's' => $s
    );

    // The Query
    $the_query = new WP_Query($args);
    if ($the_query->have_posts()) { ?>

      <div class='search-results-header'>
        <div class='squiggle-svg squiggle-orange'>
          <?php include get_template_directory() . "/assets/images/squiggle.svg" ?>
        </div>
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
                  <p class="excerpt">
                    <?php the_excerpt(); ?>
                  </p>
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
      } else {
        ?>
        <h2 style='font-weight:bold;color:#000'>Nothing Found</h2>
        <div class="alert alert-info">
          <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
        </div>
      <?php } ?>
        </ul>
      </div>

    <?php endif; ?>

</section>

<?php include 'includes/core/footer.php'; ?>