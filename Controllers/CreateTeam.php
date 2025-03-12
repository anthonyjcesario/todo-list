<?php

class CreateTeam extends Controller{
    public static function getUsers() {
        $sql = "SELECT * FROM users";
        $stmt = self::connect()->prepare($sql);
        $stmt->execute();

        while ($row = $stmt->fetch()) {

            echo("<br><h5><input type='checkbox'> " . $row['fn'] . " " . $row['ln'] . " (". $row['username'] . ")</h5>");

            
        }
    }
}