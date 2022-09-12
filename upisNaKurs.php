<?php
session_start();
require "konekcija.php";
if (!isset($_SESSION['korisnik']))
    header("Location: prijava.php");

$upit = "INSERT INTO `učesnici`(`korisnik`, `kurs`, `procenat`) VALUES('" . $_SESSION['korisnik']['ID'] . "', '" . $_REQUEST['ID'] . "', '0');";
$rezultat = $connection->query($upit);

$upit="SELECT * FROM materijal WHERE kurs=".$_REQUEST['ID'];
$rezultat = $connection->query($upit);

if($rezultat->num_rows>0) {
    while ($row = mysqli_fetch_assoc($rezultat)) {

        $upitInsert= "INSERT INTO `učesnik_materijal`(`učesnik`, `materijal`, `završen`) VALUES('" . $_SESSION['korisnik']['ID'] . "', '" . $row['ID'] . "', '0');";
        $rezultatInsert = $connection->query($upitInsert);
    }
}

if($rezultat==true)
    header("Location: profil.php");
else {
    die("Record failed.");
}