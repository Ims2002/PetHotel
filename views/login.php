<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Desarrollo web con PHP</title>
    <meta name="description" content="PHP">
    <meta name="author" content="Iván Morell">
</head>

<style>

    body {
        background-image: url("../img/bigGolden.jpg") ;
        background-size: cover;
        background-repeat: no-repeat;
        text-align: center;
        font-family: "Comic Sans MS", cursive;
    }

    #formLogin {
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

    #containerLogIn {

        max-width: 60%;
        margin: auto;

    }

    #containerLogIn input {
        margin-top: 10px;
        margin-bottom: 10px;
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
    }









</style>

<body>
<h1>Pet Hotel</h1>



<form method="post" action="../controladores/procesarLogin.php" id="formLogin">
    <h2>Inicio de Sesión</h2>
    <hr>
    <div id="containerLogIn">

        <label for="emailLogin">Email: </label>
        <input type="email" name="emailLogin" id="emailLogin" >
        <br><br>
        <label for="passwdLogin">Contraseña: </label>
        <input type="password" name="passwdLogin" id="passwdLogin" >
        <br>

        <p>La contraseña debe cumplir las siguientes condiciones: </p>
        <ul>
            <li>Contener al menos 6 caracteres</li>
            <li>Contener menos de 16 caracteres</li>
            <li>Contener al menos 1 letra mayúscula</li>
            <li>Contener al menos 1 letra minúscula</li>
            <li>Contener al menos 1 carácter numérico</li>
        </ul>

        <input class="btn" type="submit" value="Login"> <input class="btn" type="submit" value="Sing Up" name="singup" id="singup">
    </div>

</form>
</body>
</html>

