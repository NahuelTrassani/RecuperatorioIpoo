
<?php

class Vehiculo {
    private $codigo;
    private $costo;
    private $anioFabricacion;
    private $descripcion;
    private $porcentajeIncrementoAnual;
    private $activo;

    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activo) {
        $this->codigo = $codigo;
        $this->costo = $costo;
        $this->anioFabricacion = $anioFabricacion;
        $this->descripcion = $descripcion;
        $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnual;
        $this->activo = $activo;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getCosto() {
        return $this->costo;
    }

    public function getAnioFabricacion() {
        return $this->anioFabricacion;
    }

    public function getDescripción() {
        return $this->descripcion;
    }
    public function getPorcentajeAnual() {
        return $this->porcentajeIncrementoAnual;
    }
    public function getIsActivo() {
        return $this->activo;
    }

    // Métodos set
    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    public function setCosto($costo) {
        $this->costo = $costo;
    }

    public function setAnioFabricacion($anioFabricacion) {
        $this->anioFabricacion = $anioFabricacion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setPorcentajeIncrementoAnual($porcentajeIncrementoAnual) {
        $this->porcentajeIncrementoAnual = $porcentajeIncrementoAnual;
    }

    public function setActivo($activo) {
        $this->activo = $activo;
    }

    // Método toString
    public function __toString() {
        return "Código: " . $this->codigo . "\n" .
               "Costo: " . $this->costo . "\n" .
               "Año de fabricación: " . $this->anioFabricacion . "\n" .
               "Descripción: " . $this->descripcion . "\n" .
               "Porcentaje de incremento anual: " . $this->porcentajeIncrementoAnual . "\n" .
               "Activo: " . ($this->activo ? "Sí" : "No");
    }
   

    public function darPrecioVenta(){
        $isActivo = $this->activo;
        $compra = $this->costo;
        $incAnual = $this->porcentajeIncrementoAnual;
        $anio = 2023 - $this->anioFabricacion;
        if ($isActivo){
            $precioFinal = $compra + $compra*($anio*$incAnual);
        }else{
            $precioFinal = 0;
        }
        return $precioFinal;
    }
 
}

?>