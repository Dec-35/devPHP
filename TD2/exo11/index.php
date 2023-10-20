<!DOCTYPE html>
<html lang="en">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>devinez</title>
        <link rel="stylesheet" href="../../styles/styles.css">
</head>

<body onload="document.querySelector('#number').focus()">
<?php

session_start();
$NBESSAIS = 10;

if (isset($_SESSION['number'])) {
    $number = $_SESSION['number'];
} else {
    $number = rand(1, 100);
    $_SESSION['number'] = $number;
}

if (isset($_SESSION['nbEssaisRestant'])) {
    $nbEssaisRestant = $_SESSION['nbEssaisRestant'];



} else {
    //debut de game
    $nbEssaisRestant = $NBESSAIS;

}


?>
    <div class="center">
        <h3>Devinez le nombre</h3>
        <p>Nombre d'essais restant : <?php echo $nbEssaisRestant ?></p>
        <form action="">
            <input type="number" name="number" id="number" placeholder="Devinez le nombre" required>
            <input type="submit" value="Valider">

        </form>
        <code>

            <?php
            if ($nbEssaisRestant < 1) {
                echo "Perdu ! Vous n'avez pas trouvé avec le nombre d'essais imparti";
                session_destroy();


            } else {

                if (isset($_GET['number'])) {
                    $nbEssaisRestant = $nbEssaisRestant - 1;
                    $_SESSION['nbEssaisRestant'] = $nbEssaisRestant;
                    if ($_GET['number'] > $number) {
                        echo "C'est moins";
                    } elseif ($_GET['number'] < $number) {
                        echo "C'est plus";
                    } else {
                        echo "Bravo, vous avez trouvé !";
                        session_destroy();
                        //set headers to empty
                        echo `<button onclick='window.location=""'>Rejouer</button>`;
                    }

                } else {
                    echo "Veuillez entrer un number";
                }
            }


            ?>
        </code>
    </div>
</body>

</html>