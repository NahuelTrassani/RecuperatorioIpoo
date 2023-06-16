
<?php

class VehiculoImportado extends Vehiculo {
    private $paisOrigen;
    private $impuestosImportacion;

    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activo, $paisOrigen, $impuestosImportacion) {
        parent::__construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activo);
        $this->paisOrigen = $paisOrigen;
        $this->impuestosImportacion = $impuestosImportacion;
    }

    public function getPaisOrigen() {
        return $this->paisOrigen;
    }

    public function setPaisOrigen($paisOrigen) {
        $this->paisOrigen = $paisOrigen;
    }

    public function getImpuestosImportacion() {
        return $this->impuestosImportacion;
    }

    public function setImpuestosImportacion($impuestosImportacion) {
        $this->impuestosImportacion = $impuestosImportacion;
    }

    public function __toString() {
        return "Vehículo Importado\n" .
        "Código: " . $this->getCodigo() . "\n" .
        "Costo: " . $this->getCosto() . "\n" .
        "Año de fabricación: " . $this->getAnioFabricacion() . "\n" .
        "Descripción: " . $this->getDescripción() . "\n" .
        "Porcentaje de incremento anual: ". $this->getPorcentajeAnual() . "\n" .
        "País de Origen: " . $this->paisOrigen . "\n" .
        "Impuestos de Importación: $" . $this->impuestosImportacion . "\n";
    }

 
    public function darPrecioVenta() {
        $valorCalculado = parent::darPrecioVenta(); // Llama al método darPrecioVenta() de la clase padre
        return $valorCalculado + $this->impuestosImportacion;
    }
}
?>