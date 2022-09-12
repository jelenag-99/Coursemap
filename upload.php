<?php
session_start();
require "konekcija.php";
if (!isset($_SESSION['korisnik']))
    header("Location: prijava.php");


$target_dir = "materijali/";
$target_file = $target_dir . basename($_FILES["noviMaterijal"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["noviMaterijal"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

/*// Check file size
if ($_FILES["noviMaterijal"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}*/

// Allow certain file formats
/*if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
*/
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["noviMaterijal"]["tmp_name"], $target_file)) {
        echo "The file " . htmlspecialchars(basename($_FILES["noviMaterijal"]["name"])) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$fileType = strtolower(pathinfo($_FILES["noviMaterijal"]["name"], PATHINFO_EXTENSION));
if($fileType=='pdf' || $fileType=='txt' || $fileType=='doc')
    $tip='Tekstualni fajl';
else
    $tip='Video fajl';

$id=0;
$upitUpload="SELECT * FROM materijal";
$rezultatUpload = $connection->query($upitUpload);
while ($rowUpload = mysqli_fetch_assoc($rezultatUpload)) {
    $id++;
}
$id++;

$upitUpload="INSERT INTO materijal(ID, naziv, tip, sedmica, kurs) VALUES (".$id.", '".$_FILES["noviMaterijal"]["name"]."', '".$tip."', ".$_REQUEST['sedmica'].", ".$_REQUEST['kurs'].")";
$rezultatUpload = $connection->query($upitUpload);

$upitUpload="SELECT * FROM učesnici WHERE kurs=".$_REQUEST['kurs'];
$rezultatUpload = $connection->query($upitUpload);
if($rezultatUpload->num_rows>0) {
    while ($rowUpload = mysqli_fetch_assoc($rezultatUpload)) {

        $upitInsertMaterijal = "INSERT INTO `učesnik_materijal`(`učesnik`, `materijal`, `završen`) VALUES('" . $rowUpload['korisnik'] . "', '" . $id . "', '0');";
        $rezultatInsertMaterijal = $connection->query($upitInsertMaterijal);
    }
}

if($rezultatUpload==true)
    header("Location: kurs.php?id=".$_REQUEST['kurs']);
else {
    die("Record failed.");
}
