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
        <td class="dodajMaterijalTd">
            <h2>Dodaj materijal</h2><br>
        </td>
    </tr>
    <tr>
        <td class="formaTd">
            <div class="formaMaterijal">
                <form action="upload.php?sedmica=<?= $_REQUEST['sedmica'] ?>&kurs=<?= $_REQUEST['kurs'] ?>" method="post" enctype="multipart/form-data">
                    <label for="noviMaterijal">Izaberite fajl:</label>
                    <input type="file" id="noviMaterijal" name="noviMaterijal" accept="*/*"><br><br>
                    <button type="submit" name="btnDodaj">Dodaj</button>
                    <button type="reset">Reset</button>
                </form>
            </div>
        </td>
    </tr>
</table>
