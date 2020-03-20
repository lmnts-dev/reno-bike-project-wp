<?php

/** 
 * Basic Section
 * header section on top of paragraph text on top of optional buttons
 * 
 * @author Alisha Garric
 * @since 3/2020
 * @stylesheet basic-section.scss
 * 
 */

/*************************************/
/** Variables */
/*************************************/

$headerText = get_sub_field('header_text');
$headerSize = get_sub_field('header_size');
$paragraphText = get_sub_field('paragraph_text');
$buttons = get_sub_field('buttons');
$alignment = get_sub_field('alignment');

if (get_row_layout() == 'basic_section' || $rowLayout == 'basic_section') {

?>
  <section class="basic-section padding-top-half <?php echo get_sub_field('layout') . 'align-' . $alignment; ?> basic-section-<?php echo $idx ?>"> 
    <div class="basic-section-inner">
        <div class="section-header">
            <h3 class="<?php echo $headerSize ?>">
                <div class="squiggle-svg <?php echo $alignment == "center" ? "squiggle-vertical squiggle-centered squiggle-orange" : "squiggle-pink" ?>"><?php require ( get_template_directory() . "/assets/images/squiggle.svg");  ?></div>
                <span><?php echo $headerText ?></span>
            </h3>
        </div>
        <?php echo $paragraphText ?>
        <?php 
            if ( $buttons ){
                foreach ( $buttons as $button ) { 
                     if ( $button['button_style'] == "file" ) { 
        ?>
                        <a href="<?php echo $button['call_to_action_url']?>" class="btn btn-border-black btn-download" download>
                            <?php echo $button['call_to_action_label']?>
                        </a>
                    <?php } else { ?>
                        <a href="<?php echo $button['call_to_action_url']?>" class="btn btn-arrow" download>
                            <?php echo $button['call_to_action_label']?>
                        </a>
        <?php 
                    }
                }
            } 
        ?>
    </div>
  </section>
<?php } ?>