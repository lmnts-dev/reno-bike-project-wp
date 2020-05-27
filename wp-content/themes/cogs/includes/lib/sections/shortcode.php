<?php

/** 
 * Custom HTML
 * Enter custom html
 * 
 * @author Alisha Garric
 * @since 3/2020
 * 
 */

/*************************************/
/** Variables */
/*************************************/

if (get_row_layout() == 'shortcode' || $rowLayout == 'shortcode') {

  $shortcode = get_sub_field('shortcode');
  $form = get_sub_field('is_the_shortcode_a_form');
?>

<section class="shortcode <?php echo $form ? 'form' : false ?> <?php echo get_sub_field('layout'); ?> shortcode-<?php echo $idx ?>">
    <div class="shortcode-inner <?php echo $form ? 'form-inner' : false ?>">
        <?php echo do_shortcode($shortcode); ?>
    </div>
</section>

<?php } ?>