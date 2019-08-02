<?php get_header(); ?>
	
		<div id="main-content">

			<!-- Start the Loop. -->
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	

			<div class="entry">
			
					<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					<div class="text">
					<br />
					<?php the_post_thumbnail('large'); ?>
					<br />
					<?php the_content(); ?></div>

			</div>
			<!-- End .entry ====================================== -->
			
		  <!-- Stop The Loop -->
		  <?php endwhile; else: ?><p>Sorry, no posts matched your criteria.</p><?php endif; ?>
		  			
		</div>
		<!-- End #main-content ================================= -->
		
		
		<?php get_sidebar(); ?>


<?php get_footer(); ?>

