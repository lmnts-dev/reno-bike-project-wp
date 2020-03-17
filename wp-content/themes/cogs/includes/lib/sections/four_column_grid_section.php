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

class FourColumnGridItem
{
  public $label;
  public $image;
}

$gridItem = new FourColumnGridItem();
$gridItem->label = 'David Fiore';

//TODO: hookup data to wordpress
$gridItems = array($gridItem, $gridItem, $gridItem, $gridItem, $gridItem, $gridItem, $gridItem, $gridItem);

if (get_row_layout() == 'four_column_grid_section' || $rowLayout == 'four_column_grid_section') {

?>
  <section class="four-column-grid-section <?php echo get_sub_field('layout') ?> four-column-grid-<?php echo $idx ?>">

    <div class="section-header split">
      <h2>
      <div class="squiggle-svg squiggle-orange"><?php require ( get_template_directory() . "/assets/images/squiggle.svg");  ?></div>

        <span>
          Board of Directors
        </span>
      </h2>
    </div>

    <div class="four-column-grid-section-inner">
      <?php foreach ($gridItems as $item) { ?>
        <div class="grid-item">
          <div class="grid-item-img">
            <img data-src="https://source.unsplash.com/1600x900/?event" alt="Tour de Pizza: New Member Drive" class="lazy" />
          </div>
          <p><?php echo $item->label ?></p>
        </div>

      <?php } ?>
    </div>
  </section>


<?php } ?>