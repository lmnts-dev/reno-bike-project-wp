<?php

/** 
 * Newsletter Row Component
 * 
 * @author Peter Laxalt
 * @since 2/2020
 * @stylesheet newsletter-row.scss
 * 
 */

if (get_row_layout() == 'newsletter_row' || $rowLayout == 'newsletter_row') {

  $fields = get_field('newsletter_row', 'options' );
  $headline = $fields['headline'];
  $description = $fields['description'];
  $submitDestination = $fields['submit_destination'];

?>

  <section class="newsletter-row newsletter-row-<?php echo $idx ?>">

    <div class="section-header split">
      <h3>
        <span><?php echo $headline ?></span>
      </h3>
      <?php if ( $description ){ ?>
        <?php echo $description ?>
      <?php } ?>
    </div>
    <div class="newsletter-row-inner">

    <form action="<?php echo $submitDestination ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate> 
        <div class="col col-fname">
          <div class="input-outer">
            <input placeholder="First Name" name="FNAME" id="mce-FNAME">
          </div>
        </div>
        <div class="col col-lname">
          <div class="input-outer">
            <input placeholder="Last Name" name="LNAME" id="mce-LNAME">
          </div>
        </div>
        <div class="col col-email">
          <div class="col">
            <div class="input-outer">
              <input placeholder="Enter your email" name="EMAIL" id="mce-EMAIL">
            </div>
          </div>
          <div class="col col-submit">
            <div class="input-outer">
              <button type="submit" class="btn btn-clr-black btn-arrow" name="subscribe" id="mc-embedded-subscribe">
                Submit
              </button>
            </div>
          </div>
        </div>
      </form>

    </div>
  </section>


<?php } ?>