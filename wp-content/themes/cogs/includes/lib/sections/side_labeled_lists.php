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

if (get_row_layout() == 'side_labeled_lists' || $rowLayout == 'side_labeled_lists') {

  $lists = get_sub_field('list');
?>

  <section class="side-labeled-lists padding-top-none padding-bottom-none side-labeled-list-<?php echo $idx ?>">
    <div class="side-labeled-lists-inner">

      <?php if ( $lists ){ ?>
        <?php foreach ($lists as $list) { ?>
          <div class="side-labeled-lists-row">
            <div class="label">
              <h6 class="h4"><?php echo $list['label'] ?><h6>
            </div>
            <div class="items">
              <?php foreach ($list['list_items'] as $item) { ?>
                <p class="item"><?php echo implode($item) ?></p>
              <?php } ?>
            </div>
          </div>
        <?php } ?>
      <?php } ?>

    </div>
  </section>


<?php } ?>