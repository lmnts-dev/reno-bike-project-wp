<?php if ( get_row_layout() == "paragraph_text") { ?>
    <?php echo get_sub_field('text')?>


<?php } else if ( get_row_layout() == "header_text") { ?>
    <?php $class = get_sub_field('header_size') == "large" ? 'h4' : 'h5 txt-clr-gunmetal'; ?>
    <h6 class=<?php echo $class ?>><?php echo get_sub_field('text') ?></h6>


<?php } else if ( get_row_layout() == "squiggly") { ?>
    <?php $squiggle['color'] = get_sub_field('squiggle_color') == 'pink' ? 'primary' : get_sub_field('squiggle_color'); ?>
    <?php require ( get_template_directory() . "/assets/images/squiggle-horizontal.php");  ?>


<?php } else if ( get_row_layout() == "icon") { ?>
    <?php $image = get_sub_field('icon_id'); ?>
    <?php $color = get_sub_field('icon_color'); ?>
    <span class='icon fas fa-<?php echo $image ?> txt-clr-<?php echo $color ?>'></span>


<?php } else if ( get_row_layout() == "button") { ?>
    <?php 
        $buttonTarget = get_sub_field('link_type') == 'external' ? 'target="_blank" rel="nofollow noreferrer noopener" ' : ( get_sub_field('link_type') == 'download' ? ' download ' : '' );
        $buttonText = get_sub_field('label'); 
        $buttonLink = get_sub_field('link'); 
    ?>
    <a href="<?php echo esc_url( $buttonLink ); ?>" class="btn btn-arrow" <?php echo $buttonTarget ?>>
        <?php echo esc_html( $buttonText ); ?>
    </a>


<?php } else { ?>
        <?php echo get_row_layout() ?>


<?php } ?>