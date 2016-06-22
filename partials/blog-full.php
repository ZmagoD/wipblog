<?php

/**
 * 
 * Partial for blog full width mode
 * 
 * @package Wip_blog
 * @since Wip Blog 1.0
 * 
 */
?>

<main class="col-md-12 text-center wip-link"> 
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<?php get_template_part( 'content', get_post_format() ); ?>
<?php endwhile; else : ?>
 	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.', 'wip-blog' ); ?></p>
 	<p><?php get_search_form(); ?>
 <?php endif; ?>
 <?php the_posts_pagination(); ?>
</main>