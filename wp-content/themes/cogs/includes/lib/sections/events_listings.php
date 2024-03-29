<?php

/** 
 * Events Listings
 * A row with image left / right, text left / right blocks where the text displays an 
 * event date, time, title, description and link, and the image displays the 
 * events featured image.
 * 
 * @author Alisha Garric
 * @since 3/2020
 * @stylesheet events-listings.scss
 * TODO: stlying got messed up after content linking
 */ 

/*************************************/
/** Variables */
/*************************************/

if (get_row_layout() == 'events_listings' || $listingsLayout == 'events_listings') {

$args = array(
  'numberposts' => -1,
  'post_type'   => 'event'
);

$events = get_posts( $args );
$headline = get_sub_field('headline');
$whichEvents = get_sub_field('which_events');
$tagFilters = get_sub_field('tag_filter');
$qualifyingEvents = [];

 //loop through events to create an array of past, upcoming or all events
 foreach ($events as $event) { 

    $eventObject = createEventObject( $event );

    // depending on which events the user wants to show, either show past, upcoming or all events 
    if ( (!$eventObject->passedDate && $whichEvents == 'upcoming') || ($eventObject->passedDate && $whichEvents == 'past') || $whichEvents == 'all' ) { 
      array_push( $qualifyingEvents, $eventObject );
    } 
  }

  //if there are tags to filter by, loop through events, check for tags and remove event if it doesn't have any tag
  if ( $tagFilters && count($tagFilters) > 0 ){

    foreach ($qualifyingEvents as $key=>$event) { 

      $containsTags = false;
      if ( $event->tags != null ) {
        foreach ( $tagFilters as $filter ){
          if ( in_array( implode($filter), $event->tags ) ){
            $containsTags = true;
          }
        }
      }

      if ( !$containsTags ){
        unset( $qualifyingEvents[$key] );
      }
    }
  } 

  //sort qualifying events array by date
  usort( $qualifyingEvents, 'sortDates');

  

  //if user wants to show past events make qualifying events array reverse-chronological limited to 50 events
  if ( $whichEvents == 'past' ){
    $qualifyingEvents = array_reverse( $qualifyingEvents );
    $qualifyingEvents = array_slice( $qualifyingEvents, 0, 50 );
  }

?>
  <section class="events-listings padding-top-half events-listings-<?php echo $idx ?>">

    <?php if ( $headline ) { ?>
      <div class="section-header">
        <h3>
          <?php $squiggle['color'] = 'orange' ?>
          <?php $squiggle['align'] = 'center' ?>
          <?php $squiggle['size'] = 'short' ?>
          <?php require ( get_template_directory() . "/assets/images/squiggle-vertical.php");  ?>
          <span><?php echo $headline ?></span>
        </h3>
      </div>
    <?php } ?>

    <?php if (count($qualifyingEvents) > 0 ){ ?>

      <?php foreach ($qualifyingEvents as $event ) { ?>
        <a href="<?php echo $event->link ?>" class="event-row">
          <div class="event-row-inner">
            <div class="col content-col">
              <div class="content-col-inner">
                <p class="txt-clr-gunmetal"><?php echo $event->displayDate ?></p>
                <h4>
                  <?php echo $event->title ?>
                </h4>
                <p>
                  <?php echo $event->excerpt ?>
                </p>

                <span class="btn btn-arrow">
                  Event Info
                </span>
              </div>
            </div>

            <div class="col img-col">
              <div class="event-row-img">
                <img data-src="<?php echo $event->image ?>" alt="<?php echo $event->title ?>" class="lazy" />
              </div>
            </div>
          </div>
        </a>
      <?php } ?>

    <?php } else { ?>

      <section class="txt-center">
          <div class="h4">Sorry, there's no events to show.</div>
      </section>
    <?php } ?>

  </section>

<?php } ?>




