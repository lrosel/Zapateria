<?php
    $pa=$_REQUEST['pago'];
    $to=0;
    $ca=0;
    $id_za=0;
    $link=mysqli_connect("localhost","root","");
    mysqli_select_db($link,"zapateria");
    $result=mysqli_query($link,"select * from ventaa");
    while($row=mysqli_fetch_array($result)){
        $id_za=$row['id_z'];
        $id=$row['cantidad'];
        $color=$row['talla'];
        $pre=$row['precio'];
        $v=$row['vendedor'];
        $mul=$id*$pre;
        $ca=$ca+$id;
        $to=$to+$mul;
    }
    if($pa<$to){
        echo"<script type=\"text/javascript\">alert('Error No Puede Ingresar Ese Dato');
        window.location='Pago.php';</script>"; 
        mysqli_close($link);
    }else{//este else se cierra hasta la linea 205
?>
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
            </header>
            <h1>~~~ Nota de Venta ~~~</h1>
            <h4>Calle Cinco de Mayo 3,</h4>
            <h4>  Centro, 72000 Puebla, Pue.</h4>

            <?php  date_default_timezone_set('America/Mexico_City');?>
            <?= date('m/d/y  g:ia');?>

            <hr>
            <?php
            $hoy = date("Y-m-d");
            $pa=$_REQUEST['pago'];
            $to=0;
            $ca=0;
            $au=0;
            $ven=0;
            $nom="";
            $id_za=0;
            $id=0;
            $link=mysqli_connect("localhost","root","");
            mysqli_select_db($link,"zapateria");

            $result1=mysqli_query($link,"select tiket from venta");
            while($row=mysqli_fetch_array($result1)){
                $au = $row['tiket'];
            }
            $au=$au+1;
            $result=mysqli_query($link,"select * from ventaa");
            echo "<table >";
            echo "<tr  bgcolor=''> <td width='100'><font color=#00bfff>Cantidad</font></td> <td WIDTH='100'><font color=#00bfff>Descripcion</font></td><td WIDTH='60'><font color=#00bfff>Talla</font></td><td WIDTH='80'><font color=#00bfff>Importe</font></td></tr>";
            while($row=mysqli_fetch_array($result)){
                $id_za=$row['id_z'];
                $id=$row['cantidad'];
                $color=$row['talla'];
                $pre=$row['precio'];
                $v=$row['vendedor'];
                $mul=$id*$pre;
                $ca=$ca+$id;
                $to=$to+$mul;
                echo "<tr> <td  WIDTH='100'>$id </td> <td WIDTH='100' >$id_za  </td><td WIDTH='60'>$color</td><td WIDTH='80'>$mul </td> </tr>";

                $result1=mysqli_query($link,"select * from vendedor");
                while($row=mysqli_fetch_array($result1)){
                    $idv = $row['Num_V'];
                    if ($v==$idv) {
                        $nomv = $row['Id_v'];
                    }
                }
                $ruta="insert into venta(vendedor_Id_v,inventario_Id_za,cantidad,talla_zap,tiket,fecha) values('$nomv','$id_za','$id','$color','$au','$hoy')";
                mysqli_query($link,$ruta);
            
            /*if(($pa-$to)<0){
                header('Location: http://localhost/IS/Gerente/Pago.php');
            }*/

            $result3=mysqli_query($link,"select * from tallas WHERE inventario_Id_za='$id_za' AND talla='$color'");
            while($row=mysqli_fetch_array($result3)){
                $z = $row['inventario_Id_za'];
                $t = $row['talla'];
                if ($z==$id_za && $t==$color) {
                    $canti=$row['cantidadxtalla'];
                    $op=$canti-$id;
                    if ($op!=0) {
                        mysqli_query($link," UPDATE `tallas` SET `cantidadxtalla`='$op' WHERE inventario_Id_za='$id_za' AND talla='$color'");
                    }else{
                        mysqli_query($link," DELETE FROM `tallas` WHERE inventario_Id_za='$id_za' AND talla='$color'");
                    }
                }
            }
        }

            echo "<tr  bgcolor=''> <td colspan='4'><font color=white><p>&nbsp;</p></font></td></tr>";
            echo "<tr><td colspan='2'> Total de venta... </td> <td colspan='2'> $ $to </td> </tr>";
            echo "<tr><td colspan='2'> Recibido........... </td> <td colspan='2'> $ $pa  </td> </tr>";
            echo "<tr  bgcolor=''> <td colspan='4'><font color=white><p>&nbsp;</p></font></td></tr>";
            $cam=$pa-$to;
            if($pa>$to){
                echo "<tr><td colspan='2'> Cambio.............</td> <td colspan='2'> $ $cam </td> </tr>";
            }
            if($pa-$to==0){
                echo "<tr><td colspan='2'> Cambio.............</td> <td colspan='2'> $ 0 </td> </tr>";
            }

            $link1=mysqli_connect("localhost","root","");
            mysqli_select_db($link1,"zapateria");
            $result1=mysqli_query($link1,"select * from vendedor");
            while($row=mysqli_fetch_array($result1)){
                $id = $row['Num_V'];
                if ($v==$id) {
                    $nom = $row['Nombre_v'];
                }
            }



            echo "<tr  bgcolor=''> <td colspan='4'><font color=white><p>&nbsp;</p></font></td></tr>";
            echo "<tr  bgcolor=''> <td colspan='1'><font color=white>Le atendió: </font></td> <td colspan='1'><font color=white>$nom</font></td></tr>";
            echo "<tr  bgcolor=''> <td colspan='4'><font color=white><p>&nbsp;</p></font></td></tr>";
            echo "<tr  bgcolor=''> <td colspan='4'><font color=white><p>&nbsp;</p></font></td></tr>";
            echo "<tr  bgcolor=''> <td colspan='4'>  <form action=\"venta.php\" method=\"post\"> <div class=\"row\">
                                    <div class=\"12u\">
                                        <ul class=\"buttons\">
                                        <li><input type=\"submit\" class=\"special\" value=\"Finalizar\" /></li>
                                        </ul>
                                    </div>
                                </div>
                            </form> </td> </tr>";


            mysqli_close($link1);
            mysqli_close($link);
            ?>
                      <?php $link2=mysqli_connect("localhost","root","");
                         mysqli_select_db($link2,"zapateria");
                        // mysqli_query($link2,"TRUNCATE TABLE venta");
                         mysqli_close($link2);
                     }//este cierra el else de la linea 21
                      ?>

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