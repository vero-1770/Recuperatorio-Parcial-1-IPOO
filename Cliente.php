<?php
class Cliente {
    private $nombreCliente;
    private $apellidoCliente;
    private $dniCliente;
    private $direcciónCliente;
    private $mailCliente; 
    private $teléfonoCliente; 
    private $importeNeto;

    public function __construct($nombre, $apellido, $dni, $direccion, $mail, $telefono, $importe) {
        $this->nombreCliente = $nombre;
        $this->apellidoCliente = $apellido;
        $this->dniCliente = $dni;
        $this->direccionCliente = $direccion;
        $this->mailCliente = $mail;
        $this->telefonoCliente = $telefono;
        $this->importeNeto = $importe;
    }
    
}
?>