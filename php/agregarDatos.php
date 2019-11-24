<?php

require_once "conexion.php";
$conexion=conexion();
$n=$_POST['nombre'];
$a=$_POST['apellido'];
$t=$_POST['talla'];
$v=$_POST['vend'];
$marca="";
$talla=1;
$color="";
$precio="";
$cant=0;
$band=1;
$bandx=1;

$link = mysqli_connect ("localhost", "root", "");
mysqli_select_db($link,"zapateria");

$result=mysqli_query($link,"select * from inventario where Id_za = '$n';");
if($row = mysqli_fetch_array($result)) {
    $ide=$row['Id_za'];
    if ($ide==$n) {
        $marca=$row['marca'];
        $precio=$row['precio'];
        $cant=$row['cantidad'];
        $band=0;

        $result1=mysqli_query($link,"select * from tallas WHERE inventario_Id_za=$ide AND talla='$t'");
        while($row=mysqli_fetch_array($result1)){
            $id=$row['inventario_Id_za'];
            $talla=$row['talla'];
            $c=$row['cantidadxtalla'];
        }
    }
}
mysqli_close($link);

$link = mysqli_connect ("localhost", "root", "");
mysqli_select_db($link,"zapateria");

$result=mysqli_query($link,"select * from vendedor where Num_V = '$v';");
if($row = mysqli_fetch_array($result)) {
    $ide=$row['Num_V'];
    if ($ide==$v) {
        $bandx=3;
    }
}
mysqli_close($link);
if ($band==1){
    echo $result = 2;
}elseif ($bandx==1){
    echo $result = 3;
}else {
    if ($a > $c) {
        echo $result = 4;
    }else{
        $sql = "INSERT into ventaa (id_z,cantidad,talla,precio,vendedor)
								values ('$n','$a','$t','$precio','$v')";
        echo $result = mysqli_query($conexion, $sql);
        //echo $result=0;
    }
}
?>