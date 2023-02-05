<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Añadir departamento</title>
<!--  estilo de http://alistapart.com/article/prettyaccessibleforms  -->
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script src="js/cmxform.js" type="text/javascript"></script>
<link href="css/formulario.css" type="text/css" rel="stylesheet">
<link href="css/plantilla.css" type="text/css" rel="stylesheet">
</head>
<body>
	<?php 
	require_once 'html/cabecera.html';
	require_once 'funciones_ficheros.php';
	
	if (!empty($_REQUEST['error'])) {
		echo "<p class='error'>" . $_REQUEST['error'] . "</p>";
	}  
	?>
	<div id="content">
	
		
		<form action="annade_departamento.php" method="post" enctype="multipart/form-data" class="cmxform">
			<fieldset>
				<legend>Alta animales</legend>
				<ol>
					<li>
						<label for="id">ID</label> <input type="text"
						name="id" id="id">
					</li>
					<li>
						<label for="crotal">Crotal</label>
						<input type="text" name="crotal" id="crotal" >
					</li>
					<li>
						<label for="raza">Raza</label>
						<input type="text" name="raza" id="raza">
					</li>
					<li>
						<label for="nacimiento">Fecha de nacimiento</label>
                        <input type="text" name="nacimiento" id="nacimiento">
					</li>
                    <li>
                        <label for="sexo">Sexo</label>
                        <input type="text" name="sexo" id="sexo">
                    </li>
                    <li>
                        <label for="parto">Ultimo parto</label>
                        <input type="text" name="parto" id="parto">
                    </li>
                    <li>
                        <label for="madre">Crtal madre</label>
                        <input type="text" name="madre" id="madre">
                    </li>
				</ol>
				<button type="submit">Añadir animal</button>
			</fieldset>
		</form>
	</div>
	<?php require_once 'html/pie.html';?>
</body>
</html>
