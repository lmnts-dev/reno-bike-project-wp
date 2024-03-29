<?php

/** 
 * Events Row
 * 
 * @author Peter Laxalt and Alisha Garric
 * @since 2/2020
 */

/*************************************/
/** Variables */
/*************************************/

if (get_row_layout() == 'events_row' || $rowLayout == 'events_row') {

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

    $eventObject = createEventObject( $event );

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

  // if we have less than 3 upcoming events add past events until we have three
  if ( count( $qualifyingEvents ) < 3 ){

    usort( $pastEvents, 'sortDates');
    while ( count( $qualifyingEvents ) < 3){
      $event = array_pop($pastEvents);
      array_push( $qualifyingEvents, $event );
    }
  }

?>

  <section class="events-row padding-top-half events-row-<?php echo $idx ?>">

    <?php if ( $headline ) { ?>
      <div class="section-header">
      <?php if ( get_sub_field('icon_id') ) { ?><span class='icon fas fa-<?php echo get_sub_field('icon_id') ?> txt-clr-<?php echo get_sub_field('icon_color') ?>'></span><?php } ?>
        <h3>
          <?php echo $headline ?>
        </h3>
        <?php if ( $description ) { ?>
          <p>
            <?php echo $description ?>
          </p>
        <?php } ?>
      </div>
    <?php } ?>

    <div class="events-row-inner">

      <?php foreach ($qualifyingEvents as $index=>$event) { ?>
        <?php if ( $index == 3 ) { break; } ?>

        <a href="<?php echo $event->link?>" class="events-row-card">
          <div class="events-row-card-inner">
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

      <a href="<?php echo $viewAllLink ?>" class="events-row-card view-all">
        <div class="events-row-card-inner">
          <span class="title">
            See all events
          </span>
        </div>
      </a>

    </div>
  </section>


<?php } ?>