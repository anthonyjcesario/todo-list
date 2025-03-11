<?php

class ListItems extends Controller {
    public static function setItem() {

    }

    public static function getItems() {
        #Need to add user ID into this.
        $sql = "SELECT * FROM todos";
        $stmt = self::connect()->query($sql);
        while ($row = $stmt->fetch()) {
            echo("<tr>");
            echo("<td>". $row['todo_name'] . '</td>');
            echo("<td>". $priority . '</td>');
            echo("<td>". $row['todo_due_date'] . '</td>');
            echo("<form action='./list' method='post'>");
            echo("<td><button type='submit' name='del' class='btn btn-danger'>Delete</button></td>");
            echo("</form>");
            echo("</tr>"); 
        }
    }

}