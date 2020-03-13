<?php

/** 
 * Sticky Section
 * A section with images on the left/right and sticky text on the other side,
 * where the sticky text has flexible header, icon, paragraph and button content
 * 
 * @author Alisha Garric
 * @since 3/2020
 */

/*************************************/
/** Variables */
/*************************************/


if (get_row_layout() == 'sticky_section') {


  $images = get_sub_field('images');
  $contentItems = get_sub_field('text_content');
  $imageSize = 'full';
  $imagesColumnSize = get_sub_field('image_width');
  $orientation = get_sub_field('orientation');
  if ( $imagesColumnSize == "Medium") {
    $imagesWidth = "40%";
    $contentWidth = "60%";
  }
  else {
    $imagesWidth = "60%";
    $contentWidth = "40%";
  }

?>
    <section class="sticky-section <?php echo get_sub_field('layout') . ' ' . $orientation ?> event-row-<?php echo $idx ?>">
      <div class="sticky-section-inner">
        <div class="images" style="--width: <?php echo $imagesWidth ?>; ">
          <?php foreach ($images as $image) { ?>
    
               <img src="<?php echo esc_url($image['image']['url']); ?>" alt="<?php echo esc_attr($image['image']['alt']); ?>" />
     
          <?php } ?>
        </div>
        <div class="text-content" style="--width: <?php echo $contentWidth ?>; ">
          <?php 
            if( have_rows('text_content') ) {
              while( have_rows('text_content') ) {
                the_row();
                include get_template_directory() . '/includes/lib/elements/flexible_content.php';
              }
            } 
          ?>
        </div>
      </div>
    </section>

<?php } ?>