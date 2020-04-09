<?php

/** 
 * Default Event Post Template
 * 
 * @author Alisha Garric
 * @since 4/2020
 */

/*************************************/

?>

<?php include 'includes/core/header.php'; ?>

<!-- hero ( page title and tags) -->

<?php get_template_part('content', get_post_format()); ?>

<?php
// Start the loop.
while (have_posts()) : the_post();
?>

  <?php
  // Social URLS
  $facebookShareUrl = "https://www.facebook.com/sharer.php?u=" . get_the_permalink();
  $twitterShareUrl = "https://twitter.com/intent/tweet?url=" . get_the_permalink() . "&text=" . get_the_title() . "&via=renobikeproject&hashtags=bikes,diy,community,reno,nevada" . get_the_tags();
  $fields = get_fields();

  // Deprecated
  // $linkedInShareUrl = "https://www.linkedin.com/shareArticle?mini=true&url=" . get_the_permalink() . "&title=" . get_the_title() . "&summary=" . get_the_excerpt();
  ?>

  <article class="event-article" itemscope itemtype="http://schema.org/Article">
    <div class="article-inner">
      <div class="article-header">
        <div class="tags">
          <ul itemprop="keywords">
            <li>
              <a href="/news-and-press">
                Latest News
              </a>
            </li>
            <?php
            the_tags('<li>', '</li><li>', '</li>');
            ?>
          </ul>
        </div>
        <h1>
          <?php the_title(); ?>
        </h1>
        <div class="details-box">

            <div class="text-container">
                <div class="date" itemprop="datePublished">
                    <?php the_date(); ?>
                </div>
                <div class='location'>
                    <?php echo $fields['location']; ?>
                </div>  
                <div class="social-icons">
                    <div>
                        <span aria-role="button" data-href="<?php echo $facebookShareUrl ?>" class="social-share">
                            F
                        </span>
                    </div>
                    <div>
                        <span aria-role="button" data-href="<?php echo $twitterShareUrl ?>" class="social-share">
                            T
                        </span>
                    </div>
                </div>
            </div>

            <?php if ( $fields['detail_items'] ){ ?>
                <div class="box-container">
                    <?php foreach ( $fields['detail_items'] as $item ){ ?>
                        <div class="item"><div class="label"><?php echo $item['label']; ?></div>
                        <div class="text"><?php echo $item['text']; ?></div></div>
                    <?php } ?>
                </div>
            <?php } ?>

        </div>
      </div>

      <div class="description-block">
        <div class="description">
            <?php echo get_the_excerpt() ?>
            <div class="more">
                <?php echo $fields['additional_description']; ?>
            </div>
        </div>
        <?php if (has_post_thumbnail()) { ?>
            <div class="image">
                <div>
                    <img itemprop="image" data-src="<?php echo get_the_post_thumbnail_url(); ?>" class="lazy" alt="<?php echo get_the_title(); ?>" />
                </div>
            </div>
        <?php } ?>
      </div>

      <?php $location = get_field('google_maps_location'); ?>
        <?php if( $location ): ?>
            <div class="acf-map" data-zoom="16">
                <div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" data-lng="<?php echo esc_attr($location['lng']); ?>"></div>
            </div>
        <?php endif; ?>

      <div class="article-body" itemprop="articleBody">
        <?php
        the_content();
        ?>
      </div>

      <div class="article-footer">
        <div class="share">
          <div class="label">
            Share This
          </div>
          <div class="social-icons">
            <div>
              <span aria-role="button" data-href="<?php echo $facebookShareUrl ?>" class="social-share">
                F
              </span>
            </div>
            <div>
              <span aria-role="button" data-href="<?php echo $twitterShareUrl ?>" class="social-share">
                T
              </span>
            </div>
          </div>
        </div>

        <div class="post-nav">

          <?php if (get_previous_post()->ID != get_the_ID()) : ?>
            <?php if (is_a(get_previous_post(), 'WP_Post')) : ?>
              <a href="<?php echo get_permalink(get_previous_post()->ID); ?>" class="prev-post">Prev</a>
            <?php endif; ?>
          <?php endif; ?>

          <?php if (get_next_post()->ID != get_the_ID()) : ?>
            <?php if (is_a(get_next_post(), 'WP_Post')) : ?>
              <a href="<?php echo get_permalink(get_next_post()->ID); ?>" class="next-post">Next</a>
            <?php endif; ?>
          <?php endif; ?>

        </div>

      </div>
    </div>
  </article>


<?php
// End the loop. 
endwhile;
?>


<!-- location, date, social links, grey box -->
<!-- featured image, description, additional description -->
<!-- map -->
<!-- content -->
<!-- sections -->

<?php
    if (have_rows('sections')) {
        $idx = 0; // Establish our index.

        while (have_rows('sections')) {
            the_row();

            addComponent(get_row_layout());

            $idx++; // Increment our index.
        }
    };
?>

<!-- prev and next -->

<?php addComponent("newsletter_row"); ?>

<?php include 'includes/core/footer.php'; ?>