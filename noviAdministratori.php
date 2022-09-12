<?php
require "konekcija.php";

$upit = "SELECT * FROM korisnici WHERE tip_korisnika = 'Administrator' AND odobren='0'";
$rezultat = $connection->query($upit);

if ($rezultat->num_rows > 0) {
    ?>
    <table>
        <?php
        while ($row = mysqli_fetch_assoc($rezultat)) {
            ?>
            <tr>
                <td width="80%">
                    <label class="noviAdministratori"><?= $row['ime'] . ' ' . $row['prezime'] ?></label>
                </td>
                <td width="20%">
                    <a class="odobravanje" id="<?= $row['ID'] ?>"
                       href="odobravanjeAdministratora.php?ID=<?= $row['ID'] ?>">Odobri</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    <?php
}
else {
    ?>
    <label>Nema neodobrenih administratora.</label>
    <?php
}