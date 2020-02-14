<?php /* Template Name: Archive Project */ 

    $filtered = true;
    $tax_name = get_query_var( 'taxonomy' );
    $tax_term = get_query_var( 'term' );
    $tax_term_name = get_term_by('slug', $tax_term, $tax_name)->name;
    include get_template_directory() . '/work-archive-template.php';

?>
