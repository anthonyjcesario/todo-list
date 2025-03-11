<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
                
                Login::getUser($usr, $usrHash, $pwdHash);
            }
        /*
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
                */
        ?>
</body>
</html>