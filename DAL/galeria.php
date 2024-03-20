<?php
require_once 'conexion.php';

function obtenerGaleria($conexion) {
    try {
        $sql = "SELECT * FROM TAB_GALERIA";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $galeria = array();
        while ($row = $result->fetch_assoc()) {
            $galeria[] = $row;
        }
        return $galeria;
    } catch (\Throwable $ex) {
        echo $ex;
        error_log($ex);
        return null;
    }
}

function mostrarGaleria($galeria) {
    if ($galeria) {
        foreach ($galeria as $diseno) {
            echo "<div class='diseno'>";
            echo "<h2>" . $diseno['nom_diseno'] . "</h2>";
            echo "<p>" . $diseno['des_diseno'] . "</p>";
            echo "<img src='" . $diseno['ruta_imagen'] . "' alt='" . $diseno['nom_diseno'] . "'>";
            echo "</div>";
        }
    } else {
        echo "No se encontraron diseños.";
    }
}

$conexion = Conecta();

// Mostrar las imágenes de la galería
$galeria = obtenerGaleria($conexion);
if ($galeria) {
    foreach ($galeria as $diseno) {
        echo "<div class='col-md-4 mb-3'>";
        echo "<div class='card p-2 m-2'>";
        echo "<figure><img src='" . $diseno['ruta_imagen'] . "' class='card-img-top content-center' alt='...' height='400px' style='width: 100%;'/>";echo "<figcaption><span class='text-success'>" . $diseno['nom_diseno'] . "</span></figcaption>";
        echo "</figure>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "imágenes no encontras";
}

// Mostrar la galería actualizada
mostrarGaleria($galeria);

Desconectar($conexion);
?>