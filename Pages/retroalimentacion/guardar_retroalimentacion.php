<!DOCTYPE html>
<html>
<head>
  <title>Datos de Retroalimentación</title>
</head>
<body>
  <div class="container">
    <h2>Datos de Retroalimentación Recibidos</h2>
    <div class="datos">
      <?php
      // Obtener los datos del formulario
      $correo = $_POST['correo'];
      $comentario = $_POST['comentario'];
      $valoracion = $_POST['valoracion'];

      // Mostrar los datos
      echo "<p><strong>Correo Electrónico:</strong> $correo</p>";
      echo "<p><strong>Comentario:</strong> $comentario</p>";
      echo "<p><strong>Valoración:</strong> $valoracion</p>";
      ?>
    </div>
  </div>
</body>
</html>
