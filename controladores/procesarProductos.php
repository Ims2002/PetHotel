<?php
require_once ('C:\xampp\htdocs\PetHotel\clases\ConexionDB.php');
require_once ('C:\xampp\htdocs\PetHotel\clases\Manager.php');

$manager = new Manager();

$productos = $manager->getProductos();

include 'C:\xampp\htdocs\PetHotel\views\productos.php';

