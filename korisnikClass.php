<?php

class Korisnik {

    private $korime;
    private $id;
    private $uloga;

    public function __construct() {
        
    }

    public function set_podaci($pkorime,$puloga,$pid) {
        $this->korime=$pkorime;
        $this->uloga= $puloga;
        $this->id=$pid;
    }

    public function get_korime() {
        return $this->korime;
    }

    public function get_uloga() {
        return $this->uloga;
    }

    public function get_id() {
        return $this->id;
    } 
}

?>
