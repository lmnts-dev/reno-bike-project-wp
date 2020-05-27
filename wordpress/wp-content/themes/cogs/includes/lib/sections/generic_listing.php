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



if (get_row_layout() == 'generic_listing' || $rowLayout == 'generic_listing') {
  $headline = get_sub_field('headline');
  $description = get_sub_field('description');
  $listings = get_sub_field('listing');
?>
  <section class="generic-listing <?php echo get_sub_field('layout'); ?> generic-listing-<?php echo $idx ?>">
    <?php if ( $headline ) { ?>
      <div class="section-header split">
        <h3>
          <?php $squiggle['color'] = 'primary' ?>
          <?php require ( get_template_directory() . "/assets/images/squiggle-horizontal.php");  ?>
          <span><?php echo $headline ?></span>
        </h3>
        <?php if ( $description ) { ?>
          <p>
            <?php echo $description ?>
          </p>
        <?php } ?>
      </div>
    <?php } ?>

    <div class="generic-listing-inner">
        <?php foreach ($listings as $listing) { ?>
            <div class="generic-listing-row">
                <div class="col img-col">
                  <div class="generic-listing-img">
                      <?php $image = $listing['image']; ?>
                      <?php if ( $image ) : ?>
                        <img data-src="<?php echo wp_get_attachment_image_src( $image['id'], 'large')[0]; ?>" alt="<?php echo $listing['header_text'] ?>" class="lazy" />
                      <?php endif; ?>
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