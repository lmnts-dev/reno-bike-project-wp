<?php

/** 
 * Website Footer
 * 
 * @author Peter Laxalt
 * @since 2/2020
 */

/*************************************/
/** Variables */
/*************************************/

/**
 * @todo Convert to ACF
 */

class Location
{
  public $name;
  public $address;
  public $googleMapsUrl;
}

/**
 * Location Data
 */
$flagShip = new Location();
$flagShip->name = 'Flagship';
$flagShip->address = '216 E Grove St. Reno, NV 89502';
$flagShip->googleMapsUrl = '/';

$auxillary = new Location();
$auxillary->name = 'Auxillary';
$auxillary->address = '635 E 4th St. Reno, NV 89512';
$auxillary->googleMapsUrl = '/';

$locationsList = array($flagShip, $auxillary);

/**
 * Website Data
 */
$phoneNumber = '+1 775 323 4488';
$emailAddress = 'info@renobikeproject.com';
$facebook = 'https://www.facebook.com/renobikeproject';
$instagram = 'https://www.instagram.com/renobikeproject/';
$twitter = 'https://twitter.com/renobikeproject';

?>

</div> <?php #/.wrapper 
        ?>
</main>
<footer>
  <div class="footer-inner">
    <div class="footer-col">
      <div class="copyright">
        &copy; <?php echo date("Y"); ?> Reno Bike Project
      </div>
      <div class="legal-stuff">
        <a href="/">
          Privacy
        </a>
        <a href="/">
          Legal
        </a>
      </div>
      <div class="social">
        <ul>
          <?php if ($twitter != '') { ?>
            <li>
              <a href="<?php echo $twitter ?>" title="Find us on Twitter" target="_blank">
                <span class="ico">T</span>
              </a>
            </li>
          <?php } ?>

          <?php if ($instagram != '') { ?>
            <li>
              <a href="<?php echo $instagram ?>" title="Find us on Instagram" target="_blank">
                <span class="ico">I</span>
              </a>
            </li>
          <?php } ?>

          <?php if ($facebook != '') { ?>
            <li>
              <a href="<?php echo $facebook ?>" title="Find us on Facebook" target="_blank">
                <span class="ico">F</span>
              </a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
    <div class="footer-col">
      <div class="footer-header">
        Contact Us
      </div>
      <div class="footer-info-row">
        <a href="tel:<?php echo $phoneNumber ?>" target="_blank"><?php echo $phoneNumber ?></a>
      </div>
      <div class="footer-info-row">
        <a href="mailto:<?php echo $emailAddress ?>" target="_blank"><?php echo $emailAddress ?></a>
      </div>
    </div>
    <div class="footer-col">
      <div class="footer-header">
        Find Us
      </div>
      <?php foreach ($locationsList as $location) { ?>
        <div class="footer-info-row">
          <span><?php echo $location->name ?>:</span>
          <a href="<?php echo $location->googleMapsUrl ?>" title="<?php echo $location->name ?>" target="_blank"><?php echo $location->address ?></a>
        </div>
      <?php
        #/forEach
      } ?>
    </div>
    <div class="footer-col">
      <div class="footer-search">
        <span class="ico"></span>
        <form>
          <input placeholder="Search">
        </form>
      </div>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/intersection-observer@0.7.0/intersection-observer.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@12.5.1/dist/lazyload.min.js"></script>
<script src="https://unpkg.com/@barba/core"></script>
<?php wp_footer(); ?>

</body>

</html>