<?php
session_start();
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
                
                Login::getUser($usr, $usrHash, $pwdHash);
            }
        ?>
        
</body>
</html>