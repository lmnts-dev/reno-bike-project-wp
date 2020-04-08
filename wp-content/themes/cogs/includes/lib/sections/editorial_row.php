<?php

/** 
 * Editorial Row
 * Your standard image left / right, text left / right block.
 * 
 * @author Peter Laxalt
 * @since 2/2020
 */

/*************************************/
/** Variables */
/*************************************/

if (get_row_layout() == 'editorial_row' || $rowLayout == 'editorial_row') {
  $imgColClass = '';

  if (get_sub_field('image_1') && get_sub_field('image_2')) {
    $imgColClass = 'img-col-alt';
  }

?>

  <section class="editorial-row <?php echo get_sub_field('layout'); ?> editorial-row-<?php echo $idx ?>">
    <div class="editorial-row-inner">
      <div class="col content-col">
        <div class="content-col-inner">
          <?php $squiggle['color'] = 'yellow' ?>
          <?php require ( get_template_directory() . "/assets/images/squiggle-horizontal.php");  ?>
          <h4>
            <?php echo get_sub_field('headline'); ?>
          </h4>
          <p>
            <?php echo get_sub_field('paragraph'); ?>
          </p>
          <?php if (get_sub_field('call_to_action_url') && get_sub_field('call_to_action_label')) { ?>
            <a href="<?php echo get_sub_field('call_to_action_url') ?>" class="btn btn-arrow" />
            <?php echo get_sub_field('call_to_action_label') ?>
            </a>
          <?php } ?>
        </div>
      </div>

      <div class="col img-col <?php echo $imgColClass ?>">
        <?php if (get_sub_field('image_1')) { ?>
          <div class="editorial-row-img">
            <img data-src="<?php echo get_sub_field('image_1') ?>" alt="<?php echo get_sub_field('headline'); ?>" class="lazy" />
          </div>
        <?php } ?>
        <?php if (get_sub_field('image_2')) { ?>
          <div class="editorial-row-img">
            <img data-src="<?php echo get_sub_field('image_2') ?>" alt="<?php echo get_sub_field('headline'); ?>" class="lazy" />
          </div>
        <?php } ?>
      </div>
    </div>
  </section>

<?php } ?>