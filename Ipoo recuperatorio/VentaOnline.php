<?php

class VentaOnline extends Venta {
    private $direccionEnvio;
    private $dniRecepcionista;
    private $telefonoContacto;
    private $costoTransporte;

    public function __construct($numero, $fecha, $cliente,$formaPago,$direccionEnvio,$dniRecepcionista,$telefonoContacto,$costoTransporte) {
        parent::__construct($numero, $fecha, $cliente, $formaPago);
        $this->direccionEnvio = $direccionEnvio;
        $this->dniRecepcionista = $dniRecepcionista;
        $this->telefonoContacto = $telefonoContacto;
        $this->costoTransporte = $costoTransporte;
    }

    public function setDireccionEnvio($direccionEnvio) {
        $this->direccionEnvio = $direccionEnvio;
    }

    public function getDireccionEnvio() {
        return $this->direccionEnvio;
    }

    public function setDniRecepcionista($dniRecepcionista) {
        $this->dniRecepcionista = $dniRecepcionista;
    }

    public function getDniRecepcionista() {
        return $this->dniRecepcionista;
    }

    public function setTelefonoContacto($telefonoContacto) {
        $this->telefonoContacto = $telefonoContacto;
    }

    public function getTelefonoContacto() {
        return $this->telefonoContacto;
    }

    public function setCostoTransporte($costoTransporte) {
        $this->costoTransporte = $costoTransporte;
    }

    public function getCostoTransporte() {
        return $this->costoTransporte;
    }

    public function __toString() {
        $vehiculos_str = "";
        foreach ($this->getVehiculos() as $vehiculo) {
            $vehiculos_str .= "\n" . $vehiculo . "\n";
        }
    
        $venta_str = parent::__toString(); // Llamada al método __toString() de la clase padre
    
        $ventaOnline_str = "\n". "Venta Online:\n" .
                            "Dirección de Envío: " . $this->direccionEnvio . "\n" .
                            "DNI del Recepcionista: " . $this->dniRecepcionista . "\n" .
                            "Teléfono de Contacto: " . $this->telefonoContacto . "\n" .
                            "Costo de Transporte: " . $this->costoTransporte . "\n" .
                            "Vehículos de la venta:\n" . $vehiculos_str;
    
        return $venta_str . $ventaOnline_str;
    }

    public function registrarInformacionVenta($info) {
        // Implementación en la clase VentaOnline
        parent::registrarInformacionVenta($info);
        
        $this->direccionEnvio = $info['direccion'];
        $this->dniRecepcionista = $info['dni'];
        $this->telefonoContacto = $info['telefono'];
        $this->costoTransporte = $info['costotransporte'];
    }

}

?>