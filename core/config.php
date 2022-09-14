<?php
session_start();
ob_start();
ini_set('error_reporting', 'On');
error_reporting(E_ALL);
function PhpError($error_code, $error_msg, $error_file, $error_line)
{
    echo "<br/><b>Error Message: </b>{$error_msg}<br/>";
    echo "<smal>{$error_file} <b>In The Line: {$error_line}</b></smal><br/><br/>";
    if ($error_code == E_USER_ERROR): die(); endif;
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