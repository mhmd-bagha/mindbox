function empty(e) {
    switch (e) {
        case "":
        case 0:
        case "0":
        case null:
        case false:
        case undefined:
        case e.length = 0:
            return true;
        default:
            return false;
    }
}

validate_email = t => t.match(/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/),
    validate_password = t => {
        let e = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
        return t.match(e)
    };

function replace_text(t, e) {
    (e = $(e)).text(t)
}

function formatBytes(t, e = 1) {
    if (0 === t) return "0 بایت";
    let a = Math.floor(Math.log(t) / Math.log(1024));
    return parseFloat((t / Math.pow(1024, a)).toFixed(e < 0 ? 0 : e)) + " " + ["بایت", "کیلوبایت", "مگابایت", "گیگابایت"][a]
}