console.clear();

// replace text
function replace_text(text, element) {
    element = $(element)
    element.html(text)
}

$(document).ready(() => {
    // search
    let bg_matte = $(".bg-matte")
    let search_card = $(".search-card")
    let modal_search = $("#modal-search")
    let modal_close = $(".modal-close")
    let search_input = $(".search-input")
    modal_close.click(() => {
        bg_matte.hide()
        search_card.hide()
        search_input.removeClass("search-input-focus")
    })
    search_input.click(() => {
        bg_matte.show()
        search_card.show()
        search_input.addClass("search-input-focus")
    })
    bg_matte.click(() => {
        bg_matte.hide()
        search_card.hide()
        modal_search.hide()
        search_input.removeClass("search-input-focus")
    })

    // video player
    if ($('#video-player').length) {
        let player = new VideoPlayer({
            selector: "#video-player",
            config: {
                storage: {
                    captionOffset: false,
                    playerSpeed: false,
                    captionSize: false,
                },
                i18n: {
                    play: "(پخش:مکث)",
                    mute: "(بیصدا:با صدا)",
                    subtitles: "زیرنویس (فعال:غیر فعال)",
                    config: "تنظیمات",
                    fullscreen: "(تمام صفحه:خارج شدن) تمام صفحه",
                    main_topic: "تنظیمات:",
                    main_caption: "زیر نویس",
                    main_offset: "سرعت زیر نویس",
                    main_speed: "سرعت فیلم",
                    main_disabled: "غیر فعال",
                    main_default: "پیشفرض",
                    caption_topic: "زیر نویس ها:",
                    caption_back: "برگشت",
                    caption_load: "بارگذاری از حافظه داخلی",
                    offset_topic: "تنظیم عنوان",
                    speed_topic: "تنظیم سرعت",
                }
            },
            icons: {
                path: "public/vendor/video-player/icons/"
            }
        })
    }

    // owl
    const slider = $('#slider');
    const suggestedCourses_dailyDiscounts = $("#suggested-courses, #daily-discounts");
    const categoriesBretz = $('#categories-bretz');
    if (slider.length) {
        slider.owlCarousel({
            rtl: true,
            loop: true,
            dots: false,
            nav: false,
            center: true,
            autoplayTimeout: 3000,
            autoplay: true,
            autoplayHoverPause: true,
            items: 1,
            responsive: {
                992: {
                    nav: true,
                    dots: true,
                }
            }
        });
    }
    if (suggestedCourses_dailyDiscounts.length) {
        suggestedCourses_dailyDiscounts.owlCarousel({
            rtl: true,
            margin: 30,
            loop: false,
            dots: false,
            nav: false,
            autoplayTimeout: 4000,
            autoplay: true,
            autoplayHoverPause: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1
                },
                375: {
                    items: 1.2
                },
                576: {
                    items: 2.2
                },
                768: {
                    items: 2.2
                },
                992: {
                    items: 3.2
                },
                1200: {
                    items: 4.2
                }
            }
        });
    }
    if (categoriesBretz.length) {
        categoriesBretz.owlCarousel({
            rtl: true,
            margin: 30,
            loop: false,
            dots: false,
            nav: false,
            autoplayTimeout: 4000,
            autoplay: true,
            autoplayHoverPause: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1
                },
                375: {
                    items: 1.3
                },
                576: {
                    items: 2.3
                },
                768: {
                    items: 2.3
                },
                992: {
                    items: 3.3
                },
                1200: {
                    items: 4.3
                }
            }
        });
    }
})

// back to top
function backTop() {
    document.documentElement.scrollTop = 0;
}

//price wallet charging
function price_wallet(id, input) {
    id = $("#" + id)
    input = $("#" + input)
    let price = id.attr("data-bs-price")
    input.val(price)
}

//button show more
function ShowMore(element, content) {
    content = $("." + content)
    element = $("#" + element)
    content.removeClass("hide-content").addClass("show-content")
    element.remove()
}

// hide show more button if the content less than 720px
if ($('.hide-content').length) {
    $('.hide-content').each(function () {
        if ($(this).outerHeight() < 720) {
            $(this).find('.show-more').css("display", "none")
            $(this).removeClass("hide-content").addClass("show-content")
        }
    })
}

// lozad
if ($('.lozad').length) {
    const observer = lozad();
    observer.observe();
}
