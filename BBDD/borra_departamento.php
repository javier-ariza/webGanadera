<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Baja animal</title>
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

	
	
	$crotal = $_REQUEST['crotal'];
	

	$validado = (!empty($crotal));
	if (!$validado) {
		$error = "El campo crotal $crotal es obligatorio";
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
	
	$sql_insert = "DELETE from departamentos WHERE crotal IN ('$crotal');" . "
			      VALUES (?)";
	try {
		$sentencia = $db->prepare($sql_insert);
		$sentencia->execute(array($crotal));
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