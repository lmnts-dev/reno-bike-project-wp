<?php if ( get_row_layout() == "paragraph_text") { ?>
        <p><?php echo get_sub_field('text')?></p>


<?php } else if ( get_row_layout() == "header_text") { ?>
    <?php $class = get_sub_field('header_size') == "large" ? 'h4' : 'h5 txt-clr-gunmetal'; ?>
    <h6 class=<?php echo $class ?>><?php echo get_sub_field('text') ?></h6>


<?php } else if ( get_row_layout() == "squiggly") { ?>
    <!-- TO DO apply get_sub_field('squiggle_color')-->
    <span class="squiggle"></span>


<?php } else if ( get_row_layout() == "icon") { ?>
    <?php $image = get_sub_field('image'); ?>
    <div class="flexible-content-icon" style="--width:<?php echo get_sub_field('width') . 'px' ?>">
        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
    </div>


<?php } else if ( get_row_layout() == "button") { ?>
    <?php 
        $button = get_sub_field('button_link'); 
        $buttonTarget = $button['target'] ? $button['target'] : '_self';
        $buttonText = $button['title'];
        $buttonLink = $button['url'];
    ?>
    <a href="<?php echo esc_url( $buttonLink ); ?>" class="btn btn-arrow" target="<?php echo esc_attr( $buttonTarget ); ?>">
        <?php echo esc_html( $buttonText ); ?>
    </a>


<?php } else { ?>
        <?php echo get_row_layout() ?>


<?php } ?>