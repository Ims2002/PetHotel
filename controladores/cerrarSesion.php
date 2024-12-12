<?php
require_once("C:\\xampp\htdocs\PetHotel\clases\Usuario.php");
Usuario::CerrarSesion();

header('Location: ../views/login.php');
exit();