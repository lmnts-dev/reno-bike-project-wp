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
      <h3 class="h1">
        <span class="squiggle"></span>
        <span>
          Reports & Financials
        </span>
      </h3>
    </div>
    <div class="accordion-row-inner">

      <?php for ($x = 0; $x < 5; $x++) { ?>
        <div class="accordion">
          <div class="accordion-row">
            <input type="checkbox" id="item-<?php echo $x ?>">
            <label class="row-label" for="item-<?php echo $x ?>">Accordion Row</label>
            <div class="row-content content">
              <ul>
                <li>
                  <a href="/">Thing <?php echo $x ?></a>
                </li>
                <li>
                  <a href="/">Thing <?php echo $x ?></a>
                </li>
                <li>
                  <a href="/">Thing <?php echo $x ?></a>
                </li>
                <li>
                  <a href="/">Thing <?php echo $x ?></a>
                </li>
                <li>
                  <a href="/">Thing <?php echo $x ?></a>
                </li>
                <li>
                  <a href="/">Thing <?php echo $x ?></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      <?php } ?>

    </div>
  </section>

<?php } ?>