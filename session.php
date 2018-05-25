<?php
    session_start();
    
    function barraLogin() {
    ?>
    <div style="position: fixed; top: 0px; width: 100%; background-color: black;">
        <?php if (isset($_SESSION["autenticado"])) {
            echo $_SESSION["Apellidos"]. ', ' . $_SESSION["Nombre"] . ' ';
        ?>
            <a href="logout.php">logout</a>
        <?php } else { ?>
            <a href="login.php">login</a>
        <?php } ?>
    </div>
    <?php
    }
