<?php
/**
 * The footer template
 *
 * @package StoreTheme
 */

?>
    </div><!-- .container -->
</div><!-- #content -->

<footer class="site-footer">
    <div class="container">
        <div class="site-info">
            &copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. تمامی حقوق محفوظ است.
        </div>
        <nav class="footer-navigation">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'footer',
                'menu_id'        => 'footer-menu',
                'fallback_cb'    => false,
            ) );
            ?>
        </nav>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
