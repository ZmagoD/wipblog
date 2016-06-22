<?php
/**
 * The main template file
 *
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

<?php get_footer(); ?>