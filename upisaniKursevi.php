<?php
require "konekcija.php";
if (!isset($_SESSION['korisnik']))
    header("Location: prijava.php");

$upit = "SELECT * FROM učesnici JOIN kursevi ON učesnici.kurs=kursevi.ID WHERE učesnici.korisnik=" . $_SESSION['korisnik']['ID'];
$rezultat = $connection->query($upit);
?>
<table>
    <?php
    if ($rezultat->num_rows > 0) {
        while ($row = mysqli_fetch_assoc($rezultat)) {
            ?>
            <tr>
                <td width="50%">
                    <a href="kurs.php?id=<?= $row['ID'] ?>"><?= $row['naslov'] ?></a>
                </td>
                <td width="50%">
                    <progress id="progres" .<?= $row['ID'] ?> value="<?= $row['procenat'] ?>"></progress>
                    <?php
                    $procenat=($row['procenat'])*100;
                    ?>
                    <label><?= $procenat ?>%</label>
                </td>
            </tr>
            <?php
        }
    } else {
        ?>
        <label>Nema upisanih kurseva.</label>
        <?php
    }
    ?>
</table>
