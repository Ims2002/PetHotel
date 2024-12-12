<?php
// Iniciar sesión al comienzo del script
session_start();

include_once("C:\\xampp\htdocs\PetHotel\clases\Usuario.php");
include_once("C:\\xampp\htdocs\PetHotel\Exceptions\MasDe6Exception.php");
include_once("C:\\xampp\htdocs\PetHotel\Exceptions\MayusException.php");
include_once("C:\\xampp\htdocs\PetHotel\Exceptions\MenosDe16Exception.php");
include_once("C:\\xampp\htdocs\PetHotel\Exceptions\MinusException.php");
include_once("C:\\xampp\htdocs\PetHotel\Exceptions\NumException.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST["singup"])) {

        header('Location: /pethotel/views/register.php');
        exit();

    }

    // Obtener el nombre de usuario y la contraseña desde el formulario
    $passwd = isset($_POST['passwdLogin']) ? $_POST['passwdLogin'] : null;
    $email = isset($_POST['emailLogin']) ? $_POST['emailLogin'] : null;



    if (isset($email) && isset($passwd)) {
        // Iniciamos sesión
        Usuario::iniciarSesion();

        try {
            // Autenticar datos

            if (Usuario::autenticar($email, $passwd)) {

                // Guardar datos del usuario en la sesión
                $_SESSION['email'] = $email;
                $_SESSION['passwd'] = $passwd;

                $nombre = Usuario::getNombre($email)[0];

                $_SESSION['nombre'] = $nombre;

                //echo $_SESSION['nombre'][0];

                //Redirigir al Panel de Control
                header('Location: /pethotel/views/index.php');
                exit;
            }

            // TODO hacer que aparezca en el registro
        } catch (MasDe6Exception $e) {
            echo "<h1><b>", $e->getMessage(), "</b></h1>\n";
        } catch (MayusException $e) {
            echo "<h1><b>", $e->getMessage(), "</b></h1>\n";
        } catch (MenosDe16Exception $e) {
            echo "<h1><b>", $e->getMessage(), "</b></h1>\n";
        } catch (MinusException $e) {
            echo "<h1><b>", $e->getMessage(), "</b></h1>\n";
        } catch (NumException $e) {
            echo "<h1><b>", $e->getMessage(), "</b></h1>\n";
        } catch (Exception $e) {
            echo "<h1><b>", $e->getMessage(), "</b></h1>\n";
        }
    }
}
?>