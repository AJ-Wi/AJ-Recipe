<?php 
include('seg/seguridad.php');
require('conexion/conexion.php');

$ID = isset($_GET["id"]) ? $_GET["id"] : null;
$ENFERMEDAD = '';
$DESCRIPCION = '';

$Datos = buscarEnfermedad($ID);

function buscarEnfermedad($id) {
	$BD = new MiBD();
    $sql = "SELECT * FROM enfermedades WHERE IDenfermedad='".$id."'";
    if (!$resultado = $BD->query($sql)){
	   return false; 
    }
	return $resultado;
}

while ($fila = $Datos->fetchArray()) {
	$ENFERMEDAD = $fila[1];
	$DESCRIPCION = $fila[2];
} 

?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<?php include('inc/head.php') ?>
		<link rel="stylesheet" href="css/enfermedad.css">
	</head>
	<body>
		<?php include('inc/menu2.php') ?>
		<div class="ventana" >
			<div class="cabecera" >
				<h3>Enfermedades</h3>
				<button type="submit" onclick="window.location='recipe.php';" >X</button>	
			</div>
			<div class="cuerpo">
				<form method="post" action="conexion/enfermedad.php">
					<input type="hidden" name="id" value="<?php echo $ID; ?>" >
					<label for="enfermedad">Enfermedad:</label>
					<input type="text" name="enfermedad" required value="<?php echo $ENFERMEDAD; ?>" >
					<label for="descripcion">Descripción:</label>
					<textarea name="descripcion" required rows="19" cols="90"><?php echo $DESCRIPCION; ?></textarea>
					<input class="boton boton2" name="eliminar" type="submit" value="Eliminar">
					<input class="boton" name="guardar" type="submit" value="Guardar">
				</form>
			</div>
		</div>
		<?php include('inc/footer.php') ?>
	</body>
</html>