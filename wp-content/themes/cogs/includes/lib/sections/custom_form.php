<?php

/** 
 * Custom Form
 * 
 * @author Peter Laxalt and Alisha Garric
 * @since 5/2020
 * 
 */

/*************************************/

if (get_row_layout() == 'custom_form' || $rowLayout == 'sections/custom_form') :

  $submitLabel = get_sub_field('submit_button_label');
  $actionLink = get_sub_field('formspree_action_link');
  $rows = get_sub_field('field_rows');
?>

  <section class="custom-form io">
    <div class="custom-form-inner">
      <form class="col input-grid-container" action="<?php echo $actionLink ?>" method="POST">

        <!-- for each row in form -->
        <?php if ( $rows ) : ?>
          <?php foreach ( $rows as $row ) { ?>

            <!-- get width of items in row and how many fields in each row so we can iterate through them -->
            <?php $width = ($row['how_many_columns'] == 'one') ? '100' : '50'; ?>
            <?php $iteration = ($row['how_many_columns'] == 'two') ? 2 : 1; ?>

            <!-- for each field in row -->
            <?php for ( $x = 0; $x < $iteration; $x++ ) { ?>

              <!-- get all variables for field -->
              <?php 
                $fieldDetails = ($x == 0) ? $row['first_field_details'] : $row['second_field_details']; 
                $placeholder = $fieldDetails['placeholder_text'] . ($fieldDetails['required'] ? '*' : '');
                $label = $fieldDetails['label'];
                $name = $fieldDetails['reply_to'] ? '_replyto' : $fieldDetails['label'];
                $ID = $name; 
                $options = $fieldDetails['options']; 
                $required = $fieldDetails['required'] ? 'required' : false; 
                $description = $fieldDetails['description'] ? $fieldDetails['description'] : false;
                $field = ($row['how_many_columns'] == 'separator') ? 'separator' : $row['field'];
              ?>

              <!-- separator field -->
              <?php if ( $field == 'separator' ) : ?>
                <div class="separator"></div>
              <?php endif; ?>

              <!-- text field -->
              <?php if ( $field == 'text' ) : ?>
                <div class="input-wrapper input-text input-col-<?php echo $width ?> input-col-100-sm item-<?php echo $x ?>">
                  <label for= "<?php echo $name ?>"><?php echo $label ?></label>
                  <input type="text" placeholder= "<?php echo $placeholder ?>" name= "<?php echo $name ?>" id="<?php echo $ID ?>" <?php echo $required ?>>
                </div>
              <?php endif; ?>

              <!-- header field -->
              <?php if ( $field == 'header' ) : ?>
                <div class="input-wrapper input-col-<?php echo $width ?> input-col-100-sm" item-<?php echo $x ?>>
                    <h5><?php echo $label ?></h5>
                    <?php if ($description) : ?><p><?php echo $description ?></h5><?php endif; ?>
                </div>
              <?php endif; ?>

              <!-- dropdown field -->
              <?php if ( $field == 'dropdown' ) : ?>
                <div class="input-wrapper input-dropdown input-col-<?php echo $width ?> input-col-100-sm" item-<?php echo $x ?>>
                  <input type="text" placeholder= "<?php echo $placeholder ?>" name= "<?php echo $name ?>" value=""  id="<?php echo $ID ?>" <?php echo $required ?>>

                  <div class="input-dropdown-el">
                    <div class="input-dropdown-value" data-input-for="<?php echo $placeholder ?>">
                      <?php echo $placeholder ?>
                    </div>
                    <div class="input-dropdown-list" data-input-for="<?php echo $placeholder ?>">
                      <ul>
                        <?php foreach ( $options as $option ) { ?>
                          <li class="dropdown-selection-application"><?php echo $option['option'] ?></li>
                        <?php } ?>
                      </ul>
                    </div>
                  </div>
                </div>
              <?php endif; ?>

              <!-- checkboxes field -->
              <?php if ( $field == 'checkboxes' ) : ?>
                <div class="input-wrapper input-checkboxes input-col-100 input-col-100-sm" item-<?php echo $x ?>>
                    <?php foreach ($options as $option) : ?>
                        <div class="input-checkbox">
                            <input type="checkbox" name="<?php echo $name ?>" id="<?php echo $option['option'] ?>" value="<?php echo $option['option'] ?>" <?php echo $required ?>>
                            <label class="checkbox-label" for="<?php echo $option['option']?>">
                                <?php echo $option['option'] ?>
                            </label>
                        </div>
                    <?php endforeach ?>
                </div>
              <?php endif; ?>


              <!-- textarea field -->
              <?php if ( $field == 'textarea' ) : ?>
                <div class="input-wrapper input-textarea input-col-100">
                  <textarea rows="4" name="<?php echo $name ?>" placeholder="<?php echo $placeholder ?>" <?php echo $required ?>></textarea>
                </div>
              <?php endif; ?>

              <!-- legal checkbox field -->
              <?php if ( $field == 'legal' ) : ?>
                <div class="input-wrapper input-checkbox input-col-100">
                  <input type="checkbox" name="<?php echo $name ?>" id="<?php echo $placeholder ?>" checked <?php echo $required ?>>
                  <label for="<?php echo $placeholder ?>">
                    <?php echo $description ?>
                  </label>
                </div>
              <?php endif; ?>

            <?php } // end field iteration ?>

          <?php } //end row forloop ?>
        <?php endif; ?>

        <div class="input-wrapper input-submit input-col-100">
          <button class="btn btn-arrow btn-clr-black btn-lg">
            <span>
              <?php echo $submitLabel ?>
            </span>
          </button>
        </div>

      </form>
    </div>
  </section>


<?php endif; ?>