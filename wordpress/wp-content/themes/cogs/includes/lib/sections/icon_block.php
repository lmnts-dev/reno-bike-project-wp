<?php

/** 
 * Icon Block
 * 2 rows of 3 blocks containing an icon, header text and paragraph text
 * 
 * @author Alisha Garric
 * @since 3/2020
 * @stylesheet icon-block.scss
 * 
 */

/*************************************/
/** Variables */
/*************************************/

if (get_row_layout() == 'icon_block') {

    $blocks = get_sub_field('block');
?>

    <section class="icon-block <?php echo get_sub_field('layout');?> icon-block-<?php echo $idx ?>">
        <div class="icon-block-inner">
            <?php foreach ( $blocks as $block ){ ?>
                <div class="icon-block">
                    <span class='icon'></span><!-- TODO: Icon -->
                    <h6 class='h5'><?php echo $block['header_text'] ?></h6>
                    <p><?php echo $block['paragraph_text'] ?></p>
                </div>
            <?php } ?>
        </div>
    </section>

<?php } ?>