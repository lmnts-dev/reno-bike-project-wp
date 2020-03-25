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

$args = array(
  'numberposts' => -1,
  'post_type'   => 'event'
);

$events = get_posts( $args );
//$headline = get_sub_field('headline');
//$description = get_sub_field('description');

if (get_row_layout() == 'event_row' || $rowLayout == 'event_row') {

?>
  <section class="event-row-listing padding-top-half">

    <div class="section-header">
      <h3>
        <div class="squiggle-svg squiggle-orange squiggle-short squiggle-centered squiggle-vertical"><?php require(get_template_directory() . "/assets/images/squiggle.svg");  ?></div>
        <span>Upcoming Events</span>
      </h3>
    </div>

    <?php foreach ($events as $event) { ?>
      <?php 
        $todaysDate = new DateTime(); //get todays date
        $date = DateTime::createFromFormat('Ymd', $event->start_date); //get start date
        $passedDate = $todaysDate > $date ? true : false;
        $date = $startDate = $date->format('F j');
        $endDate = DateTime::createFromFormat('Ymd', $event->end_date);
        $endDate = $endDate ? $endDate->format('F j') : false;
        $time = $event->time;
        $date = $endDate ?  $date . ' - ' . $endDate : $date;
        $date = $time ? $date . ', ' . $time : $date;
      ?>
      <?php if ( !$passedDate ) { ?>

        <a href="/" class="event-row <?php echo get_sub_field('layout') ?> event-row-<?php echo $idx ?>">
          <div class="event-row-inner">
            <div class="col content-col">
              <div class="content-col-inner">
                <p class="txt-clr-gunmetal"><?php echo $date ?></p>
                <h4>
                  <?php echo $event->post_title ?>
                </h4>
                <p>
                  <?php echo $event->post_excerpt ?>
                </p>

                <span class="btn btn-arrow">
                  Event Info
                </span>
              </div>
            </div>

            <div class="col img-col <?php echo $imgColClass ?>">
              <div class="event-row-img">
                <img data-src="<?php echo get_the_post_thumbnail_url( $event ) ?>" alt="<?php echo $event->post_title ?>" class="lazy" />
              </div>
            </div>
          </div>
        </a>
      <?php } ?>
    <?php } ?>
  </section>

<?php } ?>