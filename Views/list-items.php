<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>
</head>
<body>
<form action="./list" method='post' class='p-3 m-2'>
            <h2>Todo List</h2><br>
            <input type="text" name='todoName' placeholder="Item Name" class='form-control w-50'><br>
            <label>Priority: </label>
            <select name='priority' class='form-control w-50'>
                <option>P1</option>
                <option>P2</option>
                <option>P3</option>
                <option>P4</option>
            </select><br>
            <label>Due Date: </label>
            <input type="date" name='dueDate' class='form-control w-50'><br>
            <button type='submit' name='submit' class='btn btn-primary w-25'>Create Task</button><br><br>
        </form>

        <?php
            /*
            if (isset($_POST['submit'])) {
                if (!empty($_POST['todoName'])) {
                    $usrHash = hash("sha256", $_SESSION['username']);
                    $query = "SELECT * FROM users WHERE username='$usrHash'";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($result);

                    $userId = $row['user_id'];
                    $todoName = $_POST['todoName'];
                    if ($_POST['priority'] == "P1") {
                        $priority = 1;
                    } else if ($_POST['priority'] == "P2") {
                        $priority = 2;
                    } else if ($_POST['priority'] == "P3") {
                        $priority = 3;
                    } else if ($_POST['priority'] == "P4") {
                        $priority = 4;
                    }

                    $date = $_POST['dueDate'];

                    $query = "INSERT INTO todos (todo_name, todo_priority, todo_due_date, user_id) VALUES ('$todoName', '$priority', '$date', '$userId')";
                    $result = mysqli_query($conn, $query);
                } else {
                    echo("There's no name for your todo item!");
                }
            } 
        
                
                */
        ?>
        <table class='p-3 m-4 table table-striped w-50 table-dark'>
            <tr>
                <th>Item Name</th>
                <th>Item Priority</th>
                <th>Item Due Date</th>
                <th></th>
            </tr>
            <?php
                ListItems::getItems();
            /*
                $usrHash = hash("sha256", $_SESSION['username']);
                $query = "SELECT * FROM users WHERE username='$usrHash'";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_assoc($result);
                $userId = $row['user_id'];

                $query = "SELECT * FROM todos WHERE user_id='$userId'";
                $result = mysqli_query($conn, $query);
                $numRows = mysqli_num_rows($result);
                $row = mysqli_fetch_assoc($result);

                if ($numRows > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
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

                if (isset($_POST['del'])) {
                    $query = "DELETE * FROM todos WHERE todo_name =" . $row['todo_name'];
                };
                */
            ?>
        </table>

        <form action="./login" method='POST' class='p-3 m-2'>
            <br><button type='submit' class='btn btn-danger'>Logout</button>
        </form>
</body>
</html>