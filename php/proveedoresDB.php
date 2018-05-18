<TABLE id="t01">
    <thead>
        <TR>
            <TH>IdProveedor</TH>
            <TH>NombreCompany</TH>
            <TH>NombreContacto</TH>
            <TH>Teléfono</TH>
            <TH>Acciones</TH>
        </TR>
    </thead>
    <tbody>
<?php
include 'conexionDB.php';

$vPais = isset($_POST['pais']) ? $_POST['pais'] : '';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    /*** echo a message saying we have connected ***/

    /*** The SQL SELECT statement ***/
    $sql = "SELECT * FROM Proveedores WHERE Pais LIKE '%$vPais%'";
    foreach ($dbh->query($sql) as $row)
    { ?>
        <TR>
            <TD><?php print $row['IdProveedor'] ?></TD>
            <TD><?php print $row['NombreCompany'] ?></TD>
            <TD><?php print $row['NombreContacto'] ?></TD>
            <TD><?php print $row['Telefono'] ?></TD>
            <TD><a href="borrarProveedor.php?idProveedor=<?php echo $row['IdProveedor']; ?>">
                        <button name="eliminarProveedores" value="eliminarProveedores">Eliminar</button>
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

