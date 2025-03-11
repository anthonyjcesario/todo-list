<?php

class Register extends Controller {
    public static function setUser($usr, $pwd) {
        $sql = "INSERT INTO users (username, pwd) VALUES (?, ?)";
        $stmt = self::connect()->prepare($sql);
        $stmt->execute([$usr, $pwd]);
    }
}