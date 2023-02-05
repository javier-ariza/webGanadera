<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Añadir departamento</title>
<!--  estilo de http://alistapart.com/article/prettyaccessibleforms  -->
<script type="text/javascript" src="jsjquery-1.10.2.min.js"></script>
<script src="js/cmxform.js" type="text/javascript"></script>
<link href="css/formulario.css" type="text/css" rel="stylesheet">
<link href="css/plantilla.css" type="text/css" rel="stylesheet">
</head>
<body>
<?php
require_once 'conectar.php';
	
?>

	<div>
	
	<h1>Resultado Añadir departamento</h1>
	<?php 

	
	$id = $_REQUEST['id'];
	$crotal = $_REQUEST['crotal'];
	$raza = $_REQUEST['raza'];
    $nacimiento = $_REQUEST['nacimiento'];
    $sexo = $_REQUEST['sexo'];
    $parto = $_REQUEST['parto'];
    $madre = $_REQUEST['madre'];

	$validado = (!empty($id) && !empty($crotal)  && !empty($raza)  && !empty($nacimiento)  && !empty($sexo)  && !empty($madre));
	if (!$validado) {
		$error = "Los campos id $id, crotal $crotal, raza $raza, nacimiento $nacimiento, sexo $sexo y madre $madre son obligatorios";
		header("Location: formulario_depto.php?error=$error") or die("Error al redirigir a formulario con error $error");;  
	}
	
	/*$f = 'imagen';
	$d = "images/";  // Tenemos que tener images con permiso para que escriba cualquiera
	// Si trabajamos con el workspace en nuestra cuenta, el usuario de apache www-data no podrá escribir en nuestra cuenta
	// si ponemos upload/ podemos no tener permisos; /tmp/upload tiene que tener permisos de escritura (chmod 777 /tmp/upload)
	
	$error_fichero = error_procesa_fichero($f, $d);
	
	if ($error_fichero != false) {
		header("Location: formulario_depto.php?error=$error_fichero") 
			or  die("Error al redirigir a formulario con error $error_fichero");
	}*/
	
	// debería haber un fichero php con funciones para BBDD
	
	$sql_insert = "INSERT INTO `departamentos` (id, crotal, raza, nacimiento, sexo, parto, madre) " . "
			      VALUES (?, ?, ?, ?, ?, ?, ?)";
	try {
		$sentencia = $db->prepare($sql_insert);
		$sentencia->execute(array($id, $crotal, $raza, $nacimiento, $sexo, $parto, $madre));
	}catch(PDOException $error) {
		die("Error a insertar " . $error->getMessage()) or die("Error al redirigir a formulario con error $error->getMessage()");
	}
	
	// redirige a listado de deptos
 $url="../tabla_ganado.php"; 
 echo "<SCRIPT>window.location='$url';</SCRIPT>"; 
	?>
	
	</div>


</body>
</html>