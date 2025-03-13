<?php

class Register extends Controller {
    public static function setUser($fn, $ln, $usr, $pwd, $teamID) {
        #First, I want to check if this username has already been used:
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = self::connect()->prepare($sql);
        $stmt->execute(array($usr));
        $rowNum = $stmt->fetchColumn();

            if ($rowNum == 0) {

                $sql = "INSERT INTO users (fn, ln, username, pwd, team_id) VALUES (?, ?, ?, ?, ?)";
                $stmt = self::connect()->prepare($sql);
                $stmt->execute([$fn, $ln, $usr, $pwd, $teamID]);
                echo("<h5 class='m-4'>User account created!</h5>");
            } else {
                echo("<h5 class='m-4'>This username is already in use!</h5>");
            } 
    }

}