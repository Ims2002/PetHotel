<?php
require_once ('C:\xampp\htdocs\PetHotel\clases\ConexionDB.php');
require_once ('C:\xampp\htdocs\PetHotel\clases\Manager.php');

session_start();

$manager = new Manager();

$productos = $manager->getProductos();

include 'C:\xampp\htdocs\PetHotel\views\productos.php';

