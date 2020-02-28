<?php

/** 
 * News Listings
 * 
 * @author Peter Laxalt
 * @since 2/2020
 */

/*************************************/
/** Variables */
/*************************************/

/**
 * @todo: Link to Wordpress Article Loop
 */
class Listing
{
  public $title;
  public $excerpt;
  public $slug;
  public $date;
  public $cover;
}

$newsOne = new Listing();
$newsOne->title = 'Lorem Ipsum Solor Sit';
$newsOne->excerpt = 'Lorem ipsum dolor sit amet, an nam tibique mandamus partiendo, vix tota fuisset constituam cu. Reque labores vix no, pro cetero recusabo ea, ut omnesque adipisci intellegam mea. An ius elitr aeterno oportere, mel affert verterem consequat in, eu per elitr animal disputando';
$newsOne->slug = '/';
$newsOne->date = 'February 10th, 2020';
$newsOne->cover = 'https://source.unsplash.com/1600x900/?bike';

$newsTwo = new Listing();
$newsTwo->title = 'Lorem Ipsum Solor Sit';
$newsTwo->excerpt = 'Lorem ipsum dolor sit amet, an nam tibique mandamus partiendo, vix tota fuisset constituam cu. Reque labores vix no, pro cetero recusabo ea, ut omnesque adipisci intellegam mea. An ius elitr aeterno oportere, mel affert verterem consequat in, eu per elitr animal disputando';
$newsTwo->slug = '/';
$newsTwo->date = 'February 10th, 2020';
$newsTwo->cover = 'https://source.unsplash.com/1600x900/?smile';

$newsThree = new Listing();
$newsThree->title = 'Lorem Ipsum Solor Sit';
$newsThree->excerpt = 'Lorem ipsum dolor sit amet, an nam tibique mandamus partiendo, vix tota fuisset constituam cu. Reque labores vix no, pro cetero recusabo ea, ut omnesque adipisci intellegam mea. An ius elitr aeterno oportere, mel affert verterem consequat in, eu per elitr animal disputando';
$newsThree->slug = '/';
$newsThree->date = 'February 10th, 2020';
$newsThree->cover = 'https://source.unsplash.com/1600x900/?community';

$newsListings = array($newsOne, $newsTwo, $newsThree);

?>

<section class="news-listings">
  <span class="squiggle"></span>
  
  <div class="news-listings-header">
    <h3>
      Latest News
    </h3>
    <a href="/" class="btn btn-border-black">
      All Latest Posts
    </a>
  </div>
  <div class="news-listings-inner">

    <?php foreach ($newsListings as $listing) { ?>

      <div class="news-listing-card">
        <div class="news-listing-card-inner">
          <div class="cover">
            <img data-src="<?php echo $listing->cover ?>" alt="<?php echo $listing->title ?>" class="lazy" />
          </div>

          <div class="info">
            <span class="title">
              <?php echo $listing->title ?>
            </span>
            <span class="excerpt">
              <?php echo $listing->excerpt ?>
            </span>
          </div>

          <div class="actions">
            <div class="col">
              <?php echo $listing->date ?>
            </div>

            <div class="col">
              <a href="<?php echo $listing->slug ?>" class="btn btn-arrow">
                More
              </a>
            </div>
          </div>

        </div>
      </div>
    <?php
      #/forEach 
    } ?>

  </div>
</section>