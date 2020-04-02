<?php

/** 
 * Featured News Slider
 * 
 * @author Peter Laxalt
 * @since 2/2020
 * @stylesheet featured-news-slider.scss
 * 
 */

/*************************************/
/** Variables */
/*************************************/

/**
 * @todo: Link to Wordpress Article Loop
 */
class FeaturedNewsListing
{
  public $title;
  public $excerpt;
  public $slug;
  public $date;
  public $cover;
}

$featuredNewsOne = new FeaturedNewsListing();
$featuredNewsOne->title = 'Lorem Ipsum Solor Sit';
$featuredNewsOne->excerpt = 'Lorem ipsum dolor sit amet, an nam tibique mandamus partiendo, vix tota fuisset constituam cu. Reque labores vix no, pro cetero recusabo ea, ut omnesque adipisci intellegam mea. An ius elitr aeterno oportere, mel affert verterem consequat in, eu per elitr animal disputando';
$featuredNewsOne->slug = '/sample-post';
$featuredNewsOne->date = 'February 10th, 2020';
$featuredNewsOne->cover = 'https://source.unsplash.com/1600x900/?bike';

$featuredNewsTwo = new FeaturedNewsListing();
$featuredNewsTwo->title = 'Lorem Ipsum Solor Sit';
$featuredNewsTwo->excerpt = 'Lorem ipsum dolor sit amet, an nam tibique mandamus partiendo, vix tota fuisset constituam cu. Reque labores vix no, pro cetero recusabo ea, ut omnesque adipisci intellegam mea. An ius elitr aeterno oportere, mel affert verterem consequat in, eu per elitr animal disputando';
$featuredNewsTwo->slug = '/sample-post';
$featuredNewsTwo->date = 'February 10th, 2020';
$featuredNewsTwo->cover = 'https://source.unsplash.com/1600x900/?smile';

$featuredNewsThree = new FeaturedNewsListing();
$featuredNewsThree->title = 'Lorem Ipsum Solor Sit';
$featuredNewsThree->excerpt = 'Lorem ipsum dolor sit amet, an nam tibique mandamus partiendo, vix tota fuisset constituam cu. Reque labores vix no, pro cetero recusabo ea, ut omnesque adipisci intellegam mea. An ius elitr aeterno oportere, mel affert verterem consequat in, eu per elitr animal disputando';
$featuredNewsThree->slug = '/sample-post';
$featuredNewsThree->date = 'February 10th, 2020';
$featuredNewsThree->cover = 'https://source.unsplash.com/1600x900/?community';

$featuredNewsListings = array($featuredNewsOne, $featuredNewsTwo, $featuredNewsThree, $featuredNewsOne, $featuredNewsTwo, $featuredNewsThree);

if (get_row_layout() == 'featured_news_slider' || $rowLayout == 'featured_news_slider') {
?>

  <section class="featured-news-slider featured-news-slider-<?php echo $idx ?>">

    <div class="featured-news-slider-header">
      <div class="squiggle-svg squiggle-orange"><?php include get_template_directory() . "/assets/images/squiggle.svg";  ?></div>
      <h1>
        Latest News
      </h1>
    </div>
    <div class="featured-news-slider-inner">
      <div class="featured-news-slider-el featured-news-slider-<?php echo $idx; ?>">

        <?php foreach ($featuredNewsListings as $listing) {
        ?>
          <div class="featured-news-slide">
            <div class="featured-news-slide-inner">
              <div class="news-listing-card">
                <div class="news-listing-card-inner">
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
                      <a href="<?php echo $listing->slug ?>" class="btn btn-arrow">
                        More
                      </a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="featured-news-slide-cover">
                <div class="featured-news-slide-cover-inner">
                  <img data-src="<?php echo $listing->cover ?>" class="lazy" alt="<?php echo $listing->title ?>" />
                </div>
              </div>
            </div>
          </div>
        <?php
          #/foreach
        } ?>


      </div>
    </div>
  </section>


<?php } ?>