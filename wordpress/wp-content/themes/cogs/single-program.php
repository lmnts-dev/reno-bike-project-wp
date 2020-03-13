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

<?php addComponent("page_hero"); ?>

<?php get_template_part('content', get_post_format()); ?>


<?php include 'includes/lib/sections/newsletter_row.php'; ?>

<?php include 'includes/core/footer.php'; ?>