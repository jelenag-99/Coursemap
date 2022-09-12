<?php
session_start();
require "konekcija.php";
if (!isset($_SESSION['korisnik']))
    header("Location: prijava.php");

if($_REQUEST['naslov']=='' || $_REQUEST['podnaslov']=='' || $_REQUEST['vrijemeTrajanja']=='' || $_REQUEST['sedmicnoOpterecenje']=='' || $_REQUEST['cijena']=='' || $_REQUEST['highlights']=='')
{
    setcookie('notification', "Fields values are not correct.", time()+1500, "/");
    header("Location: registracija.php");
}
else
{
    if($_FILES["slikaKursa"]["name"]=='')
        $slika="default.jpg";
    else
    {
        $target_dir = "slike/";
        $target_file = $target_dir . basename($_FILES["slikaKursa"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["slikaKursa"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["slikaKursa"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["slikaKursa"]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        $slika=$_FILES["slikaKursa"]["name"];
    }

    $upit="SELECT * FROM kursevi";
    $rezultat = $connection->query($upit);
    while ($row = mysqli_fetch_assoc($rezultat)) {
        $id++;
    }
    $id++;

    $upit = "INSERT INTO `kursevi`(`ID`, `naslov`, `podnaslov`, `vrijeme_trajanja`, `sedmično_opterećenje`, `cijena`, `highlights`, `kreator`, `odobren`, `slika`) VALUES('" . $id . "', '" . $_REQUEST['naslov'] . "', '" . $_REQUEST['podnaslov'] . "', '" . $_REQUEST['vrijemeTrajanja'] . "', '" . $_REQUEST['sedmicnoOpterecenje'] . "', '" . $_REQUEST['cijena'] . "', '" . $_REQUEST['highlights'] . "', '" . $_SESSION['korisnik']['ID'] . "', '0', '" .$slika . "');";
    $rezultat = $connection->query($upit);

    if($rezultat===true)
        header("Location: profil.php");
    else {
        die("Record failed.");
    }
}

