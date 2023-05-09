<?php
require('nastaveni.php');

use Evidence\Sluzby\SpravceSluzeb;
use Evidence\Klienti\SpravceKlientu;

$spravceSluzeb = new SpravceSluzeb;
$spravceKlientu = new SpravceKlientu;

$seznamKlientu = $spravceKlientu->vratSeznam();

$sluzba = array(
    'sluzba_id' => '',
    'znacka' => '',
    'popis' => '',
    'kod' => '',
    'klient_id' => '',
);

if ($_POST) {
    if (!$_POST['sluzba_id'])
        $spravceSluzeb->pridej($_POST['znacka'], $_POST['popis'], $_POST['kod'], $_POST['klient_id']);
    else
        $spravceSluzeb->uprav($_POST['sluzba_id'], $_POST['znacka'], $_POST['popis'], $_POST['kod'], $_POST['klient_id']);
    header('Location: sluzby_vypis.php');
    exit;
}

if (isset($_GET['editovat'])) {
    $nactenySluzba = $spravceSluzeb->nacti($_GET['editovat']);
    if ($nactenySluzba)
        $sluzba = $nactenySluzba;
}

$titulek = 'Správa služeb';
$popis = 'Přidávání a editace služeb do systému.';
require('sablony/rozlozeni_horni_cast.php');
?>

<form method="post">
    <input type="hidden" name="sluzba_id" value="<?= htmlspecialchars($sluzba['sluzba_id']) ?>" />
    Služba<br />
    <input type="text" name="znacka" value="<?= htmlspecialchars($sluzba['znacka']) ?>" maxlenght="15" /><br />
    Popis služby<br />
    <input type="text" name="popis" value="<?= htmlspecialchars($sluzba['popis']) ?>" maxlenght="15" /><br />
    Kód Služby<br />
    <input type="text" name="kod" value="<?= htmlspecialchars($sluzba['kod']) ?>" maxlenght="7" /><br />
    Klient<br />
    <select name="klient_id">
        <option value="">Nikdo</option>
        <?php foreach ($seznamKlientu as $polozka): ?>
            <option value="<?= htmlspecialchars($polozka['klient_id']) ?>" <?php if ($sluzba['klient_id'] == $polozka['klient_id']): ?>selected="selected" <?php endif ?>>
                <?= htmlspecialchars($polozka['cele_jmeno']) ?>
            </option>
        <?php endforeach ?>
    </select><br />
    <div class="centrovany">
        <input type="submit" value="Odeslat" />
    </div>
</form>

<?php
require('sablony/rozlozeni_dolni_cast.php');
?>