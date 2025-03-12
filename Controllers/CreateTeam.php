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

        #Check if the team already exists
        $sql = "SELECT COUNT(*) FROM teams WHERE team_name = ?";
        $stmt = self::connect()->prepare($sql);
        $stmt->execute(array($teamName));
        
        $rowNum = $stmt->fetchColumn();
        if ($rowNum == 0) {
            $sql = "INSERT INTO teams (team_name) VALUES (?)";
            $stmt = self::connect()->prepare($sql);
            $stmt->execute(array($teamName));
        }


        

    }

    public static function getTeams() {
        $sql = "SELECT * FROM teams";
        $stmt = self::connect()->query($sql);
        echo("<h1 class='m-5'>Team List:</h1>");
        while($row = $stmt->fetch()) {
            if ($row['team_id'] != "1") {
                echo("<form action='', method='post' class='m-5'>");
                echo("<div class='row p-3 m-1 border border-secondary rounded'>");
                echo("<div class='col-8'>");
                echo("<h5>" . $row['team_name'] . "</h5>");
                echo("</div>");
                echo("<div class='col'>");
                echo("<button type='submit' name='" . $row['team_id'] . "' class='btn btn-success'>Join Team</button></h4>");
                echo("</div>");
                echo("</div>");
                echo("</form>");
            }

            if (isset($_POST[$row['team_id']])) {
                $id = $row['team_id'];
                $sql = "UPDATE users SET team_id = $id WHERE username = '" . $_SESSION['username'] . "'";
                $stmt = self::connect()->query($sql);
            }
            
        }

    }
}