<?php

include "konekcija.php";

$upit = "UPDATE kursevi SET kreator=NULL WHERE ID=".$_REQUEST['ID'];
$rezultat = $connection->query($upit);

$upit = "DELETE FROM učesnici WHERE kurs=".$_REQUEST['ID'];
$rezultat = $connection->query($upit);

$upit = "DELETE FROM učesnik_materijal JOIN materijal ON materijal=ID WHERE kurs=".$_REQUEST['ID'];
$rezultat = $connection->query($upit);

$upit = "DELETE FROM materijal WHERE kurs=".$_REQUEST['ID'];
$rezultat = $connection->query($upit);

$upit = "DELETE FROM kursevi WHERE ID=".$_REQUEST['ID'];
$rezultat = $connection->query($upit);

if($rezultat===true)
    header("Location: profil.php");
else {
    die($connection->error_list);
}
