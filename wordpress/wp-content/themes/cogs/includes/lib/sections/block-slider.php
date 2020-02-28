<?php

/** 
 * Block Slider
 * 
 * @author Peter Laxalt
 * @since 2/2020
 */

/*************************************/
/** Variables */
/*************************************/

/**
 * @todo: Link to ACF
 */
class BlockSlide
{
  public $title;
  public $cover;
  public $ctaLabel;
  public $slug;
}

$blockSlideOne = new BlockSlide();
$blockSlideOne->title = 'New bike, Who dis?';
$blockSlideOne->cover = 'https://source.unsplash.com/1600x900/?yellow';
$blockSlideOne->ctaLabel = 'Shop Bikes';
$blockSlideOne->slug = '/';

$blockSlideTwo = new BlockSlide();
$blockSlideTwo->title = 'New bike, Who dat?';
$blockSlideTwo->cover = 'https://source.unsplash.com/1600x900/?red';
$blockSlideTwo->ctaLabel = 'Shop Bikes';
$blockSlideTwo->slug = '/';

$blockSlideThree = new BlockSlide();
$blockSlideThree->title = 'New bike, Who der?';
$blockSlideThree->cover = 'https://source.unsplash.com/1600x900/?green';
$blockSlideThree->ctaLabel = 'Shop Bikes';
$blockSlideThree->slug = '/';

$blockSlideFour = new BlockSlide();
$blockSlideFour->title = 'New bike, Who\'s in?';
$blockSlideFour->cover = 'https://source.unsplash.com/1600x900/?pink';
$blockSlideFour->ctaLabel = 'Shop Bikes';
$blockSlideFour->slug = '/';

$blockSlideList = array($blockSlideOne, $blockSlideTwo, $blockSlideThree, $blockSlideFour);
$blockSlideId = "1"

?>

<section class="block-slider">
  <div class="block-slider-inner">
    <div class="block-slider-el block-slider-el-<?php echo $blockSlideId; ?>" data-flickity='{ "cellAlign": "left", "prevNextButtons": false, "fade": true, "wrapAround": true, "autoPlay": true }'>

      <?php foreach ($blockSlideList as $blockSlide) { ?>
        <div class="block-slide">
          <div class="block-slide-inner">
            <div class="block-slide-content">
              <h4>
                <?php echo $blockSlide->title ?>
              </h4>
              <a href="<?php echo $blockSlide->slug ?>" class="btn btn-arrow">
                <?php echo $blockSlide->ctaLabel ?>
              </a>
            </div>

            <div class="block-slide-cover">
              <div class="block-slide-cover-inner">
                <img data-src="<?php echo $blockSlide->cover ?>" class="lazy" alt="<?php echo $blockSlide->title ?>" />
              </div>
            </div>
          </div>
        </div>
      <?php
        #/forEach
      } ?>


    </div>
  </div>
</section>