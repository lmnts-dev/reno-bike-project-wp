<?php

/** 
 * Grid Section Component
 * 
 * @author Peter Laxalt and Alisha Garric
 * @since 2/2020
 */

/*************************************/
/** Variables */
/*************************************/


if (get_row_layout() == 'grid_section' || $rowLayout == 'grid_section') {
  $headline = get_sub_field('headline');
  $description = get_sub_field('description');
  $gridBlocks = get_sub_field('grid_items');
?>

  <section class="grid-section padding-top-half grid-section-<?php echo $idx ?>">

    <?php if ( $headline ) { ?>
      <div class="section-header">
        <?php if ( get_sub_field('icon_id') ) { ?><span class='icon fas fa-<?php echo get_sub_field('icon_id') ?> txt-clr-<?php echo get_sub_field('icon_color') ?>'></span><?php } ?>
        <h3>
          <?php echo $headline ?>
        </h3>
        <?php if ( $description ) { ?>
          <p>
          <?php echo $description ?>
          </p>
        <?php } ?>
      </div>
    <?php } ?>

    <div class="grid-section-inner">

      <?php foreach ($gridBlocks as $listing) { ?>

        <div class="grid-card">
          <div class="grid-card-inner">
            <div class="cover">
              <img data-src="<?php echo $listing['image'] ?>" alt="<?php echo $listing['label'] ?>" class="lazy" />
            </div>
            <div class="info">
              <span class="title">
                <?php echo $listing['label'] ?>
              </span>
              <p>
                <?php echo $listing['description'] ?>
              </p>
            </div>
          </div>
        </div>

      <?php
        #/forEach 
      } ?>

    </div>
  </section>


<?php } ?>