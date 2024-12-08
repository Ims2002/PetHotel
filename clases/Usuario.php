<?php

require_once ('C:\xampp\htdocs\PetHotel\clases\Manager.php');

include_once ("C:\\xampp\htdocs\PetHotel\Exceptions\MenosDe16Exception.php");
include_once ("C:\\xampp\htdocs\PetHotel\Exceptions\MasDe6Exception.php");
include_once ("C:\\xampp\htdocs\PetHotel\Exceptions\MayusException.php");
include_once ("C:\\xampp\htdocs\PetHotel\Exceptions\MinusException.php");
include_once ("C:\\xampp\htdocs\PetHotel\Exceptions\NumException.php");

class Usuario
{
    //private $id;
    private static $nombre;
    private static $email;
    private static $passwd;
    private static $manager;


    public static function autenticar($email, $passwd)
    {
        self::$email = $email;
        self::$passwd = $passwd;
        self::$manager = new Manager();

        if (self::validarClave($passwd)) {
            if(self::$manager->checkLogin($email, $passwd)) {
                self::iniciarSesion();
                return true;
            }
        }

    }

    public static function validarClave($clave)
    {

        if (strlen($clave) < 6) {
            throw new MasDe6Exception("<h1><b>La clave debe tener al menos 6 caracteres</b></h1><br>");
        } elseif (strlen($clave) > 16) {
            throw new MenosDe16Exception("<h1><b>La clave debe tener menos de 16 caracteres</b></h1><br>");
        }

        if (!preg_match('`[a-z]`', $clave)) {
            throw new MinusException("<h1><b>Letra minúscula requerida</b></h1><br>");
        } elseif (!preg_match('`[A-Z]`', $clave)) {
            throw new MayusException("<h1><b>Letra mayuscula requerida</b></h1><br>");
        } elseif (!preg_match('`[0-9]`', $clave)) {
            throw new NumException("<h1><b>Número requerido</b></h1><br>");
        } else {
            return true;
        }
    }

    public static function iniciarSesion() {

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
            // TODO ver como solicitar el nombre para iniciar sesión
            // $_SESSION['nombre'] = self::$nombre;
            $_SESSION['email'] = self::$email;
            $_SESSION['passwd'] = self::$passwd;
            //$_SESSION['manager'] = null;

        }

    }

    public static function validar_sesion()
    {
        if(session_status() == PHP_SESSION_NONE) {
            // self es el this de los métodos estáticos
            self::iniciarSesion();
            return true;
        } else {
            return true;
        }
    }

    public static function cerrarSesion() {
        self::$manager->eliminarTodo();
        session_destroy();
    }

    public static function getNombre($email) {

        self::$nombre = self::$manager->getNombre($email);
        return self::$nombre;

    }

}