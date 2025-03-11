<?php

class Register extends Controller {
    public static function setUser($usr, $pwd) {
        $sql = "INSERT INTO users (username, pwd) VALUES (?, ?)";
        $stmt = self::connect()->prepare($sql);
        $stmt->execute([$usr, $pwd]);
        echo("<h5 class='m-4'>User account created!</h5>");
    }
}