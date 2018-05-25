<?php
   include 'session.php';
?>
<!DOCTYPE html>
<!--
	Eventually by HTML5 UP	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)-->
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Neptuno</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/css/main.css">
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
  </head>
  <body>
    <!-- Header -->
    <header id="header">
      <h1 style="text-align: center;">Neptuno</h1>
      <p style="text-align: center;">Empresa dedicada a la comercialización de
        productos de alimentación <a href="http://html5up.net">HTML5 UP</a>.&nbsp;
        <!-- Footer --> </p>
    </header>
    <main>
      <h2>Introduzca el nombre y los apellidos</h2> 
      <div>
         <?php
            $msg = '';
            
            if (isset($_POST['login']) && !empty($_POST['nombre']) 
               && !empty($_POST['apellidos'])) {
                
                include 'php/conexionDB.php';

                try {
                    $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
                    /*         * * echo a message saying we have connected ** */

                    /*         * * The SQL SELECT statement ** */
                    $sql = "SELECT * FROM Empleados WHERE Nombre = :nombre AND Apellidos = :apellidos";
                    $stmt = $dbh->prepare($sql);
            //      Especificamos el fetch mode antes de llamar a fetch()
                    $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    $stmt->bindValue(':nombre', htmlspecialchars($_POST["nombre"]));
                    $stmt->bindValue(':apellidos', htmlspecialchars($_POST["apellidos"]));
                    $stmt->execute();
                    if($row = $stmt->fetch()) {
                        $_SESSION['autenticado'] = true;
                        $_SESSION['IdEmpleado'] = $row['IdEmpleado'];
                        $_SESSION['Nombre'] = $row['Nombre'];
                        $_SESSION['Apellidos'] = $row['Apellidos'];
                  
                        header("location: index.php");
                    } else {
                        $msg = 'Credenciales incorrectas. Vuelva a intentarlo';
                    }

                    /*         * * close the database connection ** */
                    $dbh = null;
                } catch (PDOException $e) {
                    echo $e->getMessage();
                }
            }
         ?>
      </div> <!-- /container -->
      
      <div class = "container">
      
         <form class = "form-signin" role = "form" 
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
            <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
            <input type = "text" class = "form-control" 
               name = "nombre" placeholder = "nombre del empleado" 
               required autofocus></br>
            <input type = "password" class = "form-control"
               name = "apellidos" placeholder = "apellidos del empleado" required>
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
               name = "login">Login</button>
         </form>
      </div> 

    </main>
    <footer id="footer">
      <ul class="icons">
        <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
        <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
        <li><a href="#" class="icon fa-github"><span class="label">GitHub</span></a></li>
        <li><a href="#" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
      </ul>
      <ul class="copyright">
        <li>© Untitled.</li>
        <li>Credits: <a href="http://html5up.net">HTML5 UP</a></li>
      </ul>
    </footer>
    <!-- Scripts -->
    <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
    <script src="assets/js/main.js"></script>
    
  </body>
</html>
