<?php

/** 
 * Page Hero
 * 
 * @author Peter Laxalt
 * @since 2/2020
 */

/*************************************/

if (get_row_layout() == 'page_hero' || $rowLayout == 'page_hero') {
  if ( get_row_layout() ){
    $headline = get_sub_field('headline');
    $image = get_sub_field('cover_image');
    $layout = get_sub_field_object('layout')['value'];
  }
  else {
    $headline = get_the_title();
    $excerpt = get_the_excerpt();
    $image = get_the_post_thumbnail_url();
    $layout = '5';
  }
  
?>

  <section class="page-hero page-hero-<?php echo $idx ?>">
    <div class="page-hero-inner layout-<?php echo $layout ?>">
      <div class="col content">
        <?php $squiggle['color'] = 'primary' ?>
        <?php require ( get_template_directory() . "/assets/images/squiggle-horizontal.php");  ?>
        <h1>
          <?php echo $headline ?>
        </h1>
        <?php if ( get_sub_field('paragraph') ) { ?>
          <p>
            <?php echo get_sub_field('paragraph') ?>
          </p>
        <?php } ?>
        <?php if ( $excerpt ) { ?>
          <p>
            <?php echo $excerpt ?>
          </p>
        <?php } ?>
      </div>

      <div class="col image">
        <div class="image-wrapper">
          <img data-src="<?php echo $image; ?>" alt="<?php echo $headline; ?>" class="lazy" />
        </div>
      </div>
    </div>
  </section>

<?php } ?>
