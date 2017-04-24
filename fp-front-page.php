<div class="page" id="page">
	<div role="main">
		<section class="hero-and-insets">
			<?php
query_posts( 'cat=6' );
$has_posts_cat6 = false;
while ( have_posts() ) : the_post();
	$has_posts_cat6 = true;
?>
				<div class="block block-hero">
	<a href="<?php the_permalink(); ?>" class="inner">
		<div class="b-thumb">
			<?php echo get_the_post_thumbnail( $post->ID, 'full' ); ?>
		</div>
		<div class="b-text">
			<h2 class="headline"><?php the_title(); ?></h2>
		</div>
	</a>
</div>

			<?php endwhile; ?>

			<?php
query_posts( 'cat=11' );
$has_posts_cat11 = false;
while ( have_posts() ) : the_post();
	$has_posts_cat11 = true;
?>
				<div class="block block-inset">
	<a href="<?php the_permalink(); ?>" class="inner">
		<div class="b-thumb">
			<?php echo get_the_post_thumbnail( $post->ID, 'full' ); ?>
		</div>
		<div class="b-text">
			<h2 class="headline"><?php the_title(); ?></h2>
		</div>
	</a>
</div>

			<?php endwhile; ?>
		</section>

		<?php if ( $has_posts_cat6 || $has_posts_cat11 ) : ?>
			<hr />
		<?php endif; ?>

		<div class="l-two-col">
			<div class="l-main">
				<section class="section latest-posts">
					<h2 class="section-title"><?php
query_posts( 'cat=1' );
global $wp_query;
$post_count = $wp_query->found_posts;
$post_counter = 0;
echo _n('Latest Post', 'Latest Posts', $post_count, 'fepper');
?></h2>
					<ul class="post-list">
						<?php
while ( have_posts() && $post_counter < 5 ) : the_post();
?>
							<li>
								<div class="block block-thumb">
	<a href="<?php the_permalink(); ?>" class="b-inner cf">
		<h2 class="headline"><?php the_title(); ?></h2>
		<div class="b-thumb">
			<?php echo get_the_post_thumbnail( $post->ID, 'medium' ); ?>
		</div>
		<div class="b-text">
			<?php the_excerpt(); ?>
		</div>
	</a>
</div>

							</li>
						<?php
$post_counter++;
endwhile;
?>
					</ul>
					<?php if ( $post_count > 5 ) : ?>
						<a href="<?php echo esc_url( home_url( 'blog' ) ); ?>" class="text-btn"><?php _e( 'View more posts', 'fepper' ); ?></a>
					<?php endif; ?>
				</section>
			</div><!--end .l-main-->

			<div class="l-sidebar">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</div><!--end .l-sidebar-->
		</div><!--end .l-two-col-->
	</div><!--End role=main-->
</div>
