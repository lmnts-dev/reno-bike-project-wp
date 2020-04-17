<?php

/** 
 * Navigation
 * Site Navigation
 * 
 * @author Peter Laxalt
 * @since 2/2020
 */

/************************************/
/** Variables */
/************************************/

$cta = get_field('navigation_bar', 'option')['call_to_action'];
$ecommerce = get_field('ecommerce', 'option');
$logos = get_field('logos', 'option');

?>


<header>

  <?php /** Inter-site Navigation */
  ?>
  <div class="nav-inner">
    <div class="nav-col nav-col-1">
      <div class="nav-branding">
        <a href="/" class="nav-overlay-toggle">
          <img src="<?php echo $logos['logo_light'] ?>" alt="{{ shop.name }}">
        </a>
      </div>
      <nav class="nav-switch">
        <ul>
          <li class="active">
            <a href="/">
              Community
            </a>
          </li>
          <li class="inactive">
            <a href="<?php echo $ecommerce['shopify_url'] ?>">
              Shop
            </a>
          </li>
        </ul>
      </nav>
    </div>
    <?php /** /Inter-site Navigation  */
    ?>

    <?php /** Main Navigation */
    ?>
    <div class="nav-col nav-col-2">
      <nav class="main-nav">
        <?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>
      </nav>
    </div>
    <?php /** /Main Navigation  */
    ?>

    <?php /** CTA Navigation */
    ?>
    <div class="nav-col nav-col-3">
      <div class="nav-cta">
        <a href="<?php echo $cta['button_url'] ?>">
          <?php echo $cta['button_label'] ?>
        </a>
      </div>
    </div>

    <?php /** /CTA Navigation */
    ?>

    <?php /** Overlay Nav Toggle */
    ?>
    <div class="nav-col nav-col-4">
      <div class="grid nav-overlay-toggle" id="mobile-nav-icon">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>

    <?php /** /Overlay Nav Toggle */
    ?>

  </div>
</header>

<?php include get_template_directory() . '/includes/core/overlay_nav.php'; ?>