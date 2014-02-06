<?php
/**
 * Blog Single Block
 */
?>

<div id="blog-single" class="container-wrapper">
	<div class="container">
		<div class="grid">

			<div class="unit span-grid">

				<?php while ( have_posts() ) : the_post(); ?>

					<div class="blog-feed-single">

						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="no-text-decoration"><h1><?php the_title(); ?></h1></a>
						<div class="blog-feed-single-date">Posted on <?php echo get_the_date(); ?> by <?php echo the_author(); ?></div>

						<div class="blog-feed-single-image">

							<?php if(get_field('blog_image')): ?>
								<?php $i = 1; ?>
								<?php while(the_repeater_field('blog_image')): ?>
									<?php $blogimages = wp_get_attachment_image_src(get_sub_field('blog_images'), 'large'); ?>
									<img src="<?php echo $blogimages[0]; ?>" class="blog-image" alt="" />
									<p class="image-numbering"><?php $num_leading_zero = sprintf("%02s", $i); echo $num_leading_zero; $i++; ?></p>
								<?php endwhile; ?>
								
							<?php endif; ?>

						</div>

						<div class="blog-feed-text">

							<div class="blog-feed-single-image-credits">
								<h1>Images</h1>

								<?php if(get_field('blog_image')): ?>
									<ol class="blog-feed-single-image-credit">
										<?php $counter = 1; ?>

										<?php while(the_repeater_field('blog_image')): ?>
											<li>
												<?php $num_leading_zero = sprintf("%02s", $i); echo '- ' . $num_leading_zero; $i++; ?>&nbsp;

												<?php the_sub_field('blog_image_title'); ?>

												<?php 
													if ( get_sub_field('blog_image_credit') ) { 
														echo ' / '; 
														the_sub_field('blog_image_credit'); 
													} 
												?>

											</li>
										<?php endwhile; ?>
									</ol>
								<?php endif; ?>

							</div>

							<div class="blog-feed-single-full-text">
								<h1><?php the_field('blog_post_subheading'); ?></h1>
								<div class="blog-feed-single-full-text-text">
									<?php the_content(); ?>
								</div>
								<div class="blog-feed-single-full-text-tags">
									<?php the_tags(); ?>
								</div>

							</div>

						</div>

					</div>

				<?php endwhile; // end of the loop. ?>

			</div>

			<div class="unit span-grid">
				
				<div class="post-nav blog-previous-post">
					<?php previous_post_link('%link', 'older'); ?>
				</div>
				
				<div class="post-nav blog-next-post">
					<?php next_post_link('%link', 'newer'); ?>
				</div>

			</div>

		</div>
	</div>
</div> <!-- .container-wrapper -->