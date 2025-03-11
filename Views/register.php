<?php
session_start();
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
                $usr = $_POST['usr'];
                $pwd = $_POST['pwd'];
                $vPwd = $_POST['vPwd'];
    
                $usrHash = hash('sha256', $usr);
                $pwdHash = hash('sha256', $pwd);

                Register::setUser($usrHash, $pwdHash);
            }
        /*
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
        */
        ?>
</body>
</html>