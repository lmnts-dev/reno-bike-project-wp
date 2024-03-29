<?php

/** 
 * Four Column Grid Section
 * Rows split into four columns, with each column having an image and a label beneath it
 * 
 * @author Alisha Garric
 * @since 3/2020
 */

/*************************************/
/** Variables */
/*************************************/


if (get_row_layout() == 'four_column_grid_section' || $rowLayout == 'four_column_grid_section') {

  $headline = get_sub_field('headline');
  $headlineSize = get_sub_field('headline_size');
  $gridItems = get_sub_field('grid_items');
  $imageType = get_sub_field('image_type');

?>
  <section class="four-column-grid-section <?php echo get_sub_field('layout') ?> four-column-grid-<?php echo $idx ?>">

    <?php if ( $headline ) { ?>
      <div class="section-header split">
        <h2>
          <?php $squiggle['color'] = 'orange' ?>
          <?php require ( get_template_directory() . "/assets/images/squiggle-horizontal.php");  ?>
          <span class="<?php echo $headlineSize ?>">
            <?php echo $headline ?>
          </span>
        </h2>
      </div>
    <?php } ?>

    <div class="four-column-grid-section-inner">
      <?php foreach ($gridItems as $item) { ?>
        <div class="grid-item">
          <div class="grid-item-img image-type-<?php echo $imageType ?>">
            <img data-src="<?php echo $item['image']['url'] ?>" alt="<?php echo $item['image']['alt'] ?>" class="lazy" />
          </div>
          <p><?php echo $item['label'] ?></p>
        </div>

      <?php } ?>
    </div>
  </section>


<?php } ?>