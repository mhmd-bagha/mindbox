<?php
session_start();
ob_start();
ini_set('error_reporting', 'On');
error_reporting(E_ALL);
function PhpError($error_code, $error_msg, $error_file, $error_line)
{
    echo "<br/><b>Error Message: </b>{$error_msg}<br/>";
    echo "<smal>{$error_file} <b>In The Line: {$error_line}</b></smal><br/><br/>";
    die();
}
set_error_handler("PhpError");

define('SERVERDB', 'localhost');
define('USERNAMEDB', 'root');
define('PASSWORDDB', '');
define('DBNAMEDB', 'db_mindbox');
define('DOMAIN', 'http://localhost/mindbox');
define('DL_DOMAIN', 'http://localhost/mindbox');
define('DIR_ROOT', dirname(__DIR__) . '/');
define('DOC_ROOT', $_SERVER['DOCUMENT_ROOT'] . '/');
define('ADMIN_EMAIL', 'm@gmail.com');
define('ADMIN_PASSWORD', 'U295cHhCRGVwWWNqUUg2MUg0L3RTZz09');
define('TYPE_IMG', array('image/png', 'image/jpg', 'image/jpeg'));
define('SIZE_IMG', 1 * 1024 * 1024);
define('SIZE_IMG_COURSE', 2 * 1024 * 1024);
define('EMAIL_PASSWORD', 'rDzMMerF@bebest.ir');
define('EMAIL_USERNAME', 'info@bebest20.ir');
define('SMTPSERVER', 'mail.bebest20.ir');
define('SMTPSERVER_PORT', 465);
define('TYPE_FILE', array('application/vnd.rar', 'application/zip'));