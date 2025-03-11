<?php
session_start();

if ($_SESSION['logged in'] == false) {
    header("Location: ./login");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
<form action="./list-items" method='post' class='p-3 m-2'>
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
            ListItems::delItem();
            if (isset($_POST['submit'])) {
                $todo_name = $_POST['todoName'];
                $todo_priority = $_POST['priority'];
                $todo_due_date = $_POST['dueDate'];
                
                if (!empty($todo_name)) {
                    ListItems::setItem($todo_name, $todo_priority, $todo_due_date);
                }

            }

        ?>

        <table class='p-3 m-4 table table-striped w-75 table-dark'>
            <tr>
                <th>Item Name</th>
                <th>Item Priority</th>
                <th>Item Due Date</th>
                <th></th>
            </tr>

            <?php
                ListItems::getItems();
            ?>

        </table>

        <form action="./list-items" method='POST' class='p-3 m-2'>
            <br><button type='submit' name='logout' class='btn btn-danger'>Logout</button>
        </form>

        <?php
            if (isset($_POST['logout'])) {
                ListItems::logout();
            }
        ?>
</body>
</html>