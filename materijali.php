<?php
require "konekcija.php";

$upitKurs = "SELECT * FROM kursevi WHERE ID=" . $_REQUEST['id'];
$rezultatKurs = $connection->query($upitKurs);
$rowKurs = mysqli_fetch_assoc($rezultatKurs);
$trajanje = $rowKurs['vrijeme_trajanja'];

?>
<table>
    <?php
    for ($i = 1; $i <= $trajanje; $i++) {
        ?>
        <tr>
            <td>
                <div id="sedmica" .<?= $i ?>>
                    <table>
                        <tr>
                            <td>
                                <h3 class="sedmica">Sedmica <?= $i ?></h3>
                            </td>
                            <?php
                            if($_SESSION['korisnik']['ID']==$rowKurs['kreator'])
                            {
                                ?>
                            <td class="dodajMaterijalTd">
                                <a id="materijalSedmica".<?= $i ?> class="materijalLink" href="noviMaterijal.php?kurs=<?= $_REQUEST['id'] ?>&sedmica=<?= $i ?>">Dodaj materijal</a>
                            </td>
                            <?php
                            }else{
                                ?>
                            <td></td>
                            <?php
                            }
                            ?>
                        </tr>
                        <?php
                        $upit = "SELECT * FROM materijal WHERE kurs=" . $_REQUEST['id'] . " AND sedmica=" . $i;
                        $rezultat = $connection->query($upit);
                        if ($rezultat->num_rows > 0) {
                            while ($row = mysqli_fetch_assoc($rezultat)) {
                                ?>
                                <tr>
                                    <td width="70%">
                                        <a href="materijali/<?= $row['naziv'] ?>"><?= $row['naziv'] ?></a>
                                    </td>
                                    <td width="30%" class="tdZavrsen">
                                        <?php
                                        $pohadjaKurs=false;

                                        $upitUcesnik="SELECT * FROM učesnici WHERE kurs=".$_REQUEST['id'];
                                        $rezultatUcesnik = $connection->query($upitUcesnik);
                                        if ($rezultatUcesnik->num_rows > 0) {
                                            while ($rowUcesnik = mysqli_fetch_assoc($rezultatUcesnik)) {
                                                if($rowUcesnik['korisnik']==$_SESSION['korisnik']['ID'])
                                                    $pohadjaKurs=true;
                                            }
                                        }
                                        if ($pohadjaKurs){
                                        ?>
                                        <div id="divZavrsen">
                                            <?php
                                            $upitZavrsen="SELECT * FROM učesnik_materijal WHERE materijal=".$row['ID']." AND učesnik=".$_SESSION['korisnik']['ID'];
                                            $rezultatZavrsen = $connection->query($upitZavrsen);
                                            $rowZavrsen = mysqli_fetch_assoc($rezultatZavrsen);
                                            if($rowZavrsen['završen']==0)
                                            {
                                            ?>
                                            <a class="materijalLink" id="btnZavrsen".<?= $row['naziv'] ?> href="promjenaStanjaMaterijala.php?id=<?= $row['ID']?>&kurs=<?= $row['kurs']?>">Zavrsen</a>
                                            <?php
                                            }
                                            else
                                            {
                                                ?>
                                            <img class="imgZavrsen" src="../slike/zavrseno.jpg" alt="Zavrsen" width="20%" height="30vh">
                                            <?php
                                            }
                                            ?>
                                        </div>
                                        <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td>
                                    <label>Nema dostupnih materijala za datu sedmicu.</label>
                                </td>
                                <td></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </div>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
