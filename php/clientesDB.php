<TABLE id="t01">
    <thead>
        <TR>
            <TH>IdCliente</TH>
            <TH>NombreCompany</TH>
            <TH>NombreContacto</TH>
            <TH>CargoContacto</TH>
            <TH>Acciones</TH>
        </TR>
    </thead>
    <tbody>
<?php
include 'conexionDB.php';

$vIdCliente = isset($_POST['idCliente']) ? $_POST['idCliente'] : '';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    /*** echo a message saying we have connected ***/

    /*** The SQL SELECT statement ***/
    $sql = "SELECT * FROM Clientes WHERE IdCliente LIKE '%$vIdCliente%'";
    foreach ($dbh->query($sql) as $row)
    { ?>
        <TR>
            <TD><?php print $row['IdCliente'] ?></TD>
            <TD><?php print $row['NombreCompany'] ?></TD>
            <TD><?php print $row['NombreContacto'] ?></TD>
            <TD><?php print $row['CargoContacto'] ?></TD>
            <TD><a href="formClientes.php?idCliente=<?php echo $row['IdCliente']; ?>">
                        <button name="editarCliente" value="editarCliente">Editar</button>
            </a></TD>
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

