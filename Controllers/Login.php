<?php

class Login extends Controller {
    public static function getUser($username, $pwd) {
        $sql = "SELECT COUNT(*) FROM users where username = ? AND pwd = ?";
        $stmt = self::connect()->prepare($sql);
        $stmt->execute([$username, $pwd]);

        $numRows = $stmt->fetchColumn();
        if ($numRows > 0) {
            header("Location: ./list-items");
        } else {
            echo("Incorrect username or password.");
        }
    }
}