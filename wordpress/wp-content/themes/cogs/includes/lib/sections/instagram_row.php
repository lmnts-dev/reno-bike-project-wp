<?php

/** 
 * Instagram Row
 * for displaying instagram pictures and linking to instagram
 * 
 * @author Alisha Garric
 * @since 3/2020
 * @stylesheet instagram-row.scss
 * 
 */

/*************************************/
/** Variables */
/*************************************/

if (get_row_layout() == 'instagram_row' || $rowLayout == 'instagram_row') {

    $instaHandle = get_sub_field('instagram_handle');
    $btnText = get_sub_field('view_all_button_text');
    $socialMedia = get_field('social_media', 'options');
    foreach ( $socialMedia as $item ){
        if ( strpos( $item['account_url'], 'insta') !== false ){
            $instaLink = $item['account_url'];
        }
    }

    if ( $instaLink ) {
?>
    <section class="instagram-row instagram-row-<?php echo $idx ?>">

        <div class="instagram-row-header">
            <h3>
                <a href="<?php echo $instaLink ?>">@<?php echo $instaHandle ?></a>
            </h3>
            <a href="<?php echo $instaLink ?>" class="btn btn-border-black">
                <?php echo $btnText ?>
            </a>
        </div>

        <div class="instagram-row-inner">
            <?php echo do_shortcode('[instagram-feed]') ?>

            <!--<div class="post-container">
                <a href="<?php echo $instaLink ?>" class="cover">
                    <img data-src="https://source.unsplash.com/1600x900/?bike" alt="<?php echo '@' . $instaHandle ?>" class="lazy" />
                </a>
                <a href="<?php echo $instaLink ?>" class="cover">
                    <img data-src="https://source.unsplash.com/1600x900/?pink" alt="<?php echo '@' . $instaHandle ?>" class="lazy" />
                </a>
                <a href="<?php echo $instaLink ?>" class="cover">
                    <img data-src="https://source.unsplash.com/1600x900/?bikes" alt="<?php echo '@' . $instaHandle ?>" class="lazy" />
                </a>
                <a href="<?php echo $instaLink ?>" class="cover">
                    <img data-src="https://source.unsplash.com/1600x900/?bikes" alt="<?php echo '@' . $instaHandle ?>" class="lazy" />
                </a>
                <a href="<?php echo $instaLink ?>" class="cover">
                    <img data-src="https://source.unsplash.com/1600x900/?bike" alt="<?php echo '@' . $instaHandle ?>" class="lazy" />
                </a>
                <a href="<?php echo $instaLink ?>" class="cover">
                    <img data-src="https://source.unsplash.com/1600x900/?pink" alt="<?php echo '@' . $instaHandle ?>" class="lazy" />
                </a>
            </div>-->

        </div>
    </section>
  <?php } ?>
<?php } ?>