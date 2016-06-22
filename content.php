<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
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
    <div class="the_content">
        <?php the_excerpt(); ?> 
    </div>
    <?php get_template_part( 'partials/meta' ); ?>
    <?php  wp_link_pages(); ?>

</article>