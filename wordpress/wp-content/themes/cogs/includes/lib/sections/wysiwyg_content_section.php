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
        <?php echo get_sub_field('content') ?>
    </div>
  </section>

<?php } ?>