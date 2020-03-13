<?php

/** 
 * Event Listings
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
class EventListing
{
  public $title;
  public $slug;
  public $date;
  public $cover;
}

$eventOne = new EventListing();
$eventOne->title = 'Lorem Ipsum Solor Sit';
$eventOne->slug = '/';
$eventOne->date = 'February 10th, 2020';
$eventOne->cover = 'https://source.unsplash.com/1600x900/?bike';

$eventTwo = new EventListing();
$eventTwo->title = 'Lorem Ipsum Solor Sit';
$eventTwo->slug = '/';
$eventTwo->date = 'February 10th, 2020';
$eventTwo->cover = 'https://source.unsplash.com/1600x900/?smile';

$eventThree = new EventListing();
$eventThree->title = 'Lorem Ipsum Solor Sit';
$eventThree->slug = '/';
$eventThree->date = 'February 10th, 2020';
$eventThree->cover = 'https://source.unsplash.com/1600x900/?community';

$eventListings = array($eventOne, $eventTwo, $eventThree);


if (get_row_layout() == 'event_listings' || $rowLayout == 'event_listings') {
?>

  <section class="event-listings event-listings-<?php echo $idx ?>">

    <div class="section-header">
      <span class="icon bg-clr-mustard"></span>
      <h3>
        Meet up, hang out
      </h3>
      <p>
        Whether you are looking to volunteer or just want to come and enjoy the festivities, attending RBP events is a great way to get involved and meet other bike loving folks.
      </p>
    </div>

    <div class="event-listings-inner">

      <?php foreach ($eventListings as $listing) { ?>

        <div class="event-listing-card">
          <div class="event-listing-card-inner">
            <div class="cover">
              <img data-src="<?php echo $listing->cover ?>" alt="<?php echo $listing->title ?>" class="lazy" />
            </div>
            <div class="info">
              <span class="date">
                <?php echo $listing->date ?>
              </span>
              <span class="title">
                <?php echo $listing->title ?>
              </span>
            </div>
          </div>
        </div>

      <?php
        #/forEach 
      } ?>

      <div class="event-listing-card view-all">
        <div class="event-listing-card-inner">
          <span class="title">
            See all events
          </span>
        </div>
      </div>

    </div>
  </section>


<?php } ?>