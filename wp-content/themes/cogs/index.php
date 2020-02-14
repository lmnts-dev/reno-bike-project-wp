<?php /* Template Name: Homepage */ ?>

<?php include 'includes/header.php'; ?>

<?php
    if ($detect_device->isMobile() || $detect_device->isTablet()) {
        $block_class = "panel-slide";
    } else  {
        $block_class = "panel-section";
    }

    $fields = get_fields();
?>

<section id="main-section" class="content row">
    Main Content
</section>

<?php include 'includes/footer.php'; ?>
