<?php

/** 
 * Side Labeled Lists
 * 
 * @author Alisha Garric
 * @since 2/2020
 */

/*************************************/
/** Variables */
/*************************************/

class SideLabeledList
{
  public $label;
  public $list;
}

$exampleList = new SideLabeledList();


$exampleList->label = 'Example';
$exampleList->list = array('Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum', 'Lorem Ipsum');

$sideLabeledLists = array($exampleList, $exampleList, $exampleList);

if (get_row_layout() == 'side_labeled_lists' || $rowLayout == 'side_labeled_lists') {
?>

  <section class="side-labeled-lists side-labeled-list-<?php echo $idx ?>">
    <div class="side-labeled-lists-inner">

      <?php foreach ($sideLabeledLists as $listRow) { ?>
        <div class="side-labeled-lists-row">
          <div class="label">
            <h6 class="h4"><?php echo $listRow->label ?><h6>
          </div>
          <div class="items">
            <?php foreach ($listRow->list as $item) { ?>
              <p class="item"><?php echo $item ?></p>
            <?php } ?>
          </div>
        </div>
      <?php } ?>

    </div>
  </section>


<?php } ?>