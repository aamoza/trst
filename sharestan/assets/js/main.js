/**
 * Main Theme JavaScript
 */

jQuery(document).ready(function($) {
    'use strict';

    // Quick View Ajax Modal Trigger
    $(document).on('click', '.quick-view-btn', function(e) {
        e.preventDefault();
        var productId = $(this).data('product-id');

        if (!productId) return;

        $('body').append('<div id="sharestan-quickview-modal" class="sharestan-modal active"><div class="modal-overlay"></div><div class="modal-container"><button class="modal-close-btn">&times;</button><div class="modal-body-content"><p class="loading-state">در حال بارگذاری اطلاعات محصول...</p></div></div></div>');

        $.ajax({
            url: sharestan_params.ajax_url,
            type: 'POST',
            data: {
                action: 'sharestan_quick_view',
                product_id: productId,
                nonce: sharestan_params.ajax_nonce
            },
            success: function(response) {
                if (response.success) {
                    $('#sharestan-quickview-modal .modal-body-content').html(response.data.html);
                } else {
                    $('#sharestan-quickview-modal .modal-body-content').html('<p class="error-state">خطا در بارگذاری اطلاعات محصول.</p>');
                }
            }
        });
    });

    // Close Modal
    $(document).on('click', '.modal-close-btn, .modal-overlay', function() {
        $('#sharestan-quickview-modal, #sharestan-wishlist-modal').remove();
    });

    // Wishlist Toggle
    $(document).on('click', '.wishlist-add-btn', function(e) {
        e.preventDefault();
        $(this).toggleClass('active');
        var count = parseInt($('.wishlist-count').text()) || 0;
        if ($(this).hasClass('active')) {
            $('.wishlist-count').text(count + 1);
            alert('محصول با موفقیت به لیست علاقه‌مندی‌ها اضافه شد.');
        } else {
            $('.wishlist-count').text(Math.max(0, count - 1));
        }
    });
});
