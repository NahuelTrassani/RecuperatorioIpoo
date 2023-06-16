<?php



class Concesionaria {
    private $denominacion;
    private $direccion;
    private $clientes = array();
    private $vehiculos = array();
    private $ventas = array();

    public function __construct($denominacion, $direccion, $vehiculos ,$clientes,$ventas) {
        $this->denominacion = $denominacion;
        $this->direccion = $direccion;
        $this->vehiculos = $vehiculos;
        $this->clientes = $clientes; 
        $this->ventas = $ventas;
    }

    // Métodos set y get de la clase
    public function setDenominacion($denominacion) {
        $this->denominacion = $denominacion;
    }

    public function getDenominacion() {
        return $this->denominacion;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    public function setClientes($clientes) {
        array_push($this->clientes, $clientes);
    }

    public function getClientes() {
        return $this->clientes;
    }

    public function setVehiculos($vehiculos) {
        array_push($this->vehiculos,$vehiculos);
    }

    public function getVehiculos() {
        return $this->vehiculos;
    }

    public function setVentas($venta) {
        array_push($this->ventas, $venta);
    }

    public function getVentas() {
        return $this->ventas;
    }

    // Método toString
    public function __toString() {
        $clientes_str = "";
        foreach ($this->clientes as $cliente) {
            $clientes_str .="\n" . $cliente . "\n";
        }
        $vehiculos_str = "";
        foreach ($this->vehiculos as $vehiculo) {
            $vehiculos_str .= "\n".$vehiculo . "\n";
        }
        
        $ventas_str = "";
        foreach ($this->ventas as $venta) {
            $ventas_str .= "\n".$venta . "\n";
        }
        
       
        return "\n"."Denominación del concesionario: \n" . $this->denominacion . "\n" .
               "Dirección del concesionario: \n" . $this->direccion . "\n" .
               "\n"."Clientes del concesionario:\n" . $clientes_str ."\n" .
               "Vehículos del concesionario:\n" . $vehiculos_str ."\n" .
               "Ventas del concesionario(FALTA VALIDAR QUE LAS VENTAS DEL CONCESIONARIO NO SE MUESTREN SI La venta no fue exitosa. no era un requerimiento):\n" . $ventas_str. "\n" ;
    }

    /*
    public function retornarVehiculo($codigoVehiculo){
        $listaVehiculos = $this->vehiculos;
        for ($i = 0; $i < count($listaVehiculos); $i++){
            if ($listaVehiculos[$i]->getCodigo() === $codigoVehiculo){
                return $listaVehiculos[$i];
            }
        }
    }
    */

    //usando metodos de acceso
    public function retornarVehiculo($codigoVehiculo) {
        $listaVehiculos = $this->vehiculos;
        foreach ($listaVehiculos as $vehiculo) {
            if ($vehiculo->getCodigo() === $codigoVehiculo) {
                return $vehiculo;
            }
        }
        return null; // Si no se encuentra el vehículo, retorna null
    }

/* Metodo redefinido posteriormente.
    public function registrarVenta($colCodigosVehiculos, $venta){
        //$isBaja = $objCliente->getDadoDeBaja();
        //if ($isBaja === 1) {
            //$venta = new Venta(1, "15/04/2023",$objCliente,[]);
            for ($n = 0; $n < count($colCodigosVehiculos); $n++) {
                //$venta = new Venta(($n+1), ($n+15)."/04/2023",$objCliente,[]);
                $auto = $this->retornarVehiculo($colCodigosVehiculos[$n]);
                if ($auto) {
                    $venta->incorporarVehiculo($auto);
                } else {
                   echo "El vehículo con el código " . $colCodigosVehiculos[$n] . " no existe por lo tanto no se puede realizar ésta venta." . "\n";
                }
            }
            $this->setVentas($venta);
    }
*/
    public function retornarVentasXCliente($tipo,$numDoc){
        //echo "parm tipo: ".$tipo."\n";
        //echo "parm2 numero: ".$numDoc."\n";
        $colVentas = [];
        $ventas = $this->getVentas();
        
        foreach ($ventas as $venta){
            $clientes = $venta->getCliente();
            $docType = $clientes->getTipoDocumento();
            $docNumber = $clientes->getNumeroDocumento();
            //echo "get: ".$docType."\n";
            //echo "get2: ".$docNumber."\n";
            if (($docType === $tipo)and($docNumber === $numDoc)){
              
               foreach ($ventas as $sell){
                    $colVentas= $sell;
                }
            }
        }
        
        return $colVentas;
    }
    public function informarSumaVentasNacionales() {
        $sumaVentasNacionales = 0;
        $ventas = $this->getVentas();
        foreach ($ventas as $venta) {
            $valorVenta = $venta->retornarTotalVentaNacional();
            $sumaVentasNacionales += $valorVenta;
        }
        return $sumaVentasNacionales;
    }

    public function informarVentasImportadas() {
        $ventasImportadas = [];

        foreach ($this->ventas as $venta) {
            $vehiculosImportados = $venta->retornarVehiculosImportados();
            if (!empty($vehiculosImportados)) {
                $ventasImportadas[] = $venta;
            }
        }

        return $ventasImportadas;
    }
    public function registrarVenta($colCodigosVehiculos, $objCliente, $tipo, $info,$n) {
        $venta = null;
        
        if ($tipo === 'online') {
            $venta = new VentaOnline($n, "16/06/2023", $objCliente, [], '', '', '', '');
        } elseif ($tipo === 'local') {
            $venta = new VentaLocal($n, "16/06/2023", $objCliente, [], '', '');
        } else {
            // Tipo de venta no válido
            return 0;
        }

        $venta->registrarInformacionVenta($info);

        foreach ($colCodigosVehiculos as $codigoVehiculo) {
            $vehiculo = $this->retornarVehiculo($codigoVehiculo);
            if ($vehiculo) {
                $venta->incorporarVehiculo($vehiculo);
            } else {
                echo "El vehículo con el código " . $codigoVehiculo . " no existe, por lo tanto no se puede realizar esta venta." . "\n";
            }
        }

        $this->setVentas($venta);

        return $venta->getPrecioFinal();
    }

    public function retornarVentasOnline() {
        $ventasOnline = [];

        foreach ($this->ventas as $venta) {
            if ($venta instanceof VentaOnline) {
                $ventasOnline[] = $venta;
            }
        }

        return $ventasOnline;
    }

    public function retornarImporteVentasEnLocal() {
        $importeTotal = 0;

        foreach ($this->ventas as $venta) {
            if ($venta instanceof VentaLocal) {
                $importeTotal += $venta->getPrecioFinal();
            }
        }

        return $importeTotal;
    }

}

?>