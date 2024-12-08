<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require_once 'C:\xampp\htdocs\PetHotel\Mailing\PHPMailer\src\Exception.php';
require_once 'C:\xampp\htdocs\PetHotel\Mailing\PHPMailer\src\PHPMailer.php';
require_once 'C:\xampp\htdocs\PetHotel\Mailing\PHPMailer\src\SMTP.php';

class Mailer {

    private $mail;

    public function __construct()
    {
        try {
            $this->mail = new PHPMailer(true);
            $this->baseConfig();
        } catch (Exception $e) {
            echo $e->getMessage();

        }
    }

    public function createReserva($reserva, $who)
    {
        try {
            // Recipients
            $this->mail->setFrom('ims.php.02@gmail.com', 'Pet Hotel'); // Set sender (email, name)
            $this->mail->addAddress($reserva->getEmail(), 'Cliente'); // Add recipient from parameter
            $this->mail->addReplyTo('ims.php.02@gmail.com', 'Pet Hotel'); // Set reply-to address

            $fecha = date('l jS \of F Y h:i:s A');

            // Content
            $this->mail->isHTML(true); // Set email format to HTML
            $this->mail->Subject = "$who bienvenid@ a Pet Hotel!"; // Subject with creator's name
            $this->mail->Body = "
            <h3>Nueva reserva pendiente de confirmar</h3>
            <p><strong>Desde:</strong> " . $reserva->getFechaEntrega() . "</p>
            <p><strong>Hasta: </strong>" . $reserva->getFechaSalida() . "</p>
            <p><strong>Resumen de la reserva:</strong> " . $reserva->tsMail() . "</p> <!--Modificar ToString-->
            <p><b>Creada por:</b> $who</p>"; // Set email body with task details
            $this->mail->AltBody = "Nueva reserva pendiente creada el $fecha
            .\nResumen: $reserva
            .\nCreado por: $who.";
            $this->mail->send();

        } catch (Exception $e) {
            echo 'El mensaje no pudo ser enviado. Error: ' . $e->getMessage();
        }
    }



    public function editTask($sendTo, $tareaPre, $tareaPost, $who) {

        $fecha = date('l jS \of F Y h:i:s A');

        //Recipients
        $this->mail->setFrom('ims.php.02@gmail.com', 'Gestor de Tareas');                                     // Set sender (email, name)
        $this->mail->addAddress($sendTo, 'Usuario');                                  // Add a recipient (email, name)
        //$mail->addAddress('ellen@example.com');                   // Name is optional
        $this->mail->addReplyTo('ims.php.02@gmail.com', 'Gestor de Tareas');                                  // Set reply to (email, name)

        //Content
        $this->mail->isHTML(true);                                  // Set email format to HTML
        $this->mail->Subject = "Modificacion de una tarea!";                                  // Set email subject
        $this->mail->Body    = "<h3>Tarea Modificada por $who!</h3><br>" .
            "<p><strong>La tarea antes de los cambios era: </strong>$tareaPre</p>" .
            "<br><p><strong>La tarea una vez modificada es: </strong>$tareaPost</p>";   // Set email body
        $this->mail->AltBody = "Nueva tarea modificada el $fecha.\nDescripción Tarea Pre: $tareaPre.\n
                                Descripcion Tarea Post: $tareaPost.\nCreado por: $who.";

        $this->mail->send();

    }


    public function deleteTask($sendTo, $tarea, $who) {
        try {
            // Recipients
            $this->mail->setFrom('ims.php.02@gmail.com', 'Gestor de Tareas'); // Set sender (email, name)
            $this->mail->addAddress($sendTo, 'Usuario'); // Add recipient from parameter
            $this->mail->addReplyTo('ims.php.02@gmail.com', 'Gestor de Tareas'); // Set reply-to address

            $fecha = date('l jS \of F Y h:i:s A');

            // Content
            $this->mail->isHTML(true); // Set email format to HTML
            $this->mail->Subject = "$who ha eliminado una nueva tarea!"; // Subject with creator's name
            $this->mail->Body = "
            <h3>Tarea eliminada</h3>
            <p><strong>Fecha:</strong> $fecha</p>
            <p><strong>Descripción de la tarea eliminada:</strong> $tarea</p>
            <p><b>Eliminada por:</b> $who</p>"; // Set email body with task details
            $this->mail->AltBody = "Nueva tarea eliminada el $fecha.\nDescripción: $tarea.\nEliminada por: $who.";

            $this->mail->send();
        } catch (Exception $e) {
            echo 'El mensaje no pudo ser enviado. Error: ' . $e->getMessage();
        }
    }

    public function deleteTasks($sendTo, $who) {
        try {
            // Recipients
            $this->mail->setFrom('ims.php.02@gmail.com', 'Gestor de Tareas'); // Set sender (email, name)
            $this->mail->addAddress($sendTo, 'Usuario'); // Add recipient from parameter
            $this->mail->addReplyTo('ims.php.02@gmail.com', 'Gestor de Tareas'); // Set reply-to address

            $fecha = date('l jS \of F Y h:i:s A');

            // Content
            $this->mail->isHTML(true); // Set email format to HTML
            $this->mail->Subject = "<h3>$who ha eliminado <b>TODAS</b> las tareas!</h3>"; // Subject with creator's name
            $this->mail->Body = "
            <h3>Tareas eliminadas</h3>
            <p><strong>Fecha:</strong> $fecha</p>
            <p><b>Tareas eliminadas por:</b> $who</p>"; // Set email body with task details
            $this->mail->AltBody = "Tareas eliminadas el $fecha.\Eliminadas por: $who.";

            $this->mail->send();
        } catch (Exception $e) {
            echo 'El mensaje no pudo ser enviado. Error: ' . $e->getMessage();
        }
    }

    private function baseConfig()
    {

        try {
            // $this->mail->SMTPDebug = SMTP::DEBUG_SERVER;    DEBUG
            $this->mail->SMTPDebug = 0;  // Sin DEBUG
            $this->mail->isSMTP();                                            // Send using SMTP
            $this->mail->Host = 'smtp.gmail.com';                       // Set the SMTP server to send through
            //$mail->Host = gethostbyname('smtp.gmail.com');            // Si hay problemas con SMTP en IPv6
            $this->mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $this->mail->Username   = 'ims.php.02@gmail.com';          // SMTP username
            $this->mail->Password   = 'wbzv kwzn nmrn inzo';                                     // SMTP password
            $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable implicit TLS encryption
            //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Enable implicit SSL encryption
            $this->mail->Port       = 587;                                    // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            //$mail->Port       = 465;                                    // TCP port to connect to; use 465 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_SMTPS`
            $this->mail->SMTPOptions = [
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true,
                ]
            ];
        } catch (Exception $e) {
            echo $e->getMessage();
            echo 'Message could not be sent.';
        }

    }

    /**
     * @param mixed $tareaPre
     */
    public function setTareaPre($tareaPre)
    {
        $this->tareaPre = $tareaPre;
    }

}
