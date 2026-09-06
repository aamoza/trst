/**
 * AJAX Live Search JavaScript
 */

jQuery(document).ready(function($) {
    'use strict';

    var searchTimer;
    var $searchInput = $('.search-input-field');
    var $resultsPopup = $('.ajax-search-results-popup');

    $searchInput.on('keyup', function() {
        var query = $(this).val().trim();

        clearTimeout(searchTimer);

        if (query.length < 2) {
            $resultsPopup.hide().empty();
            return;
        }

        searchTimer = setTimeout(function() {
            $resultsPopup.show().html('<div class="search-loading">در حال جستجو...</div>');

            $.ajax({
                url: sharestan_params.ajax_url,
                type: 'POST',
                data: {
                    action: 'sharestan_live_search',
                    query: query,
                    nonce: sharestan_params.ajax_nonce
                },
                success: function(response) {
                    if (response.success && response.data.results.length > 0) {
                        var html = '<ul class="ajax-search-list">';
                        $.each(response.data.results, function(index, item) {
                            html += '<li class="search-result-item">';
                            html += '<a href="' + item.url + '">';
                            html += '<img src="' + item.image + '" alt="' + item.title + '">';
                            html += '<div class="item-info">';
                            html += '<span class="item-title">' + item.title + '</span>';
                            if (item.price_html) {
                                html += '<span class="item-price">' + item.price_html + '</span>';
                            }
                            html += '</div>';
                            html += '</a>';
                            html += '</li>';
                        });
                        html += '</ul>';
                        $resultsPopup.html(html);
                    } else {
                        $resultsPopup.html('<div class="search-no-results">هیچ محصولی پیدا نشد.</div>');
                    }
                }
            });
        }, 300);
    });

    $(document).on('click', function(e) {
        if (!$(e.target).closest('.header-search-box').length) {
            $resultsPopup.hide();
        }
    });
});
