<?php
require "konekcija.php";
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
                <h1 id="registracijaNaslov">Registracija</h1><br><br>
                <div class="forma">
                    <form action="provjeraRegistracije.php" method="post">
                        <label for="tip">Tip korisnika: </label>
                        <select id="tip" name="tip">
                            <option value="0">--Izaberite tip korisnika--</option>
                            <option value="Administrator">Administrator</option>
                            <option value="Korisnik">Korisnik</option>
                        </select><br><br>
                        <label for="ime">Ime:</label>
                        <input type="text" id="ime" name="ime"><br><br>
                        <label for="prezime">Prezime:</label>
                        <input type="text" id="prezime" name="prezime"><br><br>
                        <label for="datumRodjenja">Datum rođenja:</label>
                        <input type="date" id="datumRodjenja" name="datumRodjenja"><br><br>
                        <label for="titula">Titula:</label>
                        <input type="text" id="titula" name="titula"><br><br>
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email"><br><br>
                        <label for="lozinka">Lozinka:</label>
                        <input type="password" id="lozinka" name="lozinka"><br><br>
                        <button type="submit">Registruj se</button>
                        <button type="reset">Reset</button>
                    </form>
                </div>
            </div>
        </td>
    </tr>
</table>
</body>
</html>
