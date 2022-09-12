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
                <li><a href="pregled.php" onclick="pregledKurseva()">Pregled kurseva</a></li>
                <li><a href="pretraga.php">Pretraga</a></li>
                <li><a href="noviKurs.php">Kreiraj kurs</a></li>
            </ul>
        </td>
    </tr>
    <tr>
        <td width="20%">
            <div class="divLijevi">
                <label>Tip korisnika: <?php echo $_SESSION['korisnik']['tip_korisnika'] ?></label><br><br>
                <label>Titula: <?php echo $_SESSION['korisnik']['titula'] ?></label><br><br>
                <label>Datum rođenja: <?php echo $_SESSION['korisnik']['datum_rodjenja'] ?></label><br><br>
                <label>Email: <?php echo $_SESSION['korisnik']['email_adresa'] ?></label><br><br>
            </div>
        </td>
        <td width="40%">
            <div class="divCentar">
                <?php
                if ($_SESSION['korisnik']['tip_korisnika'] == "Korisnik")
                {
                    ?>
                    <h2>Upisani kursevi</h2><br><br>
                    <?php
                    include "upisaniKursevi.php";
                }
                else
                {
                    ?>
                    <h2>Kursevi na čekanju</h2><br><br>
                    <?php
                    include "kurseviNaCekanju.php";
                }
                ?>
            </div>
        </td>
        <td width="40%">
            <div class="divDesni" id="divDesni">
                <?php
                if ($_SESSION['korisnik']['tip_korisnika'] == "Korisnik")
                {
                    ?>
                    <h2>Kreirani kursevi</h2><br><br>
                    <?php
                    include "kreiraniKursevi.php";
                }
                else
                {
                    ?>
                    <h2>Novi administratori</h2><br><br>
                    <?php
                    include "noviAdministratori.php";
                }
                ?>
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="3">

        </td>
    </tr>
    <tr>
        <td colspan="3">
            <div id="divKursevi" class="divKursevi"></div>
        </td>
    </tr>
</table>
</body>
</html>