<?php

/** 
 * Donate Row integration with Paypal buttons
 * 
 * @author Alisha Garric
 * @since 3/2020
 * 
 */

/*************************************/
/** Variables */
/*************************************/

if (get_row_layout() == 'donate_row' || $rowLayout == 'donate_row') {

  $headline = get_sub_field('headline');
  $description = get_sub_field('description');
  $securityImage = get_sub_field('security_image');
  $buttons = get_sub_field('buttons');
?>

<section class="donate-row <?php echo get_sub_field('layout'); ?> donate-row-<?php echo $idx ?>">
    <div class="donate-row-inner">
        <div class="buttons col">
            <?php if ( $buttons ) { ?>
                <?php foreach ( $buttons as $key=>$button ) { ?>
                    <?php
                        $code = $button['paypal_generated_button_code'];
                        $find = '<input type="image"';
                        $replace = '<label for="btn-' . $key . '">' . $button['label'] . '</label>' . $find . ' id="btn-' . $key . '"';
                        $code = str_replace( $find, $replace, $code );
                        $code = str_replace( ' USD - monthly', '', $code );
                        $code = str_replace( ' USD - yearly', '', $code );
                        $code = str_replace( ': : ', '', $code );
                        echo $code;
                    ?>
                <?php } ?>
            <?php } ?>
        </div>
        <div class="description col">
            <?php $squiggle['color'] = 'primary' ?>
            <?php require ( get_template_directory() . "/assets/images/squiggle-horizontal.php");  ?>
            <h2 class="h3"><?php echo $headline ?></h2>
            <p><?php echo $description ?>
            <?php if ( $securityImage ) { ?>
                <img src="<?php echo $securityImage ?>" alt="Seure Donation"/>
            <?php } ?>
        </div>        
    </div>
</section>

<?php } ?>