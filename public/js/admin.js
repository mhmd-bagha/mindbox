const sidebar = document.querySelector('.sidebar')
const toggle = document.querySelector(".toggle-menu")
const adminBackdrop = document.querySelector(".admin-backdrop")
let isOffCanvasOpen = false;
const debounceAction = debounce(() => resizeAction())
let width = window.innerWidth;
var message_data;

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

function change_type_course(select_element, price_element) {
    select_element = $("#" + select_element + "")
    price_element = $("#" + price_element + "")
    if (select_element.val() == "money") {
        price_element.show();
    } else {
        price_element.hide();
    }
}

// tom select discount
if ($("#select_courses").length) {
    settings_discount = {
        plugins: ['remove_button', 'checkbox_options']
    };
    new TomSelect('#select_courses', settings_discount);
}
// tom select label courses
if ($('#course_labels').length) {
    var settings_labels = {
        plugins: ['remove_button'],
        persist: false,
        createOnBlur: true,
        create: true,
        maxItems: 23
    };
    new TomSelect('#course_labels', settings_labels);
}

function tom_select_input(el) {
    var settings_labels = {
        plugins: ['remove_button'],
        persist: false,
        createOnBlur: true,
        create: true,
        maxItems: 23
    };
    new TomSelect('#' + el + '', settings_labels);
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
        var obj = JSON.parse(data)
        var status_code = obj.statusCode
        message_data = [obj.data.message, status_code]
    })
    return message_data
    // const ajaxSend = () => {}
    // if (ajaxSend()) return message_data
}

function disable(id, message_confirm, type) {
    if (confirm(message_confirm)) {
        var formData = new FormData()
        formData.append('id', id)
        formData.append('type', type)
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
        formData.append('type', type)
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

function deleteItem(id, table, directory = '', message_confirm = 'آیا از حذف این آیتم اطمینان دارید؟') {
    if (confirm(message_confirm)) {
        var formData = new FormData()
        if (!empty(directory)) formData.append('directory', directory)
        formData.append('id', id)
        formData.append('table', table)
        $.ajax({
            url: PATH + "/admin/deleteItem",
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

function _(el) {
    return document.getElementById(el);
}

function uploadFile(file, file_name, file_name_posted) {
    _("progressShow").style.display = 'block'
    var formdata = new FormData();
    formdata.append("file", file);
    formdata.append("file_name", file_name)
    formdata.append("file_name_posted", file_name_posted)
    var ajax = new XMLHttpRequest();
    ajax.upload.addEventListener("progress", progressHandler, false);
    ajax.addEventListener("load", completeHandler, false);
    ajax.addEventListener("error", errorHandler, false);
    ajax.addEventListener("abort", abortHandler, false);
    ajax.open("POST", PATH + "/uploader/setter.php");
    ajax.setRequestHeader('Access-Control-Allow-Origin', '*');
    ajax.send(formdata);
}

function progressHandler(event) {
    _("loaded_n_total").innerHTML = "آپلود شد " + formatBytes(event.loaded) + " از " + formatBytes(event.total);
    var percent = (event.loaded / event.total) * 100;
    _("progressBar").style.width = Math.round(percent) + "%";
    _("status").innerHTML = Math.round(percent) + " %";
}

function completeHandler(event) {
    _("status").innerHTML = event.target.responseText;
    _("progressBar").style.width = "100%";
    alert_success('فایل با موفقیت آپلود شد')
    setTimeout(() => {
        location.reload()
    }, 3000)
}

function errorHandler() {
    _("status").innerHTML = "آپلود ناموفق بود";
}

function abortHandler(event) {
    _("status").innerHTML = "آپلود لغو شد";
}

function type_file(value) {
    var allowedExtensions = /(\.zip|\.rar)$/i;
    return (allowedExtensions.exec(value)) ? true : false;
}

function uploadFile_ajax(file, file_name, file_name_posted, progressShow = 'progressShow', loaded_n_total = 'loaded_n_total', progressBar = 'progressBar', status = 'status') {
    // variable
    progressShow = $("#" + progressShow + "")
    loaded_n_total = $("#" + loaded_n_total + "")
    progressBar = $("#" + progressBar + "")
    status = $("#" + status + "")
    var percentValue = '0%';
    // form data
    let data = new FormData();
    data.append("file", file);
    data.append("file_name", file_name)
    data.append("file_name_posted", file_name_posted)
    $.ajax({
        xhr: () => {
            var xhr = new window.XMLHttpRequest();
            xhr.upload.addEventListener("progress", function (evt) {
                if (evt.lengthComputable) {
                    var percentComplete = (evt.loaded / evt.total) * 100;
                    percentValue = percentComplete + '%';
                    progressBar.animate({width: '' + percentValue + ''}, {
                        duration: 4000, easing: "linear", step: function (x) {
                            var percentText = Math.round(x * 100 / percentComplete);
                            status.text(percentText + "%");
                            loaded_n_total.text("آپلود شد " + formatBytes(evt.loaded) + " از " + formatBytes(evt.total));
                            if (percentText == 100) location.reload()
                        }
                    });
                }
            }, false);
            return xhr;
        },
        url: PATH + "/uploader/setter.php",
        type: "POST",
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
            progressShow.show()
            progressBar.width(percentValue);
            status.text(percentValue);
        },
        error: () => {
            alert_error('خطا در اپلود فایل')
        },
        complete: (xhr) => {
            if (xhr.responseText != "error") {
                loaded_n_total.text(xhr.responseText);
            } else {
                loaded_n_total.text('خطا در اپلود فایل');
                progressBar.stop();
            }
        }
    })
}