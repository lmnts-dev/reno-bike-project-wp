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
?>

  <section class="accordion-row <?php echo get_sub_field('layout'); ?> accordion-row-<?php echo $idx ?>">
    <div class="section-header split">
      <h3>
        <span>
          Reports & Financials
        </span>
      </h3>
    </div>
    <div class="accordion-row-inner">

    </div>
  </section>

<?php } ?>