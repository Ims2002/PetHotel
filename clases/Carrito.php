<?php

class Carrito
{

    //private $id;
    private $producto;
    private $precio;
    private $imagen;
    private $cantidad;

    public function __construct($id = 0,$producto, $imagen, $precio, $cantidad = 1) {
        $this->id = $id;
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

    public function tsMail() {
        return "
        <div style='font-family: Arial, sans-serif; margin-bottom: 20px; border: 1px solid #ddd; padding: 15px; border-radius: 8px;'>
            <div style='display: flex; align-items: center; margin-bottom: 15px;'>
                <div style='margin-left: 15px;'>
                    <h2 style='margin: 0; font-size: 18px; color: #333;'>{$this->producto}</h2>
                    <p style='margin: 5px 0; font-size: 14px; color: #555;'>Precio unitario: " . number_format($this->precio, 2) . "€</p>
                    <p style='margin: 5px 0; font-size: 14px; color: #555;'>Cantidad: {$this->cantidad}</p>
                    <p style='margin: 5px 0; font-size: 14px; color: #555;'><strong>Subtotal:</strong> " . number_format($this->precio * $this->cantidad, 2) . "€</p>
                </div>
            </div>
        </div>
        ";
    }

    public function __toString() {
        return "
            <div class='cart-item'>
                <div class='cart-item-image'>
                    <img src='data:image/jpeg;base64,{$this->imagen}' alt='Imagen de {$this->producto}'>
                </div>
                <div class='cart-item-details'>
                    <h2 class='cart-item-name'>{$this->producto}</h2>
                    <p class='cart-item-price'>Precio unitario: " . number_format($this->precio, 2) . "€</p>
                    <p class='cart-item-quantity'>Cantidad: {$this->cantidad}</p>
                    <p class='cart-item-subtotal'>Subtotal: " . number_format($this->precio * $this->cantidad, 2) . "€</p>
                    <form method='POST' action='actualizar_carrito.php' class='cart-item-controls'>
                        <input type='hidden' name='producto_id' value='{$this->id}'>
                        <button type='submit' name='incrementar' value='incrementar'>+</button>
                        <button type='submit' name='reducir' value='reducir'>-</button>
                    </form>
                </div>
            </div>
        ";
    }

}