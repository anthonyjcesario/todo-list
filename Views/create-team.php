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
    <h1 class="bg-dark text-light p-3">Teams</h1>
    <form action="" method='post' class='p-3 m-2'>
        <input type="text" name='teamName' placeholder='Team Name' class='form-control w-50'>

        <br><button type='submit' name='newTeam' class='btn btn-primary'>Add to Team</button>

    </form>
    <?php
        if (isset($_POST['newTeam'])) {
            $teamName = $_POST['teamName'];
            CreateTeam::setTeam($teamName);
        }
    ?>
    <form action="" method='post'>
    <?php
        echo("<button type='submit' name='back' class='btn btn-danger ms-4'>Back</button>");
    ?>
    </form>
    <?php
        if (isset($_POST['back'])) {
            header("Location: ./list-items");
        }
        CreateTeam::getTeams();
    ?>
</body>
</html>