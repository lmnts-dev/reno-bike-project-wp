<?php

/** 
 * Editorial Row
 * Your standard image left / right, text left / right block.
 * 
 * @author Peter Laxalt
 * @since 2/2020
 */

/*************************************/
/** Variables */
/*************************************/

if (get_row_layout() == 'editorial_row' || $rowLayout == 'editorial_row') {
  $imgColClass = '';

  if (get_sub_field('image_1') && get_sub_field('image_2')) {
    $imgColClass = 'img-col-alt';
  }

?>

  <section class="editorial-row <?php echo get_sub_field('layout'); ?> editorial-row-<?php echo $idx ?>">
    <div class="editorial-row-inner <?php echo 'ratio-' . get_sub_field('image_to_text_ratio'); ?>">
      <div class="col content-col">
        <div class="content-col-inner <?php echo 'squiggle-' . get_sub_field('squiggle_position'); ?> <?php echo get_sub_field('image_2') ? 'pos-alt' : '' ?>">

          <?php 
            if ( get_sub_field('decor_type') == "squiggle" ) {
              $squiggle['color'] = get_sub_field('squiggle_color');
              if ( get_sub_field('squiggle_position') == 'pos-3' ){ 
                $squiggle['size'] = 'small';
                require ( get_template_directory() . "/assets/images/squiggle-vertical.php");  
              } else {
                require ( get_template_directory() . "/assets/images/squiggle-horizontal.php");
              } 
            }
            else if ( get_sub_field('decor_type') == "icon" ) {
              ?><span class='icon fas fa-<?php echo get_sub_field('icon_id') ?> txt-clr-<?php echo get_sub_field('icon_color') ?>'></span><?php
            }
          ?>

          <h4 class="<?php echo get_sub_field('headline_size') ?>">
            <?php echo get_sub_field('headline'); ?>
          </h4>
          <p>
            <?php echo get_sub_field('paragraph'); ?>
          </p>

          <?php 
              if ( $buttons ){
                  foreach ( $buttons as $button ) { 
                      if ( $button['button_style'] == "file" ) { 
          ?>
                          <a href="<?php echo $button['call_to_action_url']?>" class="btn btn-border-black btn-download" download>
                              <?php echo $button['call_to_action_label']?>
                          </a>
                      <?php } else { ?>
                          <a href="<?php echo $button['call_to_action_url']?>" class="btn btn-arrow" download>
                              <?php echo $button['call_to_action_label']?>
                          </a>
          <?php 
                      }
                  }
              } 
          ?>

        </div>
      </div>

      <div class="col img-col <?php echo $imgColClass ?>">
        <?php if (get_sub_field('image_1')) { ?>
          <div class="editorial-row-img img-1 <?php if ( get_sub_field('image_1') && get_sub_field('is_image_1_a_logo') && !get_sub_field('image_2') ){ echo 'img-bump'; } ?>">
            <img data-src="<?php echo get_sub_field('image_1') ?>" alt="<?php echo get_sub_field('headline'); ?>" class="lazy <?php echo get_sub_field('is_image_1_a_logo') ? 'img-contain' : '' ?>" />
          </div>
        <?php } ?>
        <?php if (get_sub_field('image_2')) { ?>
          <div class="editorial-row-img">
            <img data-src="<?php echo get_sub_field('image_2') ?>" alt="<?php echo get_sub_field('headline'); ?>" class="lazy <?php echo get_sub_field('is_image_2_a_logo') ? 'img-contain' : '' ?>" />
          </div>
        <?php } ?>
      </div>
    </div>
  </section>

<?php } ?>