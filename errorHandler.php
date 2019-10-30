<?php

set_exception_handler('myExceptionHandler');
function myExceptionHandler($e)
{
    header('HTTP/1.1 500 Internal Server Error', TRUE, 500);
    error_log($e);
    readfile('view/error.php');
    exit;
}

set_error_handler('myErrorHandler');
function myErrorHandler($errno, $errstr, $errfile, $errline)
{
    error_log("$errstr in $errfile:$errline");
    header('HTTP/1.1 500 Internal Server Error', TRUE, 500);
    readfile('view/error.php');
    exit;
}