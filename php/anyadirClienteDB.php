<?php
include 'conexionDB.php';

$vIdCliente = isset($_POST['idCliente']) ? $_POST['idCliente'] : '';
$vNombreCompany = isset($_POST['nombreCompany']) ? $_POST['nombreCompany'] : '';
$vNombreContacto = isset($_POST['nombreContacto']) ? $_POST['nombreContacto'] : '';
$vPais = isset($_POST['pais']) ? $_POST['pais'] : '';
$vSaldo = isset($_POST['saldo']) ? $_POST['saldo'] : '';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    /*** echo a message saying we have connected ***/

    /*** The SQL SELECT statement ***/
    $sql = "INSERT INTO `Neptuno`.`Clientes` (`IdCliente`, `NombreCompany`, `NombreContacto`, `Pais`, `Saldo`)"
            . " VALUES ('$vIdCliente', '$vNombreCompany', '$vNombreContacto', '$vPais', '$vSaldo');";

    $count = $dbh->exec($sql);

    if($count > 0 ) {
        echo "Fila Insertada";
    } else {
        echo "No hemos podido insertar la fila";
    }
    /*** close the database connection ***/
    $dbh = null;

}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>


