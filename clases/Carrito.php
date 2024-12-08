<?php

class Carrito
{

    //private $id;
    private $producto;
    private $precio;
    private $imagen;
    private $cantidad;

    public function __construct($producto, $imagen, $precio, $cantidad = 1) {
        $this->producto = $producto;
        $this->precio = $precio;
        $this->imagen = $imagen;
        $this->cantidad = $cantidad;
    }

    /**
     * @return mixed
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }
    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @return mixed
     */
    public function getProducto()
    {
        return $this->producto;
    }

    /**
     * @return mixed
     */
    public function getImagen()
    {
        return $this->imagen;
    }

}