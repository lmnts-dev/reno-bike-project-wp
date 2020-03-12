<?php

/** 
 * Event Row
 * A row with image left / right, text left / right blocks where the text displays an 
 * event date, time, title, description and link, and the image displays the 
 * events featured image.
 * 
 * @author Peter Laxalt & Alisha Garric
 * @since 3/2020
 */

/*************************************/
/** Variables */
/*************************************/

if (get_row_layout() == 'event_row') {
    $reverseClass = '';

    if ( get_sub_field('reverse') ) {
        $reverseClass = 'reverse';
    }


?>

  <section class="event-row <?php echo get_sub_field('layout') . ' ' . $reverseClass; ?> event-row-<?php echo $idx ?>">
    <div class="event-row-inner">
      <div class="col content-col">
        <div class="content-col-inner">
            <p class="txt-clr-gunmetal">January 25, 11:30am - 3pm</p>
            <h4>
            Tour de Pizza: New Member Drive
            </h4>
            <p>
            We’ll grow our Commuter Membership partners, so we can continue to make sure everyone in Reno and Sparks has access to bikes. At the end of each leg of the ride, there will be pizza!
            </p>

            <a href="/" class="btn btn-arrow" />
                Event Info
            </a>
        </div>
      </div>

      <div class="col img-col <?php echo $imgColClass ?>">
          <div class="event-row-img">
            <img data-src="https://source.unsplash.com/1600x900/?event" alt="Tour de Pizza: New Member Drive" class="lazy" />
          </div>
      </div>
    </div>
  </section>

<?php } ?>