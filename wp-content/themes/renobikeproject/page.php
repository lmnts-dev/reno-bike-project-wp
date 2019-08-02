<?php get_header(); ?>
	<?php get_sidebar(); ?>
	<div id="main-content">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
			<h1><?php the_title(); ?></h1>
		
			<div class="subpage-content"><?php the_content('<p class="serif">Read the rest of this page &raquo;</p>'); ?></div>

			<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

		<?php endwhile; endif; ?>
	
		<?php edit_post_link('Edit this entry.', '<p>', '</p>'); ?>
	</div>
<?php get_footer(); ?>
