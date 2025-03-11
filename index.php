<?php

spl_autoload_register('autoload');

function autoload($className) {
    if (file_exists("./Controllers/$className.php")) {
        require("./Controllers/$className.php");
    }
    if (file_exists("./DB/$className.php")) {
        require("./DB/$className.php");
    }
    if (file_exists("./Classes/$className.php")) {
        require("./Classes/$className.php");
    }
}

require_once('./routes.php');

$uri = $_GET['url'];

switch ($uri) {
    default:
        require_once("./Views/login.php");
        break;
}