<?php get_header(); ?>
		<?php get_sidebar(); ?>

		<div id="main-content">

	<?php if (have_posts()) : ?>

		<h2>Search Results</h2>
			
			<?php next_posts_link('&laquo; Older Entries') ?>
			<?php previous_posts_link('Newer Entries &raquo;') ?>

		<?php while (have_posts()) : the_post(); ?>

				<h3>
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">
						<?php the_title(); ?>
					</a>
				</h3>
				<small><?php the_time('l, F jS, Y') ?></small>

				<p>
					<?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | 
					<?php edit_post_link('Edit', '', ' | '); ?>  
					<?php comments_popup_link('No Comments &#187;', '1 Comment &#187;', '% Comments &#187;'); ?>
				</p>
		
		<?php endwhile; ?>

			<?php next_posts_link('&laquo; Older Entries') ?>
			<?php previous_posts_link('Newer Entries &raquo;') ?>

	<?php else : ?>

		<h2>No posts found. Try a different search?</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>
		  			
		</div>
		<!-- End #main-content ================================= -->
		
		
		<?php get_sidebar(); ?>


<?php get_footer(); ?>

