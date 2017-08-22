<main id="main" role="main" class="site-main <?php
	global $wp_query;
	$is_two_col = false;
	while ( have_posts() ) : the_post();
		if ( has_post_thumbnail() ) :
			$is_two_col = true;
			break;
		endif;
	endwhile;
	rewind_posts();
	if ( $is_two_col ) :
		echo 'hoagies-two-col ';
	endif;
	if ( $wp_query->post_count > 1 ) :
		echo 'post-list ';
	endif;
?>">

	<?php while ( have_posts() ) : the_post();
		get_template_part( 'template-parts/content' );
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
	endwhile; ?>

</main>
