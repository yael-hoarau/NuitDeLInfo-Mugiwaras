<?php
    function start_page() {
        echo '<!DOCTYPE html>
            <html lang="fr">
            <head>
                <title>
                    Nuit de l\'info
                </title>
                <meta charset="utf-8">
                <meta name="description" content="Le site de l\'équipe Mugiwara lors de la nuit de l\'info">
                <meta name="keywords" content="nuit, info, mugiwara, equipe, projet">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
                <link rel="icon" type="favicon/ico" href="favicon.ico"/>
                <link rel="background" type=background/jpg" href="background2.jpg">
                <link rel="stylesheet" href="css/style.css">
            </head>
            <body>
            <header>
                <!-- Vide -->
            </header>
            <nav class="flex-container">
                <div></div>
                <div>
                    <ul>
                        <li><a href="index.php">Accueil</a></li>
                        <li><a href="cartes.php">Cartes</a></li>
                        <li><a href="evenements.php">Evenements</a></li>
                    </ul>
                </div>
                <div>
                    <ul>
                        <li><a id="buttonConnect" href="connexion.php">Connexion</a></li>
                    </ul>
                </div>
            </nav>';
    };

    function end_page() {
        echo '<footer>
                Ce site web a été crée et réalisé par l\'équipe Mugiwara pendant la nuit de l\'Info de 2017.
              </footer>
              </body>
              </html>';
    }
?>