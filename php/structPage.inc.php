<?php
    function start_page() {
        echo '<!DOCTYPE php5.6>
        <html lang="fr">
        <head>
            <title>
                Nuit de l\'info
            </title>
            <meta charset="utf-8">
            <meta name="description" content="Le site de l\'équipe Mugiwara lors de la nuit de l\'info">
            <meta name="keywords" content="nuit, info, mugiwara, equipe, projet">
            <link rel="icon" type="favicon/ico" href="../favicon.ico"/>
            <link rel="stylesheet" href="../css/style.css">
        </head>
        <body>
        <header>
            <!-- Vide -->
        </header>
        <nav class="flex-container">
            <div></div>
            <div>
                <ul>
                    <li><a href="index.php"  class="active">Accueil</a></li>
                    <li><a href="cartes.php">Cartes</a></li>
                    <li><a href="evenements.php">Evenements</a></li>
                </ul>
            </div>
            <div>
                <ul>
                    <li><a href="connexion.php">Connexion</a></li>
                </ul>
            </div>
        </nav>';
    };

    function end_page() {
        echo '    <footer>
                    Ceci est le footer.
                </footer>
            </body>
        </html>';
    }
?>