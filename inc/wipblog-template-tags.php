<?php

/**
 * 
 *  Wipblog template tags
 * 
 * @package Wip_blog
 * @subpackage inc
 * @since Wip Blog 1.0
 * 
 */

// Categories temlate tag
if ( ! function_exists( 'wipblog_post_category_tag' ) ):
function wipblog_post_category_tag() {
    if ( !is_single() ) {
        echo "<h2 class='brand-before'><small>";
        the_category(' | ');
        echo "</small></h2>";
    }
}
endif;

// Next/Previouse post tag
if ( ! function_exists( 'wipblog_link_pages' ) ):
function wipblog_link_pages(){
    if ( is_single() ) { ?>
        <div id='navigation-post' class='text-right row'>
            <?php the_post_navigation( array( 
                'next_text' => esc_html__( 'Next', 'wip-blog' ) . ' <i class="fa fa-arrow-circle-o-right"></i>',
                'prev_text' => '<i class="fa fa-arrow-circle-o-left"></i> ' . esc_html__( 'Previous', 'wip-blog' ) 
            ) ); ?>
       </div>

      <?php  
   }
    
}
add_filter('wp_link_pages', 'wipblog_link_pages' );

endif;

// Creates the thumbnail
if ( ! function_exists( 'wipblog_thumbnail_tag' ) ):
function wipblog_thumbnail_tag(){

    if ( has_post_thumbnail() ): ?>
    <div class="text-center thumbnail">
        <?php $wipblog_default_atr = array(
            	'class' => "img-responsive center-block",
            );
        the_post_thumbnail( 'full', $wipblog_default_atr );  ?>
    </div>
    <?php endif; 
}
endif;

// Post title 
if ( ! function_exists( 'wipblog_post_title' ) ):
function wipblog_post_title(){
    if ( !is_single() ): ?>
        <?php if ( get_the_title() == NULL ): ?>
            <h2 class="post-name">
                <a class="post-name-link" href="<?php the_permalink(); ?>"><?php esc_html_e( 'Read more', 'wip-blog'); ?></a>
            </h2>
        <?php else: ?>
        <h2 class="post-name" title="<?php the_title_attribute(); ?>">
            <a class="post-name-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
        <?php endif; ?>
    <?php else: ?>
    <h2 class="post-name" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></h2>
    <?php endif;
}
endif;

if ( ! function_exists( 'wipblog_comments_callback' ) ):
    
function wipblog_comments_callback( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
 
    ?>
    <li <?php comment_class('row'); ?> id="li-comment-<?php comment_ID(); ?>">
            <div class="col-md-3">
                <div class="comment-avatar">
                    <?php echo get_avatar( $comment, $size='90',$default='' ); ?> 
                </div>
                <?php if ( $comment->comment_author_url ): ?>
                <h4><a href="<?php comment_author_url(); ?>"><?php comment_author(); ?></a></h4>
                <?php else: ?>
                <h4><?php comment_author(); ?></h4>
                <?php endif; ?>
                <p><?php comment_date(); ?></p>
            </div>
            <div class="col-md-9">
                <?php if ( $comment->comment_approved == '0' ) : ?>
             		<em><?php esc_html_e( '(Your comment is awaiting moderation.)', 'wip-blog' ); ?></em>
             		<br />
      		    <?php endif; ?>
      		    <div class="text-left">
      		       <?php comment_text() ?> 
      		    </div>
      		    <div class="col-md-3 col-md-offset-9 reply">
      		         <?php comment_reply_link( array_merge( $args, array( 'reply_text' => sprintf( "%s %s" , __( 'Reply', 'wip-blog' ), '<i class="fa fa-paper-plane"></i>') ,
      		                                                                             'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
      		    </div>
            </div>

    </li>
    <?php
}
endif;