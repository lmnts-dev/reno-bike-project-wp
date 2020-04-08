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

<?php
    if (have_rows('sections')) {
        $idx = 0; // Establish our index.

        while (have_rows('sections')) {
            the_row();

            addComponent(get_row_layout());

            $idx++; // Increment our index.
        }
    };
?>

<?php addComponent("block_row"); ?>
<?php addComponent("newsletter_row"); ?>

<?php include 'includes/core/footer.php'; ?>