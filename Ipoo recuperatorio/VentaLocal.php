<?php

class VentaLocal extends Venta {
    private $diaEntrega;
    private $horarioEntrega;

    public function __construct($numero, $fecha, $cliente, $formaPago,$diaEntrega,$horarioEntrega) {
        parent::__construct($numero, $fecha, $cliente, $formaPago);
        $this->diaEntrega = $diaEntrega;
        $this->horarioEntrega = $horarioEntrega;
    }

    public function setDiaEntrega($diaEntrega) {
        $this->diaEntrega = $diaEntrega;
    }

    public function getDiaEntrega() {
        return $this->diaEntrega;
    }

    public function setHorarioEntrega($horarioEntrega) {
        $this->horarioEntrega = $horarioEntrega;
    }

    public function getHorarioEntrega() {
        return $this->horarioEntrega;
    }
    public function __toString() {
        $vehiculos_str = "";
        foreach ($this->getVehiculos() as $vehiculo) {
            $vehiculos_str .= "\n" . $vehiculo . "\n";
        }
    
        $venta_str = parent::__toString(); // Llamada al método __toString() de la clase padre
    
        $ventaLocal_str =  "\n"."Venta Local:\n" .
                            "Día de Entrega: " . $this->diaEntrega . "\n" .
                            "Horario de Entrega: " . $this->horarioEntrega . "\n" .
                            "Vehículos de la venta:\n" . $vehiculos_str;
    
        return $venta_str . $ventaLocal_str;
    }
    public function registrarInformacionVenta($info) {
        // Implementación en la clase VentaLocal
        parent::registrarInformacionVenta($info);
        $this->diaEntrega = $info['diaentrega'];
        $this->horarioEntrega = $info['horarioentrega'];
    }
    
}
?>