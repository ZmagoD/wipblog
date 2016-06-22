<?php
/**
 * The template for displaying the footer
 *
 * Displays all of the footer container..
 *
 * @package Wip_blog
 * @since Wip Blog 1.0
 */
?>    
<footer class="wip-link">
    <div class="containter">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 footer_menu text-center">
                <?php                
                wp_nav_menu( array(
                    'theme_location'    => 'footer',
                    'depth'             => 2,
                    'container'         => false,
                    'menu_class'        => 'list-inline',
                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                    'walker'            => new wp_bootstrap_navwalker())
                );?>
            </div>
        </div>
        <div class="row">
        <?php if ( is_active_sidebar( 'footer-one' ) ) : ?>
        	<div class="col-md-4">
        		<?php dynamic_sidebar( 'footer-one' ); ?>
        	</div>
        <?php endif; ?>
        <?php if ( is_active_sidebar( 'footer-two' ) ) : ?>
        	<div class="col-md-4">
        		<?php dynamic_sidebar( 'footer-two' ); ?>
        	</div>
        <?php endif; ?>
        <?php if ( is_active_sidebar( 'footer-three' ) ) : ?>
        	<div class="col-md-4">
        		<?php dynamic_sidebar( 'footer-three' ); ?>
        	</div>
        <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p><?php esc_html_e( get_theme_mod( 'footer_text', esc_html__( 'Copyright &copy; All rights reserved 2015', 'wip-blog') ) ); ?></p>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>
