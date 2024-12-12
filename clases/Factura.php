<?php

class Factura {

    private $productos;
    private $email;

    public function __construct($productos, $email) {
        session_start();
        $this->productos = $productos;
        $this->email = $email;
    }

    public function getProductosHTML() {
        $html = '';
        foreach ($this->productos as $producto) {
            $html .= $producto->tsMail(); // Usar el nuevo `__toString` de productos
        }
        return $html;
    }

    public function getTotal() {
        $total = 0;
        foreach ($this->productos as $producto) {
            $total += $producto->getPrecio() * $producto->getCantidad();
        }
        return $total;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

}
