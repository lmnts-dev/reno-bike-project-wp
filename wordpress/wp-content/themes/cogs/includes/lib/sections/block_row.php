<?php

/** 
 * Block Row Component
 * 
 * @author Peter Laxalt and Alisha Garric
 * @since 2/2020
 */

/*************************************/
/** Variables */
/*************************************/


if (get_row_layout() == 'block_row' || $rowLayout == 'block_row') {

  // get global site data
  $data = get_field('global_block_row', 'options' );
  if ( $rowLayout == 'block_row' ){

    //if we have page data to override with, grab page data
    $override = get_sub_field('override');
    if ( $override ){
      $data = get_sub_field('data');
    }
  }
  
?>

  <section class="block-row block-row-<?php echo $idx ?>">

    <?php if ( $data['headline'] ) { ?>
      <div class="section-header split">
        <h3>
          <?php $squiggle['color'] = 'orange' ?>
          <?php require ( get_template_directory() . "/assets/images/squiggle-horizontal.php");  ?>

          <span><?php echo $data['headline'] ?></span>
        </h3>
        <?php if ( $data['description'] ) { ?>
          <p>
            <?php echo $data['description'] ?>
          </p>
        <?php } ?>
      </div>
    <?php } ?>

    <?php if ( $data['block_1']['link'] && $data['block_1']['text'] && $data['block_2']['link'] && $data['block_2']['link'] && $data['block_2']['image'] && $data['block_2']['text'] ) { ?>
      <div class="block-row-inner">

        <div class="block-item">
          <a href="<?php echo $data['block_1']['link'] ?>">
            <div class="block-item-inner">
              <div class="block-item-cover block-item-cover-solid bg-clr-orange">
                <span class="txt-clr-white">
                  <?php echo $data['block_1']['text'] ?>
                </span>
              </div>
            </div>
          </a>
        </div>

        <div class="block-item">
          <a href="<?php echo $data['block_2']['link'] ?>">
            <div class="block-item-inner">
              <div class="block-item-cover bg-clr-tint">
                <span class="txt-clr-white">
                <?php echo $data['block_2']['text'] ?>
                </span>
              </div>
              <div class="block-item-image">
                <img data-src="<?php echo $data['block_2']['image'] ?>" alt="<?php echo $data['block_2']['text'] ?>" class="lazy" />
              </div>
            </div>
          </a>
        </div>
      
      </div>
    <?php }?>
  </section>

  <?php if ( $data['block_4']['link'] && $data['block_4']['text'] && $data['block_2']['link'] && $data['block_3']['link'] && $data['block_3']['image'] && $data['block_3']['text'] ) { ?>
    <section class="block-row">
      <div class="block-row-inner block-row-reverse">

        <div class="block-item">
          <a href="<?php echo $data['block_3']['link'] ?>">
            <div class="block-item-inner">
              <div class="block-item-cover block-item-cover-solid bg-clr-mustard">
                <span class="txt-clr-white">
                <?php echo $data['block_4']['text'] ?>
                </span>
              </div>
            </div>
          </a>
        </div>

        <div class="block-item">
          <a href="<?php echo $data['block_3']['link'] ?>">
            <div class="block-item-inner">
              <div class="block-item-cover bg-clr-tint">
                <span class="txt-clr-white">
                  <?php echo $data['block_3']['text'] ?>
                </span>
              </div>
              <div class="block-item-image">
                <img data-src="<?php echo $data['block_3']['image'] ?>" alt="<?php echo $data['block_3']['text'] ?>" class="lazy" />
              </div>
            </div>
          </a>
        </div>

      </div>
    </section>
  <?php }?>

<?php } ?>