
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

$sql = "SELECT ROUND(SUM(q_importe*q_cantidad),2) monto, DATE_FORMAT(f_transaccion, '%Y-%b') mes FROM `BT_EGRESO` group by DATE_FORMAT(f_transaccion, '%Y-%b')"; 

$result=mysqli_query($enlace,$sql);

echo "<b><h2>EGRESOS POR MES</b></h2>"; 

if ($row = mysqli_fetch_array($result,MYSQLI_BOTH)){ 
   echo "<table border = '1'> \n"; 
   echo "<tr><td><b><h3>MONTO</b></h3></td><td><b><h3>MES</b></h3></td></tr></b> \n"; 
   do { 
      echo "<tr><td>".$row["monto"]."</td><td>".$row["mes"]."</td></tr> \n"; 
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
