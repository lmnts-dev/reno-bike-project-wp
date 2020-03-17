<?php

/** 
 * Newsletter Overlay
 * 
 * @author Peter Laxalt
 * @since 2/2020
 */

/*************************************/

?>

<div class="newsletter-overlay">
  <div class="btn-close">
    <span class="btn-newsletter"></span>
  </div>

  <div class="newsletter-overlay-inner">
    <div class="top">
      <div class="col">
        <h3>
        <div class="squiggle-svg squiggle-pink"><?php require ( get_template_directory() . "/assets/images/squiggle.svg");  ?></div>
          <span>Subscribe to our Newsletter</span>
        </h3>
      </div>
      <div class="col">
        <p>
          Please enter your information below to sign up for our mailing list. We’ll keep you in the loop on the latest programs, news, events, and activities we got going on.
        </p>
      </div>
    </div>
    <div class="bottom">
      <form>
        <div class="row">
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
        </div>

        <div class="row">
          <div class="col col-full">
            <div class="input-outer">
              <input placeholder="Enter your email address">
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col col-submit">
            <div class="input-outer">
              <button class="btn btn-clr-black btn-arrow">
                Submit
              </button>
            </div>
          </div>
        </div>

      </form>
    </div>
  </div>
</div>