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

            $talla=$_REQUEST['talla'];
            $cantidad=$_REQUEST['cantidad'];
            $id=$_POST['id'];
            $band=0;
            $cont=0;


            $link = mysqli_connect ("localhost", "root", "");
            mysqli_select_db($link,"zapateria");
            if(empty($talla) || empty($cantidad)){
                $band=1;
            }else{
                $sp=explode(",",$cantidad);
                $ta=explode(",",$talla);
                for ($i=0;$i<count($sp);$i++){
                    $cont=$cont+$sp[$i];
                }
                $result1=mysqli_query($link,"select * from inventario ");
                while($row=mysqli_fetch_array($result1)){
                    if($id=$row['Id_za']){
                        $cnt=$row['cantidad'];
                    }
                }
                if (($cnt==$cont) && (count($cantidad)==count($talla))) {
                    for ($i=0;$i<count($sp);$i++){
                        $var = " insert into tallas (inventario_Id_za,talla,cantidadxtalla) values('$id','$ta[$i]','$sp[$i]')";
                        mysqli_query($link,$var);
                        // if (!mysqli_query($link, $var)) {
                        // printf("Errormessage: %s\n", mysqli_error($link));
                        //}
                    }

                }else {
                    $band=1;
                    $result=mysqli_query($link," DELETE FROM `inventario` WHERE `inventario`.`Id_za`=$id;");
                }
            }
            if($band==0){
                echo "<center>R E G I S T R A D O EXITOSAMENTE</center>";
                //echo "<center>$modelo	$marca</center>";
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