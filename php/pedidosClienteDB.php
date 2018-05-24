<TABLE id="t01">
    <thead>
        <TR>
            <TH>IdPedido</TH>
            <TH>FechaPedido</TH>
            <TH>FechaEntrega</TH>
            <TH>Coste Total</TH>
        </TR>
    </thead>
    <tbody>
<?php
include 'conexionDB.php';

$vIdCliente = isset($_GET['idCliente']) ? $_GET['idCliente'] : '';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    /*** echo a message saying we have connected ***/

    /*** The SQL SELECT statement ***/
    $sql = "SELECT IdPedido, FechaPedido, FechaEntrega, ROUND(SUM(Cantidad * PrecioUnidad), 2) AS CosteTotal "
            . "FROM Pedidos JOIN DetallesPedidos USING (IdPedido) "
            . "WHERE IdCliente = '$vIdCliente' "
            . "GROUP BY IdPedido";
    
    foreach ($dbh->query($sql) as $row)
    { ?>
        <TR>
            <TD><?php print $row['IdPedido'] ?></TD>
            <TD><?php print $row['FechaPedido'] ?></TD>
            <TD><?php print $row['FechaEntrega'] ?></TD>
            <TD><?php print $row['CosteTotal'] ?></TD>
        </TR>

    <?php }

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
