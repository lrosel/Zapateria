<?php 
	session_start();
	require_once "../php/conexion.php";
	$conexion=conexion();

 ?>
<div class="row">
	<div class="col-sm-12">
		<table class="table table-condensed table-bordered">
			<tr>
				<td>id_venta</td>
				<td>vendedor</td>
				<td>id_za</td>
				<td>cantidad</td>
				<td>talla_zap</td>
				<td>tiket</td>
				<td>fecha</td>
			</tr>

			<?php 
			//SELECT * FROM `venta` WHERE `vendedor_Id_v` = 1

				if(isset($_SESSION['consulta'])){
					if($_SESSION['consulta'] > 0){
						$idp=$_SESSION['consulta'];
						$sql="SELECT id_venta,vendedor_Id_v,inventario_Id_za,cantidad,talla_zap,tiket,fecha from venta
						 where id_venta='$idp'";
					}else{
						$sql="SELECT id_venta,vendedor_Id_v,inventario_Id_za,cantidad,talla_zap,tiket,fecha from venta";
					}
				}else{
					$sql="SELECT id_venta,vendedor_Id_v,inventario_Id_za,cantidad,talla_zap,tiket,fecha from venta";
				}

				$result=mysqli_query($conexion,$sql);
				while($ver=mysqli_fetch_row($result)){ 

					$datos=$ver[0]."||".
						   $ver[1]."||".
						   $ver[2]."||".
						   $ver[3]."||".
						   $ver[4]."||".
						   $ver[5]."||".
						   $ver[6];
			 ?>

			<tr>
                <td><?php echo $ver[0] ?></td>
				<td><?php echo $ver[1] ?></td>
				<td><?php echo $ver[2] ?></td>
				<td><?php echo $ver[3] ?></td>
				<td><?php echo $ver[4] ?></td>
				<td><?php echo $ver[5] ?></td>
				<td><?php echo $ver[6] ?></td>
			</tr>
			<?php 
		}
			 ?>
		</table>
	</div>
</div>