<?php

/** 
 * Event Row
 * A row with image left / right, text left / right blocks where the text displays an 
 * event date, time, title, description and link, and the image displays the 
 * events featured image.
 * 
 * @author Alisha Garric
 * @since 3/2020
 * @stylesheet event-row.scss
 * TODO: stlying got messed up after content linking
 */ 

/*************************************/
/** Variables */
/*************************************/

if (get_row_layout() == 'event_row' || $rowLayout == 'event_row') {

$args = array(
  'numberposts' => -1,
  'post_type'   => 'event'
);

$events = get_posts( $args );
$headline = get_sub_field('headline');
$whichEvents = get_sub_field('which_events');
$qualifyingEvents = [];

 //loop through events to create an array of past, upcoming or all events
 foreach ($events as $event) { 
   
    $todaysDate = new DateTime('today', new DateTimeZone('America/Los_Angeles')); //get todays date at 12:00am
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

    // depending on which events the user wants to show, either show past, upcoming or all events 
    if ( (!$passedDate && $whichEvents == 'upcoming') || ($passedDate && $whichEvents == 'past') || $whichEvents == 'all' ) { 
      $eventObject = new stdClass();
      $eventObject->title = $event->post_title;
      $eventObject->excerpt = $event->post_excerpt;
      $eventObject->date = $startDate->format('Y-m-d H:i:s');
      $eventObject->link = get_post_permalink( $event );
      $eventObject->image = get_the_post_thumbnail_url( $event );
      $eventObject->displayDate = $dateString;

      array_push( $qualifyingEvents, $eventObject );
    } 
  }

  //sort qualifying events array by date
  usort( $qualifyingEvents, 'sortDates');

  //if user wants to show past events make qualifying events array reverse-chronological
  if ( $whichEvents == 'past' ){
    $qualifyingEvents = array_reverse( $qualifyingEvents );
  }

?>
  <section class="event-row-listing padding-top-half event-row-<?php echo $idx ?>">

    <?php if ( $headline ) { ?>
      <div class="section-header">
        <h3>
          <div class="squiggle-svg squiggle-orange squiggle-short squiggle-centered squiggle-vertical"><?php require(get_template_directory() . "/assets/images/squiggle.svg");  ?></div>
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




