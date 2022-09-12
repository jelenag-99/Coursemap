<?php
session_start();
require "konekcija.php";
if (!isset($_SESSION['korisnik']))
    header("Location: prijava.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kursevi</title>
    <link rel="stylesheet" href="stilovi/profil.css">
    <script src="skripte/profil.js"></script>
</head>
<body>
<table>
    <tr>
        <td>
            <div class="korisnik">
                <label onclick="povratakNaProfil()"><?php echo $_SESSION['korisnik']['ime'] ?></label>
                <label onclick="povratakNaProfil()"><?php echo $_SESSION['korisnik']['prezime'] ?></label>
            </div>
            <br>
        </td>
        <td></td>
        <td>
            <div class="odjava">
                <a href="odjava.php">Odjava</a>
            </div>
            <br>
        </td>
    </tr>
    <tr>
        <td colspan="3">
            <ul>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="pregled.php">Pregled kurseva</a></li>
                <li><a href="pretraga.php">Pretraga</a></li>
                <li><a href="noviKurs.php">Kreiraj kurs</a></li>
            </ul>
        </td>
    </tr>
    <tr>
        <td colspan="3">
            <div id="pretraga" class="pretraga">
                <table>
                    <tr>
                        <td>
                            <h3>Pretraži kurseve</h3>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="text" id="pretragaNaslov" placeholder="Naslov"></td>
                        <td><input type="text" id="pretragaPodnaslov" placeholder="Podnaslov"></td>
                        <td><input type="text" id="pretragaMinCijena" placeholder="Minimalna cijena"></td>
                        <td><input type="text" id="pretragaMaxCijena" placeholder="Maksimalna cijena"></td>
                        <td><input type="number" id="pretragaVrijemeTrajanja" placeholder="Broj sedmica" min="1"></td>
                        <td><button class="korisnikLink" onclick="pretragaKurseva()">Pretraga kurseva</button></td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="3">
            <div id="divKursevi" class="divKursevi"></div>
        </td>
    </tr>
</table>