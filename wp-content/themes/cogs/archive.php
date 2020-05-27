<?php

/** 
 * General Archive Template
 * 
 * @author Alisha Garric
 * @since 4/2020
 */

/*************************************/

?>

<?php include 'includes/core/header.php'; ?>
<?php
    if ( get_query_var( 'paged' ) == 0 || !have_posts() ) {
        $schema = array(
            'headline' => get_the_archive_title(),
            'excerpt' => ' ',
            'image' => get_the_post_thumbnail_url()
        );
        addComponent( "page_hero", $schema );
    }
?>



<section class="news-listings padding-top-half news-listings-archive <?php echo get_query_var( 'paged' ) > 0 ? 'margin-top' : ''; ?>">

    <?php if ( get_query_var( 'paged' ) > 0 ) { ?>
        <div class="page-count"> <?php echo get_query_var( 'paged' ) . ' / ' . $wp_query->max_num_pages . ' pages' ?></div>
    <?php }?>

    <div class="news-listings-inner">
        <?php if (have_posts()) { ?>

            <?php while (have_posts()) {
                the_post();
                $article = $post;
            ?>

                <a href="<?php echo get_post_permalink($article) ?>" class="news-listing-card">
                    <div class="news-listing-card-inner">
                    <div class="cover">
                        <img data-src="<?php echo get_the_post_thumbnail_url( $article ) ?>" alt="<?php echo $article->post_title ?>" class="lazy" />
                    </div>

                    <div class="info">
                        <span class="title">
                        <?php echo $article->post_title ?>
                        </span>
                        <?php if ( $article->post_excerpt ) { ?>
                            <p class="excerpt">
                                <?php echo $article->post_excerpt ?>
                            </p>
                        <?php } ?>
                    </div>

                    <div class="actions">
                        <div class="col">
                        <?php echo date('F j, Y', strtotime($article->post_date)) ?>
                        </div>

                        <div class="col">
                        <span class="btn btn-arrow">
                            More
                        </span>
                        </div>
                    </div>

                    </div>
                </a>
            <?php } #/while ?>

            <div class="pagination">
                <nav>
                    <div class="nav-links">
                    <?php echo custom_pagination(); ?>
                    </div>
                </nav>
            </div>


        <?php } #/if posts ?>

    </div>
</section>

<?php
    //set global post as the page chosen as 'posts page' so data can be used for the sections
    global $post;
    $post = get_post( get_option( 'page_for_posts' ));

    if (have_rows('sections', $post )) {
        $idx = 0; // Establish our index.

        while (have_rows('sections')) {
            the_row();

            addComponent(get_row_layout());

            $idx++; // Increment our index.
        }
    } 

    //reset posts query to original query
    wp_reset_postdata(); 
?>

<?php addComponent("block_row"); ?>
<?php addComponent("newsletter_row"); ?>

<?php include 'includes/core/footer.php'; ?>
