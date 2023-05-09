<?php

namespace Evidence\Klienti;

use Databaze;

class SpravceKlientu
{
    /**
     * Založeno večer
     * @return array
     */
  
    public function detailKlienta(): array
    {
        return Databaze::dotaz('SELECT klient_id, jmeno, prijmeni, telefon, datum_narozeni FROM klient WHERE klient_id ')->fetchAll();
    }
    /**
     * Summary of vratKlienta Vypíše klienty
     * @return array
     */
    public function vratKlienta(): array
    {
        return Databaze::dotaz('SELECT * FROM klient ORDER BY prijmeni')->fetchAll();
    }
    /**
     * Vypíše seznam klientů se spojeným jménem a příjmením
     * @return array
     */
    public function vratSeznam(): array
    {
        return Databaze::dotaz('SELECT klient_id, CONCAT(jmeno, " ", prijmeni) AS cele_jmeno FROM klient ORDER BY prijmeni')->fetchAll();
    }
    /**
     * Načte klienta podle ID
     * @param mixed $klientId
     * @return mixed
     */
    public function nacti(int $klientId): array
    {
        return Databaze::dotaz('SELECT * FROM klient WHERE klient_id=?', array($klientId))->fetch();
    }
    /**
     * Přidá klienta do databáze
     * @param mixed $jmeno
     * @param mixed $prijmeni
     * @param mixed $telefon
     * @param mixed $datum_narozeni
     * @return void
     */
    public function pridej(string $jmeno, string $prijmeni, string $telefon, string $datum_narozeni): void
    {
        Databaze::dotaz('INSERT INTO klient (jmeno, prijmeni, telefon, datum_narozeni) VALUES (?, ?, ?, ?)', array($jmeno, $prijmeni, $telefon, $datum_narozeni));
    }
    /**
     * Upraví v datbázi klienta s daným ID
     * @param mixed $klientId
     * @param mixed $jmeno
     * @param mixed $prijmeni
     * @param mixed $telefon
     * @param mixed $datum_narozeni
     * @return void
     */
    public function uprav(int $klientId, string $jmeno, string $prijmeni, string $telefon, string $datum_narozeni): void
    {
        
        Databaze::dotaz('UPDATE klient SET jmeno=?, prijmeni=?, telefon=?, datum_narozeni=? WHERE klient_id=?', array($jmeno, $prijmeni, $telefon, $datum_narozeni, $klientId));
    }

    /**
     * Smaže klienta z databáze
     * @param mixed $klientId
     * @return void
     */
    public function odstran(int $klientId): void
    {
        Databaze::dotaz('DELETE FROM klient WHERE klient_id=?', array($klientId));
    }
}