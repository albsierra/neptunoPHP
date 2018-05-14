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

$vIdCliente = isset($_POST['idCliente']) ? $_POST['idCliente'] : '';

try {
    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    /*** echo a message saying we have connected ***/

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

