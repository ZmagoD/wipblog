<?php
/**
 * The default template for displaying page content
 *
 *
 * @package Wip_blog
 * @since Wip Blog 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post-prew' ); ?>>
    <?php 
    wipblog_thumbnail_tag(); 
    ?>

    <div class="the_content">
        <?php the_content(); ?> 
    </div>
</article>