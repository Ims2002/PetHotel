<?php

class Producto
{

    private $id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $imagen;

    public function __construct($id = 0, $nombre, $descripcion, $precio, $imagen)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->precio = $precio;
        $this->imagen = $imagen;
    }


    public function getId() {
        return $this->id;
    }
    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @return mixed
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    public function __toString() {
        return "
            <div class='card'>
                <img src='data:image/jpeg;base64,{$this->imagen}' alt='{$this->nombre}' style='width:100%; height: 100%'>
                <h1>{$this->nombre}</h1>
                <p class='price'><s>" . number_format($this->precio, 2) . "€</s></p>
                <h1 style='color: red'>" . number_format($this->precio * 0.7, 2) . "€</h1>
                <p>{$this->descripcion}</p>
                <form action='../controladores/procesarCarrito.php' method='POST'>
                    <input type='hidden' name='producto_id' value='{$this->id}'>
                    <input type='hidden' name='producto_nombre' value='{$this->nombre}'>
                    <input type='hidden' name='producto_precio' value='{$this->precio}'>
                    <input type='hidden' name='producto_imagen' value='{$this->imagen}'>
                    <p><button type='submit'>Add to Cart</button></p>
                </form>
            </div>
        ";
    }

}
