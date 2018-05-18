<?php
include 'conexionDB.php';

$vIdProveedor = isset($_GET['idProveedor']) ? $_GET['idProveedor'] : 'NULL';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    /*** echo a message saying we have connected ***/

    /*** INSERT data ***/
    $count = $dbh->exec("DELETE FROM Proveedores WHERE IdProveedor = $vIdProveedor");

    /*** echo the number of affected rows ***/
    if($count > 0) {
        $message = "Se ha eliminado el proveedor con IdProveedor:" . $vIdProveedor;
    } else {
        $message = "No se ha borrado ningún proveedor";
    }

    /*** close the database connection ***/
    $dbh = null;

}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>

<h1><?php echo $message ?></h1>
<a href="proveedores.php" title="Listado de proveedores"><button name="proveedores" value="Proveedores">Volver a Proveedores</button></a>