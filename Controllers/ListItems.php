<?php

class ListItems extends Controller {
    
    private static function getUserID($username) {

        $sql = "SELECT * FROM users WHERE username = ? ";
        $stmt = self::connect()->prepare($sql);
        $stmt->execute(array($username));
        $names = $stmt->fetchAll();
        
        foreach ($names as $name) {
            return ($name['user_id']);
        }

    }
    
    public static function setItem($todo_name, $todo_priority, $todo_due_date) {

        $username = hash('sha256', $_SESSION['username']);
        $user_id = self::getUserID($username);

        #Check to see if this entry already exists in the list

        $sql = "SELECT * FROM todos WHERE todo_name = ? AND user_id = ?";
        $stmt = self::connect()->prepare($sql);
        $stmt->execute(array($todo_name, $user_id));
        $numRows = $stmt->fetchColumn();

        if ($numRows == 0) {
            $sql = "INSERT INTO todos (todo_name, todo_priority, todo_due_date, user_id) VALUES (?, ?, ?, ?)";
            $stmt = self::connect()->prepare($sql);
            $stmt->execute(array($todo_name, $todo_priority, $todo_due_date, $user_id));
        } else {
            echo("This task already exists!");
        }
        
    }

    public static function getItems() {

        $sql = "SELECT * FROM todos";
        $stmt = self::connect()->query($sql);
        
        while ($row = $stmt->fetch()) {
            
            $username = hash('sha256', $_SESSION['username']);
            $user_id = self::getUserID($username);

            if ($row['user_id'] == $user_id) {
                
                echo("<tr>");
                echo("<td>". $row['todo_name'] . '</td>');
                echo("<td>". $row['todo_priority'] . '</td>');
                echo("<td>". $row['todo_due_date'] . '</td>');
                echo("<form action='./list-items' method='post'>");
                echo("<td><button type='submit' name='".$row['todo_id']."' class='btn btn-danger'>Delete</button></td>");
                echo("</form>");
                echo("</tr>"); 

            }

            if (isset($_POST[$row['todo_id']])) {
                $id = $row['todo_id'];
                $sql = "DELETE FROM todos where todo_id=$id";
                $stmt = self::connect()->prepare($sql);
                $stmt->execute();
                header("Location: ./list-items");
            }
            
            
        }
    }


    public static function logout() {
        
        session_unset();
        session_destroy();
        
        header("Location: ./login");
    }

    public static function createTeamPage() {
        header("Location: ./create-team");
    }

}