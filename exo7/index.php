<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>exo7</title>
        <link rel="stylesheet" href="/styles/styles.css">
    </head>

    <body>
        <h3>Exercice 7</h3>
        <?php

        $a = 4;
        $b = 3;
        $c = 2;

        $urlArgs = parse_url($_SERVER['HTTPS']);
        var_dump($urlArgs);


        echo "<code>Addition : ", $a + $b, "</code>";
        echo "<code>Soustraction : ", $a - $b, "</code>";
        echo "<code>Mutliplication : ", $a * $b, "</code>";
        echo "<code>Division : ", $a / $b, "</code>";
        echo "<code>Modulo : ", $a % $b, "</code>";
        ?>

    </body>

</html>
