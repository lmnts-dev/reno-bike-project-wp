<?php

/**
 * Template Name: Search Page
 * @author Peter Laxalt
 * @since 4/2020
 * @stylesheet search-results.scss
 * 
 */

/*************************************/

// Custom Pagination
function custom_pagination() {
  global $wp_query;
  $big = 999999999; // need an unlikely integer
  $pages = paginate_links( array(
      'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
      'format' => '?paged=%#%',
      'current' => max( 1, get_query_var('paged') ),
      'total' => $wp_query->max_num_pages,
      'prev_next' => false,
      'type'  => 'array',
      'prev_next'   => true,
      'prev_text'    => __( '«', 'text-domain' ),
      'next_text'    => __( '»', 'text-domain'),
  ) );
  $output = '';

  if ( is_array( $pages ) ) {
      $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var( 'paged' );

      $output .=  '';
      foreach ( $pages as $page ) {
          $output .= "$page";
      }
      $output .= '';

      // Create an instance of DOMDocument 
      $dom = new \DOMDocument();

      // Populate $dom with $output, making sure to handle UTF-8, otherwise
      // problems will occur with UTF-8 characters.
      $dom->loadHTML( mb_convert_encoding( $output, 'HTML-ENTITIES', 'UTF-8' ) );

      // Create an instance of DOMXpath and all elements with the class 'page-numbers' 
      $xpath = new \DOMXpath( $dom );

      // http://stackoverflow.com/a/26126336/3059883
      $page_numbers = $xpath->query( "//*[contains(concat(' ', normalize-space(@class), ' '), ' page-numbers ')]" );

      // Iterate over the $page_numbers node...
      foreach ( $page_numbers as $page_numbers_item ) {

          // Add class="mynewclass" to the <li> when its child contains the current item.
          $page_numbers_item_classes = explode( ' ', $page_numbers_item->attributes->item(0)->value );
          if ( in_array( 'current', $page_numbers_item_classes ) ) {          
              $list_item_attr_class = $dom->createAttribute( 'class' );
              $list_item_attr_class->value = 'newClass';
              $page_numbers_item->parentNode->appendChild( $list_item_attr_class );

              // Add data-barba-prevent
              $list_item_attr_prevent = $dom->createAttribute( 'data-barba-prevent' );
              $list_item_attr_prevent->value = 'preventBarba';
              $page_numbers_item->parentNode->appendChild( $list_item_attr_prevent );
          }

          // Replace the class 'current' with 'active'
          $page_numbers_item->attributes->item(0)->value = str_replace( 
                          'current',
                          'active',
                          $page_numbers_item->attributes->item(0)->value );

          // Replace the class 'page-numbers' with 'page-link'
          $page_numbers_item->attributes->item(0)->value = str_replace( 
                          'page-numbers',
                          'page-numbers barba-prevent',
                          $page_numbers_item->attributes->item(0)->value );
      }
      
      // Save the updated HTML and output it.
      $output = $dom->saveHTML();
  }

  return $output;
}

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
          <?php
        } else {

          $args = array(
            'numberposts' => 30,
          );
          
          $articles = get_posts( $args );
          $headline = get_sub_field('headline');
          $btnText = get_sub_field('view_all_posts_button_text');

          ?>
          <div class='search-results-header'>
            <div class='squiggle-svg squiggle-orange'>
              <?php include get_template_directory() . "/assets/images/squiggle.svg" ?>
            </div>
            <h1>No results for <span class="query"><?php echo get_query_var('s') ?></span> :(</h1>
            <h1>Try something else.</h1>
            <div class="search-results-input">
              <span class="ico"></span>
              <?php get_search_form(); ?>
            </div>
          </div>

          <!-- Listings -->
          <div class="news-listings padding-top-half news-listings-search-results">
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
          </div>
        <?php } ?>
      </div>

      <?php } else { 
        $args = array(
          'numberposts' => 30,
        );
        
        $articles = get_posts( $args );
        $headline = get_sub_field('headline');
        $btnText = get_sub_field('view_all_posts_button_text');

        ?>
        <div class='search-results-header'>
            <div class='squiggle-svg squiggle-orange'>
              <?php include get_template_directory() . "/assets/images/squiggle.svg" ?>
            </div>
            <h1>No results for <span class="query"><?php echo get_query_var('s') ?></span> :(</h1>
            <h1>Try something else.</h1>
            <div class="search-results-input">
              <span class="ico"></span>
              <?php get_search_form(); ?>
            </div>
          </div>

          <!-- Listings -->
          <div class="news-listings padding-top-half news-listings-search-results">
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
          </div>
      <?php } ?>

</section>

<?php include 'includes/core/footer.php'; ?>