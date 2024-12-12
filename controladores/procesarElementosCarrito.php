<?php
require_once "C:\\xampp\htdocs\PetHotel\clases\Manager.php";

session_start();

$manager = new Manager();

$productos = $manager->getCarrito();

if($productos != null){
    $precioTotal = 0;

    foreach ($productos as $producto) {
        $subtotal = $producto->getCantidad() * $producto->getPrecio();
        $precioTotal += $subtotal;
    }
} else{
    $precioTotal = 0;
    $productos = array();
}

include 'C:\xampp\htdocs\PetHotel\views\carrito.php';


