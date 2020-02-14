<?php get_header(); ?>
		<?php get_sidebar(); ?>

		<div id="main-content">

			<!-- Start the Loop. -->
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	

			<div class="entry">
				<div class="entry-content">
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<?php the_content(); ?>
					<p><a href="<?php the_permalink(); ?>">Read more...</a></p>
				</div><!--End .entry-content-->
				<span class="meta">
					<strong><?php the_time('M'); ?></strong>
					<?php the_time('j'); ?>
					<?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?>
					<em>posted by <?php the_author_posts_link(); ?></em>
				</span>
			</div>
			<!-- End .entry ====================================== -->
			
		  <!-- Stop The Loop -->
		  <?php endwhile; else: ?><p>Sorry, no posts matched your criteria.</p><?php endif; ?>
		  			
		</div>
		<!-- End #main-content ================================= -->
		
		
		<?php get_sidebar(); ?>


<?php get_footer(); ?>
