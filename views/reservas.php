<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reservas</title>
    <link rel="stylesheet" href="../styles/style.css">
</head>
<?php include("partials/header.php"); ?>

<style>
    body {
        background-image: url("../img/reserva (2).jpg") ;
        background-size: cover;
        background-repeat: no-repeat;

    }

    #formularioReservas {
        margin: auto;
        margin-bottom: 50px;
        margin-top: 50px;
        padding: 5px;
        text-align: center;
        display: flex;
        flex-direction: column;
        background-color: bisque;
        border: 5px solid black;
        max-height: fit-content;
        max-width: 40%;
        border-radius: 5%;
        font-family: "Comic Sans MS",cursive;

    }

    #formularioReservas input {
        width: 250px;
        margin: auto;
        margin-bottom: 20px;
        height: 30px;
    }

    #formularioReservas button {

        width: 20%;
        margin: auto;
        background-color: black;
        font-family: "Comic Sans MS",cursive;
        color: white;

    }

    #fechasFormulario {
        display: flex;
        flex-direction: column;
        column-count: 2;
    }

</style>

<body>

    <form id="formularioReservas" method="post" action="../controladores/procesarFormReserva.php">
        <h2>Haz tu reserva!</h2>
        <p>Envianos un correo para que te confirmemos la disponibilidad</p>

        <div id="fechasFormulario">

            <div id="fecha1">
                <label for="fechaEntrada">Fecha de Entrada</label>
                <br>
                <input type="date" id="fechaEntrada" name="fechaEntrada" placeholder="Fecha de Entrada" required>
            </div>

            <div id="fecha2">
                <label for="fechaSalida">Fecha de Salida</label>
                <br>
                <input type="date" id="fechaSalida" name="fechaSalida" placeholder="Fecha de Salida" required>
            </div>


        </div>

        <label for="razaPerro">Que raza es tu perro?</label>
        <input type="text" id="razaPerro" name="razaPerro" placeholder="Raza..." required>

        <label for="edad">Cuantos años tiene?</label>
        <input type="number" id="edad" name="edad" placeholder="Edad..." required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Email..." required>

        <label for="telefono">Número de Telefono</label>
        <input type="text" id="telefono" name="telefono" placeholder="Telefono..." required>

        <button type="submit" id="procesarReserva">Enviar</button>
    </form>

</body>
<?php include("partials/footer.php"); ?>
</html>