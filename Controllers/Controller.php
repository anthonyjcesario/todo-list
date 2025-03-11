<?php

class Controller extends Database {
    public static function view($viewName) {
        if (file_exists("./Views/$viewName.php")) {
            require_once("./Views/$viewName.php");
        }
    }
}