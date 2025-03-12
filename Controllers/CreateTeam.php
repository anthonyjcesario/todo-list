<?php

class CreateTeam extends Controller{
    public static function getUsers() {
        $sql = "SELECT * FROM users";
        $stmt = self::connect()->prepare($sql);
        $stmt->execute();

        while ($row = $stmt->fetch()) {
            if ($row['username'] != $_SESSION['username']) {
                echo("<br><h5><input type='checkbox'> " . $row['fn'] . " " . $row['ln'] . " (". $row['username'] . ")</h5>");
            }
            

            
        }
    }

    public static function setTeam($teamName) {
        $sql = "INSERT INTO teams (team_name) VALUES (?)";
        $stmt = self::connect()->prepare($sql);
        $stmt->execute(array($teamName));
    }
}