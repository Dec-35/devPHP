<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>age</title>
    <link rel="stylesheet" href="/styles/styles.css">
</head>

<body>
    <div class="center">
        <form action="" method="POST">
            <input type="number" name="age" id="age" placeholder="age">
            <input type="submit" value="envoyer">
        </form>
        <code>
            <?php

            $age = $_POST['age'];

            if ($age >= 18) {
                echo "Vous êtes majeur";
            } else {
                echo "Vous êtes mineur";
            } ?>
        </code>



    </div>

</body>

</html>