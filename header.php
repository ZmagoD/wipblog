<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Wip_blog
 * @since Wip Blog 1.00
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php get_template_part('partials/shim'); ?>
	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
	<div class="jumbotron wip-link">
		<?php if ( is_front_page() || is_home() || is_single() ): ?>
	    	<div class="brand"><?php bloginfo( 'name' ); ?></div>
	    	<div class="sub-brand text-center"><?php bloginfo( 'description' ); ?></div>
		<?php else: ?>
			<div class="brand"><?php
			if ( is_archive() ):
				if ( is_day() ) :
		    		printf( esc_html__( 'Daily Archives: %s', 'wip-blog' ), get_the_date() );
		    	elseif ( is_month() ) :
		    		printf( esc_html__( 'Monthly Archives: %s', 'wip-blog' ), get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'wip-blog' ) ) );
		    	elseif ( is_year() ) :
		    		printf( esc_html__( 'Yearly Archives: %s', 'wip-blog' ), get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'wip-blog' ) ) );
		    	else :
		    		esc_html_e( 'Archives', 'wip-blog' );
		    	endif;
		    elseif ( is_search() ):
		    	printf( esc_html__( 'Search Results for: %s', 'wip-blog' ), get_search_query() ); 
		    else:
				the_title();
			endif;?>
				</div>
	    <?php endif; ?>
    </div>

    <?php get_template_part('partials/navigation'); ?>