
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
$query = 'SELECT * FROM LU_LOCACION ORDER BY d_locacion';
$resultLoc = $conexion->query($query);
$query = 'SELECT * FROM LU_PRODUCTO ORDER BY d_producto';
$resultProd = $conexion->query($query);
$query = 'SELECT * FROM LU_CLIENTE ORDER BY d_cliente';
$resultCli = $conexion->query($query);
?>

<h3>FORMULARIO DE INSERCION DE VENTA DE STOCK</h3>
<form method="post" action="insercionVentaStock.php">

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
Locacion:<select name="locacion">    
    <?php    
    while ( $row = $resultLoc->fetch_array() )    
    {
        ?>
    
        <option value="<?php echo $row['d_locacion'] ?>" >
        <?php echo $row['d_locacion']; ?>
        </option>
        
        <?php
    }    
    ?>        
</select>
<br>
Cliente:<select name="cliente">    
    <?php    
    while ( $row = $resultCli->fetch_array() )    
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
Cantidad:<select name="cantidad">    
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
</select>
<br>
Peso Unitario:<select name="pesoUnitario">    
        <option value="1">1</option>
</select>
<br>
Unidad de Medida:<select name="unidadMedida">    
        <option value="Kg.">Kg.</option>
</select>
<br>
Precio Unitario:<input type='number' step="0.01" name="importe" />
<br>
Fecha de Venta:<input type='date' name="fechaVenta" />
<br>
<input type='hidden' name="contrasena" value="<?php echo$contrasena; ?>" />  
<input type='hidden' name="user" value="<?php echo$user; ?>" />  
<input type="submit" value="Insertar en la base" />
</form>
<br>
<br>
<button onclick="history.go(-1);">VOLVER</button>
