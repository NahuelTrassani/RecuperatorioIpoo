
<?php
class VehiculoNacional extends Vehiculo {
    private $descuentoPorcentaje;

    public function __construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activo, $descuentoPorcentaje = 15) {
        parent::__construct($codigo, $costo, $anioFabricacion, $descripcion, $porcentajeIncrementoAnual, $activo);
        $this->descuentoPorcentaje = $descuentoPorcentaje;
    }

    public function getDescuentoPorcentaje() {
        return $this->descuentoPorcentaje;
    }

    public function setDescuentoPorcentaje($descuentoPorcentaje) {
        //(por defecto el valor del descuento es del 15%). 
        if (!empty($descuentoPorcentaje)){
            $this->descuentoPorcentaje = 15;
        }else{
            $this->descuentoPorcentaje = $descuentoPorcentaje;
        }
        
    }
/*
    public function darPrecioVentaNacional($valorCalculado) {
        $descuento = $valorCalculado * ($this->descuentoPorcentaje / 100);
        return $valorCalculado - $descuento;
    }
*/
    public function darPrecioVenta() {
        $valorCalculado = parent::darPrecioVenta(); // Llama al método darPrecioVenta() de la clase padre
        $descuento = $valorCalculado * ($this->descuentoPorcentaje / 100);
        return $valorCalculado - $descuento;
    }
    
    public function __toString() {
        return "Vehículo Nacional\n" .
               "Código: " . $this->getCodigo() . "\n" .
               "Costo: " . $this->getCosto() . "\n" .
               "Año de fabricación: " . $this->getAnioFabricacion() . "\n" .
               "Descripción: " . $this->getDescripción() . "\n" .
               "Porcentaje de incremento anual: ". $this->getPorcentajeAnual() . "\n" .
               "Descuento: " . $this->descuentoPorcentaje . "%\n";
    }

}
?>