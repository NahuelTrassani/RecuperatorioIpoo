<?php

include "Cliente.php";
include "Concesionaria.php";
include "Vehiculo.php";
include "Venta.php";
include "VehiculoImportado.php";
include "VehiculoNacional.php";

$objCliente1 = new Cliente("Juan","Torres",0,'dni',12345678);
$objCliente2 = new Cliente("Maria","Alvarez",0,'dni',87654321);

$vehiculo1 = new VehiculoNacional(11, 50000, 2020, 'Volkswagen Polo POLO TRENDLINE', 85, true, 10);
$vehiculo2 = new VehiculoNacional(12,10000,2021,'RAM 1500 Laramie',70,true,10);
$vehiculo3 = new VehiculoNacional(13,10000,2022,'Jeep Renegade 1.8 Sport',55,false);
$vehiculo4 = new VehiculoImportado(14,12499900,2020,'Ferrari',100 ,true,'Italia',6244400);

$empresa = new Concesionaria("Alta Gama","Av Argenetina 123",[$vehiculo1,$vehiculo2,$vehiculo3,$vehiculo4],[$objCliente1, $objCliente2],[]);/*
$venta = new Venta(1, "02/06/2023",$objCliente2,[]);
$empresa->registrarVenta([11,12,13,14],$venta);

$venta2 = new Venta(2, "02/06/2023",$objCliente2,[]);
$empresa->registrarVenta([0,14],$venta2);

$venta3 = new Venta(3, "02/06/2023",$objCliente2,[]);
$empresa->registrarVenta([2,14],$venta3);

$sumaVentasNacionales = $empresa->informarSumaVentasNacionales();
$ventasImportadas = $empresa->informarVentasImportadas();
echo "El valor de todas las ventas nacionales es de $".$sumaVentasNacionales."\n";
print_r($ventasImportadas);
echo $empresa;
*/
?>



