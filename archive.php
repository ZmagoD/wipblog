<?php
/**
 * The template for displaying Archive pages
 *
 * @package Wip_blog
 * @since Wip Blog 1.0
 * 
 */

get_header(); 
if ( class_exists( 'Kirki' ) ) {
	$wipblog_position = wip_blog_get_option('sidebar-blog', 'full');
} else {
	$wipblog_position = 'full';
}
?>


<?php if ( have_posts() ) : ?>

    <div class="container">
        <div class="row">
            <div class="box">
    		<?php 
    		switch ( $wipblog_position ){
    			case 'full':
    				get_template_part( 'partials/blog-full' ); 
    				break;
    			case 'left':
    				get_template_part( 'partials/blog-left' );
    				break;
    			case 'right':
    				get_template_part( 'partials/blog-right' );
    				break;
    			default:
    				get_template_part( 'partials/blog-full' );
    				break;
    		}
    		?>
            </div>
        </div>
    </div>

<?php else : ?>
	<?php get_template_part( 'content', 'none' ); ?>
<?php endif; ?>
<?php get_footer(); ?>