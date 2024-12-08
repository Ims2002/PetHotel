<?php
require_once ("C:\\xampp\htdocs\PetHotel\clases\ManagerForm.php");
require_once ("C:\\xampp\htdocs\PetHotel\clases\Reserva.php");

$managerForm = new Manager();

$reserva = new Reserva($_POST['fechaEntrada'],$_POST['fechaSalida'],$_POST['razaPerro'],$_POST['edad'],$_POST['email'],$_POST['telefono']);

$managerForm->procesarFormReserva($reserva);

