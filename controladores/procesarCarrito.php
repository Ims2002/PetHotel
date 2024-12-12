<?php

require_once ('C:\xampp\htdocs\PetHotel\clases\ConexionDB.php');
require_once ('C:\xampp\htdocs\PetHotel\clases\Carrito.php');
require_once ('C:\xampp\htdocs\PetHotel\clases\Manager.php');

session_start();

$manager = new Manager();

$manager->addCarrito();

header('Location: ../controladores/procesarProductos.php');
exit();

