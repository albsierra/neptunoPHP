<TABLE id="t01">
    <thead>
        <TR>
            <TH>IdProveedor</TH>
            <TH>NombreCompany</TH>
            <TH>NombreContacto</TH>
            <TH>Teléfono</TH>
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

