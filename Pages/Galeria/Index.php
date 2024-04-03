<?php
$tituloPagina = "Creaciones Mari - Galeria";
include "../../include/templates/headerPaginas.php";
require_once "../../include/functions/recoge.php";
require_once "../../DAL/galeria.php";

try {
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $productos = ObtenerTodaGaleria();
    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nombre = recogePost("nombre");
        $tipo = recogePost("tipo");
        $productos = FiltrarProductos($nombre, $tipo);
    }
} catch (\Throwable $th) {
    error_log($th);
}
?>

<main class="bg-Proyecto">
    <div class="row py-2">
        <div class="col-md-1"></div>
        <div class="col-md-3 col-lg-12 m-3">
            <form id="filtroForm" class="was-validated">
                <div class="row">
                    <div class="mb-3 col-5">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" value="<?php echo isset($nombre) ? $nombre : ''; ?>" name="nombre"/>
                    </div>
                    <div class="mb-3 col-5">
                        <label for="tipo">Tipo</label>
                        <select class="form-control" id="slcTipo" name="tipo">
                            <option value="T" <?php echo (isset($tipo) && $tipo == 'T') ? 'selected' : ''; ?>>Todos</option>
                            <option value="A" <?php echo (isset($tipo) && $tipo == 'A') ? 'selected' : ''; ?>>Amigurumis</option>
                            <option value="B" <?php echo (isset($tipo) && $tipo == 'B') ? 'selected' : ''; ?>>Bisuteria</option>
                        </select>
                    </div>
                    <div class="col-2 text-center">
                        <button type="submit" class="btn btn-info mt-4">
                            <i class="fas fa-check"></i> Consultar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="foreachGaleria" class="row py-2">
        <?php foreach ($productos as $p): ?>
            <div class="col-4 mb-3">
                <div class="card p-2 m-2">
                    <figure>
                        <img src="<?php echo $p['RUTA_IMAGEN']; ?>" class="card-img-top content-center" alt="..." height="400px" style="width: 100%;"/>
                        <figcaption>
                            <?php
                            switch ($p['TIPO_DISENO']) {
                                case 'A':
                                    echo '<span class="text-success">Amigurumis</span>';
                                    break;
                                case 'B':
                                    echo '<span class="text-success">Bisuteria</span>';
                                    break;
                                default:
                                    break;
                            }
                            ?>
                        </figcaption>
                    </figure>
                    <div class="card-header">
                        <h4 class="card-title"><?php echo $p['NOM_DISENO']; ?></h4>
                    </div>
                    <div class="card-body">
                        <p class="card-text"><?php echo $p['DES_DISENO']; ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<script>
$(document).ready(function() {
    $("#filtroForm").submit(function(event) {
        event.preventDefault(); 

        var formData = $(this).serialize(); 

        $.ajax({
            type: "POST",
            url: "../Galeria/Index.php",
            data: formData,
            success: function(response) {
                $("#foreachGaleria").html(response);
            },
            error: function(xhr, textStatus, errorThrown) {
                console.error("Error en la solicitud AJAX:", errorThrown);
            }
        });
    });
});
</script>

<?php
include "../../include/templates/footer.php";
?>
