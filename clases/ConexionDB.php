<?php

class ConexionDB
{

    private $hostDB = "localhost";
    private $nameDB = "pethotel";
    private $userDB = "root";
    private $passDB = "";
    private $dsn;
    private $pdo;

    public function __construct()
    {

        $this->dsn = "mysql:host=$this->hostDB;dbname=$this->nameDB;";

        try {
            $this->pdo = new PDO($this->dsn, $this->userDB, $this->passDB);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }


    public function insertar($consulta)
    {
        //Insert
        $select = $this->pdo->prepare($consulta);

        if ($select->execute()) {
            return true;
        }
        return false;
    }

    public function consultar($consulta)
    {
        //Select
        $select = $this->pdo->prepare($consulta);

        if ($select->execute()) {
            return $select->fetchAll();
        } else {
            return false;
        }

    }

    public function consultarProductos($consulta)
    {
        //Select
        $select = $this->pdo->query($consulta);

        $productos = [];

        while ($row = $select->fetch(PDO::FETCH_ASSOC)) {

            $id = $row['id'];
            $nombre = $row['nombre'];
            $descripcion = $row['descripcion'];
            $precio = $row['precio'];
            $img = $row['img'];

            $productos[] = [
                "id" => $id,
                "nombre" => $nombre,
                "descripcion" => $descripcion,
                "precio" => $precio,
                "img" => $img
            ];

        }
        if (!empty($productos)) {
            return $productos;
        } else {
            return false;
        }
    }


    public function eliminar($consulta)
    {
        //Delete
        $select = $this->pdo->prepare($consulta);
        if ($select->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function actualizar($consulta)
    {
        //Updates
        $select = $this->pdo->prepare($consulta);
        if ($select->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function consultarC($consulta, $parametros = [])
    {
        // Preparar la consulta
        $select = $this->pdo->prepare($consulta);

        // Ejecutar la consulta con los parámetros si existen
        if ($select->execute($parametros)) {
            return $select->fetchAll();
        } else {
            return false;
        }
    }


    public function actualizarC($consulta, $params = [])
    {
        // Update
        $select = $this->pdo->prepare($consulta);
        if (!empty($params)) {
            foreach ($params as $index => $param) {
                $select->bindValue($index + 1, $param);
            }
        }

        if ($select->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function insertarC($consulta, $params = [])
    {
        // Insert
        $select = $this->pdo->prepare($consulta);
        if (!empty($params)) {
            foreach ($params as $index => $param) {
                $select->bindValue($index + 1, $param);
            }
        }

        if ($select->execute()) {
            return true;
        }
        return false;
    }



}


