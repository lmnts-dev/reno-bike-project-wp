<?php
/* Template Name: 404 */

/** 
 * 404 Template
 * 
 * @author Peter Laxalt
 * @since 3/2020
 * @stylesheet four-oh-four.scss
 * 
 */

/*************************************/

?>

<?php include 'includes/core/header.php'; ?>

<section class="four-oh-four">
  <div class="four-oh-four-inner">
    <h1 class="glitch" data-text="Aw Shucks.">Aw shucks.</h1>
    <p>Sorry about that.</p>
    <p>That page doesn't exist.</p>
    <a href="/" class="btn btn-arrow btn-clr-black">
      Go back home
    </a>
  </div>
</section>

<?php addComponent("news_listings") ?>
<?php addComponent("newsletter_row") ?>

<?php include 'includes/core/footer.php'; ?>