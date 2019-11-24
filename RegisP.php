<!DOCTYPE HTML>
<!--
	Twenty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>Proyecto</title>
    <meta charset="utf-8" />
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
            <?php

            $marca=$_REQUEST['marca'];
            $precio=$_REQUEST['precio'];
            $cantidad=$_REQUEST['cantidad'];
            $band=0;

            $link = mysqli_connect ("localhost", "root", "");
            mysqli_select_db($link,"zapateria");
            if(!is_numeric($precio) || !is_numeric($cantidad)){
                $band=1;
            }else{
                echo "<center> <hr><h2>Alta Exitosa $marca </h2></center>";
                $var=" insert into inventario (marca,precio,cantidad) values('$marca','$precio','$cantidad')";
                mysqli_query($link,$var);
               /* if (!mysqli_query($link, $var)) {
                    printf("Errormessage: %s\n", mysqli_error($link));
                }*/
            }
            if($band==0){
               /* echo "<center>R E G I S T R A D O</center>";
                echo "<center>$modelo	$marca</center>";*/
                $result1=mysqli_query($link,"select * from inventario ");
                while($row=mysqli_fetch_array($result1)){
                    if($marca=$row['marca']){
                        $id=$row['Id_za'];
                    }
                }
                mysqli_close($link);
                 echo '      <div class="content">
                            <form action="RegisPr.php" method="post">
                                <div class="row 50%">
                                    <div class="12u">
                                        <input type="text" name="talla" placeholder="Talla:1,2,3" required/>
                                    </div>
                                </div>
						<div class="row 50%">
                                    <div class="12u">
                                        <input type="text" name="cantidad" placeholder="Cantidad por talla:21,34,32" required/>
                                    </div>
                                </div>
                        <input type="hidden" name="id" value="'.$id.'">
                                <div class="row">
                                    <div class="12u">
                                        <ul class="buttons">
                                            <li><input type="submit" class="special" value="Registrar" /></li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div>';





            }else{
                echo "<center>Error al Registrar</center>";
                echo "<center>Se Introducieron Datos Incorrectos</center>";
                //echo "<center> <hr><h2>Intente de Nuevo</h2></center>";
                mysqli_close($link);

            echo '<form action="agregarM.php" method="post">
                <div class="row">
                    <div class="12u">
                        <ul class="buttons">
                            <li><input type="submit" class="special" value="Intente de Nuevo" name="Gel" /></li>
                        </ul>
                    </div>
                </div>
            </form>';
            }
            ?>


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