<?php

/** 
 * Volunteer Application Page Template
 * 
 * @author Peter Laxalt
 * @since 2/2020
 */

/*************************************/

?>

<?php include 'includes/core/header.php'; ?>

<?php include 'includes/lib/sections/page_hero.php'; ?>

<div class="hero-spacer"></div>

<?php 
    if ( get_field('volunteer_form_pdf', 'options') ){
        $button = array(
            'button_style' => 'file',
            'call_to_action_url' => get_field('volunteer_form_pdf', 'options'),
            'call_to_action_label' => 'Download Application',
        );
        $buttons = array(
            'button' => $button,
        );
        $schema = array(
            'buttons' => $buttons,
            'headerSize' => 'h1',
        );
    }
?>
<?php addComponent("basic_section", $schema ); ?>

<section class="form">
    <div class="form-inner">
        <?php echo do_shortcode('[wpforms id="15279" title="false" description="false"]'); ?>
    </div>
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