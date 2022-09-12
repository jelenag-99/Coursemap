<?php
require "konekcija.php";
if (!isset($_SESSION['korisnik']))
    header("Location: prijava.php");

$upit="SELECT * FROM kursevi WHERE odobren=1";

$rezultat=$connection->query($upit);
if($rezultat->num_rows>0)
{
    while ($row = mysqli_fetch_assoc($rezultat)) {

        $upitSelect="SELECT DISTINCT * FROM učesnici WHERE kurs=".$row['ID'];
        $rezultatSelect=$connection->query($upitSelect);
        $upisan=0;
        while ($red = mysqli_fetch_assoc($rezultatSelect)){
            if($red['korisnik']===$_SESSION['korisnik']['ID'])
                $upisan=1;
        }
        if($upisan==0)
        {
            ?>
            <div class="kurs">
                <img src="slike/<?=$row['slika']?>" alt="Kurs" width="90%" height="100px"><br>
                <a href="kurs.php?id=<?= $row['ID'] ?>"><?= $row['naslov'] ?></a><br>
                <label> <?= $row['podnaslov'] ?> </label><br><br>
                <label> <?= $row['highlights'] ?> </label><br><br>
                <a class="upis" href="upisNaKurs.php?ID=<?= $row['ID'] ?>">Upiši se</a>
            </div>
            <?php
        }
        else
        {
            ?>
            <div class="kurs">
                <img src="slike/<?=$row['slika']?>" alt="Kurs" width="90%" height="100px"><br>
                <a href="kurs.php?id=<?= $row['ID'] ?>"><?= $row['naslov'] ?></a><br>
                <label> <?= $row['podnaslov'] ?> </label><br><br>
                <label> <?= $row['highlights'] ?> </label><br><br>
            </div>
            <?php
        }
    }
}
else
{
    ?>
    <label>Nema dostupnih kurseva.</label>
    <?php
}