<?php

/** 
 * Membership Listings
 * 
 * @author Peter Laxalt and Alisha Garric
 * @since 2/2020
 */

/*************************************/
/** Variables */
/*************************************/


if (get_row_layout() == 'membership_listings' || $rowLayout == 'membership_listings') {

  $args = array(
    'numberposts' => -1,
    'post_type'   => 'membership'
  );

  $membershipListings = get_posts( $args );
  $headline = get_sub_field('headline');

?>

  <section class="membership-listings padding-top-half membership-listings-<?php echo $idx ?>">

    <?php if ( $headline ) { ?>
      <div class="section-header">
        <?php $squiggle['color'] = 'primary' ?>
        <?php $squiggle['align'] = 'center' ?>
        <?php $squiggle['size'] = 'short' ?>
        <?php require ( get_template_directory() . "/assets/images/squiggle-vertical.php");  ?>
        <h2>
          <?php echo $headline ?>
        </h2>
      </div>
    <?php } ?>

    <div class="membership-listings-inner">

      <?php foreach ($membershipListings as $membership) { ?>
        <?php $includes = get_field( 'includes', $membership->ID); ?>

        <div class="membership-listing-card">
          <div class="membership-listing-card-inner">
            <div class="card-top">
              <div class="title">
                <span class='icon fas fa-<?php echo get_field('icon_id', $membership->ID ) ?> txt-clr-primary'></span>
                <span class="name"><?php echo get_the_title( $membership ) ?></span>
              </div>
              <p>
                <?php echo $membership->description ?>
              </p>
              <span class="price">
                <?php echo $membership->price ?>
              </span>
            </div>
            <div class="card-bottom">
              <?php if ( count($includes) > 0 ) { ?>
                <span class="caption">
                  This Tier Will Receive
                </span>
              <?php } ?>

              <div class="content">
                <?php if ( count($includes) > 0 ) { ?>
                  <ul>
                    <?php foreach ($includes as $include) { ?>
                      <li>
                        <?php echo $include['item'] ?>
                      </li>
                    <?php } ?>
                  </ul>
                <?php } ?>
                <?php if ( $membership->extra_information ) { ?>
                  <p>
                      <?php echo $membership->extra_information ?>
                  </p>
                <?php } ?>
              </div>

              <div class="actions">
                <a href="<?php echo $membership->join_link['url'] ?>" class="btn btn-clr-black btn-arrow">
                  Join
                </a>
                <a href="<?php echo $membership->gift_link['url'] ?>" class="btn btn-border-white btn-arrow">
                  Gift
                </a>
              </div>

            </div>
          </div>
        </div>

      <?php
        #/forEach 
      } ?>

    </div>
  </section>


<?php } ?>