<?php
include "../../include/templates/headerPaginas.php";
echo "<h2>Retroalimentación Registrada</h2>";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "DB_PROYECTO_DWP_2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}


$sql = "SELECT * FROM TAB_RETROALIMENTACION";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Mostrar los datos en una tabla
  /*
  echo "<table>";
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>".$row["CORREO"]."</td>";
    echo "<td>".$row["COD_RETROALIMENTACION"]."</td>";
    echo "<td>".$row["COMENTARIO"]."</td>";
    echo "<td>".$row["VALORACION"]."</td>";
    echo "</tr>";
  }
  echo "</table>";*/
} else {
  echo "0 resultados";
}//

// Cerrar conexión
$conn->close();
?>

<h2>Crear Promoción</h2>
<form method="post" action="guardar_promo.php">
  <div class="form-group">
    <label for="descripcion">Descripción:</label>
    <input type="text" class="form-control" id="descripcion" name="descripcion" required>
  </div>
  
  <div class="form-group">
    <label for="fechaInicio">Fecha de Inicio:</label>
    <input type="date" class="form-control" id="fechaInicio" name="fechaInicio" required>
  </div>
  
  <div class="form-group">
    <label for="fechaFin">Fecha de Fin:</label>
    <input type="date" class="form-control" id="fechaFin" name="fechaFin" required>
  </div>
  
  <div class="form-group">
    <label for="descuento">Descuento:</label>
    <input type="number" class="form-control" id="descuento" name="descuento" min="0" max="100" required>
  </div>
  
  <button type="submit" class="btn btn-primary">Crear Promoción</button>
</form>
