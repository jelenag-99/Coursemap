<?php
session_start();
require "konekcija.php";
if (!isset($_SESSION['korisnik']))
    header("Location: prijava.php");

$upitPromjenaStanja="UPDATE učesnik_materijal SET završen=1 WHERE učesnik=".$_SESSION['korisnik']['ID']." AND materijal=".$_REQUEST['id'];
$rezultatPromjenaStanja=$connection->query($upitPromjenaStanja);

$upitKursevi="SELECT * FROM kursevi WHERE ID=".$_REQUEST['kurs'];
$rezultatKursevi=$connection->query($upitKursevi);
$rowKursevi = mysqli_fetch_assoc($rezultatKursevi);
$trajanje = $rowKursevi['vrijeme_trajanja'];
$brojZavrsenihSedmica = 0;
$procenat = 0;

for ($i = 1; $i <= $trajanje; $i++) {
    //$upit = "SELECT * FROM materijal JOIN učesnici ON materijal.kurs=učesnici.kurs JOIN učesnik_materijal ON učesnik_materijal.materijal=materijal.ID WHERE materijal.kurs=" . $row['ID'] . " AND sedmica=" . $i . " AND učesnici.korisnik=" . $_SESSION['korisnik']['ID'];
    $upitMaterijal="SELECT * FROM materijal WHERE kurs=".$_REQUEST['kurs']." AND sedmica=".$i;
    $rezultatMaterijal = $connection->query($upitMaterijal);
    $zavrsenaSedmica = 1;
    if ($rezultatMaterijal->num_rows > 0) {
        while ($rowMaterijal = mysqli_fetch_assoc($rezultatMaterijal)) {
            $upitZavrsen="SELECT * FROM učesnik_materijal WHERE učesnik=".$_SESSION['korisnik']['ID']." AND materijal=".$rowMaterijal['ID'];
            $rezultatZavrsen = $connection->query($upitZavrsen);
            $rowZavrsen = mysqli_fetch_assoc($rezultatZavrsen);
            $zavrsen = $rowZavrsen['završen'];
            if ($zavrsen == 0)
                $zavrsenaSedmica = 0;
        }
    } else {
        $zavrsenaSedmica = 0;
    }

    if ($zavrsenaSedmica === 1)
        $brojZavrsenihSedmica++;
}
$procenat = ($brojZavrsenihSedmica / $trajanje);
$upitProcenat="UPDATE učesnici SET procenat=".$procenat." WHERE kurs=".$_REQUEST['kurs']." AND korisnik=".$_SESSION['korisnik']['ID'];
$rezultatProcenat=$connection->query($upitProcenat);

if($rezultatProcenat==true)
    header("Location: kurs.php?id=".$_REQUEST['kurs']);
else {
    die("Record failed.");
}