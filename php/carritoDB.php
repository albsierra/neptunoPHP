<?php

if(isset($_SESSION['productos'])) {
    $productosEnCarrito = $_SESSION['productos'];
} else {
    $productosEnCarrito = array();
}


if (isset($_GET['idProducto']) && $_GET['idProducto'] > 0) {
    $idProducto = $_GET['idProducto'];
    $productosEnCarrito[$idProducto] = isset($productosEnCarrito[$idProducto]) ? $productosEnCarrito[$idProducto] + 1 : 1;
}

$_SESSION['productos'] = $productosEnCarrito;
?>
<TABLE id="t01">
    <thead>
        <TR>
            <TH>IdProducto</TH>
            <TH>NombreProducto</TH>
            <TH>PrecioUnidad</TH>
            <TH>Cantidad</TH>
        </TR>
    </thead>
    <tbody>
        <?php
        include 'conexionDB.php';

        try {
            $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
            /*             * * echo a message saying we have connected ** */
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        foreach ($productosEnCarrito as $vIdProducto => $vCantidad) {
            // FETCH_ASSOC
            $stmt = $dbh->prepare("SELECT * FROM Productos WHERE IdProducto = :idProducto");
            // Especificamos el fetch mode antes de llamar a fetch()
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->bindValue(':idProducto', $vIdProducto);
            // Ejecutamos
            $stmt->execute();
            // Mostramos los resultados
            while ($row = $stmt->fetch()) : ?>
        <TR>
            <TD><?php print $row['IdProducto'] ?></TD>
            <TD><?php print $row['NombreProducto'] ?></TD>
            <TD><?php print $row['PrecioUnidad'] ?></TD>
            <TD><?php print $vCantidad ?></TD>
        </TR>
        <?php endwhile; 
        }

/* * * close the database connection ** */
$dbh = null;
?>
    </tbody>
</TABLE>
