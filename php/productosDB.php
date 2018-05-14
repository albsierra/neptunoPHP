<TABLE id="t01">
    <thead>
        <TR>
            <TH>IdProducto</TH>
            <TH>NombreProducto</TH>
            <TH>PrecioUnidad</TH>
        </TR>
    </thead>
    <tbody>
<?php
/**
 * Created by PhpStorm.
 * User: alberto
 * Date: 5/04/18
 * Time: 17:56
 */

/*** mysql hostname ***/
$hostname = 'localhost';

/*** mysql dbname ***/
$dbname = 'Neptuno';

/*** mysql username ***/
$username = 'root';

/*** mysql password ***/
$password = 'alumno';

$vIdCategoria = isset($_POST['idCategoria']) ? $_POST['idCategoria'] : 'NULL';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    /*** echo a message saying we have connected ***/

    /*** The SQL SELECT statement ***/
    $sql = "SELECT * FROM Productos WHERE IdCategoria = $vIdCategoria OR $vIdCategoria IS NULL";

    foreach ($dbh->query($sql) as $row)
    : ?>
        <TR>
            <TD><?php print $row['IdProducto'] ?></TD>
            <TD><?php print $row['NombreProducto'] ?></TD>
            <TD><?php print $row['PrecioUnidad'] ?></TD>
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

