<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sticky Footer</title>
    <style>
        /* Estilo general */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%; /* Asegura que ocupen toda la altura de la ventana */
        }

        body {
            display: flex;
            flex-direction: column; /* Organización en columna */
            font-family: Arial, sans-serif; /* Fuente básica */

        }

        /* Contenido principal que expande */
        .content {
            flex: 1; /* Ocupa todo el espacio disponible */
        }

        /* Estilo del footer */
        footer {
            text-align: center; /* Centra el contenido */
            padding: 20px 10px; /* Espaciado interno */
            font-size: 14px; /* Tamaño de letra */
            color: white; /* Gris claro */
            border-top: 1px solid #ddd; /* Línea superior */
            background: linear-gradient(bisque, saddlebrown);

        }

        /* Estilo para los enlaces del menú */
        .footer-menu {
            margin: 10px 0;
            list-style: none; /* Elimina los puntos de la lista */
            padding: 0;
            display: flex;
            justify-content: center; /* Centra los enlaces horizontalmente */
            gap: 20px; /* Espaciado entre los enlaces */
        }

        .footer-menu li {
            display: inline;
            margin: 10px;
        }

        .footer-menu a {
            text-decoration: none; /* Elimina el subrayado */
            color: white; /* Gris claro */
            transition: color 0.3s ease; /* Transición suave */
        }

        .footer-menu a:hover {
            color: white; /* Blanco al pasar el mouse */
        }
    </style>
</head>
<body>
<div class="content">
</div>

<footer>
    <ul class="footer-menu">
        <li><a href="http://localhost/pethotel/views/index.php">Home</a></li>
        <li><a href="http://localhost/pethotel/views/reservas.php">Reservas</a></li>
        <li><a href="http://localhost/pethotel/controladores/procesarProductos.php">Tienda</a></li>
    </ul>
    <p>© 2024 lms2002, IES La Mar</p>
</footer>
</body>
</html>
