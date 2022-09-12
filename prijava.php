<?php
session_start();
if (isset($_SESSION['korisnik']))
    header("Location: profil.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kursevi</title>
    <link rel="stylesheet" href="stilovi/prijava.css">
</head>
<body>
<table>
    <tr>
        <td>
            <div class="divLijevi">
                <img src="slike/pocetna.gif"></td>
            </div>
        </td>
        <td>
            <div class="divDesni">
                <h1 id="prijavaNaslov">Prijava</h1><br><br>
                <div class="forma">
                    <form action="provjeraPrijave.php" method="post">
                        <label for="email">Unesite email:</label>
                        <input type="email" id="email" name="email"><br><br>
                        <label for="lozinka">Unesite lozinku:</label>
                        <input type="password" id="lozinka" name="lozinka"><br><br>
                        <button type="submit">Prijavi se</button>
                        <button type="reset">Reset</button>
                    </form>
                </div>
            </div>
        </td>
    </tr>
</table>
</body>
</html>