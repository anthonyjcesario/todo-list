<?php

spl_autoload_register('autoload');

function autoload($className) {
    if (file_exists("./Controllers/$className.php")) {
        require("./Controllers/$className.php");
    }
    if (file_exists("./DB/$className.php")) {
        require("./DB/$className.php");
    }
}

$test = new Test();
$test->getUsers("admin");