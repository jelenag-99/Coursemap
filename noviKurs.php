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
    <link rel="stylesheet" href="stilovi/noviKurs.css">
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
            <br><br>
        </td>
        <td></td>
        <td>
            <div class="odjava">
                <a href="odjava.php">Odjava</a>
            </div>
            <br><br>
        </td>
    </tr>
    <tr>
        <td rowspan="2">
            <div class="slikaKreiranje">
                <img src="slike/pocetna.gif"></td>
            </div>
        </td>
        <td colspan="2">
            <br><h2>Novi kurs</h2><br>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <div class="forma">
                <form action="kreiranjeKursa.php" method="post" enctype="multipart/form-data">
                    <label for="naslov">Naslov:</label>
                    <input type="text" id="naslov" name="naslov"><br><br>
                    <label for="Podnaslov">Podnaslov:</label>
                    <input type="text" id="podnaslov" name="podnaslov"><br><br>
                    <label for="vrijemeTrajanja">Vrijeme trajanja u sedmicama:</label>
                    <input type="number" id="vrijemeTrajanja" name="vrijemeTrajanja" min="0"><br><br>
                    <label for="sedmicnoOpterecenje">Sedmično opterećenje:</label>
                    <input type="number" id="sedmicnoOpterecenje" name="sedmicnoOpterecenje" min="0"><br><br>
                    <label for="cijena">Cijena:</label>
                    <input type="text" id="cijena" name="cijena"><br><br>
                    <label for="highlights" id="labelHighlights">Highlights:</label>
                    <textarea id="highlights" name="highlights" rows="3" cols="50"></textarea><br><br>
                    <label for="slikaKursa" id="labelSlika">Slika:</label>
                    <input type="file" accept="image/*" id="slikaKursa" name="slikaKursa" value="Izaberite sliku" onchange="dodavanjeSlike(this)"><br><br>
                    <button type="submit">Kreiraj kurs</button>
                    <button type="reset">Reset</button>
                </form>
            </div>
        </td>
    </tr>
</table>

