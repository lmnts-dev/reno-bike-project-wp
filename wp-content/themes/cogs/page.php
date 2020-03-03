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
if ($detect_device->isMobile() || $detect_device->isTablet()) {
    $block_class = "panel-slide";
} else {
    $block_class = "panel-section";
}

$fields = get_fields();
?>

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