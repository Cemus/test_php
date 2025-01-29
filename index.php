<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/php.svg" type="image/x-icon">
    <title>Test</title>
</head>
<body>
    <?php
    require  "./util/connexion.php";
    require "./env.php";
    $connexion = connexion();
    if (empty($connexion["bdd"])) {
        echo $connexion["msg"];
        return;
    }
    $bdd = $connexion["bdd"];
    echo $connexion["msg"];
    ?>
</body>
</html>