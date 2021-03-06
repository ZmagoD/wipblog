<?php
/**
 *  Template Name: Right Sidebar
 *
 * @package Wip_blog
 * @since Wip Blog 1.0
 */

get_header(); ?>

<div class="container wip-link">
    <div class="row">
        <div class="col-md-8">
        <?php
		while ( have_posts() ) : the_post();

			get_template_part( 'content', 'page' );

			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			
		endwhile;
		?>
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>

<?php get_footer(); ?>