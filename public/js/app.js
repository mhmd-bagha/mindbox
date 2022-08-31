// variable

// replace text
function replace_text(text, element) {
    element = $(element)
    element.html(text)
}
// search
$(document).ready(() => {
    let bg_matte = $(".bg-matte")
    let search_card = $(".search-card")
    let modal_search = $("#modal-search")
    let search_input = $(".search-input")

    $(".modal-close").click(() => {
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
})
// back to top
function backTop() {
    document.documentElement.scrollTop = 0;
}
// owl
$(document).ready(() => {
    $('#slider').owlCarousel({
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
    $('#suggested-courses, #daily-discounts').owlCarousel({
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
    $('#categories-bretz').owlCarousel({
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
})
//button show more
function ShowMore(element, content) {
    content = $("." + content)
    element = $("#" + element)
    content.removeClass("hide-content").addClass("show-content")
    element.remove()
}
//video player
$(document).ready(() => {
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
            path: "../../public/vendor/video-player/icons/"
        }
    })
})
