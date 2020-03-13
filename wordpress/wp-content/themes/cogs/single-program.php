<?php

/** 
 * Default Program Post Template
 * 
 * @author Alisha Garric
 * @since 3/2020
 */

/*************************************/

?>

<?php include 'includes/core/header.php'; ?>

<?php 
    $rowLayout = 'page_hero';
    include 'includes/lib/sections/page_hero.php'; 
?>

<?php get_template_part('content', get_post_format()); ?>


<?php include 'includes/lib/sections/newsletter_row.php'; ?>

<?php include 'includes/core/footer.php'; ?>