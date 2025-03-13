<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include('./Controllers/Test.php');
        Test::teamPageView();
    ?>
    <h1><?php echo ($row['team_name']); ?></h1>
</body>
</html>