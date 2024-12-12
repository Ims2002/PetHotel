<?php

require_once "C:\\xampp\htdocs\PetHotel\clases\Manager.php";
require_once "C:\\xampp\htdocs\PetHotel\clases\Mailer.php";
require_once "C:\\xampp\htdocs\PetHotel\clases\Usuario.php";
require_once "C:\\xampp\htdocs\PetHotel\clases\Factura.php";

Usuario::iniciarSesion();

/* Verificar si hay sesión activa
if (!isset($_SESSION['email']) || !isset($_SESSION['nombre'])) {
    header('Location: login.php');
    exit();
}*/

// Crear instancias necesarias
    $mailer = new Mailer();
    $manager = new Manager();

    // Obtener productos del carrito
    $productos = $manager->getCarrito();
    // Obtener email y nombre del cliente desde la sesión
    $email = $_SESSION['email'];
    $nombre = $_SESSION['nombre'];
    // Crear la factura con los productos del carrito
    $factura = new Factura($productos, "imsmorsell2002@gmail.com");
    // Verificar si se solicitó hacer el pedido
if (isset($_POST["hacerPedido"])) {
    // Enviar el email con la factura
    $mailer->createPedido($factura, $nombre);
    $manager->vaciarCarrito();
    header("Location: ../views/index.php");
    exit();
    //echo "Pedido realizado con éxito. Se ha enviado un correo con la factura.";
} else {
    header("Location: ../controladores/procesarElementosCarrito.php");
    exit();
    //echo "Error: No se realizó el pedido.";
}
