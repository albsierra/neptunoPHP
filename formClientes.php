<?php
include 'php/conexionDB.php';

if (isset($_GET['idCliente']) && strlen($_GET['idCliente'])>0) {

    $vIdCliente = $_GET['idCliente'];

    try {
        $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
        /*         * * echo a message saying we have connected ** */

        /*         * * The SQL SELECT statement ** */
        $sql = "SELECT * FROM Clientes WHERE IdCliente = :idCliente";
        $stmt = $dbh->prepare($sql);
//      Especificamos el fetch mode antes de llamar a fetch()
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->bindValue(':idCliente', $vIdCliente);
        $stmt->execute();
        $row = $stmt->fetch();

        /*         * * close the database connection ** */
        $dbh = null;
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>
<!DOCTYPE HTML>
<!--
        Eventually by HTML5 UP
        html5up.net | @ajlkn
        Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <head>
        <title>Neptuno</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="assets/css/main.css" />
        <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
        <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
    </head>
    <body>

        <!-- Header -->
        <header id="header">
            <h1>Neptuno</h1>
            <p>Empresa dedicada a la comercialización de productos de alimentación <a href="http://html5up.net">HTML5 UP</a>.</p>
        </header>

        <!-- Signup Form -->
        <form id="filtrar" method="post" action="php/insertarClienteDB.php">
                    <input value="<?php echo isset($row['IdCliente']) ? $row['IdCliente'] : '' ?>" type="text" name="idCliente" id="idCliente" placeholder="idCliente" size="5"/><br />
                <fieldset>
                <input value="<?php echo isset($row['NombreCompany']) ? $row['NombreCompany'] : '' ?>" type="text" name="nombreCompany" id="nombreCompany" placeholder="nombreCompany" size="80"/><br />
                <input value="<?php echo isset($row['NombreContacto']) ? $row['NombreContacto'] : '' ?>" type="text" name="nombreContacto" id="nombreContacto" placeholder="nombreContacto" size="60"/><br />
                <input value="<?php echo isset($row['Pais']) ? $row['Pais'] : '' ?>" type="text" name="pais" id="pais" placeholder="pais" size="30"/><br />
                <input value="<?php echo isset($row['Telefono']) ? $row['Telefono'] : '' ?>" type="tel" name="telefono" id="telefono" placeholder="telefono" /><br />
                <input value="<?php echo isset($row['Saldo']) ? $row['Saldo'] : '' ?>" type="number" name="saldo" id="saldo" placeholder="saldo" step="0.01"/><br />
            </fieldset>
            <input type="reset" value="Cancelar" />
            <input type="submit" value="Insertar" />
        </form>

        <!-- Tabla de clientes -->

        <!-- Footer -->
        <footer id="footer">
            <ul class="icons">
                <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                <li><a href="#" class="icon fa-github"><span class="label">GitHub</span></a></li>
                <li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
            </ul>
            <ul class="copyright">
                <li>&copy; Untitled.</li><li>Credits: <a href="http://html5up.net">HTML5 UP</a></li>
            </ul>
        </footer>

        <!-- Scripts -->
                <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
        <script src="assets/js/main.js"></script>

    </body>
</html>
