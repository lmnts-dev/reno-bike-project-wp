<?php

/** 
 * Block Row Component
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

$reverseOrientation = false;

class Block
{
  public $headline;
  public $slug;
  public $solidColor;
  public $overlayColor;
  public $textColor;
  public $cover;
  public $external;
  public $size;
}

$blockOne = new Block();
$blockOne->headline = 'After Hours Workshops';
$blockOne->slug = '/';
$blockOne->$solidColor = true;
$blockOne->$overlayColor = 'orange';
$blockOne->$textColor = 'white';
$blockOne->$cover = '';
$blockOne->$external = false;
$blockOne->$size = '1';

$blockTwo = new Block();
$blockTwo->headline = 'After Hours Workshops';
$blockTwo->slug = '/';
$blockTwo->$solidColor = false;
$blockTwo->$overlayColor = 'black';
$blockTwo->$textColor = 'white';
$blockTwo->$cover = 'https://source.unsplash.com/1600x900/?tools';
$blockTwo->$external = false;
$blockTwo->$size = '2';

$blockList = array($blockOne, $blockTwo);

if (get_row_layout() == 'block_row' || $rowLayout == 'block_row') {
?>

  <section class="block-row block-row-<?php echo $idx ?>">

    <div class="section-header split">
      <h3>
        
        <div class="squiggle-svg squiggle-orange squiggle-vertical squiggle-short"><?php require_once ( get_template_directory() . "/assets/images/squiggle.svg");  ?></div>
        <span>Community Programs</span>
      </h3>
      <p>
        We’re committed to creating a nationally recognized, cycling-friendly community. Outside of our community bike shop, RBP engages people in the Truckee Meadows in three key ways: Outreach/Advocacy, Education, and Events.
      </p>
    </div>
    <div class="block-row-inner">

      <div class="block-item">
        <a href="/">
          <div class="block-item-inner">
            <div class="block-item-cover block-item-cover-solid bg-clr-orange">
              <span class="txt-clr-white">
                After Hours Workshops
              </span>
            </div>
            <div class="block-item-image">
              <img data-src="https://source.unsplash.com/1600x900/?tools" alt="Block Item" class="lazy" />
            </div>
          </div>
        </a>
      </div>

      <div class="block-item">
        <a href="/">
          <div class="block-item-inner">
            <div class="block-item-cover bg-clr-tint">
              <span class="txt-clr-white">
                Major Taylor Ride Club
              </span>
            </div>
            <div class="block-item-image">
              <img data-src="https://source.unsplash.com/1600x900/?bikes" alt="Block Item" class="lazy" />
            </div>
          </div>
        </a>
      </div>

    </div>
  </section>

  <section class="block-row">
    <div class="block-row-inner block-row-reverse">

      <div class="block-item">
        <a href="/">
          <div class="block-item-inner">
            <div class="block-item-cover block-item-cover-solid bg-clr-mustard">
              <span class="txt-clr-white">
                Community Outreach
              </span>
            </div>
            <div class="block-item-image">
              <img data-src="https://source.unsplash.com/1600x900/?tools" alt="Block Item" class="lazy" />
            </div>
          </div>
        </a>
      </div>

      <div class="block-item">
        <a href="/">
          <div class="block-item-inner">
            <div class="block-item-cover bg-clr-tint">
              <span class="txt-clr-white">
                FutureCycle
              </span>
            </div>
            <div class="block-item-image">
              <img data-src="https://source.unsplash.com/1600x900/?bikes" alt="Block Item" class="lazy" />
            </div>
          </div>
        </a>
      </div>

    </div>
  </section>

<?php } ?>