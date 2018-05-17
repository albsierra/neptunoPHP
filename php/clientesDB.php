<TABLE id="t01">
    <thead>
        <TR>
            <TH>IdCliente</TH>
            <TH>NombreCompany</TH>
            <TH>NombreContacto</TH>
            <TH>CargoContacto</TH>
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
    $sql = "SELECT * FROM Clientes WHERE IdCliente LIKE '%$vIdCliente%' LIMIT 22";
    foreach ($dbh->query($sql) as $row)
    { ?>
        <TR>
            <TD><?php print $row['IdCliente'] ?></TD>
            <TD><?php print $row['NombreCompany'] ?></TD>
            <TD><?php print $row['NombreContacto'] ?></TD>
            <TD><?php print $row['CargoContacto'] ?></TD>
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

