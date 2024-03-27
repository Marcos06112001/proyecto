<!DOCTYPE html>
<html>
<head>
  <title>Datos de Retroalimentación</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <h2 class="mt-5">Datos de Retroalimentación Recibidos</h2>
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
  <!-- Bootstrap JS (jQuery, Popper.js, Bootstrap JS) -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
