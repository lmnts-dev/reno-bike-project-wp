<?php get_header(); ?>
	
		<div id="main-content" class="clr">

			<!-- Start the Loop. -->
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	

			<div class="entry">
				<div class="entry-content">
					<h1><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
					<div class="text"><?php the_content(); ?></div>
											<div class="respond"><?php comments_template(); ?></div>


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

