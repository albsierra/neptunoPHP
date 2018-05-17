<TABLE id="t01">
    <thead>
        <TR>
            <TH>IdPedido</TH>
            <TH>IdProducto</TH>
            <TH>PrecioUnidad</TH>
            <TH>Cantidad</TH>
            <TH>Descuento</TH>
        </TR>
    </thead>
    <tbody>
<?php
include 'conexionDB.php';

$vIdProducto = isset($_GET['idProducto']) ? $_GET['idProducto'] : 'NULL';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    /*** echo a message saying we have connected ***/

    /*** The SQL SELECT statement ***/
    $sql = "SELECT * FROM DetallesPedidos WHERE IdProducto = $vIdProducto OR $vIdProducto IS NULL";

    foreach ($dbh->query($sql) as $row)
    : ?>
        <TR>
            <TD><?php print $row['IdPedido'] ?></TD>
            <TD><?php print $row['IdProducto'] ?></TD>
            <TD><?php print $row['PrecioUnidad'] ?></TD>
            <TD><?php print $row['Cantidad'] ?></TD>
            <TD><?php print $row['Descuento'] ?></TD>
        </TR>

    <?php endforeach;

    /*** close the database connection ***/
    $dbh = null;

}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>
    </tbody>
</TABLE>

