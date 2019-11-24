<!DOCTYPE HTML>
<!--
	Twenty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>
    <title>Proyecto</title>
    <meta charset="utf-8"/>
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
                <h1>Zapateria "Las Vegas"</h1>
                <h1>~~~Ventas totales por día ~~~</h1>
            </header>
            <hr>

            <?php
            $to=0;
            $ca=0;
            $link=mysqli_connect("localhost","root","");
            mysqli_select_db($link,"zapateria");
            $result=mysqli_query($link,"select * from ventaTotal");;
            while($row=mysqli_fetch_array($result)){
                $id=$row['cantidd'];
                $mar=$row['total'];
                $to=$to+$mar;
                $ca=$ca+$id;
            }

            date_default_timezone_set('America/Mexico_City');

            $fec=date('y-m-d');;
            mysqli_query($link," insert into totales(fecha,numpares,cantotak) values('$fec','$ca','$to');");///Se guardan los datos de los pares vendidos en otra tabla 

            $link=mysqli_connect("localhost","root","");
            mysqli_select_db($link,"zapateria");
            $result=mysqli_query($link,"select * from totales");
            echo "<table >";
            echo "<tr  bgcolor=''> <td><font color=#00bfff>Fecha del día</td> <td><font color=#00bfff>Cantidad de Zapatos</td><td><font color=#00bfff>Total del día</td></tr>";
            while($row=mysqli_fetch_array($result)){
                $id_za=$row['fecha'];
                $id=$row['numpares'];
                $mar=$row['cantotak'];
                echo "<tr> <td WIDTH=300 >$id_za </td> <td WIDTH=300 >$id</td><td WIDTH=300 > $$mar</td></tr>";
            }
            mysqli_close($link);

            $link2=mysqli_connect("localhost","root","");
            mysqli_select_db($link2,"zapateria");
            mysqli_query($link2,"TRUNCATE TABLE ventatotal");
            mysqli_close($link2);

            ?>




        </div>

    </section>
    <footer>

    </footer>






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