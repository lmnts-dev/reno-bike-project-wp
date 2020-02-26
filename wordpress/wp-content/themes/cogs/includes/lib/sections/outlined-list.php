<?php

/** 
 * Interactive Outlined List
 * Site Navigation
 * 
 * @author Peter Laxalt
 * @since 2/2020
 */

/*************************************/
/** Variables */
/*************************************/

/**
 * @todo Convert to ACF
 */
class Link
{
  public $label;
  public $url;
  public $focus;
  public $image;
}

$getInvolved = new Link();
$getInvolved->label = 'Get Involved';
$getInvolved->url = '/';
$getInvolved->focus = false;
$getInvolved->img = 'https://source.unsplash.com/1600x900/?dog';

$programs = new Link();
$programs->label = 'Programs';
$programs->url = '/';
$programs->focus = false;
$programs->img = 'https://source.unsplash.com/1600x900/?cat';

$events = new Link();
$events->label = 'Events';
$events->url = '/';
$events->focus = false;
$events->img = 'https://source.unsplash.com/1600x900/?wolf';

$ourStory = new Link();
$ourStory->label = 'Our Story';
$ourStory->url = '/';
$ourStory->focus = false;
$ourStory->img = 'https://source.unsplash.com/1600x900/?bear';

$newsPress = new Link();
$newsPress->label = 'News & Press';
$newsPress->url = '/';
$newsPress->focus = false;
$newsPress->img = 'https://source.unsplash.com/1600x900/?banana';

$shop = new Link();
$shop->label = 'Shop';
$shop->url = '/';
$shop->focus = false;
$shop->img = 'https://source.unsplash.com/1600x900/?bird';

$members = new Link();
$members->label = 'Members';
$members->url = '/';
$members->focus = false;
$members->img = 'https://source.unsplash.com/1600x900/?monkey';

$donate = new Link();
$donate->label = 'Donate';
$donate->url = '/';
$donate->focus = false;
$donate->img = 'https://source.unsplash.com/1600x900/?duck';


$linkList = array($getInvolved, $programs, $events, $ourStory, $newsPress, $shop, $members, $donate);

?>

<div class="outlined-list">
  <div class="outlined-list-inner">
    <ul>
      <?php foreach ($linkList as $link) { ?>
        <li <?php echo $focus ? 'class="active"' : 'class="inactive' ?>>
          <span>
            <a href="<?php echo $link->url ?>">
              <?php echo $link->label ?>
            </a>
          </span>
          <div>
            <img src="<?php echo $link->img ?>" alt="<?php echo $link->label ?>" />
          </div>
        </li>
      <?php
        #/forEach
      } ?>
    </ul>
  </div>
</div>