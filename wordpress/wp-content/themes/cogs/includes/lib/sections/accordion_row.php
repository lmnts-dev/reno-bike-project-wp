<?php

/** 
 * Accordion Row
 * A row to accomodate Accordion items.
 * 
 * @author Peter Laxalt
 * @since 3/2020
 * @stylesheet accordion-row.scss
 * 
 */

/*************************************/
/** Variables */
/*************************************/

if (get_row_layout() == 'accordion_row' || $rowLayout == 'accordion_row') {

  $headline = get_sub_field('headline');
  $accordions = get_sub_field('accordions');
?>

  <section class="accordion-row <?php echo get_sub_field('layout'); ?> accordion-row-<?php echo $idx ?>">

    <?php if ( $headline ) { ?>
      <div class="section-header split">
        <h3 class="h1">
          <div class="squiggle-svg squiggle-orange"><?php require ( get_template_directory() . "/assets/images/squiggle.svg");  ?></div>
          <span>
            <?php echo $headline ?>
          </span>
        </h3>
      </div>
    <?php } ?>

    <div class="accordion-row-inner">

      <?php foreach ($accordions as $index=>$accordion) { ?>
        <div class="accordion">
          <div class="accordion-row">
            <input type="checkbox" id="item-<?php echo $index ?>">
            <label class="row-label" for="item-<?php echo $index ?>"><?php echo $accordion['label'] ?></label>
            <div class="row-content content">
            <?php echo $accordion['content'] ?>
            </div>
          </div>
        </div>
      <?php } ?>

    </div>
  </section>

<?php } ?>