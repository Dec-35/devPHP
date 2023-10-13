<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>age</title>
</head>

<body>
    <form action="" method="POST">
        <input type="number" name="age" id="age" placeholder="age">
        <input type="submit" value="envoyer">
    </form>

    <?php

    $age = $_POST['age'];

    if ($age >= 18) {
        echo "Vous êtes majeur";
    } else {
        echo "Vous êtes mineur";
    }

    ?>
</body>

</html>