<?php
require "konekcija.php";

$upit="SELECT * FROM učesnici JOIN korisnici ON učesnici.korisnik=korisnici.ID WHERE kurs=".$_REQUEST['id'];
$rezultat=$connection->query($upit);

if($rezultat->num_rows>0)
{
    while ($row = mysqli_fetch_assoc($rezultat)) {
        ?>
        <label ><?= $row['ime'].' '.$row['prezime']?></label><br>
        <?php
    }
}
else
{
    ?>
    <label>Nema upisanih polaznika kursa.</label>
    <?php
}