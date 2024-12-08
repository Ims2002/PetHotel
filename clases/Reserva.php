<?php

class Reserva
{
    //private $id;
    private $fechaEntrega;
    private $fechaSalida;
    private $raza;
    private $edad;
    private $email;
    private $telefono;


    public function __construct($fechaEntrega, $fechaSalida, $raza, $edad, $email, $telefono)
    {

        $this->fechaEntrega = $fechaEntrega;
        $this->fechaSalida = $fechaSalida;
        $this->raza = $raza;
        $this->edad = $edad;
        $this->email = $email;
        $this->telefono = $telefono;

    }

    /**
     * @return mixed
     */
    public function getFechaEntrega()
    {
        return $this->fechaEntrega;
    }

    /**
     * @return mixed
     */
    public function getFechaSalida()
    {
        return $this->fechaSalida;
    }

    /**
     * @return mixed
     */
    public function getEdad()
    {
        return $this->edad;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getRaza()
    {
        return $this->raza;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    public function __toString()
    {
        return " Fecha Entrega: {$this->fechaEntrega},
        <br>Fecha Salida: {$this->fechaSalida}, 
        <br>Raza: {$this->raza}, 
        <br>Edad: {$this->edad}, 
        <br>Email: {$this->email},
        <br>Telefono: {$this->telefono}";

    }

    public function tsMail()
    {
        return "
        <div style='font-family: Arial, sans-serif; border: 1px solid #ccc; padding: 15px; border-radius: 8px; background-color: #f9f9f9;'>
        <h2 style='color: #4CAF50; text-align: center;'>Detalles de la Reserva</h2>
        <p><strong>📅 Fecha de Entrega:</strong> {$this->fechaEntrega}</p>
        <p><strong>📅 Fecha de Salida:</strong> {$this->fechaSalida}</p>
        <p><strong>🐾 Raza del Perro:</strong> {$this->raza}</p>
        <p><strong>🔢 Edad:</strong> {$this->edad} años</p>
        <p><strong>📞 Teléfono:</strong> {$this->telefono}</p>
        </div>
";

    }


}