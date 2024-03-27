<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DB_PROYECTO_DWP_2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

$descripcion = $_POST['descripcion'] ?? '';
$fechaInicio = $_POST['fechaInicio'] ?? '';
$fechaFin = $_POST['fechaFin'] ?? '';
$descuento = $_POST['descuento'] ?? '';

$sql = "INSERT INTO TAB_PROMOCIONES (DES_PROMOCION, FEC_INICIO, FEC_FIN, DESCUENTO) 
        VALUES ('$descripcion', '$fechaInicio', '$fechaFin', $descuento)";

if ($conn->query($sql) === TRUE) {
  // Obtener el ID de la promoción insertada
  $idPromocion = $conn->insert_id;
  
  // Mostrar mensaje de éxito
  echo '<div style="background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 10px; margin-bottom: 10px;">';
  echo '<strong>Nueva promoción registrada correctamente:</strong><br>';
  echo 'Código de promoción: ' . $idPromocion . '<br>';
  echo 'Descripción: ' . $descripcion . '<br>';
  echo 'Fecha de Inicio: ' . $fechaInicio . '<br>';
  echo 'Fecha de Fin: ' . $fechaFin . '<br>';
  echo 'Descuento: ' . $descuento . '<br>';
  echo '</div>';
} else {
  // Mostrar mensaje de error
  echo '<div style="background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 10px; margin-bottom: 10px;">';
  echo 'Error al registrar la promoción: ' . $conn->error;
  echo '</div>';
}

$conn->close();
?>
