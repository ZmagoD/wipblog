<?php
/**
 * The template for displaying Comments
 *
 *
 * @package Wip_blog
 * @since Wip Blog 1.0
 */
 if ( post_password_required() )
	return;
?>

<div class="row">
    <div class="col-md-12">

	<?php if ( have_comments() ) : ?>
		 <h2 class="wip-comments-title text-center">
			<?php
				printf( _nx( 'One comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'wip-blog' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>
	</div>
</div>
<div class="row">
		<ol class="comment-list col-md-12 wip-link">
		<?php
        wp_list_comments( array(
                    'callback'  => 'wipblog_comments_callback',
            ) ); ?>
		</ol><!-- .comment-list -->

		<?php
			// Are there comments to navigate through?
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
		<nav class="navigation comment-navigation text-center" role="navigation">
			<h1 class="screen-reader-text section-heading"><?php esc_html_e( 'Comment navigation', 'wip-blog' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'wip-blog' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'wip-blog' ) ); ?></div>
		</nav><!-- .comment-navigation -->
		<?php endif; // Check for comment navigation ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments text-center"><?php esc_html_e( 'Comments are closed.' , 'wip-blog' ); ?></p>
		<?php endif; ?>
   
	<?php endif; // have_comments() ?>
	<div class="col-md-12">
	    <div class="text-center wip-link">
	    	<?php
	    	$wipblog_commenter = wp_get_current_commenter();
			$wipblog_req = get_option( 'require_name_email' );
			$wipblog_aria_req = ( $wipblog_req ? " aria-required='true'" : '' );
			
	    	$wipblog_fields =  array(

		  'author' =>
		    '<div class="form-group comment-form-author"><label for="author" class="col-sm-2 control-label">' . __( 'Name', 'wip-blog' ) . 
		    ( $wipblog_req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
		    ' <div class="col-sm-10"><input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $wipblog_commenter['comment_author'] ) .
		    '" size="30"' . $wipblog_aria_req . ' /></div></div>',
		
		  'email' =>
		    '<div class="form-group comment-form-email"><label for="email" class="col-sm-2 control-label">' . __( 'Email', 'wip-blog' ) . 
		    ( $wipblog_req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
		    ' <div class="col-sm-10"><input id="email" class="form-control" name="email" type="text" value="' . esc_attr(  $wipblog_commenter['comment_author_email'] ) .
		    '" size="30"' . $wipblog_aria_req . ' /></div></div>',
		
		  'url' =>
		    '<div class="form-group comment-form-url"><label for="url" class="col-sm-2 control-label">' . __( 'Website', 'wip-blog' ) . '</label>' .
		    ' <div class="col-sm-10"><input id="url" class="form-control" name="url" type="text" value="' . esc_attr( $wipblog_commenter['comment_author_url'] ) .
		    '" size="30" /></div></div>',
		);
	    	$wipblog_comment_args = array(
			  'id_form'           => 'commentform',
			  'class_form'      => 'comment-form',
			  'id_submit'         => 'submit',
			  'class_submit'      => 'btn btn-default submit',
			  'name_submit'       => 'submit',
			  'title_reply'       => sprintf( "%s %s", esc_html__( 'Leave a Reply', 'wip-blog' ), '<i class="fa fa-paper-plane"></i>'),
			  'title_reply_to'    => esc_html__( 'Leave a Reply to %s', 'wip-blog' ),
			  'cancel_reply_link' => esc_html__( 'Cancel Reply', 'wip-blog' ),
			  'label_submit'      => esc_html__( 'Post Comment', 'wip-blog' ),
			  'format'            => 'xhtml',
			
			  'comment_field' =>  '<div class="form-group comment-form-comment"><label for="comment">' . __( 'Comment', 'wip-blog' ) .
			    '</label><textarea id="comment" class="form-control" rows="5" name="comment" aria-required="true">' .
			    '</textarea></div>',

			  'fields' => apply_filters( 'comment_form_default_fields', $wipblog_fields ),
			);
	        
	        comment_form( $wipblog_comment_args ); ?>
        </div>
	</div>
</div>

</div>
