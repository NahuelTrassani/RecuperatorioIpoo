
<?php

class Venta {
    private $numero;
    private $fecha;
    private $cliente;
    private $vehiculos = array();
    private $precioFinal;
    private $formaPago;

    public function __construct($numero, $fecha, $cliente,$formaPago) {
        $this->numero = $numero;
        $this->fecha = $fecha;
        $this->cliente = $cliente;
        $this->vehiculos = [];
        $this->precioFinal = 0; // Inicializar el precio final en 0 al crear una venta
        $this->formaPago = $formaPago;
    }
 // Métodos set y get de la clase
    public function setFormaPago($formaPago) {
        $this->formaPago = $formaPago;
    }
    
    public function getFormaPago() {
        return $this->formaPago;
    }
   
    public function setNumero($numero) {
        $this->numero = $numero;
    }

    public function getNumero() {
        return $this->numero;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setCliente($cliente) {
        $this->cliente = $cliente;
    }

    public function getCliente() {
        return $this->cliente;
    }

    public function incorporarVehiculo($vehiculo) {
        $precio = $vehiculo->darPrecioVenta();
      
        $colVehiculos = $this->getVehiculos();
        array_push($colVehiculos, $vehiculo);
        $this->setVehiculos($colVehiculos);

        $precioTotal = $this->getPrecioFinal() + $precio;
        $this->setPrecioFinal($precioTotal);
    }

    public function setVehiculos($vehiculos) {
        $this->vehiculos = $vehiculos;
    }

    public function getVehiculos() {
        return $this->vehiculos;
    }

    public function setPrecioFinal($precioFinal) {
        $this->precioFinal = $precioFinal;
    }

    public function getPrecioFinal() {
        return $this->precioFinal;
    }

    // Método toString
    public function __toString() {
       
        $vehiculos_str = "";
        foreach ($this->vehiculos as $vehiculo) {
            $vehiculos_str .= "\n". $vehiculo . "\n";
        }
       
        return  "\n". "Número de venta: " . $this->numero . "\n" .
                "Fecha de venta: " . $this->fecha . "\n" .
                "Cliente: " . $this->cliente . "\n" .
                "Forma de pago: " . $this->formaPago . "\n" .
              //"Aca mostraria los vehiculos de la venta, pero estan ocultos";
               //"Vehículos de la venta:\n" . $vehiculos_str ."\n".
               "Precio Final de la venta: " . $this->precioFinal;
    }

    public function retornarTotalVentaNacional() {
        $totalVentaNacional = 0;
        
        foreach ($this->getVehiculos() as $vehiculo) {
            if ($vehiculo instanceof VehiculoNacional) {
               
                $totalVentaNacional += $vehiculo->darPrecioVenta();
                
            }
        }

        return $totalVentaNacional;
    }

    public function retornarVehiculosImportados() {
        $vehiculosImportados = [];

        foreach ($this->vehiculos as $vehiculo) {
            if ($vehiculo instanceof VehiculoImportado) {
                $vehiculosImportados[] = $vehiculo;
            }
        }

        return $vehiculosImportados;
    }

    public function registrarInformacionVenta($info) {
        // Implementación en la clase base (Venta)
        $this->formaPago = $info['formapago'];
    }
}

?>