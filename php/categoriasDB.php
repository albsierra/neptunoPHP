<TABLE id="t01">
    <thead>
        <TR>
            <TH>IdCategoria</TH>
            <TH>NombreCategoria</TH>
            <TH>Descripcion</TH>
        </TR>
    </thead>
    <tbody>
<?php
include 'conexionDB.php';

$vNombreCategoria = isset($_POST['nombreCategoria']) ? $_POST['nombreCategoria'] : '';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    /*** echo a message saying we have connected ***/

    /*** The SQL SELECT statement ***/
    $sql = "SELECT * FROM Categorias WHERE NombreCategoria LIKE '%$vNombreCategoria%'";
    foreach ($dbh->query($sql) as $row)
    { ?>
        <TR>
            <TD><?php print $row['IdCategoria'] ?></TD>
            <TD><a href="productos.php?idCategoria=<?php echo $row['IdCategoria']; ?>"><?php print $row['NombreCategoria'] ?></a></TD>
            <TD><?php print $row['Descripcion'] ?></TD>
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

