<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>devinez</title>
        <link rel="stylesheet" href="../../styles/styles.css">
</head>

<body onload="document.querySelector('#number').focus()">
    <div class="center">
        <h3>Devinez le nombre</h3>
        <p>Nombre d'essais restant : <?php echo $nbEssaisRestants ?></p>
        <form action="">
            <input type="number" name="number" id="number" placeholder="Devinez le nombre" required>
            <input type="submit" value="Valider">

        </form>
        <form action="">
            <code>

                <?php

                if (isset($_SESSION['number'])) {
                    $number = $_SESSION['$number'];
                } else {
                    $number = rand(1, 100);
                    $_SESSION['number'] = $number;
                }


                if (isset($_GET['number'])) {
                    if ($_GET['number'] > $number) {
                        echo "C'est moins";
                    } elseif ($_GET['number'] < $number) {
                        echo "C'est plus";
                    } else {
                        echo "Bravo, vous avez trouvé !";
                        unlink('number.json');
                    }
                } else if (isset($_GET['reset'])) {
                    session_destroy();
                    header('Location: index.php');
                } else {
                    echo "Veuillez entrer un nombre";
                }

                ?>
            </code>
            <input type="submit" name="reset" value="Reset">
        </form>

    </div>
</body>




</html>