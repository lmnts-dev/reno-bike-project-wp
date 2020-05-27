<?php

/** 
 * Icon Block
 * 2 rows of 3 blocks containing an icon, header text and paragraph text
 * 
 * @author Alisha Garric
 * @since 3/2020
 * @stylesheet icon-block.scss
 * 
 */

/*************************************/
/** Variables */
/*************************************/

if (get_row_layout() == 'icon_block' || $rowLayout == 'icon_block') {

  $blocks = get_sub_field('block');
  $headline = get_sub_field('headline');
?>

  <section class="icon-block <?php echo get_sub_field('layout'); ?> icon-block-<?php echo $idx ?>">

    <?php if ( $headline ){ ?>
      <div class="section-header">
      <?php $squiggle['color'] = 'orange' ?>
      <?php $squiggle['align'] = 'center' ?>
      <?php $squiggle['size'] = 'short' ?>
      <?php require ( get_template_directory() . "/assets/images/squiggle-vertical.php");  ?>
        <h3>
          <span>
            <?php echo $headline ?>
          </span>
        </h3>
      </div>
    <?php } ?>

    <div class="icon-block-inner">
      <?php foreach ($blocks as $block) { ?>
        <div class="icon-block">
          <span class='icon fas fa-<?php echo $block['icon_id'] ?> txt-clr-<?php echo $block['icon_color'] ?>'></span>
          <h6 class='h5'><?php echo $block['header_text'] ?></h6>
          <p><?php echo $block['paragraph_text'] ?></p>
        </div>
      <?php } ?>
    </div>
  </section>

<?php } ?>