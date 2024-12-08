<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pet Hotel</title>
    </head>

    <?php include("partials/header.php"); ?>

    <style>
        /* Contenedor de la imagen */
        body {
            background: bisque;
        }

        .container-logo {
            display: flex;
            justify-content: center;
            margin: 20px;
        }

        .container-logo img {
            border-radius: 50%;
            height: 300px;
            width: 200px;

        }

        #contenedorDestacados {
            display: flex;
            flex-direction: row;
        }

        /* Contenedor para alinear las tarjetas */
        .card {
            width: 300px;
            height: 300px;
            border: 3px solid black;
            background: pink;
            margin: auto;
            text-align: center;
            font-family: arial, serif;
            margin-bottom: 400px;
            margin-top: 50px;
        }

        .card img {
            max-width: 300px;
            max-height: 300px;
        }

        .price {
            color: grey;
            font-size: 22px;
        }

        .card button {
            border: none;
            outline: 0;
            padding: 12px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }

        .card button:hover {
            opacity: 0.7;
        }

        #contPrefooter {
            text-align: center;
        }

        #imgPrefooter {
            width: 75%;
            height: auto;
            border-radius: 5%;
            margin-bottom: 50px;
        }

        h2 {
            text-align: center;
            font-family: "Comic Sans MS", cursive;
            margin-top: 50px;
            margin-bottom: 50px;
        }

        #containerBtnFake {
            text-align: center;
            margin: auto;
        }

        #btnFake {
            background-color: black;
            font-family: "Comic Sans MS", cursive;
            color: white;
            height: 25px;
            width: 75px;
            padding: 20px;
        }


    </style>

    <div class="container-logo">
        <img src="../img/logo.jpeg" alt="Logo">
    </div>
    <hr style="background-color: darkgray; border: 2px solid darkgray; margin-bottom: 5px">
    <body>

    <div id="contPrefooter">
        <h2>El mejor cuidado para tu mascota</h2>
        <img id="imgPrefooter" src="../img/prefooter.jpg" alt="Imagen Stock Perro Con Su Ama">
    </div>

    <div id="containerBtnFake">
        <a href="http://localhost/pethotel/reservas.php" id="btnFake">Reserva!</a>
    </div>
    <br>
    <br>
    <hr>

    <h2>Los mejores productos para tu mascota</h2>

    <hr>

    <div id="contenedorDestacados">
        <div class="card">
            <img src="../img/arnesK9.jpg" alt="Denim Jeans" style="width:100%; height: 100%">
            <h1>Tailored Jeans</h1>
            <p class="price"><s>19.99€</s><h1 style="color: red">13.50€</h1>
            <p>Some text about the jeans</p>
            <p><button>Add to Cart</button></p>
        </div>
        <div class="card">
            <img src="../img/pienso4.jpg" alt="Denim Jeans" style="width:100%; height: 100%">
            <h1>Tailored Jeans</h1>
            <p class="price"><s>24.99€</s><h1 style="color: red">18.99€</h1></p>
            <p>Some text about the jeans</p>
            <p><button>Add to Cart</button></p>
        </div>
        <div class="card">
            <img src="../img/pienso2.jpg" alt="Denim Jeans" style="width:100%; height: 100%">
            <h1>Tailored Jeans</h1>
            <p class="price"><s>22.99€</s><h1 style="color: red">14.99€</h1></p>
            <p>Some text about the jeans</p>
            <p><button>Add to Cart</button></p>
        </div>
    </div>

    <hr>

    </body>

    <?php include("partials/darkFooter.php"); ?>
</html>
