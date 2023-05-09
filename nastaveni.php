<?php

function autoloader(string $trida): void
{
    $trida = str_replace('\\', '/', $trida);

    if (!include($trida . '.php')) {
        throw new \Exception("Chyba načítání třídy $trida");
        exit;
    }
}

spl_autoload_register('autoloader');

Databaze::pripoj('127.0.0.1', 'root', '', 'pojisteni_db');
if ($_POST) {
    $datum_narozeni = date("Y-m-d H:i:s", strtotime($_POST['datum_narozeni']));

}