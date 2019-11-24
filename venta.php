<?php
session_start();

unset($_SESSION['consulta']);

?>
<!DOCTYPE HTML>
<!--
	Twenty by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title>Tabla dinamica</title>
        <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
        <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
        <link rel="stylesheet" type="text/css" href="librerias/select2/css/select2.css">

        <script src="librerias/jquery-3.2.1.min.js"></script>
        <script src="js/funciones.js"></script>
        <script src="librerias/bootstrap/js/bootstrap.js"></script>
        <script src="librerias/alertifyjs/alertify.js"></script>
        <script src="librerias/select2/js/select2.js"></script>
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
					<div class="">

						<header>
							<h1>Zapateria "Las Vegas"</h1>
                        </header>


                            <div class="">
                                <div id="tabla"></div>
                            </div>

                            <!-- Modal para registros nuevos -->


                            <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel"><font color="black">Agrega nueva venta</h4>
                                        </div>
                                        <div class="modal-body">
                                            <label> <font color="black"> ID del Zapato</font></label>
                                            <input type="text" name="" id="nombre" class="form-control input-sm">
                                            <label>Cantidad</label>
                                            <input type="text" name="" id="apellido" class="form-control input-sm">
                                            <label>Talla</label>
                                            <input type="text" name="" id="talla" class="form-control input-sm">
                                            <label>Vendedor</label>
                                            <input type="text" name="" id="vendedor" class="form-control input-sm">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarnuevo">
                                                Agregar
                                            </button>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal para edicion de datos -->

                            <div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Actualizar datos</h4>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" hidden="" id="idpersona" name="">
                                            <label>Cantidad</label>
                                            <input type="text" name="" id="nombreu" class="form-control input-sm">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-warning" id="actualizadatos" data-dismiss="modal">Actualizar</button>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        
                        <table>
                        <tr>
                        <td>
                        <form action="Pago.php" method="post">
                            <div class="row">
                                <div class="12u">
                                    <ul class="buttons">
                                        <li><input type="submit" class="special" value="Generar" name="Gel" /></li>
                                    </ul>
                                </div>
                            </div>
                        </form>
                        </td>
                        
                        <td>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <div class="row">
                                <div class="12u">
                                    <ul class="buttons">
                                        <li><input type="submit" class="special" value="Cancelar" name="Cancel" /></li>
                                    </ul>
                                </div>
                            </div>
                            <?php 
                                if (isset($_POST['Cancel'])) {
                                    $link2=mysqli_connect("localhost","root","");
                                    mysqli_select_db($link2,"zapateria");
                                    mysqli_query($link2,"TRUNCATE TABLE ventaa");
                                    mysqli_close($link2);
                                }
                            ?>
                        </form>
                        </td>
                        </tr>
                        </table>
						
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

<script type="text/javascript">
    $(document).ready(function(){
        $('#tabla').load('componentes/tabla.php');
    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#guardarnuevo').click(function(){
            nombre=$('#nombre').val();
            apellido=$('#apellido').val();
            talla=$('#talla').val();
            vendedor=$('#vendedor').val();
            agregardatos(nombre,apellido,talla,vendedor);
        });



        $('#actualizadatos').click(function(){
            actualizaDatos();
        });

    });
</script>