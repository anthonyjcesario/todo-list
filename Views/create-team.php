<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Team</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <form action="" method='post' class='p-3 m-2'>
        <input type="text" name='teamName' placeholder='Team Name' class='form-control w-50'>
        
        <?php
            CreateTeam::getUsers();
        ?>

        <br><button type='submit' class='btn btn-primary'>Add to Team</button>

    </form>
    

    <a href='./list-items'>Back</a>
</body>
</html>