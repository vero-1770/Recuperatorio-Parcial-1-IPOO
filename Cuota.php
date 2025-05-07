<?php
class Cuota {
    private $numeroCuota;
    private $monto_cuota;
    private $monto_interes;
    private $cancelada;

    public function __construct($numero, $montoCuota, $montoInteres) {
        $this->numeroCuota = $numero;
        $this->monto_cuota = $montoCuota;
        $this->monto_interes = $montoInteres;
        $this->cancelada = false;
    }

    public function getNumeroCuota() {
        return $this->numeroCuota;
    }

    public function getMonto_cuota() {
        return $this->monto_cuota;
    }

    public function getMonto_interes() {
        return $this->monto_interes;
    }

    public function getCancelada() {
        return $this->cancelada;
    }

    public function setNumeroCuota($num) {
        $this->numeroCuota = $num;
    }

    public function setMonto_cuota($monto) {
        $this->monto_cuota = $monto;
    }

    public function setMonto_interes($montoInt) {
        $this->monto_interes = $montoInt;
    }

    public function setCancelada($cancelada) {
        $this->cancelada = $cancelada;
    }

    public function darMontoFinal() {
        $monto = $this->getMonto_cuota();
        $interes = $this->getMonto_interes();
        $montoFinal = $monto + $interes;
        return $montoFinal;
    }
}
?>