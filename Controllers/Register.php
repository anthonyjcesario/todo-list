<?php

class Register extends Controller {
    public static function setUser($usr, $pwd) {
        #First, I want to check if this username has already been used:
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = self::connect()->prepare($sql);
        $stmt->execute(array($usr));
        $rowNum = $stmt->fetchColumn();

        if ($rowNum == 0) {
            $sql = "INSERT INTO users (username, pwd) VALUES (?, ?)";
            $stmt = self::connect()->prepare($sql);
            $stmt->execute([$usr, $pwd]);
            echo("<h5 class='m-4'>User account created!</h5>");
        } else {
            echo("<h5 class='m-4'>This username is already in use!</h5>");
        }

        
    }
}