<?php

class Test extends Controller {
    public static function teamPageView() {
        if (isset($_GET['id'])) {
            $sql = "SELECT * FROM teams WHERE team_id ='". $$_GET['id'] . "'";
            $stmt = self::connect()->query($sql);
            $row = $stmt->fetch();

            echo("<h2>". $row['team_name'] ."</h2>");
        }
    }
}