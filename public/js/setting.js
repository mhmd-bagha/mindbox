const empty = (value) => {
    let length = value.length
    return (length == 0)
}

const validate_email = (email) => {
    return email.match(
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    );
}

const validate_password = (pass) => {
    let valid = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/
    return (pass.match(valid))
}

// replace text
function replace_text(text, element) {
    element = $(element)
    element.text(text)
}

function formatBytes(bytes, decimals = 1) {
    if (bytes === 0) return '0 بایت';
    const k = 1024;
    const dm = decimals < 0 ? 0 : decimals;
    const sizes = ['بایت', 'کیلوبایت', 'مگابایت', 'گیگابایت'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
}