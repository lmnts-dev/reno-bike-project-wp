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

<?php
$device = 'Not detected';

if ($detect_device->isMobile()) {
    $device = "mobile";
}

if ($detect_device->isTablet()) {
    $device = "tablet";
}
?>

<?php include 'includes/lib/sections/page_hero.php'; ?>

<?php
if (have_rows('sections')) {
    $idx = 0; // Establish our index.

    while (have_rows('sections')) {
        the_row();

        include 'includes/lib/sections/' . get_row_layout() . '.php';

        $idx++; // Increment our index.
    }
};
?>

<?php include 'includes/core/footer.php'; ?>