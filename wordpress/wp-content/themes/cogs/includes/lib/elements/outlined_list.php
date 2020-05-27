<?php

/** 
 * Interactive Outlined List
 * Site Navigation
 * 
 * @author Peter Laxalt
 * @since 2/2020
 */

/*************************************/

if (get_sub_field('link_list')) {
?>

  <div class="outlined-list">
    <div class="outlined-list-inner">
      <ul>
        <?php if (have_rows('link_list')) {
          while (have_rows('link_list')) {
            the_row(); ?>
            <li class="<?php if (get_sub_field('highlight_link') == true) {
                          echo 'focus';
                        } ?>">
              <span>
                <a href="<?php echo get_sub_field('url'); ?>" <?php echo get_sub_field('link_type') == 'external' ? ' target="_blank" rel="nofollow noreferrer noopener" ' : ( get_sub_field('link_type') == 'download' ? 'download' : ''  ) ?>>
                  <?php echo get_sub_field('label'); ?>
                </a>
              </span>
              <div>
                <img data-src="<?php echo get_sub_field('link_cover_image'); ?>" alt="<?php echo get_sub_field('label'); ?>" class="lazy" />
              </div>
            </li>
        <?php
          }
        } ?>
      </ul>
    </div>
  </div>

<?php } ?>