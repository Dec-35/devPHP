<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Index</title>
    <link rel="stylesheet" href="styles/styles.css" />
  </head>

  <body>
    <h1>
      Exercices de PHP
      <pre class="php"></pre>
    </h1>
    <ul id="listOfPages"></ul>
  </body>
  <script>
    <?php

    $files = scandir(".");
    //récupération de tous les fichiers à la racine 
    $files = array_diff($files, [".", "..", "index.php"]);
    $files = array_values($files);

    echo "const files = " . json_encode($files) . ";";
    /*
    On assigne un variable js pour récupérer les fichiers 

    */



    ?>

    const listOfPages = document.getElementById("listOfPages");

    files.forEach((file) => {
      const li = document.createElement("li");
      const a = document.createElement("a");
      a.href = file;
      a.innerText = file;
      li.appendChild(a);
      listOfPages.appendChild(li);
    });

  </script>

</html>
