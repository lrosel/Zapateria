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
            $marca1=$_REQUEST['talla'];
            $precio1=$_REQUEST['cantidad'];
            $Id=$_REQUEST['Id'];
            $tal=$_REQUEST['talla'];
            $band=0;
            $link = mysqli_connect ("localhost", "root", "");
            mysqli_select_db($link,"zapateria");

            $result=mysqli_query($link,"select * from tallas ");
            while($row = mysqli_fetch_array($result)) {
                $ide=$row['inventario_Id_za'];
                $t=$row['talla'];
                if ($ide==$Id && $t==$tal) {

                    if($marca1==""  && $precio1==""){
                        //print_r( $_POST['Modifi']);
                        echo "<center> <br>  </center>";
                        echo "<center>El Zapato con ID: '$Id'</center>";
                        echo "<center> <br>  </center>";
                        echo "<center>  No ha sido modificado  </center>";
                        $band=3;
                    }else{
                        if($marca1!=""){
                            $result=mysqli_query($link," UPDATE `tallas` SET `talla`='$marca1' WHERE `tallas`.`inventario_Id_za`=$Id;");
                        }
                        if($precio1!=""){
                            if(is_numeric($precio1)) {
                                $result=mysqli_query($link," UPDATE `tallas` SET `cantidadxtalla`='$precio1' WHERE `tallas`.`inventario_Id_za`=$Id;");
                            }else{
                                $band=1;
                            }
                        }

                    }
                }else{
                    $band=4;
                }

            }
            if ($band==0) {
                echo "<center> <br>  </center>";
                echo "<center>El Zapato con ID: '$Id'</center>";
                echo "<center> <br>  </center>";
                echo "<center>  Modificado Exitosamente  </center>";
                echo "<center> <br>  </center>";
                echo "<center> <br>  </center>";
            }else{
                if ($band==1) {
                    echo "<center> <br>  </center>";
                    echo "<center> <br>  </center>";
                    echo "<center>  Formato Incorrecto  </center>";
                    echo "<center> <br> </center>";
                    //echo "<center> Intentelo de Nuevo </center>";
                }
                if($band==4){
                    echo "<center> <br>  </center>";
                    echo "<center>No se encontro el Id</center>";
                    echo "<center> <br>  </center>";
                    //echo "<center>Intentelo de Nuevo  </center>";
                }
                echo '<form action="modificarM.php" method="post">
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