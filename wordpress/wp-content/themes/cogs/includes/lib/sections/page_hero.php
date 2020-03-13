<?php

/** 
 * Page Hero
 * 
 * @author Peter Laxalt
 * @since 2/2020
 */

/*************************************/

if (get_row_layout() == 'page_hero' || $rowLayout == 'page_hero') {
?>

  <section class="page-hero page-hero-<?php echo $idx ?>">
    <div class="page-hero-inner layout-<?php echo get_sub_field_object('layout')['value']; ?>">
      <div class="col content">
        <h1>
          <?php echo get_sub_field('headline'); ?>
        </h1>
        <?php if (get_sub_field('paragraph')) { ?>
          <p>
            <?php echo get_sub_field('paragraph'); ?>
          </p>
        <?php } ?>
      </div>

      <div class="col image">
        <div class="image-wrapper">
          <img data-src="<?php echo get_sub_field('cover_image'); ?>" alt="<?php echo get_sub_field('headline'); ?>" class="lazy" />
        </div>
      </div>
    </div>
  </section>

<?php } ?>
