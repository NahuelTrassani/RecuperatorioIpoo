<?php

include "Cliente.php";
include "Concesionaria.php";
include "Vehiculo.php";
include "Venta.php";


$objCliente1 = new Cliente("Juan","Torres",1,'dni',12345678);
$objCliente2 = new Cliente("Maria","Alvarez",1,'dni',87654321);

$vehiculo1 = new Vehiculo(11, 50000, 2020, 'Volkswagen Polo POLO TRENDLINE', 85, true);
$vehiculo2 = new Vehiculo(12,10000,2021,'RAM 1500 Laramie',70,true);
$vehiculo3 = new Vehiculo(13,10000,2022,'Jeep Renegade 1.8 Sport',55,false);


$empresa = new Concesionaria("Alta Gama","Av Argenetina 123",[$vehiculo1,$vehiculo2,$vehiculo3],[$objCliente1, $objCliente2],[]);
/*
$venta = new Venta(1, "15/04/2023",$objCliente2,[]);
$empresa->registrarVenta([11,12,13],$venta);

$venta2 = new Venta(2, "24/04/2023",$objCliente2,[]);
$empresa->registrarVenta([0],$venta2);

$venta3 = new Venta(3, "20/04/2023",$objCliente2,[]);
$empresa->registrarVenta([2],$venta3);

$tipoDoc=$objCliente1->getTipoDocumento();
$nroDoc=$objCliente1->getNumeroDocumento();

$resultado1 = $empresa->retornarVentasXCliente($tipoDoc, $nroDoc);

// Mostrar por pantalla la colección resultado
print_r($resultado1);

$tipoDoc=$objCliente2->getTipoDocumento();
$nroDoc=$objCliente2->getNumeroDocumento();

$resultado2 = $empresa->retornarVentasXCliente($tipoDoc, $nroDoc);

// Mostrar por pantalla la colección resultado
print_r($resultado2);
foreach ($resultado2 as $venta) {
    echo "Información de la venta:\n";
    //echo "Fecha: " . $venta->getFecha() . "\n";
 }
//echo $empresa;
*/
?>