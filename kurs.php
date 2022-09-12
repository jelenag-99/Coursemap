<?php
session_start();
require "konekcija.php";
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
            <br><br><br>
        </td>
        <td></td>
        <td>
            <div class="odjava">
                <a href="odjava.php">Odjava</a>
            </div>
            <br><br><br>
        </td>
    </tr>
    <tr>
        <td width="20%">
            <div class="divLijevi">
                <?php

                $upit="SELECT * FROM kursevi WHERE ID=".$_REQUEST['id'];
                $rezultat=$connection->query($upit);

                if($rezultat->num_rows>0)
                {
                    $row = mysqli_fetch_assoc($rezultat);
                    ?>
                    <img src="slike/<?=$row['slika']?>" width="90%" height="200vh">
                    <h2><?= $row['naslov'] ?></h2>
                    <label><?= $row['podnaslov'] ?></label><br><br>
                    <label>Trajanje u sedmicama: <?= $row['vrijeme_trajanja'] ?></label><br><br>
                    <label>Broj časova u sedmici: <?= $row['sedmično_opterećenje'] ?> </label><br><br>
                    <label>Cijena: <?= $row['cijena'] ?> KM</label><br><br>
                    <?php
                }
                ?>
            </div>
            <?php
            if($_SESSION['korisnik']['tip_korisnika']=='Administrator')
            {
                ?>
                <br>
                <?php
                if($row['odobren']==0)
                {
                ?>
                <a class="adminButton" href="odobravanjeKursa.php?ID=<?= $_REQUEST['id'] ?>">Odobri</a><br>
                    <?php
                }
                    ?>
                <a class="adminButton" href="brisanjeKursa.php?ID=<?= $_REQUEST['id'] ?>">Obriši</a>
                <?php
            }
            ?>
        </td>
        <td width="60%" rowspan="2">
            <div class="divCentar">
                <h2>Materijali</h2><br><br>
                <?php
                include "materijali.php";
                ?>
            </div>
        </td>
        <td width="20%" rowspan="2">
            <div class="divDesni">
                <h2>Učesnici</h2><br><br>
                <?php
                include "ucesnici.php";
                ?>
            </div>
        </td>
    </tr>
</table>
</body>
</html>