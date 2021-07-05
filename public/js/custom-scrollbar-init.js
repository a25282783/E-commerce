/**
 * Varkala - Bootstrap 4 E-commerce Theme v. 1.2.1
 * Homepage: https://themes.getbootstrap.com/product/varkala-e-commerce-theme/
 * Copyright 2021, Bootstrapious - https://bootstrapious.com
 */

'use strict';

(function ($) {
    if ($(window).outerWidth() > 992) {
        $(".custom-scrollbar").mCustomScrollbar({
            scrollInertia: 200,
            theme:"dark-thin"
        });
    }
}(jQuery));