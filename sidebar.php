<?php
/**
 * The sidebar template page
 *
 * Displays on posts and pages.
 *
 *
 * @package Wip_blog
 * @since Wip Blog 1.0
 */

if ( is_active_sidebar( 'wipblog-sidebar' ) ) : ?>
<aside class="col-md-4 wip-link">
    <?php dynamic_sidebar( 'wipblog-sidebar' ); ?>
</aside>
<?php endif; ?>