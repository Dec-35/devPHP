<!DOCTYPE html>
<?php
$jeux = array(
    'Minecraft' => 1950,
    'Valorant' => 405,
    'Control' => 8
);

$tempsTotal = 0;
foreach (array_values($jeux) as $heures) {
    $tempsTotal += $heures;
}

?>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Exercice 8</title>
        <link rel="stylesheet" href="../styles/styles.css">
        <link rel="stylesheet" href="../styles/library.css">
    </head>

    <body>

        <h3>Exercice 8 - Bibliothèque de jeux</h3>
        <div id="gallery">


        </div>
        <h4>Temps total passé :
            <?php
            echo $tempsTotal;
            ?> heures
        </h4>
    </body>
    <script>
        <?php
        echo "const games = " . json_encode($jeux) . ";"
            ?>
        console.log(games)
        const gallery = document.getElementById('gallery')

        for (let i = 0; i < games.length(); i++) {
            console.log(games[i])
        }
    </script>

</html>
