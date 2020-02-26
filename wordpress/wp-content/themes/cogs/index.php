<?php /* Template Name: Homepage */ ?>

<?php include 'includes/core/header.php'; ?>

<?php
if ($detect_device->isMobile() || $detect_device->isTablet()) {
    $block_class = "panel-slide";
} else {
    $block_class = "panel-section";
}

$fields = get_fields();
?>

<?php include 'includes/lib/sections/home-hero.php' ?>
<?php include 'includes/lib/sections/block-row.php' ?>

<?php include 'includes/core/footer.php'; ?>