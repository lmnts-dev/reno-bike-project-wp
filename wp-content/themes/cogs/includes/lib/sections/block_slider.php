<?php

/** 
 * Block Slider
 * 
 * @author Peter Laxalt
 * @since 2/2020
 */

/*************************************/

// First check if we are in an ACF loop.
if (get_row_layout() == 'block_slider' || $rowLayout == 'block_slider') {
?>

  <section class="block-slider">
    <div class="block-slider-inner">
      <div class="block-slider-el block-slider-<?php echo $idx; ?>">

        <?php while (have_rows('slides')) {
          the_row();

          $cta = get_sub_field('call_to_action');
        ?>
          <div class="block-slide">
            <div class="block-slide-inner">
              <div class="block-slide-content">
                <h4>
                  <?php echo get_sub_field('title'); ?>
                </h4>
                <a href="<?php echo esc_url($cta['url']) ?>" class="btn btn-arrow" <?php echo get_sub_field('link_type') == 'external' ? ' target="_blank" rel="nofollow noreferrer noopener" ' : ( get_sub_field('link_type') == 'download' ? 'download' : ''  ) ?>>
                  <?php echo $cta['label'] ?>
                </a>
              </div>

              <div class="block-slide-cover">
                <div class="block-slide-cover-inner">
                  <img data-src="<?php echo get_sub_field('cover_image'); ?>" class="lazy" alt="<?php echo get_sub_field('title'); ?>" />
                </div>
              </div>
            </div>
          </div>
        <?php
          #/while
        } ?>


      </div>
    </div>
  </section>

<?php
} ?>