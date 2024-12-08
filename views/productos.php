<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tienda</title>
</head>

<style>

    body {
        background-image: url("../img/hierba.jpg") ;
        background-size: cover;
        background-repeat: no-repeat;
        text-align: center;
        margin: 0;
        padding: 0;
    }

    #contenedorPrincipal {
        background-color: bisque;
    }

    #contenedorGrid {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
    }



    .card {
        width: 300px;
        height: 300px;
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
</style>

<?php include("partials/header.php"); ?>
<body>


<h1>Venta de artículos caninos</h1>

<div id="contenedorPrincipal">

    <div id="contenedorGrid">

        <?php if (!empty($productos)): ?>
            <?php foreach ($productos as $producto): ?>
                <?= $producto; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay productos disponibles</p>
        <?php endif; ?>



    </div>

</div>

</body>

<script>

    const botonesAgregar = document.querySelectorAll('.add-to-cart');

    botonesAgregar.forEach(boton => {
        boton.addEventListener('click', function() {
            const productoId = boton.getAttribute('data-id'); // Obtener el ID del producto

            // Enviar el producto al carrito usando AJAX
            fetch('agregarAlCarrito.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `producto_id=${productoId}`
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Producto añadido al carrito');
                    } else {
                        alert('Error al añadir el producto al carrito');
                    }
                });
        });
    });


</script>


<?php include("partials/footer.php"); ?>
</html>
