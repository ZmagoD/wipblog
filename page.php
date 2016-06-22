<?php
/**
 * The template for displaying page
 *
 * Used for both single and index/archive/search.
 *
 * @package Wip_blog
 * @since Wip Blog 1.0
 */

get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12 box">
        <?php
		while ( have_posts() ) : the_post();

			get_template_part( 'content', 'page' );

			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			
		endwhile;
		?>
        </div>
    </div>
</div>

<?php get_footer(); ?>