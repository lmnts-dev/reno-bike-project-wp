<?php

/** 
 * Home Hero
 * 
 * @author Peter Laxalt
 * @since 2/2020
 */

/*************************************/

if (get_row_layout() == 'home_hero' || $rowLayout == 'home_hero') {
?>

  <section class="home-hero home-hero-<?php echo $idx ?>">
    <div class="home-hero-inner">
      <div class="col-info">
        <div class="col-info-top">
          <h1>
            <?php echo get_sub_field('headline'); ?>
          </h1>
          <p>
            <?php echo get_sub_field('paragraph'); ?>
          </p>
          <a href="<?php echo get_sub_field('call_to_action')['url']; ?>" class="btn btn-arrow" <?php echo get_sub_field('call_to_action')['link_type'] == 'external' ? ' target="_blank" rel="nofollow noreferrer noopener" ' : ( get_sub_field('call_to_action')['link_type'] == 'download' ? 'download' : ''  ) ?>>
            <?php echo get_sub_field('call_to_action')['label']; ?>
          </a>

          <div class="col-info-hours">
            <span class="headline">
              Bike Shop Hours
            </span>
            <ul>
              <?php if (have_rows('hours', 'option')) {
                while (have_rows('hours', 'option')) {
                  the_row(); ?>
                  <li>
                    <span class="label">
                      <?php echo get_sub_field('days_of_the_week'); ?>:
                    </span>
                    <span class="hours">
                      <?php echo get_sub_field('open_hours'); ?>
                    </span>
                  </li>
              <?php
                }
              } ?>
            </ul>
          </div>

          <span class="btn btn-border-black btn-newsletter">
            Join Our Newsletter
          </span>

          <div class="bike-wheel">
            <?php include get_template_directory() . '/includes/lib/svg/bike_wheel.php' ?>
          </div>
        </div>
      </div>
      <div class="col-main">
        <?php
        include get_template_directory() . '/includes/lib/elements/outlined_list.php';
        ?>
      </div>
    </div>
  </section>

<?php } ?>