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

    public static function getTeams() {
        $sql = "SELECT * FROM teams";
        $stmt = self::connect()->query($sql);
        while($row = $stmt->fetch()) {
            if ($row['team_id'] != "1") {
                echo("<form action='', method='post'>");
                echo("<h4>" . $row['team_name'] . "");
                echo("<button type='submit' name='" . $row['team_id'] . "' class='btn btn-success m-4'>Join Team</button></h4>");
                echo("</form>");
            }
            
        }

    }
}