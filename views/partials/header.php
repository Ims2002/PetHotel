<header>
    <nav class="navbar">
        <div class="logo">Pet Hotel</div>
        <ul>
            <li><a href="http://localhost/pethotel/index.php">Inicio</a></li>
            <li><a href="http://localhost/pethotel/carrito.php">Carrito</a></li>
            <li><a href="http://localhost/pethotel/reservas.php">Reserva</a></li>
            <li><a href="">Contacto</a></li>
        </ul>
    </nav>
</header>
<style>
    /* Estilos para la barra de navegación */
    .navbar {
        background-color: saddlebrown; /* Azul */
        padding: 10px 20px;
        display: flex;
        justify-content: space-between; /* Espacia los elementos a los lados */
        align-items: center;
        font-family: "Comic Sans MS", cursive;
        border-radius: 15%;
    }

    /* Logo o título */
    .navbar .logo {
        color: bisque;
        font-family: "Comic Sans MS", cursive;
        margin-left: 5px;
        font-size: 1.5em;
        font-weight: bold;
    }

    /* Menú */
    .navbar ul {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        gap: 20px; /* Espacio entre los enlaces */
    }

    .navbar ul li {
        display: inline;
    }

    /* Enlaces */
    .navbar ul li a {
        text-decoration: none;
        color: bisque; /* Blanco */
        font-size: 1em;
        font-family: "Comic Sans MS", cursive;
        transition: color 0.3s; /* Transición para efecto hover */
    }

    .navbar ul li a:hover {
        color: #FFD700; /* Dorado al pasar el mouse */
    }
</style>

