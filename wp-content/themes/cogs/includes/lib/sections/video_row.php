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

  $videoID = get_sub_field('vimeo_id');
  $coverImage = get_sub_field('cover_image');
  $altText = get_sub_field('alt_text');
?>

  <section class="video-row padding-top-half padding-bottom-half video-row-<?php echo $idx ?>">
    <div class="video-row-inner">

      <span class="video-toggle">
        <span></span>
      </span>
      <iframe src="<?php echo 'https://player.vimeo.com/video/' . $videoID . '?background=1&autoplay=1&loop=1&byline=0&title=0'?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
      <img data-src="https://source.unsplash.com/1600x900/?cyan" class="cover lazy" alt="<?php echo $altText ?>" />

    </div>
  </section>

  <div class="video-overlay">
    <div class="video-toggle"></div>
    <div class="video-overlay-inner">
      <iframe src="<?php echo 'https://player.vimeo.com/video/' . $videoID . '?background=1&autoplay=1&controls=true'?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
    </div>
  </div>


<?php } ?>