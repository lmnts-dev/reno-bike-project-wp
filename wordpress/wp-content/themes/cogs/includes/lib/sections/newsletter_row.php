<?php

/** 
 * Newsletter Row Component
 * 
 * @author Peter Laxalt
 * @since 2/2020
 */

/*************************************/
/** Variables */
/*************************************/

/**
 * @todo: Link to ACF
 */


if (get_row_layout() == 'newsletter_row') {
?>

  <section class="newsletter-row newsletter-row-<?php echo $idx ?>">

    <div class="section-header split">
      <h3>
        <span>Stay Updated with News from Reno Bike Project</span>
      </h3>
      <p>
        Please enter your information below to sign up for our mailing list. We’ll keep you in the loop on the latest programs, news, events, and activities we got going on.
      </p>
    </div>
    <div class="newsletter-row-inner">

      <form>
        <div class="col">
          <div class="input-outer">
            <input placeholder="First Name">
          </div>
        </div>
        <div class="col">
          <div class="input-outer">
            <input placeholder="Last Name">
          </div>
        </div>
        <div class="col col-email">
          <div class="col">
            <div class="input-outer">
              <input placeholder="Enter your email">
            </div>
          </div>
          <div class="col">
            <div class="input-outer">
              <button class="btn btn-clr-black btn-arrow">
                Submit
              </button>
            </div>
          </div>
        </div>
      </form>

    </div>
  </section>


<?php } ?>