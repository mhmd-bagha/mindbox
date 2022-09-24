const sidebar = document.querySelector('.sidebar')
const toggle = document.querySelector(".toggle-menu")
const adminBackdrop = document.querySelector(".admin-backdrop")
let isOffCanvasOpen = false;
const debounceAction = debounce(() => resizeAction())
let width = window.innerWidth;

// event click toggle
toggle.addEventListener("click", () => {
    if (!isOffCanvasOpen) {
        isOffCanvasOpen = true;
        openOffCanvas();
    } else {
        isOffCanvasOpen = false;
        closeOffCanvas();
    }
})

// event click adminBackdrop
adminBackdrop.addEventListener("click", () => {
    isOffCanvasOpen = false;
    closeOffCanvas();
})

// event mouseenter sidebar
sidebar.addEventListener("mouseenter", (e) => {
    if (!isOffCanvasOpen) {
        sidebar.classList.add("openhover");
    }
})

// event mouseleave sidebar
sidebar.addEventListener("mouseleave", () => {
    if (!isOffCanvasOpen) {
        sidebar.classList.remove("openhover");
    }
})

// event resize 
window.addEventListener("resize", debounceAction)

// function resizeAction 
function resizeAction() {
    if (width >= 992) {
        closeOffCanvas();
    }
}

// function debounce 
function debounce(func, timeout = 100) {
    let timer;
    return (...args) => {
        clearTimeout(timer);
        timer = setTimeout(() => {
            func.apply(this, args);
        }, timeout);
    };
}

// function openOffCanvas
function openOffCanvas() {
    sidebar.classList.add("open");
    adminBackdrop.style.visibility = "visible";
    adminBackdrop.style.opacity = 1;
}

// function closeOffCanvas 
function closeOffCanvas() {
    sidebar.classList.remove("open");
    adminBackdrop.style.visibility = "hidden";
    adminBackdrop.style.opacity = 0;
}

$(document).ready(function () {
    $("#div-price").hide();
    $("#type-course").change(function () {
        if ($(this).val() == "money") {
            $("#div-price").show();
        } else {
            $("#div-price").hide();
        }
    });
});

// tom select discount
if ($("#select_courses").length) {
    settings_discount = {
        plugins: ['remove_button', 'checkbox_options']
    };
    new TomSelect('#select_courses', settings_discount);
}
// tom select lable courses
if ($('#select_lables').length) {
    var settings_lables = {
        plugins: ['remove_button'],
        persist: false,
        createOnBlur: true,
        create: true,
        maxItems: 23
    };
    new TomSelect('#select_lables', settings_lables);
}

if ($(".lozad").length) {
    const observer = lozad();
    observer.observe();
}

function get_data_item(id, path, type = 'POST', msg_error = 'خطا در برقراری ارتباط با سرور') {
    $.ajax({
        url: path,
        type: type,
        data: {id: id, btn_data: true},
        error: () => {
            alert_error(msg_error)
        }
    }).done((data) => {
        console.log(data)
        var obj = JSON.parse(data)
        var status_code = obj.statusCode
        var message = obj.data.message[0]
        return message
    })
}

function disable(id, message_confirm, type) {
    if (confirm(message_confirm)) {
        var formData = new FormData()
        formData.append('id', id)
        formData.append('btn_status_' + type + '', true)
        $.ajax({
            url: PATH + "/admin/disable",
            type: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: (data) => {
                let obj = JSON.parse(data)
                let status = obj.statusCode
                let message = obj.data.message
                switch (status) {
                    case 200:
                        alert_success(message)
                        setTimeout(() => {
                            location.reload()
                        }, 2400)
                        break;
                    case 500:
                        alert_error(message)
                        break;
                }
            },
            error: () => {
                alert_error('خطا در انجام عملیات')
            }
        })
    }
}

function enable(id, message_confirm, type) {
    if (confirm(message_confirm)) {
        var formData = new FormData()
        formData.append('id', id)
        formData.append('btn_status_' + type + '', true)
        $.ajax({
            url: PATH + "/admin/enable",
            type: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: (data) => {
                let obj = JSON.parse(data)
                let status = obj.statusCode
                let message = obj.data.message
                switch (status) {
                    case 200:
                        alert_success(message)
                        setTimeout(() => {
                            location.reload()
                        }, 2400)
                        break;
                    case 500:
                        alert_error(message)
                        break;
                }
            },
            error: () => {
                alert_error('خطا در انجام عملیات')
            }
        })
    }
}