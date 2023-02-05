<?php
require_once("restringido.php");
require_once 'BBDD/conectar.php';
$sql = "SELECT id, crotal, raza, nacimiento, sexo, parto, madre FROM departamentos LIMIT 200";
?>
<!DOCTYPE html>
<html  >
<head>
  <!-- Site made with Mobirise Website Builder v4.9.6, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.9.6, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/logo2.png" type="image/x-icon">
  <meta name="description" content="">
  
  <title>Ganadería Cruz de la Mocita</title>
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css"> 
  <link rel="stylesheet" href="stylesheet.css" type="text/css" charset="utf-8" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">


  
  
  
</head>
<body>
<section class="menu cid-qTkzRZLJNu" once="menu" id="menu1-0">

    

    <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="menu-logo">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="https://cornual-muscles.000webhostapp.com/index.html">
                         <img src="assets/images/logo2.png" alt="Mobirise" style="height: 3.8rem;">
                    </a>
                </span>
                <span class="navbar-caption-wrap">
                    <a class="navbar-caption text-white display-4" href="index.php">
                       Ganadería Cruz de la Mocita
                    </a>
                </span>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
                <li class="nav-item">
                    <a class="nav-link link text-white display-4" href="privatedarea.php">
                        <span class="mbri-home mbr-iconfont mbr-iconfont-btn"></span>
                        Área Privada
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link text-white display-4" href="history.php">
                        <span class="mbri-search mbr-iconfont mbr-iconfont-btn"></span>
                        Historia y curiosidades
					   
                    </a>
                </li>
                <li class="nav-item">
                                    <a class="nav-link link text-white display-4" href="contacto.php">
                                        <span class="mbri-chat mbr-iconfont mbr-iconfont-btn"></span>
                                        Contacto
                                    </a>
                                </li>

            </ul>    
			  
        </div>
    </nav>
</section>
<div class="container-table">
 <h1 class="text-center">Animales de la ganaderia <?php echo $_SESSION['username']; ?></h1>
    <div class="text-center">
	        <button class="btn btn-lg-3 col-xs-4 col-md-4 col-lg-2 btn-primary btn-block" type="button" data-toggle="modal" data-target="#exampleModal">Añadir entrada</button>
         
            <button class="btn btn-lg-3 col-xs-4 col-md-4 col-lg-2 btn-primary btn-block" type="button" data-toggle="modal" data-target="#exampleModal1">Borrar entrada</button>

			</div>

<table id="example" class="display wrap" style="width:100%">
        <thead>
    <tr>
       
        <td>ID</td>
        <td>Crotal</td>
		<td>Raza</td>
        <td>Fecha de nacimiento</td>
		<td>Sexo</td>
        <td>Ultimo parto</td>
		<td>Crotal Madre</td>
    </tr>
    </thead>
    <tbody>
    
        <?php
        foreach ($db->query($sql) as $fila) {
        ?>
    <tr>
        
        <td> <?php print $fila['id'] . "\t"; ?> </td>
        <td><?php print $fila['crotal'] . "\t"; ?> </td>
		<td> <?php print $fila['raza'] . "\t"; ?> </td>
        <td> <?php print $fila['nacimiento'] . "\t"; ?> </td>
		<td> <?php print $fila['sexo'] . "\t"; ?> </td>
		<td> <?php print $fila['parto'] . "\t"; ?> </td>
		<td> <?php print $fila['madre'] . "\t"; ?> </td>

    </tr>
	<?php }  ?>
           
        </tbody>    
    </table>
	</div>
   
    <?php require_once 'html/imagen_pie.html';?>


    <?php require_once 'html/pie2.html';?>
	
<!-----Modal--->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
		<?php 

	
	if (!empty($_REQUEST['error'])) {
		echo "<p class='error'>" . $_REQUEST['error'] . "</p>";
	}  
	?>
	<div id="content">
	<form action="BBDD/annade_departamento.php" method="post" enctype="multipart/form-data" class="cmxform">
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
		<button type="submit" class="btn btn-secondary">Añadir</button>
			    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</fieldset>
		</form>
		
		
	</div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      </div>
    </div>
  </div>
</div>



<!-----Modal--->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
       
		<?php 

	
	if (!empty($_REQUEST['error'])) {
		echo "<p class='error'>" . $_REQUEST['error'] . "</p>";
	}  
	?>
	<div id="content">
	
		
		<form action="BBDD/borra_departamento.php" method="post" enctype="multipart/form-data" class="cmxform">
			<fieldset>
				<legend>Baja animal</legend>
				<ul>
				
					<li>
						<label for="crotal">Crotal a dar de baja</label>
						<input type="text" name="crotal" id="crotal" >
					</li>
				
				</ul>
				<button type="submit" class="btn btn-secondary">Borrar</button>
			    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			</fieldset>
		</form>
	</div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    </div>
  </div>
</div>



  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/dropdown/js/script.min.js"></script>
  <script src="assets/touchswipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/parallax/jarallax.min.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/theme/js/script.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/rowreorder/1.2.5/js/dataTables.rowReorder.min.js"></script>
  <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
  <script src="js/tabla.js"></script>


</body>
</html>