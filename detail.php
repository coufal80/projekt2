<?php
require('nastaveni.php');

//deklarace namespacu ktere budeme vyuzivat
use Evidence\Klienti\SpravceKlientu;

$spravceKlientu = new SpravceKlientu();


$klienti = $spravceKlientu->detailKlienta();
$titulek = 'Detaily';
$popis = 'Výpis detailu klienta.';
require('sablony/rozlozeni_horni_cast.php');



?>

<table class="tabulka">
    <tr>
        <th>Jméno</th>
        <th>Příjmení</th>
        <th>Telefon</th>
        <th>Datum narození</th>
        <th></th>
        <th></th>
    </tr>
    <?php foreach ($klienti as $klient): ?>
        <?php $datum_narozeni = date("d.m.Y", strtotime($klient['datum_narozeni'])); ?>
        <tr>
            <td>
                <?= htmlspecialchars($klient['jmeno']) ?>
            </td>
            <td>
                <?= htmlspecialchars($klient['prijmeni']) ?>
            </td>
            <td>
                <?= htmlspecialchars($klient['telefon']) ?>
            </td>
            <td>
                <?= htmlspecialchars($datum_narozeni) ?>
            </td>
            <td><a href="klienti_vypis.php?detail=<?= htmlspecialchars($klient['klient_id']) ?>">Zpětna výpis</a></td>

        </tr>

        <?php endforeach ?>
</table>

<nav>
    <a href="klienti.php">Nový klient</a>
</nav>

<?php require('sablony/rozlozeni_dolni_cast.php'); ?>