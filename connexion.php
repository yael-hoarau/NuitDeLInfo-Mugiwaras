<?php
require 'structPage.inc.php';
require 'verif.php';
start_page();
if(verif_connexion())
    echo 'Vous êtes connecté';
else {
    if (isset($_SESSION['test_co']) && $_SESSION['test_co'] )
        echo 'Vos identifiants sont faux';
    else if (!isset($_SESSION['email']))
        echo 'Vous n\'êtes pas connecté';?>
    <h1>CONNEXION</h1>
    <form action="connexion.php" method="post">
        e-mail : <input type="email" name="email"><br>
        Mot de passe : <input type="password" name="pwd"><br>
        <input type="submit" value="Se connecter">
    </form>

    <a href="inscription.php">Pas encore inscrit ?</a>

    <?php
}
end_page();
?>