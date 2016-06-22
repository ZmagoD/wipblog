<?php
/**
 * 
 * Meta for post 
 * 
 * @package Wip_blog
 * @subpackage partials
 * @since Wip Blog 1.0
 * 
 */
?>

<div class="post-footer row">
    <?php if ( !is_single() ) :?>
    <p class="post-meta"><span class="fa-stack-categories"> <i class="fa fa-pencil"></i></span> <?php _e( 'On','wip-blog' ); ?> <?php the_time('F jS, Y'); ?> <span class="line">|</span>  <span class="fa-stack-categories"><i class="fa fa-user"></i></span> <?php _e( 'By', 'wip-blog');?>  <?php the_author_posts_link(); ?>
    <span class="line">|</span><i class="fa fa-comments"></i> <?php printf( _nx( 'One Comment', '%1$s Comments', get_comments_number(), 'comments title', 'wip-blog' ), number_format_i18n( get_comments_number() ) ); ?></p>
    <?php else: ?>
        <div class="col-md-6"><?php the_tags( '<ul class="list-inline"><li><i class="fa fa-tag"></i>&nbsp;', '</li><li><i class="fa fa-tag"></i>&nbsp;', '</li></ul>' ); ?></div>
        <div class="col-md-6"><?php the_category(' | '); ?></div>
    <?php endif; ?>
</div>