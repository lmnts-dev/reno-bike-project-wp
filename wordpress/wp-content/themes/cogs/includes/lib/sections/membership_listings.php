<?php

/** 
 * Membership Listings
 * 
 * @author Peter Laxalt
 * @since 2/2020
 */

/*************************************/
/** Variables */
/*************************************/

/**
 * @todo: Link to Wordpress Article Loop
 */
class MembershipListing
{
  public $name;
  public $description;
  public $price;
  public $icon;
  public $benefits;
  public $joinLink;
  public $giftLink;
}

$exampleListing = new MembershipListing();
$exampleListing->name = 'Example';
$exampleListing->description = 'Dues from this tier will provide materials to refurbish 5 kid’s bikes through our Free Wheels for Kids program.';
$exampleListing->price = '$50/yr';
$exampleListing->icon = 'sample';
$exampleListing->benefits = '';
$exampleListing->joinLink = '/';
$exampleListing->giftLink = '/';

$membershipListings = array($exampleListing, $exampleListing, $exampleListing, $exampleListing, $exampleListing, $exampleListing, $exampleListing);

if (get_row_layout() == 'membership_listings' || $rowLayout == 'membership_listings') {
?>

  <section class="membership-listings membership-listings-<?php echo $idx ?>">

    <div class="section-header">
      <span class="squiggle"></span>
      <h2>
        Memberships
      </h2>
    </div>

    <div class="membership-listings-inner">

      <?php foreach ($membershipListings as $membership) { ?>

        <div class="membership-listing-card">
          <div class="membership-listing-card-inner">
            <div class="card-top">
              <div class="title">
                <span class="icon <?php echo $membership->icon ?>"></span>
                <span class="name"><?php echo $membership->name ?></span>
              </div>
              <p>
                <?php echo $membership->description ?>
              </p>
              <span class="price">
                <?php echo $membership->price ?>
              </span>
            </div>
            <div class="card-bottom">
              <span class="caption">
                This Tier Will Receive
              </span>

              <div class="content">
                <ul>
                  <li>
                    Benefit
                  </li>
                  <li>
                    Benefit
                  </li>
                  <li>
                    Benefit
                  </li>
                  <li>
                    Benefit
                  </li>
                  <li>
                    Benefit
                  </li>
                  <li>
                    Benefit
                  </li>
                  <li>
                    Benefit
                  </li>
                  <li>
                    Benefit
                  </li>
                </ul>
                <p>
                  Dues from this membership tier is also renewable at half price with 40 volunteer hours in the shop or at events.
                </p>
              </div>

              <div class="actions">
                <a href="<?php echo $membership->joinLink ?>" class="btn btn-clr-black btn-arrow">
                  Join
                </a>
                <a href="<?php echo $membership->giftLink ?>" class="btn btn-border-white btn-arrow">
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