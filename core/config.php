<?php
session_start();
ob_start();
ini_set('error_reporting', 'On');
error_reporting(E_ERROR);
function PhpError($error_code, $error_msg, $error_file, $error_line)
{
    echo "<br/><b>Error Message: </b>{$error_msg}<br/>";
    echo "<smal>{$error_file} <b>In The Line: {$error_line}</b></smal><br/><br/>";
    die();
}
set_error_handler("PhpError", E_ERROR);