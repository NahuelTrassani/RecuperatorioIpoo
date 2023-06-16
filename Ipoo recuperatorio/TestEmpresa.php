<?php

include "Cliente.php";
include "Concesionaria.php";
include "Vehiculo.php";
include "Venta.php";
include "VehiculoImportado.php";
include "VehiculoNacional.php";
include "VentaLocal.php";
include "VentaOnline.php";

$objCliente1 = new Cliente("Juan","Torres",0,'dni',12345678);
$objCliente2 = new Cliente("Maria","Alvarez",0,'dni',87654321);

$vehiculo1 = new VehiculoNacional(11, 50000, 2020, 'Volkswagen Polo POLO TRENDLINE', 85, true, 10);
$vehiculo2 = new VehiculoNacional(12,10000,2021,'RAM 1500 Laramie',70,true,10);
$vehiculo3 = new VehiculoNacional(13,10000,2022,'Jeep Renegade 1.8 Sport',55,false);
$vehiculo4 = new VehiculoImportado(14,12499900,2020,'Ferrari',100 ,true,'Italia',6244400);

$empresa = new Concesionaria("Alta Gama","Av Argenetina 123",[$vehiculo1,$vehiculo2,$vehiculo3,$vehiculo4],[$objCliente1, $objCliente2],[]);


$infoOnline = [
    'formapago' => 'Tarjeta de crédito',
    'direccion' => 'Calle Principal 123',
    'dni' => '12345678',
    'telefono' => '987654321',
    'costotransporte' => 10.99
];
$infoLocal = [
    'formapago' => 'Tarjeta de crédito',
    'diaentrega' => '01/07/2023',
    'horarioentrega' => '15:30',
];
//$n numero de la venta
$empresa->registrarVenta([11,12,13,14],$objCliente2,'online',$infoOnline,1);
$empresa->registrarVenta([0,14],$objCliente2,'local',$infoLocal,2);
$empresa->registrarVenta([2,14],$objCliente2,'local',$infoLocal,3);

$ventasOnline = $empresa->retornarVentasOnline();
$importeVentasLocales = $empresa->retornarImporteVentasEnLocal();
echo "El valor de todas las ventas locales es de $".$importeVentasLocales."\n";
print_r($ventasOnline);

echo $empresa;

?>



