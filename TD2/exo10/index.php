<!DOCTYPE html>
<html lang="en">

<?php

$num = $_POST['number'];
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>factorielle</title>
        <link rel="stylesheet" href="../../styles/styles.css">
</head>

<body>
    <div class="center">
        <form action="" method="POST">
            <input type="number" name="number" id="number" placeholder="Entrer un nombre">
            <input type="submit" value="envoyer">
        </form>
        <br>
        <code>Factoriel :
            <?php

            function factorielle($nb)
            {
                if ($nb == 0) {
                    return 1;
                } else {
                    return $nb * factorielle($nb - 1);
                }
            }

            echo factorielle($num);

            ?>
        </code>

        <code>Somme des carrés :
            <?php
            function sommecarre($nb)
            {
                if ($nb == 0) {
                    return 0;
                } else {
                    return $nb * $nb + sommecarre($nb - 1);
                }
            }

            echo sommecarre($num);
            ?>
        </code>

    </div>

</body>

</html>