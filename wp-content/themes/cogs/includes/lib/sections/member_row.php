<?php

/** 
 * Member Row
 * for displaying a person's photo, name, title and description
 * 
 * @author Alisha Garric
 * @since 3/2020
 * @stylesheet member-row.scss
 * 
 */

/*************************************/
/** Variables */
/*************************************/

class MemberRow
{
  public $title;
  public $excerpt;
  public $slug;
  public $date;
  public $cover;
}

$memberRow = new MemberRow();

//TODO: hookup data to wordpress
$memberRows = array(
  $memberRow,
  $memberRow,
  $memberRow,
  $memberRow,
  $memberRow,
  $memberRow,
  $memberRow,
  $memberRow,
  $memberRow
);

if (get_row_layout() == 'member_row') {

?>
  <section class="member-row <?php echo get_sub_field('layout'); ?> member-row-<?php echo $idx ?>">
    <div class="section-header split">
      <h2>
        <span class="squiggle"></span>

        <span>
          Meet the Staff
        </span>
      </h2>
    </div>
    <?php foreach ($memberRows as $listing) { ?>
      <div class="member-row-item">
        <div class="col img-col">
          <div class="member-row-img">
            <img data-src="https://source.unsplash.com/1600x900/?person" alt="Noah Chubb-Silverman" class="lazy" />
          </div>
        </div>
        <div class="col content-col">
          <div class="content-col-inner">
            <h4>
              Noah Chubb-Silverman
            </h4>
            <p class="txt-clr-gunmetal h5">Co-Founder, Executive Director</p>
            <p>
              A native of Reno, Nevada, Noah Chubb-Silverman has been an avid bicyclist for most of his life, majorly influenced by competitive mountain biking and cycling since the age of 15. In 2001 he moved to Bellingham, Washington and it was there that he first became acquainted with a community bike shop named The Hub. Working as a volunteer at this shop while attending Western Washington University, he saw the impact that a small group of staff and volunteers can make towards helping people get onto bicycles. After graduating in 2005 with a degree in Industrial Technology, Noah moved back to Reno and drew from his experience in Washington to start the Reno Bike Project in October of 2006. He works hard to develop every aspect of the organization.
            </p>
          </div>
        </div>
      </div>
    <?php } ?>
  </section>
<?php } ?>