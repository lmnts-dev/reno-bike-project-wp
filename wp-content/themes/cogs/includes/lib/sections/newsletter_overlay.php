<?php

/** 
 * Newsletter Overlay
 * 
 * @author Peter Laxalt
 * @since 2/2020
 */

/*************************************/

$fields = get_field('newsletter_row', 'options' );
$headline = $fields['headline'];
$description = $fields['description'];
$submitDestination = $fields['submit_destination'];

?>

<div class="newsletter-overlay">
  <div class="btn-close">
    <span class="btn-newsletter"></span>
  </div>

  <div class="newsletter-overlay-inner">
    <div class="top">
      <div class="col">
        <h3>
          <?php $squiggle['color'] = 'primary' ?>
          <?php require ( get_template_directory() . "/assets/images/squiggle-horizontal.php");  ?>
          <span><?php echo $headline ?></span>
        </h3>
      </div>
      <div class="col">
        <?php if ( $description ){ ?>
          <?php echo $description ?>
        <?php } ?>
      </div>
    </div>
    <div class="bottom">
      <form action="<?php echo $submitDestination ?>" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
        <div class="row">
          <div class="col">
            <div class="input-outer">
              <input placeholder="First Name" name="FNAME" id="mce-FNAME">
            </div>
          </div>
          <div class="col">
            <div class="input-outer">
              <input placeholder="Last Name" name="LNAME" id="mce-LNAME">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col col-full">
            <div class="input-outer">
              <input placeholder="Enter your email" name="EMAIL" id="mce-EMAIL">
            </div>
          </div>
        </div>

        <div class="row">
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
  </div>
</div>