<?php

/** 
 * Home Hero
 * 
 * @author Peter Laxalt
 * @since 2/2020
 */

/*************************************/
/** Variables */
/*************************************/

$introText = 'We’re built around the belief that the bicycle is the world’s greatest, most utilized mode of transportation and that every individual, regardless of age, gender, race, or class has a right to afford, maintain, and enjoy one.';

/**
 * @todo: Convert to ACF
 */
class Hours
{
  public $label;
  public $hours;
}

$monWedWeekends = new Hours();
$monWedWeekends->label = 'M-W, Sa';
$monWedWeekends->hours = '10am - 5pm';

$thursFri = new Hours();
$thursFri->label = 'Th-F';
$thursFri->hours = '10am - 6pm';

$sunday = new Hours();
$sunday->label = 'Su';
$sunday->hours = 'Closed';

$openHoursList = array($monWedWeekends, $thursFri, $sunday);

?>

<section class="home-hero">
  <div class="home-hero-inner">
    <div class="col-info">
      <div class="col-info-top">
        <h1>
          Reno Bike Project
        </h1>
        <p>
          <?php echo $introText ?>
        </p>
        <a href="/" class="btn btn-arrow">
          Check it out
        </a>

        <div class="col-info-hours">
          <span class="headline">
            Bike Shop Hours
          </span>
          <ul>
            <?php foreach ($openHoursList as $openHours) { ?>
              <li>
                <span class="label">
                  <?php echo $openHours->label ?>:
                </span>
                <span class="hours">
                  <?php echo $openHours->hours ?>
                </span>
              </li>
            <?php
              #/forEach 
            } ?>
          </ul>
        </div>

        <a href="/" class="btn btn-border-black btn-newsletter">
          Join Our Newsletter
        </a>

        <div class="bike-wheel">
          <?php include get_template_directory() . '/includes/lib/svg/bike-wheel.php' ?>
        </div>
      </div>
    </div>
    <div class="col-main">
      <?php include get_template_directory() . '/includes/lib/elements/outlined-list.php' ?>
    </div>
  </div>
</section>