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

if (get_row_layout() == 'custom_html' || $rowLayout == 'custom_html') {

  $html = get_sub_field('html');
?>

    <section class="custom-html <?php echo get_sub_field('layout'); ?> custom-html-<?php echo $idx ?>">
        <div class="custom-html-inner">
            <?php echo $html ?>
        </div>
    </section>

<?php } ?>