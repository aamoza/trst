/**
 * Mobile Drawer Menu Handler
 */

jQuery(document).ready(function($) {
    'use strict';

    $('.mobile-menu-toggle-btn').on('click', function() {
        $('.mobile-drawer-overlay, .mobile-drawer-menu').addClass('active');
        $('body').addClass('drawer-open');
    });

    $('.drawer-close-btn, .mobile-drawer-overlay').on('click', function() {
        $('.mobile-drawer-overlay, .mobile-drawer-menu').removeClass('active');
        $('body').removeClass('drawer-open');
    });
});
