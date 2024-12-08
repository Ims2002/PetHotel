<?php

require_once ('C:\xampp\htdocs\PetHotel\clases\ConexionDB.php');
require_once ('C:\xampp\htdocs\PetHotel\clases\Carrito.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Obtener datos del formulario
        $productoId = $_POST['producto_id'];
        $productoNombre = $_POST['producto_nombre'];
        $productoPrecio = $_POST['producto_precio'];
        $productoImagen = $_POST['producto_imagen'];

        // Crear una instancia de la clase ConexionDB
        $db = new ConexionDB();

        // Verificar si el producto ya está en el carrito
        $consulta = "SELECT * FROM carrito WHERE id = ?";
        $carrito = $db->consultarC($consulta, [$productoId]);

        if ($carrito) {
            // Si el producto ya está en el carrito, actualizar la cantidad
            $consulta = "UPDATE carrito SET cantidad = cantidad + 1 WHERE id = ?";
            $actualizar = $db->actualizarC($consulta, [$productoId]);

            if ($actualizar) {
                // Responder con éxito
                echo json_encode(['success' => true, 'message' => 'Producto actualizado en el carrito']);
            } else {
                // Responder con error
                echo json_encode(['success' => false, 'message' => 'Error al actualizar el carrito']);
            }
        } else {
            // Si el producto no está en el carrito, agregarlo
            $consulta = "INSERT INTO carrito (nombreProducto, imagen, precio, cantidad) VALUES (?, ?, ?, 1)";
            $insertar = $db->insertarC($consulta, [$productoNombre, $productoImagen, $productoPrecio]);

            if ($insertar) {
                // Responder con éxito
                echo json_encode(['success' => true, 'message' => 'Producto añadido al carrito']);
            } else {
                // Responder con error
                echo json_encode(['success' => false, 'message' => 'Error al agregar el producto al carrito']);
            }
        }
    }

