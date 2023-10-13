<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>devinez</title>
    <link rel="stylesheet" href="/styles//styles.css">
</head>

<body onload="document.querySelector('#number').focus()">
    <div class="center">
        <h3>Devinez le nombre</h3>
        <form action="">
            <input type="number" name="number" id="number" placeholder="Devinez le nombre" required>
            <input type="submit" value="Valider">

        </form>
        <form action="">
            <code>

                <?php
                if (file_exists('number.json')) {
                    $readNumber = file_get_contents('number.json');
                } else {
                    $readNumber = null;
                }
                $number = json_decode($readNumber);

                if (!isset($number)) {
                    $number = rand(1, 100);
                    file_put_contents('number.json', json_encode($number));
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
                    unlink('number.json');
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