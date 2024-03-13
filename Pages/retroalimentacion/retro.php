<?php
echo "<h2>Retroalimentación Registrada</h2>";

function Conecta(){
    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $database = "DB_PROYECTO_DWP_2";
    try{
        // Crear conexión
        $conn = new mysqli($servername, $username, $password, $database);

        // Verificar conexión
        if ($conn->connect_error) {
            echo "Ocurrió un error al establecer la conexión " . mysqli_connect_error();
            die("Error de conexión: " . $conn->connect_error);
            
        }
        return $conn;

    }
    catch(\Throwable $ex)
    {
        echo $ex;
        error_log($ex);
    }  
}

function Desconectar($conexion) {
    mysqli_close($conexion);
}

$conn = Conecta();

try {
    $stmt = $conn->prepare("SELECT CORREO, COD_RETROALIMENTACION, COMENTARIO, VALORACION FROM TAB_RETROALIMENTACION");
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Mostrar los datos en una tabla
        echo "<table>";
        echo "<tr><th>CORREO</th><th>COD_RETROALIMENTACION</th><th>COMENTARIO</th><th>VALORACION</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["CORREO"]."</td>";
            echo "<td>".$row["COD_RETROALIMENTACION"]."</td>";
            echo "<td>".$row["COMENTARIO"]."</td>";
            echo "<td>".$row["VALORACION"]."</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 resultados";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
} finally {
    Desconectar($conn);
}
?>

<h2>Envía tu Retroalimentación</h2>
<form method="post" action="guardar_retroalimentacion.php">
  <label for="correo">Correo Electrónico:</label><br>
  <input type="email" id="correo" name="correo" required><br><br>
  
  <label for="comentario">Comentario:</label><br>
  <textarea id="comentario" name="comentario" rows="4" cols="50" required></textarea><br><br>
  
  <label for="valoracion">Valoración (1-5):</label><br>
  <input type="number" id="valoracion" name="valoracion" min="1" max="5" required><br><br>
  
  <input type="submit" value="Enviar">
</form>
