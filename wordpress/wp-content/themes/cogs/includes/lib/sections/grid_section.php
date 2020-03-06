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
  public $slug;
  public $date;
  public $cover;
}

$blockOne = new GridBlock();
$blockOne->title = 'Lorem Ipsum Solor Sit';
$blockOne->slug = '/';
$blockOne->date = 'February 10th, 2020';
$blockOne->cover = 'https://source.unsplash.com/1600x900/?bike';

$blockTwo = new GridBlock();
$blockTwo->title = 'Lorem Ipsum Solor Sit';
$blockTwo->slug = '/';
$blockTwo->date = 'February 10th, 2020';
$blockTwo->cover = 'https://source.unsplash.com/1600x900/?smile';

$blockThree = new GridBlock();
$blockThree->title = 'Lorem Ipsum Solor Sit';
$blockThree->slug = '/';
$blockThree->date = 'February 10th, 2020';
$blockThree->cover = 'https://source.unsplash.com/1600x900/?community';

$blockFour = new GridBlock();
$blockFour->title = 'Lorem Ipsum Solor Sit';
$blockFour->slug = '/';
$blockFour->date = 'February 10th, 2020';
$blockFour->cover = 'https://source.unsplash.com/1600x900/?community';

$gridBlocks = array($blockOne, $blockTwo, $blockThree, $blockFour);


if (get_row_layout() == 'grid_section') {
?>

  <section class="grid-section grid-section-<?php echo $idx ?>">

    <div class="section-header">
      <span class="icon bg-clr-primary"></span>
      <h3>
        Give us a hand
      </h3>
      <p>
        Whether you are looking to volunteer or just want to come and enjoy the festivities, attending RBP events is a great way to get involved and meet other bike loving folks.
      </p>
    </div>

    <div class="grid-section-inner">

      <?php foreach ($gridBlocks as $listing) { ?>

        <div class="event-listing-card">
          <div class="event-listing-card-inner">
            <div class="cover">
              <img data-src="<?php echo $listing->cover ?>" alt="<?php echo $listing->title ?>" class="lazy" />
            </div>
            <div class="info">
              <span class="date">
                <?php echo $listing->date ?>
              </span>
              <span class="title">
                <?php echo $listing->title ?>
              </span>
            </div>
          </div>
        </div>

      <?php
        #/forEach 
      } ?>

      <div class="event-listing-card view-all">
        <div class="event-listing-card-inner">
          <span class="title">
            See all events
          </span>
        </div>
      </div>

    </div>
  </section>


<?php } ?>