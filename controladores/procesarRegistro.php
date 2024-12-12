<?php

require_once ("C:\\xampp\htdocs\PetHotel\clases\Manager.php");

session_start();

$manager = new Manager();
$passwd = isset($_POST['passwdReg']) ? $_POST['passwdReg'] : null;
$nombre = isset($_POST['nombreReg']) ? $_POST['nombreReg'] : null;
$email = isset($_POST['emailReg']) ? $_POST['emailReg'] : null;

if (isset($_POST["check"])) {

    if(isset($nombre) && isset($email) && isset($passwd) && $manager->processRegistry($nombre, $email, $passwd)) {

        header('Location: /pethotel/views/login.php');
        exit();
    }

}