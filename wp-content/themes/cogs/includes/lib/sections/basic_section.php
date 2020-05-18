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



if (get_row_layout() == 'basic_section' || $rowLayout == 'basic_section') {
    if ( get_row_layout() ){
        $headerText = get_sub_field('header_text');
        $headerSize = get_sub_field('header_size');
        $paragraphText = get_sub_field('paragraph_text');
        $buttons = get_sub_field('buttons');
        $alignment = get_sub_field('alignment');
    }
    else {
        $headerText = $headerText ? $headerText : get_the_title();
        $headerSize = $headerSize ? $headerSize : 'h3';
        $paragraphText = $paragraphText ? $paragraphText : '<p>' . get_the_excerpt() . '</p>';
        $buttons = $buttons ? $buttons : false;
        $alignment = $alignment ? $alignment : 'left';
    }

?>
  <section class="basic-section <?php echo get_sub_field('layout') . 'align-' . $alignment; ?> basic-section-<?php echo $idx ?>"> 
    <div class="basic-section-inner">
        <div class="section-header">
            <h3 class="<?php echo $headerSize ?>">

                <?php if ( $alignment == "center" ) { ?>
                    <?php $squiggle['color'] = 'orange' ?>
                    <?php $squiggle['align'] = 'center' ?>
                    <?php require ( get_template_directory() . "/assets/images/squiggle-vertical.php");  ?>
                <?php } else { ?>
                    <?php $squiggle['color'] = 'primary' ?>
                    <?php require ( get_template_directory() . "/assets/images/squiggle-horizontal.php");  ?>
                <?php } ?>

                <span><?php echo $headerText ?></span>
            </h3>
        </div>
        <?php echo $paragraphText ?>
        <?php 
            if ( $buttons ){
                foreach ( $buttons as $button ) { 
                     if ( $button['link_type'] == "download" ) { 
        ?>
                        <a href="<?php echo $button['call_to_action_url']?>" class="btn btn-border-black btn-download" download>
                            <?php echo $button['call_to_action_label']?>
                        </a>
                    <?php } else { ?>
                        <a href="<?php echo $button['call_to_action_url']?>" class="btn btn-arrow" <?php echo $button['link_type'] == 'external' ? ' target="_blank" ' : '' ?>>
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