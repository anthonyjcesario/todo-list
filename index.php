<?php
session_start();

define('DB_HOST', 'localhost');
define("DB_USER", "administrator");
define("DB_PASSWORD", "Bobbyboy@321");
define("DB_NAME","todolist");

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
?>

<?php
$fullURI = $_GET['url'];

switch ($fullURI) {
    case "register":
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <form action="./register" method='POST' class='p-3 m-2'>
            <h2>Register</h2><br>
            <input type="text" name='fn' placeholder='First Name' class='form-control w-50'><br>
            <input type="text" name='usr' placeholder="Username" class='form-control w-50'><br>
            <input type="password" name='pwd' placeholder='Password' class='form-control w-50'><br>
            <input type="password" name='vPwd' placeholder='Verify Password' class='form-control w-50'><br>
            <button type='submit' name='register' class='btn btn-primary'>Register</button><br><br>
            <p>Already have an account? <a href="./login" class='text-decoration-none text-primary'>Login here</a>.</p>
        </form>
        
        <?php
        if (isset($_POST['register'])) {
            $fn = $_POST['fn'];
            $usr = $_POST['usr'];
            $pwd = $_POST['pwd'];
            $vPwd = $_POST['vPwd'];

            $usrHash = hash('sha256', $usr);
            $pwdHash = hash('sha256', $pwd);
            if (!empty($usr) or !empty($pwd)) {
                if ($pwd == $vPwd) {
                    $query = "INSERT INTO users (username, pwd) VALUES('$usrHash', '$pwdHash')";
                    $result = mysqli_query($conn, $query);
                    echo("Account created.");
                } else {
                    echo("Passwords don't match.");
                }
            } else {
                echo("Username/Password cannot be empty.");
            }
        }
        
        ?>
    </body>
    </html>
<?php
        break;
    case "login":
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body>
        <form action="./login" method='POST' class='p-3 m-2'>
            <h2>Login</h2><br>
            <input type="text" name='usr' placeholder="Username" class='form-control w-50'><br>
            <input type="password" name='pwd' placeholder="Password" class='form-control w-50'><br>
            <button type='submit' name='login' class='btn btn-primary'>Login</button><br><br>
            <p>Don't have an account? <a href="./register" class='text-decoration-none text-primary'>Register here</a>.</p>
        </form>

        <?php
            if (isset($_POST['login'])) {
                $usr = $_POST['usr'];
                $pwd = $_POST['pwd'];

                $usrHash = hash('sha256', $usr);
                $pwdHash = hash('sha256', $pwd);

                $query = "SELECT * FROM users WHERE username='$usrHash' AND pwd='$pwdHash'";
                $result = mysqli_query($conn, $query);
                $rowNum = mysqli_num_rows($result);

                if ($rowNum > 0) {
                    $_SESSION['logged in'] = true;
                    $_SESSION['username'] = $usr;
                    header("Location: ./list");
                } else {
                    echo ("Username/Password Incorrect.");
                }
            }
        ?>
    </body>
    </html>
<?php
        break;
    case "list":
        if ($_SESSION['logged in'] != true) {header("Location: ./login");}
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    </head>
    <body class='bg-light'>
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
        
                
                
        ?>
        <table class='p-3 m-4 table table-striped w-50 table-dark'>
            <tr>
                <th>Item Name</th>
                <th>Item Priority</th>
                <th>Item Due Date</th>
                <th></th>
            </tr>
            <?php

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
                        echo("<td>". $row['todo_priority'] . '</td>');
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
                
            ?>
        </table>

        <form action="./login" method='POST' class='p-3 m-2'>
            <br><button type='submit' class='btn btn-danger'>Logout</button>
        </form>
    </body>
    </html>
<?php
        break;
    default:
        echo("home");
}