<?php
include_once 'Cliente.php';
include_once 'Cuota.php';
include_once 'Prestamo.php';
include_once 'Financiera.php';

//// EJERCICIO 15

$financiera = new Financiera("ElectroCash", "Av. Arg 1234"); # FINANCIERA

/// CLIENTES

$cliente1 = new Cliente("Pepe", "Florez", "Bs As 12", "dir@gmail.com", 299444567, 4000); 
#cliente 1 para prestamo 1

$cliente2 = new Cliente("Luis", "Suarez", "Bs As 123", "dir@gmail.com", 299444567, 4000);
#cliente 2 para prestamo 2

$cliente3 = new Cliente("Luis", "Suarez", "Bs As 123", "dir@gmail.com", 299444567, 4000);
#cliente 3 para prestamo 3

/// PRESTAMOS 

$prestamo1 = new Prestamo(50000, 5, 0.1, $cliente1); # PRESTAMO 1

$prestamo2 = new Prestamo(10000, 4, 0.1, $cliente2); # PRESTAMO 2

$prestamo3 = new Prestamo(10000, 2, 0.1, $cliente3); # PRESTAMO 3

//// EJERCICIO 16

//// 16. incorporarPrestamo == otorgarPrestamo 

$financiera->otorgarPrestamo($cliente1, 5, 50000, 0.1); 

$financiera->otorgarPrestamo($cliente2, 4, 10000, 0.1);

$financiera->otorgarPrestamo($cliente3, 2, 10000, 0.1);

echo $financiera;

echo "-----------------------------------------------------------------";

//// EJERCICIO 17

$financiera->otorgarPrestamoSiCalifica();

echo $financiera;

echo "-----------------------------------------------------------------";

//// EJERCICIO 18

$objCuota = $financiera->informarCuotaPagar(2);

echo $objCuota;

$objCuota->darMontoFinal();

echo $objCuota;

?>