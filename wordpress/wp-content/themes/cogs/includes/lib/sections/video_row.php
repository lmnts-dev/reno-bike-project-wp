<?php

/** 
 * Video Row
 * 
 * @author Peter Laxalt
 * @since 3/2020
 * @stylesheet video-row.scss
 * 
 */

/*************************************/
/** Variables */
/*************************************/

if (get_row_layout() == 'video_row') {
?>

  <section class="video-row video-row-<?php echo $idx ?>">
    <div class="video-row-inner">

      <span class="video-toggle">
        <span></span>
      </span>
      <iframe src="https://player.vimeo.com/video/76979871?background=1&autoplay=1&loop=1&byline=0&title=0" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
      <img data-src="https://source.unsplash.com/1600x900/?cyan" class="cover lazy" alt="Alt Text" />

    </div>
  </section>

  <div class="video-overlay">
    <div class="video-toggle"></div>
    <div class="video-overlay-inner">
      <iframe src="https://player.vimeo.com/video/76979871?background=1&autoplay=1&controls=true" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
    </div>
  </div>


<?php } ?>