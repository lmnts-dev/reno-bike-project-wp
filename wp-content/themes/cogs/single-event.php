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
                            <span aria-role="button" data-href="<?php echo $facebookShareUrl ?>" class="social-share fab fa-facebook-f"></span>
                        </div>
                        <div>
                            <span aria-role="button" data-href="<?php echo $twitterShareUrl ?>" class="social-share fab fa-twitter"></span>
                        </div>
                    </div>
                </div>

                <?php if ( $fields['detail_items'] ){ ?>
                    <div class="box-container">
                        <?php foreach ( $fields['detail_items'] as $item ){ ?>
                            <div class="item">
                                <div class="label"><?php echo $item['label']; ?></div>
                                <div class="text"><?php echo $item['text']; ?></div>
                                <?php if ( $item['icon_with_link'] ) { ?>
                                    <?php foreach ( $item['icon_with_link'] as $icon ){ ?>
                                        <a href="<?php echo $icon['link'] ?>" target="_blank">
                                            <span class='icon fab fa-<?php echo $icon['icon_id'] ?> txt-clr-primary'></span>
                                        </a>
                                    <?php } ?>
                                <?php } ?>
                            </div>
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
    <?php
        // Loop over segments and construct HTML.
        $address = '';
        foreach( array('street_number', 'street_name', 'city', 'state', 'post_code') as $i => $k ) {
            if ( $k == 'city' ) {
                $seperator = ', ';
            } else if ( $k == 'street_number' || $k == 'state' ) {
                $seperator = ' ';
            }
            else {
                $seperator = '.'; 
            }
            if( isset( $fields['google_maps_location'][ $k ] ) ) {
                $address = $address . $fields['google_maps_location'][ $k ] . $seperator;
            }
        }

        $idx = 'static';
    ?>
    <section class="article-details google-maps padding-top-none padding-bottom-none">
        <div class="acf-map map-el" id="map-<?php echo $idx ?>" data-address="<?php echo $address ?>" data-lat="<?php echo esc_attr($fields['google_maps_location']['lat']); ?>" data-lng="<?php echo esc_attr($fields['google_maps_location']['lng']); ?>" data-zoom="10"></div>
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




