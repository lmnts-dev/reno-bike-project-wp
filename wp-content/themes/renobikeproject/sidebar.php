		<div id="sidebar">		
			
			
			<?php if(is_page()) { 
				simple_section_nav('before_widget=<div class="widget subnav">&after_widget=</div>&show_on_home=0&before_title=<h3>&after_title=</h3>');
			 	} else { ?>
			 	
			 					
				<div class="widget">
					<h3 style="font-size: 12px; padding-top: 1px">Bike of the Month</h3>
					<div style="text-align: center">
							<?php
							global $post;
							$recent_posts = get_posts('numberposts=1&post_type=bike');
							foreach($recent_posts as $post) :
							setup_postdata($post); ?>
									<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
									<?php the_post_thumbnail('bike-image'); ?>

										<?php the_title(); ?>
									</a>
							<?php endforeach; ?>
					</div>
				</div>
				
				<?php
				
				if ( ! dynamic_sidebar( 'sidebar' ) ) : endif; ?>

				
				<!--<div class="widget events">
					<h3>Upcoming</h3>
					<div>
						<ul>
							<?php
							global $post;
							$recent_posts = get_posts('numberposts=5&tags=event');
							foreach($recent_posts as $post) :
							setup_postdata($post); ?>
								<li class="clr">
									<span><?php the_time('M'); ?> <?php the_time('j'); ?></span>
									<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
										<?php the_title(); ?>
									</a>
								</li>
							<?php endforeach; ?>
	
							<li class="clr">	<span>April 3</span>			<a href="#">Bike to Work Day</a>	</li>
						</ul>
						<a href="http://renobikeproject.org/events/month" class="all-events">See All Events</a>
					</div>
				</div>			
				End Widget -->
			<?php }; ?>

		</div>
		<!-- End #sidebar -->