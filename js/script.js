if ($('.product-slider').length > 0) {
    var productSlider = new Splide('.product-slider .splide', {
        perPage: 6,
        perMove: 1,
        gap: 18,
        pagination: false,
        rewind: true,
        classes: {
            arrow: 'splide__arrow custom-arrow',
            prev: 'splide__arrow--prev fa-solid fa-chevron-left',
            next: 'splide__arrow--next fa-solid fa-chevron-right',
        },
        breakpoints:
        {
            900: {
                perPage: 4,
                arrows: false,
                pagination: true,
            },
            500: {
                destroy: true,
            }
        }
    });
    productSlider.mount();
}
if ($('.related-product-slider').length > 0) {
    var relatedproductSlider = new Splide('.related-product-slider .splide', {
        perPage: 6,
        perMove: 1,
        gap: 18,
        pagination: false,
        rewind: true,
        classes: {
            arrow: 'splide__arrow custom-arrow',
            prev: 'splide__arrow--prev fa-solid fa-chevron-left',
            next: 'splide__arrow--next fa-solid fa-chevron-right',
        },
        breakpoints:
        {
            900: {
                perPage: 4,
                arrows: false,
                pagination: true,
            },
            500: {
                perPage: 2,
                arrows: false,
                pagination: true,
            }
        }
    });
    relatedproductSlider.mount();
}

/*product slider */
document.addEventListener('DOMContentLoaded', function () {
    if ($('.product-single-slider').length > 0) {

        var main = new Splide('.product-single-slider .splide', {
            speed: 1000,
            rewind: true,
            pagination: false,
            arrows: false,
            drag: false,
        });


        var thumbnails = new Splide('.thumbnail-slider .splide', {
            gap: 20,
            perPage: 4,
            pagination: false,
            slideFocus: false,
            arrows: true,
            breakpoints: {
                500: {
                    perPage: 3,
                },
            },
        });


        // main.sync( thumbnails );
        main.mount();
        thumbnails.mount();

        // Add event listener to thumbnail items
        thumbnails.on('click', function (event) {
            var index = event.index;
            console.log(index);
            main.go(index); // Move the main carousel to the selected index
        });

    }
});

$(document).ready(function() {
    $('.primary-menu li').children('ul.sub-menu').parent().addClass('menu-item-has-children');
    $(".primary-menu li.menu-item-has-children > a").append('<span class="dropdown-btn"><i class="fas fa-chevron-down"></i></span>');

        
            
            $('.dropdown-btn').on('click', function(event) {
                console.log($(window).width());
                if($(window).width() < 900){
                    // Avoid following the href location when clicking

                    event.preventDefault();

                    // Avoid having the menu to close when clicking

                    event.stopPropagation();

                    // Re-add .open to parent sub-menu item

                    $(this).parent().parent().toggleClass('open').first().siblings().removeClass('open');
                    $(this).parent().parent().find("ul").parent().find("ul.sub-menu").first().slideToggle();
                    $(this).parent().parent().siblings().find("ul.sub-menu").slideUp().parent().removeClass('open');
                }
            });
            
    });

$(document).ready(function () {
    $('.background-image-container').parent().addClass('position-relative');
});

$(document).ready(function () {
    $('.clickable-circle').click(function () {
        $(this).toggleClass('active').parent().toggleClass('active').siblings().toggleClass('active').parent().toggleClass('active');
        $(this).parent().parent().siblings('.masked-product.active').toggleClass('active').children().toggleClass('active').find('.clickable-circle').toggleClass('active');
    });
    $('body').click(function (e) {
        if (!$(e.target).closest('.masked-product > *').length) {
            $('.masked-product').removeClass('active').children().removeClass('active').children().removeClass('active');
        }
    });
});


//category filter 
$(document).ready(function () {
    $('.category-list > li').addClass('category-filter');
    $('.category-list li.category-filter .filter').slideUp().siblings('a').append('<span class="dropdown-filter"><i class="fa-solid fa-chevron-down"></i></span>');
    $('.category-list li.category-filter > a').click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).toggleClass('active');
        $(this).siblings('.filter').slideToggle();
        $(this).parent().toggleClass('filter-active').siblings().removeClass('filter-active').children('.filter').slideUp().siblings().removeClass('active');
    });

    $('.category-sort .sort .sort-list').slideUp().siblings('a').append('<span class="dropdown-filter"><i class="fa-solid fa-chevron-down"></i></span>');
    $('.category-sort .sort > a').click(function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).toggleClass('active').siblings('ul.sort-list').slideToggle().parent().toggleClass('sort-active');
    })

    $('body').click(function (e) {
        if (!$(e.target).closest('.filter-active').length) {
            $('.category-list li.category-filter').removeClass('filter-active').children('.filter').slideUp().siblings().removeClass('active');
        }
        if (!$(e.target).closest('.sort-active').length) {
            $('.category-sort .sort').removeClass('sort-active').children('ul.sort-list').slideUp().siblings().removeClass('active');
        }
    });
});

//Product Grid Toggle

$(document).ready(function () {
    $('.grid-4').click(function () {
        $('.grid-4').addClass('active');
        $('.grid-6').removeClass('active');
        $('.product-grid-item').removeClass('col-lg-2 col-md-3 col-6').addClass('col-lg-3 col-md-4 col-12');
    });
    $('.grid-6').click(function () {
        $('.grid-6').addClass('active');
        $('.grid-4').removeClass('active');
        $('.product-grid-item').removeClass('col-lg-3 col-md-4 col-12').addClass('col-lg-2 col-md-3 col-6');
    });
});

//Qauntity Spinner


jQuery('.quantity').each(function () {
    var spinner = jQuery(this),
        input = spinner.find('input[type="number"]'),
        btnUp = spinner.find('.quantity-up'),
        btnDown = spinner.find('.quantity-down'),
        min = input.attr('min'),
        max = input.attr('max');
    if (input.attr('max') === null || input.attr('max') === "") {
        max = 1000;
    }
    btnUp.click(function () {
        var oldValue = parseFloat(input.val());
        if (oldValue >= max) {
            var newVal = oldValue;
        } else {
            var newVal = oldValue + 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
        spinner.siblings().text("Quantity: " + newVal);
        spinner.parent().siblings('.product-price').find('span').text("$" + newVal * 160 + ".00");
    });
    btnDown.click(function () {
        var oldValue = parseFloat(input.val());
        if (oldValue <= min) {
            var newVal = oldValue;
        } else {
            var newVal = oldValue - 1;
        }
        spinner.find("input").val(newVal);
        spinner.find("input").trigger("change");
        spinner.siblings().text("Quantity: " + newVal);
        spinner.parent().siblings('.product-price').find('span').text("$" + newVal * 160 + ".00");
    });
});


//Hamburgur menu
$(document).ready(function(){
    $('.hamburger-menu').click(function(){
        $('.hamburger-menu').toggleClass('active').siblings().toggleClass('nav-active');
        $('body').toggleClass('hamburger-active');
    });
    $('body').click(function (event) {
        if ($('body').hasClass('hamburger-active') && !$(event.target).closest('.nav-menu').length) {
            $('.hamburger-menu').toggleClass('active').siblings().toggleClass('nav-active');
            $('body').toggleClass('hamburger-active');
        }
    });
});


    $('.sizes .size').click(function() {
        $(this).addClass('active').siblings().removeClass('active');
        var value = $(this).children().text();
        $('.sizes').siblings().text("Size: " + value);
    });


    if($('body *').hasClass('error-page-section')){
        $('body').addClass('page-404');
    }

//corrects the alignment if filter div overflows 

$(document).ready(function(){
    var containerWidth = $('.product-listing-section .container').width();
    $('.category-filter > a').click(function(){
        var $this = $(this);
        var $filterSelector = $this.siblings('.filter');
        var filterWidth = $filterSelector.width();
        var filterOffset = $this.offset().left;
        if(containerWidth <= filterWidth + filterOffset){
            $filterSelector.css('right', 0 + 'px');
        }
    });
    
});

// Delegated quantity handler (added separately so existing JS is not modified)
(function () {
    'use strict';

    // Use capture so this runs before other bubble-phase handlers and prevents duplicates
    document.addEventListener('click', function (e) {
        var btn = e.target.closest('.quantity-up, .quantity-down, .quantity-button');
        if (!btn) return;

        // Find the closest quantity container
        var qtyContainer = btn.closest('.quantity') || btn.closest('.product-quantity');
        if (!qtyContainer) return;

        // Find the input (prefer .qty used by WooCommerce)
        var input = qtyContainer.querySelector('input.qty') || qtyContainer.querySelector('input[type="number"]');
        if (!input) return;

        // Determine direction
        var isUp = btn.classList.contains('quantity-up') || (btn.classList.contains('quantity-button') && btn.textContent.trim() === '+');

        e.preventDefault();
        // Stop other handlers from also handling this click
        if (typeof e.stopImmediatePropagation === 'function') e.stopImmediatePropagation();
        e.stopPropagation();

        var step = parseFloat(input.getAttribute('step')) || 1;
        var minAttr = input.getAttribute('min');
        var maxAttr = input.getAttribute('max');
        var min = (minAttr !== null && minAttr !== '') ? parseFloat(minAttr) : 0;
        var max = (maxAttr !== null && maxAttr !== '') ? parseFloat(maxAttr) : null;

        var cur = parseFloat(input.value);
        if (isNaN(cur)) cur = 0;

        var newVal = isUp ? cur + step : cur - step;
        if (max !== null && newVal > max) newVal = max;
        if (!isNaN(min) && newVal < min) newVal = min;

        input.value = newVal;
        input.dispatchEvent(new Event('change', { bubbles: true }));

        // Update nearby quantity text if present (theme uses a sibling div showing "Quantity: X")
        try {
            var pq = qtyContainer.closest('.product-quantity');
            if (pq) {
                var label = pq.querySelector('div:first-child');
                if (label && label.textContent.trim().toLowerCase().indexOf('quantity') !== -1) {
                    label.textContent = 'Quantity: ' + newVal;
                }
                var priceSpan = pq.querySelector('.product-price span');
                if (priceSpan) {
                    var unit = parseFloat(priceSpan.getAttribute('data-unit-price'));
                    if (isNaN(unit)) unit = 160; // fallback used previously in theme
                    priceSpan.textContent = '$' + (newVal * unit).toFixed(2);
                }
            }
        } catch (err) {
            // ignore
        }

    }, true);

})();