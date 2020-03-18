<?php

/** 
 * News Listings
 * 
 * @author Peter Laxalt
 * @since 2/2020
 * @stylesheet news-listings.scss
 * 
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
$newsOne->slug = '/sample-post';
$newsOne->date = 'February 10th, 2020';
$newsOne->cover = 'https://source.unsplash.com/1600x900/?bike';

$newsTwo = new Listing();
$newsTwo->title = 'Lorem Ipsum Solor Sit';
$newsTwo->excerpt = 'Lorem ipsum dolor sit amet, an nam tibique mandamus partiendo, vix tota fuisset constituam cu. Reque labores vix no, pro cetero recusabo ea, ut omnesque adipisci intellegam mea. An ius elitr aeterno oportere, mel affert verterem consequat in, eu per elitr animal disputando';
$newsTwo->slug = '/sample-post';
$newsTwo->date = 'February 10th, 2020';
$newsTwo->cover = 'https://source.unsplash.com/1600x900/?smile';

$newsThree = new Listing();
$newsThree->title = 'Lorem Ipsum Solor Sit';
$newsThree->excerpt = 'Lorem ipsum dolor sit amet, an nam tibique mandamus partiendo, vix tota fuisset constituam cu. Reque labores vix no, pro cetero recusabo ea, ut omnesque adipisci intellegam mea. An ius elitr aeterno oportere, mel affert verterem consequat in, eu per elitr animal disputando';
$newsThree->slug = '/sample-post';
$newsThree->date = 'February 10th, 2020';
$newsThree->cover = 'https://source.unsplash.com/1600x900/?community';

$newsListings = array($newsOne, $newsTwo, $newsThree, $newsOne, $newsTwo, $newsThree);

if (get_row_layout() == 'news_listings' || $rowLayout == 'news_listings') {
?>

  <section class="news-listings news-listings-<?php echo $idx ?>">
  <div class="squiggle-svg squiggle-orange squiggle-centered squiggle-short squiggle-vertical"><?php require ( get_template_directory() . "/assets/images/squiggle.svg");  ?></div>

    <div class="news-listings-header">
      <h3>
        Latest News
      </h3>
      <a href="/news-and-press" class="btn btn-border-black">
        All Latest Posts
      </a>
    </div>
    <div class="news-listings-inner">

      <?php foreach ($newsListings as $listing) { ?>

        <a href="<?php echo $listing->slug ?>" class="news-listing-card">
          <div class="news-listing-card-inner">
            <div class="cover">
              <img data-src="<?php echo $listing->cover ?>" alt="<?php echo $listing->title ?>" class="lazy" />
            </div>

            <div class="info">
              <span class="title">
                <?php echo $listing->title ?>
              </span>
              <p class="excerpt">
                <?php echo $listing->excerpt ?>
              </p>
            </div>

            <div class="actions">
              <div class="col">
                <?php echo $listing->date ?>
              </div>

              <div class="col">
                <span class="btn btn-arrow">
                  More
                </span>
              </div>
            </div>

          </div>
        </a>
      <?php
        #/forEach 
      } ?>

      <div class="mobile-btn">
        <a href="/news-and-press" class="btn btn-border-black">
            All Latest Posts
        </a>
      </div>

    </div>
  </section>


<?php } else { ?>


  <section class="news-listings news-listings-<?php echo $idx ?>">
    <div class="squiggle-svg squiggle-orange squiggle-centered squiggle-short squiggle-vertical"><?php require ( get_template_directory() . "/assets/images/squiggle.svg");  ?></div>

    <div class="news-listings-header">
      <h3>
        Latest News
      </h3>
      <a href="/news-and-press" class="btn btn-border-black">
        All Latest Posts
      </a>
    </div>
    <div class="news-listings-inner">

      <?php foreach ($newsListings as $listing) { ?>

        <a href="<?php echo $listing->slug ?>" class="news-listing-card">
          <div class="news-listing-card-inner">
            <div class="cover">
              <img data-src="<?php echo $listing->cover ?>" alt="<?php echo $listing->title ?>" class="lazy" />
            </div>

            <div class="info">
              <span class="title">
                <?php echo $listing->title ?>
              </span>
              <p class="excerpt">
                <?php echo $listing->excerpt ?>
              </p>
            </div>

            <div class="actions">
              <div class="col">
                <?php echo $listing->date ?>
              </div>

              <div class="col">
                <span class="btn btn-arrow">
                  More
                </span>
              </div>
            </div>

          </div>
        </a>
      <?php
        #/forEach 
      } ?>

    </div>
  </section>

<?php } ?>