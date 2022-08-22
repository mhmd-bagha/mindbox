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
        loop: true,
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
                items: 1.4
            },
            576: {
                items: 2
            },
            768: {
                items: 2
            },
            992: {
                items: 3
            },
            1200: {
                items: 4
            }
        }
    });
    $('#categories-bretz').owlCarousel({
        rtl: true,
        margin: 30,
        loop: true,
        dots: false,
        nav: false,
        autoplayTimeout: 4000,
        autoplay: true,
        autoplayHoverPause: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1.5
            },
            375: {
                items: 2
            },
            576: {
                items: 2
            },
            768: {
                items: 3
            },
            992: {
                items: 4
            },
            1200: {
                items: 5
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
            path: "public/Vondor/video-player/icons/"
        }
    })
})