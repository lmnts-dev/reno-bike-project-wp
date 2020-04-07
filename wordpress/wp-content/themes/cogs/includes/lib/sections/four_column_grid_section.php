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
  $gridItems = get_sub_field('grid_items');

?>
  <section class="four-column-grid-section <?php echo get_sub_field('layout') ?> four-column-grid-<?php echo $idx ?>">

    <?php if ( $headline ) { ?>
      <div class="section-header split">
        <h2>
        <div class="squiggle-svg squiggle-orange"><?php require ( get_template_directory() . "/assets/images/squiggle.svg");  ?></div>
          <span>
            <?php echo $headline ?>
          </span>
        </h2>
      </div>
    <?php } ?>

    <div class="four-column-grid-section-inner">
      <?php foreach ($gridItems as $item) { ?>
        <div class="grid-item">
          <div class="grid-item-img">
            <img data-src="<?php echo $item['image']['url'] ?>" alt="<?php echo $item['image']['alt'] ?>" class="lazy" />
          </div>
          <p><?php echo $item['label'] ?></p>
        </div>

      <?php } ?>
    </div>
  </section>


<?php } ?>