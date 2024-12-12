<?php

require_once "C:\\xampp\htdocs\PetHotel\clases\ConexionDB.php";

$db = new ConexionDB();

if($_POST['producto_id']){
    $producto = $_POST['producto_id'];
}

if($_POST['incrementar'] && $_POST['producto_id']) {
    $consulta = "UPDATE carrito SET cantidad = cantidad + 1 WHERE id = ?";
    $db -> actualizarC($consulta,[$producto]);

    header('Location: ../controladores/procesarElementosCarrito.php');
    exit();

} else if($_POST['reducir'] && $_POST['producto_id']) {
    $consulta = "SELECT cantidad FROM carrito WHERE id = ?";
    $resultado = $db->consultarC($consulta, [$producto]);

    $cantidad = $resultado[0]['cantidad'];

    if($cantidad > 1) {
        $consulta = "UPDATE carrito SET cantidad = cantidad - 1 WHERE id = ?";
        $db -> actualizarC($consulta, [$producto]);
    } else {
        $consulta = "DELETE FROM carrito WHERE id = ?";
        $db -> eliminarC($consulta, [$producto]);
    }


    header('Location: ../controladores/procesarElementosCarrito.php');
    exit();

} else {
    header('Location: ../controladores/procesarElementosCarrito.php');
    exit();
}

