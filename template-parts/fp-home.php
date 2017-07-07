<div class="page" id="page">
	<div role="main">
		<h1 class="section-title"><?php
			$page_for_posts_id = get_option( 'page_for_posts' );
			echo get_post_field( 'post_content', $page_for_posts_id );
		?></h1>
		<?php if ( ! is_active_sidebar( 'sidebar-1' ) ) : ?>
			<div class="l-one-col">
		<?php endif; ?>
		<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
			<div class="l-two-col">
		<?php endif; ?>
			<div class="l-main">
				<section class="section hoagies">
					<ul class="post-list">
						<?php
							query_posts( 'category_name=uncategorized&posts_per_page=20&paged='.get_query_var( 'paged' ) );
							while ( have_posts() ) : the_post();
						?>
							<li>
								<div class="block block-hoagie">
									<a href="<?php the_permalink(); ?>" class="b-inner cf">
										<h2 class="headline"><?php the_title(); ?></h2>
										<div class="b-thumb">
												<?php echo get_the_post_thumbnail( $post, 'medium' ); ?>
											</div>
										<div class="b-text">
											<?php the_excerpt(); ?>
										</div>
									</a>
								</div>

							</li>
						<?php
							endwhile;
							// Previous/Next page navigation.
							the_posts_pagination();
						?>
					</ul>
				</section>
				</div><!--end l-main-->
			<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
				<div class="l-sidebar">
					<?php dynamic_sidebar( 'sidebar-1' ); ?>
				</div><!--end l-sidebar-->
			<?php endif; ?>
		</div>
	</div><!--End role=main-->
</div>