
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Insercion de datos</title>
</head>
<body>
<?php
// any valid date in the past
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
// always modified right now
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
// HTTP/1.1
header("Cache-Control: private, no-store, max-age=0, no-cache, must-revalidate, post-check=0, pre-check=0");
// HTTP/1.0
header("Pragma: no-cache");

/*
 * Código de conexión a una base de datos mediante sintaxis de mysqli
 */
include 'conexion.php';
$contrasena = $_POST["contrasena"];
$enlace = mysqli_connect($host, $user, $contrasena, $db);
if (!$enlace) {
	
    echo "PASSWORD INCORRECTO. INTENTAR DE NUEVO!";
    exit;
}

$locacion = $_POST["locacion"];
$unidadMedida = $_POST["unidadMedida"];
$fechaCompra = $_POST["fechaCompra"];
$cantidad = $_POST["cantidad"];
$pesoUnitario = $_POST["pesoUnitario"];
$producto = $_POST["producto"];
$cliente = $_POST["cliente"];
$importe = $_POST["importe"];
$enlace = new mysqli($host, $user, $contrasena, $db);

$query="INSERT INTO BT_DISTRIBUCION (d_unidad_medida, id_locacion, f_transaccion, id_producto, q_cantidad, q_peso_unitario) 
SELECT '$unidadMedida', ll.id_locacion, STR_TO_DATE('$fechaCompra', '%Y-%m-%d'), lp.id_producto, $cantidad, $pesoUnitario
FROM LU_LOCACION ll, LU_PRODUCTO lp
WHERE ll.d_locacion = '$locacion'
AND lp.d_producto = '$producto'";

$enlace->query($query) or die($query.'<br />'.$enlace->error);
echo "Se Inserto con exito el registro de stock";
?>
<br>
<?php
$query="INSERT INTO BT_EGRESO (f_transaccion, id_cliente, id_producto, id_tipo_trx, q_cantidad, q_importe) 
SELECT STR_TO_DATE('$fechaCompra', '%Y-%m-%d'), lc.id_cliente, lp.id_producto, ltt.id_tipo_trx, $cantidad, $importe
FROM LU_CLIENTE lc, LU_PRODUCTO lp, LU_TIPO_TRANSACCION ltt
WHERE lc.d_cliente = '$cliente'
AND lp.d_producto = '$producto'
AND ltt.d_tipo_trx = 'COMPRA'";

$enlace->query($query) or die($query.'<br />'.$enlace->error);
echo "Se Inserto con exito el registro de egresos";
?>
<br>
<br>
<button onclick="history.go(-1);">VOLVER</button>

