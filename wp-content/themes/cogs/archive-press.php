<?php /* Template Name: Archive Press */ 

   // wp_redirect( home_url( ) );

    $args = array(
        'numberposts' => -1,
        'post_type' => 'press'
    );
                    
    $articles = get_posts( $args );

?>

<?php include 'includes/core/header.php'; ?>

<section id="main-section" class="content row project-list">
    <div class="index-list column xs-12">
      <!-- archive -->
      <div id="archive" data-theme="dark" data-panel-title="archive">
            <?php if ( sizeof($articles) > 0 ){ ?>
                <section class="section section-header bg-black padding-bottom-none padding-top-double">
                    <div class="inner">
                        <h2>Press</h2>
                    </div>
                </section>
                <section class="section press-list bg-black padding-top-half">
                    <div class="inner">
                        <?php foreach ( $articles as $article ) { ?>
                            <a href="<?php echo get_field( 'article_link', $article->ID ) ?>" target="_blank">
                                <div class="left date-and-location">
                                    <?php echo get_the_date('F d, Y', $article->ID); ?></br>
                                    <?php echo get_field( 'article_location', $article->ID) ?>
                                </div>
                                <div class="middle">
                                    <h5 class="h3"><?php echo $article->post_title ?></h5>
                                    <div class="date-and-location mobile-item">
                                        <?php echo get_the_date('F d, Y', $article->ID); ?></br>
                                        <?php echo get_field( 'article_location', $article->ID) ?>
                                    </div>
                                    <p><?php echo $article->post_excerpt ?></p>
                                </div>
                                <div class="right arrow-styles align-top">
                                    <?php echo get_the_post_thumbnail($article->ID, 'full') ?>
                                </div>
                            </a>
                        <?php } ?>
                    </div>
                </section>
            <?php } ?>
      </div>
      <!-- End archive -->
    </div>
</section>

<?php include 'includes/core/footer.php'; ?>
