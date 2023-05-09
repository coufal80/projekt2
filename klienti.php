<?php

require('nastaveni.php');

use Evidence\Klienti\SpravceKlientu;

$spravceKlientu = new SpravceKlientu();

$klient = array(
    'klient_id' => '',
    'jmeno' => '',
    'prijmeni' => '',
    'telefon' => '',
    'datum_narozeni' => '',
);


if ($_POST) {


    if (!$_POST['klient_id'])
        $spravceKlientu->pridej($_POST['jmeno'], $_POST['prijmeni'], $_POST['telefon'], $datum_narozeni);
    else
        $spravceKlientu->uprav($_POST['klient_id'], $_POST['jmeno'], $_POST['prijmeni'], $_POST['telefon'], $datum_narozeni);
    header('Location: klienti_vypis.php');

    exit;
}

if (isset($_GET['editovat'])) {
    $nactenyKlient = $spravceKlientu->nacti($_GET['editovat']);
    if ($nactenyKlient)
        $klient = $nactenyKlient;
}


$titulek = 'Správa klientů';
$popis = 'Přidávání a editace klientů do systému.';
require('sablony/rozlozeni_horni_cast.php');
?>
<!-- Po návratu musím upravit formulář, protože se neodesílají data po editaci -->
<form method="post">

    <?php $datum_narozeni = date("d.m.Y", strtotime($klient['datum_narozeni'])); ?>
    <input type="hidden" name="klient_id" value="<?= htmlspecialchars($klient['klient_id']) ?>" />
    Jméno
    <br />
    <input type="text" name="jmeno" value="<?= htmlspecialchars($klient['jmeno']) ?>" maxlenght="31" />
    <br />
    Příjmení
    <br />
    <input type="text" name="prijmeni" value="<?= htmlspecialchars($klient['prijmeni']) ?>" maxlenght="31" />
    <br />
    Telefon
    <br>
    <input type="text" name="telefon" value="<?= htmlspecialchars($klient['telefon']) ?>" />
    <br>
    Datum narození:
    <br />
    <input type="text" name="datum_narozeni" value="<?= htmlspecialchars($datum_narozeni) ?>" />
    <br />
    <div class="centrovany">
        <input type="submit" value="Odeslat" />
    </div>

</form>

<?php
require('sablony/rozlozeni_dolni_cast.php');
?>