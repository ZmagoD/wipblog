<?php
/**
 * The template for displaying posts in the Video post format
 *
 * Used for both single and index/archive/search.
 *
 * @package Wip_blog
 * @since Wip Blog 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-prew' ); ?>>
    <?php wipblog_post_category_tag(); ?>
        
    <?php 
    wipblog_post_title();
    wipblog_thumbnail_tag(); 
    ?>
    
    <hr class="tagline-divider">
    <div class="video_content center-block">
        <?php the_content(sprintf(
				esc_html__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'wip-blog' ),
				the_title( '<span class="screen-reader-text">', '</span>', false )
			) ); ?> 

    </div>
    <?php get_template_part( 'partials/meta' ); ?>
    <?php wp_link_pages();  ?>
</article>