<?php 
	require_once "conexion.php";
	$conexion=conexion();
	$id=$_POST['id'];
	$n=$_POST['canti'];

$link = mysqli_connect ("localhost", "root", "");
mysqli_select_db($link,"zapateria");

$result=mysqli_query($link,"select * from inventario where Id_za = '$id';");
if($row = mysqli_fetch_array($result)) {
    $ide=$row['Id_za'];
    if ($ide==$id) {
        $cant=$row['cantidad'];
    }
}
mysqli_close($link);
if ($n<$cant) {

    $sql = "UPDATE venta set canti='$n'
				where zapa='$id'";
    echo $result = mysqli_query($conexion, $sql);
}
 ?>