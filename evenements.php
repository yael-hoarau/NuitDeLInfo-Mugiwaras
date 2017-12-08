<?php
require 'structPage.inc.php';
require 'bd.php';
start_page();
$query = 'SELECT * FROM events';
$result = mysqli_query($link, $query);
$query1 = 'SELECT pseudo FROM user WHERE email = \'' . $row['author'] . '\'';
$row1 = mysqli_fetch_assoc(mysqli_query($link, $query1));
while($row = mysqli_fetch_assoc($result)){
    ?>
    <div class="article">
        <h1><?php echo $row['name'] ?></h1>
        <h2> Du <?php echo $row['date_start'] ?> au <?php echo $row['date_end'] ?> à <?php echo $row['city'] ?>,
            <?php echo $row['region'] ?></h2>
        <?php echo $row['description'] ?>
        <p class="Signature">Posté par <?php echo $row['date_start'] ?>.</p>
    </div>
    <?php
}
?>
    <div class="article">
        <h1><?php ?></h1>
        <h2> Du 2 juin au 3 juin à La-Brioche-En-Oeuvre, PACA</h2>
        Ceci est l'event 1. Il constituera à faire toute la nuit. Cependant de l'alcool sera présent. Il faudra donc rester vigilant dans la zone autour de l'événement. Et si vous souhaitez participer, venez sur mon site web.
        <p class="Signature">Posté par La personne gérant l'event 2.</p>
    </div>
    <div class="article">
        <h1>Titre Event 2</h1>
        <h2> Du 8 juin au 7 octobre à Tartine-En-Attente, PACA</h2>
        Ceci est l'event 2. Il constituera à faire toute la nuit. Cependant de l'alcool sera présent. Il faudra donc rester vigilant dans la zone autour de l'événement. Et si vous souhaitez participer, venez sur mon site web.
        <p class="Signature">Posté par La personne gérant l'event 2.</p>
    </div>
    <div class="article">
        <h1>Titre Event 3</h1>
        <h2> Du 7 octobre au 9 novembre à La-Sardine-Sous-Roche, PACA</h2>
        Ceci est l'event 3. Il constituera à faire toute la nuit. Cependant de l'alcool sera présent. Il faudra donc rester vigilant dans la zone autour de l'événement. Et si vous souhaitez participer, venez sur mon site web.
        <p class="Signature">Posté par La personne gérant l'event 3.</p>
    </div>
<?php
end_page();
?>