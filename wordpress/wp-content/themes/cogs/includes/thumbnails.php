<ul class="thumb-container">
    <!-- Featured Stories Thumbs -->
    <li class="project-preloader"></li>

    <?php
        $p_index = 1;
        while(the_repeater_field('project_list', $homepage_id)):
            $project_id = get_sub_field('project');
    ?>

    <li id="p-<?php echo $p_index; ?>" class="index-thumb-item">
        <div class="index-thumb lazy-bg" style="background-image:url(<?php echo get_the_post_thumbnail_url($project_id, 'thumbnail'); ?>);" data-src="<?php echo get_the_post_thumbnail_url($project_id, 'largest');?>"></div> 
    </li>

    <?php
            $p_index++;
        endwhile;
    ?>
</ul>
