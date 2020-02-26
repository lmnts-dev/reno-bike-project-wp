<!DOCTYPE html>

<?php
require_once "utils/mobileDetect.php";
require_once "functions/functions.php";
$detect_device = new Mobile_Detect;

$mobile_class = "";
$desktop_class = "";

if ($detect_device->isMobile() || $detect_device->isTablet()) {
    $mobile_class = "is-mobile-tablet";
}

if ($detect_device->isMobile() && !$detect_device->isTablet()) {
    $mobile_class .= " is-mobile";
}

if ($detect_device->isTablet()) {
    $mobile_class .= " is-tablet";
}

if (!$detect_device->isMobile() && !$detect_device->isTablet()) {
    $desktop_class = " is-desktop";
}

$sitename = get_bloginfo('title');
$title = $sitename;
$description = get_bloginfo('description');

if (get_the_excerpt() !== false and is_front_page() == false) {
    $description = get_the_excerpt();
}
if (is_page()) {
    $title = get_the_title() . ' | ' . $sitename;
}
if (is_singular('project')) {
    $title = get_the_title() . ' | ' . $sitename;
}

$featured_image = get_the_post_thumbnail_url($post, 'large');
if ($featured_image == false) {
    $args = array(
        'numberposts' => 1,
        'post_type'   => 'project'
    );

    $project = get_posts($args);
    $featured_image = get_the_post_thumbnail_url($project[0]->ID, 'large');
}
?>

<html lang="en" class="<?php print $mobile_class; ?> <?php print $desktop_class; ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width" />
    <!-- <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;"> -->
    <title><?php echo $title; ?></title>
    <meta name="description" content="<?php echo $description; ?>" />
    <meta property="og:title" content="<?php echo $title; ?>">
    <meta property="og:description" content="<?php echo $description; ?>">
    <meta property="og:image" content="<?php echo $featured_image; ?>">
    <meta property="og:url" content="<?php echo get_permalink(); ?>">
    <meta property="og:site_name" content="<?php echo $sitename; ?>" />
    <meta name="twitter:title" content="<?php echo $title; ?>">
    <meta name="twitter:description" content="<?php echo $description; ?>">
    <meta name="twitter:image" content="<?php echo $featured_image; ?>">
    <meta name="twitter:card" content="summary">
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_bloginfo('template_url'); ?>/assets/icons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_bloginfo('template_url'); ?>/assets/icons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_bloginfo('template_url'); ?>/assets/icons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_bloginfo('template_url'); ?>/assets/icons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_bloginfo('template_url'); ?>/assets/icons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_bloginfo('template_url'); ?>/assets/icons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_bloginfo('template_url'); ?>/assets/icons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_bloginfo('template_url'); ?>/assets/icons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_bloginfo('template_url'); ?>/assets/icons/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_bloginfo('template_url'); ?>/assets/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo get_bloginfo('template_url'); ?>/assets/icons/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_bloginfo('template_url'); ?>/assets/icons/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_bloginfo('template_url'); ?>/manifest.json">
    <link rel="mask-icon" href="<?php echo get_bloginfo('template_url'); ?>/assets/icons/safari-pinned-tab.svg" color="#000000">
    <link rel="shortcut icon" href="<?php echo get_bloginfo('template_url'); ?>/assets/icons/favicon.ico">
    <meta name="msapplication-TileColor" content="#000000">
    <meta name="msapplication-TileImage" content="<?php echo get_bloginfo('template_url'); ?>/assets/icons/mstile-144x144.png">
    <meta name="msapplication-config" content="<?php echo get_bloginfo('template_url'); ?>/browserconfig.xml">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="msapplication-starturl" content="/">
    <meta name="theme-color" content="#000000">

    <?php wp_head(); ?>
</head>


<body data-barba="wrapper">

    <span class="cursor"></span>
    <span class="cursor-outline"></span>
    <?php include 'navigation.php' ?>

    <main role="main" data-barba="container" data-barba-namespace="home">
        <div class="wrapper">