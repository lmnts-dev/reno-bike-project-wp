<?php

/** 
 * Press Listings
 * 
 * @author Peter Laxalt
 * @since 2/2020
 * @stylesheet: press-listings.scss
 */

/*************************************/
/** Variables */
/*************************************/

/**
 * @todo: Link to Wordpress Article Loop
 */
class PressListing
{
  public $title;
  public $slug;
  public $date;
  public $publisher;
  public $cover;
}

$samplePress = new Listing();
$samplePress->title = "Ashlee’s Toy Closet Helps Kids Who Need It KOLO 8";
$samplePress->slug = "/";
$samplePress->date = "3.19.19";
$samplePress->publisher = "KOLO 8";
$samplePress->cover = "https://source.unsplash.com/1600x900/?blue";

$samplePressTwo = new Listing();
$samplePressTwo->title = "Reno Bike Project Tuning Up and Collecting Bike for Kids in Need";
$samplePressTwo->slug = "/";
$samplePressTwo->date = "3.19.19";
$samplePressTwo->publisher = "Reynolds School of Journalism";
$samplePressTwo->cover = "https://source.unsplash.com/1600x900/?pink";

$pressListings = array(
  $samplePress,
  $samplePressTwo,
  $samplePress,
  $samplePressTwo,
  $samplePress,
  $samplePressTwo,
  $samplePress,
  $samplePressTwo,
);

if (get_row_layout() == 'press_listings') {
?>

  <section class="press-listings press-listings-<?php echo $idx ?>">
    <div class="press-listings-inner">
      <div class="section-header split">
        <h3>
          <span class="squiggle"></span>
          <span>Press & Media</span>
        </h3>
        <p>
          Take a look at some awesome stories about us our friends from the media have written and filmed.
        </p>
      </div>

      <ul>
        <?php foreach ($pressListings as $press) { ?>
          <li>
            <a href="<?php echo $press->slug ?>" target="_blank" title="<?php echo $press->title ?>">
              <span class="tag date">
                <?php echo $press->date ?>
              </span>
              <span class="tag publisher">
                <?php echo $press->publisher ?>
              </span>
              <span class="title">
                <?php echo $press->title ?>
              </span>
            </a>
            <div class="img-wrapper">
              <div>
                <img data-src="<?php echo $press->cover ?>" alt="<?php echo $press->title ?>" class="lazy" />
              </div>
            </div>
          </li>
        <?php } ?>
      </ul>

    </div>
  </section>


<?php } ?>