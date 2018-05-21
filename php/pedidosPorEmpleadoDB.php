<TABLE id="t01">
    <thead>
        <TR>
            <TH>IdPedido</TH>
            <TH>IdCliente</TH>
            <TH>IdEmpleado</TH>
            <TH>FechaPedido</TH>
            <TH>Coste</TH>
        </TR>
    </thead>
    <tbody>
<?php
include 'conexionDB.php';

$vIdEmpleado = isset($_GET['idEmpleado']) ? $_GET['idEmpleado'] : 'NULL';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    /*** echo a message saying we have connected ***/

    /*** The SQL SELECT statement ***/
    $sql = "SELECT IdPedido, IdEmpleado, IdCliente, FechaPedido, 
            ROUND(SUM(Cantidad * PrecioUnidad * (1 - Descuento)),2) AS Coste
            FROM Pedidos JOIN DetallesPedidos USING (IdPedido)
            WHERE  IdEmpleado = $vIdEmpleado OR $vIdEmpleado IS NULL
            GROUP BY Pedidos.IdPedido";

    foreach ($dbh->query($sql) as $row)
    : ?>
        <TR>
            <TD><?php print $row['IdPedido'] ?></TD>
            <TD><?php print $row['IdCliente'] ?></TD>
            <TD><?php print $row['IdEmpleado'] ?></TD>
            <TD><?php print $row['FechaPedido'] ?></TD>
            <TD><?php print $row['Coste'] ?></TD>
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

