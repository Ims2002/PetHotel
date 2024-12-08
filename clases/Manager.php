<?php

require_once ('C:\xampp\htdocs\PetHotel\clases\ConexionDB.php');
require_once ('C:\xampp\htdocs\PetHotel\clases\Mailer.php');
require_once ('C:\xampp\htdocs\PetHotel\clases\Usuario.php');
require_once('C:\xampp\htdocs\PetHotel\clases\Producto.php');

    class Manager {


        private $conector;
        private $mailer;


        public function __construct()
        {
            $this->conector = new ConexionDB();
            $this->mailer = new Mailer();
        }



        function procesarFormReserva($reserva)
        {

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                if ($this->validate($reserva)) {

                    $razaperro = $reserva->getRaza();
                    $edad = $reserva->getEdad();
                    $email = $reserva->getEmail();
                    $telefono = $reserva->getTelefono();
                    $fechaEntrada = $reserva->getFechaEntrega();
                    $fechaSalida = $reserva->getFechaSalida();


                    $consulta = "INSERT INTO `reservas` (`razaperro`, `edad`, `email`, `telefono`, `fechaentrada`, `fechasalida`)
                    VALUES ('$razaperro', $edad, '$email', '$telefono', '$fechaEntrada', '$fechaSalida');";

                    /*$consulta = "INSERT INTO `reservas` (`razaperro`, `edad`, `email`, `telefono`, `fechaentrada`, `fechasalida`)
                    VALUES ('awd', 12, 'awd@test.com', '695955289', '2002-01-01', '2002-01-01');";*/

                    try {

                        $this->conector->insertar($consulta);

                        $this->mailer->createReserva($reserva,'Ivan');

                    } catch (PDOException $e) {
                        echo $e->getMessage();
                    }
                    header('Location: /pethotel/reservas.php');
                    exit;
                } else {
                    $errors = "Validation failed!";
                    include 'reservas.php';
                }
            } else {
                include 'reservas.php';

            }

        }

        function validate($reserva)
        {
            return !empty($reserva->getRaza()) &&
                !empty($reserva->getEdad()) &&
                !empty($reserva->getEmail()) &&
                !empty($reserva->getTelefono()) &&
                !empty($reserva->getFechaEntrega() &&
                !empty($reserva->getFechaSalida()));
        }

        public function checkLogin($email, $password) {
            try {
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                $consulta = "SELECT * FROM `usuarios` WHERE email = '$email' AND passwd = '$hashedPassword'";
                echo "<br>", $consulta;
                $this->tareas = $this->conector->consultar($consulta);
            }catch (Exception $ex) {
                echo $ex->getMessage();
                return false;
            }
            return true;
        }

        public function processRegistry($name, $email, $password) {
            try {
                if ($name != null && $email != null && $password != null && Usuario::validarClave($password)) {
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    $consulta = "INSERT INTO usuarios (nombre, email, passwd) VALUES ('$name', '$email', '$hashedPassword')";
                    //$this->tareas =
                    if($this->conector->insertar($consulta)) {
                        return true;
                    }
                }

            }catch (Exception $ex) {
                echo $ex->getMessage();
                return false;
            }

        }

        public function getNombre($email) {

            try {

                if($email != null) {
                    $consulta = "SELECT nombre FROM usuarios WHERE email = '$email'";

                    if($this->conector->consultar($consulta)) {
                        return $this->conector->consultar($consulta)[0];
                    }

                }

            } catch (Exception $e) {
                echo $e->getMessage();
            }

        }

        public function getProductos() {

            try {
                $consulta = "SELECT * FROM producto ORDER BY id";

                if($this->conector->consultarProductos($consulta)) {
                    $productosDB = $this->conector->consultarProductos($consulta);
                    $productos = array();
                    foreach ($productosDB as $producto) {
                        array_push($productos, new Producto($producto['id'], $producto['nombre'], $producto['descripcion'], $producto['precio'], base64_encode($producto['img'])));
                    }
                    if (count($productosDB) == 0) {
                        return [];
                    } else {
                        return $productos;
                    }

                }

            } catch (Exception $e) {
                echo $e->getMessage();
            }

        }

        public function addCarrito()
        {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Obtener datos del formulario
                $productoId = $_POST['producto_id'];
                $productoNombre = $_POST['producto_nombre'];
                $productoPrecio = $_POST['producto_precio'];
                $productoImagen = $_POST['producto_imagen'];

                $item = new Carrito($productoNombre, $productoPrecio, $productoImagen);

                var_dump($item);

                // Crear una instancia de la clase ConexionDB
                $db = new ConexionDB();

                // Verificar si el producto ya está en el carrito
                $consulta = "SELECT * FROM carrito WHERE id_producto = ?";
                $carrito = $db->consultarC($consulta);

                if ($carrito) {
                    //TODO modificar la db para que acepte cantidades
                    // Si el producto ya está en el carrito, actualizar la cantidad
                    $consulta = "UPDATE carrito SET cantidad = cantidad + 1 WHERE id_producto = ?";
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
                    $consulta = "INSERT INTO carrito (nombreProducto, imagen, precio, cantidad) VALUES ('$productoNombre', $productoImagen, $productoPrecio)";
                    $insertar = $db->insertarC($consulta, [$productoId]);

                    if ($insertar) {
                        // Responder con éxito
                        echo json_encode(['success' => true, 'message' => 'Producto añadido al carrito']);
                    } else {
                        // Responder con error
                        echo json_encode(['success' => false, 'message' => 'Error al agregar el producto al carrito']);
                    }
                }
            }

        }

    }

?>
