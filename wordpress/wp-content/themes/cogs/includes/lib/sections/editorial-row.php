<?php

/** 
 * Editorial Row
 * Your standard image left / right, text left / right block.
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
class editorialRowSchema
{
  public $headline;
  public $paragraph;
  public $ctaLabel;
  public $slug;
  public $img;
  public $reverse;
}

$editorialRow = new editorialRowSchema();
$editorialRow->headline = 'Reno Bike Project is a nonprofit community bicycle shop and resource';
$editorialRow->paragraph = 'Reno Bike Project (RBP) is a 501(c)(3) non-profit community bicycle shop and resource for the Truckee Meadows committed to creating a nationally recognized, cycling-friendly community through education, cooperation and advocacy.';
$editorialRow->ctaLabel = 'Our Story';
$editorialRow->slug = '/';
$editorialRow->img = 'https://source.unsplash.com/1600x900/?wheel';
$editorialRow->reverse = false;

$editorialRowClass = 'editorial-row';

if ($editorialRow->reverse == true) {
  $editorialRowClass = 'editorial-row reverse';
}


?>

<section class="<?php echo $editorialRowClass ?>">
  <div class="editorial-row-inner">
    <div class="col content-col">
      <div class="content-col-inner">
        <span class="squiggle"></span>
        <h4>
          <?php echo $editorialRow->headline ?>
        </h4>
        <p>
          <?php echo $editorialRow->paragraph ?>
        </p>
        <?php if ($editorialRow->slug && $editorialRow->ctaLabel) { ?>
          <a href="<?php echo $editorialRow->slug ?>" class="btn btn-arrow" />
          <?php echo $editorialRow->ctaLabel ?>
          </a>
        <?php } ?>
      </div>
    </div>

    <div class="col img-col">
      <div class="editorial-row-img">
        <img data-src="<?php echo $editorialRow->img ?>" alt="<?php echo $editorialRow->headline ?>" class="lazy" />
      </div>
    </div>
  </div>
</section>


<!-- @todo: EXAMPLE ROW REMOVE -->
<section class="editorial-row reverse">
  <div class="editorial-row-inner">
    <div class="col content-col">
      <div class="content-col-inner">
        <span class="squiggle"></span>
        <h4>
          <?php echo $editorialRow->headline ?>
        </h4>
        <p>
          <?php echo $editorialRow->paragraph ?>
        </p>
        <?php if ($editorialRow->slug && $editorialRow->ctaLabel) { ?>
          <a href="<?php echo $editorialRow->slug ?>" class="btn btn-arrow" />
          <?php echo $editorialRow->ctaLabel ?>
          </a>
        <?php } ?>
      </div>
    </div>

    <div class="col img-col">
      <div class="editorial-row-img">
        <img data-src="https://source.unsplash.com/1600x900/?cycle" alt="<?php echo $editorialRow->headline ?>" class="lazy" />
      </div>
    </div>
  </div>
</section>