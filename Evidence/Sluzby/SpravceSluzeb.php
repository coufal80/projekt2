<?php

namespace Evidence\Sluzby;

use Databaze;

class SpravceSluzeb
{
    /**
     * Summary of vratSluzby Vrati vsechny služby spojenese s klienty
     * @return array
     */
    public function vratSluzby() : array
    {
        return Databaze::dotaz('SELECT * FROM sluzba LEFT JOIN klient USING (klient_id) ORDER BY kod')->fetchAll();
    }

    /**
     *  nacte službu podle  ID
     * @param mixed $sluzbaId
     * @return mixed
     */
    public function nacti(int $sluzbaId) : array
    {
        return Databaze::dotaz('SELECT * FROM sluzba WHERE sluzba_id=?', array($sluzbaId))->fetch();
    }
    
    /**
     * /prida novou slulžbu do datbaze
     * @param mixed $znacka
     * @param mixed $popis
     * @param mixed $kod
     * @param mixed $klientId
     * @return void
     */
    public function pridej(string $znacka, string $popis, string $kod, string $klientId) : void
    {
        if ($klientId)
                $klientId = null;
        Databaze::dotaz('INSERT INTO sluzba (znacka, popis, kod, klient_id) VALUES (?, ?, ?, ?)', array($znacka, $popis, $kod, $klientId));
    }

    /**
     * /upraví v datbázi službu s danym ID
     * @param mixed $sluzbaId
     * @param mixed $znacka
     * @param mixed $popis
     * @param mixed $kod
     * @param mixed $klientId
     * @return void
     */
    public function uprav(int $sluzbaId, string $znacka, string $popis, string $kod, string $klientId) : void
    {
        if (!$klientId)
            $klientId = null;
        Databaze::dotaz('UPDATE sluzba SET znacka=?, popis=?, kod=?, klient_id=? WHERE sluzba_id=?', array ($znacka, $popis, $kod, $klientId, $sluzbaId));
    }
    
    /**
     * /odstrani službu;

     * @param mixed $sluzbaId
     * @return void
     */
    public function odstran(int $sluzbaId) : void
    {
        Databaze::dotaz('DELETE FROM sluzba WHERE sluzba_id=?', array($sluzbaId));
    }
    
}