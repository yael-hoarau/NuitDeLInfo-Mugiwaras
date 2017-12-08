<?php
$link = mysqli_connect('mysql-mugiwara.alwaysdata.net:3306', 'mugiwara', 'mugiwara')
or die('Pb de connexion au serveur: ' . mysqli_connect_error());
mysqli_select_db($link, 'mugiwara_nuitinfo') or die ('Pb de sélection BD : ' . mysqli_error($link));
?>