<?php
/**
 * The template for displaying posts in the Chat post format
 *
 *
 * @package Wip_blog
 * @since Wip Blog 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-prew' ); ?>>
    <?php
    wipblog_post_category_tag();
    wipblog_post_title(); 
    wipblog_thumbnail_tag(); 
    ?>

    <div class="chat-content">
		the_content( sprintf(
			esc_html__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'wip-blog' ),
			the_title( '<span class="screen-reader-text">', '</span>', false )
		) );
    </div>
    <?php get_template_part( 'partials/meta' ); ?>
    <?php wp_link_pages();  ?>
</article>