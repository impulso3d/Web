
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Estadisticas Impulso 3D</title>
</head>
<body>

<?php

/*
 * Código de conexión a una base de datos mediante sintaxis de mysqli
 */
include 'conexion.php';
$contrasena = $_POST["contrasena"];

$conexion = new mysqli($host, $user, $contrasena, $db);

if ( $conexion->connect_error ) 
{ 
    die('Error de Conexión'. $conexion->connect_error);
}
else
{
    //echo 'Conexion OK';
}
$query = 'SELECT * FROM LU_TIPO_TRANSACCION WHERE c_tipo_trx ="EGR"  ORDER BY d_tipo_trx';
$resultTipoTrx = $conexion->query($query);
$query = 'SELECT * FROM LU_PRODUCTO WHERE id_producto NOT IN 
(SELECT DISTINCT id_producto FROM BT_DISTRIBUCION) ORDER BY d_producto';
$resultProd = $conexion->query($query);
$query = 'SELECT * FROM LU_CLIENTE ORDER BY d_cliente';
$resultTipoCli = $conexion->query($query);
?>

<h3>FORMULARIO DE INSERCION DE EGRESOS</h3>
<form method="post" action="insercionEgresos.php">

Tipo Transaccion:<select name="tipoTrx">    
    <?php    
    while ( $row = $resultTipoTrx->fetch_array() )    
    {
        ?>
    
        <option value="<?php echo $row['d_tipo_trx'] ?>" >
        <?php echo $row['d_tipo_trx']; ?>
        </option>
        
        <?php
    }    
    ?>   
</select>
<br>
Producto:<select name="producto">    
    <?php    
    while ( $row = $resultProd->fetch_array() )    
    {
        ?>
    
        <option value="<?php echo $row['d_producto'] ?>" >
        <?php echo $row['d_producto']; ?>
        </option>
        
        <?php
    }    
    ?>   
</select>
<br>
Cliente:<select name="cliente">    
    <?php    
    while ( $row = $resultTipoCli->fetch_array() )    
    {
        ?>
    
        <option value="<?php echo $row['d_cliente'] ?>" >
        <?php echo $row['d_cliente']; ?>
        </option>
        
        <?php
    }    
    ?>   
</select>
<br>
Cantidad:<input type='number' name="cantidad"/> 
<br>
Precio Unitario:<input type='number' step="0.01" name="importe"/> 
<br>
Fecha de Transaccion:<input type='date' name="fechaTrx" />
<br>
<br><h3>
<input type='hidden' name="contrasena" value="<?php echo$contrasena; ?>" />  
<input type="submit" value="Insertar en la base" />
</h3></form>
<br>
<br>
<button onclick="history.go(-1);">VOLVER</button>
