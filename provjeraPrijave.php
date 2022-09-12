<?php
session_start();
require "konekcija.php";

$upit="SELECT * FROM korisnici WHERE email_adresa='".$_REQUEST['email']."' AND lozinka='".$_REQUEST['lozinka']."'";

$rezultat=$connection->query($upit);

if($rezultat->num_rows>0) {
    $row = mysqli_fetch_assoc($rezultat);
    if ($row['tip_korisnika'] == 'Administrator' && $row['odobren'] == '0')
    {
        setcookie('notification',"Login failed. Wrong username or password!", time()+1500, "/");
        header("Location: prijava.php");
    }
    else
    {
        $_SESSION['korisnik']=$row;
        header("Location: profil.php");
    }
}
else
{
    setcookie('notification',"Login failed. Wrong username or password!", time()+1500, "/");
    header("Location: prijava.php");
}