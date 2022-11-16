<?php
// db
define('SERVERDB', 'localhost');
define('USERNAMEDB', 'root');
define('PASSWORDDB', '');
define('DBNAMEDB', 'db_mindbox');
// domain root
define('DOMAIN', 'http://localhost/mindbox');
// domain root dl
define('DL_DOMAIN', 'http://localhost/mindbox');
// dir root
define('DIR_ROOT', dirname(__DIR__) . '/');
define('DOC_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/');
// email and pass admin
define('ADMIN_EMAIL', 'm@gmail.com');
define('ADMIN_PASSWORD', 'U295cHhCRGVwWWNqUUg2MUg0L3RTZz09');
// types
define('TYPE_IMG', array('image/png', 'image/jpg', 'image/jpeg')); // type image
define('TYPE_FILE', array('application/vnd.rar', 'application/zip')); // type file
// sizes
define('SIZE_IMG', 2 * 1024 * 1024);
define('SIZE_IMG_COURSE', 3 * 1024 * 1024);
// email server and user and pass
define('EMAIL_PASSWORD', 'rDzMMerF@bebest.ir');
define('EMAIL_USERNAME', 'info@bebest20.ir');
define('SMTPSERVER', 'mail.bebest20.ir');
define('SMTPSERVER_PORT', 465);
// default wallet charge
define('DEFAULT_CHARGE_WALLET', 5000);
// email send req contact
define('EMAIL_CONTACT', 'mabrahimibagha@gmail.com');
// captcha
define('SECRETKEY_CAPTCHA', '6LchlXoiAAAAAByWxTrTNQ776g4fZoRAnQS96578');
define('KEY_RECAPTCHA', '6LchlXoiAAAAAMIJm9C3QJXH4TzxUHmyhsRek8BO');
// site name fa and en
define('SITE_NAME_FA', 'بی بست'); // fa
define('SITE_NAME_EN', 'bebest'); // en