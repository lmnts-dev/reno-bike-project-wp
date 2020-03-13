<?php

/** 
 * Default Article Template
 * 
 * @author Peter Laxalt
 * @since 2/2020
 */

/*************************************/

?>

<?php include 'includes/core/header.php'; ?>

<?php include 'includes/lib/sections/page_hero.php'; ?>

<?php get_template_part('content', get_post_format()); ?>

<?php
// Start the loop.
while (have_posts()) : the_post();
?>

  <?php
  // Social URLS
  $facebookShareUrl = "https://www.facebook.com/sharer.php?u=" . get_the_permalink();
  $twitterShareUrl = "https://twitter.com/intent/tweet?url=" . get_the_permalink() . "&text=" . get_the_title() . "&via=renobikeproject&hashtags=bikes,diy,community,reno,nevada" . get_the_tags();

  // Deprecated
  // $linkedInShareUrl = "https://www.linkedin.com/shareArticle?mini=true&url=" . get_the_permalink() . "&title=" . get_the_title() . "&summary=" . get_the_excerpt();
  ?>

  <article itemscope itemtype="http://schema.org/Article">
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
        <div class="details">
          <span class="date" itemprop="datePublished">
            <?php the_date(); ?>
          </span>
          <span class="author" itemprop="author">
            By <?php the_author(); ?>
          </span>

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
      </div>

      <?php if (has_post_thumbnail()) { ?>
        <div class="featured-image">
          <div>
            <img itemprop="image" data-src="<?php echo get_the_post_thumbnail_url(); ?>" class="lazy" alt="<?php echo get_the_title(); ?>" />
          </div>
        </div>
      <?php } ?>

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

<?php include 'includes/lib/sections/news_listings.php'; ?>
<?php addComponent("newsletter_row"); ?>

<?php include 'includes/core/footer.php'; ?>