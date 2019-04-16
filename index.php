<html>
<head>
<title>Pagina de Administracion de Impulso3D</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<link href="style.css" rel="stylesheet" type="text/css">

</head>

<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0"> <?php

include ("conexion.php");
$contrasena = $_POST["contrasena"];

$enlace = mysqli_connect($host, $user, $contrasena, $db);
if (!$enlace) {
	
    echo "PASSWORD INCORRECTO. INTENTAR DE NUEVO!";
    exit;
}

?>
<table>
<h1>
<div style="float: left; width: 45%">Agregar datos</div><div style="float: right; width: 45%">Consultar datos</div>
<div style="clear: both"></div></h1>

<div style="float: left; width: 45%">
<form method="post" action="productoNuevo.php">
                  <input type='hidden' name="contrasena" value="<?php echo$contrasena; ?>" /> </br>
                  <pre style='display:inline'>&#09;</pre><input type="submit" value="Producto nuevo" style="color:red;height:50px; width:200px"/>
                  </form>
</div>
<div style="float: right; width: 45%">
<form method="post" action="consultaStock.php">
                  <input type='hidden' name="contrasena" value="<?php echo$contrasena; ?>" /> </br>
                  <pre style='display:inline'>&#09;</pre><input type="submit" value="Consulta Stock" style="color:red;height:50px; width:300px"/>
                  </form>
</div>
<div style="clear: both"></div>

<div style="float: left; width: 45%">
<form method="post" action="clienteNuevo.php">
                  <input type='hidden' name="contrasena" value="<?php echo$contrasena; ?>" /> </br>
                  <pre style='display:inline'>&#09;</pre><input type="submit" value="Cliente nuevo" style="color:red;height:50px; width:200px"/>
                  </form>
</div>
<div style="float: right; width: 45%">
<form method="post" action="consultaStockLocacion.php">
                  <input type='hidden' name="contrasena" value="<?php echo$contrasena; ?>" /> </br>
                  <pre style='display:inline'>&#09;</pre><input type="submit" value="Consulta Stock con Locacion" style="color:red;height:50px; width:300px"/>
                  </form>
</div>
<div style="clear: both"></div>

<div style="float: left; width: 45%">
<form method="post" action="locacionNueva.php">
                  <input type='hidden' name="contrasena" value="<?php echo$contrasena; ?>" /> </br>
                  <pre style='display:inline'>&#09;</pre><input type="submit" value="Locacion Nueva" style="color:red;height:50px; width:200px"/>
                  </form>
</div>
<div style="float: right; width: 45%">
<form method="post" action="consultaIngXMes.php">
                  <input type='hidden' name="contrasena" value="<?php echo$contrasena; ?>" /> </br>
                  <pre style='display:inline'>&#09;</pre><input type="submit" value="Consulta Ingresos por Mes" style="color:red;height:50px; width:300px"/>
                  </form>
</div>
<div style="clear: both"></div>

<div style="float: left; width: 45%">
<form method="post" action="tipoProdNuevo.php">
                  <input type='hidden' name="contrasena" value="<?php echo$contrasena; ?>" /> </br>
                  <pre style='display:inline'>&#09;</pre><input type="submit" value="Tipo de Producto nuevo" style="color:red;height:50px; width:200px"/>
                  </form>
</div>
<div style="float: right; width: 45%">
<form method="post" action="consultaIngXTipoTrx.php">
                  <input type='hidden' name="contrasena" value="<?php echo$contrasena; ?>" /> </br>
                  <pre style='display:inline'>&#09;</pre><input type="submit" value="Consulta Ingresos por tipo de Transaccion" style="color:red;height:50px; width:300px"/>
                  </form>
</div>
<div style="clear: both"></div>

<div style="float: left; width: 45%">
<form method="post" action="stockNuevo.php">
                  <input type='hidden' name="contrasena" value="<?php echo$contrasena; ?>" /> </br>
                  <pre style='display:inline'>&#09;</pre><input type="submit" value="Stock nuevo" style="color:red;height:50px; width:200px"/>
                  </form>
</div>
<div style="float: right; width: 45%">
<form method="post" action="consultaEgrXMes.php">
                  <input type='hidden' name="contrasena" value="<?php echo$contrasena; ?>" /> </br>
                  <pre style='display:inline'>&#09;</pre><input type="submit" value="Consulta Egresos por mes" style="color:red;height:50px; width:300px"/>
                  </form>
</div><div style="clear: both"></div>

<div style="float: left; width: 45%">
<form method="post" action="ventaStock.php">
                  <input type='hidden' name="contrasena" value="<?php echo$contrasena; ?>" /> </br>
                  <pre style='display:inline'>&#09;</pre><input type="submit" value="Venta de Stock" style="color:red;height:50px; width:200px"/>
                  </form>
</div>
<div style="float: right; width: 45%">
<form method="post" action="consultaEgrXTipoTrx.php">
                  <input type='hidden' name="contrasena" value="<?php echo$contrasena; ?>" /> </br>
                  <pre style='display:inline'>&#09;</pre><input type="submit" value="Consulta Egresos por tipo de Transaccion" style="color:red;height:50px; width:300px"/>
                  </form>
</div><div style="clear: both"></div>

<div style="float: left; width: 45%">
<form method="post" action="ingresos.php">
                  <input type='hidden' name="contrasena" value="<?php echo$contrasena; ?>" /> </br>
                  <pre style='display:inline'>&#09;</pre><input type="submit" value="Ingresos" style="color:red;height:50px; width:200px"/>
                  </form>
</div>
<div style="float: right; width: 45%"></div>
<div style="clear: both"></div>

<div style="float: left; width: 45%">
<form method="post" action="egresos.php">
                  <input type='hidden' name="contrasena" value="<?php echo$contrasena; ?>" /> </br>
                  <pre style='display:inline'>&#09;</pre><input type="submit" value="Egresos" style="color:red;height:50px; width:200px"/>
                  </form>
</div>
<div style="float: right; width: 45%"></div>
<div style="clear: both"></div>

<div style="float: left; width: 45%">
<form method="post" action="tipoClienteNuevo.php">
                  <input type='hidden' name="contrasena" value="<?php echo$contrasena; ?>" /> </br>
                  <pre style='display:inline'>&#09;</pre><input type="submit" value="Tipo de Cliente Nuevo" style="color:red;height:50px; width:200px"/>
                  </form>
</div>
<div style="float: right; width: 45%"></div>
<div style="clear: both"></div>
                  
</body>
</html>
