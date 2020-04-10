<?php

/** 
 * Member Row
 * for displaying a person's photo, name, title and description
 * 
 * @author Alisha Garric
 * @since 3/2020
 * @stylesheet member-row.scss
 * 
 */

/*************************************/
/** Variables */
/*************************************/

$args = array(
  'numberposts' => -1,
  'post_type'   => 'staff'
);

$staffMembers = get_posts( $args );
$headline = get_sub_field('headline');

if (get_row_layout() == 'member_row' || $rowLayout == 'member_row') {

?>
  <section class="member-row <?php echo get_sub_field('layout'); ?> member-row-<?php echo $idx ?>">
  
    <?php if ( $headline ) { ?>
      <div class="section-header split">
        <h2>
          <?php $squiggle['color'] = 'pink' ?>
          <?php require ( get_template_directory() . "/assets/images/squiggle-horizontal.php");  ?>
          <span>
            <?php echo $headline ?>
          </span>
        </h2>
      </div>
    <?php } ?>

    <?php foreach ($staffMembers as $member ) { ?>
      <div class="member-row-item">
        <div class="col img-col">
          <div class="member-row-img">
            <img data-src="<?php echo get_the_post_thumbnail_url( $member ) ?>" alt="<?php echo $member->post_title ?>" class="lazy" />
          </div>
        </div>
        <div class="col content-col">
          <div class="content-col-inner">
            <h4>
              <?php echo $member->post_title ?>
            </h4>
            <p class="txt-clr-gunmetal h5"><?php echo $member->title ?></p>
            <p>
              <?php echo $member->description ?>
            </p>
          </div>
        </div>
      </div>
    <?php } ?>
  </section>
<?php } ?>