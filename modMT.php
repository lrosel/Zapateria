<!DOCTYPE HTML>
<!--
	Twenty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>Proyecto</title>
    <!--   <meta charset="utf-8" />   -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
    <link rel="stylesheet" href="assets/css/main.css" />
    <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
    <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
</head>
<body class="index">
<div id="page-wrapper">

    <!-- Header -->
    <header id="header" class="alt">
        <h1 id="logo"><a href="index.html"></a></h1>
        <nav id="nav">
            <ul>
                <li class="current"><a href="garente.php">Almacén</a></li>
                <li class="submenu">
                    <a href="#">Empleados</a>
                    <ul>
                        <li class="submenu">
                            <a href="#">Registrar</a>
                            <ul>
                                <li><a href="registrarG.php">Gerente</a></li>
                                <li><a href="registrarC.php">Cajero</a></li>
                                <li><a href="registrarV.php">Vendedor</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="#">Eliminar</a>
                            <ul>
                                <li><a href="EliminarG.php">Gerente</a></li>
                                <li><a href="EliminarC.php">Cajero</a></li>
                                <li><a href="EliminarV.php">Vendedor</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#">Productos</a>
                    <ul>
                        <li><a href="venta.php">Venta</a></li>
                        <!--<li><a href="cambio.php">Cambio</a></li>-->
                        <!--<li><a href="ventaTotal.php">Ventas totales</a></li>-->
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#">Inventario</a>
                    <ul>
                        <li><a href="agregarM.php">Agregar modelos</a></li>
                        <li><a href="modificarM.php">Modificar modelos</a></li>
                        <li><a href="eliminarM.php">Eliminar modelos</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#">Mostrar</a>
                    <ul>
                        <li><a href="verG.php">Gerentes</a></li>
                        <li><a href="verC.php">Cajeros</a></li>
                        <li><a href="verV.php">Vendedor</a></li>
                    </ul>
                </li>
                <li class="submenu"><a href="consultas.php">Consultas</a></li>
                <li class="submenu"><a href="cerrar.php">Cerrar Sesión</a></li>
            </ul>
        </nav>
    </header>


    <!-- Banner -->
    <section id="banner">
        <div class="inner">

            <header>
                <h1>~~~~~~~~   Zapateria   "Las Vegas"   ~~~~~~~~</h1>

            </header>
            <div class="content">
                <form action="modiMT.php" method="post">
                    <?php

                    $Id=$_REQUEST['Id'];
                    $tall=$_REQUEST['talla'];
                    $link = mysqli_connect ("localhost", "root", "");
                    mysqli_select_db($link,"zapateria");
                    $result=mysqli_query($link,"select * from tallas where inventario_Id_za = '$Id';");
                    while($row = mysqli_fetch_array($result)) {
                        $ide=$row['inventario_Id_za'];
                        $t=$row['talla'];
                            if($t==$tall){
                            ?>


                            <div class="row 50%">
                                <div class="12u">
                                    <input type="text" name="talla" placeholder="<?php echo "Talla: ".$row['talla']; ?>" />
                                </div>
                            </div>
                            <div class="row 50%">
                                <div class="12u">
                                    <input type="text" name="cantidad" placeholder="<?php echo "Cantidad: ".$row['cantidadxtalla']; ?>" />
                                </div>
                            </div>

                        <?php 	}
                    }
                    ?>


                    <div class="row">
                        <div class="12u">
                            <ul class="buttons">
                                <?php echo"<input type='hidden' name='Id' value='".$Id."'>";  ?>
                                <?php echo"<input type='hidden' name='talla' value='".$tall."'>";  ?>
                                <li><input type="submit" name="Modifi" class="special" value="Modificar" /></li>
                            </ul>
                        </div>
                    </div>

                </form>
            </div>
            <footer>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
            </footer>

        </div>

    </section>






</div>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jquery.dropotron.min.js"></script>
<script src="assets/js/jquery.scrolly.min.js"></script>
<script src="assets/js/jquery.scrollgress.min.js"></script>
<script src="assets/js/skel.min.js"></script>
<script src="assets/js/util.js"></script>
<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
<script src="assets/js/main.js"></script>

</body>
</html>