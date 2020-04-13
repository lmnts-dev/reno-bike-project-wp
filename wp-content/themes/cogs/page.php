<?php

/** 
 * Default Page Template
 * 
 * @author Peter Laxalt
 * @since 2/2020
 */

/*************************************/

?>

<?php include 'includes/core/header.php'; ?>

<?php include 'includes/lib/sections/page_hero.php'; ?>


<section>
    <h1>Page Template</h1>
</section>

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


<?php include 'includes/core/footer.php'; ?>