<?php

/**
 * 
 * Partial for single page full width mode
 * 
 * @package Wip_blog
 * @since Wip Blog 1.0
 * 
 */
?>

<main class="col-md-12 text-center wip-link">
	<?php while ( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'content', get_post_format() ); ?>

		<?php comments_template(); ?>
		
	<?php endwhile; ?>
</main>