<?php

include "konekcija.php";

$upit = "UPDATE korisnici SET odobren='1' WHERE ID=".$_REQUEST['ID'];
$rezultat = $connection->query($upit);

if($rezultat===true)
    header("Location: profil.php");
else {
    die("Record failed.");
}