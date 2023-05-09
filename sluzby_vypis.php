<?php
require('nastaveni.php');

//deklarace namespacu ktere budeme vyuzivat

use Evidence\Sluzby\SpravceSluzeb;

$spravceSluzeb = new SpravceSluzeb();

if (isset($_GET['odstranit']))
    $spravceSluzeb->odstran($_GET['odstranit']);

$sluzby = $spravceSluzeb->vratSluzby();

$titulek = 'Služby';
$popis = 'Výpis služeb.';
require('sablony/rozlozeni_horni_cast.php');
?>

<table class="tabulka">
    <tr>
        <th>Značka</th>
        <th>Popis</th>
        <th>Kód služby</th>
        <th>Klient</th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
    <?php foreach ($sluzby as $sluzba): ?>

        <tr>
            <td>
                <?= htmlspecialchars($sluzba['znacka']) ?>
            </td>
            <td>
                <?= htmlspecialchars($sluzba['popis']) ?>
            </td>
            <td>
                <?= htmlspecialchars($sluzba['kod']) ?>
            </td>
            <td>
                <?= htmlspecialchars($sluzba['jmeno']) . ' ' . htmlspecialchars($sluzba['prijmeni']) ?>
            </td>
            <td><a href="#">Detail</a></td>
            <td><a href="sluzby.php?editovat=<?= htmlspecialchars($sluzba['sluzba_id']) ?>">Edit</a></td>
            <td><a href="sluzby_vypis.php?odstranit=<?= htmlspecialchars($sluzba['sluzba_id']) ?>">X</a></td>
        </tr>

    <?php endforeach ?>
</table>

<nav>
    <a href="sluzby.php">Nová služba</a>
</nav>

<?php require('sablony/rozlozeni_dolni_cast.php'); ?>