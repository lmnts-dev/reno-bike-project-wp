<?php

/** 
 * Generic Listing
 * for displaying a rows, where each row has an image, header
 * text and paragraph text
 * 
 * @author Alisha Garric
 * @since 3/2020
 * @stylesheet member-row.scss
 * 
 */

/*************************************/
/** Variables */
/*************************************/

$listings = get_sub_field('listing');

if (get_row_layout() == 'generic_listing') {

?>
  <section class="generic-listing <?php echo get_sub_field('layout'); ?> generic-listing-<?php echo $idx ?>">
    <div class="generic-listing-inner">
        <?php foreach ($listings as $listing) { ?>
            <div class="generic-listing-row">
                <div class="col img-col">
                <div class="generic-listing-img">
                    <?php $image = $listing['image']; ?>
                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="lazy" />
                </div>
                </div>
                <div class="col content-col">
                <div class="content-col-inner">
                    <h6 class="h5 <?php echo 'txt-clr-' . $listing['header_color']; ?>"><?php echo $listing['header_text'] ?></h6>
                    <?php echo $listing['paragraph_text'] ?>
                </div>
                </div>
            </div>
        <?php } ?>
    </div>
  </section>
<?php } ?>