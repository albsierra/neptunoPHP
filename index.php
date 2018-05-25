<?php include 'session.php'; ?>
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
        <?php barraLogin() ?>
      <h1 style="text-align: center;">Neptuno</h1>
      <p style="text-align: center;">Empresa dedicada a la comercialización de
        productos de alimentación <a href="http://html5up.net">HTML5 UP</a>.&nbsp;
      </p> 
        <ul style="list-style-type:none;display:flex;justify-content:center">
          <li style="display: inline; float:left; margin:0 20px;"><a href="clientes.php"
              title="Listado de clietnes"><button name="clientes" value="Clientes">Clientes</button></a></li>
          <li style="display: inline; float:left; margin:0 20px;"><a href="categorias.php"
              title="Listado de categorías"><button name="categorias" value="Categorías">Categorías</button></a></li>
          <li style="display: inline; float:left; margin:0 20px;"><a href="productos.php"
              title="Listado de productos"><button name="productos" value="Productos">Productos</button></a></li>
            <li style="display: inline; float:left; margin:0 20px;"><a href="proveedores.php"
              title="Listado de proveedores"><button name="proveedore" value="Proveedores">Proveedores</button></a></li>
          <li style="display: inline; float:left; margin:0 20px;"><a href="empleados.php"
              title="Listado de empleados"><button name="empleados" value="Empleados">Empleados</button></a></li>
        </ul>

      <p style="text-align: center; clear: both"><br>
        <!-- Footer --> </p>
    </header>
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
