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

echo($_GET['url']);

require_once('./routes.php');