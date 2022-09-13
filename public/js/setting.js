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