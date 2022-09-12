<?php
require "konekcija.php";

$upit="SELECT * FROM kursevi WHERE kreator=".$_SESSION['korisnik']['ID'];
$rezultat=$connection->query($upit);

?>
<table>
    <?php
if($rezultat->num_rows>0)
{
    while ($row = mysqli_fetch_assoc($rezultat)) {
        ?>
            <tr>
        <td>
            <a href="kurs.php?id=<?= $row['ID'] ?>"><?= $row['naslov'] ?></a>
        </td>
        <?php
        if($row['odobren']=='0')
        {
            ?>
                <td>
                    <label class="status">Na čekanju</label><br>
                </td>
            <?php
        }
        else
        {
        ?>
                <td>
                    <label class="status">Odobren</label><br>
                </td>
        <?php
        }
    }
    ?>
    </tr>
    <?php
}
else
{
    ?>
        <tr>
            <td colspan="2">
                <label>Nema upisanih kurseva.</label>
            </td>
        </tr>
    <?php
}
?>
</table>