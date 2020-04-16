<?php

/** 
 * WYSIWYG Content Section
 * For a thinner column of WYSIWYG content, including, headers, images and paragraph text
 * 
 * @author Alisha Garric
 * @since 3/2020
 */

/*************************************/
/** Variables */
/*************************************/

if (get_row_layout() == 'wysiwyg_content_section' || $rowLayout == 'wysiwyg_content_section') {

?>

  <section class="wysiwyg-content-section <?php echo get_sub_field('layout'); ?> wysiwyg-content-section-<?php echo $idx ?>">
    <div class="wysiwyg-content-section-inner article-body">
        <?php if ( get_sub_field('lead_content_with_a_squiggle') ) { ?>
            <?php $squiggle['color'] = get_sub_field('squiggle_color') ?>
            <?php require ( get_template_directory() . "/assets/images/squiggle-vertical.php");  ?>
        <?php } ?>
        <?php echo get_sub_field('content') ?>
    </div>
  </section>

<?php } ?>