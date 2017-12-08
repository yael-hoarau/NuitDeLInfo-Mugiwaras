<?php
require 'structPage.inc.php';
start_page();


if(isset($_SESSION['alreadyIn']) && $_SESSION['alreadyIn'] == true)
    echo 'Vous êtes déjà inscrit';
/*else if(verif_inscription())
    echo 'Vous êtes bien inscrit';*/
else
    echo 'Salut';
    ?>
    <h1>INSCRIPTION</h1>
    <form action="inscription.php" method="post">
        e-mail : <input type="email" name="email"><br>
        Mot de passe : <input type="password" name="pwd"><br>
        Pseudo : <input type="text" name="pseudo"><br>
        Type : <input type="radio" name="type" value="classique"> Utilisateur classique
        <input type="radio" name="type" value="organisateur"> Organisateur d'évènement
        <input type="submit" value="S'inscrire">
    </form>

    <a href="connexion.php">Déjà inscrit ? Se connecter</a>
    <?php

end_page();
?>