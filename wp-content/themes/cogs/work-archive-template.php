<?php /* Template Name: Archive Project for all cases of filtration */ 

    wp_redirect( home_url( ) );

    if ( !$filtered ) {
        $args = array(
            'numberposts' => -1,
            'post_type' => 'project'
        );
    }
    else {
        $args = array(
            'numberposts' => -1,
            'post_type' => 'project',
            $tax_name => $tax_term
        );
    }

    $projects = get_posts( $args );

    $locations = get_terms( array(
        'taxonomy' => 'locations',
        'hide_empty' => false,
    ) );

    $industries = get_terms( array(
        'taxonomy' => 'industries',
        'hide_empty' => false,
    ) );

    

?>

<?php include 'includes/core/header.php'; ?>

<section id="main-section" class="content row project-list">
    <div class="index-list column xs-12">
      <!-- archive -->
      <div id="archive" data-theme="light" data-panel-title="archive">

        <section class="section section-header work-archive-header txt-red padding-bottom-none padding-top-double">
            <div class="inner">

                <div class="work-archive-filters">
                    <h2>
                        <?php 
                            if (!$filtered) {
                            echo "Work";
                            }
                            else {
                            echo $tax_term_name;
                            }
                        ?>
                    </h2>
                    <span class="label">Locations</span>
                    <input type="radio" name="projects" id="locations-checkbox">
                    <span class="label">Industries</span>
                    <input type="radio" name="projects" id="industries-checkbox">
                    <div class="location-filters filters-list">
                        <?php 
                            if ( $filtered  && $tax_name == 'locations' ){
                                echo '<a class="h2" href="/project">All</a>';
                            }
                            foreach ($locations as $location) { 
                                if ( !$filtered || $location->slug != $tax_term ){
                                    echo '<a class="h2" href="/locations/' . $location->slug . '">' . $location->name . '</a>';
                                }
                            } 
                        ?>
                    </div>
                    <div class="industry-filters filters-list">
                        <?php 
                            if ( $filtered && $tax_name == 'industries' ){
                                echo '<a class="h2" href="/project">All</a>';
                            }
                            foreach ($industries as $industry) { 
                                if ( !$filtered || $industry->slug != $tax_term ){
                                    echo '<a class="h2" href="/industries/' . $industry->slug . '">' . $industry->name . '</a>';
                                }
                            } 
                        ?>
                    </div>
                </div>
            </div>
        </section>


          <section class="section project-list-container padding-top-half">
                <div class="inner">
                    <?php foreach ($projects as $project) { ?>
                        <a href="<?php echo get_permalink($project->ID) ?>" class="project-card">
                            <?php //echo get_the_post_thumbnail( $project->ID, 'large' ); ?>
                            <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80">
                            <h3><?php echo $project->post_title ?></h3>
                        </a>
                    <?php } ?>
                </div>
          </section
      </div>
      <!-- End archive -->
    </div>
</section>

<?php include 'includes/footer.php';?>
