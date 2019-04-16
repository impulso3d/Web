
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Estadisticas Impulso 3D</title>
</head>
<body>
<?php

include ("conexion.php");
$contrasena = $_POST["contrasena"];

$enlace = mysqli_connect($host, $user, $contrasena, $db);
if (!$enlace) {
	
    echo "PASSWORD INCORRECTO. INTENTAR DE NUEVO!";
    exit;
}

$enlace = new mysqli($host, $user, $contrasena, $db);


mysqli_select_db($enlace, "impulso3d"); 

$sql = "SELECT lp.d_producto as PRODUCTO, ltp.d_tipo_producto as TIPO_PRODUCTO,CONCAT(bd.q_peso_unitario,' ',bd.d_unidad_medida) as PESO_UNITARIO, SUM(bd.q_cantidad) as CANTIDAD FROM BT_DISTRIBUCION bd, LU_PRODUCTO lp, LU_TIPO_PRODUCTO ltp, LU_LOCACION ll WHERE bd.id_producto = lp.id_producto and bd.id_Locacion = ll.id_locacion and lp.id_tipo_producto = ltp.id_tipo_producto GROUP BY lp.d_producto, CONCAT(bd.q_peso_unitario,' ',bd.d_unidad_medida), ltp.d_tipo_producto order by SUM(bd.q_cantidad) DESC, lp.d_producto, ltp.d_tipo_producto"; 

$result=mysqli_query($enlace,$sql);

echo "<b><h2>STOCK DISPONIBLE</b></h2>"; 

if ($row = mysqli_fetch_array($result,MYSQLI_BOTH)){ 
   echo "<table border = '1'> \n"; 
   echo "<tr><td><b><h3>PRODUCTO</b></h3></td><td><b><h3>TIPO PRODUCTO</b></h3></td><td><b><h3>CANTIDAD</b></h3></td><td><b><h3>PESO UNITARIO</b></h3></td></tr></b> \n"; 
   do { 
      echo "<tr><td>".$row["PRODUCTO"]."</td><td>".$row["TIPO_PRODUCTO"]."</td><td>".$row["CANTIDAD"]."</td><td>".$row["PESO_UNITARIO"]."</td></tr> \n"; 
   } while ($row = mysqli_fetch_array($result,MYSQLI_BOTH)); 
   echo "</table> \n"; 
} else { 
echo "¡ No se ha encontrado ningún registro !"; 
} 
mysqli_close($enlace);
?>
<br>
<br>
<button onclick="history.go(-1);">VOLVER</button>
