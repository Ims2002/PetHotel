<?php
require_once "C:\\xampp\htdocs\PetHotel\clases\Manager.php";

$manager = new Manager();

$productos = $manager->getCarrito();

$precioTotal = 0;

foreach ($productos as $producto) {
    $subtotal = $producto->getCantidad() * $producto->getPrecio();
    $precioTotal += $subtotal;
}

include 'C:\xampp\htdocs\PetHotel\views\carrito.php';


