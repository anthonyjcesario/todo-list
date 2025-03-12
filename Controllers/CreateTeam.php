<?php

class CreateTeam extends Controller{

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

    public static function leaveTeam() {
        #Grab the user's team ID
        $sql = "SELECT * FROM users WHERE username='". $_SESSION['username'] ."'";
        $stmt = self::connect()->query($sql);
        $row = $stmt->fetch();

        $userTeamID = $row['team_id'];

        #Find the team with that ID
        $sql = "SELECT * FROM teams WHERE team_id='". $userTeamID ."'";
        $stmt = self::connect()->query($sql);
        $row = $stmt->fetch();
        
        if ($row['team_id'] == $userTeamID) {
            echo("<div class='row p-3 m-1 border border-secondary rounded '>");
            echo("<div class='col-8'>");
            echo("<h5>" . $row['team_name'] . "</h5>");
            echo("</div>");
            echo("<div class='col'>");
            echo("<button type='submit' name='" . $row['team_id'] . "' class='btn btn-success'>Join Team</button></h4>");
            echo("</div>");
            echo("<div class='col'>");
            echo("<button type='submit' name='" . $row['team_id'] . "' class='btn btn-danger'>Leave Team</button></h4>");
            echo("</div>");
            echo("</div>");
        }
    }

    public static function getTeams() {
        #Grab the user's team ID
        $sql = "SELECT * FROM users WHERE username='". $_SESSION['username'] ."'";
        $stmt = self::connect()->query($sql);
        $row = $stmt->fetch();

        $userTeamID = $row['team_id'];
        

        $sql = "SELECT * FROM teams";
        $stmt = self::connect()->query($sql);
        echo("<h1 class='m-5'>Team List:</h1>");
        
        while($row = $stmt->fetch()) {
            echo("<form action='', method='post' class='m-5'>");
            
            if ($row['team_id'] != "1" && $row['team_id'] != $userTeamID) { //If it's not the default team and/or the user is not apart of the team
                echo("<div class='row p-3 m-1 border border-secondary rounded w-75'>");
                echo("<div class='col-8'>");
                echo("<h5>" . $row['team_name'] . "</h5>");
                echo("</div>");
                echo("<div class='col'>");
                echo("<button type='submit' name='" . $row['team_id'] . "' class='btn btn-success'>Join Team</button></h4>");
                echo("</div>");
                echo("</div>");
            } else if ($row['team_id'] == $userTeamID) { //If the user is apart of the team.
                echo("<div class='row p-3 m-1 border border-secondary rounded w-75'>");
                echo("<div class='col-8'>");
                echo("<h5>" . $row['team_name'] . "</h5>");
                echo("</div>");
                echo("<div class='col'>");
                echo("<button type='submit' name='" . $row['team_id'] . "' class='btn btn-success'>Join Team</button></h4>");
                echo("</div>");
                echo("<div class='col'>");
                echo("<button type='submit' name='" . $row['team_id'] . "' class='btn btn-danger'>Leave Team</button></h4>");
                echo("</div>");
                echo("</div>");
                
            }

            echo("</form>");
            if (isset($_POST[$row['team_id']])) {
                $id = $row['team_id'];
                $sql = "UPDATE users SET team_id = $id WHERE username = '" . $_SESSION['username'] . "'";
                $stmt = self::connect()->query($sql);
                header("Location: ./create-team");
            }
        }
    }
}