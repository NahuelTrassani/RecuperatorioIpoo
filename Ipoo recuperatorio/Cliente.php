<?php

class Cliente {
    private $nombre;
    private $apellido;
    private $dadoDeBaja;
    private $tipoDocumento;
    private $numeroDocumento;

    public function __construct($nombre, $apellido, $dadoDeBaja, $tipoDocumento, $numeroDocumento) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dadoDeBaja = $dadoDeBaja;
        $this->tipoDocumento = $tipoDocumento;
        $this->numeroDocumento = $numeroDocumento;
    }

    // Métodos set
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function setDadoDeBaja($dadoDeBaja) {
        $this->dadoDeBaja = $dadoDeBaja;
    }

    public function setTipoDocumento($tipoDocumento) {
        $this->tipoDocumento = $tipoDocumento;
    }

    public function setNumeroDocumento($numeroDocumento) {
        $this->numeroDocumento = $numeroDocumento;
    }

    // Métodos get
    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getDadoDeBaja(){
        return $this->dadoDeBaja;
    }

    public function getTipoDocumento() {
        return $this->tipoDocumento;
    }

    public function getNumeroDocumento() {
        return $this->numeroDocumento;
    }


    public function __toString() {
        return "Nombre: " . $this->nombre . "\n" .
               "Apellido: " . $this->apellido . "\n" .
               //"Dado de baja: " . ($this->dadoDeBaja ? "Sí" : "No") . "\n" .
               "Tipo de documento: " . $this->tipoDocumento . "\n" .
               "Número de documento: " . $this->numeroDocumento;
    }
}

?>