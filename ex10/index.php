<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>factorielle</title>
</head>

<body>
    <form action="" method="POST">
        <input type="number" name="number" id="number" placeholder="Entrer un nomre">
        <input type="submit" value="envoyer">
    </form>

    <?php

    $num = $_POST['number'];

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
</body>

</html>