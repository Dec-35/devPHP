<?php
session_start();

// Load the games from the file or create an empty array if the file doesn't exist
if (file_exists('games.json')) {
    $jeux = json_decode(file_get_contents('games.json'), true);
} else {
    $jeux = array();
}

//form treatment to add a game
if (isset($_POST['game']) && isset($_POST['hours'])) {
    $jeux[$_POST['game']] = $_POST['hours'];
    file_put_contents('games.json', json_encode($jeux));
    header('Location: index.php?addedGame=' . $_POST['game']);
}

//form treatment to delete a game
if (isset($_POST['gameToDelete'])) {
    unset($jeux[$_POST['gameToDelete']]);
    file_put_contents('games.json', json_encode($jeux));
    header('Location: index.php?deletedGame=' . $_POST['gameToDelete']);
}

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
    <div id="gamesController">
        <form action="index.php" id="addGameForm" method="post">
            <h5>Ajouter un jeu</h5>

            <span>
                <input type="text" name="game" id="game" placeholder="Nom du jeu" required>
                <input type="number" name="hours" id="hours" placeholder="Nombre d'heures jouées" required>
            </span>

            <input type="submit" value="Ajouter">
        </form>
        <form action="index.php" id="deleteGameForm" method="post">
            <h5>Supprimer un jeu</h5>

            <select name="gameToDelete" id="gameToDelete" required>
                <?php
                foreach (array_keys($jeux) as $game) {
                    echo "<option value='$game'>$game</option>";
                }
                ?>
            </select>
            <input type="submit" value="Supprimer">

        </form>

    </div>

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

    function showAlert(message) {
        const alert = document.createElement('div')
        alert.classList.add('alert')
        alert.innerText = message
        document.body.appendChild(alert)

        setTimeout(() => {
            alert.remove()
        }, 3000)
    }

    //check if the user just added a game and display a message
    const urlParams = new URLSearchParams(window.location.search);
    const addedGame = urlParams.get('addedGame');
    if (addedGame) {
        showAlert('Le jeu ' + addedGame + ' a bien été ajouté !')
    }
    const deletedGame = urlParams.get('deletedGame');
    if (deletedGame) {
        showAlert('Le jeu ' + deletedGame + ' a bien été supprimé !')
    }

    const gallery = document.getElementById('gallery')

    async function displayGames() {
        for (const game in games) {
            const hours = games[game]

            const card = document.createElement('div')
            card.classList.add('card')

            const image = document.createElement('img')
            image.src = await getImageForGame(game)
            image.alt = "Image du jeu " + game

            const description = document.createElement('div')

            //titre
            const titleContainer = document.createElement('div')
            const title = document.createElement('h5')
            title.innerText = game
            const heartIcon = document.createElement('i')
            heartIcon.classList.add('heartIcon')
            titleContainer.appendChild(title)
            titleContainer.appendChild(heartIcon)
            titleContainer.classList.add('h5Container')

            const time = document.createElement('p')
            time.innerText = 'Heures jouées : ' + hours + 'h'

            card.appendChild(image)
            description.appendChild(titleContainer)
            description.appendChild(time)
            card.appendChild(description)

            gallery.appendChild(card)
        }
    }

    displayGames()

    async function getImageForGame(name) {
        //check if the image is not in cache already
        if (localStorage.getItem(name)) {
            return localStorage.getItem(name)
        }

        //if not, fetch it from the API
        const apiKey = '43cba438ff85433d8c7bbefbf7586b8f';
        const apiUrl = 'https://api.rawg.io/api/games?key=' + apiKey + '&search=' + name;
        const response = await fetch(apiUrl);
        const data = await response.json();
        const game = data.results[0];
        const image = game.background_image;

        localStorage.setItem(name, image)

        return image;
    }
</script>

</html>