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

if (get_row_layout() == 'icon_block') {
   // $reverseClass = '';

  //  if ( get_sub_field('reverse') ) {
  //      $reverseClass = 'reverse';
  //  }


?>

  <section class="icon-block <?php echo get_sub_field('layout');?> icon-block-<?php echo $idx ?>">
    <div class="icon-block-inner">
        <div>h</div>
        <div>j</div>
        <div>k</div>
        <div>l</div>
        <div>m</div>
        <div>d</div>
      <!--<div class="col content-col">
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
          <div class="icon-block-img">
            <img data-src="https://source.unsplash.com/1600x900/?event" alt="Tour de Pizza: New Member Drive" class="lazy" />
          </div>
      </div>
    </div>-->
  </section>

<?php } ?>