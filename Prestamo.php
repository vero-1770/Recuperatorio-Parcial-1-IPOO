<?php
class Prestamo {
    private $identificacion_prestamo; 
    private $código_electrodoméstico; #este valor no estoy segura de donde se optiene
    private $fecha_otorgamiento; #este valor se optiene de la clase Cliente
    private $montoPrestamo; 
    private $cantidad_cuotas;
    private $taza_interes;
    private $colección_cuotas;
    private $referencia_persona;

    public function __construct($monto, $cantCuotas, $tazaInteres, $refPersona) {
        $this->identificacion_prestamo = $this->identificacion_prestamo + 1;
        $this->montoPrestamo = $monto;
        $this->cantidad_cuotas = $cantCuotas;
        $this->taza_interes = $tazaInteres;
        $this->colección_cuotas = [];
        $this->referencia_persona = $refPersona;
    }

    private function calcularInteresPrestamo($numCuota) {
        $monto = $this->getMontoPrestamo();
        $interes = $this->getTaza_interes();
        $cantidad_de_cuotas = $this->getCantidad_cuotas();
        $interes_cuota_numCuota = 0;

        if ($numCuota > 0 ) {
            if ($numCuota == 1) {
                $interes_cuota_numCuota = ($monto-(($monto/$cantidad_de_cuotas))) * $nteres;
            } else {
                $interes_cuota_numCuota = ($monto-(($monto/$cantidad_de_cuotas)*$numCuota-1)) * $nteres;
            }
        }
        return $interes_cuota_numCuota;
    }

    public function otorgarPrestamo() {
        $cantCuotas = $this->getCantidad_cuotas();
        $monto = calcularInteresPrestamo($cantCuotas);

        $this->setFecha_otorgamiento(getdate);

        $importeTotal = $monto/$cantCuotas;

        return $importeTotal;
    }

    public function darSiguienteCuotaPagar() {
        $cuotas = $this->getColección_cuotas();
        $retorno = null;

        foreach ($cuotas as $unaCuota) {
            $cancelada = $unaCuota->getCancelada();
            if ($cancelada == false) {
                $retorno = $unaCuota;
            }
        }
        return $retorno;
    } #aclaracion sobre este modulo
    /// entiendo que deberia ser un recorrido parcial, que en el momento que encuentre 
    // una cuota sin pagar (en caso de haber) retorne la referencia a dicha cuota, pero realmente
    // no termino de manejar el como realizar la estructura de un recorrido parcial para un arreglo 
}
?>