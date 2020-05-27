<?php

/** 
 * Video Row
 * 
 * @author Peter Laxalt
 * @since 3/2020
 * @stylesheet video-row.scss
 * 
 */

if (get_row_layout() == 'video_row') {

  if ( get_sub_field('video_type' ) == 'youtube' ) {
    $link = "https://www.youtube.com/embed/" . get_sub_field('vimeo_id' ) . "?background=1&autoplay=1&loop=1&byline=0&title=0&mute=1";
    $overlayLink = "https://www.youtube.com/embed/" . get_sub_field('vimeo_id' ) . "?autoplay=0";
  }
  else {
    $link = "https://player.vimeo.com/video/" . get_sub_field('vimeo_id') . "?background=1&autoplay=1&loop=1&byline=0&title=0";
    $overlayLink = "https://player.vimeo.com/video/" . get_sub_field('vimeo_id') . "?autoplay=0";
  }
  $coverImage = get_sub_field('cover_image');
  $altText = get_sub_field('alt_text');

?>

  <section class="video-row padding-top-half padding-bottom-half video-row-<?php echo $idx ?>">
    <div class="video-row-inner">

      <span class="video-toggle">
        <span></span>
      </span>
      <iframe src="<?php echo $link ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
      <img data-src="<?php echo $coverImage ?>" class="cover lazy" alt="<?php echo $altText ?>" />

    </div>
  </section>

  <div class="video-overlay">
    <div class="video-toggle"></div>
    <div class="video-overlay-inner">
      <iframe src="<?php echo $overlayLink ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
    </div>
  </div>


<?php } ?>