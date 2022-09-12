<?php
require "konekcija.php";

$upit="SELECT * FROM kursevi WHERE odobren=0";
$rezultat=$connection->query($upit);

if($rezultat->num_rows>0)
{
    ?>
    <table>
    <?php
    while ($row = mysqli_fetch_assoc($rezultat)) {
        ?>
            <tr>
                <td width="80%">
                    <a><?= $row['naslov'] ?></a>
                </td>
                <td width="20%">
                    <a class="odobravanje" id="<?= $row['naslov'] ?>" href="kurs.php?id=<?= $row['ID'] ?>">Pregledaj</a>
                </td>
            </tr>
        <?php
    }
    ?>
    </table>
    <?php
}
else
{
    ?>
    <label>Nema neodobrenih kurseva.</label>
    <?php
}