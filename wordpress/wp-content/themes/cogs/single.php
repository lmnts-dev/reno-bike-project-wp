<?php

/** 
 * Default Article Template
 * 
 * @author Peter Laxalt
 * @since 2/2020
 */

/*************************************/

?>

<?php include 'includes/core/header.php'; ?>

<?php include 'includes/lib/sections/page_hero.php'; ?>

<?php get_template_part('content', get_post_format()); ?>

<?php
// Start the loop.
while (have_posts()) : the_post();
?>

    <article itemscope itemtype="http://schema.org/Article">
        <div class="article-inner">
            <h1 class="page-title">
                <?php the_title(); ?>
            </h1>

            <div class="article-body" itemprop="articleBody">
                <?php
                the_content();
                ?>
            </div>
        </div>
    </article>


<?php
// End the loop. 
endwhile;
?>

<?php include 'includes/core/footer.php'; ?>