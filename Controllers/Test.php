<?php

class Test extends Database {
    public function getUsers($username) {
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username]);
        $names = $stmt->fetchAll();

        foreach($names as $name) {
            echo($name['pwd']);
        }
        
    }
}