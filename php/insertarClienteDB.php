<?php

include '../classes/Clientes.php';
include 'conexionDB.php';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);

    $cliente = new Clientes($_POST);
    print_r($cliente->toArray());

    $stmt = $dbh->prepare("INSERT INTO Clientes (IdCliente, NombreCompany, NombreContacto, Pais, Telefono, Saldo) "
            . "             VALUES (:idCliente, :nombreCompany, :nombreContacto, :pais, :telefono, :saldo)");

    if ($stmt->execute($cliente->toArray())) {
        echo "Se ha creado un nuevo registro!";
    };
    /*     * * close the database connection ** */
    $dbh = null;
} catch (PDOException $e) {
    echo $e->getMessage();
}

header("location: ../clientes.php");
