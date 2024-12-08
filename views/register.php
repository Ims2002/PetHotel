<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Pet Hotel</title>
    <meta name="description" content="PHP">
    <meta name="author" content="Iván Morell">
</head>

<style>
    body {
        background-image: url("../img/regImg.jpg") ;
        background-size: cover;
        background-repeat: no-repeat;
        text-align: center;
        font-family: "Comic Sans MS", cursive;
    }

    #formReg {
        background-color: bisque;
        border-radius: 5%;
        border: 3px solid black;
        display: flex;
        flex-direction: column;
        margin: auto;
        max-width: 40%;
        height: auto;
        opacity: 90%;
    }

    #containerRegistro {

        max-width: 60%;
        margin: auto;

    }

    #containerLogIn input {
        margin-top: 10px;
    }

    hr {
        width: 100%;
        background-color: black;
        border: 1px solid black;
    }

    h1 {
        font-size: xxx-large;
    }

    .btn {
        width: 30%;
        max-height: 15%;
        background-color: black;
        color: white;
        border-radius: 3%;
        margin-bottom: 10px;
    }
</style>

<body>
<h1>Pet Hotel</h1>



<form method="post" action="../controladores/procesarRegistro.php" id="formReg">
    <h2>Registro</h2>
    <hr>
    <div id="containerRegistro">
        <label for="nombreReg">Nombre: </label>
        <input type="text" name="nombreReg" id="nombreReg" required>
        <br><br>
        <label for="emailReg">Email: </label>
        <input type="email" name="emailReg" id="emailReg" required>
        <br><br>
        <label for="passwdReg">Contraseña: </label>
        <input type="password" name="passwdReg" id="passwdReg" required>
        <br>

        <p>La contraseña debe cumplir las siguientes condiciones: </p>

        <ul>
            <li>Contener al menos 6 caracteres</li>
            <li>Contener menos de 16 caracteres</li>
            <li>Contener al menos 1 letra mayúscula</li>
            <li>Contener al menos 1 letra minúscula</li>
            <li>Contener al menos 1 carácter numérico</li>
        </ul>

        <input class="btn" type="submit" value="Crear Cuenta" name="check">

    </div>
</form>
</body>
</html>

