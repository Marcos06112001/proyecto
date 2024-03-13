<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DB_PROYECTO_DWP_2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

$descripcion = $_POST['descripcion'];
$fechaInicio = $_POST['fechaInicio'];
$fechaFin = $_POST['fechaFin'];
$descuento = $_POST['descuento'];

$sql = "INSERT INTO TAB_PROMOCIONES (DES_PROMOCION, FEC_INICIO, FEC_FIN, DESCUENTO) 
        VALUES ('$descripcion', '$fechaInicio', '$fechaFin', $descuento)";

if ($conn->query($sql) === TRUE) {
  // Obtener el ID de la promoción insertada
  $idPromocion = $conn->insert_id;
  
  // Mostrar los datos de la promoción registrada
  echo "Nueva promoción registrada correctamente:<br>";
  echo "Código de promoción: " . $idPromocion . "<br>";
  echo "Descripción: " . $descripcion . "<br>";
  echo "Fecha de Inicio: " . $fechaInicio . "<br>";
  echo "Fecha de Fin: " . $fechaFin . "<br>";
  echo "Descuento: " . $descuento . "<br>";
} else {
  echo "Error al registrar la promoción: " . $conn->error;
}

$conn->close();
?>
