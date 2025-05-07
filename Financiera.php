<?php
include_once 'Cliente.php';
include_once 'Cuota.php';
include_once 'Prestamo.php';
class Financiera {
    private $denominacionFinanciera;
    private $direccionFinanciera;
    private $coleccionPrestamosOtorgados;

    public function __construct($denominacion, $direccion) {
        $this->denominacionFinanciera = $denominacion;
        $this->direccionFinanciera = $direccion;
        $this->coleccionPrestamosOtorgados = [];
    }

    public function getDenominacionFinanciera() {
        return $this->denominacionFinanciera;
    }

    public function getDireccionFinanciera() {
        return $this->direccionFinanciera;
    }

    public function getColeccionPrestamosOtorgados() {
        return $this->coleccionPrestamosOtorgados;
    }

    public function setDenominacionFinanciera($denominacion) {
        $this->denominacionFinanciera = $denominacion;
    }

    public function setDireccionFinanciera($direccion) {
        $this->direccionFinanciera = $direccionFinanciera;
    }

    public function setColeccionPrestamosOtorgados($coleccion) {
        $this->coleccionPrestamosOtorgados = $coleccion;
    }

    public function __toString() {
        $prestamos = $this->getColeccionPrestamosOtorgados();
        $coleccion = "";
        foreach ($prestamos as $unPrestamo) {
            $coleccion .= "- " . $unPrestamos . "\n";
        }
        $cadena = ("-------------FINANCIERIA-------------" . 
                    "\nDenominacion: ". $this->getDenominacionFinanciera().
                    "\nDireccion: ". $this->getDireccionFinanciera().
                    "\nPrestamo/s: \n" . $this->getColeccionPrestamosOtorgados() );
        return $cadena;
    }

    public function otorgarPrestamo($objCliente, $cant_cuotas, $monto, $interes) {
        $nuevo_prestamo = new Prestamo($monto, $cant_cuotas, $interes, $objCliente);
        $coleccion = $this->getColeccionPrestamosOtorgados();
        array_push($coleccion, $nuevo_prestamo);
    }

    public function otorgarPrestamoSiCalifica() {
        $coleccion = $this->getColeccionPrestamosOtorgados();
        $importeFinal = 0;

        foreach ($coleccion as $unPrestamo) {
           $monto =  $unPrestamo->getMontoPrestamo();
           $cant_cuotas = $unPrestamo->getCantidad_cuotas();
           
           $refPersona = $unPrestamo->getReferencia_persona();
           $neto = $refPersona->getImporteNeto();

           $valor = $monto/$cant_cuotas;

           if ($valor < $neto) {
            $importeFinal = $unPrestamo->otorgarPrestamo(); 
           }
        }
        return $importeFinal;
    }

    public function informarCuotaPagar($idPrestamo) {
        $coleccion = $this->getColeccionPrestamosOtorgados();
        $i = 0;
        $cantPrestamos = count($coleccion);
        $refCuota = "";

        do {
            $prestamo = $coleccion[$i];
            $id = $prestamo->getIdentificacion_prestamo();
            if ($id == $idPrestamo) {
                $refCuota = $prestamo->darSiguienteCuotaPagar();
            }
        } while ($i < $cantPrestamos);
        return $refCuota;
    }

    
}

?>