<?php
require 'structPage.inc.php';
start_page();
?>
    <form action="verif.php" method="post">
        <h1>INSCRIPTION</h1>
        e-mail : <input type="email" name="email"><br>
        Mot de passe : <input type="password" name="pwd"><br>
        Pseudo : <input type="text" name="pseudo"><br>
        Type : <input type="radio" name="type" value="classique"> Utilisateur classique
                <input type="radio" name="type" value="organisateur"> Organisateur d'évènement
        <input type="submit" value="S'inscrire">
    </form>

    <a href="inscription.php">Pas encore inscrit ?</a>
<?php
end_page();
?>