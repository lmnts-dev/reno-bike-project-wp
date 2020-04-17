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

$locationsList = get_field('locations', 'options');
$navItems = wp_get_nav_menu_items('Legal');
$socials = get_field('social_media', 'options');
$info = get_field('contact_information', 'options');
?>

</div> 

<?php #/.wrapper ?>

</main>
<footer>
  <div class="footer-inner">
    <div class="footer-col">

      <div class="copyright">
        &copy; <?php echo date("Y"); ?> Reno Bike Project
      </div>

      <div class="legal-stuff">
        <?php foreach ( $navItems as $item ){ ?>
          <a href="<?php echo $item->url ?>">
            <?php echo $item->title ?>
          </a>
        <?php } ?>
      </div>

      <div class="social">
        <ul>
          <?php foreach ($socials as $social ) { ?>
              <li>
                <a href="<?php echo $social['account_url'] ?>" title="Find us on <?php echo $social['platform'] ?>" target="_blank">
                  <span class="ico fab fa-<?php echo $social['icon_id'] ?>"></span>
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
        <a href="tel:<?php echo $info['phone_number'] ?>" target="_blank"><?php echo $info['phone_number'] ?></a>
      </div>
      <div class="footer-info-row">
        <a href="mailto:<?php echo $info['email_address'] ?>" target="_blank"><?php echo $info['email_address'] ?></a>
      </div>
    </div>
    <div class="footer-col">
      <div class="footer-header">
        Find Us
      </div>
      <?php foreach ($locationsList as $location) { ?>
        <div class="footer-info-row">
          <span><?php echo $location['location_name']?>:</span>
          <a href="<?php echo $location['google_maps_url'] ?>" title="<?php echo $location['location_name'] ?>" target="_blank"><?php echo $location['address'] ?></a>
        </div>
      <?php
        #/forEach
      } ?>
    </div>
    <div class="footer-col">
      <div class="footer-search">
        <span class="ico fas fa-search"></span>
        <?php get_search_form(); ?>
      </div>
    </div>
  </div>
</footer>

<?php
include get_template_directory() . '/includes/lib/sections/newsletter_overlay.php';
?>

<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
<script src="https://unpkg.com/flickity-fade@1/flickity-fade.js"></script>
<script src="https://cdn.jsdelivr.net/npm/intersection-observer@0.7.0/intersection-observer.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@12.5.1/dist/lazyload.min.js"></script>
<script src="https://unpkg.com/@barba/core"></script>

<?php wp_footer(); ?>

</body>

</html>