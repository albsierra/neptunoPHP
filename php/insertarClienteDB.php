<?php

include '../classes/Clientes.php';
include 'conexionDB.php';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);

    $cliente = new Clientes($_POST);
    
    $clienteArray = array(
        "ClientesidCliente" => "ASO",
        "ClientesnombreCompany" => "Albsierra",
        "ClientesnombreContacto" => "Alberto Sierra",
        "Clientespais" => "España",
        "Clientestelefono" => "123456789",
        "Clientessaldo" => "125.03"
    );
    
    //$clienteArray2 = array();
    $clienteArray2 = (array) $cliente;
    
    print_r($clienteArray);    echo '<br />';
    print_r($clienteArray2);
    
    echo gettype($clienteArray);   echo '<br />';
    echo gettype($clienteArray2);   echo '<br />';
     
    
    $stmt = $dbh->prepare("INSERT INTO Clientes (IdCliente, NombreCompany, NombreContacto, Pais, Telefono, Saldo) "
            . "             VALUES (:ClientesidCliente, :ClientesnombreCompany, :ClientesnombreContacto, :Clientespais, :Clientestelefono, :Clientessaldo)");

    if ($stmt->execute($clienteArray2)) {
        echo "Se ha creado un nuevo registro!";
    };
    /*     * * close the database connection ** */
    $dbh = null;
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>