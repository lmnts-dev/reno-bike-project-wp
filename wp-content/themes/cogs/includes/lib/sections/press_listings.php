<?php

/** 
 * Press Listings
 * 
 * @author Peter Laxalt
 * @since 2/2020
 * @stylesheet: press-listings.scss
 */

/*************************************/
/** Variables */
/*************************************/


$args = array(
  'numberposts' => -1,
  'post_type'   => 'press'
);

$pressArticles = get_posts( $args );
$headline = get_sub_field('headline');
$description = get_sub_field('description');

if (get_row_layout() == 'press_listings' || $rowLayout == 'press_listings') {
?>

  <section class="press-listings press-listings-<?php echo $idx ?>">
    <div class="press-listings-inner">
      <?php if ( $headline ) { ?>
        <div class="section-header split">
          <h3>
            <?php $squiggle['color'] = 'primary' ?>
            <?php require ( get_template_directory() . "/assets/images/squiggle-horizontal.php");  ?>
            <span><?php echo $headline ?></span>
          </h3>
          <?php if ( $description ) { ?>
            <p>
              <?php echo $description ?>
            </p>
          <?php } ?>
        </div>
      <?php } ?>

      <ul>
        <?php foreach ($pressArticles as $article) { ?>
          <li>
            <a href="<?php echo $article->link ?>" target="_blank" rel="noopener nofollow noreferrer" title="<?php echo $article->post_title ?>">
              <?php if ( $article->date ) : ?>
                <span class="tag date">
                  <?php $date = DateTime::createFromFormat('Ymd', $article->date); ?>
                  <?php echo $date->format('m.d.y'); ?>
                </span>
              <?php endif; ?>
              <span class="tag publisher">
                <?php echo $article->publisher ?>
              </span>
              <span class="title">
                <?php echo $article->post_title ?>
              </span>
            </a>
            <?php if ( get_the_post_thumbnail_url( $article ) ) : ?>
              <div class="img-wrapper">
                <div>
                  <img data-src="<?php echo get_the_post_thumbnail_url( $article ) ?>" alt="<?php echo $article->post_title ?>" class="lazy" />
                </div>
              </div>
            <?php endif; ?>
          </li>
        <?php } ?>
      </ul>

    </div>
  </section>


<?php } ?>