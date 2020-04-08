<?php

/** 
 * Event Listings
 * 
 * @author Peter Laxalt and Alisha Garric
 * @since 2/2020
 */

//TODO: Icon

/*************************************/
/** Variables */
/*************************************/

if (get_row_layout() == 'event_listings' || $rowLayout == 'event_listings') {

  $args = array(
    'numberposts' => -1,
    'post_type'   => 'event'
  );

  $events = get_posts( $args );
  $headline = get_sub_field('headline');
  $description = get_sub_field('description');
  $viewAllLink = get_sub_field('view_all_link');
  $pastEvents = [];
  $upcomingEvents = [];
  $qualifyingEvents = [];

 //loop through events to create an array of upcoming events and past events
 foreach ($events as $event) { 
   
    $todaysDate = new DateTime('today', new DateTimeZone('America/Los_Angeles')); 
    $startDate = DateTime::createFromFormat('Ymd', $event->start_date); 
    $startDate = $startDate->modify('midnight'); //get start date
    $passedDate = ($todaysDate->format('Y-m-d') <= $startDate->format('Y-m-d')) ? false : true;
    $formattedStartDate = $startDate->format('F j');
    $endDate = DateTime::createFromFormat('Ymd', $event->end_date);
    $formattedEndDate = $endDate ? $endDate->format('F j') : false;
    $time = $event->time;
    $dateString = $endDate ? $formattedStartDate . ' - ' . $formattedEndDate : $formattedStartDate;
    $dateString = $time ? $dateString . ', ' . $time : $dateString;


    // create event object
    $eventObject = new stdClass();
    $eventObject->title = $event->post_title;
    $eventObject->excerpt = $event->post_excerpt;
    $eventObject->date = $startDate->format('Y-m-d H:i:s');
    $eventObject->link = get_post_permalink( $event ); 
    $eventObject->image = get_the_post_thumbnail_url( $event );
    $eventObject->displayDate = $dateString;

    // if event hasn't passed, add to upcoming events array else to past events
    if ( !$passedDate ) { 
      array_push( $upcomingEvents, $eventObject );
    } 
    else {
      array_push( $pastEvents, $eventObject );
    }
  }
  
  //sort chronologically
  usort( $upcomingEvents, 'sortDates');
  $qualifyingEvents = $upcomingEvents;

  echo count( $qualifyingEvents );

  // if we have less than 3 upcoming events and past events until we have three
  if ( count( $qualifyingEvents ) < 3 ){

    usort( $pastEvents, 'sortDates');
    while ( count( $qualifyingEvents ) < 3){
      $event = array_pop($pastEvents);
      array_push( $qualifyingEvents, $event );
    }
  }

?>

  <section class="event-listings padding-top-half event-listings-<?php echo $idx ?>">

    <?php if ( $headline ) { ?>
      <div class="section-header">
        <span class="icon bg-clr-mustard"></span>
        <h3>
          <?php echo $headline ?>
        </h3>
        <p>
        <?php echo $description ?>
        </p>
      </div>
    <?php } ?>

    <div class="event-listings-inner">

      <?php foreach ($qualifyingEvents as $index=>$event) { ?>
        <?php if ( $index == 3 ) { break; } ?>

        <a href="<?php echo $event->link?>" class="event-listing-card">
          <div class="event-listing-card-inner">
            <div class="cover">
              <img data-src="<?php echo $event->image ?>" alt="<?php echo $event->title ?>" class="lazy" />
            </div>
            <div class="info">
              <span class="date">
                <?php echo $event->displayDate ?>
              </span>
              <span class="title">
                <?php echo $event->title ?>
              </span>
            </div>
          </div>
        </a>

      <?php } ?>

      <a href="<?php echo $viewAllLink ?>" class="event-listing-card view-all">
        <div class="event-listing-card-inner">
          <span class="title">
            See all events
          </span>
        </div>
      </a>

    </div>
  </section>


<?php } ?>