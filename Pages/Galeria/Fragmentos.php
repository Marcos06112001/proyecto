<?php include "../../include/templates/headerPaginas.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Galería de diseños</title>
</head>
<body>
    <!-- 1 Sección para mostrar las categorías -->
    <section id="categorias">
        <div class="container">
            <h2 class="text-center mb-4">Categorías</h2>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="/pruebas/listado">Todas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/pruebas/listado/1">Categoría 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/pruebas/listado/2">Categoría 2</a>
                </li>
                
            </ul>
        </div>
    </section>

    <!-- 2 Sección principal para mostrar la información de la entidad producto -->
    <section id="galeria">
        <div class="container">
            <h2 class="text-center mb-4">Galería de diseños</h2>
            <div class="row">

                <?php
                $designs = [
                    [
                        "id_diseno" => 1,
                        "nom_diseno" => "Pulsera Azul",
                        "des_diseno" => "Una pulsera de bolitas de cristal azules",
                        "tipo_diseno" => "B",
                        "ruta_imagen" => "https://firebasestorage.googleapis.com/v0/b/techshop-7645b.appspot.com/o/techshop%2Fgaleria%2Fimg0000000000000000012PulserAzul01.jpg?alt=media&token=eb50f631-d1a5-4ec3-a990-34c1fa599436"
                    ],
                    [
                        "id_diseno" => 2,
                        "nom_diseno" => "Mario Bros",
                        "des_diseno" => "Amigurimi del famoso personaje de Mario bros",
                        "tipo_diseno" => "A",
                        "ruta_imagen" => "https://firebasestorage.googleapis.com/v0/b/techshop-7645b.appspot.com/o/techshop%2Fgaleria%2Fimg0000000000000000021Mario01.jpg?alt=media&token=2575c7a8-48a9-4453-b58a-acd9862baf27"
                    ],
                    [
                        "id_diseno" => 3,
                        "nom_diseno" => "Bowser",
                        "des_diseno" => "Amigurimi del el enemigo principal de la saga de juegos de Mario Bros",
                        "tipo_diseno" => "A",
                        "ruta_imagen" => "https://firebasestorage.googleapis.com/v0/b/techshop-7645b.appspot.com/o/techshop%2Fgaleria%2Fimg0000000000000000013Bowser.jpg?alt=media&token=ce808209-4d7c-4dfb-896e-04ff5160d2e9"
                    ],
                    [
                        "id_diseno" => 4,
                        "nom_diseno" => "Hey hey",
                        "des_diseno" => "Amigurimi del pollo que sale en la pelicula de Mohana",
                        "tipo_diseno" => "A",
                        "ruta_imagen" => "https://firebasestorage.googleapis.com/v0/b/techshop-7645b.appspot.com/o/techshop%2Fgaleria%2Fimg0000000000000000017Heyhey01.jpg?alt=media&token=5cc22daa-f038-44fd-9ebe-a9dcc42f181f"
                    ],
                    [
                        "id_diseno" => 5,
                        "nom_diseno" => "Pulsera de piedras pequeñas",
                        "des_diseno" => "Una pulsera de un color con piedras pequeñas con elástico",
                        "tipo_diseno" => "B",
                        "ruta_imagen" => "https://firebasestorage.googleapis.com/v0/b/techshop-7645b.appspot.com/o/techshop%2Fgaleria%2Fimg0000000000000000010Pulseras01.jpg?alt=media&token=07fe4532-1c45-48da-9877-e0aa132634a6"
                    ],
                    // Agregar más elementos aquí
                ];

                foreach ($designs as $design) {
                    echo '
                    <div class="col-md-4 mb-3">
                        <div class="card p-2 m-2">
                            <figure>
                                <img src="' . $design["ruta_imagen"] . '" class="card-img-top content-center" alt="' . $design["nom_diseno"] . '" height="400px" style="width: 100%;">
                                <figcaption>
                                    <span class="text-success">Tipo de diseño: ' . ($design["tipo_diseno"] == "A" ? "Amigurumi" : "Bisutería") . '</span>
                                </figcaption>
                            </figure>
                            <div class="card-header">
                                <h4 class="card-title">' . $design["nom_diseno"] . '</h4>
                            </div>
                            <div class="card-body">
                                <p class="card-text">' . $design["des_diseno"] . '</p>
                            </div>
                        </div>
                    </div>
                    ';
                }
                ?>

            </div>
            <!-- Agregar más tarjetas de producto según sea necesario -->
        </div>
    </section>

    <!-- 3 Sección para crear los filtros -->
    <section>
        <div class="container">
            <h3>Filtros:</h3>
            <form method="POST" action="/galeria/query2" class="was-validated">
                <div class="form-row">
                    <div class="col-md-4">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                    </div>
                    <div class="col-md-4">
                        <label for="tipo">Tipo</label>
                        <select class="form-control" id="slcTipo" name="tipo">
                            <option value="T">Todos</option>
                            <option value="A">Amigurumis</option>
                            <option value="B">Bisuteria</option>
                        </select>
                    </div>
                    <divclass="col-md-4">
                        <button type="submit" class="btn btn-secondary">
                            <i class="fas fa-check"></i> Consultar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>
</html>
