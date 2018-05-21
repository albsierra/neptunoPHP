<TABLE id="t01">
    <thead>
        <TR>
            <TH>IdEmpleado</TH>
            <TH>Apellidos</TH>
            <TH>Nombre</TH>
            <TH>Cargo</TH>
        </TR>
    </thead>
    <tbody>
<?php
include 'conexionDB.php';

$vEmpleado = isset($_POST['empleado']) ? $_POST['empleado'] : '';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    /*** echo a message saying we have connected ***/

    /*** The SQL SELECT statement ***/
    $sql = "SELECT * FROM Empleados WHERE Apellidos LIKE '%$vEmpleado%' OR Nombre LIKE '%$vEmpleado%'";
    foreach ($dbh->query($sql) as $row)
    { ?>
        <TR>
            <TD><?php print $row['IdEmpleado'] ?></TD>
            <TD><?php print $row['Apellidos'] ?></TD>
            <TD><a href="pedidosPorEmpleado.php?idEmpleado=<?php echo $row['IdEmpleado'] ?>"><?php print $row['Nombre'] ?></a></TD>
            <TD><?php print $row['Cargo'] ?></TD>
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

