
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
$query = 'SELECT * FROM LU_TIPO_PRODUCTO';
$resultProd = $conexion->query($query);
?>

<h3>FORMULARIO DE INSERCION DE TIPO DE PRODUCTO NUEVO</h3>
<form method="post" action="insercionTipoProd.php">

Tipo de producto:<input name="tipoProd" type="text"/>
<br><br><br>
<input type='hidden' name="contrasena" value="<?php echo$contrasena; ?>" />  
<input type="submit" value="Insertar en la base" style="color:black;height:50px; width:200px"/>
</h3></form>
<br><br>

<font color="red"><b>CHEQUEAR SI EL TIPO DE PRODUCTO NO ESTA YA EN LA BASE: </b></font><select name="consulta">    
    <?php    
    while ( $row = $resultProd->fetch_array() )    
    {
        ?>
    
        <option value="<?php echo $row['d_tipo_producto'] ?>" >
        <?php echo $row['d_tipo_producto']; ?>
        </option>
        
        <?php
    }    
    ?>        
</select>
<br>
<br>
<br>
<button onclick="history.go(-1);">VOLVER</button>
