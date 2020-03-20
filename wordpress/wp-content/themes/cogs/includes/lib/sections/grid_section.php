<?php

/** 
 * Grid Section Component
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
class GridBlock
{
  public $title;
  public $copy;
  public $cover;
}

$blockOne = new GridBlock();
$blockOne->title = 'Community Outreach Events/Bike Valet';
$blockOne->copy = 'We provide Bike Valet Parking for several events throughout the year and man outreach tables at several others. If you have interest in being a voice for the Reno Bike Project please contact us and we will send you a schedule of events.';
$blockOne->cover = 'https://source.unsplash.com/1600x900/?dog';

$blockTwo = new GridBlock();
$blockTwo->title = 'Greeters';
$blockTwo->copy = 'Especially during the summer months, we need help with greeting people who visit the shop and directing them to the appropriate place. Some bike knowledge is a plus but isn’t totally necessary.';
$blockTwo->cover = 'https://source.unsplash.com/1600x900/?monkey';

$blockThree = new GridBlock();
$blockThree->title = 'Shop Improvements';
$blockThree->copy = 'The shop constantly needs to be improved upon. If you have a skill or trade like plumbing, carpentry, electrical, etc. we can probably use your assistance. If you would like to volunteer your services in such a way please contact us and we will find a job for you.';
$blockThree->cover = 'https://source.unsplash.com/1600x900/?bear';

$blockFour = new GridBlock();
$blockFour->title = 'Mechanics';
$blockFour->copy = 'We can always use help wrenching. Experienced mechanics that have a well-rounded knowledge of bikes are a great help during open hours or during classes, and volunteering will teach you how to teach others. If you’re interested in becoming a wrench but don’t know much yet, we’ll teach you here!';
$blockFour->cover = 'https://source.unsplash.com/1600x900/?donkey';

$gridBlocks = array($blockOne, $blockTwo, $blockThree, $blockFour);


if (get_row_layout() == 'grid_section' || $rowLayout == 'grid_section') {
?>

  <section class="grid-section padding-top-half grid-section-<?php echo $idx ?>">

    <div class="section-header">
      <span class="icon bg-clr-primary"></span>
      <h3>
        Give us a hand
      </h3>
      <p>
        Some specific roles we can always use help with.
      </p>
    </div>

    <div class="grid-section-inner">

      <?php foreach ($gridBlocks as $listing) { ?>

        <div class="grid-card">
          <div class="grid-card-inner">
            <div class="cover">
              <img data-src="<?php echo $listing->cover ?>" alt="<?php echo $listing->title ?>" class="lazy" />
            </div>
            <div class="info">
              <span class="title">
                <?php echo $listing->title ?>
              </span>
              <p>
                <?php echo $listing->copy ?>
              </p>
            </div>
          </div>
        </div>

      <?php
        #/forEach 
      } ?>

    </div>
  </section>


<?php } ?>