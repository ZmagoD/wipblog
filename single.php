<?php
/**
 * The template for displaying all single posts
 *
 * @package Wip_blog
 * @since Wip Blog 1.0
 */

get_header(); 
if ( class_exists( 'Kirki' ) ) {
	$wipblog_position = wip_blog_get_option('sidebar-blog', 'full');
} else {
	$wipblog_position = 'full';
}
?>

	<div class="container wip-link">
		<div class="row">
		<?php 
		switch ( $wipblog_position ){
			case 'full':
				get_template_part( 'partials/single-full' ); 
				break;
			case 'left':
				get_template_part( 'partials/single-left' );
				break;
			case 'right':
				get_template_part( 'partials/single-right' );
				break;
			default:
				get_template_part( 'partials/single-full' );
				break;
		}
		?>
		</div>
	</div>

<?php get_footer(); ?>