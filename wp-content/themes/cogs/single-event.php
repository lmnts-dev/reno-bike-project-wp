<?php

/** 
 * Default Event Post Template
 * 
 * @author Alisha Garric
 * @since 4/2020
 */
//TODO Social Icons
/*************************************/

?>

<?php include 'includes/core/header.php'; ?>

<?php get_template_part('content', get_post_format()); ?>

<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $api['key'] ?>"></script>

<?php
    // Start the loop.
    while (have_posts()) : the_post();

    // Social URLS and data
    $facebookShareUrl = "https://www.facebook.com/sharer.php?u=" . get_the_permalink();
    $twitterShareUrl = "https://twitter.com/intent/tweet?url=" . get_the_permalink() . "&text=" . get_the_title() . "&via=renobikeproject&hashtags=bikes,diy,community,reno,nevada" . get_the_tags();
    $fields = get_fields();
    $eventObject = createEventObject( $post );
    $apis = get_field('api_keys', 'options');
    $api['key'] = $apis['google_maps'];

    // Deprecated
    // $linkedInShareUrl = "https://www.linkedin.com/shareArticle?mini=true&url=" . get_the_permalink() . "&title=" . get_the_title() . "&summary=" . get_the_excerpt();
?>


<article class="event-article" itemscope itemtype="http://schema.org/Article">
    <div class="article-inner">
        <div class="article-header">

            <div class="tags">
                <ul itemprop="keywords">
                    <?php $eventType = $eventObject->passedEvent ? 'Past' : 'Upcoming'; ?>
                    <li>
                    <a href="<?php echo get_post_type_archive_link( 'event' ) ?>">
                        <?php echo $eventType ?>  Events
                    </a>
                    </li>
                    <?php the_tags('<li>', '</li><li>', '</li>'); ?>
                </ul>
            </div>

            <h1>
                <?php the_title(); ?>
            </h1>

            <div class="details-box">

                <div class="text-container">
                    <div class="date" itemprop="datePublished">
                        <?php echo $eventObject->displayDate ?>
                    </div>
                    <div class='location'>
                        <?php echo $fields['location']; ?>
                    </div>  
                    <div class="social-icons">
                        <div>
                            <span aria-role="button" data-href="<?php echo $facebookShareUrl ?>" class="social-share">
                                F
                            </span>
                        </div>
                        <div>
                            <span aria-role="button" data-href="<?php echo $twitterShareUrl ?>" class="social-share">
                                T
                            </span>
                        </div>
                    </div>
                </div>

                <?php if ( $fields['detail_items'] ){ ?>
                    <div class="box-container">
                        <?php foreach ( $fields['detail_items'] as $item ){ ?>
                            <div class="item"><div class="label"><?php echo $item['label']; ?></div>
                            <div class="text"><?php echo $item['text']; ?></div></div>
                        <?php } ?>
                    </div>
                <?php } ?>

            </div>

        </div>

        <div class="description-block">
            <div class="description" itemprop="articleBody">
                <?php echo get_the_excerpt() ?>
                <div class="more">
                    <?php echo $fields['additional_description']; ?>
                </div>
            </div>
            <?php if (has_post_thumbnail()) { ?>
                <div class="image">
                    <div>
                        <img itemprop="image" data-src="<?php echo get_the_post_thumbnail_url(); ?>" class="lazy" alt="<?php echo get_the_title(); ?>" />
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</article>

<?php if( $fields['google_maps_location'] ): ?>
    <section class="article-details google-maps">
        <div class="acf-map map-el" id="map-<?php echo $idx ?>" data-lat="<?php echo esc_attr($fields['google_maps_location']['lat']); ?>" data-lng="<?php echo esc_attr($fields['google_maps_location']['lng']); ?>" data-zoom="4"></div>
    </div>
<?php endif; ?>

<?php if( '' !== $post->post_content ) { ?>
    <section class="article-details article-body">
        <?php
            the_content();
        ?>
    </section>
<?php } ?>

<section class="article-details article-footer">
    <div class="event-post-nav">

        <?php if (get_previous_post()->ID != get_the_ID()) : ?>
            <?php if (is_a(get_previous_post(), 'WP_Post')) : ?>
                <?php $eventObject = createEventObject( get_previous_post() ); ?>
                <a href="<?php echo get_permalink(get_previous_post()->ID); ?>" class="prev-post">
                    <div class="arrow">Previous Event</div>
                    <div class="h4"><?php echo get_the_title(get_previous_post()->ID) ?></div>
                    <div class="date"><?php echo $eventObject->displayDate ?></div>
                </a>
            <?php endif; ?>
        <?php endif; ?>

        <?php if (get_next_post()->ID != get_the_ID()) : ?>
            <?php if (is_a(get_next_post(), 'WP_Post')) : ?>
                <?php $eventObject = createEventObject( get_next_post() ); ?>
                <a href="<?php echo get_permalink(get_next_post()->ID); ?>" class="next-post">
                    <div class="arrow">Next Event</div>
                    <div class="h4"><?php echo get_the_title(get_next_post()->ID) ?></div>
                    <div class="date"><?php echo $eventObject->displayDate ?></div>
                </a>
            <?php endif; ?>
        <?php endif; ?>

    </div>
</section>


<?php
// End the loop. 
endwhile;
?>

<?php addComponent("newsletter_row"); ?>

<?php include 'includes/core/footer.php'; ?>




