<?php

include "konekcija.php";

if($_REQUEST['tip']=='0' || $_REQUEST['ime']=='' || $_REQUEST['prezime']=='' || $_REQUEST['datumRodjenja']=='' || $_REQUEST['titula']=='' || $_REQUEST['email']=='' || $_REQUEST['lozinka']=='')
{
    setcookie('notification', "Fields values are not correct.", time()+1500, "/");
    header("Location: registracija.php");
}
else {
    $upit="SELECT * FROM korisnici";
    $rezultat = $connection->query($upit);
    while ($row = mysqli_fetch_assoc($rezultat)) {
        $id++;
    }
    $id++;

    if ($_REQUEST['tip'] == 'Administrator') {
        $upit = "SELECT * FROM korisnici WHERE tip_korisnika='Administrator'";
        $rezultat = $connection->query($upit);

        if ($rezultat->num_rows > 0) {
            $upit = "INSERT INTO `korisnici`(`ID`, `tip_korisnika`, `ime`, `prezime`, `datum_rodjenja`, `titula`, `email_adresa`, `lozinka`,  `odobren`) VALUES('" . $id . "', '" . $_REQUEST['tip'] . "', '" . $_REQUEST['ime'] . "', '" . $_REQUEST['prezime'] . "', '" . $_REQUEST['datumRodjenja'] . "', '" . $_REQUEST['titula'] . "', '" . $_REQUEST['email'] . "', '" . $_REQUEST['lozinka'] . "', '0');";
        } else {
            $upit = "INSERT INTO `korisnici`(`ID`, `tip_korisnika`, `ime`, `prezime`, `datum_rodjenja`, `titula`, `email_adresa`, `lozinka`, `odobren`) VALUES('" . $id . "', '" . $_REQUEST['tip'] . "', '" . $_REQUEST['ime'] . "', '" . $_REQUEST['prezime'] . "', '" . $_REQUEST['datumRodjenja'] . "', '" . $_REQUEST['titula'] . "', '" . $_REQUEST['email'] . "', '" . $_REQUEST['lozinka'] . "', '1');";
        }
    }
    else
    {
        $upit = "INSERT INTO `korisnici`(`ID`, `tip_korisnika`, `ime`, `prezime`, `datum_rodjenja`, `titula`, `email_adresa`, `lozinka`) VALUES('" . $id . "', '" . $_REQUEST['tip'] . "', '" . $_REQUEST['ime'] . "', '" . $_REQUEST['prezime'] . "', '" . $_REQUEST['datumRodjenja'] . "', '" . $_REQUEST['titula'] . "', '" . $_REQUEST['email'] . "', '" . $_REQUEST['lozinka'] . "');";
    }
    $rezultat = $connection->query($upit);

    if($rezultat===true)
        header("Location: index.php");
    else {
        die("Record failed.");
    }
}
