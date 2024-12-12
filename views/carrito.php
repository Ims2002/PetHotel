<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Carrito de Compras</title>

    <?php include("partials/header.php"); ?>

    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url("../img/perroCarrito.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            text-align: center;
            font-family: Arial, sans-serif;
        }

        #contenedorPadre {
            margin: 50px auto;
            max-width: 900px;
        }

        h1 {
            font-family: "Comic Sans MS", cursive;
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 20px;
        }

        #capaIntermedia {
            background-color: rgba(255, 215, 0, 0.85);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        #containerProductos {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin: auto;
            padding: 10px;
        }

        .cart-item {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            border-bottom: 1px solid #ccc;
            padding-bottom: 15px;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .cart-item-image img {
            max-width: 100px;
            height: auto;
            max-height: 150px;
            border-radius: 5px;
        }

        .cart-item-details {
            margin-left: 15px;
            text-align: left;
            flex: 1;
        }

        .cart-item-name {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .cart-item-price,
        .cart-item-quantity,
        .cart-item-subtotal {
            font-size: 0.9rem;
            margin: 5px 0;
            color: #555;
        }

        #bloquePago {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            padding: 15px;
            border-top: 2px solid #333;
        }

        #bloquePago p {
            font-size: 1.2rem;
            font-weight: bold;
            color: #333;
        }

        #bloquePago button {
            padding: 10px 20px;
            font-size: 1rem;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #bloquePago button:hover {
            background-color: #0056b3;
        }

        hr {
            margin: 20px 0;
            border: none;
            border-top: 1px solid #ccc;
        }

        .empty-message {
            font-size: 1rem;
            color: #555;
            margin: 20px 0;
        }

        .cart-item-controls {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .cart-item-controls button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 5px 10px;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .cart-item-controls button:hover {
            background-color: #0056b3;
        }

    </style>
</head>


<body>
<section id="contenedorPadre">
    <section id="capaIntermedia">
        <h1>Cesta de Artículos</h1>
        <section id="containerProductos">
            <?php if (!empty($productos)): ?>
                <?php foreach ($productos as $producto): ?>
                    <?= $producto; ?>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="empty-message">No hay productos disponibles</p>
            <?php endif; ?>
        </section>
        <hr>
        <section id="bloquePago">
            <p>Precio Total: <?php echo number_format($precioTotal,2) ?></p>
            <button value="hacerPedido" name="hacerPedido">Hacer Pedido</button>
        </section>
    </section>
</section>
</body>

</html>
