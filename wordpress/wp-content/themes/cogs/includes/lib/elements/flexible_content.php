<?php if ( get_row_layout() == "paragraph_text") { ?>
        <p><?php echo get_sub_field('text')?></p>


<?php } else if ( get_row_layout() == "header_text") { ?>
    <?php $class = get_sub_field('header_size') == "large" ? 'h4' : 'h5 txt-clr-gunmetal'; ?>
    <h6 class=<?php echo $class ?>><?php echo get_sub_field('text') ?></h6>


<?php } else if ( get_row_layout() == "squiggly") { ?>
    <!-- TO DO apply get_sub_field('squiggle_color')-->
    <span class="squiggle"></span>


<?php } else if ( get_row_layout() == "icon") { ?>
    <div class="flexible-content-image" style="--width:<?php echo get_sub_field('width') ?>">
        <?php wp_get_attachment_image( get_sub_field('image'), 'full' ) ?>
    </div>


<?php } else if ( get_row_layout() == "button") { ?>
    <?php 
        $button = get_sub_field('button_link'); 
        $buttonTarget = $link['target'] ? $link['target'] : '_self';
    ?>
    <a href="<?php echo esc_url( $button['url'] ); ?>" class="btn btn-arrow" target="<?php echo esc_attr( $buttonTarget ); ?>">
        <?php echo esc_html( $button['title'] ); ?>
    </a>


<?php } else { ?>
        <?php echo get_row_layout() ?>


<?php } ?>